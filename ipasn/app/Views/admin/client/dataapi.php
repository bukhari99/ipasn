<?php //include('tambah.php'); ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="50%">ID Pendidikan</th>
			<th width="5%">Kode</th>
			<th width="50%">Nama Pendidikan</th>
		</tr>
	</thead>
	<tbody>
		<?php //$no=1; foreach($dataapi as $r) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php //echo $r["id_pendidikan"] ?></td>
			<td><?php //echo $r["kode"] ?></td>
			<td><?php //echo $r["nama_pendidikan"] ?></td>
		</tr>
		
		<?php//$no++; } ?>
	</tbody>
</table>

<?php
//echo $response; 
/echo $semua_data; 
?>