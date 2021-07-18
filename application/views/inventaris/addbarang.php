<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h5 class="mt-1 font-weight-semibold">Tambah Barang</h5>
			</div>
			<div class="col-md-6 text-right">
				<a href="<?=base_url('inventaris')?>" class="btn btn-warning btn-sm shadow-sm"><i class="fe fe-arrow-left mr-1"></i>Kembali</a>
			</div>
		</div>
		<hr>
		<form action="<?=base_url('inventaris/addbarang')?>" method="post">
			<div class="form-group pb-2">
				<label>Kode</label>
				<input type="text" class="form-control form-control-sm" name="kode" value="<?=$kode?>" readonly>
			</div>
			<div class="row mb-3">
				<div class="col-md-4">
					<div class="form-group pb-2">
						<label>Nama Barang</label>
						<input type="text" class="form-control form-control-sm" name="nm_barang">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" class="form-control form-control-sm" name="jml" value="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group pb-2">
						<label>Jenis</label>
						<select name="jenis_id" class="form-control form-control-sm" required="">
							<option value="">Silahkan Pilih</option>
							<?php foreach ($jenis->result() as $e): ?>
								<option value="<?=$e->id?>"><?=$e->nm_jenis?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Ruangan</label>
						<select name="ruangan_id" class="form-control form-control-sm" required="">
							<option value="">Silahkan Pilih</option>
							<?php foreach ($ruangan->result() as $e): ?>
								<option value="<?=$e->id?>"><?=$e->nm_ruangan?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Keterangan</label>
						<textarea name="ket" class="form-control" cols="30" rows="4"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer pr-0 pb-0">
				<button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
			</div>
		</form>
	</div>
</div>