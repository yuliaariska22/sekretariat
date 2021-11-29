<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_penghargaan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getpenghargaan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_penghargaan.nip', $nip);
        return $this->db->from('tbl_penghargaan')	
			->get();
    }

	public function menambahdatapenghargaan($data)
	{
		$this->db->insert('tbl_penghargaan', $data);
	}

	public function updatedatapenghargaan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_penghargaan', $data);
	}

	public function deletedatapenghargaan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_penghargaan');
	}

}