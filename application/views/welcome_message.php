<?php 
$this->load->view('include/header'); 
?>
<table>
<tr height="50px"><td></td></tr>
</table>
 <!-- ======= About Section ======= -->
 <section id="about" class="about section-bg">
 <div class="hero-container" data-aos="fade-in">
      <h1>Selamat Datang, <?= $this->session->userdata('nama');?> !</h1>
         <br>
         <br>    
  
          <a href="<?= base_url('gantipassword');?>" class="get-started-btn scrollto">Pengaturan Akun</a>
            </div>
          </div>
         
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  

  <main id="main">


  

 

  </main><!-- End #main -->

<?php 
$this->load->view('include/footer'); 
?>  