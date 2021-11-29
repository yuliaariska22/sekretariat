<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_suratpenyaluran extends CI_Model {
  public function __construct()
	{
		parent::__construct();
    $this->load->library('session');
	}

	function Tampilpenyaluran() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function Getpenyaluran() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $username=$this->session->userdata('nip');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->where('tbl_mutasi.username', $username);
      $this->db->order_by('statuspenyaluran', 'ASC');
      $this->db->order_by('tbl_mutasi.keterangan', 'DESC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function Getpenyaluranpbp() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->order_by('tbl_mutasi.keterangan', 'DESC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    
    function GetId_suratpenyaluran($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }

    function detailpenyaluran() 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      return $this->db->from('tbl_detailmutasisementara')
        ->get()
        ->result();
    }

    function penyaluran($id_mutasi='') 
    {
      $this->db->select('*, tbl_pegawai.nip as nip_pptk');
      $this->db->order_by('id_mutasi', 'ASC');
        $this->db->where('id_mutasi', $id_mutasi);
        return $this->db->from('tbl_mutasi')
          //->join('tbl_paketpekerjaan','tbl_paketpekerjaan.id_paketpekerjaan=tbl_mutasi.id_paketpekerjaan')
          //->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->join('tbl_opd','tbl_opd.id_opd=tbl_pegawai.id_opd')
          
          ->get()
          ->row();
      
    }

    function detailpenyaluransurat($id_mutasi='') 
    {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      $this->db->where('id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
      ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
      ->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailmutasisementara.username')
        ->get()
        ->result();
    }

    
    
     function penggunabarang($tanggal_bapenyaluranbarang='') 
    {
      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_bapenyaluranbarang);
      $this->db->where('tanggal_skberakhir >=', $tanggal_bapenyaluranbarang);
      $this->db->where('tbl_sk.jabatan_sk', 'Pengguna Anggaran');
      return $this->db->get()->row();
      
    }
    
    function pejabatpenatausahaanbarang($tanggal_bapenyaluranbarang='') 
    {
      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_bapenyaluranbarang);
      $this->db->where('tanggal_skberakhir >=', $tanggal_bapenyaluranbarang);
      $this->db->where('tbl_sk.jabatan_sk', 'Pejabat Penatausahaan Barang');
      return $this->db->get()->row();
      
    }
    
    function pbp($tanggal_bapenyaluranbarang='') 
    {
      $id_opd = $this->session->userdata('id_opd');
        
      $this->db->select('*');
      $this->db->from('tbl_sk');
      $this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
      $this->db->where('tbl_sk.id_opd', $id_opd);
      $this->db->where('tanggal_sk <=', $tanggal_bapenyaluranbarang);
      $this->db->where('tanggal_skberakhir >=', $tanggal_bapenyaluranbarang);
      $this->db->where('tbl_sk.jabatan_sk', 'Pengurus Barang Pengguna');
      return $this->db->get()->row();
      
    }

}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */