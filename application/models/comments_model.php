<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

   public function get_comments($comment_type, $comId, $userId)
   {
     $this->db->select('*');
     $this->db->from('comments as c');
     $this->db->where('c.company_id', $comId);
     $this->db->where('c.type', $comment_type);
     $this->db->where('c.user_id', $userId);
     return $this->db->get()->result();
   }

   public function save_comment($comment_type, $comId, $userId, $text)
   {
      $date = date('Y-m-d');
      $insertData = array(
        'company_id' => $comId,
        'user_id' => $userId,
        'type' => $comment_type,
        'text' => $text,
        'add_date' => $date
     );
     $this->db->insert('comments', $insertData);
     return $date;
  }
}
