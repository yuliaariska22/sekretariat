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
          <a href="<?php echo base_url('pegawai/keluarga'); ?>">Keluarga</a>
        </li>
  
  
        <li class="breadcrumb-item active">Edit Data KELUARGA</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Edit Data KELUARGA</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_updatedatakeluarga/<?= $data->id?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?= $data->id?>" />
      
        <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="kategori">Hubungan</label>
                    <select class="form-control" id="kategori" name="kategori" required />
                    <option value="<?= $data->kategori ?>"><?= $data->kategori ?></option>
                    <option value="Istri/Suami">Istri/Suami</option>
                    <option value="Anak">Anak</option>
                    <option value="Bapak dan Ibu Kandung">Bapak dan Ibu Kandung</option>
                    <option value="Bapak dan Ibu Mertua">Bapak dan Ibu Mertua</option>
                    <option value="Saudara Kandung">Saudara Kandung</option>
                      </select>   </div>
                  <div class="col-md-6">
                    <label for="nama">Nama</label>
                    <input value="<?= $data->nama ?>" class="form-control" id="nama" type="text" aria-describedby="nameHelp" name="nama" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required />
                    <option value="<?= $data->jenis_kelamin ?>"><?= $data->jenis_kelamin ?></option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                      </select>     </div>  
                  <div class="col-md-6">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input value="<?= $data->pekerjaan ?>" class="form-control" id="pekerjaan" type="text" aria-describedby="nameHelp" name="pekerjaan" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input value="<?= $data->tempat_lahir ?>" class="form-control" id="tempat_lahir" type="text" aria-describedby="nameHelp" name="tempat_lahir" required/>
                  </div>  
                  <div class="col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input value="<?= $data->tanggal_lahir ?>" class="form-control" id="tanggal_lahir" type="date" aria-describedby="nameHelp" name="tanggal_lahir" required/>
                  </div> 
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required />
                    <option value="<?= $data->status ?>"><?= $data->status ?></option>
                    <option value="Masih Hidup">Masih Hidup</option>
                    <option value="Almarhum">Almarhum</option>
                      </select>  </div>  
                  <div class="col-md-6">
                    <label for="ket">Keterangan</label>
                    <input value="<?= $data->ket ?>" class="form-control" id="ket" type="text" aria-describedby="nameHelp" name="ket" required/>
                  </div> 
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="tanggal_nikah">Tanggal Menikah (<b>Diisi khusus untuk Data Suami atau Istri)</b>)</label>
                    <input value="<?= $data->tanggal_nikah ?>"class="form-control" id="tanggal_nikah" type="date" aria-describedby="nameHelp" name="tanggal_nikah" />
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


