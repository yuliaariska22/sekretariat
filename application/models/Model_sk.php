<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sk extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function suratkeputusan()
	{
		$id_opd=$this->session->userdata('id_opd');

		$this->db->order_by('tanggal_skberakhir', 'DESC');
		$this->db->order_by('tanggal_sk', 'DESC');
		$this->db->order_by('tbl_sk.nip', 'DESC');
		$this->db->where('tbl_sk.id_opd', $id_opd);
        return $this->db->from('tbl_sk')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip')
			->get();
	}

	public function menambahdatasuratkeputusan($data)
	{
		$this->db->insert('tbl_sk', $data);
	}

	public function deletedatasuratkeputusan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_sk');
	}

	public function penggunaanggaran($tanggal_sppd) 
    {
		$id_opd = $this->session->userdata('id_opd');
        
		$this->db->select('*');
		$this->db->from('tbl_sk');
		$this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
		$this->db->where('tbl_sk.id_opd', $id_opd);
		$this->db->where('tanggal_sk <=', $tanggal_sppd);
		$this->db->where('tanggal_skberakhir >=', $tanggal_sppd);
		$this->db->where('tbl_sk.jabatan_sk', 'Pengguna Anggaran');
		return $this->db->get()->row();
    }

	public function bendahara($tanggal_sppd) 
    {
		$id_opd = $this->session->userdata('id_opd');
        
		$this->db->select('*');
		$this->db->from('tbl_sk');
		$this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
		$this->db->where('tbl_sk.id_opd', $id_opd);
		$this->db->where('tanggal_sk <=', $tanggal_sppd);
		$this->db->where('tanggal_skberakhir >=', $tanggal_sppd);
		$this->db->where('tbl_sk.jabatan_sk', 'Bendahara');
		return $this->db->get()->row();
    }

	public function penggunaanggaransampai($tanggal_sampai) 
    {
		$id_opd = $this->session->userdata('id_opd');
        
		$this->db->select('*');
		$this->db->from('tbl_sk');
		$this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
		$this->db->where('tbl_sk.id_opd', $id_opd);
		$this->db->where('tanggal_sk <=', $tanggal_sampai);
		$this->db->where('tanggal_skberakhir >=', $tanggal_sampai);
		$this->db->where('tbl_sk.jabatan_sk', 'Pengguna Anggaran');
		return $this->db->get()->row();
    }

	public function bendaharasampai($tanggal_sampai) 
    {
		$id_opd = $this->session->userdata('id_opd');
        
		$this->db->select('*');
		$this->db->from('tbl_sk');
		$this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
		$this->db->where('tbl_sk.id_opd', $id_opd);
		$this->db->where('tanggal_sk <=', $tanggal_sampai);
		$this->db->where('tanggal_skberakhir >=', $tanggal_sampai);
		$this->db->where('tbl_sk.jabatan_sk', 'Bendahara');
		return $this->db->get()->row();
    }

	public function ppk($tanggal_sppd) 
    {
		$id_opd = $this->session->userdata('id_opd');
        
		$this->db->select('*');
		$this->db->from('tbl_sk');
		$this->db->join('tbl_pegawai','tbl_pegawai.nip=tbl_sk.nip');
		$this->db->where('tbl_sk.id_opd', $id_opd);
		$this->db->where('tanggal_sk <=', $tanggal_sppd);
		$this->db->where('tanggal_skberakhir >=', $tanggal_sppd);
		$this->db->where('tbl_sk.jabatan_sk', 'Pejabat Pembuat Komitmen');
		return $this->db->get()->row();
    }


	
}
