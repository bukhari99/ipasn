<?php 
use App\Models\Konfigurasi_model;
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $title ?></title>
  <!-- Favicons -->
  <link href="<?php echo icon() ?>" rel="icon">
  <link href="<?php echo icon() ?>" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
  <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/summernote/summernote-bs4.min.css">
  <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
  <link href="<?php echo base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <style type="text/css" media="screen">
    .ui-timepicker-container{ 
         z-index:1151 !important; 
    }
  </style>
  <style>
	@import url('https://fonts.googleapis.com/css?family=Supermercado+One');
  .text {
    position: relative;
    display: inline-block;
    font-size: 2em;
    text-transform: uppercase;
    color: #244D49;
    text-shadow: 3px 3px 0px #D7DACC, 5px 5px 0px rgba(0, 0, 0, 0.1);
}
.text2 {
    position: relative;
    display: inline-block;
    font-size: 1.3em;
    text-transform: uppercase;
    color: #244D49;
    text-shadow: 3px 3px 0px #D7DACC, 4px 4px 0px rgba(0, 0, 0, 0.1);
}
	</style>
  <style>
 .text{
  text-decoration: none;
      display: absolute;
      display: block;
      width: 350px;
      height: 80px;
      background: #fff;
      text-align: left;
      padding-left:15px;
      padding-top:15px;
      transform: rotate(0deg) skewX(0deg) translate(0);
      transition: 0.5s;
      box-shadow: -5px 5px 3px rgba(0,0,0,0.5);
 }
 .text2{
  text-decoration: none;
      display: absolute;
      display: block;
      width: 390px;
      height: 80px;
      background: #fff;
      text-align: left;
      padding-left:15px;
      padding-top:25px;
      transform: rotate(0deg) skewX(0deg) translate(0);
      transition: 0.5s;
      box-shadow: -5px 5px 2px rgba(0,0,0,0.5);
 }
 .text3 {
    position: relative;
    display: inline-block;
    font-size: 1em;
    text-transform: uppercase;
    color: #244D49;
    text-shadow: 3px 3px 0px #D7DACC, 5px 5px 0px rgba(0, 0, 0, 0.1);
}
 .tombol{
  text-decoration: none;
      display: absolute;
      display: block;
      width: 310px;
      height: 90px;
      background: #fff;
      text-align: left;
      padding-left:15px;
      padding-top:15px;
      transform: rotate(0deg) skewX(0deg) translate(0);
      transition: 0.5s;
      box-shadow: -4px 4px 5px rgba(0,0,0,0.5);
 }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->