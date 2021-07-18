<div class="container">
  <br />
<div class="small text-muted">"><a href="<?php echo base_url('logistik') ?>"> Home</a> » Results</div>
<hr />
<div class="col-md-12">
<h5>Data Logistik Masuk</h5>
      <div class="panel panel-body">
          Hi, data Anda berhasil diinput!<br/><br/>
          <?php

                    $logistik_id      = $this->input->post('logistik_id');
                    $jml           = $this->input->post('jml');
                    $ket           = $this->input->post('ket');
?>
        <button><a href="https://api.telegram.org/bot1855010465:AAEcjxjoQS07O93QiScSLZh6jhRDd7RDlbU/sendMessage?chat_id=-591152805&text=Logistik Masuk:      <?php foreach ($logistik->result() as $x => $d): ?> Nama:<?= $d->nm_logistik ?><?php endforeach ?> Jumlah: <?= $jml ?> Keterangan: <?= $ket ?>" target="blank">Kirim Via Group</a></button>
      
      </div>

  </div>

</div>
