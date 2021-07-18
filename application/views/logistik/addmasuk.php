<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h5 class="mt-1 font-weight-semibold">Tambah Barang Masuk</h5>
			</div>
			<div class="col-md-6 text-right">
				<a href="<?=base_url('logistik/masuk')?>" class="btn btn-warning btn-sm shadow-sm"><i class="fe fe-arrow-left mr-1"></i>Kembali</a>
			</div>
		</div>
		<hr>
		<form action="" method="post" action="logistik/">
			<div class="form-group">
				<label>Hari/Tanggal</label>
				<input type="text" class="form-control datepicker" name="tgl" value="<?=date('Y-m-d')?>" autocomplete="off">
			</div>
			<div class="row mb-3">
				<div class="col-md-4">
					<div class="form-group">
						<label>Logistik</label>
						<select name="logistik_id" class="form-control" required="">
							<option value="">Silahkan Pilih</option>
							<?php foreach ($logistik->result() as $e): ?>
								<option value="<?=$e->id?>"><?=$e->kode?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" class="form-control" name="jml">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" name="ket">
					</div>
				</div>
			</div>
			<div class="modal-footer pr-0  pb-0">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>