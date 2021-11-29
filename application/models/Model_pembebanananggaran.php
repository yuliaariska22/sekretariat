<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembebanananggaran extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function pembebanananggaran()
	{
		$id_opd=$this->session->userdata('id_opd');

		$this->db->order_by('id_pembebanananggaran');
		$this->db->where('tbl_pembebanananggaran.id_opd', $id_opd);
        return $this->db->from('tbl_pembebanananggaran')
			->get();
	}

	public function menambahdatapembebanananggaran($data)
	{
		$this->db->insert('tbl_pembebanananggaran', $data);
	}

	public function updatepembebanananggaran($data, $id_pembebanananggaran)
	{
		$this->db->where('id_pembebanananggaran', $id_pembebanananggaran);
		$this->db->update('tbl_pembebanananggaran', $data);
	}

	public function deletepembebanananggaran($id_pembebanananggaran)
	{
		$this->db->where('id_pembebanananggaran', $id_pembebanananggaran);
		$this->db->delete('tbl_pembebanananggaran');
	}

	
	
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */