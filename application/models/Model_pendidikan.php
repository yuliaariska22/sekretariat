<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pendidikan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getpendidikan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_pendidikan.nip', $nip);
        return $this->db->from('tbl_pendidikan')	
			->get();
    }

	public function menambahdatapendidikan($data)
	{
		$this->db->insert('tbl_pendidikan', $data);
	}

	public function updatedatapendidikan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_pendidikan', $data);
	}

	public function deletedatapendidikan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_pendidikan');
	}

}