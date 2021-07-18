<table class="table table-striped table-bordered dataTable" border="1">
	<thead>
		<tr>
			<th width="10">#</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Ruangan</th>
			<th>Jumlah</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($barang->result() as $x => $d): ?>
		<tr>
			<td><?=$x+1?></td>
			<td><?=$d->nm_barang?></td>
			<td><?=$d->nm_jenis?></td>
			<td><?=$d->nm_ruangan?></td>
			<td><?=$d->jml?></td>
			<td><?=$d->ket?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>