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
        $this->load->view('html_head');
        $this->load->view('navbar_guest');
        $this->load->view('signup_view');
        $this->load->view('html_bottom');
    }
    
    function validate()
    {
        $config = array(
            array(
                'field' => 'login',
                'label' => 'Логин',
                'rules' => 'trim|required|min_length[3]|max_length[20]|is_unique[users.login]|cyr_alpha_dash',
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
                'rules' => 'trim|required|is_unique[users.email]|valid_email',
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
        //echo  validation_errors();
        if(validation_errors())
        {
            $errors = array('login' => form_error('login'),
                            'email' => form_error('email'),
                            'password' => form_error('password'),
                            'passconf' => form_error('passconf'));
            echo json_encode($errors, JSON_UNESCAPED_UNICODE);
        }
        else echo "OK";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}