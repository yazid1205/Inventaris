<div class="container">
  <br />
<div class="small text-muted"><a href="<?php echo base_url('inventaris') ?>"> Home</a> » Results</div>
<hr />
<div class="col-md-12">
<h5>Data Inventaris Masuk</h5>
      <div class="panel panel-body">
          Hi, data Anda berhasil diinput!<br/><br/>
          <?php
                    $nm_barang     = $this->input->post('nm_barang');
                    $jenis_id      = $this->input->post('jenis_id');
                    $ruangan_id    = $this->input->post('ruangan_id');
                    $jml           = $this->input->post('jml');
                    $ket           = $this->input->post('ket');
?>
        <button><a href="https://api.telegram.org/bot1855010465:AAEcjxjoQS07O93QiScSLZh6jhRDd7RDlbU/sendMessage?chat_id=-591152805&text=Inventaris Masuk: Nama: <?= $nm_barang ?> Jumlah: <?= $jml ?> Keterangan: <?= $ket ?>" target="blank">Kirim Via Group</a></button>
      
      </div>

  </div>

</div>
