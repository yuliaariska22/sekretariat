<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kibb extends CI_Model {
  
 
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	function Getkibb() 
    {
		$id_opd=$this->session->userdata('id_opd');
        $this->db->order_by('status_kibb', "ASC");
        $this->db->where('tbl_riwayat_kibb.id_opd', $id_opd);
        return $this->db->from('tbl_riwayat_kibb')	
			->join('tbl_kibb','tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi')
			->get();
    }

	public function menambahdatakibb($data)
	{
		$this->db->insert('tbl_kibb', $data);
	}

	public function menambahdatariwayatkibb($data2)
	{
		$this->db->insert('tbl_riwayat_kibb', $data2);
	}

	public function updatedatakibb($data, $no_polisi)
	{
		$this->db->where('no_polisi', $no_polisi);
		$this->db->update('tbl_kibb', $data);
	}

	public function updatedatariwayatkibb($data2, $id_riwayat_kibb)
	{
		$this->db->where('id_riwayat_kibb', $id_riwayat_kibb);
		$this->db->update('tbl_riwayat_kibb', $data2);
	}

	public function deletedatakibb($id_riwayat_kibb)
	{
		$this->db->where('id_riwayat_kibb', $id_riwayat_kibb);
		$this->db->delete('tbl_riwayat_kibb');
	}

	public function mutasilamadatakibb($data, $id_riwayat_kibb)
	{
		$this->db->where('id_riwayat_kibb', $id_riwayat_kibb);
		$this->db->update('tbl_riwayat_kibb', $data);
	}

	public function mutasibarudatakibb($data2)
	{
		$this->db->insert('tbl_riwayat_kibb', $data2);
	}

	// LAPORAN REKAP

	function Tampillaporanrekap() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanrekap($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT
	tbl_opd.nama_opd,
    
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_enam,

    COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_enam,

	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_enam,

	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'  AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'  AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_enam,

    COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_enam

		  FROM tbl_riwayat_kibb
		  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
		  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
		  GROUP BY tbl_riwayat_kibb.id_opd
		";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN GLOBAL

	function Tampillaporanglobal() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanglobal($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kibb.nama_barang,tbl_kibb.roda,tbl_kibb.merk,tbl_kibb.type,tbl_kibb.bahan,tbl_kibb.tahun_pembelian,tbl_kibb.no_pabrik,tbl_kibb.no_rangka,tbl_kibb.no_mesin,tbl_kibb.no_polisi,tbl_kibb.no_bpkb,tbl_kibb.sumber_perolehan,tbl_kibb.harga,tbl_riwayat_kibb.pejabat_pengguna,tbl_kibb.keterangan,tbl_riwayat_kibb.tanggal_mutasi,tbl_riwayat_kibb.dimutasi
			  FROM tbl_riwayat_kibb
			  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
			  WHERE tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')


		ORDER BY a.id_opd

			 			  ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	// LAPORAN PER OPD
	function Tampillaporanopd() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanopd($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kibb.nama_barang,tbl_kibb.roda,tbl_kibb.merk,tbl_kibb.type,tbl_kibb.bahan,tbl_kibb.tahun_pembelian,tbl_kibb.no_pabrik,tbl_kibb.no_rangka,tbl_kibb.no_mesin,tbl_kibb.no_polisi,tbl_kibb.no_bpkb,tbl_kibb.sumber_perolehan,tbl_kibb.harga,tbl_riwayat_kibb.pejabat_pengguna,tbl_kibb.keterangan,tbl_riwayat_kibb.tanggal_mutasi,tbl_riwayat_kibb.dimutasi,tbl_kibb.tgl_berlaku_pajak,tbl_kibb.tgl_berlaku_stnk
			  FROM tbl_riwayat_kibb
			  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
			  WHERE tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')
		AND a.id_opd = $id_opd

		ORDER BY a.id_opd

			 			  ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	//LAPORAN HILANG
	function Tampillaporanhilang() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanhilang($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT *
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kibb.nama_barang,tbl_kibb.roda,tbl_kibb.merk,tbl_kibb.type,tbl_kibb.bahan,tbl_kibb.tahun_pembelian,tbl_kibb.no_pabrik,tbl_kibb.no_rangka,tbl_kibb.no_mesin,tbl_kibb.no_polisi,tbl_kibb.no_bpkb,tbl_kibb.sumber_perolehan,tbl_kibb.harga,tbl_riwayat_kibb.pejabat_pengguna,tbl_kibb.keterangan,tbl_riwayat_kibb.tanggal_mutasi,tbl_riwayat_kibb.dimutasi,tbl_kibb.tgl_berlaku_pajak,tbl_kibb.tgl_berlaku_stnk
			  FROM tbl_riwayat_kibb
			  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
			  WHERE tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')
		AND a.keterangan = 'Hilang'

		ORDER BY a.id_opd

			 			  ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN JENIS KENDARAAN
	
	function Tampillaporanjeniskendaraan() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanjeniskendaraan($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT *,
		COUNT(CASE WHEN a.roda = 'Roda 2 (Dua)' THEN 0 END) AS roda_dua,
		COUNT(CASE WHEN a.roda = 'Roda 3 (Tiga)' THEN 0 END) AS roda_tiga,
		COUNT(CASE WHEN a.roda = 'Roda 4 (Empat)' THEN 0 END) AS roda_empat,
		COUNT(CASE WHEN a.roda = 'Roda 6 (Enam)' THEN 0 END) AS roda_enam
		FROM (
		SELECT tbl_opd.id_opd,tbl_opd.nama_opd,tbl_kibb.nama_barang,tbl_kibb.roda,tbl_kibb.merk,tbl_kibb.type,tbl_kibb.bahan,tbl_kibb.tahun_pembelian,tbl_kibb.no_pabrik,tbl_kibb.no_rangka,tbl_kibb.no_mesin,tbl_kibb.no_polisi,tbl_kibb.no_bpkb,tbl_kibb.sumber_perolehan,tbl_kibb.harga,tbl_riwayat_kibb.pejabat_pengguna,tbl_kibb.keterangan,tbl_riwayat_kibb.tanggal_mutasi,tbl_riwayat_kibb.dimutasi
			  FROM tbl_riwayat_kibb
			  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
			  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
			  WHERE tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' 
			  AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'
		) a
		WHERE NOT (a.tanggal_mutasi >= '$tanggal_mulai' and a.tanggal_mutasi <= '$tanggal_sampai' and a.dimutasi = 'ya')


		GROUP BY a.id_opd
		ORDER BY a.id_opd
		

			 			  ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// LAPORAN PENAMBAHAN

	function Tampillaporanpenambahan() 
	{
		return $this->db->from('tbl_riwayat_kibb')
		  ->get()
		  ->result();
	}

	function Gethasillaporanpenambahan($tanggal_mulai,$tanggal_sampai)
	{
		$sql="
		SELECT
	tbl_opd.nama_opd,
    
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_mulai' THEN 0 END) AS awal_roda_enam,

    COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_mulai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS awal_kurang_roda_enam,

	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'   AND tbl_riwayat_kibb.hasil_mutasi = 'YA' THEN 0 END) AS tambah_roda_enam,

	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'  AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai'  AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_pencatatan > '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_pencatatan <= '$tanggal_sampai' AND tbl_riwayat_kibb.hasil_mutasi = 'TIDAK' THEN 0 END) AS tambah_baru_roda_enam,

    COUNT(CASE WHEN tbl_kibb.roda = 'Roda 2 (Dua)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai' AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_dua,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 3 (Tiga)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_tiga,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 4 (Empat)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_empat,
	COUNT(CASE WHEN tbl_kibb.roda = 'Roda 6 (Enam)' AND tbl_riwayat_kibb.tanggal_mutasi >= '$tanggal_mulai' AND tbl_riwayat_kibb.tanggal_mutasi <= '$tanggal_sampai'  AND tbl_riwayat_kibb.dimutasi = 'YA' THEN 0 END) AS kurang_roda_enam

		  FROM tbl_riwayat_kibb
		  JOIN tbl_kibb ON tbl_kibb.no_polisi=tbl_riwayat_kibb.no_polisi
		  JOIN tbl_opd ON tbl_opd.id_opd=tbl_riwayat_kibb.id_opd
		  GROUP BY tbl_riwayat_kibb.id_opd
		";
		$query = $this->db->query($sql);
		return $query->result();
	}
}