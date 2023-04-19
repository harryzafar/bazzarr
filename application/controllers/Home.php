<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('Pro_model');
		$this->load->Model('User_model');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['cartItems'] = $this->cart->contents();
		$data['populars'] = $this->Pro_model->popular_pro();
		$data['products'] = $this->Pro_model->latest_pro();
		$this->load->view('front/common/header.php');
		$this->load->view('front/home.php', $data);
		$this->load->view('front/common/footer.php', $data);
	}

	public function about(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/about.php');
		$this->load->view('front/common/footer.php',$data);
	}

	public function contact(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('number', 'Phone Number', 'required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');
		if($this->form_validation->run() == true){
			$formdata = [
				'name' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'mobile' => $this->input->post('number'),
				'message' => $this->input->post('message'),
			];
		
		$register = $this->User_model->contact($formdata);	
		if($register== true){
			$this->session->set_flashdata('sent', "Thank You! We will revert you soon.");
		}
		}
		$this->load->view('front/common/header.php');
		$this->load->view('front/contact.php');
		$this->load->view('front/common/footer.php',$data);
	}
	
	public function faq(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/faq.php');
		$this->load->view('front/common/footer.php',$data);
	}

	public function policy(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/policy.php');
		$this->load->view('front/common/footer.php',$data);
	}
   
	public function terms(){
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/terms.php');
		$this->load->view('front/common/footer.php',$data);
	}
	
	public function login(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[8]|callback_strong_password');
		if($this->form_validation->run()== true){
			$formdata = [
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			];
		 $result = $this->User_model->login($formdata);
		 if($result == false){
			$this->session->set_flashdata('login_error','Invalid Email or Password');
			
		 }
		 else{
			$userinfo = [
				'name' => $result->username,
				'email' => $result->email
			];
			$this->session->set_userdata('user', $userinfo);
			redirect('home');
		 }	
		}
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/login.php');
		$this->load->view('front/common/footer.php',$data);
	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect('home');
	}

	public function strong_password($str){
		if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $str)) {
			return TRUE;
		  }
		  $this->form_validation->set_message('strong_password', 'The password must be contains at least one uppercase letter, one digit and one special character.');
		  return FALSE;
	}
	public function register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array('is_unique' => 'This %s  is already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|callback_strong_password');
		if($this->form_validation->run() == true){
			$formdata = [
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			];
		
		$register = $this->User_model->register($formdata);	
		if($register== true){
			$this->session->set_flashdata('registration', "Your registration successfully  done!");
			redirect('home/login');
		}
		}
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('front/common/header.php');
		$this->load->view('front/register.php');
		$this->load->view('front/common/footer.php',$data);
	}


	

}
