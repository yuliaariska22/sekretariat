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
          <a href="<?php echo base_url('pengaturan')?>">Surat Keputusan</a>
        </li>
  
  
        <li class="breadcrumb-item active">Surat Keputusan</li>
      </ol>
    
  <a href="<?php echo base_url('pengaturan/suratkeputusantambah'); ?>" class="btn btn-primary">Tambah <i class="fa fa-plus"></i></a>
          
    <!-- Example DataTables Card-->
  <div class="card mb-3">
        <div class="card-header">
        
          <i class="fa fa-table"></i> Daftar Surat Keputusan </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
            
                <tr class="text-center">
                  <th>No</th>
                  <th>No SK</th>
                  <th>Tanggal SK</th> 
                  <th>Tanggal SK Berakhir</th>  
                  <th>NIP / Nama</th> 
                  <th>Jabatan</th>  
                  <th>Pangkat</th>  
                  <th>Golongan</th>  
                  <th>Opsi</th> 
                </tr>
              </thead>
            <tbody  class="text-center">
            <?php 
                  $i = 1;
                  foreach ($content->result() as $data) : ?>
                <tr>
                <td><?= $i ?></td>
                  <td align="left"><?= $data->no_sk?></td>
                  <td align="center"><?php echo format_indo($data->tanggal_sk);?></td>
                  <td align="center"><?php echo format_indo($data->tanggal_skberakhir);?></td>
                  <td align="center"><?= $data->nip?> <br> <?= $data->nama?></td>
                  <td align="left"><?= $data->jabatan_sk?></td>
                  <td align="left"><?= $data->pangkat_sk?></td>
                  <td align="left"><?= $data->gol_sk?></td>
                  
                  <td>  
                    <a href="<?php echo base_url()?>pengaturan/action_deletesuratkeputusan/<?php echo $data->id; ?>" onclick="return confirm('Apakah anda yakin?');" class="">Hapus<i class="fa fa-trash"></i></a> 
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