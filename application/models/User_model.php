<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function register($data){
       $regsitration =  $this->db->insert('users',$data);
        if($regsitration){
            return true;
        }
        else{
            return false;
        }
    }
    public function login($data){
        $this->db->select('*');
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $this->db->from('users');
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }
        else{
            return false;
        }
    }
	
    public function contact($formdata){
       $result =  $this->db->insert('contact', $formdata);
       if($result){
        return true;
       }
       else{
        return false;
       }
    }
}
