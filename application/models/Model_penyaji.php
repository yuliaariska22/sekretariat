<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_penyaji extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getpenyaji() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_penyaji.nip', $nip);
        return $this->db->from('tbl_penyaji')	
			->get();
    }

	public function menambahdatapenyaji($data)
	{
		$this->db->insert('tbl_penyaji', $data);
	}

	public function updatedatapenyaji($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_penyaji', $data);
	}

	public function deletedatapenyaji($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_penyaji');
	}

}