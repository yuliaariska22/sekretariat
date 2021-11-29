<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pengalaman_luarnegeri extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getpengalaman_luarnegeri() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_pengalaman_luarnegeri.nip', $nip);
        return $this->db->from('tbl_pengalaman_luarnegeri')	
			->get();
    }

	public function menambahdatapengalaman_luarnegeri($data)
	{
		$this->db->insert('tbl_pengalaman_luarnegeri', $data);
	}

	public function updatedatapengalaman_luarnegeri($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_pengalaman_luarnegeri', $data);
	}

	public function deletedatapengalaman_luarnegeri($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_pengalaman_luarnegeri');
	}

}