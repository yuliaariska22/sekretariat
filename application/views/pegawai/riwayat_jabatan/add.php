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
          <a href="<?php echo base_url('pegawai/riwayat_jabatan')?>">Riwayat Jabatan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Riwayat Jabatan</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Riwayat Jabatan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdatariwayat_jabatan')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
                   <div class="col-md-6">
                     <label for="jabatan">Jabatan</label>
                      <input class="form-control" id="jabatan" type="text" aria-describedby="nameHelp" name="jabatan" required/> 
                    </div>
                  <div class="col-md-6">
                    <label for="gol">Gol/Ruang</label>
                    <input class="form-control" id="gol" type="text" aria-describedby="nameHelp" name="gol" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row"> 
                  <div class="col-md-6">
                    <label for="tmt">TMT</label>
                    <input class="form-control" id="tmt" type="date" aria-describedby="nameHelp" name="tmt" required/>
                  </div>

                  <div class="col-md-6">
                    <label for="pejabat">Pejabat</label>
                    <input class="form-control" id="pejabat" type="text" aria-describedby="nameHelp" name="pejabat" required/>
                  </div> 
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="nomor_sk">Nomor SK</label>
                    <input class="form-control" id="nomor_sk" type="text" aria-describedby="nameHelp" name="nomor_sk" required/>
                  </div>  
                  
                  <div class="col-md-6">
                    <label for="tanggal_sk">Tanggal SK</label>
                    <input class="form-control" id="tanggal_sk" type="date" aria-describedby="nameHelp" name="tanggal_sk" required/>
                  </div>
              </div>
              </div>

              <div class="form-group">
              <div class="form-row"> 
                  <div class="col-md-6">
                    <label for="eselon">Eselon</label>
                    <input class="form-control" id="eselon" type="text" aria-describedby="nameHelp" name="eselon" required/>
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
