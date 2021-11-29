<?php

class Model_penyaluran extends CI_Model {

	function Tampilpenyaluran() 
    {
        $this->db->order_by('id_mutasi', 'ASC');
        $this->db->where('jenis_mutasi', 'Penyaluran');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function Getpenyaluran() 
    {
        $username=$this->session->userdata('nip');
        $this->db->where('jenis_mutasi', 'Penyaluran');
        $this->db->where('tbl_mutasi.username', $username);
        $this->db->where('tbl_mutasi.statuspenyaluran !=', "Sudah Disalurkan");
        $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->where('tbl_mutasi.username', $username)
          ->get()
          ->result();
    }
    
    function Getpenyaluranselesai() 
    {
        $username=$this->session->userdata('nip');
        $this->db->where('jenis_mutasi', 'Penyaluran');
        $this->db->where('tbl_mutasi.username', $username);
        $this->db->where('tbl_mutasi.statuspenyaluran', "Sudah Disalurkan");
        $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->where('tbl_mutasi.username', $username)
          ->get()
          ->result();
    }
    
    function Getid($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }
    function deletedatapenyaluran($id_mutasi)
    {
        $this->db->delete('tbl_mutasi',array('id_mutasi' => $id_mutasi));
    }


    public function menambahdatapenyaluran($data)
	{
		$this->db->insert('tbl_mutasi', $data);
	}

  // Detail Penyaluran

  function Tampildetailpenyaluran($id_mutasi='') 
  {
      $this->db->order_by('id_detailmutasisementara', 'ASC');
      $this->db->where('tbl_detailmutasisementara.id_mutasi', $id_mutasi);
      return $this->db->from('tbl_detailmutasisementara')
        ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')          
        ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')   
        ->get()
        ->result();
  }

  function Getid_detailpenyaluran($id_detailmutasisementara='',$id_mutasi='')
  {
    return $this->db->get_where('tbl_detailmutasisementara', array('id_detailmutasisementara' => $id_detailmutasisementara))->row();
  }

  function Hapusdetailpenyaluran($id_detailmutasisementara)
  {
      $this->db->delete('tbl_detailmutasisementara',array('id_detailmutasisementara' => $id_detailmutasisementara));
  }

  // Penyaluran PBP

  function TampilpenyaluranPBP() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->order_by('keterangan', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function GetpenyaluranPBP() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->order_by('statuspenyaluran', 'ASC');
      $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function GetpenyaluranselesaiPBP() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Penyaluran');
      $this->db->where('tbl_mutasi.statuspenyaluran', 'Sudah Disalurkan');
      $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }


    
    function Getid_mutasiPBP($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }

    function LihatlistpenyaluranPBP($id_mutasi='') 
    {
        $this->db->order_by('id_detailmutasisementara', 'ASC');
        $this->db->where('id_mutasi', $id_mutasi);
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->get()
          ->result();
    }
}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */