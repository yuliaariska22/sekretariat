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
          <a href="<?php echo base_url('pegawai/datapribadi')?>">Data Pribadi</a>
        </li>
  
  
        <li class="breadcrumb-item active">Tambah Data Diri</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Tambah Data Diri</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo config_item('base_url'); ?>/pegawai/action_tambahdatadiri" method="post" enctype="multipart/form-data">
      
        <div class="form-group">
              <div class="form-row">
                 <div class="col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input class="form-control" id="tempat_lahir" type="text" aria-describedby="nameHelp" name="tempat_lahir" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input  class="form-control" id="tanggal_lahir" type="date" aria-describedby="nameHelp" name="tanggal_lahir" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required />
                    <option></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                      </select>  </div>  
                  <div class="col-md-6">
                    <label for="agama">Agama</label>
                    <input  class="form-control" id="agama" type="text" aria-describedby="nameHelp" name="agama" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select class="form-control" id="status_perkawinan" name="status_perkawinan" required />
                    <option></option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Duda/Janda">Duda/Janda</option>
                      </select>              
                    </div>      
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="alamatrumah_jalan">Alamat Rumah (Jalan)</label>
                    <input  class="form-control" id="alamatrumah_jalan" type="text" aria-describedby="nameHelp" name="alamatrumah_jalan" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="alamatrumah_kelurahan">Kelurahan</label>
                    <input  class="form-control" id="alamatrumah_kelurahan" type="text" aria-describedby="nameHelp" name="alamatrumah_kelurahan" required/>
                   </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="alamatrumah_kecamatan">Kecamatan</label>
                    <input  class="form-control" id="alamatrumah_kecamatan" type="text" aria-describedby="nameHelp" name="alamatrumah_kecamatan" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="alamatrumah_kota">Kota</label>
                    <input  class="form-control" id="alamatrumah_kota" type="text" aria-describedby="nameHelp" name="alamatrumah_kota" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="alamatrumah_provinsi">Provinsi</label>
                    <input  class="form-control" id="alamatrumah_provinsi" type="text" aria-describedby="nameHelp" name="alamatrumah_provinsi" required/>
                  </div>      
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="keteranganbadan_tinggi">Tinggi Badan</label>
                    <input  class="form-control" id="keteranganbadan_tinggi" type="text" aria-describedby="nameHelp" name="keteranganbadan_tinggi" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="keteranganbadan_berat">Berat Badan</label>
                    <input  class="form-control" id="keteranganbadan_berat" type="text" aria-describedby="nameHelp" name="keteranganbadan_berat" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="keteranganbadan_rambut">Rambut</label>
                    <input  class="form-control" id="keteranganbadan_rambut" type="text" aria-describedby="nameHelp" name="keteranganbadan_rambut" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="keteranganbadan_bentukmuka">Bentuk Muka</label>
                    <input  class="form-control" id="keteranganbadan_bentukmuka" type="text" aria-describedby="nameHelp" name="keteranganbadan_bentukmuka" required/>
                  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="keteranganbadan_warnakulit">Warna Kulit</label>
                    <input  class="form-control" id="keteranganbadan_warnakulit" type="text" aria-describedby="nameHelp" name="keteranganbadan_warnakulit" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="keteranganbadan_ciricirikhas">Ciri Ciri Khas</label>
                    <input  class="form-control" id="keteranganbadan_ciricirikhas" type="text" aria-describedby="nameHelp" name="keteranganbadan_ciricirikhas" required/>
                  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="keteranganbadan_cacattubuh">Cacat Tubuh</label>
                    <input  class="form-control" id="keteranganbadan_cacattubuh" type="text" aria-describedby="nameHelp" name="keteranganbadan_cacattubuh" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="hobby">Hobi</label>
                    <input  class="form-control" id="hobby" type="text" aria-describedby="nameHelp" name="hobby" required/>
                  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="jeniskepegawaian">Jenis Kepegawaian</label>
                    <input  class="form-control" id="jeniskepegawaian" type="text" aria-describedby="nameHelp" name="jeniskepegawaian" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="berkas">Pas Foto</label>
                    <input  class="form-control" id="berkas" type="file" aria-describedby="nameHelp" name="berkas"/>
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


