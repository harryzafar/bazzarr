<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/home');?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/products');?>">Products</a></li>
            <li class="breadcrumb-item active">
              <?php echo $heading; ?>
            </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="m-0">
                <?php echo $heading; ?>
              </h5>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/products/add') ?>" method="post" class="categoryForm"
                id="categoryForm" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" value="<?php echo set_value('title'); ?>"
                    class="form-control" placeholder="Article Name">
                  <span class="text-danger">
                    <?php echo form_error('title'); ?>
                  </span>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description"value=""  class="textarea"><?php echo set_value('description') ;?></textarea>
                  <span class="text-danger">
                    <?php echo form_error('description'); ?>
                  </span>
                </div>
                <div class="form-group">
                  <label for="file">Image</label>
                  <input type="file" class="form-control" id="file" name="image">
                  <span class="text-danger">
                    <?php if($this->session->flashdata('upload_error')){
                      echo $this->session->flashdata('upload_error');
                    } ;?>
                  </span>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" id="category"  name="cat_id">
                        <option value="">Select Category</option>
                        <?php
                           if(empty($category)){
                            ?>
                        <option value="">No Category Found</option>
                        <?php
                           }
                           else{ 
                            foreach($category as $row){
                                ?>
                        <option <?php echo set_select('cat_id', $row['name']) ;?> value="
                          <?php echo $row['id'] ;?>">
                          <?php echo $row['name'] ;?>
                        </option>
                        <?php
                            }
                           } 
                           ;?>
                      </select>
                      <span class="text-danger">
                        <?php echo form_error('cat_id'); ?>
                      </span>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select class="form-control" name="brand" id="brand">
                        <option  value="">Select Brand</option>
                        <option <?php echo set_select('brand') ;?> value="Red Tape">Red Tape</option>
                        <option <?php echo set_select('brand') ;?> value="Levis">Levis</option>
                        <option <?php echo set_select('brand') ;?> value="Allen Solly">Allen Solly</option>
                        <option <?php echo set_select('brand') ;?> value="Peter England">Peter England</option>
                      </select>
                      <span class="text-danger">
                        <?php echo form_error('brand'); ?>
                      </span>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for="price">Price &#8377;</label>
                     <input class="form-control" value="<?php echo set_value('price'); ?>" name="price" type="number" placeholder="&#8377;">
                      <span class="text-danger">
                        <?php echo form_error('price'); ?>
                      </span>
                    </div>
                  </div>


                </div>


                <div class="custom-control custom-radio float-left">
                  <input class="custom-control-input" type="radio" id="statusActive" name="status" checked="" value="1">
                  <label for="statusActive" class="custom-control-label">Active</label>
                </div>
                <div class="custom-control custom-radio float-left ml-3">
                  <input class="custom-control-input" type="radio" id="statusBlock" name="status" value="0">
                  <label for="statusBlock" class="custom-control-label">Block</label>
                </div>
                <div class="clearfix"></div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('admin/products'); ?>" class="btn btn-secondary ml-3">Back</a>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->