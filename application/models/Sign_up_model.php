<?php
class Sign_up_model extends CI_Model
{
    function add_user($data)
    {
        $this->db->insert('users', $data);
    }
}