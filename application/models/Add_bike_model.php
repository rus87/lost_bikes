<?php
class Add_bike_model extends MY_Model
{
    function add_bike($data)
    {
        $this->db->insert('bikes', $data);
    }    
}