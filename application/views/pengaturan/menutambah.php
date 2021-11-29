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
          <a href="<?php echo base_url('pengaturan/menu')?>">Menu</a>
        </li>
  
  
        <li class="breadcrumb-item active">Tambah Menu</li>
      </ol>
             <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Tambah Menu</div>
        <div class="card-body">
          <div class="table-responsive">
  <div class="container">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengaturan/action_menutambah">
       
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
           <label for="menu">Menu</label>
           <select class="form-control form-control-sm" id="menu" name="menu" required />
           
                <option></option>
                <option value="- SPPD - Pengajuan SPPD">- SPPD - Pengajuan SPPD</option>
                <option value="- SPPD - Laporan Perjalanan Dinas">- SPPD - Laporan Perjalanan Dinas</option>
                <option value="- SPPD - Laporan SPPD">- SPPD - Laporan SPPD</option>

                
                <option>-------------</option>

                <option value="- Pengaturan - Menu">- Pengaturan - Menu</option>
                <option value="- Pengaturan - Pembebanan Anggaran">- Pengaturan - Pembebanan Anggaran</option>
                <option value="- Pengaturan - Surat Keputusan">- Pengaturan - Surat Keputusan</option>
                <option value="- Pengaturan - SSH">- Pengaturan - SSH</option>
                <option value="- Pengaturan - Rekanan">- Pengaturan - Rekanan</option>
               
                
                <option>-------------</option>
                
                <option value="- Barang Persediaan - Pengajuan Pengadaan">- Barang Persediaan - Pengajuan Pengadaan</option>
                <option value="- Barang Persediaan - Cetak Surat Pengadaan">- Barang Persediaan - Cetak Surat Pengadaan</option>
                <option value="- Barang Persediaan - Konfirmasi Pengadaan">- Barang Persediaan - Konfirmasi Pengadaan</option>
                <option value="- Barang Persediaan - Laporan Pengadaan">- Barang Persediaan - Laporan Pengadaan</option>
                
                <option value="- Barang Persediaan - Pengajuan Permintaan Bidang">- Barang Persediaan - Pengajuan Permintaan Bidang</option>
                <option value="- Barang Persediaan - Cetak Surat Penyaluran">- Barang Persediaan - Cetak Surat Penyaluran</option>
                <option value="- Barang Persediaan - Konfirmasi Penyaluran">- Barang Persediaan - Konfirmasi Penyaluran</option>
                <option value="- Barang Persediaan - Laporan Penyaluran">- Barang Persediaan - Laporan Penyaluran</option>
               
                
                <option>-------------</option>
                
                <option value="- Aset - KIB A">- Aset - KIB A</option>
                <option value="- Aset - KIB B">- Aset - KIB B</option>
                <option value="- Aset - Laporan Aset">- Aset - Laporan Aset</option>
                <option value="- Pegawai - Verifikasi Data Pegawai">- Pegawai - Verifikasi Data Pegawai</option>

             </select> </div>
         </div>
       </div>

       <div 

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