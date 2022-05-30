<?php 
echo form_open(base_url('admin/konfigurasi')); 
echo csrf_field(); 
$session = \Config\Services::session();
?>

<h4 class='text'><i class="nav-icon fas fa-sign-out-alt"></i> Informasi Dasar</h4>
<hr>
<div class="form-group row">
	<label class="col-3">NIP</label>
	<div class="col-9">
		<input type="text" name="namaweb" class="form-control" value="<?php echo $user['nip'];//$session->get('nip') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Nama</label>
	<div class="col-9">
		<input type="text" name="singkatan" class="form-control" value="<?php echo $user['nama'];//$session->get('nama_lengkap') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Jenis Jabatan</label>
	<div class="col-9">
		<input type="text" name="tagline" class="form-control" value="<?php echo $user['jenis_jabatan'];//echo $session->get('pangkat')."/".$session->get('golongan'); ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Jenjang Jabatan</label>
	<div class="col-9">
		<input type="text" name="website" class="form-control" value="<?php //echo $user['jenjang_jabatan'];//$session->get('jabatan') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Perangkat Daerah / Unit Kerja
</label>
	<div class="col-9">
		<input type="text" name="website" class="form-control" value="<?php echo $user['instansi'];// $session->get('instansi') ?>">
	</div>
</div>

<center><i><strong>Informasi : </strong>Cek Profil PNS Anda. Jika data tidak sesuai, laporkan ke BKDPSDM</i></center>
<br /><br />
<h4 class='text2'><i class="nav-icon fas fa-sign-out-alt"></i> <strong>Nilai Indeks Profesionalitas ASN</strong></h4>
<hr>

<table class="table table-borderedx" id="example1x">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Dimensi Indikator</th>
			<th width="50%">Sub Dimensi</th>
			
		</tr>
		<tr>
			<th width="5%">1.</th>
			<th width="20%">Kualifikasi</th>
			<th width="50%">Riwayat Pendidikan Terakhir (nilai maks. 25)</th>
			
		</tr>
	</thead>
	<tbody>	
	
		<tr>
			<td></td>
			<td>Keterangan</td>
			<td>Kualifikasi Pendidikan Anda : <?php echo $session->get('pendidikan') ?> <br /><i class="nav-icon fas fa-sign-out-alt"></i> <span style="font-size:2.0em;font-weight:bold;color:#6495ED;"><?php echo $user['kualifikasi']; ?></a></td>
		</tr>
		<tr>
			<th>2.</th>
			<th>Kompetensi</th>
			<th>Riwayat Pengembangan Kompetensi (nilai maks. 40)</th>
		</tr>
		<tr>
			<td></td>
			<td>Keterangan</td>
			<td>:
				<br /><i class="nav-icon fas fa-sign-out-alt"></i> <span style="font-size:2.0em;font-weight:bold;color:#6495ED;"><?php echo $user['kompetensi']; ?></span> </td>
		</tr>
		<tr>
			<th>3.</th>
			<th>Kinerja</th>
			<th>Hasil Penilaian Kinerja (nilai maks. 30)</th>
		</tr>
		<tr>
			<td></td>
			<td>Keterangan</td>
			<td>:<br /><i class="nav-icon fas fa-sign-out-alt"></i> <span style="font-size:2.0em;font-weight:bold;color:#6495ED;"><?php echo $user['kinerja']; ?></span></td>
		</tr>
		<tr>
			<th>4.</th>
			<th>Disiplin</th>
			<th>Riwayat Hukum Disiplin (nilai maks. 5)</th>
		</tr>
		<tr>
			<td></td>
			<td>Keterangan</td>
			<td>:<br /><i class="nav-icon fas fa-sign-out-alt"></i> <span style="font-size:2.0em;font-weight:bold;color:#6495ED;"><?php echo $user['disiplin']; ?></span> </td>
		</tr>
		<tr>
			<th></th>
			<th>Nilai : </th>
			<th><span style="font-size:2.0em;font-weight:bold;color:#6495ED;">(<?php echo ($user['kualifikasi']+$user['kompetensi']+$user['kinerja']+$user['disiplin']); ?>)</span></th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td> </td>
		</tr>
	</tbody>
</table>
<br />
<strong>Sub total (nilai maks. 100)</strong>
<br />
<i><strong><i class="nav-icon fas fa-sign-out-alt"></i> Informasi : </strong>Cek kesesuaian Data Dimensi Indeks Profesionalitas Anda. Jika data tidak sesuai, laporkan ke BKDPSDM</i>
<?php echo form_close(); ?>