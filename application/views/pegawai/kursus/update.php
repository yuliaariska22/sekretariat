<?php 
$this->load->view('include/header'); 
?>


  <div>
    <table>
    <tr height="100px"><td></td></tr>
</table>
  </div>
  <?php foreach ($content->result() as $data) {
          # code...
        } ?>
  <div class="container">
  <ol class="breadcrumb" >
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('pegawai/kursus'); ?>">Kursus</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data KURSUS</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data KURSUS</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatakursus/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
      
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="nama_kursus">Nama Kursus/Latihan</label>
                    <input value = "<?= $data->nama_kursus ?>" class="form-control" id="nama_kursus" type="text" aria-describedby="nameHelp" name="nama_kursus" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="lama_kursus">Lama Kursus</label>
                    <input value = "<?= $data->lama_kursus ?>" class="form-control" id="lama_kursus" type="text" aria-describedby="nameHelp" name="lama_kursus" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="ijazah_tahun">Ijazah Tahun</label>
                    <input value = "<?= $data->ijazah_tahun ?>" class="form-control" id="ijazah_tahun" type="date" aria-describedby="nameHelp" name="ijazah_tahun" required/>
                  </div>  
                  <div class="col-md-6">
                    <label for="tempat">Tempat</label>
                    <input value = "<?= $data->tempat ?>" class="form-control" id="tempat" type="text" aria-describedby="nameHelp" name="tempat" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="ket">Keterangan</label>
                    <input value = "<?= $data->ket ?>" class="form-control" id="ket" type="text" aria-describedby="nameHelp" name="ket" required/>
                  </div>   
              </div>
              </div>

              <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <input  class="form-control btn btn-primary" type="submit" value="Simpan" name="btnSimpan" >
              </div>
            </div>
          </div>
</div>
</div>
</div>
</div>



</div>
    </section>

<?php $this->load->view('include/footer'); ?>


