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
          <a href="<?php echo base_url('pegawai/skp')?>">Daftar DP3/SKP</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Daftar DP3/SKP</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Daftar DP3/SKP</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdataskp')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="nilai">Nilai</label>
                    <input class="form-control" id="nilai" type="text" aria-describedby="nameHelp" name="nilai" required/>
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="pejabat_penilai">Pejabat Penilai</label>
                    <input class="form-control" id="pejabat_penilai" type="text" aria-describedby="nameHelp" name="pejabat_penilai" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="atasan_pejabat_penilai">Atasan Pejabat Penilai</label>
                    <input class="form-control" id="atasan_pejabat_penilai" type="text" aria-describedby="nameHelp" name="atasan_pejabat_penilai" required/>
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
