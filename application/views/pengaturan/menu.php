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
  
  
        <li class="breadcrumb-item active">Menu</li>
      </ol>
    
  <a href="<?php echo base_url('pengaturan/menutambah'); ?>" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
          
    <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        
          <i class="fa fa-table"></i> Daftar Menu </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>NIP</th> 
                  <th>Nama</th>   
                  <th>Menu</th>  
                  <th>Opsi</th> 
                </tr>
              </thead>
            <tbody  class="text-center">
            <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                <tr>
                <td><?= $i ?></td>
                  <td align="left"><?= $data->nip?></td>
                  <td align="left"><?= $data->nama?></td>
                  <td align="left"><?= $data->menu?></td>
                  
                  <td>  
                    <a href="<?php echo base_url()?>pengaturan/action_deletemenu/<?php echo $data->id_menu; ?>" onclick="return confirm('Apakah anda yakin?');" class="">Hapus<i class="fa fa-trash"></i></a> 
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