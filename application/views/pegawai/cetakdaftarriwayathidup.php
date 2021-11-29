
                     
<html>
<head>
<style>
@media print 
{
  body{
    background: none;
    -ms-zoom: 1.665;
  }
  div.portrait, div.landscape{
    margin: 0;
    padding: 0;
    border: none;
    background: none;
  }
  div.landscape{
    transform: rotate(270deg) translate(-275mm, 0);
    transform-origin: 0 0;
  }
}

.jarak-lh{
  line-height:10px;
}

tr {
   height:35px;
}
p {
    font-size: 12spt;
   line-height:5px;
}
table{
    font-size: 12pt;
    border-collapse: collapse;
}
h2{
    text-transform: uppercase;
}

body{
 margin: 0;
}

div.portrait, div.landscape {
  margin: 0;
  padding: 0;
  border: none;
  page-break-after: always;
  background: none;
}

div.portrait {
  width: 190mm;
  height: 275mm
}

div.landscape {
  width: 275mm;
  height: 190mm
}



</style>
<body>




<div class="portrait">

<br>
  <p align="right">KEPUTUSAN KEPALA BADAN KEPEGAWAIAN NEGARA</p>
  <p align="right">Nomor : 11 Tahun 2002</p>
  <p align="right">Tanggal : 17 Juni 2002</p>

  <br><br><br><br>

  <h3 align="center">DAFTAR RIWAYAT HIDUP</h3>

  
  <h3 align="left">I. KETERANGAN PERORANGAN</h3>

  <table border="1" width="100%">
    <tr>
        <td width="5%" align="center">1</td>
        <td colspan="2">Nama Lengkap</td>
        <td><?= $detailpegawai->nama;?></td>
    </tr>

    <tr>
        <td width="5%" align="center">2</td>
        <td colspan="2">NIP</td>
        <td><?= $detailpegawai->nip;?></td>
    </tr>

    <tr>
        <td width="5%" align="center">3</td>
        <td colspan="2">Pangkat dan Golongan Ruang</td>
        <td><?= $pangkatterakhir->pangkat;?></td>
    </tr>

    <tr>
        <td width="5%" align="center">4</td>
        <td colspan="2">Tempat/Tanggal Lahir</td>
        <td><?= $detailpegawai->tempat_lahir;?>, <?= format_indo(date($detailpegawai->tanggal_lahir));?></td>
    </tr>

    <tr>
        <td width="5%" align="center">5</td>
        <td colspan="2">Jenis Kelamin</td>
        <td><?= $detailpegawai->jenis_kelamin;?></td>
    </tr>

    <tr>
        <td width="5%" align="center">6</td>
        <td colspan="2">Agama</td>
        <td><?= $detailpegawai->agama;?></td>
    </tr>

    <tr>
        <td width="5%" align="center">7</td>
        <td colspan="2">Status Perkawinan</td>
        <td><?= $detailpegawai->status_perkawinan;?></td>
    </tr>



    <tr>
        <td align="center" rowspan="5">8</td>
        <td width="20%"  rowspan="5" align="center">Alamat Rumah</td>
        <td width="20%">a. Jalan</td>
        <td width="55%"><?= $detailpegawai->alamatrumah_jalan;?></td>
    </tr>

    <tr>
        <td width="20%">b. Kelurahan</td>
        <td width="55%"><?= $detailpegawai->alamatrumah_kelurahan;?></td>
    </tr>

    <tr>
        <td width="20%">c. Kecamatan</td>
        <td width="55%"><?= $detailpegawai->alamatrumah_kecamatan;?></td>
    </tr>

    <tr>
        <td width="20%">d. Kota</td>
        <td width="55%"><?= $detailpegawai->alamatrumah_kota;?></td>
    </tr>

    <tr>
        <td width="20%">e. Provinsi</td>
        <td width="55%"><?= $detailpegawai->alamatrumah_provinsi;?></td>
    </tr>


    
    <tr>
        <td align="center" rowspan="7">8</td>
        <td width="20%"  rowspan="7" align="center">Keterangan Badan</td>
        <td width="20%">a. Tinggi (cm)</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_berat;?></td>
    </tr>

    <tr>
        <td width="20%">b. Berat Badan (kg)</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_berat;?></td>
    </tr>

    <tr>
        <td width="20%">c. Rambut</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_rambut;?></td>
    </tr>

    <tr>
        <td width="20%">d. Bentuk Muka</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_bentukmuka;?></td>
    </tr>

    <tr>
        <td width="20%">e. Warna Kulit</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_warnakulit;?></td>
    </tr>

    <tr>
        <td width="20%">f. Ciri-ciri Khas</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_ciricirikhas;?></td>
    </tr>

    <tr>
        <td width="20%">g. Cacat Tubuh</td>
        <td width="55%"><?= $detailpegawai->keteranganbadan_cacattubuh;?></td>
    </tr>


    <tr>
        <td width="5%" align="center">10</td>
        <td colspan="2">Hobby</td>
        <td><?= $detailpegawai->hobby;?></td>
    </tr>
  </table>
