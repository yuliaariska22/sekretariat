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
          <a href="<?php echo base_url('pengaturan')?>">Pengaturan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Pembebanan Anggaran</li>
      </ol>
    
  <a href="<?php echo base_url('pengaturan/pembebanananggarantambah'); ?>" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
          
    <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        
          <i class="fa fa-table"></i> Daftar Pembebanan Anggaran </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Instansi</th>   
                  <th>Mata Anggaran</th>  
                  <th>Opsi</th> 
                </tr>
              </thead>
            <tbody  class="text-center">
            <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                <tr>
                <td><?= $i ?></td>
                  <td align="left"><?= $data->instansi?></td>
                  <td align="left"><?= $data->mataanggaran?></td>
                  
                  <td>  
                    <a href="<?php echo base_url()?>pengaturan/updatepembebanananggaran/<?php echo $data->id_pembebanananggaran; ?>" class="btn btn-warning">Edit<i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url()?>pengaturan/action_deletepembebanananggaran/<?php echo $data->id_pembebanananggaran; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                <?php
                      $i++;
                    endforeach;
                  ?>
              </tbody>
            </table>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<?php 
$this->load->view('include/footer'); 
?>  