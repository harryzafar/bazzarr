<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function login($data){
      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('username', $data['username']);
      $row = $this->db->get()->row_array();
      return $row;
      // $chek_pass = password_verify($data['password'], $row['password']);
      // if($chek_pass){
      //   return $row;
      // }
      // else{
      //   return false;
      // }
    }
	
}