</div>






<div class="portrait">
  <br>
  <br>
  <br>
  <br>
  <h3 align="left">II. PENDIDIKAN</h3>
  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 1. Pendidikan dalam dan luar negeri</p>

  <table border="1" width="100%">
    <tr>
        <td align="center">No.</td>
        <td align="center">TINGKAT</td>
        <td align="center">NAMA PENDIDIKAN</td>
        <td align="center">JURUSAN</td>
        <td align="center">TANDA <br> LULUS<br>  TAHUN</td>
        <td align="center">TEMPAT</td>
        <td align="center">NAMA PIMPINAN<BR>PENDIDIKAN</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
        <td align="center">7</td>
    </tr>

    
<?php 
                  $no = 1;
                  foreach ($pendidikan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tingkat?></td>
                    <td align="center"><?=$data->nama_pendidikan?></td>
                    <td align="center"><?=$data->jurusan?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_ijazah))?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nama_pimpinan_pendidikan?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>



</table>
<br><br>
<table width="100%" border="1">
  <tr>
    <td  align="center" width="5%">NO</td>
    <td align="center" width="35%">NAMA KURSUS/LATIHAN</td>
    <td align="center" width="10%">LAMANYA <br> KURSUS</td>
    <td align="center" width="10%">IJAZAH <br> TAHUN</td>
    <td align="center" width="20%">TEMPAT</td>
    <td align="center" width="20%">KET</td>
  </tr>

  <tr>
    <td align="center">1</td>
    <td align="center">2</td>
    <td align="center">3</td>
    <td align="center">4</td>
    <td align="center">5</td>
    <td align="center">6</td>
  </tr>

  
