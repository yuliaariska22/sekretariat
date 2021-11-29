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
          <a href="<?php echo base_url('pegawai/penghargaan'); ?>">Penghargaan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data PENGHARGAAN</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data PENGHARGAAN</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatapenghargaan/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="nama_penghargaan">Nama Penghargaan</label>
                    <input value="<?= $data->nama_penghargaan ?>" class="form-control" id="nama_penghargaan" type="text" aria-describedby="nameHelp" name="nama_penghargaan" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="tahun_perolehan">Tahun Perolehan</label>
                    <input value="<?= $data->tahun_perolehan ?>" class="form-control" id="tahun_perolehan" type="text" aria-describedby="nameHelp" name="tahun_perolehan" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="institusi">Nama Negara/Institusi yang Memberi</label>
                    <input value="<?= $data->institusi ?>" class="form-control" id="institusi" type="text" aria-describedby="nameHelp" name="institusi" required/>
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


