<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/multipleselect/select2.min.css"/>
<?php //include('tambah.php'); ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Kode</th>
			<th width="50%">Jabatan</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($user as $user) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php echo $user['kode_jabatan'] ?></td>
			<td><?php echo $user['nama_jabatan'] ?></td>
			
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>






		
		