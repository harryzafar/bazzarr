<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/home');?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/categories');?>"> Categories</a></li>
            <li class="breadcrumb-item active"><?php echo $heading; ?></li>
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
              <h5 class="m-0"><?php echo $heading; ?></h5>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/categories/edit/').$row['id']; ?>" method="post" class="categoryForm"
                id="categoryForm" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="cat-name">Name</label>
                  <input type="text" id="cat-name" name="name" value="<?php echo set_value('name', $row['name']);?>" class="form-control" placeholder="Category Name">
                  <span class="text-danger">
                    <?php echo form_error('name'); ?>
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
                  <div class="mt-3" >
                    <?php if(!empty($row['image']) && file_exists('./public/uploads/category/thumb/'.$row['image'])){;?>
                        <img src="<?php echo base_url().'public/uploads/category/thumb/'.$row['image'];?>" class="img-fluid" alt="" srcset="">
                      <?php }
                      else{
                        ;?> <img src="<?php echo base_url();?>public/uploads/category/thumb/no-image.jpg" class="img-fluid" alt="" srcset="">
                      <?php }; ?>

                  </div>
                  
                </div>
                
                <div class="custom-control custom-radio float-left">
                  <input class="custom-control-input" type="radio" id="statusActive" name="status" <?php if($row['status']==1){;?> checked <?php };?> value="1">
                  <label for="statusActive" class="custom-control-label">Active</label>
                </div>
                <div class="custom-control custom-radio float-left ml-3">
                  <input class="custom-control-input" type="radio" id="statusBlock" name="status" <?php if($row['status']==0){;?> checked <?php };?> value="0">
                  <label for="statusBlock" class="custom-control-label">Block</label>
                </div>
                <div class="clearfix"></div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('admin/categories') ?>" class="btn btn-secondary ml-3">Back</a>
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