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
  
  
        <li class="breadcrumb-item active">Pendidikan</li>
      </ol>
    
  <a href="<?php echo base_url('pegawai/menambahdatapendidikan'); ?>" class="btn btn-primary">Tambah Pendidikan<i class="fa fa-plus"></i></a>
       
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Pendidikan</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Tingkat</th>
                  <th>Nama Pendidikan</th>
                  <th>Jurusan</th>
                  <th>Tempat</th>
                  <th>Nama Pimpinan Pendidikan</th>
                  <th>No Ijazah</th>
                  <th>Tanggal Ijazah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->tingkat ?></td>
                  <td><?= $data->nama_pendidikan ?></td>
                  <td><?= $data->jurusan ?></td>
                  <td><?= $data->tempat ?></td>
                  <td><?= $data->nama_pimpinan_pendidikan ?></td>
                  <td><?= $data->no_ijazah ?></td>
                  <td><?= $data->tanggal_ijazah ?></td>
                  <td>
                    <a href="<?php echo base_url()?>pegawai/updatedatapendidikan/<?php echo $data->id; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pegawai/action_deletedatapendidikan/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
