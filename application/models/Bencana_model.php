<?php

class Bencana_model extends CI_model
{
    public function getAllBencana()
    {
        return $this->db->get('bencana')->result_array();
    }

    
}