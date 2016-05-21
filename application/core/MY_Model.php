<?php
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent :: __construct();
    }
    
    public function get_user($field, $input)
    {
        $query = $this->db->get_where('lb_users', array($field => $input), 1);
        if($query->num_rows() == 1) return $query->row();
        else return FALSE;
    }

    
    
}