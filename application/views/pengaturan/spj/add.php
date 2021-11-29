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
  
  
        <li class="breadcrumb-item active">Satuan Harga Rekanan</li>
      </ol>
<!-- Example DataTables Card-->
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Menambah Satuan Harga Rekanan</div>
        <div class="card-body">
          <div class="table-responsive">
             <div class="container">

        <form action="<?php echo base_url('pengaturan/action_menambahdataspj')?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
              <div class="form-row">
              
                           
                  <div class="col-md-6">
                    <label for="Kelompok_spj">Kelompok Barang</label>
                    <select class="form-control" name="Kelompok_spj">
                <option value="Umum">Umum</option>
                <option value="Industri">Industri</option>                
                <option value="Kesehatan">Kesehatan</option>                
                <option value="Pertanian">Pertanian</option>  
                <option value="Pekerjaan Umum">Pekerjaan Umum</option>  
                <option value="Lain Lain">Lain Lain</option>         
            </select>
                  </div>
                  <div class="col-md-6">
                    <label for="Namabarang_ssh">Nama Barang</label>
                    <input class="form-control" id="Namabarang_ssh" type="text" aria-describedby="nameHelp" name="Namabarang_ssh" required/>
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
              
                           
                  
                  <div class="col-md-6">
                    <label for="Jenisbarang_spj">Jenis Barang</label>
                    <input class="form-control" id="Jenisbarang_spj" type="text" aria-describedby="nameHelp" name="Jenisbarang_spj"/>
                  </div>
                  <div class="col-md-6">
                    <label for="Ukuran_spj">Ukuran</label>
                    <input class="form-control" id="Ukuran_spj" type="text" aria-describedby="nameHelp" name="Ukuran_spj"/>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
              <div class="form-row">
              
                           
                  
                  <div class="col-md-6">
                    <label for="Spesifikasi_ssh">Spesifikasi Barang</label>
                    <input class="form-control" id="Spesifikasi_ssh" type="text" aria-describedby="nameHelp" name="Spesifikasi_ssh"/>
                  </div>
                  <div class="col-md-6">
                    <label for="Satuan_ssh">Satuan</label>
                    <input class="form-control" id="Satuan_ssh" type="text" aria-describedby="nameHelp" name="Satuan_ssh"/>
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="form-row">
                                     
                  

                  <div class="col-md-6">
                    <label for="Hargasatuan_ssh">Harga Satuan</label>
                    <input class="form-control" id="Hargasatuan_ssh" type="text" aria-describedby="nameHelp" name="Hargasatuan_ssh" required/>
                  </div>
                  <div class="col-md-6">
                    <label for="Tahun_spj	">Tahun Pemesanan</label>
                    <select class="form-control" name="Tahun_spj">               
                <option value="2021">2021</option>
                <option value="2022">2022</option>                
                <option value="2023">2023</option>                
                <option value="2024">2024</option>                
                <option value="2025">2025</option>      
            </select></div>


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
