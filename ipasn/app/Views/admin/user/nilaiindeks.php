<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="35%">NIP</th>
			<th width="20%">Nama Lengkap</th>
			<th width="20%">Jabatan</th>
			<th width="20%">SKPD</th>
			<th width="20%">Kualifikasi</th>
			<th width="20%">Kompetensi</th>
			<th width="20%">Kinerja</th>
			<th width="20%">Disiplin</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; 
		$kualifikasi = 0;$kompetensi=0;$kinerja=0;$disiplin=0;
		foreach($user as $user) { ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td><?php echo $user['nip'] ?></td>
			<td><?php echo $user['nama'] ?></td>
			<td><?php echo $user['jenis_jabatan']." ".$user['jenjang_jabatan'] ?></td>
			<td><?php echo $user['instansi'] ?></td>
			<td><?php echo $user['kualifikasi'] ?></td>
			<td><?php echo $user['kompetensi'] ?></td>
			<td><?php echo $user['kinerja'] ?></td>
			<td><?php echo $user['disiplin'] ?></td>
		</tr>
		<?php $no++; 
			$kualifikasi = $kualifikasi + $user['kualifikasi'];
			$kompetensi = $kompetensi + $user['kompetensi'];
			$kinerja = $kinerja + $user['kinerja'];
			$disiplin = $disiplin + $user['disiplin'];
	} ?>
		<tr>
			<td><?php echo $no ?>. </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo angka($kualifikasi) ?></td>
			<td><?php echo angka($kompetensi)?></td>
			<td><?php echo angka($kinerja) ?></td>
			<td><?php echo angka($disiplin) ?></td>
		</tr>
	</tbody>
</table>
<?php echo form_close(); ?>