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
  
  
        <li class="breadcrumb-item active">Satuan Harga Rekanan</li>
      </ol>

      <a href="<?php echo base_url('pengaturan/menambahdataspj'); ?>" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
  
  <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Satuan Harga Rekanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>Kelompok</th>
                  <th>Jenis Barang</th>
                  <th>Nama Barang</th>                  
                  <th>Ukuran</th>
                  <th>Spesifikasi</th>
                  <th>Satuan</th>
                  <th>Harga Satuan</th>
                  <th>Tahun </th>
                  <th>Opsi</th>
                </tr>
              </thead>
            <tbody  class="text-center">
                <tr>
                <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                  <td><?= $i ?></td>
                  <td><?= $data->Kelompok_spj ?></td>
                  <td><?= $data->Jenisbarang_spj ?></td>
                  <td><?= $data->Namabarang_ssh ?></td>
                  <td><?= $data->Ukuran_spj ?></td>
                  <td><?= $data->Spesifikasi_ssh ?></td>
                  <td><?= $data->Satuan_ssh ?></td>
                  <td><?= 'Rp'.number_format($data->Hargasatuan_ssh,0,'.','.')?></td>
                  <td><?= $data->Tahun_spj ?></td>
                  <td> 
                    <a href="<?php echo base_url()?>pengaturan/updatedataspj/<?php echo $data->id_ssh; ?>" class="btn btn-warning" style="margin-bottom: 1px;">Edit<i class="fa fa-tag"></i></a>
                    <a href="<?php echo base_url()?>pengaturan/action_deletedataspj/<?php echo $data->id_ssh; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger">Hapus<i class="fa fa-trash"></i></a>
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
