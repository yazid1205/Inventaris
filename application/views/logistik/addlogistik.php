<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h5 class="mt-1 font-weight-semibold">Tambah Barang Logistik</h5>
			</div>
			<div class="col-md-6 text-right">
				<a href="<?=base_url('logistik')?>" class="btn btn-warning btn-sm shadow-sm"><i class="fe fe-arrow-left mr-1"></i>Kembali</a>
			</div>
		</div>
		<hr>
		<form action="" method="post">
			<div class="form-group">
				<label>Kode</label>
				<input type="text" class="form-control" name="kode" value="<?=$kode?>" readonly>
			</div>
			<div class="row mb-3">
				<div class="col-md-4">
					<div class="form-group">
						<label>Nama Barang Logistik</label>
						<input type="text" class="form-control" name="nm_logistik">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Jenis</label>
						<select name="jenis_id" class="form-control" required="">
							<option value="">Silahkan Pilih</option>
							<?php foreach ($jenis->result() as $e): ?>
								<option value="<?=$e->id?>"><?=$e->nm_jenis?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="jml" value="">
					</div>
				</div>
			</div>
			<div class="modal-footer pr-0  pb-0">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>