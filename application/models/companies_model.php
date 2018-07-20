<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies_model extends CI_Model {

   // companies list
   public function get_all_companies()
   {
     $this->db->select('*');
     $this->db->from('companies');
     return $this->db->get()->result();
   }

   // isngle company
   public function get_current_company($id)
   {
     $this->db->select('*');
     $this->db->from('companies');
     $this->db->where('id', $id);
     return $this->db->get()->result()[0];
   }
}
