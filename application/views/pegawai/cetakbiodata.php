
                     
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
   page-break-inside:avoid;
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
  <br>
  <br>
  <h2 align="center"> B I O D A T A</h2>
  
  <h3> A. IDENTITAS PEGAWAI</h3>
  <table width="100%">
    <tr>
        <td width="5%" align="right">1.</td>
        <td width="25%">Nama</td>
        <td>: <?= $detailpegawai->nama;?></td>
    </tr>
    <tr>
        <td align="right">2.</td>
        <td>NIP</td>
        <td>: <?= $detailpegawai->nip;?></td>
    </tr>

    <tr>
        <td align="right">3.</td>
        <td>Tempat Tanggal Lahir</td>
        <td>: <?= $detailpegawai->tempat_lahir;?>, <?= format_indo(date($detailpegawai->tanggal_lahir))?></td>
    </tr>

    <tr>
        <td align="right">4.</td>
        <td>Jenis Kelamin</td>
        <td>: <?= $detailpegawai->jenis_kelamin;?></td>
    </tr>

    <tr>
        <td align="right">5.</td>
        <td>Agama</td>
        <td>: <?= $detailpegawai->agama;?></td>
    </tr>

    <tr>
        <td align="right">6.</td>
        <td>Jenis Kepegawaian</td>
        <td>: <?= $detailpegawai->jeniskepegawaian;?></td>
    </tr>

    <tr>
        <td align="right">7.</td>
        <td>Alamat Rumah</td>
        <td>: <?= $detailpegawai->alamatrumah_jalan;?></td>
    </tr>

    <tr>
        <td align="right">8.</td>
        <td>Pangkat Terakhir/GOL</td>
        <td>: <?= $pangkatterakhir->pangkat;?></td>
    </tr>

    <tr>
        <td align="right">9.</td>
        <td>Jabatan Terakhir</td>
        <td>: <?= $jabatanterakhir->jabatan;?></td>
    </tr>

    <tr>
        <td align="right">10.</td>
        <td>Intansi Tempat Bekerja</td>
        <td>: Pemerintah Kota Padangsidimpuan</td>
    </tr>

    <tr>
        <td align="right">11.</td>
        <td>Unit Kerja</td>
        <td>: <?= $detailpegawai->nama_opd;?></td>
    </tr>
  </table>
<br>
  <h3>B. RIWAYAT KEPANGKATAN</h3>
  <table width="100%" border="1">
    

<div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">NO</td>
      <td align="center" rowspan="2">PANGKAT</td>
      <td align="center" rowspan="2">GOL/<BR> RUANG</td>
      <td align="center" rowspan="2">TMT</td>
      <td align="center" colspan="2">SURAT KEPUTUSAN</td>
      <td align="center" rowspan="2">Pejabat yg <br> Menetapkan</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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

</div>
<div>

