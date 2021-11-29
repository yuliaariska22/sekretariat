<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_riwayat_kepangkatan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getriwayat_kepangkatan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_riwayat_kepangkatan.nip', $nip);
        return $this->db->from('tbl_riwayat_kepangkatan')	
			->get();
    }

	public function menambahdatariwayat_kepangkatan($data)
	{
		$this->db->insert('tbl_riwayat_kepangkatan', $data);
	}

	public function updatedatariwayat_kepangkatan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_riwayat_kepangkatan', $data);
	}

	public function deletedatariwayat_kepangkatan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_riwayat_kepangkatan');
	}

}