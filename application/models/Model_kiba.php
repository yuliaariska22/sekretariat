<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kiba extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getkiba() 
    {
		$id_opd=$this->session->userdata('id_opd');
        $this->db->order_by('status_kiba', "ASC");
        $this->db->where('tbl_riwayat_kiba.id_opd', $id_opd);
        return $this->db->from('tbl_riwayat_kiba')	
			->join('tbl_kiba','tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba')
			->get();
    }

	public function menambahdatakiba($data)
	{
		$this->db->insert('tbl_kiba', $data);
	}

	public function menambahdatariwayatkiba($data2)
	{
		$this->db->insert('tbl_riwayat_kiba', $data2);
	}

	public function updatedatakiba($data, $id_kiba)
	{
		$this->db->where('id_kiba', $id_kiba);
		$this->db->update('tbl_kiba', $data);
	}

	public function updatedatariwayatkiba($data2, $id_riwayat_kiba)
	{
		$this->db->where('id_riwayat_kiba', $id_riwayat_kiba);
		$this->db->update('tbl_riwayat_kiba', $data2);
	}

	public function deletedatakiba($id_riwayat_kiba)
	{
		$this->db->where('id_riwayat_kiba', $id_riwayat_kiba);
		$this->db->delete('tbl_riwayat_kiba');
	}

	public function mutasilamadatakiba($data, $id_riwayat_kiba)
	{
		$this->db->where('id_riwayat_kiba', $id_riwayat_kiba);
		$this->db->update('tbl_riwayat_kiba', $data);
	}

	public function mutasibarudatakiba($data2)
	{
		$this->db->insert('tbl_riwayat_kiba', $data2);
	}


	// LAPORAN GLOBAL

	function Tampillaporanglobal() 
	{
		return $this->db->from('tbl_riwayat_kiba')
		  ->get()
		  ->result();
	}

	function Gethasillaporanglobal($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kiba.nama_barang,tbl_kiba.no_kode_barang,tbl_kiba.no_register,tbl_kiba.ket_tanah,tbl_kiba.luas_catat_kib,tbl_kiba.kor_tambah_luas,tbl_kiba.kor_kurang_luas,tbl_kiba.tahun_pengadaan,tbl_kiba.alamat,tbl_kiba.statustanah_hak,tbl_kiba.tanggal_sertifikat,tbl_kiba.no_sertifikat,tbl_kiba.harga,tbl_kiba.ket_perolehan,tbl_kiba.keterangan_penguasaan,tbl_riwayat_kiba.tanggal_mutasi,tbl_riwayat_kiba.dimutasi
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')


		ORDER BY a.id_opd,a.no_kode_barang,a.no_register ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN TANAH

	function Tampillaporantanah() 
	{
		return $this->db->from('tbl_riwayat_kiba')
		  ->get()
		  ->result();
	}

	function Gethasillaporantanah($tanggal_mulai,$tanggal_sampai,$tanah)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kiba.nama_barang,tbl_kiba.no_kode_barang,tbl_kiba.no_register,tbl_kiba.ket_tanah,tbl_kiba.luas_catat_kib,tbl_kiba.kor_tambah_luas,tbl_kiba.kor_kurang_luas,tbl_kiba.tahun_pengadaan,tbl_kiba.alamat,tbl_kiba.statustanah_hak,tbl_kiba.tanggal_sertifikat,tbl_kiba.no_sertifikat,tbl_kiba.harga,tbl_kiba.ket_perolehan,tbl_kiba.keterangan_penguasaan,tbl_riwayat_kiba.tanggal_mutasi,tbl_riwayat_kiba.dimutasi
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai'
			  AND tbl_kiba.ket_tanah = '$tanah'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')


		ORDER BY a.id_opd,a.no_kode_barang,a.no_register ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN OPD

	function Tampillaporanopd() 
	{
		return $this->db->from('tbl_riwayat_kiba')
		  ->get()
		  ->result();
	}

	function Gethasillaporanopd($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kiba.nama_barang,tbl_kiba.no_kode_barang,tbl_kiba.no_register,tbl_kiba.ket_tanah,tbl_kiba.luas_catat_kib,tbl_kiba.kor_tambah_luas,tbl_kiba.kor_kurang_luas,tbl_kiba.tahun_pengadaan,tbl_kiba.alamat,tbl_kiba.statustanah_hak,tbl_kiba.tanggal_sertifikat,tbl_kiba.no_sertifikat,tbl_kiba.harga,tbl_kiba.ket_perolehan,tbl_kiba.keterangan_penguasaan,tbl_riwayat_kiba.tanggal_mutasi,tbl_riwayat_kiba.dimutasi
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai'
			  AND tbl_riwayat_kiba.id_opd = '$id_opd'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')


		ORDER BY a.id_opd,a.no_kode_barang,a.no_register ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN DAFTAR

	function Tampillaporandaftar() 
	{
		return $this->db->from('tbl_riwayat_kiba')
		  ->get()
		  ->result();
	}
	function Gethasillaporandaftar($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT *,
	tbl_opd.nama_opd,

	COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	

		  FROM tbl_riwayat_kiba
		  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
		  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
		  GROUP BY tbl_riwayat_kiba.id_opd
		";
		$query = $this->db->query($sql);
		return $query->result();
	}

		// LAPORAN REKAP

		function Tampillaporanrekap() 
		{
			return $this->db->from('tbl_riwayat_kiba')
			  ->get()
			  ->result();
		}
		function Gethasillaporanrekap($tanggal_mulai,$tanggal_sampai)
		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			";
			$query = $this->db->query($sql);
			return $query->result();
		}

		//jumlah_tanah_jalan

		function Gethasiltanahjalan($tanggal_mulai,$tanggal_sampai) 
   		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_tanah = 'TJ/G'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//jumlah_tanah_bangunan

		function Gethasiltanahbangunan($tanggal_mulai,$tanggal_sampai) 
   		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_tanah = 'TB'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//jumlah_tanah_bangunan_air_irigasi

		function Gethasiltanahbangunanairirigasi($tanggal_mulai,$tanggal_sampai) 
   		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_tanah = 'TI'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//sertifikat

		function sertifikat($tanggal_mulai,$tanggal_sampai) 
   		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'SERTIFIKAT'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//sppt

		function sppt($tanggal_mulai,$tanggal_sampai) 
   		{
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'SURAT PERNYATAAN PENYERAHAN TANAH'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//ajb

		function ajb($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'AKTA JUAL BELI'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//aphdg

		function aphdg($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'AKTA PELEPASAN HAK DENGAN GANTI'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//pgr

		function pgr($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'PENYERAHAN GANTI RUGI'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//sp

		function sp($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'SURAT PERJANJIAN'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//tbai

		function tbai($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'TANAH BANGUNAN AIR IRIGASI'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}

		//ttd

		function ttd($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'TANAH TANPA DOKUMEN'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}
    	
    	//hibah

		function hibah($tanggal_mulai,$tanggal_sampai) 
   		{
			
			$sql="
			SELECT 
	
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS awal_kurang,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN 0 END) AS tambah,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru,
		COUNT(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN 0 END) AS kurang,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN luas_catat_kib END) AS awal_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS awal_kurang_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN luas_catat_kib END) AS tambah_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN luas_catat_kib END) AS tambah_baru_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN luas_catat_kib END) AS kurang_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN harga END) AS awal_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS awal_kurang_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN harga END) AS tambah_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN harga END) AS tambah_baru_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN harga END) AS kurang_nilai,
	


		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_unit END) AS awal_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS awal_kurang_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_unit END) AS tambah_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_unit END) AS tambah_baru_kk_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_unit END) AS kurang_kk_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_luas END) AS awal_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS awal_kurang_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_luas END) AS tambah_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_luas END) AS tambah_baru_kk_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_luas END) AS kurang_kk_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_kurang_nilai END) AS awal_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS awal_kurang_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_kurang_nilai END) AS tambah_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_kurang_nilai END) AS tambah_baru_kk_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_kurang_nilai END) AS kurang_kk_nilai,
	
	
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_unit END) AS awal_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS awal_kurang_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_unit END) AS tambah_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_unit END) AS tambah_baru_kt_unit,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_unit END) AS kurang_kt_unit,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_luas END) AS awal_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS awal_kurang_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_luas END) AS tambah_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_luas END) AS tambah_baru_kt_luas,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_luas END) AS kurang_kt_luas,
	
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_mulai' THEN kor_tambah_nilai END) AS awal_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS awal_kurang_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'YA' THEN kor_tambah_nilai END) AS tambah_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kiba.hasil_mutasi = 'TIDAK' THEN kor_tambah_nilai END) AS tambah_baru_kt_nilai,
		SUM(CASE WHEN tbl_riwayat_kiba.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kiba.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kiba.dimutasi = 'YA' THEN kor_tambah_nilai END) AS kurang_kt_nilai
	
	
			  FROM tbl_riwayat_kiba
			  JOIN tbl_kiba ON tbl_kiba.id_kiba=tbl_riwayat_kiba.id_kiba
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kiba.id_opd
			  WHERE tbl_kiba.ket_perolehan = 'HIBAH'
			";
			$query = $this->db->query($sql);
			return $query->result();
    	}
	
	
}