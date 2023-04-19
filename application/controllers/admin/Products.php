<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // if direct come on products page without login it will redirect login page
        if(!$this->session->userdata('admin')){
            $this->session->set_flashdata('error', 'Please Login First');
            redirect('admin/login');
        }

        //Product model, form validation library
        $this->load->Model('Pro_model'); 
        $this->load->library('form_validation');

    }

    // this will show all products
    public function index(){
        // for pagination
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('admin/products/index'),
            'total_rows' => $this->Pro_model->num_products(),
            'per_page' => 5,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => 'Next',
            'prev_link' => 'Prev',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a href="#" class="page-link">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class'=> 'page-link')
        ];
        $this->pagination->initialize($config);
        $pagination_links = $this->pagination->create_links();
        $data['pagination_links'] = $pagination_links;
        $params['limit'] = $config['per_page'];
        $params['offset'] = $this->uri->segment(4);
        // for search
        $search_query = $this->input->get('q');
        $params['search_query'] = $search_query;
        $data['search'] = $search_query;
        
        // fetch Products row with serch query and pagination
        $data['rows'] = $this->Pro_model->pro_list($params);
        $this->load->view('admin/header.php');
        $this->load->view('admin/products.php', $data);
        $this->load->view('admin/footer.php');

    }

    // this will show add products page
    public function add(){
        $this->form_validation->set_rules('cat_id','Category', 'trim|required');
        $this->form_validation->set_rules('brand','Brand', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
        $this->form_validation->set_rules('title','Title', 'trim|required');
        $this->form_validation->set_rules('description','Description', 'trim|required');
        if($this->form_validation->run() == true){
            // if include image file
            if($_FILES['image']['name']){
                $config['upload_path'] = './public/uploads/products';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                $this->load->library('upload', $config);
               if($this->upload->do_upload('image')){
                // uploaded
                $upload_data = $this->upload->data();
                // resizing for thumbnail
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['new_image'] = $upload_data['file_path'].'thumb/';
                $config2['create_thumb'] = TRUE;
                $config2['thumb_marker'] = '';
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 200;
                $config2['height'] = 200;

                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // resizing for front end
                $config3['image_library'] = 'gd2';
                $config3['source_image'] = $upload_data['full_path'];
                $config3['new_image'] = $upload_data['file_path'].'front/';
                $config3['create_thumb'] = TRUE;
                $config3['thumb_marker'] = '';
                $config3['maintain_ratio'] = TRUE;
                $config3['width'] = 1000;
                $config3['height'] = 1288;

                $this->load->library('image_lib', $config3);
                $this->image_lib->initialize($config3);
                $this->image_lib->resize();
                $this->image_lib->clear();
                
                
                // save data into database
                $formData = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'image' => $upload_data['file_name'],
                    'cat_id'=> $this->input->post('cat_id'),
                    'brand' => $this->input->post('brand'),
                    'price' => $this->input->post('price'),
                    'status' => $this->input->post('status'),
                    'created_at' => date("Y:m:d H:i:s")
                ];
                $this->Pro_model->insert($formData);
                $this->session->set_flashdata('msg', "New Product Added Successfully");
                redirect(base_url('admin/products')); 

               }
               else{
                // upload error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
               }
            }
            // insert data in to database without image
            else{
                
                $formData = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'cat_id'=> $this->input->post('cat_id'),
                    'brand' => $this->input->post('brand'),
                    'price' => $this->input->post('price'),
                    'status' => $this->input->post('status'),
                    'created_at' => date("Y:m:d H:i:s")
                ];
                $this->Pro_model->insert($formData);
                $this->session->set_flashdata('msg', "New Product Added Successfully");
                redirect(base_url('admin/products'));
            }

        }
        $this->load->Model('Cat_model');
        $data['category'] = $this->Cat_model->read();
        $data['heading'] = "Add New Product";
        $this->load->view('admin/header.php');
        $this->load->view('admin/add_pro.php', $data);
        $this->load->view('admin/footer.php');

    }

    // this will show Products edit page
    public function edit($id){
        $result = $this->Pro_model->product_row($id);

        $this->form_validation->set_rules('cat_id','Category', 'trim|required');
        $this->form_validation->set_rules('brand','Brand', 'trim|required');
        $this->form_validation->set_rules('title','Title', 'trim|required');
        $this->form_validation->set_rules('description','Description', 'trim|required');
        if($this->form_validation->run() == true){
            // if include image file
            if($_FILES['image']['name']){
                $config['upload_path'] = './public/uploads/products';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
                $this->load->library('upload', $config);
               if($this->upload->do_upload('image')){
                // uploaded
                $upload_data = $this->upload->data();
                // resizing for thumbnail
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $upload_data['full_path'];
                $config2['new_image'] = $upload_data['file_path'].'thumb/';
                $config2['create_thumb'] = TRUE;
                $config2['thumb_marker'] = '';
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 200;
                $config2['height'] = 200;

                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // resizing for front end
                $config3['image_library'] = 'gd2';
                $config3['source_image'] = $upload_data['full_path'];
                $config3['new_image'] = $upload_data['file_path'].'front/';
                $config3['create_thumb'] = TRUE;
                $config3['thumb_marker'] = '';
                $config3['maintain_ratio'] = TRUE;
                $config3['width'] = 1000;
                $config3['height'] = 1288;

                $this->load->library('image_lib', $config3);
                $this->image_lib->initialize($config3);
                $this->image_lib->resize();
                $this->image_lib->clear();

                // replace old image
                if(file_exists('./public/uploads/products/'.$result['image'])){
                    unlink('./public/uploads/products/'.$result['image']);
                }
                if(file_exists('./public/uploads/products/thumb/'.$result['image'])){
                    unlink('./public/uploads/products/thumb/'.$result['image']);
                }
                if(file_exists('./public/uploads/products/front/'.$result['image'])){
                 unlink('./public/uploads/products/front/'.$result['image']);
                }
                
                
                // save data into database
                $formData = [
                    'cat_id'=> $this->input->post('cat_id'),
                    'brand' => $this->input->post('brand'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'image' => $upload_data['file_name'],
                    'status' => $this->input->post('status'),
                    'updated_at' => date("Y:m:d H:i:s")
                ];
                $this->Pro_model->update($id, $formData);
                $this->session->set_flashdata('msg', "Products Updated Successfully");
                redirect(base_url('admin/products')); 

               }
               else{
                // upload error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
               }
            }
            // insert data in to database without image
            else{
                
                $formData = [
                    'cat_id'=> $this->input->post('cat_id'),
                    'brand' => $this->input->post('brand'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                    'updated_at' => date("Y:m:d H:i:s")
                ];
                $this->Pro_model->update($id, $formData);
                $this->session->set_flashdata('msg', "Products Updated Successfully");
                redirect(base_url('admin/products'));
            }

        }
        $this->load->Model('Cat_model');
        $data['category'] = $this->Cat_model->read();
        $data['brands'] = $this->Pro_model->brand();
        $data['row'] = $result;
        $data['heading'] = "Edit Product";
        $this->load->view('admin/header.php');
        $this->load->view('admin/edit_pro.php', $data);
        $this->load->view('admin/footer.php');

    }
    
    public function delete($id){
       // laod model for category detail to delete image file
       $result = $this->Pro_model->product_row($id);

       // image file delete
       if(file_exists('./public/uploads/products/'.$result['image'])){
           unlink('./public/uploads/products/'.$result['image']);
       }
       if(file_exists('./public/uploads/products/thumb/'.$result['image'])){
           unlink('./public/uploads/products/thumb/'.$result['image']);
       }
       if(file_exists('./public/uploads/products/front/'.$result['image'])){
        unlink('./public/uploads/products/front/'.$result['image']);
       }

        // delete data from database
        $this->Pro_model->delete($id);

        // return with suucess msg
        $this->session->set_flashdata('msg', "Products has been deleted Successfully!");
        redirect(base_url('admin/products'));
    }
}