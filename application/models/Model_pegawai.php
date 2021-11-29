<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pegawai extends CI_Model {

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

	public function updatestatusverifikasi($data2, $nip)
	{
		$this->db->where('nip', $nip);
		$this->db->update('tbl_pegawai', $data2);
	}

	function GetId_pegawai($nip='')
    {
      return $this->db->get_where('tbl_pegawai', array('nip' => $nip))->row();
    }

	public function updatedatapegawai($data, $nip)
	{
		$this->db->where('nip', $nip);
		$this->db->update('tbl_pegawai', $data);
	}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */