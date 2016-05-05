<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		$this->load->view('html_head');
        $this->load->view('navbar_guest');
        $this->load->view('html_bottom');
	}
}