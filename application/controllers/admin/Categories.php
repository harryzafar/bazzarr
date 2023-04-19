<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin')){
            $this->session->set_flashdata('error', 'Please Login First');
            redirect('admin/login');
        }
        $this->load->Model('Cat_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $search_query = $this->input->get('q');
        $params['search_query'] = $search_query;
        $catagories = $this->Cat_model->read($params);
        $data['rows'] = $catagories;
        $data['search'] = $search_query;
        $this->load->view('admin/header.php');
        $this->load->view('admin/view_cat.php',$data);
        $this->load->view('admin/footer.php');
    }
    public function add(){
           $data['heading'] = "Add New Category";
            $this->load->view('admin/header.php');
            $this->load->view('admin/add_cat.php', $data);
            $this->load->view('admin/footer.php');
    }
    
    public function create(){
        
        // configuration for uplaod image
        $config['upload_path']          = './public/uploads/category';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|webp';
        $this->load->library('upload', $config);


        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($this->form_validation->run()== true){
           if($_FILES['image']['name']){
               if($this->upload->do_upload('image')){
                // uploaded
                $upload_data = $this->upload->data();
                

                // resizing / creating thumbnail
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['new_image'] = $upload_data['file_path'].'thumb/';
                $config2['create_thumb'] = TRUE;
                $config2['thumb_marker'] = '';
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 200;
                $config2['height'] = 200;

                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // saving database
                $formData = [
                    'name' => $this->input->post('name'),
                    'image' => $upload_data['file_name'],
                    'status' => $this->input->post('status'), 
                    'created_at' => date("Y:m:d H:i:s")
                   ];
                $this->Cat_model->create($formData);
                $this->session->set_flashdata('msg', "New Category Added Successfully");
                redirect(base_url('admin/categories'));
               }
               else{
                // error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
                $this->add();
               }
                      
           }
           else{
            // save into database without image
            $formData = [
                    'name' => $this->input->post('name'),
                    'status' => $this->input->post('status'), 
                    'created_at' => date("Y:m:d H:i:s")
                   ];
            $this->Cat_model->create($formData);
            $this->session->set_flashdata('msg', "New Category Added Successfully");
            redirect(base_url('admin/categories'));    
           }
        }
        else{
            $this->add();
        }
               
    }


    public function edit($id){
        
        $result = $this->Cat_model->edit($id);

        $config['upload_path']          = './public/uploads/category';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|webp';
        $this->load->library('upload', $config);


        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($this->form_validation->run()== true){
           if($_FILES['image']['name']){
               if($this->upload->do_upload('image')){
                // uploaded
                $upload_data = $this->upload->data();
                

                // resizing / creating thumbnail
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['new_image'] = $upload_data['file_path'].'thumb/';
                $config2['create_thumb'] = TRUE;
                $config2['thumb_marker'] = '';
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 200;
                $config2['height'] = 200;

                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // replace old image
                if(file_exists('./public/uploads/category/'.$result['image'])){
                    unlink('./public/uploads/category/'.$result['image']);
                }
                if(file_exists('./public/uploads/category/thumb/'.$result['image'])){
                    unlink('./public/uploads/category/thumb/'.$result['image']);
                }

                // saving database
                $formData = [
                    'name' => $this->input->post('name'),
                    'image' => $upload_data['file_name'],
                    'status' => $this->input->post('status'), 
                    'updated_at' => date("Y:m:d H:i:s")
                   ];
                $this->Cat_model->update($id, $formData);
                $this->session->set_flashdata('msg', "Category Updated Successfully");
                redirect(base_url('admin/categories'));
               }
               else{
                // error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
               }
                      
           }
           else{
            // save into database without image
            $formData = [
                    'name' => $this->input->post('name'),
                    'status' => $this->input->post('status'), 
                    'updated_at' => date("Y:m:d H:i:s")
                   ];
            $this->Cat_model->update($id, $formData);
            $this->session->set_flashdata('msg', "Category Updated Successfully");
            redirect(base_url('admin/categories'));    
           }
        }

        $data['row'] = $result;
        $data['heading'] = "Edit Category";
        $this->load->view('admin/header.php');
        $this->load->view('admin/edit_cat.php', $data);
        $this->load->view('admin/footer.php');
    }


    public function delete($id){
        // laod model for category detail to delete image file
        $result = $this->Cat_model->edit($id);

        // image file delete
        if(file_exists('./public/uploads/category/'.$result['image'])){
            unlink('./public/uploads/category/'.$result['image']);
        }
        if(file_exists('./public/uploads/category/thumb/'.$result['image'])){
            unlink('./public/uploads/category/thumb/'.$result['image']);
        }

        // delete database
        $this->Cat_model->delete($id);

        // return with success msg
        $this->session->set_flashdata('msg', "Category has been deleted Successfully!");
        redirect(base_url('admin/categories'));

    }
}
