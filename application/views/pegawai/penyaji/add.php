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
          <a href="<?php echo base_url('pegawai/penyaji')?>">Penyaji</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Penyaji</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Penyaji</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdatapenyaji')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="tempat">Tempat Seminar</label>
                    <input class="form-control" id="tempat" type="text" aria-describedby="nameHelp" name="tempat" required/>
            </div>
                  <div class="col-md-6">
                    <label for="judul_makalah">Judul Makalah</label>
                    <input class="form-control" id="judul_makalah" type="text" aria-describedby="nameHelp" name="judul_makalah" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row"> 
                  <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input class="form-control" id="tahun" type="text" aria-describedby="nameHelp" name="tahun" required/>
                  </div>

                  <div class="col-md-6">
                    <label for="peran">Peran</label>
                    <input class="form-control" id="peran" type="text" aria-describedby="nameHelp" name="peran" required/>
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
