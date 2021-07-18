<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0 font-weight-semibold">Data Jenis Barang</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered dataTable">
						<thead>
							<tr>
								<th width="10">No</th>
								<th>Nama</th>
								<?php if ($akun->level == 0): ?>
								<th width="100">Aksi</th>
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($jenis->result() as $x => $d): ?>
							<tr>
								<td><?=$x+1?></td>
								<td><?=$d->nm_jenis?></td>
								<?php if ($akun->level == 0): ?>
								<td>
									<a href="<?=base_url('inventaris/deletedata/jenis/' . $d->id)?>" onclick="return confirm('Yakin ingin menghapus data ?')" class="btn btn-danger btn-sm shadow-sm"><i class="fe fe-x"></i></a>
									<button class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#updatejenis_<?=$d->id?>"><i class="fe fe-edit-2"></i></button>
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
	<div class="col-md-4">
		<?php if ($akun->level == 0): ?>
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0"><i class="fe fe-plus-circle mr-2"></i>Tambah Jenis</h6>
			</div>
			<div class="card-body">
				<form action="<?=base_url('inventaris/addjenis')?>" method="post">
					<div class="form-group">
						<label>Nama Jenis</label>
						<input type="text" class="form-control" name="nm_jenis">
					</div>
					<div class="pt-2 text-right">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	<?php endif ?>
	</div>
</div>

<!-- proses edit-->
<?php if ($akun->level == 0): ?>
<?php foreach ($jenis->result() as $d): ?>
<div class="modal fade" id="updatejenis_<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	        <form action="<?=base_url('inventaris/updatejenis/' . $d->id)?>" method="post">
	      	<div class="modal-body">
				<div class="form-group">
					<label>Nama Jenis</label>
					<input type="text" class="form-control" name="nm_jenis" value="<?=$d->nm_jenis?>">
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
