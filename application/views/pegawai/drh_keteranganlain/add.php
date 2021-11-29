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
          <a href="<?php echo base_url('pegawai/drh_keteranganlain')?>">Keterangan Lain</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Keterangan Lain</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Keterangan Lain</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdatadrh_keteranganlain')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="nama_keterangan">Nama Keterangan</label>
                    <input class="form-control" id="nama_keterangan" type="text" aria-describedby="nameHelp" name="nama_keterangan" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input class="form-control" id="tanggal" type="date" aria-describedby="nameHelp" name="tanggal" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                    <label for="surat_keterangan">Surat Keterangan</label>
                    <input class="form-control" id="surat_keterangan" type="text" aria-describedby="nameHelp" name="surat_keterangan" required/>
                  </div> 
                  <div class="col-md-6">
                    <label for="no_surat_keterangan">No Surat Keterangan</label>
                    <input class="form-control" id="tahun" type="no_surat_keterangan" aria-describedby="nameHelp" name="no_surat_keterangan" required/>
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
