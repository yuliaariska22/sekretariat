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
          <a href="<?php echo base_url('pegawai/pengalaman_luarnegeri'); ?>">Pengalaman Luar Negeri</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data Pengalaman Luar Negeri</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data Pengalaman Luar Negeri</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatapengalaman_luarnegeri/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="negara">Negara</label>
                    <input value="<?= $data->negara ?>" class="form-control" id="negara" type="text" aria-describedby="nameHelp" name="negara" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="tujuan">Tujuan</label>
                    <input value="<?= $data->tujuan ?>" class="form-control" id="tujuan" type="text" aria-describedby="nameHelp" name="tujuan" required/>
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input value="<?= $data->tanggal_mulai ?>" class="form-control" id="tanggal_mulai" type="date" aria-describedby="nameHelp" name="tanggal_mulai" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="tanggal_sampai">Tanggal Sampai</label>
                    <input value="<?= $data->tanggal_sampai ?>"="form-tanggal_sampai" id="tanggal_sampai" type="date" aria-describedby="nameHelp" name="tanggal_sampai" required/>
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="yang_membiayai">Yang Membiayai</label>
                    <input value="<?= $data->yang_membiayai ?>" class="form-control" id="yang_membiayai" type="text" aria-describedby="nameHelp" name="yang_membiayai" required/>
                  </div>  
               
              </div>
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


