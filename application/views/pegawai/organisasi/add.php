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
          <a href="<?php echo base_url('pegawai/organisasi')?>">Organisasi</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Organisasi</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Organisasi</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdataorganisasi')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="masa">Masa</label>
                    <select class="form-control" id="masa" name="masa" required />
                    <option></option>
                    <option value="SLTA ke bawah">SLTA ke bawah</option>
                    <option value="Semasa Perguruan Tinggi">Semasa Perguruan Tinggi</option>
                      </select>   </div>
                  <div class="col-md-6">
                    <label for="nama">Nama Organisasi</label>
                    <input class="form-control" id="nama" type="text" aria-describedby="nameHelp" name="nama" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="kedudukan">Kedudukan dalam Organisasi</label>
                    <input class="form-control" id="kedudukan" type="text" aria-describedby="nameHelp" name="kedudukan" required/>
                </div>  
                  <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
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
                    <label for="nama_pimpinan">Nama Pimpinan</label>
                    <input class="form-control" id="nama_pimpinan" type="text" aria-describedby="nameHelp" name="nama_pimpinan" required/>
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
