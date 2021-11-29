<?php

class Model_laporanbarangpersediaan extends CI_Model {
  public function __construct()
	{
	parent::__construct();
    $this->load->library('session');
	}

    
    function TampilOrder() 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      return $this->db->from('tbl_detailmutasisementara')
        ->get()
        ->result();
      
    }

    function GetId_Print($id_mutasi='') 
    {
    return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->row();
    
    }

    function Getid_mutasi($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }

    // LAPORAN PENERIMAAN

    function Tampillaporanpenerimaanbarangpersediaan() 
    {
        $this->db->order_by('id_mutasi', 'ASC');
        $this->db->where('jenis_mutasi', "Pengadaan");
        $this->db->where('tbl_mutasi.statusorder', "Selesai");
        $this->db->group_by('tahun_pesan');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
      
    }

    function Gettahun_pesanPenerimaan($tanggal_mulai,$tanggal_sampai)
    {
        $id_opd = $this->session->userdata('id_opd');
        $this->db->order_by('id_detailmutasisementara', 'ASC');    
        $this->db->where('tbl_mutasi.jenis_mutasi', "Pengadaan");
        $this->db->where('tbl_mutasi.statusorder', "Selesai");    
        $this->db->where('tbl_mutasi.tanggal_pesan >=',$tanggal_mulai);
        $this->db->where('tbl_mutasi.tanggal_pesan <=',$tanggal_sampai);
        $this->db->where('tbl_pegawai.id_opd',$id_opd);
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')          
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')             
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')   
          ->join('tbl_opd','tbl_opd.id_opd=tbl_pegawai.id_opd')
          ->get()
          ->result();
    }

    // LAPORAN PENGELUARAN

    function Tampillaporanpengeluaranbarangpersediaan() 
    {
      $this->db->order_by('id_mutasi', 'ASC');
      $this->db->where('jenis_mutasi', "Penyaluran");
      $this->db->where('tbl_mutasi.statuspenyaluran', "Sudah Disalurkan");
      $this->db->group_by('tahun_pesan');
      return $this->db->from('tbl_mutasi')
        ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
        ->get()
        ->result();
    
    }

    function Gettahun_pesanPengeluaran($tanggal_mulai,$tanggal_sampai)
    {
      
        $id_opd = $this->session->userdata('id_opd');
        $this->db->order_by('id_detailmutasisementara', 'ASC');    
        $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
        $this->db->where('tbl_mutasi.statuspenyaluran', 'Sudah Disalurkan');    
        $this->db->where('tbl_mutasi.tanggal_pesan >=',$tanggal_mulai);
        $this->db->where('tbl_mutasi.tanggal_pesan <=',$tanggal_sampai);
        $this->db->where('tbl_mutasi.id_opd',$id_opd);
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')  
          ->join('tbl_bidang_opd','tbl_bidang_opd.id_bidang_opd=tbl_mutasi.id_bidang_opd')  
          ->get()
          ->result();
    }

    // LAPORAN BUKU

    function Tampillaporanbukubarangpersediaan() 
  {
      $this->db->order_by('id_mutasi', 'ASC');
      $this->db->where('tbl_mutasi.statuspenyaluran', "Sudah Disalurkan");
      $this->db->group_by('tahun_pesan');
      return $this->db->from('tbl_mutasi')
        ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
        ->get()
        ->result();
    
  }

    function Gettahun_pesanBuku($tanggal_mulai,$tanggal_sampai)
    {
        $id_opd = $this->session->userdata('id_opd');
        
        $this->db->select('*,sum(total_barang_in) as sum_total_barang_in');  
        $this->db->where('tbl_mutasi.jenis_mutasi', "Pengadaan");
        $this->db->where('tbl_mutasi.statusorder', "Selesai");    
        $this->db->where('tbl_mutasi.tanggal_pesan >=',$tanggal_mulai);
        $this->db->where('tbl_mutasi.tanggal_pesan <=',$tanggal_sampai);
        $this->db->where('tbl_pegawai.id_opd',$id_opd);
        $this->db->group_by('tbl_detailmutasisementara.id_ssh');
        $this->db->group_by('tbl_detailmutasisementara.hargasatuanrekanan');
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')          
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')             
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')   
          ->join('tbl_opd','tbl_opd.id_opd=tbl_pegawai.id_opd')
          ->get()
          ->result();
    }

    function Gettahun_pesanBukupeny($tanggal_mulai,$tanggal_sampai)
    {
      $id_opd = $this->session->userdata('id_opd');
      $sql="
      select * from (
        SELECT
            
                    tbl_bidang_opd.nama_bidang AS nama_bidang,
                    tbl_ssh.Namabarang_ssh AS nama_barang,
                    tbl_detailmutasisementara.hargasatuanrekanan AS harga_barang,
                    SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai'
                        THEN tbl_detailmutasisementara.total_barang_in  Else 0 End) AS saldo_awal_in,
                    SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai' 
                        THEN tbl_detailmutasisementara.total_barang_out Else 0 End) AS saldo_awal_out,

                    SUM(CASE When (tbl_mutasi.tanggal_pesan) >= '$tanggal_mulai' AND (tbl_mutasi.tanggal_pesan) <= '$tanggal_sampai'
                        THEN tbl_detailmutasisementara.total_barang_in Else 0 End) AS pembelian,
                    SUM(CASE When (tbl_mutasi.tanggal_pesan) >= '$tanggal_mulai' AND (tbl_mutasi.tanggal_pesan) <= '$tanggal_sampai'
                        THEN tbl_detailmutasisementara.total_barang_out Else 0 End) AS pengeluaran
                    
                    FROM tbl_detailmutasisementara
                    JOIN tbl_mutasi ON tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi
                    JOIN tbl_ssh ON tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh
                    JOIN tbl_pegawai ON tbl_pegawai.nip=tbl_detailmutasisementara.username 
                    JOIN tbl_bidang_opd ON tbl_bidang_opd.id_bidang_opd=tbl_mutasi.id_bidang_opd 
                    WHERE tbl_mutasi.id_opd = '$id_opd' AND (tbl_mutasi.statusorder = 'Selesai' 
                        OR tbl_mutasi.statuspenyaluran = 'Sudah Disalurkan')
                    GROUP BY tbl_detailmutasisementara.hargasatuanrekanan & tbl_detailmutasisementara.id_ssh
            ) as A
         where  A.Nama_bidang = 'Sekretariat'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    /*

      

    */

    // LAPORAN REKAPITULASI

    function Tampillaporanrekapitulasibarangpersediaan() 
    {
        $this->db->order_by('id_mutasi', 'ASC');
        $this->db->where('tbl_mutasi.statuspenyaluran', "Sudah Disalurkan");
        $this->db->group_by('tahun_pesan');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
    }
	

    function Gettahun_pesanRekapitulasi($tanggal_mulai,$tanggal_sampai)
    {
    
      $id_opd = $this->session->userdata('id_opd');
      $sql="
      select * from (
        SELECT
            
                    tbl_bidang_opd.nama_bidang AS nama_bidang,
                    tbl_ssh.Namabarang_ssh AS nama_barang,
                    tbl_detailmutasisementara.hargasatuanrekanan AS harga_barang,
                    SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai'
                        THEN tbl_detailmutasisementara.total_barang_in  Else 0 End) AS saldo_awal_in,
                    SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai' 
                        THEN tbl_detailmutasisementara.total_barang_out Else 0 End) AS saldo_awal_out,

                    SUM(CASE When (tbl_mutasi.tanggal_pesan) >= '$tanggal_mulai' AND (tbl_mutasi.tanggal_pesan) <= '$tanggal_sampai'
                        THEN tbl_detailmutasisementara.total_barang_in Else 0 End) AS pembelian,
                    SUM(CASE When (tbl_mutasi.tanggal_pesan) >= '$tanggal_mulai' AND (tbl_mutasi.tanggal_pesan) <= '$tanggal_sampai'
                        THEN tbl_detailmutasisementara.total_barang_out Else 0 End) AS pengeluaran
                    
                    FROM tbl_detailmutasisementara
                    JOIN tbl_mutasi ON tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi
                    JOIN tbl_ssh ON tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh
                    JOIN tbl_pegawai ON tbl_pegawai.nip=tbl_detailmutasisementara.username 
                    JOIN tbl_bidang_opd ON tbl_bidang_opd.id_bidang_opd=tbl_mutasi.id_bidang_opd 
                    WHERE tbl_mutasi.id_opd = '$id_opd' AND (tbl_mutasi.statusorder = 'Selesai' 
                        OR tbl_mutasi.statuspenyaluran = 'Sudah Disalurkan')
                    GROUP BY tbl_detailmutasisementara.hargasatuanrekanan & tbl_detailmutasisementara.id_ssh
            ) as A
         where  A.Nama_bidang = 'Sekretariat'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function Gettahun_pesanRekapitulasipeny($tanggal_mulai,$tanggal_sampai)
    {
    
    $id_opd = $this->session->userdata('id_opd');
    $sql="
    select * from (
    SELECT
    
          tbl_bidang_opd.nama_bidang AS nama_bidang,
          tbl_ssh.Namabarang_ssh AS nama_barang,
          tbl_detailmutasisementara.hargasatuanrekanan AS harga_barang,
          SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai' THEN tbl_detailmutasisementara.total_barang_in Else 0 End) AS saldo_awal_in,
          SUM(CASE When tbl_mutasi.tanggal_pesan < '$tanggal_mulai' THEN tbl_detailmutasisementara.total_barang_out Else 0 End) AS saldo_awal_out,
          SUM(CASE When tbl_mutasi.tanggal_pesan >= '$tanggal_mulai' AND tbl_mutasi.tanggal_pesan <= '$tanggal_sampai' THEN tbl_detailmutasisementara.total_barang_in Else 0 End) AS pembelian,
          SUM(IF((tbl_mutasi.tanggal_pesan) >= '$tanggal_mulai' AND (tbl_mutasi.tanggal_pesan) <= '$tanggal_sampai', tbl_detailmutasisementara.total_barang_out, 0)) AS pengeluaran
          
          FROM tbl_detailmutasisementara
          JOIN tbl_mutasi ON tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi
          JOIN tbl_ssh ON tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh
          JOIN tbl_pegawai ON tbl_pegawai.nip=tbl_detailmutasisementara.username 
          JOIN tbl_bidang_opd ON tbl_bidang_opd.id_bidang_opd=tbl_mutasi.id_bidang_opd 
          WHERE tbl_mutasi.id_opd = $id_opd AND (tbl_mutasi.statusorder = 'Selesai' OR tbl_mutasi.statuspenyaluran = 'Sudah Disalurkan')
          GROUP BY tbl_detailmutasisementara.id_ssh & tbl_detailmutasisementara.hargasatuanrekanan) as A
          where  A.Nama_bidang = 'Sekretariat'";
      $query = $this->db->query($sql);
      return $query->result();
    }


    //TTD
    function atasanlangsung() 
        {
        
            $id_opd=$this->session->userdata('id_opd');
            $this->db->select('*');
            $this->db->where('tbl_sk.id_opd', $id_opd);
            $this->db->where('tbl_sk.jabatan_sk', "Pengguna Anggaran");
            return $this->db->from('tbl_sk')
            ->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip')
            ->get()
            ->row();
        
        }

        function pejabatpenatausahaanbarang() 
        {
        
            $id_opd=$this->session->userdata('id_opd');
            $this->db->select('*');
            $this->db->where('tbl_sk.id_opd', $id_opd);
            $this->db->where('tbl_sk.jabatan_sk', "Pejabat Penatausahaan Barang");
            return $this->db->from('tbl_sk')
            ->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip')
            ->get()
            ->row();
        
        }

        function pbp() 
        {
        
            $id_opd=$this->session->userdata('id_opd');
            $this->db->select('*');
            $this->db->where('tbl_sk.id_opd', $id_opd);
            $this->db->where('tbl_sk.jabatan_sk', "Pengurus Barang Pengguna");
            return $this->db->from('tbl_sk')
            ->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip')
            ->get()
            ->row();
        
        }

        function Getopd()
        {
        
            $id_opd=$this->session->userdata('id_opd');
            $this->db->where('id_opd', $id_opd);    
            return $this->db->from('tbl_opd')
            ->get()
            ->row();
        }




}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */