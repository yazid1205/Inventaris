<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Inventaris dan Logistik</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?=base_url('assets/logo.jpeg')?>" type="image/x-icon"/>
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/logo.jpeg')?>" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Feather Icons -->
  <link rel="stylesheet" href="<?=base_url('assets/fonts/feather/feather.css')?>">
  <style>
    body {
          font-family: 'SF Pro Text',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
      }

    .shadow-sm {
      box-shadow: 0 0.125rem 0.25rem 0 rgba(58, 59, 69, 0.2) !important;
    }
  </style>
</head>
<style>
	.input-group-text {
		color: #fff;
		background-color: #28a745;
		border: 1px solid #28a745;
	}
  .login-box:before {
    background-color: rgba(0,0,0,0.65);
  }
  body {
    background-color: #e9ecef;
  }

  .login-box, .register-box {
    width: 360px;
    margin: 7% auto;
  }
</style>
<body  class="custom-bg" style="background-color: #5BCBFA">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body text-center">
        <h4>LOGIN</h4>
        <h6>Sistem Pengelolaan Data <br> Logistik - Inventaris</h6>
      	<img src="<?=base_url('assets/logo.jpeg')?>" class="mb-2" style="height: 100px;" alt="">
        <h6>Pusat Kajian Kebudayaan Banjar (PKKB)</h6>

  		<?php if ($this->session->flashdata('danger')): ?>
          <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
            <?php echo $this->session->flashdata('danger'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  		<?php endif ?>

  		<?php if ($this->session->flashdata('warning')): ?>
  			<div class="alert alert-warning alert-dismissible text-left fade show">
  		     	<?php echo $this->session->flashdata('warning'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
  		  </div>
  		<?php endif ?>

      <form action="<?=base_url('auth/ceklogin')?>" method="post">
        <div class="input-group mb-3">
          	<div class="input-group-prepend">
            	<span class="input-group-text"><i class="fe fe-user"></i></span>
          	</div>
          <input type="text" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="input-group mb-3">
	      	<div class="input-group-prepend">
	        	<span class="input-group-text"><i class="fe fe-lock"></i></span>
	      	</div>
	       <input type="password" class="form-control" name="password" placeholder="Password">
	    </div>
        	<button type="submit" class="btn btn-primary btn-block shadow-sm"><i class="fa fa-sign-in mr-2"></i>Login</button>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?=base_url('assets/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
