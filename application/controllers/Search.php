<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
        $this->logged_in ? $data['user_panel'] = $this->load->view('navbar_user','', TRUE) : 
        $data['user_panel'] = $this->load->view('navbar_auth','', TRUE);
        
		$this->load->view('html_head');
        $this->load->view('navbar', $data);
        $this->load->view('html_bottom');
	}
}