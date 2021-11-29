<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pelatihan extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getpelatihan() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_pelatihan.nip', $nip);
        return $this->db->from('tbl_pelatihan')	
			->get();
    }

	public function menambahdatapelatihan($data)
	{
		$this->db->insert('tbl_pelatihan', $data);
	}

	public function updatedatapelatihan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_pelatihan', $data);
	}

	public function deletedatapelatihan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_pelatihan');
	}

}