<?php 
                  $no = 1;
                  foreach ($kursus as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_kursus?></td>
                    <td align="center"><?=$data->lama_kursus?></td>
                    <td align="center"><?=format_indo(date($data->ijazah_tahun));?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->ket?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</table>


</div>




<div class="landscape">
  <BR>
  <h3 align="left">III. RIWAYAT PEKERJAAN</h3>
  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 1. Riwayat Kepangkatan Golongan Ruang Penggajian</p>

  <table border="1" width="100%">
    <tr>
        <td align="center" rowspan="2">NO</td>
        <td align="center" rowspan="2">PANGKAT</td>
        <td align="center" rowspan="2">GOL/RUANG</td>
        <td align="center" rowspan="2">TMT</td>
        <td align="center" rowspan="2">GAJI POKOK <BR> (RP)</td>
        <td align="center" colspan="3">SURAT KEPUTUSAN</td>
        <td align="center" rowspan="2">PERATURAN <BR> YANG <BR> DIJADIKAN <BR> DASAR </td>
    </tr>

    <tr>
        <td align="center">PEJABAT</td>
        <td align="center">NO</td>
        <td align="center">TANGGAL</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
        <td align="center">7</td>
        <td align="center">8</td>
        <td align="center">9</td>
    </tr>

    
<?php 
                  $no = 1;
                  foreach ($riwayatkepangkatan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->pangkat?></td>
                    <td align="center"><?=$data->gol?></td>
                    <td align="center"><?=format_indo(date($data->tmt));?></td>
                    <td align="center"><?=$data->gaji_pokok?></td>
                    <td align="center"><?=$data->pejabat?></td>
                    <td align="center"><?=$data->no_sk?></td>
                    <td align="center"><?=format_indo(date($data->tanggal_sk));?></td>
                    <td align="center"><?=$data->peraturan_dasar?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>

</table>



</div>










<div class="landscape">
  <br>
  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 2. Pengalaman Jabatan/Pekerjaan</p>

  <table border="1" width="100%">
    <tr>
        <td align="center" rowspan="2">NO</td>
        <td align="center" rowspan="2">JABATAN PEKERJAAN</td>
        <td align="center" rowspan="2">MULAI DAN <BR> SAMPAI</td>
        <td align="center" rowspan="2">GOL/ <BR> RUANG</td>
        <td align="center" rowspan="2">ESELON</td>
        <td align="center" colspan="3">SURAT KEPUTUSAN</td>
    </tr>

    <tr>
        <td align="center">PEJABAT</td>
        <td align="center">NO</td>
        <td align="center">TANGGAL</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
        <td align="center">7</td>
        <td align="center">8</td>
    </tr>

    <?php 
                  $no = 1;
                  foreach ($riwayatjabatan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->jabatan?></td>
                    <td align="center"><?=format_indo(date($data->tmt));?></td>
                    <td align="center"><?=$data->gol?></td>
                    <td align="center"><?=$data->eselon?></td>
                    <td align="center"><?=$data->pejabat?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=format_indo(date($data->tanggal_sk));?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</table>


</div>


<div class="portrait">

<BR>
  <h3 align="left">IV. TANDA JASA/PENGHARGAAN</h3>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA PENGHARGAAN</td>
        <td align="center">TAHUN PEROLEHAN</td>
        <td align="center">NAMA NEGARA/INSTITUSI YANG MEMBERI</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
    </tr>

    
    <?php 
                  $no = 1;
                  foreach ($penghargaan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_penghargaan?></td>
                    <td align="center"><?=$data->tahun_perolehan?></td>
                    <td align="center"><?=$data->institusi?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  <br>

  <h3 align="left">V. PENGALAMAN LUAR NEGERI</h3>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NEGARA</td>
        <td align="center">TUJUAN KUNJUNGAN</td>
        <td align="center">LAMANYA</td>
        <td align="center">YANG MEMBIAYAI</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
    </tr>

    
    <?php 
                  $no = 1;
                  foreach ($pengalamanluarnegeri as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->negara?></td>
                    <td align="center"><?=$data->tujuan?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_mulai))?> - <?= format_indo(date($data->tanggal_sampai))?></td>
                    <td align="center"><?=$data->yang_membiayai?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  <h3 align="left">VI. KETERANGAN KELUARGA</h3>

  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 1. Istri/Suami</p>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA</td>
        <td align="center">TEMPAT <BR> LAHIR</td>
        <td align="center">TANGGAL <BR> LAHIR</td>
        <td align="center">TANGGAL <BR> NIKAH</td>
        <td align="center">PEKERJAAN</td>
        <td align="center">KET</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
        <td align="center">7</td>
    </tr>

    
    <?php 
                  $no = 1;
                  foreach ($suamiistri as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?=$data->tempat_lahir?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_lahir))?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_nikah))?></td>
                    <td align="center"><?=$data->pekerjaan?></td>
                    <td align="center"><?=$data->ket?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 2. Anak</p>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA</td>
        <td align="center">JENIS <BR> KELAMIN</td>
        <td align="center">TEMPAT <BR> LAHIR</td>
        <td align="center">TANGGAL <BR> LAHIR</td>
        <td align="center">SEKOLAH/ <BR>PEKERJAAN</td>
        <td align="center">KET</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
        <td align="center">7</td>
    </tr>
    
    <?php 
                  $no = 1;
                  foreach ($anak as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?=$data->jenis_kelamin?></td>
                    <td align="center"><?=$data->tempat_lahir?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_lahir))?></td>
                    <td align="center"><?=$data->pekerjaan?></td>
                    <td align="center"><?=$data->ket?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  
  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 3. Bapak dan Ibu Kandung</p>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA</td>
        <td align="center">TGL LAHIR/<BR>UMUR</td>
        <td align="center">PEKERJAAN</td>
        <td align="center">KET</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
    </tr>

    
    <?php 
                  $no = 1;
                  foreach ($bapakibukandung as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_lahir));?></td>
                    <td align="center"><?=$data->pekerjaan?></td>
                    <td align="center"><?=$data->ket?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  <p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 4. Bapak dan Ibu Mertua</p>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA</td>
        <td align="center">TGL LAHIR/<BR>UMUR</td>
        <td align="center">PEKERJAAN</td>
        <td align="center">KET</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
    </tr>

    
    <?php 
                  $no = 1;
                  foreach ($bapakibumertua as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_lahir));?></td>
                    <td align="center"><?=$data->pekerjaan?></td>
                    <td align="center"><?=$data->ket?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  
