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
          <a href="">Pengaturan</a>
        </li>
  
  
        <li class="breadcrumb-item active">SSH</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Rekanan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pengaturan/action_menambahdatarekanan')?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
              <div class="form-row">
              
                           
                  
                  <div class="col-md-6">
                    <label for="nama_pimpinan">Nama Pimpinan</label>
                    <input class="form-control" id="nama_pimpinan" type="text" aria-describedby="nameHelp" name="nama_pimpinan" required/>
                  </div>
                  
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="nama_rekanan">Nama Rekanan</label>
                    <input class="form-control" id="nama_rekanan" type="text" aria-describedby="nameHelp" name="nama_rekanan" required/>
                  </div>          
                  

                  <div class="col-md-6">
                    <label for="alamat_rekanan">Alamat Rekanan</label>
                    <input class="form-control" id="alamat_rekanan" type="text" aria-describedby="nameHelp" name="alamat_rekanan" required/>
                  </div>


                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="npwp_rekanan">NPWP Rekanan</label>
                    <input class="form-control" id="npwp_rekanan" type="text" aria-describedby="nameHelp" name="npwp_rekanan" required/>
                  </div>          
                  

                  <div class="col-md-6">
                    <label for="rekening_rekanan">Rekening Rekanan</label>
                    <input class="form-control" id="rekening_rekanan" type="text" aria-describedby="nameHelp" name="rekening_rekanan" required/>
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
