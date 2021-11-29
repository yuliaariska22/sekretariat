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
          <a href="<?php echo base_url('pegawai/du_kepangkatan'); ?>">Daftar Urut Kepangkatan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data Daftar Urut Kepangkatan</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Daftar Urut Kepangkatan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatadu_kepangkatan/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input value="<?= $data->tahun ?>" class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="urutan">Urutan/Peringkat DUK</label>
                    <input value="<?= $data->urutan ?>" class="form-control" id="urutan" type="text" aria-describedby="nameHelp" name="urutan" required/>
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


