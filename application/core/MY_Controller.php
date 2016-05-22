<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public $logged_in;
    public $data = array('content' => NULL);
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        
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
    }
}