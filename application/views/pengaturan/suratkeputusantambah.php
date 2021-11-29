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
          <a href="<?php echo base_url('pengaturan/suratkeputusan')?>">Surat Keputusan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Tambah Surat Keputusan</li>
      </ol>
             <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Tambah Surat Keputusan</div>
        <div class="card-body">
          <div class="table-responsive">
  <div class="container">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengaturan/action_suratkeputusantambah">
       
       <div class="form-group">
       <div class="form-row">
           <div class="col-md-6">
           <label for="no_sk">Nomor SK</label>
          <input class="form-control" id="no_sk" type="text" aria-describedby="nameHelp" name="no_sk" required/>
          </div>
         </div>
       </div>

       <div class="form-group">
       <div class="form-row">
           <div class="col-md-6">
             <label for="instansi">Nama / NIP</label>
             <select class="form-control form-control-sm" id="nip" name="nip" required />
                    <option></option>
                <?php 
                $id_opd = $this->session->userdata('id_opd');
                $pegawai = $this->db->query("SELECT * FROM tbl_pegawai where id_opd=$id_opd order by nama");
                
                foreach ($pegawai->result() as $pegawai) : ?>
                <option value="<?= $pegawai->nip?>"><?= $pegawai->nama?> / <?= $pegawai->nip?></option>
                 <?php endforeach; ?>
             </select> 
            </div>
           <div class="col-md-6">
           <label for="jabatan_sk">Jabatan</label>
          <select class="form-control" id="jabatan_sk" name="jabatan_sk" required />
                    <option></option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Pengurus Barang Pengguna">Pengurus Barang Pengguna</option>
                    <option value="Pejabat Penatausahaan Barang">Pejabat Penatausahaan Barang</option>
                    <option value="Pengguna Anggaran">Pengguna Anggaran</option>
                    <option value="Pejabat Pembuat Komitmen">Pejabat Pembuat Komitmen</option>
                   
                      </select>  
         </div>
         </div>
       </div>

       <div class="form-group">
       <div class="form-row">
            <div class="col-md-6">
           <label for="pangkat_sk">Pangkat</label>
           <input class="form-control" id="pangkat_sk" type="text" aria-describedby="nameHelp" name="pangkat_sk" required/>
          </div>

           <div class="col-md-6">
           <label for="gol_sk">Golongan</label>
           <input class="form-control" id="gol_sk" type="text" aria-describedby="nameHelp" name="gol_sk" required/>
          </div>
         </div>
       </div>

       <div class="form-group">
       <div class="form-row">
            <div class="col-md-6">
           <label for="tanggal_sk">Tanggal SK</label>
           <input class="form-control" id="tanggal_sk" type="date" aria-describedby="nameHelp" name="tanggal_sk" required/>
          </div>

           <div class="col-md-6">
           <label for="tanggal_skberakhir">Tanggal SK Berakhir</label>
           <input class="form-control" id="tanggal_skberakhir" type="date" aria-describedby="nameHelp" name="tanggal_skberakhir" required/>
          </div>
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

<?php 
$this->load->view('include/footer'); 
?>  