<?php 
                  $no = 1;
                  foreach ($riwayatkepangkatan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->pangkat?></td>
                    <td align="center"><?=$data->gol?></td>
                    <td align="center"><?=$data->tmt?></td>
                    <td align="center"><?=$data->no_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->pejabat?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
  
  </div>
  </table>

<br>
  <h3>C. RIWAYAT JABATAN</h3>
  <table width="100%" border="1">
    
<div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">NO</td>
      <td align="center" rowspan="2">JABATAN</td>
      <td align="center" rowspan="2">GOL/<BR> RUANG</td>
      <td align="center" rowspan="2">TMT<BR> JABATAN</td>
      <td align="center" colspan="2">SURAT KEPUTUSAN</td>
      <td align="center" rowspan="2">Pejabat yg <br> Menetapkan</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
</div>
<div>

<?php 
                  $no = 1;
                  foreach ($riwayatjabatan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->jabatan?></td>
                    <td align="center"><?=$data->gol?></td>
                    <td align="center"><?=$data->tmt?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->pejabat?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>
<br>

  <h3>D. RIWAYAT PENDIDIKAN</h3>
  <p>&nbsp;&nbsp;&nbsp; 1. Pendidikan Umum</p>
  <table width="100%" border="1" >
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Jenjang dan Jurusan <br> Pendidikan </td>
      <td align="center" rowspan="2">Nama Sekolah</td>
      <td align="center" rowspan="2">Nama Pimpinan <br> Pendidikan</td>
      <td align="center" colspan="2">STTB/Ijazah</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
  </tr>

  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
      <td align="center">6</td>
  </tr>
  
  </div>
  <div>
 
<?php 
                  $no = 1;
                  foreach ($pendidikan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tingkat?></td>
                    <td align="center"><?=$data->nama_pendidikan?></td>
                    <td align="center"><?=$data->nama_pimpinan_pendidikan?></td>
                    <td align="center"><?=$data->no_ijazah?></td>
                    <td align="center"><?=$data->tanggal_ijazah?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>

  
  <br>
  
  <h3>E. Pendidikan dan Pelatihan Kepemimpinan</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Nama Diklat </td>
      <td align="center" rowspan="2">Tempat dan <br> Penyelenggara</td>
      <td align="center" colspan="2">STTPP</td>
      <td align="center" rowspan="2">Angkatan/<br>Tahun</td>
      <td align="center" rowspan="2">Lama <br> Pendidikan</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
</div>
<div>


<?php 
                  $no = 1;
                  foreach ($pelatihankepempimpinan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_diklat?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_pendidikan_mulai))?> - <br><?=format_indo(date($data->tanggal_pendidikan_selesai))?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>
<br>


  <h3>F. Pendidikan dan Fungsional</h3>
  <table width="100%" border="1">
    
<div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Nama Diklat </td>
      <td align="center" rowspan="2">Tempat dan <br> Penyelenggara</td>
      <td align="center" colspan="2">SURAT KEPUTUSAN</td>
      <td align="center" rowspan="2">Angkatan/<br>Tahun</td>
      <td align="center" rowspan="2">Lama <br> Pendidikan</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
  </div>
  <div>

  
<?php 
                  $no = 1;
                  foreach ($pelatihanfungsional as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_diklat?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_pendidikan_mulai))?> - <br><?=format_indo(date($data->tanggal_pendidikan_selesai))?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>

</div>
  </table>

  
  
 <br>
  <h3>G. Pendidikan dan Pelatihan Teknis</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Nama Diklat </td>
      <td align="center" rowspan="2">Tempat dan <br> Penyelenggara</td>
      <td align="center" colspan="2">SURAT KEPUTUSAN</td>
      <td align="center" rowspan="2">Angkatan/<br>Tahun</td>
      <td align="center" rowspan="2">Lama <br> Pendidikan</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
</div>
<div>


<?php 
                  $no = 1;
                  foreach ($pelatihanteknis as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_diklat?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_pendidikan_mulai))?> - <br><?=format_indo(date($data->tanggal_pendidikan_selesai))?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>

</div>
  </table>

  <br>

  <h3>H. DAFTAR URUT KEPANGKATAN</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center">No </td>
      <td align="center">TAHUN </td>
      <td align="center">Urutan/Peringkat/DUK</td>
  </tr>
  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
  </tr>
</div>
<div>


