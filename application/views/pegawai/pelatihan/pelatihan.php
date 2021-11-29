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
  
  
        <li class="breadcrumb-item active">Pelatihan</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatapelatihan'); ?>" class="btn btn-primary">Tambah Pelatihan<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Pelatihan</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Jenis Pelatihan</th>
                  <th>Nama Diklat</th>
                  <th>Tempat dan Penyelenggara</th>
                  <th>Nomor SK/STTPP</th>
                  <th>Tanggal SK/STTPP</th>
                  <th>Angkatan/Tahun</th>
                  <th>Lama Pendidikan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->jenis_pelatihan ?></td>
                  <td><?= $data->nama_diklat ?></td>
                  <td><?= $data->tempat ?></td>
                  <td><?= $data->nomor_sk ?></td>
                  <td><?= $data->tanggal_sk ?></td>
                  <td><?= $data->tahun ?></td>
                  <td><?= format_indo(date($data->tanggal_pendidikan_mulai))?> - <?= format_indo(date($data->tanggal_pendidikan_selesai))?></td>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatapelatihan/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatapelatihan/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
