<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<form action="<?php echo base_url('admin/staff') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Baru Jenis Bangkom, Anggaran & JP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			<div class="form-group row">
					<label class="col-3">Instansi</label>
					<div class="col-9">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Keterangan" value="Pemerintah Kota Medan">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Kategori Pelatihan</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Kelompok Jalur Pelatihan Utama</option>
							<option value="Jabatan Administrasi">Nama / Topik Pelatihan dari Kelompok Jalur Pelatihan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis Kompetensi</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Manajerial</option>
							<option value="Jabatan Administrasi">Sosial Kultural</option>
							<option value="Jabatan Fungsional">Teknis</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis Pelatihan</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Klasikal</option>
							<option value="Jabatan Administrasi">Non Klasikal</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Nama Jalur Pelatihan</label>
					<div class="col-9">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Keterangan" value="Nama Jalur Pelatihan">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tarif Pelatihan</label>
					<div class="col-9">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Keterangan" value="Tarif Pelatihan">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Satuan</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">JP</option>
							<option value="Jabatan Administrasi">Harian</option>
							<option value="Jabatan Fungsional">Jam</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jam Pelatihan</label>
					<div class="col-9">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Keterangan" value="Jam Pelatihan">
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