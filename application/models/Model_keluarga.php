<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_keluarga extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getkeluarga() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_keluarga.nip', $nip);
        return $this->db->from('tbl_keluarga')	
			->get();
    }

	public function menambahdatakeluarga($data)
	{
		$this->db->insert('tbl_keluarga', $data);
	}

	public function updatedatakeluarga($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_keluarga', $data);
	}

	public function deletedatakeluarga($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_keluarga');
	}

}