<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 5. Saudara Kandung</p>
  <table width="100%" border="1"> 
    <tr>
        <td align="center">NO</td>
        <td align="center">NAMA</td>
        <td align="center">JENIS <BR> KELAMIN</td>
        <td align="center">TANGGAL LAHIR/ <BR> UMUR</td>
        <td align="center">PEKERJAAN</td>
        <td align="center">KET</td>
    </tr>

    <tr>
        <td align="center">1</td>
        <td align="center">2</td>
        <td align="center">3</td>
        <td align="center">4</td>
        <td align="center">5</td>
        <td align="center">6</td>
    </tr>

    <?php 
                  $no = 1;
                  foreach ($saudara as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?=$data->jenis_kelamin?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_lahir));?></td>
                    <td align="center"><?=$data->pekerjaan?></td>
                    <td align="center"><?=$data->ket?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  </table>

  

<h3 align="left">VI. KETERANGAN ORGANISASI</h3>

<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 1. Semasa mengikuti pendidikan SLTA ke bawah.</p>
<table width="100%" border="1"> 
  <tr>
      <td align="center">NO</td>
      <td align="center">NAMA ORGANISASI</td>
      <td align="center">KEDUDUKAN DALAM <BR> ORGANSISASI</td>
      <td align="center">TAHUN</td>
      <td align="center">TEMPAT</td>
      <td align="center">NAMA PIMPINAN <BR> ORGANISASI</td>
</tr>

  <tr>
    <td align="center">1</td>
    <td align="center">2</td>
    <td align="center">3</td>
    <td align="center">4</td>
    <td align="center">5</td>
    <td align="center">6</td>
  </tr>

  
  <?php 
                  $no = 1;
                  foreach ($organisasislta as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?=$data->kedudukan?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nama_pimpinan?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</table>


<p align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 2. Semasa mengikuti pendidikan di perguruan tinggi.</p>
<table width="100%" border="1"> 
  <tr>
      <td align="center">NO</td>
      <td align="center">NAMA ORGANISASI</td>
      <td align="center">KEDUDUKAN DALAM <BR> ORGANSISASI</td>
      <td align="center">TAHUN</td>
      <td align="center">TEMPAT</td>
      <td align="center">NAMA PIMPINAN <BR> ORGANISASI</td>
</tr>

  <tr>
    <td align="center">1</td>
    <td align="center">2</td>
    <td align="center">3</td>
    <td align="center">4</td>
    <td align="center">5</td>
    <td align="center">6</td>
  </tr>

  
  <?php 
                  $no = 1;
                  foreach ($organisasiperguruantinggi as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama?></td>
                    <td align="center"><?=$data->kedudukan?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nama_pimpinan?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</table>

<h3 align="left">VI. KETERANGAN LAIN-LAIN</h3>

<table width="100%" border="1"> 
  <tr>
      <td align="center" rowspan="2">NO</td>
      <td align="center" rowspan="2" width="50%">NAMA KETERANGAN</td>
      <td align="center" colspan="2">SURAT KETERANGAN</td>
      <td align="center" rowspan="2">TANGGAL</td>
</tr>

<tr>
      <td align="center"></td>
      <td align="center"></td>
</tr>

  <tr>
    <td align="center">1</td>
    <td align="center">2</td>
    <td align="center">3</td>
    <td align="center">4</td>
    <td align="center">5</td>
  </tr>

  
  <?php 
                  $no = 1;
                  foreach ($keteranganlain as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_keterangan?></td>
                    <td align="center"><?=$data->surat_keterangan?></td>
                    <td align="center"><?=$data->no_surat_keterangan?></td>
                    <td align="center"><?= format_indo(date($data->tanggal));?></td>
                  </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</table>

<BR>
Demikian Daftar Riwayat Hidup ini saya perbuat dengan sesungguhnya dan apabila dikemudian hari terdapat keterangan yang tidak benar saya bersedia dituntut dimuka pengadilan serta bersedia menerima segala tindakan yang diambil oleh pemerintah.
<br><br>
<table width="100%" style="page-break-inside:avoid;">
  <tr>
    <td width="60%"></td>
    <td width="40%">Padangsidimpuan,     <br>Yang Membuat</td>
  </tr>

  <tr height="100px">
    <td><Br><br><br><Br><br><br></td>
  </tr>

  <tr>
    <td width="60%"></td>
    <td width="40%"> <?= $detailpegawai->nama;?> <BR><?= $pangkatterakhir->pangkat;?> (<?= $pangkatterakhir->gol;?>) <BR>NIP. <?= $detailpegawai->nip;?></td>
  </tr> 
</table>
</div>
</body>