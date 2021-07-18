<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h5 class="mt-1 font-weight-semibold">Tambah User</h5>
			</div>
			<div class="col-md-6 text-right">
				<a href="<?=base_url('pengguna')?>" class="btn btn-warning btn-sm shadow-sm"><i class="fe fe-arrow-left mr-1"></i>Kembali</a>
			</div>
		</div>
		<hr>
		<form action="<?=base_url('pengguna/addpengguna')?>" method="post">
			<div class="form-group pb-2">
				<label>Nama</label>
				<input type="text" class="form-control form-control-sm" name="name">
			</div>
			<div class="row mb-3">
				<div class="col-md-4">
					<div class="form-group pb-2">
						<label>Role</label>
						<select name="role" class="form-control form-control-sm" required="">
							<option value="">Silahkan Pilih</option>
								<option value="Administrator">Administrator</option>
								<option value="User">User</option>							
						</select>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control form-control-sm" name="username" value="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group pb-2">
						<label>Password</label>
						<input type="text" class="form-control form-control-sm" name="password">
					</div>
					<div class="form-group">
						<label>Level</label>
						<select name="level" class="form-control form-control-sm" required="">
							<option value="">Silahkan Pilih</option>
								<option value="0">0</option>
								<option value="1">1</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Image</label>
						<select name="image" class="form-control form-control-sm" required="">
							<option value="">Silahkan Pilih</option>
								<option value="female.png">female</option>
								<option value="male.png">male</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer pr-0 pb-0">
				<button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
			</div>
		</form>
	</div>
</div>