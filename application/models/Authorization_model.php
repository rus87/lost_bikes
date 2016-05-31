<?php
class Authorization_model extends MY_Model
{

    function set_remember_hash($hash, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('lb_users', array('remember' => $hash));
    }


    function set_client_info($id, $field, $value)
    {
        $this->db->where('id', $id);
        $this->db->update('lb_users', array($field => $value));
    }

}