<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file Admin_model.php */
