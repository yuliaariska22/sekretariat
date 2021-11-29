<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_organisasi extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getorganisasi() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_organisasi.nip', $nip);
        return $this->db->from('tbl_organisasi')	
			->get();
    }

	public function menambahdataorganisasi($data)
	{
		$this->db->insert('tbl_organisasi', $data);
	}

	public function updatedataorganisasi($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_organisasi', $data);
	}

	public function deletedataorganisasi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_organisasi');
	}

}