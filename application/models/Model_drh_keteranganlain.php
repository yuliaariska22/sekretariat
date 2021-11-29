<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_drh_keteranganlain extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getdrh_keteranganlain() 
    {
		$nip=$this->session->userdata('nip');
        $this->db->where('tbl_drh_keteranganlain.nip', $nip);
        return $this->db->from('tbl_drh_keteranganlain')	
			->get();
    }

	public function menambahdatadrh_keteranganlain($data)
	{
		$this->db->insert('tbl_drh_keteranganlain', $data);
	}

	public function updatedatadrh_keteranganlain($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_drh_keteranganlain', $data);
	}

	public function deletedatadrh_keteranganlain($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_drh_keteranganlain');
	}

}