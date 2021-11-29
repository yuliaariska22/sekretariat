<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_suratpengadaan extends CI_Model {
  public function __construct()
	{
		parent::__construct();
    $this->load->library('session');
	}

	function Tampilpengadaan() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_mutasi.id_opd', $id_opd);
      $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get();
    }

    function Getpengadaan() 
    {
      $id_opd=$this->session->userdata('id_opd');
     
        $username=$this->session->userdata('nip');
      $this->db->where('tbl_mutasi.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.username', $username);
      $this->db->order_by('tbl_mutasi.keterangan', 'DESC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get();
    }

    
    function GetId_suratpengadaan($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }


    function detailpengadaan() 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      return $this->db->from('tbl_detailmutasisementara')
        ->get()
        ->result();
    }

    function pengadaan($id_mutasi='') 
    {
        $this->db->select('*');
        $this->db->where('id_mutasi', $id_mutasi);
        $this->db->order_by('tbl_riwayat_kepangkatan.tanggal_sk', "DESC");
		    $this->db->order_by('tbl_riwayat_jabatan.tanggal_sk', "DESC");
		    $this->db->limit(1);
        return $this->db->from('tbl_mutasi')->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->join('tbl_opd','tbl_opd.id_opd=tbl_pegawai.id_opd')
          ->join('tbl_riwayat_kepangkatan','tbl_riwayat_kepangkatan.nip=tbl_pegawai.nip')
          ->join('tbl_riwayat_jabatan','tbl_riwayat_jabatan.nip=tbl_pegawai.nip')
          ->get()
          ->row();
      
    }

  
    
    function penggunaanggaran($tanggal_kwitansi='') 
    {
      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_kwitansi);
      $this->db->where('tanggal_skberakhir >=', $tanggal_kwitansi);
      $this->db->where('tbl_sk.jabatan_sk', 'Pengguna Anggaran');
      return $this->db->get()->row();
      
    }

    function bendahara($tanggal_kwitansi='') 
    {

      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_kwitansi);
      $this->db->where('tanggal_skberakhir >=', $tanggal_kwitansi);
      $this->db->where('tbl_sk.jabatan_sk', 'Bendahara');
      return $this->db->get()->row();
      
    }


    function pejabatpembuatkomitmen($tanggal_kwitansi='') 
    {
      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_kwitansi);
      $this->db->where('tanggal_skberakhir >=', $tanggal_kwitansi);
      $this->db->where('tbl_sk.jabatan_sk', 'Pejabat Pembuat Komitmen');
      return $this->db->get()->row();
      
    }

    function totalpembayaransementara($id_mutasi='') 
    {
      $this->db->where('id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
        ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
        ->get()
        ->result();
      
    }

    

    function totalpembayaran($id_mutasi='') 
    {
      $this->db->where('id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
        ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
        ->get()
        ->result();
      
    }

    function detailpengadaansuratsementara($id_mutasi='') 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      $this->db->where('id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
      ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
        ->get()
        ->result();
    }

    function detailpengadaansurat($id_mutasi='') 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      $this->db->where('id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
      ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
        ->get()
        ->result();
    }


}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */