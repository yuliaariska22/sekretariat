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
          <a href="<?php echo base_url('pegawai/pendidikan')?>">Pendidikan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Menambah Data Pendidikan</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Data Pendidikan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pegawai/action_menambahdatapendidikan')?>" method="post" enctype="multipart/form-data">
        
              <div class="form-group">
              <div class="form-row">
                 <div class="col-md-6">
                    <label for="tingkat">Tingkat</label>
                    <select class="form-control" id="tingkat" name="tingkat" required />
                    <option></option>
                    <option value="SD">SD</option>
                    <option value="SLTP">SLTP</option>
                    <option value="SLTA">SLTA</option>
                    <option value="D I">D I</option>
                    <option value="D II">D II</option>
                    <option value="D III">D III</option>
                    <option value="S 1">S 1</option>
                    <option value="S 2">S 2</option>
                    <option value="S 3">S 3</option>
                    <option value="Spesialis II">Spesialis II</option>
                    <option value="Profesi">Profesi</option>
                      </select>  </div>
                  <div class="col-md-6">
                    <label for="nama_pendidikan">Nama Pendidikan</label>
                    <input class="form-control" id="nama_pendidikan" type="text" aria-describedby="nameHelp" name="nama_pendidikan" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                    <label for="jurusan">Jurusan</label>
                    <input class="form-control" id="jurusan" type="text" aria-describedby="nameHelp" name="jurusan" required/>
                  </div>  
                  <div class="col-md-6">
                    <label for="tempat">Tempat</label>
                    <input class="form-control" id="tempat" type="text" aria-describedby="nameHelp" name="tempat" required/>
                  </div>
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="nama_pimpinan_pendidikan">Nama Pimpinan Pendidikan</label>
                    <input class="form-control" id="nama_pimpinan_pendidikan" type="text" aria-describedby="nameHelp" name="nama_pimpinan_pendidikan" required/>
                  </div>   
              </div>
              </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <label for="no_ijazah">No Ijazah</label>
                    <input class="form-control" id="no_ijazah" type="text" aria-describedby="nameHelp" name="no_ijazah" required/>
                  </div>      
                  <div class="col-md-6">
                    <label for="tanggal_ijazah">Tanggal Ijazah</label>
                    <input class="form-control" id="tanggal_ijazah" type="date" aria-describedby="nameHelp" name="tanggal_ijazah" required/>
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