<?php 
                  $no = 1;
                  foreach ($duk as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->urutan?></td>
                      </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>

  <br>
  
  <h3>I. DP3/SKP</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center">No </td>
      <td align="center">TAHUN </td>
      <td align="center">Pejabat Penilai</td>
      <td align="center">Atasan Pejabat Penilai</td>
      <td align="center">Nilai</td>
  </tr>
  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
  </tr>
</div>
<div>
  
<?php 
                  $no = 1;
                  foreach ($skp as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->pejabat_penilai?></td>
                    <td align="center"><?=$data->atasan_pejabat_penilai?></td>
                    <td align="center"><?=$data->nilai?></td>
                      </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>

  <br>
  
  <h3>J. DISIPLIN</h3>
  
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center">No </td>
      <td align="center">Tahun </td>
      <td align="center">Tingkat Hukuman Disiplin</td>
      <td align="center">Jenis Hukuman Disiplin</td>
  </tr>
  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
  </tr>
</div>

<div>
  
<?php 
                  $no = 1;
                  foreach ($disiplin as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->tingkat?></td>
                    <td align="center"><?=$data->jenis?></td>
                      </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>

  <br>
  
  
  <h3>K. RUANG LINGKUP PERJALANAN KARIR</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Jabatan </td>
      <td align="center" rowspan="2">Eselon</td>
      <td align="center" rowspan="2">TMT <BR> Jabatan</td>
      <td align="center" colspan="2">Surat Keputusan</td>
      <td align="center" rowspan="2">Pejabat yang <br> menetapkan </td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
</div>
<div>
  
<?php 
                  $no = 1;
                  foreach ($riwayatjabatan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->jabatan?></td>
                    <td align="center"><?=$data->eselon?></td>
                    <td align="center"><?=$data->tmt?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->pejabat?></td>
                      </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>
</div>
  </table>

  
  <br>
  
  
  <div style="page-break-inside:avoid;">
  <h3>L.  PENGALAMAN DIKLAT DALAM/LUAR NEGERI MENGENAI WAWASAN MANAGEMENT PEMERINTAHAN UMUM DAN DAERAH</h3>
  <table width="100%" border="1">
    
  <tr>
      <td align="center" rowspan="2">No </td>
      <td align="center" rowspan="2">Nama Diklat </td>
      <td align="center" rowspan="2">Tempat dan <br> Penyelenggara</td>
      <td align="center" rowspan="2">Angkatan/ <BR> Tahun</td>
      <td align="center" rowspan="2">Lama <br> Pendidikan </td>
      <td align="center" colspan="2">STTPP</td>
  </tr>

  <tr>
      <td align="center">Nomor</td>
      <td align="center">Tanggal</td>
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
 </div>
<div>

             
<?php 
                  $no = 1;
                  foreach ($pelatihanwawasan as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->nama_diklat?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->nomor_sk?></td>
                    <td align="center"><?=$data->tanggal_sk?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?= format_indo(date($data->tanggal_pendidikan_mulai))?> - <br><?=format_indo(date($data->tanggal_pendidikan_selesai))?></td>
                 </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>   


</div>
  </table>

  
  
  <br>
  
  
  <h3>M.  PENGALAMAN SEBAGAI PENYAJI SEMINAR/LOKAKARYA/DISKUSI TINGKAT NASIONAL MENGENAI WAWASAN MANAGEMENT PEMERINTAHAN</h3>
  <table width="100%" border="1">
    
  <div style="page-break-inside:avoid;">
  <tr>
      <td align="center">No </td>
      <td align="center">Tempat Seminar </td>
      <td align="center">Judul Makalah</td>
      <td align="center">Tahun</td>
      <td align="center">Peran Dalam <br> Seminar/Lokakarya </td>
  </tr>
  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
  </tr>
 </div>
 <div>
   
             
<?php 
                  $no = 1;
                  foreach ($penyaji as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tempat?></td>
                    <td align="center"><?=$data->judul_makalah?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->peran?></td>
                   </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>   
</div>
  </table>

  
  <br>
  
  
  <div style="page-break-inside:avoid;">
  <h3>5 POKOK POKOK PIKIRAN STRATEGIS POLITIK DALAM NEGERI</h3>
  <table width="100%" border="1">
    
  <tr>
      <td align="center">No </td>
      <td align="center">Judul Buku/Karya Tulis/Makalah </td>
      <td align="center">Tahun</td>
  </tr>
  <tr>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
  </tr>

    
<?php 
                  $no = 1;
                  foreach ($makalah as $data) : 
                  ?> 
                  <tr>
                    <td align="center"><?=$no?></td>
                    <td align="center"><?=$data->tahun?></td>
                    <td align="center"><?=$data->judul?></td>
                   </tr>
                <?php
                      $no++;
                    endforeach;
                  ?>   
  </table>

<br><br><br>
  <table width="100%">
  <tr>
    <td width="60%"></td>
    <td width="40%">Padangsidimpuan,     <br>Yang Membuat</td>
  </tr>

  <tr height="100px">
    <td><Br><br><br><Br><br><br></td>
  </tr>

  <tr>
    <td width="60%"></td>
    <td width="40%"> <?= $detailpegawai->nama;?> <BR>NIP. <?= $detailpegawai->nip;?></td>
  </tr> 
</table>


</div>
</div>