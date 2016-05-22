<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_bike extends MY_Controller {
    
    public function __construct()
    {
        parent :: __construct();
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        $this->load->library('MY_form_validation');
    }
    
    function index()
    {
        ($this->logged_in) ? $this->data['content'] = $this->load->view('add_bike','', TRUE) :
            $this->data['content'] = $this->load->view('permission_denied','', TRUE);

        
        $this->data['menu_active_btn'] = array('add_bike' => 'active', 'bikes' => '');
		$this->load->view('basic_template', $this->data);
    }
    
    function add()
    {

        $this->form_validation->run('add_bike');
        if(validation_errors())
        {
            echo validation_errors();
        }
        else
        {
            $config['upload_path'] ='uploads';
            $config['allowed_types'] = 'jpg|jpeg';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if( ! $this->upload->do_upload('photo')) echo $this->upload->display_errors();
            else
            {
                $this->load->model('Add_bike_model','', TRUE);
                $this->data['bike'] = $this->input->post(NULL, TRUE);
                $this->data['bike']['photo'] = $this->upload->data('file_name');
                $this->data['bike']['created'] = date('Y-n-d H:i:s');
                $this->data['bike']['user_id'] = $this->Add_bike_model->get_user('login',$this->logged_in->login)->id;
                $this->Add_bike_model->add_bike($this->data['bike']);
                $this->create_images($this->upload->data('file_name'));
                echo "OK";
            }
        }
    }
    
    function create_images($orig_name)
    {
        
        $this->crop_resize($orig_name);
        $this->resize_img($orig_name);
    }
    
    function resize_img($orig_name, $suffix = '_popup', $width = 850, $height = 550)
    {
        $name = explode('.', $orig_name)[0];
        $type = explode('.', $orig_name)[1];
        $is_resized = FALSE;

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/'.$orig_name;
        $config['create_thumb'] = TRUE;
        $config['thumb_marker'] = $suffix;
        $config['maintain_ratio'] = TRUE;
        $this->load->library('image_lib');

        $orig_width = getimagesize('uploads/'.$orig_name)[0];

        if($orig_width > $width)
        {   
            $config['width'] = $width;
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if(! $this->image_lib->resize()) echo $this->image_lib->display_errors();
            else $is_resized = TRUE;
        }

        if(file_exists('uploads/'.$name.$suffix.'.'.$type))
            $hght = getimagesize('uploads/'.$name.$suffix.'.'.$type)[1];
        else $hght = getimagesize('uploads/'.$orig_name)[1];


        if($hght > $height)
        {
            unset($config['width']);
            $this->image_lib->clear();
            $config['height'] = $height;
            $this->image_lib->initialize($config);
            if(! $this->image_lib->resize()) echo $this->image_lib->display_errors();
            else $is_resized = TRUE;
        }
        
        if($is_resized == FALSE)
            copy('uploads/'.$orig_name, 'uploads/'.$name.$suffix.'.'.$type);
    }
    
    public function crop_resize($orig_name, $suffix = '_thumb', $size = 180)
    {
        $name = explode('.', $orig_name)[0];
        $type = explode('.', $orig_name)[1];
        $orig_height = getimagesize('uploads/'.$orig_name)[1];
        $orig_width = getimagesize('uploads/'.$orig_name)[0];
        
        if($orig_width > $orig_height)
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/'.$orig_name;
            $config['create_thumb'] = TRUE;
            $config['thumb_marker'] = $suffix;
            $config['maintain_ratio'] = TRUE;
            $config['height'] = $size;
            $this->load->library('image_lib', $config);
            if(! $this->image_lib->resize()) echo $this->image_lib->display_errors();
            else
            {

                unset($config);
                $this->image_lib->clear();
                
                $cropped_height = getimagesize('uploads/'.$name.$suffix.'.'.$type)[1];
                $cropped_width = getimagesize('uploads/'.$name.$suffix.'.'.$type)[0];
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = $cropped_height + ($cropped_width - $cropped_height)/2;
                $this->image_lib->initialize($config);
                if(! $this->image_lib->crop()) echo $this->image_lib->display_errors();
                else
                {
                    unset($config);
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                    $config['rotation_angle'] = 'hor';
                    
                    $this->image_lib->initialize($config);
                    if(! $this->image_lib->rotate()) echo $this->image_lib->display_errors();
                    else
                    {
                        unset($config);
                        $this->image_lib->clear();

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                        $config['maintain_ratio'] = FALSE;
                        $config['width'] = $cropped_height;
                        $this->image_lib->initialize($config);
                        if(! $this->image_lib->crop()) echo $this->image_lib->display_errors();
                        else
                        {
                            unset($config);
                            $this->image_lib->clear();
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                            $config['rotation_angle'] = 'hor';

                            $this->image_lib->initialize($config);
                            if(! $this->image_lib->rotate()) echo $this->image_lib->display_errors();
                        }
                    }
                }
            }
        }
        else
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/'.$orig_name;
            $config['create_thumb'] = TRUE;
            $config['thumb_marker'] = $suffix;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $size;
            $this->load->library('image_lib', $config);
            if(! $this->image_lib->resize()) echo $this->image_lib->display_errors();
            else
            {
                unset($config);
                $this->image_lib->clear();
                
                $cropped_height = getimagesize('uploads/'.$name.$suffix.'.'.$type)[1];
                $cropped_width = getimagesize('uploads/'.$name.$suffix.'.'.$type)[0];
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                $config['maintain_ratio'] = FALSE;
                $config['height'] = $cropped_width + ($cropped_height - $cropped_width)/2;
                $this->image_lib->initialize($config);
                if(! $this->image_lib->crop()) echo $this->image_lib->display_errors();
                else
                {
                    unset($config);
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                    $config['rotation_angle'] = 'vrt';
                    
                    $this->image_lib->initialize($config);
                    if(! $this->image_lib->rotate()) echo $this->image_lib->display_errors();
                    else
                    {
                        unset($config);
                        $this->image_lib->clear();

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                        $config['maintain_ratio'] = FALSE;
                        $config['height'] = $cropped_width;
                        $this->image_lib->initialize($config);
                        if(! $this->image_lib->crop()) echo $this->image_lib->display_errors();
                        else
                        {
                            unset($config);
                            $this->image_lib->clear();
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = 'uploads/'.$name.$suffix.'.'.$type;
                            $config['rotation_angle'] = 'vrt';

                            $this->image_lib->initialize($config);
                            if(! $this->image_lib->rotate()) echo $this->image_lib->display_errors();
                        }
                    }
                }
            }
        }
        
    }
    
    
}


























