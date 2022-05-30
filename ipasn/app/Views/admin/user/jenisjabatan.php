<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/multipleselect/select2.min.css"/>
<?php //include('tambah.php'); ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			
			<th width="50%">Jenis Jabatan</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($jenisjabatan as $jenisjabatan) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			
			<td><?php echo $jenisjabatan['nama_jenisjabatan'] ?></td>
			
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>






		
		