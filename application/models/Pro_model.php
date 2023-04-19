<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro_model extends CI_Model {

    //  this will give products list ( all data of products table)
     public function pro_list($params= []) {
        if(!empty($params['search_query'])){
            $this->db->like('title',$params['search_query']);
        }
        $this->db->select('products.*,category.name as cat_name');
        $this->db->join('category','category.id = products.cat_id','LEFT');
        $this->db->limit($params['limit'], $params['offset']);
        $result = $this->db->get('products')->result_array();
        return $result;
     }
     

    //  this will give one row of selected item with unique id
    public function product_row($id){
        $result =  $this->db->get_where('products', array('id'=> $id))->row_array();
       return $result;
    }

    // this will give brnad of all products
    public function brand(){
        $this->db->select('brand');
        $this->db->distinct();
       $brand =  $this->db->get('products')->result_array();
       return $brand;
    }

    //  this will give number of row of products
    public function num_products(){
        $count =  $this->db->count_all_results('products');
       return $count;
    }
    //this will insert data into database
    public function insert($formData){
        $this->db->insert('products', $formData);
    }

    // this will give update in products
    public function update($id, $formData){
        $this->db->where('id', $id);
        $this->db->update('products', $formData);
    }

    // this will delete seletect products
    public function delete($id){
        $this->db->delete('products', array('id' => $id));
    }


    // -------for front end method--------------
    // /home
    public function popular_pro(){
        $this->db->limit(4);
        $result = $this->db->get('products')->result_array();
        return $result;
    }
    public function latest_pro(){
        $this->db->limit(6);
        $this->db->order_by('created_at','DESC');
        $result = $this->db->get('products')->result_array();
        return $result;
    }

    // shop
    public function get_category(){
        $result = $this->db->get('category')->result_array();
        return $result;
    }

    public function all_products(){
        
        $result = $this->db->get('products')->result_array();
        return $result;
    }

    public function pro_count(){
        $result = $this->db->count_all_results('products');
        return $result;
    }
    

    //product
   public function product_info($id){
    $result = $this->db->get_where('products', array('id' => $id))->row_array();
    return $result;
   } 

    //checkout------------

    public function insertCustomers($data){
        // add created and modified date if not included
        if(!array_key_exists('created', $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists('modified', $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        $insert = $this->db->insert('customers', $data);
        // return this table id(customers id)
        return $insert?$this->db->insert_id():false;
    }

    public function orders($data){
         // add created and modified date if not included
         if(!array_key_exists('created', $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists('modified', $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        // insert order data
        $insert = $this->db->insert('orders', $data);

        // return this table id(order id)
        return $insert?$this->db->insert_id():false;

    }

    public function order_items($data = array()){
        // inset order items
        $insert = $this->db->insert_batch('order_items', $data);

        // return status
        return $insert?true:false;

    }

    public function getOrder($orderId){
        $this->db->select('o.*, c.custname, c.custmail, c.custphone, c.custcity, c.custpin, c.custadd');
        $this->db->from('orders as o');
        $this->db->join('customers as c', 'c.id = o.cust_id', 'left');
        $this->db->where('o.id', $orderId);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.title, p.price');
        $this->db->from('order_items as i');
        $this->db->join('products as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $orderId);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
}
