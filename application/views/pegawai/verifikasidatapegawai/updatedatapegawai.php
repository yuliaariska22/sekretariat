<?php 
$this->load->view('include/header'); 
?>


  <div>
    <table>
    <tr height="100px"><td></td></tr>
</table>
  </div>
  
 
  <div class="container">
  <ol class="breadcrumb" >
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('pegawai/verifikasidatapegawai')?>">Data Pegawai</a>
        </li>
  
  
        <li class="breadcrumb-item active">Updata Data Pegawai</li>
      </ol>
<!-- Example DataTables Card-->
<?php foreach ($content->result() as $data) {
          # code...
        } ?>

<div class="card mb-3"> 
        <div class="card-header">
          <i class="fa fa-plus"></i> Update Data Pegawai</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatapegawai/<?= $data->nip?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="nip"  value="<?= $data->nip?>" />
        <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <input value="<?= $data->nama?>"class="form-control" id="nama" type="text" aria-describedby="nameHelp" name="nama" required/>
                  </div>
                  
                </div>
              </div>
      </div>

            
              <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <input class="form-control btn btn-primary" type="submit" value="Simpan" name="btnSimpan" >
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
