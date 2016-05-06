<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {
    
    public $logged_in;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        
        Session :: init();
        $this->auth_check();
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