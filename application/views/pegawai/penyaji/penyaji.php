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
          <a href="<?php echo base_url('pegawai/datapribadi'); ?>">Data Pribadi</a>
        </li>
  
  
        <li class="breadcrumb-item active">Penyaji</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatapenyaji'); ?>" class="btn btn-primary">Tambah Penyaji<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Penyaji</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Tempat Seminar</th>
                  <th>Judul Makalah</th>
                  <th>Tahun</th>
                  <th>Peran Dalam Seminar/Lokakarya</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->tempat ?></td>
                  <td><?= $data->judul_makalah ?></td>
                  <td><?= $data->tahun ?></td>
                  <td><?= $data->peran ?></td>
                   <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatapenyaji/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatapenyaji/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
  
<?php $this->load->view('include/footer'); ?>
