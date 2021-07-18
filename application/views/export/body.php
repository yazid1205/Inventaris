<?php 
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
  .table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      margin-bottom: 0;
      margin-top: 5px;
  }

  table {
      display: table;
      border-collapse: separate;
      border-spacing: 2px;
      border-color: grey;
      font: "arial";
  }   

  .table th, .table td {
    padding: 0.5rem;
  }

  .text-center {
    text-align: center;
  }

  .middle {
    vertical-align: middle;
  }

  .border-0 {
    border: 0;
  }

  h1, h2, h3, h4, h5, h6, p {
      margin: 0px;
  }

  .semibold {
    font-weight: 500;
  }

  .text-sm {
    font-size: small;
  }

  hr {
    margin-top: 0px;
    background: #4b545c; 
    height: 2px;
  }

  .text-right {
    text-align: right;
  }
</style>
<table class="table">
  <tr>
    <td class="text-center"><img src="<?=base_url('assets/logo.png')?>" alt="" height="100"></td>
    <td class="text-center">
      <h2>PUSAT KAJIAN KEBUDAYAAN BANJAR</h2>
      <h3 class="semibold">Kalimantan Selatan</h3>
      <p class="text-sm">Jl. Pramuka Komp. Semanda 1 No.29, Sungai Lulut, Kec.Banjarmasin Timur,Kalimantan Selatan</p>
      <p>Telp: +62 819 5382 1963 Email: opinibanua@gmail.com</p>
    </td>
  </tr>
</table>
<hr>

<h4 class="text-center" style="margin-bottom: 10px;"><?=$title?></h4>
<?php $this->load->view($page); ?>

<br>
<div class="text-right" style="box-decoration-break: slice;">
  <p>Hormat Kami</p>
  <br>
  <br>
  <br>
  <br>
  <p class="semibold">......................</p>
</div>

<script>
  print();
</script>