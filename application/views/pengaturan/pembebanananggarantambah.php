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
          <a href="<?php echo base_url('pengaturan/pembebanananggaran')?>">Pembebanan Anggaran</a>
        </li>
  
  
        <li class="breadcrumb-item active">Tambah Pembebanan Anggaran</li>
      </ol>
             <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-plus"></i> Tambah Pembebanan Anggaran</div>
        <div class="card-body">
          <div class="table-responsive">
  <div class="container">
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengaturan/action_pembebanananggarantambah">
       
       <div class="form-group">
       <div class="form-row">
           <div class="col-md-6">
             <label for="instansi">Instansi</label>
             <input class="form-control" id="instansi" type="text" aria-describedby="nameHelp" name="instansi" required/>
           </div>
           <div class="col-md-6">
           <label for="mataanggaran">Mata Anggaran</label>
             <input class="form-control" id="mataanggaran" type="text" aria-describedby="nameHelp" name="mataanggaran" required/>
           </div>
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