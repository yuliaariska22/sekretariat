<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detailpegawai extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function Getdetailpegawai()
	{
		$nip=$this->session->userdata('nip');

		$this->db->where('tbl_detailpegawai.nip', $nip);
        return $this->db->from('tbl_detailpegawai')
			->join('tbl_pegawai', 'tbl_pegawai.nip = tbl_detailpegawai.nip')
			->get()
			->result();
	}

	public function menambahdatadiri($data)
	{
		$this->db->insert('tbl_detailpegawai', $data);
	}

	public function updatedatadiri($data, $nip)
	{
		$this->db->where('nip', $nip);
		$this->db->update('tbl_detailpegawai', $data);
	}

	public function cetakdetailpegawai($nip)
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->join('tbl_detailpegawai', 'tbl_detailpegawai.nip=tbl_pegawai.nip');
		$this->db->join('tbl_opd', 'tbl_opd.id_opd=tbl_pegawai.id_opd');
		$this->db->where('tbl_pegawai.nip', $nip);
		return $this->db->get()->row();
	}

	public function cetakpangkatterakhir($nip)
	{
		$this->db->select('*');
		$this->db->from('tbl_riwayat_kepangkatan');
		$this->db->where('tbl_riwayat_kepangkatan.nip', $nip);
		$this->db->order_by('tanggal_sk','DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function cetakjabatanterakhir($nip)
	{
		$this->db->select('*');
		$this->db->from('tbl_riwayat_jabatan');
		$this->db->where('tbl_riwayat_jabatan.nip', $nip);
		$this->db->order_by('tanggal_sk','DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function cetakriwayatkepangkatan($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_riwayat_kepangkatan')
			->get()->result();
	}

	public function cetakriwayatjabatan($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_riwayat_jabatan')
			->get()->result();
	}

	public function cetakpendidikan($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_pendidikan')
			->get()->result();
	}

	public function cetakpelatihankepempimpinan($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('jenis_pelatihan', "Pendidikan dan Pelatihan Kepemimpinan");
        return $this->db->from('tbl_pelatihan')
			->get()->result();
	}

	public function cetakpelatihanfungsional($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('jenis_pelatihan', "Pendidikan dan Fungsional");
        return $this->db->from('tbl_pelatihan')
			->get()->result();
	}

	public function cetakpelatihanteknis($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('jenis_pelatihan', "Pendidikan dan Pelatihan Teknis");
        return $this->db->from('tbl_pelatihan')
			->get()->result();
	}

	public function cetakpelatihanwawasan($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('jenis_pelatihan', "Pendidikan dan Pelatihan Wawasan Management Pemerintahan");
        return $this->db->from('tbl_pelatihan')
			->get()->result();
	}

	public function cetakduk($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_du_kepangkatan')
			->get()->result();
	}

	
	public function cetakskp($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_skp')
			->get()->result();
	}

	public function cetakdisiplin($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_disiplin')
			->get()->result();
	}

	public function cetakpenyaji($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_penyaji')
			->get()->result();
	}

	public function cetakmakalah($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_karyatulis')
			->get()->result();
	}
	
	public function cetakkursus($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_kursus')
			->get()->result();
	}

	public function cetakpenghargaan($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_penghargaan')
			->get()->result();
	}
	public function cetakpengalamanluarnegeri($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_pengalaman_luarnegeri')
			->get()->result();
	}

	public function cetaksuamiistri($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kategori', "Istri/Suami");
        return $this->db->from('tbl_keluarga')
			->get()->result();
	}

	public function cetakanak($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kategori', "Anak");
        return $this->db->from('tbl_keluarga')
			->get()->result();
	}

	public function cetakbapakibumertua($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kategori', "Bapak dan Ibu Mertua");
        return $this->db->from('tbl_keluarga')
			->get()->result();
	}

	public function cetakbapakibukandung($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kategori', "Bapak dan Ibu Kandung");
        return $this->db->from('tbl_keluarga')
			->get()->result();
	}

	public function cetaksaudara($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kategori', "Saudara Kandung");
        return $this->db->from('tbl_keluarga')
			->get()->result();
	}

	public function cetakorganisasislta($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('masa', "SLTA ke bawah");
        return $this->db->from('tbl_organisasi')
			->get()->result();
	}

	public function cetakorganisasiorganisasiperguruantinggi($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->where('masa', "Semasa Perguruan Tinggi");
        return $this->db->from('tbl_organisasi')
			->get()->result();
	}

	public function cetakketeranganlain($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->from('tbl_drh_keteranganlain')
			->get()->result();
	}

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */