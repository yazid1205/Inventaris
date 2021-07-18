<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistem Inventaris dan Logistik</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url('assets/logo.jpeg')?>" type="image/x-icon"/>
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/logo.jpeg')?>" />

<!-- Fonts and icons -->
  <script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=base_url()?>assets/css/fonts.min.css']},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>
<!-- Feather Icons -->
<link rel="stylesheet" href="<?=base_url('assets/fonts/feather/feather.css')?>">
<!-- CSS Files -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/atlantis.min.css">

<!-- Plugins -->
<link rel="stylesheet" href="<?=base_url('assets/plugins/toastr/toastr.min.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/plugins/datepicker3/datepicker3.min.css')?>">
    <link href="<?=base_url('assets')?>/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<?php 
  function bulan($val) {
    $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return $bulan[$val];
  }

  function tgl($date) {
    $BulanIndo = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

    $tahun  = substr($date, 0, 4);
    $bulan  = substr($date, 5, 2);
    $tgl    = substr($date, 8, 2);
    if ($date != '0000-00-00') {
    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
      return ($result);
    } else {
      return '0000-00-00';
    }
  }
?>
<style>
  body {
        font-family: 'SF Pro Text',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    }

  .font-weight-semibold {
    font-weight: 600;
  }

  .shadow-sm {
    box-shadow: 0 0.125rem 0.25rem 0 rgba(58, 59, 69, 0.2) !important;
  }

  .navbar-expand-lg .navbar-nav .dropdown-menu {
    right: 16px;
  }

  .dataTables_wrapper {
    padding: 0;
  }

  .table td, .table th {
    border-top: 1px solid #e2e5e8;
    white-space: nowrap;
    padding: 1.05rem 0.75rem;
    height: 50px;
  }

  .form-group {
    padding: 5px 0;
  }

  .card {
    transition: .3s;
  }

  .card-box:hover {
    border-color: #0069d9;
    transform: translateY(-5px);
  }

  .logo-header {
    padding: 0 17px;
  }

  .breadcrumbs {
    border-left: unset;
    margin-left: unset;
    padding-left: 1px;
  }

  a:hover {
    text-decoration: none;
  }
  
  .active-card {

  }

  /*Callout*/
  .callout {
      border-radius: 0.25rem;
      background-color: #ffffff;
      border-left: 5px solid #eee;
  }

  .callout.callout-primary {
      border-left-color: #1572e8!important;
  }

  .callout.callout-success {
      border-left-color: #31ce36!important;
  }

  .callout.callout-warning {
      border-left-color: #ffad46!important;
  }

  .callout.callout-danger {
      border-left-color: #f25961!important;
  }

  .callout.callout-info {
      border-left-color: #48abf7!important;
  }
</style>