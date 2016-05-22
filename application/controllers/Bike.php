<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bike extends MY_Controller {
    
    private $bike_data;
    
    
    function show($id)
    {
        $this->data['menu_active_btn'] = array('add_bike' => '', 'bikes' => '');
		
        
        $this->load->model('Bike_model', '', TRUE);
        $data = $this->Bike_model->get_bike($id);
        
        foreach(PARTS_KEYS as $key)
        {
            if(isset($data[$key]))
            {
                $existing_keys [$key]= $key;
                $existing_values [$key]= $data[$key];
            }
        }
        
        $photo = explode('.', $data['photo']);
        $this->bike_data['user_id'] = $data['user_id'];
        $this->bike_data['id'] = $data['id'];
        $this->bike_data['heading'] = strtoupper($data['frame']);
        $this->bike_data['location'] = $data['location'];
        isset($data['comment']) ? $this->bike_data['comment'] = $data['comment'] : $this->bike_data['comment'] = NULL;
        $this->bike_data['user_login'] = $data['user_login'];
        $this->bike_data['created'] = $data['created'];
        $this->bike_data['loss_date'] = $data['loss_date'];
        $this->bike_data['keys'] = $existing_keys;
        $this->bike_data['values'] = $existing_values;
        $this->bike_data['photo_thumb'] = base_url().'uploads/'.$photo[0].'_thumb.'.$photo[1];
        $this->bike_data['photo_popup'] = array('photo_popup' => base_url().'uploads/'.$photo[0].'_popup.'.$photo[1]);
        $this->bike_data['photo_orig'] = base_url().'uploads/'.$data['photo'];
        if ($this->logged_in != NULL) {
            if($this->bike_data['user_login'] == $this->logged_in->login)
                $this->data['content'] = $this->load->view('bike_owner', $this->bike_data, TRUE);
        }
        else $this->data['content'] = $this->load->view('bike', $this->bike_data, TRUE);

        $this->data['content'] .= $this->load->view('popup_photo', $this->bike_data['photo_popup'], TRUE);
        $this->load->view('basic_template', $this->data);
        
    }

    function edit_part()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = (int)$input['bike_id'];

        $this->load->model('Bike_model', '', TRUE);


        if (array_key_exists($input['part_key'], BIKE_PARTS) && $id != 0) {
            if ($this->Bike_model->get_bike($id)['user_id'] == $this->logged_in->id) {
                $this->Bike_model->update_field($id, $input['part_key'], $input['part_value']);
                echo "OK";
            }

        }
    }
    
}