<?php
class Authorization_model extends CI_Model
{
    function get_user($login)
    {
        $query = $this->db->get_where('users', array('login' => $login), 1);
        if($query->num_rows() == 1) return $query->row();
        else return FALSE;
    }
}