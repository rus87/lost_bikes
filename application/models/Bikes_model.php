<?php
class Bikes_model extends MY_Model
{
    function search($input)
    {
        
        $this->db->or_like('frame', $input);
        $this->db->or_like('frame_serial', $input);
        $this->db->or_like('fork', $input);
        $this->db->or_like('amort', $input);
        $this->db->or_like('break_front', $input);
        $this->db->or_like('break_rear', $input);
        $this->db->or_like('crankset', $input);
        $this->db->or_like('der_front', $input);
        $this->db->or_like('der_rear', $input);
        $this->db->or_like('cassette', $input);
        $this->db->or_like('sleeve_front', $input);
        $this->db->or_like('sleeve_rear', $input);
        $this->db->or_like('rims', $input);
        $this->db->or_like('tire_front', $input);
        $this->db->or_like('tire_rear', $input);
        $this->db->or_like('chainguide', $input);
        $this->db->or_like('handlebar', $input);
        $this->db->or_like('stem', $input);
        $this->db->or_like('location', $input);
        
        $query = $this->db->get('bikes');

        //return $query->result();
        return $this->fetch_result($query->result());
    }
    
    function get_bikes($offset, $per_page)
    {
        //$offset = ($page - 1) * $per_page;
        $this->db->order_by('modified', 'DESC');
        $query = $this->db->get('bikes', $per_page, $offset);
        return $this->fetch_result($query->result());
    }
    
    function bikes_count()
    {
        return $this->db->count_all('bikes');
    }
    
    
    function fetch_result($input)
    {
        foreach($input as $row)
        {
            $bikes []= array(
                'frame' => $row->frame,
                'location' => $row->location,
                'loss_date' => $row->loss_date,
                'photo' => $row->photo,
                'id' => $row->id);
        }
        return $bikes;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

