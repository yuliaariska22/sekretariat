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
  
  
        <li class="breadcrumb-item active">Keluarga</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatakeluarga'); ?>" class="btn btn-primary">Tambah Keluarga<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Keluarga</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Hubungan</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Sekolah/Pekerjaan</th>
                  <th>Status</th>
                  <th>Ket</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->kategori ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->jenis_kelamin ?></td>
                  <td><?= $data->tempat_lahir ?></td>
                  <td><?= $data->tanggal_lahir ?></td>
                  <td><?= $data->pekerjaan ?></td>
                  <td><?= $data->status ?></td>
                  <?php if ($data->kategori=="Istri/Suami") {?>
                  <td><?= $data->ket ?> <br> Tanggal Menikah = <?= format_indo(date($data->tanggal_nikah))?></td>
                  <?php }else{ ?>
                  <td><?= $data->ket ?></td>
                  <?php } ?>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatakeluarga/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatakeluarga/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
