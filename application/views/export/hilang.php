<table class="table table-striped table-bordered dataTable" border="1">
	<thead>
		<tr>
			<th width="10">#</th>
			<th>Kode Barang</th>
			<th>Barang</th>
			<th>Jumlah</th>
			<th>Tanggal</th>
			<th>Ket</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($hilang->result() as $x => $d): ?>
		<tr>
			<td><?=$x+1?></td>
			<td><?=$d->kode?></td>
			<td><?=$d->nm_barang?></td>
			<td><?=$d->jml?></td>
			<td><?=tgl($d->tgl)?></td>
			<td><?=$d->ket?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>