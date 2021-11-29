<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_karyatulis extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getkaryatulis() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_karyatulis.nip', $nip);
        return $this->db->from('tbl_karyatulis')	
			->get();
    }

	public function menambahdatakaryatulis($data)
	{
		$this->db->insert('tbl_karyatulis', $data);
	}

	public function updatedatakaryatulis($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_karyatulis', $data);
	}

	public function deletedatakaryatulis($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_karyatulis');
	}

}