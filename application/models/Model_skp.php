<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_skp extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getskp() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_skp.nip', $nip);
        return $this->db->from('tbl_skp')	
			->get();
    }

	public function menambahdataskp($data)
	{
		$this->db->insert('tbl_skp', $data);
	}

	public function updatedataskp($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_skp', $data);
	}

	public function deletedataskp($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_skp');
	}

}