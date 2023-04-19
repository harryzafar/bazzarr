<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CI App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/dist/css/adminlte.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            Welcome, <strong>
              <?php echo $this->session->userdata('admin')['name'];?>
            </strong>

          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?php echo base_url('admin/home/logout'); ?>" class="dropdown-item">
              Log Out

            </a>



          </div>
        </li>



      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link bg-white">

        <span class="brand-text ml-3"><strong>Bazzarr</strong></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url('admin/home'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Categories
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/categories/add'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/categories'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Categories</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/products/add') ;?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/products'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Products</p>
                  </a>
                </li>
              </ul>
            </li>

           

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    