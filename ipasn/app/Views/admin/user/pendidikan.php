<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/multipleselect/select2.min.css"/>
<?php //include('tambah.php'); ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Kode</th>
			<th width="50%">Tingkat Pendidikan</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pendidikan as $pendidikan) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php echo $pendidikan['kode'] ?></td>
			<td><?php echo $pendidikan['nama_pendidikan'] ?></td>
			
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>






		
		