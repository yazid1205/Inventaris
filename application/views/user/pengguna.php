<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h6 class="mt-1 font-weight-semibold">Data Pengguna</h6>
					</div> 
					<div class="col-md-6 text-right">
						<?php if ($akun->level == 0): ?>
						<a href="<?php echo base_url('pengguna/addpengguna') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fe fe-plus-circle mr-1"></i>Tambah</a>
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
								<th>Nama</th>
								<th>Username</th>
								<th>Role</th>
								<th>Password</th>
								<th>Image</th>
								<th>Level</th>
								<?php if ($akun->level == 0): ?>
								<th width="100">Aksi</th>
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pengguna as $x => $d): ?>
							<tr>
								<td><?=$x+1?></td>
								<td><?=$d->name?></td>
								<td><?=$d->username?></td>
								<td><?=$d->role?></td>
								<td><?=$d->password?></td>
								<td><?=$d->image?></td>
								<td><?=$d->level?></td>
								<?php if ($akun->level == 0): ?>
								<td>
									<a href="<?=base_url('pengguna/deletedata/' . $d->id)?>" onclick="return confirm('Yakin ingin menghapus data ?')" class="btn btn-danger btn-sm shadow-sm" title="Delete"><i class="fe fe-x"></i></a>
									<button class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#updatepengguna_<?=$d->id?>" title="Edit"><i class="fe fe-edit-2"></i></button>
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
<?php foreach ($pengguna as $d): ?>
<div class="modal fade" id="updatepengguna_<?=$d->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit pengguna</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	        <form action="<?=base_url('pengguna/updatepengguna/' . $d->id)?>" method="post">
	      	<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="name" value="<?=$d->name?>">
				</div>
				<div class="form-group">
					<label>Role</label>
					<select name="role" class="form-control" required="">
						<option value="<?=$d->role?>"><?=$d->role?></option>
						<option value="Administrator">Administrator</option>
						<option value="User">User</option>	
					</select>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" value="<?=$d->username?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" value="<?=$d->password?>">
				</div>
		      	<div class="form-group">
						<label>Level</label>
						<select name="level" class="form-control form-control-sm" required="">
							<option value="<?=$d->level?>"><?=$d->level?></option>
								<option value="0">0</option>
								<option value="1">1</option>
						</select>
				</div>
				<div class="form-group">
						<label>Image</label>
						<select name="image" class="form-control form-control-sm" required="">
							<option value="<?=$d->image?>"><?=$d->image?></option>
								<option value="female.png">female</option>
								<option value="male.png">male</option>
						</select>
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
