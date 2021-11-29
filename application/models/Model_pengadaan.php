<?php

class Model_pengadaan extends CI_Model {

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

    public function Tampilkonfirmasipengadaanbarang()
		{
			$this->db->order_by('statusorder', 'ASC');
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

    // Detail Pengadaan
    function Tampildetailpengadaan($id_mutasi='') 
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

    function Getid_detailpengadaan($id_detailmutasisementara='',$id_mutasi='')
    {
        
       $this->db->where('tbl_detailmutasisementara.id_detailmutasisementara', $id_detailmutasisementara);
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->get()
          ->row();
    }

    function Hapusdetailpengadaan($id_detailmutasisementara)
    {
        $this->db->delete('tbl_detailmutasisementara',array('id_detailmutasisementara' => $id_detailmutasisementara));
    }

    // Pengadaan PBP
    function TampilpengadaanPBP() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl.id_opd', $id_opd);
      $this->db->order_by('statusorder', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    function GetpengadaanPBP() 
    {
      $id_opd=$this->session->userdata('id_opd');
      $this->db->where('tbl_pegawai.id_opd', $id_opd);
      $this->db->order_by('statusorder', 'ASC');
      $this->db->order_by('id_mutasi', 'ASC');
        return $this->db->from('tbl_mutasi')
          ->join('tbl_rekanan','tbl_rekanan.id_rekanan=tbl_mutasi.id_rekanan')
          ->join('tbl_pegawai','tbl_pegawai.nip=tbl_mutasi.username')
          ->get()
          ->result();
    }

    
    function Getid_mutasiPBP($id_mutasi='')
    {
      return $this->db->get_where('tbl_mutasi', array('id_mutasi' => $id_mutasi))->row();
    }

    function LihatlistpengadaanPBP($id_mutasi='') 
    {
        $this->db->order_by('id_detailmutasisementara', 'ASC');
        $this->db->where('id_mutasi', $id_mutasi);
        return $this->db->from('tbl_detailmutasisementara')
          ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
          ->get()
          ->result();
    }


    function get_detailmutasisementara(){

      $id_opd = $this->session->userdata('id_opd');

      $this->db->select('*');
      $this->db->where('tbl_mutasi.id_opd', $id_opd);
      $this->db->where('tbl_mutasi.jenis_mutasi', 'Pengadaan');
      $this->db->where('tbl_bidang_opd.nama_bidang', 'Sekretariat');
      return $this->db->from('tbl_detailmutasisementara')
        ->join('tbl_ssh','tbl_ssh.id_ssh=tbl_detailmutasisementara.id_ssh')
        ->join('tbl_mutasi','tbl_mutasi.id_mutasi=tbl_detailmutasisementara.id_mutasi')
        ->join('tbl_bidang_opd','tbl_bidang_opd.id_bidang_opd=tbl_mutasi.id_bidang_opd')
        ->get();
    }
}

/* End of file Model_rekanan.php */
/* Location: ./application/models/Model_rekanan.php */