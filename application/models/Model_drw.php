<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_drw extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Tampildrw() 
    {
		$this->db->order_by('id');
        return $this->db->from('tbl_drw_datadiri')
			->get();
    }

	public function deletedrw($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_drw_datadiri');
	}


	function Tampildrwedit($id) 
    {
		$this->db->where('id', $id);
        return $this->db->from('tbl_drw_datadiri')
			->get()->row();
    }

	
	function Tampildrwid($id) 
    {
		$this->db->where('id' ,$id);
        return $this->db->from('tbl_drw_datadiri')
			->get()
			->row();
    }
	

}