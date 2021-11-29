<?php

class Model_pengadaanfix extends CI_Model {

	function Tampilpengadaan() 
    {
        $this->db->order_by('id_mutasi', 'ASC');
        $this->db->where('jenis_mutasi', 'Pengadaan');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
    }

    function Getpengadaan() 
    {
       $username=$this->session->userdata('nip');
        $this->db->where('jenis_mutasi', 'Pengadaan');
        $this->db->where('statusorder !=', 'Selesai');
        $this->db->where('tbl_mutasi.username', $username);
        $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
    }

    function Getpengadaanselesai() 
    {
       $username=$this->session->userdata('nip');
        $this->db->where('jenis_mutasi', 'Pengadaan');
        $this->db->where('statusorder', 'Selesai');
        $this->db->where('tbl_mutasi.username', $username);
        $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->where('tbl_mutasi.username', $username)
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
    }

    
    function Getid($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }
    function deletedatapengadaan($id_mutasi)
    {
        $this->db->delete('tbl_mutasi',array('id_mutasi' => $id_mutasi));
    }

    public function TampilorderbyMenungguKonfirmasi()
		{
			$this->db->order_by('id_mutasi', 'ASC');
      $this->db->where('jenis_mutasi', 'Pengadaan');
      $this->db->where('statusorder !=', 'Selesai');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
		}

    public function Tampilpengadaanbarangselesai()
		{
			$this->db->order_by('statusorder', 'ASC');
      $this->db->where('jenis_mutasi', 'Pengadaan');
			$this->db->where('statusorder', "Selesai");
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->get()
          ->result();
		}

    public function menambahdatapengadaan($data)
	{
		$this->db->insert('tbl_mutasi', $data);
	}

  
	function Tampildetailpengadaanfix($id_mutasi='') 
  {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      $this->db->where('tbl_detailmutasisementara.id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
        ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')          
        ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')              
        ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
        ->get()
        ->result();
  }

  function Getid_detailpengadaanfix($id_detailmutasisementara='',$id_mutasi='')
  {
    return $this->db->get_where('tbl_detailmutasisementara', array('id_detailmutasisementara' => $id_detailmutasisementara)) 
    ->row();
  }

  function Hapusdetailpengadaanfix($id_detailmutasisementara)
  {
      $this->db->delete('tbl_detailmutasisementara',array('id_detailmutasisementara' => $id_detailmutasisementara));
  }
}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */