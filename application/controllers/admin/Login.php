<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->Model('Admin_model');
    }
    public function index(){
        $this->load->view('admin/login.php');
    }

    public function authentication(){
        
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        if($this->form_validation->run() == true){
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];
            $result = $this->Admin_model->login($data);
            if($result != false){ 
                $adminData = [
                    'name' => $result['username']
                ];
                $this->session->set_userdata('admin', $adminData);
                redirect('admin/home');
            }
            else{
                $this->session->set_flashdata('error',"Username or Password are incorrect");
                $this->index(); 
            }
        }
        else{
            $this->session->set_flashdata('error',"Username or Password are incorrect");
            $this->index();
        } 
    }
	
}