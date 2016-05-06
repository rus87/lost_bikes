<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends MY_Controller {
    
    function sign_in()
    {
        $data = array('response' => '', 'error' => '');
        $form_data = $this->input->post(NULL, TRUE);
        $this->load->model('Authorization_model', '', TRUE);
        $user = $this->Authorization_model->get_user($form_data['login']);
        if(!$user)  $data['error'] = 'Нет пользователя с таким логином';
        else
        {
            if(md5($form_data['password']) != $user->password) $data['error'] = 'Пароль неправильный';
            else
            {
                if(! $user->active) $data['error'] = 'Учетная запись не активирована';
                else
                {
                    Session :: set('user', $user->login);
                    
                    $data['response'] = $this->load->view('navbar_user', '', TRUE);
                }
            }
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        
    }
    
    function log_out()
    {
        Session :: destroy();
        //header("Location: ".base_url());
        echo $this->load->view('navbar_auth','', TRUE);
    }
}