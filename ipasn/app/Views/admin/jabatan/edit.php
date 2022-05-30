<?php 
echo form_open(base_url('admin/user/edit/'.$user['id_user'])); 
echo csrf_field(); 
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/multipleselect/select2.min.css"/>
<div class="form-group row">
	<label class="col-3">Nama Lengkap </label>
	<div class="col-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo $user['nama_lengkap'] ?>" readonly>
	</div>
</div>

<div class="form-group row">
					<label class="col-3">NIP</label>
					<div class="col-9">
					<input type="hidden" name="id_user" class="form-control"  value="<?php echo $user['id_user'] ?>" placeHolder="ID User" readonly>
						<input type="text" name="nik" class="form-control"  value="<?php echo $user['nip'] ?>" placeHolder="Nik" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Instansi</label>
					<div class="col-9">
						<input type="text" name="instansi" class="form-control" value="" placeHolder="Pemerintah Kota Medan" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tempat Lahir</label>
					<div class="col-9">
						<input type="text" name="tempatlahir" class="form-control" value="<?php echo $user['tempat_lahir'] ?>" placeHolder="Tempat Lahir" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tanggal Lahir</label>
					<div class="col-9">
						<input type="date" name="tgllahir" class="form-control"  value="<?php echo $user['tgl_lahir'] ?>" placeHolder="Tanggal Lahir" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis Kelamin</label>
					<div class="col-9">
					<?php
							if($user['gender']==='1')
							{
								$jk = "Laki-laki";
							}
							else
							{
								$jk = "Perempuan";
							}
						?>
						<input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $jk ?>" placeHolder="Jenis Kelamin" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Alamat</label>
					<div class="col-9">
						<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $user['alamat'] ?>"  readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Nomor Kontak</label>
					<div class="col-9">
						<input type="text" name="nomor_kontak" class="form-control" placeholder="Nomor Kontak" value="<?php echo $user['nomor_hp'] ?>"  readonly>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Pendidikan</label>
					<div class="col-9">
					<div class="col-9">
						<input type="text" name="nomor_kontak" class="form-control" placeholder="Nomor Kontak" value="<?php echo $user['nama_pendidikan'] ?>"  readonly>
					</div>
					</div>
				</div>

				

				

				<div class="form-group row">
					<label class="col-3">Unit Kerja</label>
					<div class="col-9">
					<input type="text" name="unit_kerja" class="form-control" placeholder="Nomor Kontak" value="<?php echo $user['nama_unitkerja'] ?>"  readonly>
				</select>
					</div>
				</div>

				

				<div class="form-group row">
					<label class="col-3">Atasan Langsung</label>
					<div class="col-9">
					<select name="atasan_langsung" class="form-control">

					<option value="<?php echo $user['atasan_langsung'] ?>" selected><?php echo $user['atasan_langsung'] ?>
					</option>
					


						<?php foreach($pegawai as $pegawai) { ?>
					<option value="<?php echo $pegawai['nip'] ?>#<?php echo $pegawai['nama_lengkap'] ?>">
					<?php 
						echo $pegawai['nama_lengkap'] ?>
					</option>
					<?php } ?>
						</select>
					</div>
				</div>

<div class="form-group row">
	<label class="col-3">Email</label>
	<div class="col-9">
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email'] ?>" readonly>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Username</label>
	<div class="col-9">
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user['username'] ?>" readonly>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Password</label>
	<div class="col-9">
		<input type="text" name="password" class="form-control" placeholder="Password" value="">
		<small class="text-danger">Minimal 6 karakter dan maksimal 32 karakter atau biarkan kosong</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Level</label>
	<div class="col-9">
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User" <?php if($user['akses_level']=="User") { echo 'selected'; } ?>>User</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>