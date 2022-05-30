<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>

<?php 
echo form_open(base_url('admin/user')); 
echo csrf_field(); 
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Baru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Nama Lengkap</label>
					<div class="col-9">
						<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?php echo set_value('nama') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">NIK</label>
					<div class="col-9">
						<input type="text" name="nik" class="form-control"  value="" placeHolder="Nik" required>
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
						<input type="text" name="tempatlahir" class="form-control" value="" placeHolder="Tempat Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tanggal Lahir</label>
					<div class="col-9">
						<input type="date" name="tgllahir" class="form-control"  value="" placeHolder="Tanggal Lahir" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis Kelamin</label>
					<div class="col-9">
						<select name="jenis_kelamin" class="form-control">
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Alamat</label>
					<div class="col-9">
						<input type="text" name="alamat" class="form-control" placeholder="Alamat" value=""  required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Nomor Kontak</label>
					<div class="col-9">
						<input type="text" name="nomor_kontak" class="form-control" placeholder="Nomor Kontak" value=""  required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Pendidikan</label>
					<div class="col-9">
						<select name="pendidikan" class="form-control">
							<option value=""></option>
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">NIP ASN</label>
					<div class="col-9">
						<input type="text" name="nip_asn" class="form-control" placeholder="NIP ASN" value=""  required>
					</div>
				</div>

				

				<div class="form-group row">
					<label class="col-3">Unit Kerja</label>
					<div class="col-9">
					<select id="unit_kerja" name="unit_kerja"  class="form-control" size="90%" required>
					<?php foreach($unitkerja as $unitkerja) { ?>
					<option value="<?php echo $unitkerja['id_unitkerja'] ?>">
						<?php echo $unitkerja['nama_unitkerja'] ?>
					</option>
					<?php } ?>
				</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jabatan</label>
					<div class="col-9">
						<select id="jabatan2" name="jabatan" class="form-control" size="90%">
						<?php foreach($jabatan as $jabatan) { ?>
					<option value="<?php echo $jabatan['nama_jabatan'] ?>">
					<?php echo $jabatan['nama_jabatan'] ?>
					</option>
					<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Pangkat</label>
					<div class="col-9">
						<select id="pangkat2" name="pangkat" class="form-control" size="50%">
						<?php foreach($pangkat as $pangkat) { ?>
					<option value="<?php echo $pangkat['data_pangkat'] ?>">
					<?php echo $pangkat['data_pangkat'] ?>
					</option>
					<?php } ?>
						</select>
					</div>
				</div>

				

				<div class="form-group row">
					<label class="col-3">Atasan Langsung</label>
					<div class="col-9">
						<select name="atasan_langsung" class="form-control">
							<option value=""></option>
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Email</label>
					<div class="col-9">
						<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Username</label>
					<div class="col-9">
						<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Password</label>
					<div class="col-9">
						<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Level</label>
					<div class="col-9">
						<select name="akses_level" class="form-control">
							<option value="Admin">Admin</option>
							<option value="User">User</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>



		