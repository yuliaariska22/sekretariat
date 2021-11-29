<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_opd extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function kopsuratsppd($id_sppd)
	{
		$this->db->where('tbl_sppd.id_sppd', $id_sppd);
        return $this->db->from('tbl_sppd')
			->join('tbl_pegawai', 'tbl_pegawai.nip = tbl_sppd.nip')
			->join('tbl_opd', 'tbl_opd.id_opd = tbl_pegawai.id_opd')
			->get()->row();
	}

	public function opd($id_opd)
	{
		$this->db->where('id_opd', $id_opd);
        return $this->db->from('tbl_opd')
			->get()->row();
	}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */