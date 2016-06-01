<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends MY_Controller {

    function __construct()
    {
        parent :: __construct();
        $this->load->library('user_agent');
    }

    function sign_in()
    {
        $data = array('response' => '', 'error' => '');
        $form_data = $this->input->post(NULL, TRUE);
        $user = $this->Authorization_model->get_user('login', $form_data['login']);
        if(!$user)  $data['error'] = 'Нет пользователя с таким логином';
        else
        {
            if(md5($form_data['password']) != $user->password) $data['error'] = 'Пароль неправильный';
            else
            {
                if(! $user->active) $data['error'] = 'Учетная запись не активирована';
                else
                {
                    Session :: set('user', $user);
                    $this->update_client_info($user->id);
                    if(isset($form_data['remember']))
                        $this->set_remember_cookies($form_data);
                    $data['response'] = $this->load->view('navbar_user', '', TRUE);
                }
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    function log_out()
    {
        Session :: destroy();
        $this->Authorization_model->set_remember_hash('', Session::get('user')->id);
        $this->input->set_cookie('token', '');
        $this->input->set_cookie('id', '');
        echo $this->load->view('navbar_auth','', TRUE);
    }

    function recovery($token = NULL)
    {
        if ($token == NULL)
        {
            $user_data = $this->input->post('login_email', TRUE);
            if($user_data)
            {
                $user = $this->Authorization_model->get_user('email', $user_data);
                if(! $user) $user = $this->Authorization_model->get_user('login', $user_data);
                if(! $user) echo "error";
                if($user)
                {
                    $token = array('recovery_token' => md5(time()));
                    $this->Authorization_model->set_user_data('id', $user->id, $token);
                    echo $this->send_recovery_link($user->email, $token['recovery_token']);
                }
            }
            else
            {
                $this->data['content'] = $this->load->view('recovery','', TRUE);
                $this->load->view('basic_template', $this->data);
            }

        }
        else
        {
            if(strlen($token) == 32 && ! preg_match('/[^a-z0-9]/', $token))
            {
                $user = $this->Authorization_model->get_user('recovery_token', $token);
                if($user)
                {
                    $this->data['content'] = $this->load->view('new_pass',array('token' => $token), TRUE);
                    $this->load->view('basic_template', $this->data);
                    //echo "Показывем форму для ввода нового пароля";
                }
            }
        }
    }

    function set_password()
    {
        if($this->input->post('password'))
        {
            $token = $this->input->post('token', TRUE);
            if(strlen($token) == 32 && ! preg_match('/[^a-z0-9]/', $token))
            {
                $user = $this->Authorization_model->get_user('recovery_token', $token);
                if($user)
                {
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('', '');
                    $this->form_validation->run('password_recovery');
                    if(validation_errors())
                    {
                        $send = array('status' => 'error',
                            'password_error' => form_error('password'),
                            'passconf_error' => form_error('passconf'));
                    }
                    else
                    {
                        $send = array('status' => 'OK');
                        $new_pass = md5($this->input->post('password'));
                        $this->Authorization_model->set_user_data('id', $user->id, array('password' => $new_pass));
                        $this->Authorization_model->set_user_data('id', $user->id, array('recovery_token' => ''));
                    }

                    echo json_encode($send, JSON_UNESCAPED_UNICODE);
                }
            }

        }
    }

    function send_recovery_link($email, $token)
    {
        $link = base_url().'authorization/recovery/'.$token;

        $this->load->library('email');
        $this->email->from('users_service@lost-bikes.zzz.com.ua', 'Lost Bikes');
        $this->email->to($email);
        $this->email->subject('Password Recovery');
        $this->email->message("Для восстановления пароля перейдите по ссылке: ".$link);

        if (! $this->email->send())
        {
            return $this->email->print_debugger();
        }
        else return "OK";
    }


    function set_remember_cookies($form_data)
    {
        $remember_hash = md5($form_data['login'].time());
        $this->Authorization_model->set_remember_hash($remember_hash, Session::get('user')->id);
        $cookie = array(
            'name' => 'token',
            'value' => $remember_hash,
            'expire' => time() + (365 * 24 * 60 * 60)
        );
        $this->input->set_cookie($cookie);
        $cookie = array(
            'name' => 'id',
            'value' => $this->Authorization_model->get_user('login', $form_data['login'])->id,
            'expire' => time() + (365 * 24 * 60 * 60)
        );
        $this->input->set_cookie($cookie);
    }

    function update_client_info($id)
    {
        if ($this->agent->is_browser() && ! $this->agent->is_robot())
        {
            $browser = $this->agent->browser().$this->agent->version();
            $this->Authorization_model->set_client_info($id, 'browser', $browser);
            $this->Authorization_model->set_client_info($id, 'platform', $this->agent->platform());
        }
        if ($this->input->valid_ip($this->input->ip_address()))
            $this->Authorization_model->set_client_info($id, 'last_ip', $this->input->ip_address());
        else $this->Authorization_model->set_client_info($id, 'last_ip', 'invalid');

    }

}