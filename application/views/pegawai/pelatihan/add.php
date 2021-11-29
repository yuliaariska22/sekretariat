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
          <a href="<?php echo base_url('pegawai/pelatihan')?>">Pelatihan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Pelatihan</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Pelatihan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdatapelatihan')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="jenis_pelatihan">Jenis Pelatihan</label>
                    <select class="form-control" id="jenis_pelatihan" name="jenis_pelatihan" required />
                    <option></option>
                    <option value="Pendidikan dan Pelatihan Kepemimpinan">Pendidikan dan Pelatihan Kepemimpinan</option>
                    <option value="Pendidikan dan Fungsional">Pendidikan dan Fungsional</option>
                    <option value="Pendidikan dan Pelatihan Teknis">Pendidikan dan Pelatihan Teknis</option>
                    <option value="Pendidikan dan Pelatihan Wawasan Management Pemerintahan">Pendidikan dan Pelatihan Wawasan Management Pemerintahan</option>
                      </select>   </div>
                  <div class="col-md-6">
                    <label for="nama_diklat">Nama Diklat</label>
                    <input class="form-control" id="nama_diklat" type="text" aria-describedby="nameHelp" name="nama_diklat" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row"> 
                  <div class="col-md-6">
                    <label for="tempat">Tempat</label>
                    <input class="form-control" id="tempat" type="text" aria-describedby="nameHelp" name="tempat" required/>
                  </div>

                  <div class="col-md-6">
                    <label for="tahun">Angkatan/Tahun</label>
                    <input class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div> 
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="nomor_sk">Nomor SK/STTPP</label>
                    <input class="form-control" id="nomor_sk" type="text" aria-describedby="nameHelp" name="nomor_sk" required/>
                  </div>  
                  
                  <div class="col-md-6">
                    <label for="tanggal_sk">Tanggal SK/STTPP</label>
                    <input class="form-control" id="tanggal_sk" type="date" aria-describedby="nameHelp" name="tanggal_sk" required/>
                  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                
                  
                  <div class="col-md-6">
                    <label for="tanggal_pendidikan_mulai">Tanggal Pelatihan Mulai</label>
                    <input class="form-control" id="tanggal_pendidikan_mulai" type="date" aria-describedby="nameHelp" name="tanggal_pendidikan_mulai" required/>
                  </div>

                    
                  <div class="col-md-6">
                    <label for="tanggal_pendidikan_selesai">Tanggal Pelatihan Selesai</label>
                    <input class="form-control" id="tanggal_pendidikan_selesai" type="date" aria-describedby="nameHelp" name="tanggal_pendidikan_selesai" required/>
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
          </form>
        </div>
</div>
</div>
</div>
</div>



</div>
    </section>

<?php $this->load->view('include/footer'); ?>
