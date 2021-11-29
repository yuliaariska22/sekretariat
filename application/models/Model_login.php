<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function action_login($nip, $password)
		{
			$this->db->from('tbl_pegawai');
			$this->db->where('nip', $nip);
			$this->db->where('password', $password);
			$this->db->limit(1);

			$query = $this->db->get();
			if ($query->num_rows()==1) {
				return $query->result();
			} else{
				return false;
				
			}
		}

		public function cekjabatan($nip)
		{
			$this->db->from('tbl_riwayat_jabatan');
			$this->db->where('nip', $nip);
			$this->db->order_by('tanggal_sk', 'DESC');
			$this->db->limit(1);

			$query = $this->db->get();
			if ($query->num_rows()==1) {
				return $query->result();
			} else{
				return $query->result();
				
			}
		}
		function Getgantipassword()
    	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip', $nip);
        return $this->db->from('tbl_pegawai')
    		->get();
		}

		public function updatedatachangepassword($data, $password)
		{
		$this->db->where('password', $password);
		$this->db->update('tbl_pegawai', $data);
		}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */