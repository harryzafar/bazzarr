<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_model extends CI_Model {
   public function create($formData){
    $this->db->insert('category', $formData);
    return true;
   }

   public function read($params=[]){
      if(!empty($params['search_query'])){
         $this->db->like('name', $params['search_query']);
      }
    $result = $this->db->get('category')->result_array();
    return $result;
   }

   public function edit($id){
     $result = $this->db->get_where('category', array('id'=> $id))->row_array();
      return $result;
   }

   public function update($id, $formData){
      $this->db->where('id', $id);
      $this->db->update('category',$formData);
   }

   public function delete($id){
      $this->db->delete('category', array('id'=> $id));
   }
}