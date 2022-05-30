<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/multipleselect/select2.min.css"/>
<?php //include('tambah.php'); ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Kode</th>
			<th width="50%">Pangkat</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pangkat as $pangkat) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php echo $pangkat['data_pangkat'] ?></td>
			<td><?php echo $pangkat['data_gol_ruang'] ?></td>
			
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>






		
		