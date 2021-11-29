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
          <a href="">Pengaturan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Rekanan</li>
      </ol>
    
  <a href="<?php echo base_url('pengaturan/menambahdatarekanan'); ?>" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
          
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        <?php echo $this->session->flashdata('msg'); ?>
          <i class="fa fa-table"></i> Data Tabel Rekanan</div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Rekanan</th>
                  <th>Alamat Rekanan</th>
                  <th>Nama Pimpinan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->nama_rekanan ?></td>
                  <td><?= $data->alamat_rekanan ?></td>
                  <td><?= $data->nama_pimpinan ?></td>
                  <td> 
                    <a href="<?php echo base_url()?>pengaturan/updatedatarekanan/<?php echo $data->id_rekanan; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pengaturan/action_deletedatarekanan/<?php echo $data->id_rekanan; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
