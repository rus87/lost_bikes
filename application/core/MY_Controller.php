<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public $logged_in;
    public $data = array('content' => NULL);
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Authorization_model', '', TRUE);
        
        Session :: init();
        $this->auth_check();

        $this->logged_in ? $this->data['user_panel'] = $this->load->view('navbar_user','', TRUE) :
            $this->data['user_panel'] = $this->load->view('navbar_auth','', TRUE);
        $this->data['menu_active_btn'] = array('add_bike' => '', 'bikes' => '');
    }
    
    function auth_check()
    {
        $this->logged_in = NULL;
        if(isset($_SESSION['user'])) 
        {
            $this->logged_in = $_SESSION['user'];
        }
        else
        {
            $remember_hash = $this->input->cookie('token', TRUE);
            $user_id = $this->input->cookie('id', TRUE);
            if($remember_hash != NULL && $user_id != NULL)
            {
                $user = $this->Authorization_model->get_user('id', $user_id);
                if(is_object($user))
                {
                    if ($remember_hash == $user->remember) {
                        $this->logged_in = $user;
                        Session::set('user', $user);
                    }
                    else {
                        $this->input->set_cookie('token', '');
                        $this->input->set_cookie('id', '');
                    }
                }
                else{
                    $this->input->set_cookie('token', '');
                    $this->input->set_cookie('id', '');
                }

            }

        }
    }
}