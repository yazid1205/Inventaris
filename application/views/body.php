<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('import/head'); ?>
</head>
<!-- Warna Latar Dashboard -->
<style>
  body {
    background-color: #f4f6f9;  
  }

  .active {
    font-weight: bold;
  }
</style>
<body class="app sidebar-mini rtl" onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

<div class="wrapper overlay-sidebar">
<div class="main-header">

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    
    <div class="d-flex w-100">
      <ul class="navbar-nav topbar-nav mr-md-auto align-items-center">
        <!-- Logo Header -->
        <div class="logo-header w-100" data-background-color="blue2">
          <a href="<?=base_url('app')?>" class="logo" style="display: contents;">
           <img src="<?=base_url('assets/smp.png')?>" height="50" alt="navbar brand" class="navbar-brand">
            <span class="text-white ml-2"><b>Pusat Kajian Kebudayaan Banjar (PKKB)</b></span>
          </a>
        </div>
      </ul>
      <!-- End Logo Header -->

      <!-- Tombol header Nav Bar -->
      <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

        <li class="nav-item dropdown hidden-caret <?=($this->uri->segment(1) == 'logistik') ? 'active' : '' ?>">
          <a class="nav-link" href="<?=base_url('logistik')?>">
            <i class="flaticon-file-1 mr-1"></i>
            Logistik
          </a>
        </li>

        <li class="nav-item dropdown hidden-caret <?=($this->uri->segment(1) == 'inventaris') ? 'active' : '' ?>">
          <a class="nav-link" href="<?=base_url('inventaris')?>">
            <i class="flaticon-box-1 mr-1"></i>
            Inventaris
          </a>
        </li>

        <li class="nav-item dropdown hidden-caret" style="display: contents;">
          <!-- <span class="text-white mr-2" style="font-size: large;"><?=$akun->name?></span> -->
          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
              <img src="<?=base_url('assets/male.png')?>" alt="..." class="avatar-img rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
              <li>
                <div class="user-box">
                  <div class="avatar-lg">
                    <img src="<?=base_url('assets/male.png')?>" alt="image profile" class="avatar-img rounded"></div>
                  <div class="u-text">
                    <h4><?=$akun->name?></h4>
                    <p class="text-muted"><?=$akun->role?></p>
                    <a href="<?=base_url('auth/logout')?>" class="btn btn-secondary btn-sm shadow-sm" onclick="return confirm('Yakin ingin mengakhiri sesi ini ?')">Logout</a>

                  </div>
                </div>
              </li>
            </div>
          </ul>
        </li>
      </ul>
      
    </div>
  </nav>
  <!-- End Navbar -->
</div>

<div class="main-panel">
  <div class="content">
    <?php $this->load->view($page);?>
  </div>
</div>

</div>
<div class="container">
    <div class="row align-items-center flex-row-reverse">
      <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
        SPD Inventaris dan Logistik Pusat Kajian Kebudayaan Banjar, Created by <a href="#!">Arbandi</a>
      </div>
    </div>
  </div>
<?php $this->load->view('import/foot'); ?>
</body>
</html>
