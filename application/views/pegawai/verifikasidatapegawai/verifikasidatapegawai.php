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
          <a href="">Pegawai</a>
        </li>
  
  
        <li class="breadcrumb-item active">Verifikasi Data Pegawai</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdataverifikasidatapegawai'); ?>" class="btn btn-primary">Tambah Data Pegawai<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Verifikasi Data Pegawai</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Status Verifikasi</th>
                  <th>Cetak</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->nip ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->status_verifikasi ?></td>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/cetakbiodata/<?php echo $data->nip; ?>" class="btn btn-success" style="margin-bottom: 1px;">Biodata<i class="fa fa-print"></i></a>
                    <a href="<?php echo base_url()?>pegawai/cetakdaftarriwayathidup/<?php echo $data->nip; ?>" class="btn btn-success" style="margin-bottom: 1px;">Daftar Riwayat Hidup<i class="fa fa-print"></i></a>
                  </td>
                  <?php if ($data->status_verifikasi == 'Belum Diverifikasi') { ?>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updateverifikasidatapegawai/<?php echo $data->nip;?>" onclick="return confirm('Apakah anda yakin?');"class="btn btn-danger" role="button">Verifikasi Data</a>
                    <a href="<?php echo base_url()?>pegawai/updatedatapegawai/<?php echo $data->nip;?>" class="btn btn-warning" role="button">Edit Data</a>
                  </td>
                  <?php }else{ ?>
                    <td></td>
                    <?php } ?>
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
