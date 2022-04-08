<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Style_model extends CI_Model
{

    public function getAllStyles()
    {
        $query = $this->db->get('styles');

        return $query;
    }
}

/* End of file Style_model.php */
