<?php 
$this->load->view('include/header'); 
?>

<main id="main">
  

   <!-- ======= Menu Section ======= -->
   <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>MENU</h2>
       </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
            
            <h3><a href="<?= base_url('pegawai/datadiri'); ?>"><u>Data Diri</u></a></h3>
            <h3><a href="<?= base_url('pegawai/keluarga'); ?>"><u>Data Keluarga</u></a></h3>
            <h3><a href="<?= base_url('pegawai/drh_keteranganlain'); ?>"><u>Keterangan Lain</a></u></h3>         
                    </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3><a href="<?= base_url('pegawai/pendidikan'); ?>"><u>Pendidikan</a></u></h3>
              <h3><a href="<?= base_url('pegawai/kursus'); ?>"><u>Kursus</a></u></h3>
              <h3><a href="<?= base_url('pegawai/pelatihan'); ?>"> <u>Pelatihan</u></a></h3>
              <h3><a href="<?= base_url('pegawai/organisasi'); ?>"><u>Organisasi</a></u></h3>
              <h3><a href="<?= base_url('pegawai/penghargaan'); ?>"><u>Tanda/Jasa Penghargaan</a></u></h3>
              <h3><a href="<?= base_url('pegawai/pengalaman_luarnegeri'); ?>"> <u>Pengalaman Luar Negeri</a></u></h3>
              <h3><a href="<?= base_url('pegawai/penyaji'); ?>"><u>Pengalaman Penyaji Seminar/Lokakarya</a></u></h3>
              <h3><a href="<?= base_url('pegawai/karyatulis'); ?>"><u>Buku/Karya tulis/makalah</a></u></h3>
             
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3><a href="<?= base_url('pegawai/riwayat_jabatan'); ?>"> <u>Riwayat Jabatan</a></u></h3>
              <h3><a href="<?= base_url('pegawai/riwayat_kepangkatan'); ?>"> <u>Riwayat kepangkatan</a></u></h3>
              <h3><a href="<?= base_url('pegawai/du_kepangkatan'); ?>"> <u>daftar urut kepangkatan</a></u></h3>
              <h3><a href="<?= base_url('pegawai/skp'); ?>"><u>dp3/skp</a></u></h3>
              <h3><a href="<?= base_url('pegawai/disiplin'); ?>"><u>disiplin</a></u></h3>
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  </main>
</div>


</div>
<?php 
$this->load->view('include/footer'); 
?>  