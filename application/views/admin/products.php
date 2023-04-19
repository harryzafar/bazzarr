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
            <li class="breadcrumb-item active">Products</li>
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
          <?php
        if($this->session->flashdata('msg')){;?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>
              <?php echo $this->session->flashdata('msg') ;?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        };
         ?>
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <form action="" method="get" id="searchForm" class="searchForm" name="searchForm">
                  <div class="input-group mb-0">
                    <input type="text" class="form-control" value="<?php echo $search;?>" placeholder="Search" name="q">
                    <div class="input-group-append">
                      <button class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></i></button>
                    </div>

                  </div>
                </form>
              </div>
              <div class="card-tools">
                <a href="<?php echo base_url('admin/products/add') ?>" class="btn btn-primary"><i
                    class="fas fa-plus"></i> Add</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th width="100">Image</th>
                  <th>Title</th>
                  <th width="100">Category</th>
                  <th width="130">Brands</th>
                  <th width="50">Price</th>
                  <th width="100">Status</th>
                  <th width="120">Actions</th>
                </tr>
                <?php 
                if(!empty($rows)){
                  $srno = 0;
                  foreach($rows as $row){ $srno++ ;?>
                <tr>
                  <td>
                    <?php echo $srno;?>
                  </td>
                  <td>
                  <?php if(!empty($row['image']) && file_exists('./public/uploads/products/thumb/'.$row['image'])){;?>
                        <img src="<?php echo base_url().'public/uploads/products/thumb/'.$row['image'];?>"  style="width:70px; height:50px; object-fit:cover;"  alt="" srcset="">
                      <?php }
                      else{
                        ;?> <img src="<?php echo base_url();?>public/uploads/products/thumb/no-image.jpg"  style="width:70px; height:50px; object-fit:cover;"  alt="" srcset="">
                      <?php }; ?>
                  </td>
                  <td>
                    <?php echo $row['title'];?>
                  </td>
                  <td>
                    <?php echo $row['cat_name'];?>
                  </td>
                  <td>
                    <?php echo $row['brand'];?>
                  </td>
                  <td>
                    <?php echo $row['price'];?>
                  </td>
                  
                  <td>
                    <?php if($row['status']==1){
                       ?> <span class="badge badge-success">Active</span>
                    <?php
                      }
                      else{
                       ;?> <span class="badge badge-secondary">Block</span>
                    <?php
                      } ;?>


                  </td>
                  <td>
                    <a href="<?php echo base_url('admin/products/edit/').$row['id'];?>" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit"></i></a>
                    <button class="btn btn-danger del btn-sm" onclick="getid(<?php echo $row['id'] ;?>)"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                <?php
                  }

                }
                else{;?>
                <tr>
                  <td colspan="100" class="text-center">Record Not found</td>
                </tr>
                <?php
                };
                ?>




              </table>
              <?php echo $pagination_links;?>
              

            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  <!-- delete popup -->
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Alert !</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure want to delete ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <a href="" class="btn btn-danger" id="del_btn">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <script>
  function getid(id){
    $('#del_btn').attr('href', "<?php echo base_url('admin/products/delete/') ;?>"+id);
    $('#deleteModal').modal('toggle');
  }
  
 </script>
