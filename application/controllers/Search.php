<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {
    
    public function __construct()
    {
        parent :: __construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('MY_form_validation');
        $this->load->model('Search_model', '', TRUE);
    }

	public function index()
	{
        $this->logged_in ? $this->data['user_panel'] = $this->load->view('navbar_user','', TRUE) : 
        $this->data['user_panel'] = $this->load->view('navbar_auth','', TRUE);
        $this->data['menu_active_btn'] = array('add_bike' => '', 'search' => 'active');
        
        $result = $this->Search_model->get_last_n_bikes(8);
        $bikes = '';
        foreach($result as $row)
        {
            $img = explode('.', $row->photo);
            $data['frame'] = $row->frame;
            $data['img'] = 'uploads/'.$img[0].'_thumb.'.$img[1];
            $data['location'] = $row->location;
            $data['loss_date'] = $row->loss_date;
            $bikes .= $this->load->view('search_bike_prev', $data, TRUE);
        }
        $this->data['bikes'] = $bikes;
        
        
        $this->data['content'] = $this->load->view('search', $this->data, TRUE);
		$this->load->view('basic_template', $this->data);
	}
    
    function check()
    {
        $bikes = '';
        $query = $this->input->post('search_query', TRUE);
       
        $result = $this->Search_model->search($query);
        //echo "<pre>";
        //var_dump($result);
        foreach($result as $row)
        {
            $img = explode('.', $row->photo);
            $data['frame'] = $row->frame;
            $data['img'] = 'uploads/'.$img[0].'_thumb.'.$img[1];
            $data['location'] = $row->location;
            $data['loss_date'] = $row->loss_date;
            $bikes .= $this->load->view('search_bike_prev', $data, TRUE);
        }
            
        echo $bikes;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}