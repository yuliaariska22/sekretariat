<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_verifikasidatapegawai extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getverifikasidatapegawai() 
    {
		$id_opd=$this->session->userdata('id_opd');
        $this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_pegawai')	
			->get();
    }

	public function menambahdataverifikasidatapegawai($data)
	{
		$this->db->insert('tbl_pegawai', $data);
	}

	public function updatedataverifikasidatapegawai($data, $nip)
	{
		$this->db->where('nip', $nip);
		$this->db->update('tbl_pegawai', $data);
	}

	

}