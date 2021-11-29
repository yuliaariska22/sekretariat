<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function semuapegawai()
	{
		$id_opd=$this->session->userdata('id_opd');

		$this->db->order_by('id_sppd');
		$this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_sppd')
			->join('tbl_pegawai', 'tbl_pegawai.nip = tbl_sppd.nip')
			->get();
	}

	public function menu()
	{
		$id_opd=$this->session->userdata('id_opd');

		$this->db->order_by('tbl_pegawai.nip');
		$this->db->order_by('tbl_menu.menu');
		$this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_menu')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_menu.nip')
			->get();
	}

	public function menambahdatamenu($data)
	{
		$this->db->insert('tbl_menu', $data);
	}

	public function updatemenu($data, $id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$this->db->update('tbl_menu', $data);
	}

	public function deletemenu($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$this->db->delete('tbl_menu');
	}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */