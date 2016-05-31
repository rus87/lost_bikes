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
        //header("Location: ".base_url());
        echo $this->load->view('navbar_auth','', TRUE);
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