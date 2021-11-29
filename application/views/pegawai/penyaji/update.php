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
          <a href="<?php echo base_url('pegawai/penyaji'); ?>">Penyaji</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data Penyaji</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Penyaji</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatapenyaji/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
      
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tempat">Tempat Seminar</label>
                    <input value="<?= $data->tempat ?>" class="form-control" id="tempat" type="text" aria-describedby="nameHelp" name="tempat" required/>
            </div>
                  <div class="col-md-6">
                    <label for="judul_makalah">Judul Makalah</label>
                    <input value="<?= $data->judul_makalah ?>" class="form-control" id="judul_makalah" type="text" aria-describedby="nameHelp" name="judul_makalah" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row"> 
                  <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input value="<?= $data->tahun ?>" class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div>

                  <div class="col-md-6">
                    <label for="peran">Peran</label>
                    <input value="<?= $data->peran ?>" class="form-control" id="peran" type="text" aria-describedby="nameHelp" name="peran" required/>
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
          </form>
</div>
</div>
</div>
</div>



</div>
    </section>

<?php $this->load->view('include/footer'); ?>


