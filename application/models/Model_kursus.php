<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kursus extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getkursus() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_kursus.nip', $nip);
        return $this->db->from('tbl_kursus')	
			->get();
    }

	public function menambahdatakursus($data)
	{
		$this->db->insert('tbl_kursus', $data);
	}

	public function updatedatakursus($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_kursus', $data);
	}

	public function deletedatakursus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_kursus');
	}

}