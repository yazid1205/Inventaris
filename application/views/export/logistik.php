<table class="table table-striped table-bordered dataTable" border="1">
	<thead>
		<tr>
			<th width="10">No</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Stok</th>
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
		</tr>
		<?php endforeach ?>
	</tbody>
</table>