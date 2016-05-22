<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_up extends MY_Controller {
    
    public function __construct()
    {
        parent :: __construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('MY_form_validation');
    }
 
    function index()
    {
        $this->data['user_panel'] = $this->load->view('navbar_auth','', TRUE);
        $this->data['content'] = $this->load->view('signup','', TRUE);
        $this->data['menu_active_btn'] = array('add_bike' => '', 'bikes' => '');
        $this->load->view('basic_template', $this->data);
    }
    
    function validate()
    {
        $config = array(
            array(
                'field' => 'login',
                'label' => 'Логин',
                'rules' => 'trim|required|min_length[3]|max_length[20]|is_unique[lb_users.login]|cyr_alpha_dash',
                'errors' => array(
                    'required' => '%s ввести забыли.',
                    'min_length' => '%s должен быть от 3 до 20 символов.',
                    'max_length' => '%s должен быть от 3 до 20 символов.',
                    'is_unique' => '%s занят.',
                    'alpha_dash' => '%s может состоять только из букв, цифр и символа "_"')
                ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|is_unique[lb_users.email]|valid_email',
                'errors' => array(
                    'required' => '%s ввести забыли.',
                    'is_unique' => '%s занят.',
                    'valid_email' => "Вы ввели некорректный e-mail адрес."
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Пароль',
                'rules' => 'trim|required|min_length[6]|alpha_dash',
                'errors' => array(
                    'required' => 'Надо обязательно ввести %s.',
                    'min_length' => '%s должен быть не короче 6 символов.',
                    'alpha_dash' => '%s может состоять только из букв и цифр.'
                )
                 ),
            array(
                'field' => 'passconf',
                'label' => 'подтверждение пароля',
                'rules' => 'trim|required|matches[password]',
                'errors' => array(
                    'required' => 'Надо обязательно ввести %s',
                    'matches' => 'Введенные пароли не совпадают.'
                )
                 )
        
        );
        
        
        $this->form_validation->set_rules($config);
        $this->form_validation->run();
        if(validation_errors())
        {
            $errors = array('login' => form_error('login'),
                            'email' => form_error('email'),
                            'password' => form_error('password'),
                            'passconf' => form_error('passconf'));
            echo json_encode($errors, JSON_UNESCAPED_UNICODE);
        }
        else
        {///
            
            $user_data['login'] = $this->input->post()['login'];
            $user_data['email'] = $this->input->post()['email'];
            $user_data['password'] = md5($this->input->post()['password']);
            $user_data['activation_key'] = md5('13'.$user_data['login']);
            $this->load->model('Sign_up_model','', TRUE);
            $this->Sign_up_model->add_user($user_data);
            echo $this->send_code($user_data);
        }
    }

    function send_code($user)
    {
        $code = $user['activation_key'];
        if (! method_exists($this, 'Sign_up_model'))
            $this->load->model('Sign_up_model','', TRUE);
        $user['id'] = $this->Sign_up_model->get_user('login', $user['login'])->id;
        $link = base_url()."sign_up/activate/".$user['id']."/".$code;


        $this->load->library('email');

        $this->email->from('users_service@lost-bikes.zzz.com.ua', 'Lost Bikes');
        $this->email->to($user['email']);
        $this->email->subject('Account Activation');
        $this->email->message("Для активации Вашего аккаунта перейдите по ссылке: ".$link);

        if (! $this->email->send())
        {
            return $this->email->print_debugger();
        }
        else return "OK";
    }

    function activate($id, $code)
    {
        //echo "Я функция активации и получила логин ".$id." и код активации ".$code;
        if (! method_exists($this, 'Sign_up_model'))
            $this->load->model('Sign_up_model','', TRUE);
        $user = $this->Sign_up_model->get_user('id', $id);
        if ($user->activation_key != $code) {
            return FALSE;
        }
        else{
            $this->Sign_up_model->activate($user->id);
            $this->data['content'] = $this->load->view('activation_success', '', TRUE);
            $this->load->view('basic_template', $this->data);
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}