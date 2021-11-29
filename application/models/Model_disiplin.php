<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_disiplin extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getdisiplin() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_disiplin.nip', $nip);
        return $this->db->from('tbl_disiplin')	
			->get();
    }

	public function menambahdatadisiplin($data)
	{
		$this->db->insert('tbl_disiplin', $data);
	}

	public function updatedatadisiplin($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_disiplin', $data);
	}

	public function deletedatadisiplin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_disiplin');
	}

}