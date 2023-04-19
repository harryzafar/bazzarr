<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('Pro_model');
		$this->load->library('cart');
		
	}

	
	public function index()
	{
		$data['products'] = $this->Pro_model->all_products();
		$number = $this->Pro_model->pro_count();
		$data['pro_count'] = $number;
		$data['brands'] = $this->Pro_model->brand();
		$data['categories'] = $this->Pro_model->get_category();
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/shop.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}

	public function fetch_data(){
		$action = $this->input->post('action');
		$category = $this->input->post('category');
		$brand = $this->input->post('brand');
		$min_price = $this->input->post('min_price');
		$max_price = $this->input->post('max_price');
		$search = $this->input->post('search');

		$this->load->Model('Filter_model');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->Filter_model->count_all($category, $brand, $min_price, $max_price, $search);
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Prev';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='page-item active'><a href='#' class='page-link'>";
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class'=> 'page-link');
		$config['num_links'] = 3;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page-1)*$config['per_page'];
		$limit = $config['per_page'];
		$output['pagination_links'] = $this->pagination->create_links();
		$output['product_list'] = $this->Filter_model->filter($limit, $start, $category, $brand, $min_price, $max_price, $search);
		// this is only for showing all product number in view
		$output['total_pro'] = $this->Filter_model->count_all($category, $brand, $min_price, $max_price, $search);
		echo json_encode($output);
	  }

	public function view($id){
		$result = $this->Pro_model->product_info($id);
		echo json_encode($result);
	}

	public function product($id){
		$data['product_info'] = $this->Pro_model->product_info($id);
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/product.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}

	public function addCart($id){
		$product = $this->Pro_model->product_info($id);
		$qty = 1;
		if($this->input->post('qty')){
			$qty = $this->input->post('qty');
		}
		$size = "M";
		if($this->input->post('size')){
			$size = $this->input->post('size');
		}

		$data = [
			'id' => $product['id'],
			'qty' => $qty,
			'price' => $product['price'],
			'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $product['title']),
			'image' => $product['image'],
			'brand' => preg_replace('/[^A-Za-z0-9\-]/', '', $product['brand']),
			'size' => $size
		];
		
		$this->cart->insert($data);
		redirect('shop/cart');
		
	}
	public function cart(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/cart.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}
	public function removeItem($rowid){
		$remove = $this->cart->remove($rowid);
		redirect('shop/cart');
	}
	public function updateQty(){
		$update = 0;
		$refId = $this->input->get('refId');
		$qty = $this->input->get('qty');
		if(!empty($refId) && !empty($qty)){
			$data = [
				'rowid' => $refId,
				'qty' => $qty
			];
			$update = $this->cart->update($data);
				
		}
		echo $update?'ok':'err';
	}

	public function checkout(){
		if($this->cart->total_items() <= 0 ){
			redirect('shop/cart');
		}
		$this->load->library('form_validation');
		$custdata = $data = array();
			
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required|min_length[10]|max_length[10]|numeric');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('pincode', 'Pin Code', 'required|numeric|min_length[6]');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('payment_method', 'Peyment method', 'required');
			if($this->form_validation->run()== true){
				$payment_method = $this->input->post('payment_method');
				if($payment_method == "prepaid"){
					redirect('shop/notfound/');
				}
				else{
					$custdata = [
						'custname' => strip_tags($this->input->post('name')),
						'custmail' => strip_tags($this->input->post('email')),
						'custphone' => strip_tags($this->input->post('phone')),
						'custcity' => strip_tags($this->input->post('city')),
						'custpin' => strip_tags($this->input->post('pincode')),
						'custadd' => strip_tags($this->input->post('address'))
					];
					// insert customer data
					$custId = $this->Pro_model->insertCustomers($custdata);
	
					// check customer data insert status
					if($custId ==!false){
						$orderId = $this->placeOrder($custId);
	
						// if order submission is successfull
						if($orderId){
							$this->session->set_userdata('success_msg','Order Placed successfully.');
							redirect('shop/orderstatus/'.$orderId);
						}else{
							$data['error_msg'] = 'Order Submission Failed, Please try again';
						}
					}else{
						$data['erroe_msg'] = 'Some problems accured, Please try again';
					}
				}
				

			}
		$data['cartItems'] = $this->cart->contents();	
		$this->load->view('front/common/header.php');
		$this->load->view('front/checkout.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}

	public function placeOrder($custId){
		$orderData = [
			'cust_id' => $custId,
			'grand_total' => $this->cart->total()-100
		];
		$orderId = $this->Pro_model->orders($orderData);
		if($orderId ==!false){
			// retrieve cart data from session
			$cartItems = $this->cart->contents();

			// cart Items
			$orderItemData = array();
			$i=0;
			foreach($cartItems as $item){
				$orderItemData[$i]['order_id'] = $orderId;
				$orderItemData[$i]['product_id'] = $item['id'];
				$orderItemData[$i]['quantity'] = $item['qty'];
				$orderItemData[$i]['size'] = $item['size'];
				$orderItemData[$i]['subtotal'] = $item['subtotal'];
				$i++;
			}
			if(!empty($orderItemData)){
				// insert order items
				$insertOrderItems = $this->Pro_model->order_items($orderItemData);

				if($insertOrderItems){
					// remove items from cart
					$this->cart->destroy();

					// return order id
					return $orderId;
				}
			}
			
		}
	}

	public function orderstatus($orderId){
		$data['order'] = $this->Pro_model->getOrder($orderId);
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/orderStatus.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}
	public function notfound(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/notavailable.php');
		$this->load->view('front/common/footer.php', $data);
	}
}
