<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bikes extends MY_Controller {
    
    private $per_page = 6;
    
    public function __construct()
    {
        parent :: __construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('MY_form_validation');
        $this->load->library('pagination');
        $this->load->model('Bikes_model', '', TRUE);

    }

	public function show($offset = 0)
	{
        $config['base_url'] = base_url().'bikes/show';
        $config['total_rows'] = $this->Bikes_model->bikes_count();
        $config['per_page'] = $this->per_page;
        $config['first_link'] = 'В начало';
        $config['last_link'] = 'В конец';
        $config['cur_tag_open'] = '<span id="cur_page_num">';
        $config['cur_tag_close'] = '</span>';
        $config['first_tag_open'] = '<span class="edge_page">';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="edge_page">';
        $config['last_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $this->data['pages'] = array('pages' => $this->pagination->create_links());
        $this->data['menu_active_btn'] = array('add_bike' => '', 'bikes' => 'active');
        
        
        $bikes = $this->Bikes_model->get_bikes($offset, $this->per_page);
        $bikes_html = '';
        foreach($bikes as $bike)
        {
            $photo = explode('.', $bike['photo']);
            $bike['photo'] = base_url().'uploads/'.$photo[0].'_thumb.'.$photo[1];
            $bike['link'] = base_url().'bike/show/'.$bike['id'];
            $bikes_html .= $this->load->view('bikes_bike_prev', $bike, TRUE);
        }
        $this->data['bikes_html'] = array('bikes_html' => $bikes_html);
        $this->data['bikes_html']['bikes_html'] .= $this->load->view('pagination', $this->data['pages'], TRUE);
        $this->data['content'] = $this->load->view('bikes', $this->data['bikes_html'], TRUE);
		$this->load->view('basic_template', $this->data);
	}
    
    function check()
    {
        $bikes_html = '';
        $query = $this->input->post('search_query', TRUE);
       
        $bikes = $this->Bikes_model->search($query);
        if($bikes)
        {
            foreach($bikes as $bike)
            {
                $photo = explode('.', $bike['photo']);
                $bike['photo'] = base_url().'uploads/'.$photo[0].'_thumb.'.$photo[1];
                $bike['link'] = base_url().'bike/show/'.$bike['id'];
                $bikes_html .= $this->load->view('bikes_bike_prev', $bike, TRUE);
            }
            echo $bikes_html;
        }
        else echo "nothing found";
            

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}