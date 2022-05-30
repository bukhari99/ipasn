<?php //include('tambah.php'); ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Kode</th>
			<th width="50%">Nama Unit Kerja</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($unitkerja as $unitkerja) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php echo $unitkerja['id_unitkerja'] ?></td>
			<td><?php echo $unitkerja['nama_unitkerja'] ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>