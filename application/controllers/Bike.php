<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bike extends MY_Controller {
    
    private $bike_data;
    
    
    function show($id)
    {
        if($this->logged_in)
            $this->data['user_panel'] = $this->load->view('navbar_user','', TRUE);
        else
            $this->data['user_panel'] = $this->load->view('navbar_auth','', TRUE);
        $this->data['menu_active_btn'] = array('add_bike' => '', 'bikes' => '');
		
        
        $this->load->model('Bike_model', '', TRUE);
        $data = $this->Bike_model->get_bike($id);
        
        foreach(PARTS_KEYS as $key)
        {
            if(isset($data[$key]))
            {
                $existing_keys []= $key;
                $existing_values [$key]= $data[$key];
            }
        }
        
        $photo = explode('.', $data['photo']);
        $this->bike_data['heading'] = strtoupper($data['frame']);
        $this->bike_data['location'] = $data['location'];
        isset($data['comment']) ? $this->bike_data['comment'] = $data['comment'] : $this->bike_data['comment'] = NULL;
        $this->bike_data['user_login'] = $data['user_login'];
        $this->bike_data['created'] = $data['created'];
        $this->bike_data['loss_date'] = $data['loss_date'];
        $this->bike_data['keys'] = $existing_keys;
        $this->bike_data['values'] = $existing_values;
        $this->bike_data['photo'] = base_url().'uploads/'.$photo[0].'_thumb.'.$photo[1];
        
        $this->data['content'] = $this->load->view('bike', $this->bike_data, TRUE);
        $this->load->view('basic_template', $this->data);
        
    }
    
}