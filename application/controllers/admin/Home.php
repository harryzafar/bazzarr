<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin')){
            $this->session->set_flashdata('error', 'Please Login First');
            redirect('admin/login');
        }
    }
    public function index(){
        $this->load->view('admin/header.php');
        $this->load->view('admin/dashboard.php');
        $this->load->view('admin/footer.php');
    }
    
    public function logout(){
        $this->session->unset_userdata('admin');
        redirect(base_url('admin/login'));
    }
}
