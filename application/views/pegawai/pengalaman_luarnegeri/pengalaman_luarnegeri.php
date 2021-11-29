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
  
  
        <li class="breadcrumb-item active">Pengalaman Luar Negeri</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatapengalaman_luarnegeri'); ?>" class="btn btn-primary">Tambah Pengalaman Luar Negeri<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Pengalaman Luar Negeri</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Negara</th>
                  <th>Tujuan</th>
                  <th>Lama Kunjungan</th>
                  <th>Yang Membiayai</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->negara ?></td>
                  <td><?= $data->tujuan ?></td>
                  <td><?= format_indo(date($data->tanggal_mulai))?> - <?= format_indo(date($data->tanggal_sampai))?></td>
                  <td><?= $data->yang_membiayai ?></td>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatapengalaman_luarnegeri/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatapengalaman_luarnegeri/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
