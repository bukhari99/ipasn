<?php 
$session = \Config\Services::session();
use App\Models\Dasbor_model;
$m_dasbor = new Dasbor_model();
$akses_level = $session->get('akses_level');
?>
<div class="alert alert-info">
	<h4>Hai <em class="text-warning"><?php echo $session->get('nama_lengkap') ?></em></h4>
	<hr>
	<p>Selamat datang di website  Sistem Informasi Indeks Profesionalitas ASN dari <strong><?php echo namaweb() ?></strong> KOTA MEDAN.<br />Kewenangan Anda dalam Aplikasi ini sebagai PNS.</p>
  
</div>


 <!-- Info boxes -->
<div class="row">
<?php
        if($akses_level<>'Admin')
         {
         ?>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content tombol">
        <span class="info-box-text"><strong>Nilai Indeks <br />Profesionalitas ASN<br /><br /></strong></span>
        <span class="info-box-number">
          <a href="<?php echo base_url();?>/admin/user/profil">
          <small>Lihat</small></a> Tahun <?php echo $session->get('tahun') ;?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <!-- /.col -->
  <?php
        }
         else
        {
  ?>


  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content tombol">
        <span class="info-box-text"><strong>Nilai Indeks<br />Profesionalitas<br />ASN</strong></span>
        <span class="info-box-number">
          <a href="<?php echo base_url();?>/admin/user/nilaiindeks">
          <small>Lihat</small></a> Tahun <?php echo $session->get('tahun') ;?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <!-- /.col -->

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content tombol">
        <span class="info-box-text"><strong>Nilai Indeks<br />Lainnya</strong></span>
        <span class="info-box-number">
          <a href="<?php echo base_url();?>/admin/user/rekap">
          <small>Lihat</small></a> Tahun <?php echo $session->get('tahun') ;?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  
  <!-- /.col -->
<?php }?>
  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  
  
</div>
<!-- /.row -->


