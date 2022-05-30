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
				<h4 class="modal-title">Tambah Baru Standard Kompetensi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Jabatan</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Jabatan Pimpinan Tinggi</option>
							<option value="Jabatan Administrasi">Jabatan Administrasi</option>
							<option value="Jabatan Fungsional">Jabatan Fungsional</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenjang Jabatan</label>
					<div class="col-9">
					

						<select name="id_kategori_staff" class="form-control">
							<option value="JPT Utama">JPT Utama</option>
							<option value="JPT Madya">JPT Madya</option>
							<option value="JPT Pratama">JPT Pratama</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Nama Jabatan</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Kepala Subbagian Perencana</option>
							<option value="Jabatan Administrasi">Kepala Subbagian Kesejahteraan</option>
							<option value="Jabatan Fungsional">Kepala Subbagian Manajemen Talenta</option>
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
					<label class="col-3">Jenis Komponen</label>
					<div class="col-9">
					<select name="id_kategori_staff" class="form-control">
							<option value="Jabatan Pimpinan Tinggi">Administrasi Negara</option>
							<option value="Jabatan Administrasi">Administrasi Pendidikan</option>
							<option value="Jabatan Fungsional">Administrasi Publik</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Level</label>
					<div class="col-6">
						<input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo set_value('jabatan') ?>">
					</div>
					<div class="col-3">
						<input type="number" name="urutan" class="form-control" placeholder="Indikator" value="<?php echo set_value('urutan') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Keterangan</label>
					<div class="col-9">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Keterangan" value="<?php echo set_value('tempat_lahir') ?>">
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