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
          <a href="<?php echo base_url('pegawai/disiplin'); ?>">Disiplin</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data DISIPLIN</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data DISIPLIN</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatadisiplin/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
      
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input value="<?= $data->tahun ?>" class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="tingkat">Tingkat Hukuman Disiplin</label>
                    <input value="<?= $data->tingkat ?>" class="form-control" id="tingkat" type="text" aria-describedby="nameHelp" name="tingkat" required/>
                  </div>  
                  <div class="col-md-6">
                    <label for="jenis">Jenis Hukuman Disiplin</label>
                    <input value="<?= $data->jenis ?>" class="form-control" id="jenis" type="text" aria-describedby="nameHelp" name="jenis" required/>
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


