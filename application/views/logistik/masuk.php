<?php 
  $bulan = ["-", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; 
?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h6 class="mt-1 font-weight-semibold">Data Barang Masuk</h6>
			</div>
			<div class="col-md-6 text-right">
				<?php if ($akun->level == 0): ?>
				<a href="<?php echo base_url('export/masuk/' . $bln . '/' . $th) ?>" target="_blank" class="btn btn-outline-danger btn-sm shadow-sm"><i class="fe fe-printer mr-1"></i>Cetak</a>
				<a href="<?php echo base_url('logistik/addmasuk') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fe fe-plus-circle mr-1"></i>Tambah</a>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="" method="get">
		    <div class="row">
		    	
			 <div class="col-md-2">
		        <select name="tanggal" class="form-control select2" required="">
		          <option value="">-Pilih Tanggal-</option>
		            <?php for ($i=date('d'); $i >= 1; $i--) { ?>
		              <option value="<?=$i?>" <? $tgl == $i ? 'selected' : '' ?> ><?=$i?></option>
		            <?php } ?>
		        </select>
		      </div>

		      <div class="col-md-2">
		        <select name="bulan" class="form-control select2" required="">
		          <option value="">-Pilih Bulan-</option>
		            <?php for ($i=1; $i < count($bulan); $i++) { ?>
		              <option value="<?=$i?>" <?=($bln == $i) ? 'selected' : '' ?> ><?=bulan($i-1)?></option>
		            <?php } ?>
		        </select>
		      </div>

		      <div class="col-md-2">
		        <select name="tahun" class="form-control select2" required="">
		          <option value="">-Pilih Tahun-</option>
		          <?php for ($i=date('Y'); $i >= 2019; $i--) { ?>
		              <option value="<?=$i?>" <?=($th == $i) ? 'selected' : '' ?> ><?=$i?></option>
		            <?php } ?>
		        </select>
		      </div>
		      <div class="col-md-4">
		        <button class="btn btn-primary shadow-sm"><i class="fe fe-search mr-1"></i>Cari</button>
		        <a href="<?=base_url('logistik/masuk')?>" class="btn btn-danger shadow-sm"><i class="fe fe-refresh-ccw mr-1"></i>Refresh</a>
		      </div>
		    </div>
		</form>
		<hr>
		<div class="table-responsive">
			<table class="table table-striped table-bordered dataTable">
				<thead>
					<tr>
						<th width="10">#</th>
						<th>Logistik</th>
						<th>Jumlah</th>
						<th>Tanggal</th>
						<th>Ket</th>
						<?php if ($akun->level == 0): ?>
						<th>Aksi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($masuk->result() as $x => $d): ?>
					<tr>
						<td><?=$x+1?></td>
						<td><?=$d->nm_logistik?></td>
						<td><?=$d->jml?></td>
						<td><?=tgl($d->tgl)?></td>
						<td><?=$d->ket?></td>
						<?php if ($akun->level == 0): ?>
						<td>
							<a href="<?=base_url('logistik/deletedata/masuk/' . $d->id)?>" onclick="return confirm('Yakin ingin menghapus data ?')" class="btn btn-danger btn-sm shadow-sm"><i class="fe fe-x"></i></a>
							<button class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#updatemasuk_<?=$d->id?>"><i class="fe fe-edit-2"></i></button>
						</td>
						<?php endif ?>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php if ($akun->level == 0): ?>
<?php foreach ($masuk->result() as $d): ?>
<div class="modal fade" id="updatemasuk_<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Masuk</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	        <form action="<?=base_url('logistik/updatemasuk/' . $d->id)?>" method="post">
	      	<div class="modal-body">
				<div class="form-group">
					<label>Hari/Tanggal</label>
					<input type="text" class="form-control datepicker" name="tgl" value="<?=$d->tgl?>" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Logistik</label>
					<select name="logistik_id" class="form-control" required="">
						<option value="">Silahkan Pilih</option>
						<?php foreach ($logistik->result() as $e): ?>
							<option value="<?=$e->id?>" <?=($e->id == $d->logistik_id) ? 'selected' : '' ?> ><?=$e->nm_logistik?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="number" class="form-control" name="jml" value="<?=$d->jml?>">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea name="ket" class="form-control" cols="30" rows="2"><?=$d->ket?></textarea>
				</div>
	      	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
	      	</div>
	      	</form>
	    </div>
  	</div>
</div>
<?php endforeach ?>
<?php endif ?>
