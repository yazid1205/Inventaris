<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h6 class="mt-1 font-weight-semibold">Data Barang</h6>
			</div>
			<div class="col-md-6 text-right">
				<?php if ($akun->level == 0): ?>

				<!--tombol cetak dan gambar printer untuk mengarahkan ke file pdf laporan -->	
				<a href="<?php echo base_url('export/barang') ?>" target="_blank" class="btn btn-outline-danger btn-sm shadow-sm"><i class="fe fe-printer mr-1"></i>Cetak</a>

				<a href="<?php echo base_url('inventaris/addbarang') ?>" class="btn btn-primary btn-sm shadow-sm"><i class="fe fe-plus-circle mr-1"></i>Tambah</a>

				<?php endif ?>
			</div>
		</div>
		<hr>
		<div class="table-responsive m-0">
			<table class="table table-striped table-bordered dataTable">
				<thead>
					<tr>
						<th width="10">#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Ruangan</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
						<?php if ($akun->level == 0): ?>
						<th width="100">Aksi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang->result() as $x => $d): ?>
					<tr>
						<td><?=$x+1?></td>
						<td><?=$d->kode?></td>
						<td><?=$d->nm_barang?></td>
						<td><?=$d->nm_jenis?></td>
						<td><?=$d->nm_ruangan?></td>
						<td><?=$d->jml?></td>
						<td><?=$d->ket?></td>
						<?php if ($akun->level == 0): ?>
						<td>
							<a href="<?=base_url('inventaris/deletedata/barang/' . $d->id)?>" onclick="return confirm('Yakin ingin menghapus data ?')" class="btn btn-danger btn-sm shadow-sm"><i class="fe fe-trash"></i></a>
							<button class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#updatebarang" 
							onclick="modalbarang(<?=$d->id?>)"><i class="fe fe-edit-2"></i></button>
						</td>
						<?php endif ?>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="updatebarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	        <form id="form-update-barang">
	      	<div class="modal-body" id="show-data-barang"></div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Simpan</button>
	      	</div>
	      	</form>
	    </div>
  	</div>
</div>

<script>
	function modalbarang(id) {
		$.ajax({
			type: 'post',
			url : '<?=base_url('inventaris/modalbarang')?>',
			data : {
				id : id
			}, beforeSend() {
				$("#show-data-barang").html("<h6 class='text-center'>Loading...</h6>");
			},
			success: function(data) {
				$("#show-data-barang").html(data);
			}
		})
	}

	$("#form-update-barang").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url : '<?=base_url('inventaris/editbarang')?>',
			data: new FormData(this),
			processData:false,
	        contentType:false,
	        cache:false,
	        async:false,
			success: function(data) {
				swal({
					title: "Berhasil mengedit data",
					text: "",
					icon: "success",
					buttons: {
						confirm: {
							text: "OK",
							value: true,
							visible: true,
							className: "btn btn-success",
							closeModal: true
						}
					}
				}).then(function() {
					location.reload();
				});
			}
		})
	})
</script>