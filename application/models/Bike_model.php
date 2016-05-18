<?php
class Bike_model extends MY_Model
{
    function get_bike($id)
    {

        $data = $this->db->get_where('bikes', array('id' => $id), 1)->result_array();
        
        foreach(array_keys($data[0]) as $key)
        {
            if($data[0][$key] == '') unset($data[0][$key]);
        }
        
        $data[0]['user_login'] = $this->db->get_where('users', array('id' => $data[0]['user_id']), 1)->result()[0]->login;
        return $data[0];
    }
}
