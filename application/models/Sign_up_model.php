<?php
class Sign_up_model extends MY_Model
{
    function add_user($data)
    {
        $this->db->insert('lb_users', $data);
    }

    function activate($id)
    {
        $this->db->where('id', $id);
        $this->db->update('lb_users', array('active' => TRUE));
    }
}
