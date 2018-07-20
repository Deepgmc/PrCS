<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
   public function get_current_user_data($login)
   {
     $a = new stdClass();
     $this->db->select('*');
     $this->db->from('users');
     $this->db->where('login', $login);
     return $this->db->get()->result();
   }
}
