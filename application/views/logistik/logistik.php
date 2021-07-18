<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h6 class="mt-1 font-weight-semibold">Data Barang Logistik</h6>
					</div> 
					<div class="col-md-6 text-right">
						<?php if ($akun->level == 0): ?>
						<a href="<?php echo base_url('export/logistik') ?>" target="_blank" class="btn btn-outline-danger btn-sm shadow-sm"><i class="fe fe-printer mr-1"></i>Cetak</a>
						<a href="<?php echo base_url('logistik/addlogistik') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fe fe-plus-circle mr-1"></i>Tambah</a>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered dataTable">
						<thead>
							<tr>
								<th width="10">No</th>
								<th>Kode</th>
								<th>Nama</th>
								<th>Jenis</th>
								<th>Stok</th>
								<?php if ($akun->level == 0): ?>
								<th width="100">Aksi</th>
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($logistik->result() as $x => $d): ?>
							<tr>
								<td><?=$x+1?></td>
								<td><?=$d->kode?></td>
								<td><?=$d->nm_logistik?></td>
								<td><?=$d->nm_jenis?></td>
								<td><?=$d->jml?></td>
								<?php if ($akun->level == 0): ?>
								<td>
									<a href="<?=base_url('logistik/deletedata/logistik/' . $d->id)?>" onclick="return confirm('Yakin ingin menghapus data ?')" class="btn btn-danger btn-sm shadow-sm" title="Delete"><i class="fe fe-x"></i></a>
									<button class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#updatelogistik_<?=$d->id?>" title="Edit"><i class="fe fe-edit-2"></i></button>
								</td>
								<?php endif ?>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($akun->level == 0): ?>
<?php foreach ($logistik->result() as $d): ?>
<div class="modal fade" id="updatelogistik_<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit logistik</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	        <form action="<?=base_url('logistik/updatelogistik/' . $d->id)?>" method="post">
	      	<div class="modal-body">
				<div class="form-group">
					<label>Kode</label>
					<input type="text" class="form-control" name="kode" value="<?=$d->kode?>" readonly>
				</div>
				<div class="form-group">
					<label>Nama Logistik</label>
					<input type="text" class="form-control" name="nm_logistik" value="<?=$d->nm_logistik?>">
				</div>
				<div class="form-group">
					<label>Jenis</label>
					<select name="jenis_id" class="form-control" required="">
						<option value="">Silahkan Pilih</option>
						<?php foreach ($jenis->result() as $e): ?>
							<option value="<?=$e->id?>" <?=($e->id == $d->jenis_id) ? 'selected' : '' ?> ><?=$e->nm_jenis?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="number" class="form-control" name="jml" value="<?=$d->jml?>">
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
