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
  
  
        <li class="breadcrumb-item active">Riwayat Kepangkatan</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatariwayat_kepangkatan'); ?>" class="btn btn-primary">Tambah Riwayat Kepangkatan<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Riwayat Kepangkatan</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Pangkat</th>
                  <th>Gol</th>
                  <th>TMT</th>
                  <th>Nomor SK</th>
                  <th>Tanggal SK</th>
                  <th>Pejabat</th>
                  <th>Gaji Pokok</th>
                  <th>Peraturan yang <br> dijadikan dasar</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->pangkat ?></td>
                  <td><?= $data->gol ?></td>
                  <td><?= $data->tmt ?></td>
                  <td><?= $data->no_sk ?></td>
                  <td><?= $data->tanggal_sk ?></td>
                  <td><?= $data->pejabat ?></td>
                  <td><?= $data->gaji_pokok ?></td>
                  <td><?= $data->peraturan_dasar ?></td>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatariwayat_kepangkatan/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatariwayat_kepangkatan/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
