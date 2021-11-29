<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_riwayat_jabatan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getriwayat_jabatan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_riwayat_jabatan.nip', $nip);
        return $this->db->from('tbl_riwayat_jabatan')	
			->get();
    }

	public function menambahdatariwayat_jabatan($data)
	{
		$this->db->insert('tbl_riwayat_jabatan', $data);
	}

	public function updatedatariwayat_jabatan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_riwayat_jabatan', $data);
	}

	public function deletedatariwayat_jabatan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_riwayat_jabatan');
	}

}