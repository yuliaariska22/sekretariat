<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-sekretariat Application</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(''); ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(''); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url(''); ?>assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(''); ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento - v1.1.1
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php 
$nip = $this->session->userdata('nip');
//PEGAWAI

$cetakbiodata = $this->db->query("SELECT * FROM tbl_pegawai where nip=$nip and status_verifikasi='Sudah Diverifikasi'")->row();
if ($cetakbiodata != NULL){
  $url_cetakbiodata = "pegawai/cetakbiodata";
}else{
  $url_cetakbiodata = "welcome";
}

$cetakdrh = $this->db->query("SELECT * FROM tbl_pegawai where nip=$nip and status_verifikasi='Sudah Diverifikasi'")->row();
if ($cetakdrh != NULL){
  $url_cetakdrh = "pegawai/cetakdaftarriwayathidup";
}else{
  $url_cetakdrh = "welcome";
}


$verifikasidatapegawai = $this->db->query("SELECT * FROM tbl_menu where nip=$nip and menu='- Pegawai - Verifikasi Data Pegawai'")->row();
if ($verifikasidatapegawai != NULL){
  $url_verifikasidatapegawai = "pegawai/verifikasidatapegawai";
}else{
  $url_verifikasidatapegawai = "welcome";
}

//Pengaturan
$menu = $this->db->query("SELECT * FROM tbl_menu where nip=$nip and menu='- Pengaturan - Menu'")->row();
if ($menu != NULL){
  $url_menu = "pengaturan/menu";
}else{
  $url_menu = "welcome";
}


$suratkeputusan = $this->db->query("SELECT * FROM tbl_menu where nip=$nip and menu='- Pengaturan - Surat Keputusan'")->row();
if ($suratkeputusan != NULL){
  $url_suratkeputusan = "pengaturan/suratkeputusan";
}else{
  $url_suratkeputusan = "welcome";
}



?>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.html">E-Sekretariat<span>.</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="<?php echo base_url(' '); ?>">Home</a></li>
              <li class="drop-down"><a href="">Pegawai</a>
                <ul>
                  <li class="drop-down"><a href="">Data Pribadi</a>
                    <ul>
                    <li><a href="<?= base_url('pegawai/datapribadi'); ?>">Input Data Pribadi</a></li>
                      <li><a href="<?= base_url($url_cetakbiodata); ?>">Cetak Biodata Diri</a></li>
                      <li><a href="<?= base_url($url_cetakdrh); ?>">Cetak Daftar Riwayat Hidup</a></li>
                      
                    </ul>
                  </li>
                  <li><a href="<?= base_url($url_verifikasidatapegawai); ?>">Verifikasi Data Pegawai</a></li>
                
                </ul>
              </li>
              <li class="drop-down"><a href="">Pengaturan Menu</a>
                    <ul>
                      <li><a href="<?= base_url($url_menu); ?>">Menu</a></li>
                      <li><a href="<?= base_url($url_suratkeputusan); ?>">Surat Keputusan</a></li>
                      
                    </ul>
                  </li>
          </nav><!-- .nav-menu -->
          
          <a href="<?php echo base_url('login/logout'); ?>" class="get-started-btn scrollto">Logout</a>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  