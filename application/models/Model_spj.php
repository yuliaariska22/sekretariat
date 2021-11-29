<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_spj extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function menambahdataspj($data)
	{
		$this->db->insert('tbl_ssh', $data);
	}
	
	public function updatedataspj($data, $id_ssh)
	{
		$this->db->where('id_ssh', $id_ssh);
		$this->db->update('tbl_ssh', $data);
	}

	public function deletedataspj($id_ssh)
	{
		$this->db->where('id_ssh', $id_ssh);
		$this->db->delete('tbl_ssh');
	}

}