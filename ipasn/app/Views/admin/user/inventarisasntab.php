<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsrulDev</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="tabs" style="border-radius:10px">

    <input type="radio" class="tabs_item" name="tabs-example" id="data_tab" checked>
        <label for="data_tab" class="tabs_name">Profil</label>
        <div class="tabs_content">
            

        
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





            
        </div>

        <input type="radio" class="tabs_item" name="tabs-example" id="home_tab">
        <label for="home_tab" class="tabs_name">Riwayat Jabatan</label>
        <div class="tabs_content">
           

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
            
        </div>
        <input type="radio" class="tabs_item" name="tabs-example" id="about_tab">
        <label for="about_tab" class="tabs_name">Riwayat Pengembangan Kompetensi</label>
        <div class="tabs_content">
           
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


        </div>

        <input type="radio" class="tabs_item" name="tabs-example" id="assesment_tab">
        <label for="assesment_tab" class="tabs_name">Self Assesment</label>
        <div class="tabs_content">
        

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
					<label class="col-3">Nilai Kinerja</label>
					<div class="col-9">
					<input type="number" name="id_user" class="form-control"  value="" placeHolder="Nilai Kinerja" >
					
					</div>
				</div>

                <div class="form-group row">
					<label class="col-3">Nilai Rata-Rata Kompetensi</label>
					<div class="col-9">
					<input type="number" name="id_user" class="form-control"  value="" placeHolder="Nilai Rata-Rata Kompetensi" >
					
					</div>
				</div>



                 <!-- Tab Penilaian ------------------------------------------------------------------------------------------->

               <?php include("manajerial.php");?>
<br />
<?php include("sosial.php");?>
<br />
<?php include("teknis.php");?>
                <!-- End of Penilaian ------------------------------------------------------------------------------------------->

            
        </div>
    </div>
</body>
</html>
