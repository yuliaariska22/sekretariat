<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_du_kepangkatan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getdu_kepangkatan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_du_kepangkatan.nip', $nip);
        return $this->db->from('tbl_du_kepangkatan')	
			->get();
    }

	public function menambahdatadu_kepangkatan($data)
	{
		$this->db->insert('tbl_du_kepangkatan', $data);
	}

	public function updatedatadu_kepangkatan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_du_kepangkatan', $data);
	}

	public function deletedatadu_kepangkatan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_du_kepangkatan');
	}

}