<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_model extends CI_Model {
    public function mkquery($category, $brand, $min_price, $max_price, $search){
        $query = "SELECT `products`.*, `category`.`name` as `cat_name` FROM `products` LEFT JOIN `category` ON `category`.`id` = `products`.`cat_id` WHERE `products`.`status` = '1'";
       
        if(isset($category))
        {
         $cat_filter = implode("','", $category);
         $query .= "AND `category`.`name` IN('".$cat_filter."')
         ";
        }
        if(isset($brand)){
         $brand_filter = implode("','", $brand);
         $query .= "AND `brand` IN('".$brand_filter."')";
        }

        if(isset($min_price, $max_price) && !empty($min_price) &&  !empty($max_price))
        {
         $query .= "AND `price` BETWEEN '".$min_price."' AND '".$max_price."'";
        
        }
        if(isset($search)){
            $query .="AND `title` LIKE '%".$search."%'";
        }
        return $query; 
      }

      function count_all($category, $brand, $min_price, $max_price, $search)
      {
        $query = $this->mkquery($category, $brand, $min_price, $max_price, $search);
        $data = $this->db->query($query);
        return $data->num_rows();
      }
      
       public function filter($limit, $start, $category, $brand, $min_price, $max_price, $search){
        $query = $this->mkquery($category, $brand, $min_price, $max_price, $search);
        $query .= 'LIMIT '.$start.', '.$limit;
      
        $data = $this->db->query($query);
        $output = '';
        if($data->num_rows()>0){
          foreach($data->result_array() as $row){
            $output.='<div class="col-lg-4 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
            <div class="product-card">
                <div class="product-card-img">
                    <a  href="'.base_url().'shop/product/'.$row['id'].'">
                        <img class="primary-img" src="'.base_url().'public/uploads/products/front/'.$row['image'].'"
                            alt="product-img">
                    </a>

                    <div class="product-badge">
                        <span class="badge-label badge-percentage rounded">-44%</span>
                    </div>

                    <div
                        class="product-card-action product-card-action-2 justify-content-center">
                        <a href="javascript:void(0)" onclick="view('.$row['id'].')" class="action-card action-quickview quick"
                            data-bs-toggle="">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                    fill="#00234D" />
                            </svg>
                        </a>
                        <a href="'.base_url().'shop/addCart/'.$row['id'].'" class="action-card action-addtocart">
                            <svg class="icon icon-cart" width="24" height="26"
                                viewBox="0 0 24 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                    fill="#00234D" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="product-card-details">
                  <p class="mt-3 mb-0">'.$row['brand'].'</p>
                    <h3 class="product-card-title mt-0">
                        <a href="'.base_url().'shop/product/'.$row['id'].'">'.$row['title'].'</a>
                    </h3>
                    <div class="product-card-price">
                        <span class="card-price-regular"> &#8377;'.$row['price'].'</span>
                        <span
                            class="card-price-compare text-decoration-line-through"> &#8377;1759</span>
                    </div>
                </div>
            </div>
        </div>';
          }
        }
        else{
          $output = '<h3>No Data Found</h3>';
        }
        return $output;
       }
	
}
