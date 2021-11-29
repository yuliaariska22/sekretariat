<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sppd extends CI_Model {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}

	public function sppd()
	{
		$nip=$this->session->userdata('nip');

		$this->db->order_by('id_sppd');
		$this->db->where('tbl_sppd.nip', $nip);
        return $this->db->from('tbl_sppd')
			->get();
	}

	public function menambahdatasppd($data)
	{
		$this->db->insert('tbl_sppd', $data);
	}

	public function updatesppd($data, $id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
		$this->db->update('tbl_sppd', $data);
	}

	public function deletesppd($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
		$this->db->delete('tbl_sppd');
	}

	public function detailsppd($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->get();
	}

	public function deletedetailsppd($id_detailsppd)
	{
		$this->db->where('id_detailsppd', $id_detailsppd);
		$this->db->delete('tbl_detailsppd');
	}

	public function menambahdatadetailsppd($data)
	{
		$this->db->insert('tbl_detailsppd', $data);
	}

	public function detailsppdpengikut($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppdpengikut')
			->get();
	}

	public function deletedetailsppdpengikut($id_detailsppdpengikut)
	{
		$this->db->where('id_detailsppdpengikut', $id_detailsppdpengikut);
		$this->db->delete('tbl_detailsppdpengikut');
	}

	public function menambahdatadetailsppdpengikut($data)
	{
		$this->db->insert('tbl_detailsppdpengikut', $data);
	}

	public function detailsppdtujuan($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppdtujuan')
			->get();
	}

	public function deletedetailsppdtujuan($id_detailsppdtujuan)
	{
		$this->db->where('id_detailsppdtujuan', $id_detailsppdtujuan);
		$this->db->delete('tbl_detailsppdtujuan');
	}

	public function menambahdatadetailsppdtujuan($data)
	{
		$this->db->insert('tbl_detailsppdtujuan', $data);
	}

	public function detailsppddasar($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppddasar')
			->get();
	}

	public function deletedetailsppddasar($id_detailsppddasar)
	{
		$this->db->where('id_detailsppddasar', $id_detailsppddasar);
		$this->db->delete('tbl_detailsppddasar');
	}

	public function menambahdatadetailsppddasar($data)
	{
		$this->db->insert('tbl_detailsppddasar', $data);
	}

	public function getupdatesppd($id_sppd)
	{
		$this->db->where('tbl_sppd.id_sppd', $id_sppd);
        return $this->db->from('tbl_sppd')
			->join('tbl_pembebanananggaran','tbl_pembebanananggaran.id_pembebanananggaran=tbl_sppd.pembebanan_anggaran')
			->get();
	}

	public function getupdatedetailsppd($id_detailsppd)
	{
		$this->db->where('tbl_detailsppd.id_detailsppd', $id_detailsppd);
        return $this->db->from('tbl_detailsppd')
			->get();
	}

	public function sppdperorangan()
	{
		$nip=$this->session->userdata('nip');

		$this->db->order_by('id_detailsppd');
		$this->db->where('tbl_detailsppd.nip', $nip);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->get();
	}

	public function detaillaporan($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_laporanperjalanandinas')
			->get();
	}

	public function menambahdatalaporanperjalanandinas($data)
	{
		$this->db->insert('tbl_laporanperjalanandinas', $data);
	}

	public function deletelaporanperjalanandinas($id_laporanperjalanandinas)
	{
		$this->db->where('id_laporanperjalanandinas', $id_laporanperjalanandinas);
		$this->db->delete('tbl_laporanperjalanandinas');
	}

	public function detaillaporanmaksud($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_laporanmaksud')
			->get();
	}

	public function menambahdatalaporanmaksud($data)
	{
		$this->db->insert('tbl_laporanmaksud', $data);
	}

	public function deletelaporanmaksud($id_laporanmaksud)
	{
		$this->db->where('id_laporanmaksud', $id_laporanmaksud);
		$this->db->delete('tbl_laporanmaksud');
	}


	public function detaildaftarpengeluaranrill($id_detailsppd)
	{
		$this->db->where('id_detailsppd', $id_detailsppd);
		$this->db->order_by('bukti', 'ASC');
        return $this->db->from('tbl_daftarpengeluaranrill')
			->join('tbl_ssh_sppd','tbl_ssh_sppd.id_ssh_sppd=tbl_daftarpengeluaranrill.uraian')
			->get();
	}

	public function menambahdatadaftarpengeluaranrill($data)
	{
		$this->db->insert('tbl_daftarpengeluaranrill', $data);
	}

	public function deletedaftarpengeluaranrill($id_daftarpengeluaranrill)
	{
		$this->db->where('id_daftarpengeluaranrill', $id_daftarpengeluaranrill);
		$this->db->delete('tbl_daftarpengeluaranrill');
	}

	public function detaildaftarpengeluaran($id_detailsppd)
	{
		$this->db->where('id_detailsppd', $id_detailsppd);
        return $this->db->from('tbl_daftarpengeluaranrill')
			->get();
	}

	public function menambahdatadaftarpengeluaran($data)
	{
		$this->db->insert('tbl_daftarpengeluaranrill', $data);
	}

	public function updatedatadaftarpengeluaran($data, $id_detailsppd)
	{
		$this->db->where('id_detailsppd', $id_detailsppd);
		$this->db->update('tbl_daftarpengeluaranrill', $data);
	}

	public function updatedetailsppd($data, $id_detailsppd)
	{
		$this->db->where('id_detailsppd', $id_detailsppd);
		$this->db->update('tbl_detailsppd', $data);
	}

	public function deletedaftarpengeluaran($id_daftarpengeluaran)
	{
		$this->db->where('id_daftarpengeluaran', $id_daftarpengeluaran);
		$this->db->delete('tbl_daftarpengeluaranrill');
	}

	public function cetaksppd($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
		$this->db->order_by('tbl_riwayat_kepangkatan.tanggal_sk', "DESC");
		$this->db->order_by('tbl_riwayat_jabatan.tanggal_sk', "DESC");
		$this->db->limit(1);
        return $this->db->from('tbl_sppd')
		->join('tbl_pegawai','tbl_pegawai.nip=tbl_sppd.nip')
		->join('tbl_riwayat_kepangkatan','tbl_riwayat_kepangkatan.nip=tbl_pegawai.nip')
		->join('tbl_riwayat_jabatan','tbl_riwayat_jabatan.nip=tbl_pegawai.nip')
		->join('tbl_pembebanananggaran','tbl_pembebanananggaran.id_pembebanananggaran=tbl_sppd.pembebanan_anggaran')
			->get()->row();
	}

	public function cetakdetailsppd($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->get()->result();
	}

	public function cetakdetailspt($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
		$this->db->group_by('tbl_detailsppd.nip');
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->get()->result();
	}

	public function cetakdetailsppddasar($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppddasar')
			->get()->result();
	}

	public function cetakdetailsppdpengikut($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppdpengikut')
			->get()->result();
	}
	public function cetakdetailsppdtujuan($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_detailsppdtujuan')
			->get()->result();
	}

	public function cetakdetailsppdtujuansatu($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
		$this->db->limit(1);
        return $this->db->from('tbl_detailsppdtujuan')
			->get()->result();
	}
	
	public function cetakdetaillaporan($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_laporanperjalanandinas')
			->get()->result();
	}

	public function cetakdetailbiaya($id_sppd)
	{
		$nip = $this->session->userdata('nip');
		$this->db->where('tbl_sppd.id_sppd', $id_sppd);
		$this->db->where('tbl_detailsppd.nip', $nip);
        return $this->db->from('tbl_daftarpengeluaranrill')
			->join('tbl_detailsppd','tbl_detailsppd.id_detailsppd=tbl_daftarpengeluaranrill.id_detailsppd')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->join('tbl_ssh_sppd','tbl_ssh_sppd.id_ssh_sppd=tbl_daftarpengeluaranrill.uraian')
			->get()->result();
	}

	public function cetakdetailbiayarill($id_sppd)
	{
		$nip = $this->session->userdata('nip');
		$this->db->where('tbl_sppd.id_sppd', $id_sppd);
		$this->db->where('tbl_detailsppd.nip', $nip);
		$this->db->where('tbl_daftarpengeluaranrill.bukti', 'Tidak Ada');
        return $this->db->from('tbl_daftarpengeluaranrill')
			->join('tbl_detailsppd','tbl_detailsppd.id_detailsppd=tbl_daftarpengeluaranrill.id_detailsppd')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->join('tbl_ssh_sppd','tbl_ssh_sppd.id_ssh_sppd=tbl_daftarpengeluaranrill.uraian')
			->get()->result();
	}

	public function cetaklaporanmaksud($id_sppd)
	{
		$this->db->where('id_sppd', $id_sppd);
        return $this->db->from('tbl_laporanmaksud')
			->get()->result();
	}

	public function pelaksana()
	{
		$nip = $this->session->userdata('nip');
		$this->db->where('tbl_pegawai.nip', $nip);
		$this->db->order_by('tbl_riwayat_kepangkatan.tanggal_sk', "DESC");
		$this->db->order_by('tbl_riwayat_jabatan.tanggal_sk', "DESC");
		$this->db->limit(1);
        return $this->db->from('tbl_pegawai')
		->join('tbl_riwayat_kepangkatan','tbl_riwayat_kepangkatan.nip=tbl_pegawai.nip')
		->join('tbl_riwayat_jabatan','tbl_riwayat_jabatan.nip=tbl_pegawai.nip')
			->get()->row();
	}

	public function daftarpengeluaran($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		
		$id_opd = $this->session->userdata('id_opd');
		$sql="
		SELECT 
		tbl_sppd.id_sppd,
		tbl_sppd.no_sppd,
		tbl_sppd.tanggal_sppd,
		tbl_sppd.tanggal_berangkat,
		tbl_sppd.tanggal_kembali,
		tbl_sppd.kota_berangkat,
		tbl_sppd.kota_tujuan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nip AS nip,
		tbl_pegawai.nama AS nama,
		tbl_ssh_sppd.jenis_pengeluaran,
		tbl_ssh_sppd.keterangan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nama AS nama,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_bisnis_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_ekonomi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS transportasi_darat_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS taksi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_penginapan_ada_bukti,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Representasi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_representasi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Kontibusi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_kontibusi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Harian' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_harian,
		
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_bisnis_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_ekonomi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS transportasi_darat_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS taksi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS biaya_penginapan_no_bukti
		
		
		FROM `tbl_daftarpengeluaranrill`
		join tbl_detailsppd on tbl_detailsppd.id_detailsppd = tbl_daftarpengeluaranrill.id_detailsppd
		join tbl_sppd on tbl_sppd.id_sppd = tbl_detailsppd.id_sppd  
		join tbl_ssh_sppd on tbl_ssh_sppd.id_ssh_sppd = tbl_daftarpengeluaranrill.uraian
		join tbl_pegawai on tbl_pegawai.nip = tbl_detailsppd.nip
		WHERE tbl_pegawai.id_opd = '$id_opd' AND (tbl_sppd.tanggal_sppd >= '$tanggal_mulai' AND tbl_sppd.tanggal_sppd <= '$tanggal_sampai')
		GROUP BY tbl_daftarpengeluaranrill.id_detailsppd
		ORDER BY tbl_daftarpengeluaranrill.id_detailsppd
		
		";
		  $query = $this->db->query($sql);
		  return $query->result();
	}

	public function daftarpengeluaran_periodelalu($tanggal_mulai,$id_opd)
	{

		$year = date("Y", strtotime($tanggal_mulai));

		$id_opd = $this->session->userdata('id_opd');
		$sql="
		SELECT 
		tbl_sppd.id_sppd,
		tbl_sppd.no_sppd,
		tbl_sppd.tanggal_sppd,
		tbl_sppd.tanggal_berangkat,
		tbl_sppd.tanggal_kembali,
		tbl_sppd.kota_berangkat,
		tbl_sppd.kota_tujuan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nama AS nama,
		tbl_ssh_sppd.jenis_pengeluaran,
		tbl_ssh_sppd.keterangan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nama AS nama,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_bisnis_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_ekonomi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS transportasi_darat_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS taksi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_penginapan_ada_bukti,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Representasi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_representasi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Kontibusi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_kontibusi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Harian' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_harian,
		
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_bisnis_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_ekonomi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS transportasi_darat_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS taksi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS biaya_penginapan_no_bukti
		
		
		FROM `tbl_daftarpengeluaranrill`
		join tbl_detailsppd on tbl_detailsppd.id_detailsppd = tbl_daftarpengeluaranrill.id_detailsppd
		join tbl_sppd on tbl_sppd.id_sppd = tbl_detailsppd.id_sppd  
		join tbl_ssh_sppd on tbl_ssh_sppd.id_ssh_sppd = tbl_daftarpengeluaranrill.uraian
		join tbl_pegawai on tbl_pegawai.nip = tbl_detailsppd.nip
		WHERE tbl_pegawai.id_opd = '$id_opd' AND (tbl_sppd.tanggal_sppd < '$tanggal_mulai' AND tbl_sppd.tanggal_sppd >= '$year-01-01')
		GROUP BY tbl_daftarpengeluaranrill.id_detailsppd
		ORDER BY tbl_daftarpengeluaranrill.id_detailsppd
		
		";
		  $query = $this->db->query($sql);
		  return $query->result();
	}

	public function daftarpengeluaran_periodeini($tanggal_sampai,$id_opd)
	{
		$year = date("Y", strtotime($tanggal_sampai));

		$id_opd = $this->session->userdata('id_opd');
		$sql="
		SELECT 
		tbl_sppd.id_sppd,
		tbl_sppd.no_sppd,
		tbl_sppd.tanggal_sppd,
		tbl_sppd.tanggal_berangkat,
		tbl_sppd.tanggal_kembali,
		tbl_sppd.kota_berangkat,
		tbl_sppd.kota_tujuan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nama AS nama,
		tbl_ssh_sppd.jenis_pengeluaran,
		tbl_ssh_sppd.keterangan,
		tbl_detailsppd.no_bku,
		tbl_pegawai.nama AS nama,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_bisnis_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS tiket_pesawat_ekonomi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS transportasi_darat_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS taksi_ada_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_penginapan_ada_bukti,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Representasi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_representasi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Kontibusi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS biaya_kontibusi,
		
		SUM(CASE When tbl_ssh_sppd.jenis_pengeluaran = 'Uang Harian' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah Else 0 End) AS uang_harian,
		
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Bisnis' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_bisnis_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Tiket Pesawat Ekonomi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS tiket_pesawat_ekonomi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Transportasi Darat' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS transportasi_darat_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Taksi' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS taksi_no_bukti,
		
		SUM(CASE When tbl_daftarpengeluaranrill.bukti = 'Tidak Ada' AND tbl_ssh_sppd.jenis_pengeluaran = 'Biaya Penginapan' 
		THEN tbl_daftarpengeluaranrill.harga_rill * tbl_daftarpengeluaranrill.jumlah * 0.3  Else 0 End) AS biaya_penginapan_no_bukti
		
		
		FROM `tbl_daftarpengeluaranrill`
		join tbl_detailsppd on tbl_detailsppd.id_detailsppd = tbl_daftarpengeluaranrill.id_detailsppd
		join tbl_sppd on tbl_sppd.id_sppd = tbl_detailsppd.id_sppd  
		join tbl_ssh_sppd on tbl_ssh_sppd.id_ssh_sppd = tbl_daftarpengeluaranrill.uraian
		join tbl_pegawai on tbl_pegawai.nip = tbl_detailsppd.nip
		WHERE tbl_pegawai.id_opd = '$id_opd' AND (tbl_sppd.tanggal_sppd <= '$tanggal_sampai' AND tbl_sppd.tanggal_sppd >= '$year-01-01')
		GROUP BY tbl_daftarpengeluaranrill.id_detailsppd
		ORDER BY tbl_daftarpengeluaranrill.id_detailsppd
		
		";
		  $query = $this->db->query($sql);
		  return $query->result();
	}

	public function daftarpengeluarantransportasiudara($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		$this->db->where('tbl_sppd.tanggal_sppd >=', $tanggal_mulai);
		$this->db->where('tbl_sppd.tanggal_sppd <=', $tanggal_sampai);
		$this->db->where('tbl_sppd.id_opd', $id_opd);
        return $this->db->from('tbl_detail_tiketpesawat')
			->join('tbl_daftarpengeluaranrill','tbl_daftarpengeluaranrill.id_daftarpengeluaranrill=tbl_detail_tiketpesawat.id_daftarpengeluaranrill')
			->join('tbl_detailsppd','tbl_detailsppd.id_detailsppd=tbl_daftarpengeluaranrill.id_detailsppd')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->get();
	}

	
	public function daftarpengeluaranpenginapan($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		$this->db->where('tbl_sppd.tanggal_sppd >=', $tanggal_mulai);
		$this->db->where('tbl_sppd.tanggal_sppd <=', $tanggal_sampai);
		$this->db->where('tbl_sppd.id_opd', $id_opd);
        return $this->db->from('tbl_detail_penginapan')
			->join('tbl_daftarpengeluaranrill','tbl_daftarpengeluaranrill.id_daftarpengeluaranrill=tbl_detail_penginapan.id_daftarpengeluaranrill')
			->join('tbl_detailsppd','tbl_detailsppd.id_detailsppd=tbl_daftarpengeluaranrill.id_detailsppd')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->get();
	}

	public function cetaksppddalam($tanggal_mulai,$tanggal_sampai,$id_opd)
	{
		
		$this->db->select('*');
		$this->db->select('tbl_detailsppd.nip AS nippelaksana');
		$this->db->where('tbl_sppd.tanggal_sppd >=', $tanggal_mulai);
		$this->db->where('tbl_sppd.tanggal_sppd <=', $tanggal_sampai);
		$this->db->where('tbl_sppd.dinas', "Dinas Dalam");
		$this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->get();
	}

	public function cetaksppddalam_periodelalu($tanggal_mulai,$id_opd)
	{
		$awal_tahun = date("Y/01/01",strtotime($tanggal_mulai));
		$this->db->where('tbl_sppd.tanggal_sppd >=', $awal_tahun);
		$this->db->where('tbl_sppd.tanggal_sppd <', $tanggal_mulai);
		$this->db->where('tbl_sppd.dinas', "Dinas Dalam");
		$this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->get();
	}

	public function cetaksppddalam_periodeini($tanggal_sampai,$id_opd)
	{
		$awal_tahun = date("Y/01/01",strtotime($tanggal_sampai));
		$this->db->where('tbl_sppd.tanggal_sppd >=', $awal_tahun);
		$this->db->where('tbl_sppd.tanggal_sppd <=', $tanggal_sampai);
		$this->db->where('tbl_sppd.dinas', "Dinas Dalam");
		$this->db->where('tbl_pegawai.id_opd', $id_opd);
        return $this->db->from('tbl_detailsppd')
			->join('tbl_pegawai','tbl_pegawai.nip=tbl_detailsppd.nip')
			->join('tbl_sppd','tbl_sppd.id_sppd=tbl_detailsppd.id_sppd')
			->get();
	}

	public function Getdetailtiketpesawat($id_daftarpengeluranrill)
	{
		$this->db->where('tbl_detail_tiketpesawat.id_daftarpengeluaranrill', $id_daftarpengeluranrill);
        return $this->db->from('tbl_detail_tiketpesawat')
			->get()
			->result();
	}
	
	public function menambahdatadetailtiketpesawat($data)
	{
		$this->db->insert('tbl_detail_tiketpesawat', $data);
	}

	public function updatedatadetailtiketpesawat($data, $id_daftarpengeluaranrill)
	{
		$this->db->where('id_daftarpengeluaranrill', $id_daftarpengeluaranrill);
		$this->db->update('tbl_detail_tiketpesawat', $data);
	}

	
	public function Getdetailpenginapan($id_daftarpengeluranrill)
	{
		$this->db->where('tbl_detail_penginapan.id_daftarpengeluaranrill', $id_daftarpengeluranrill);
        return $this->db->from('tbl_detail_penginapan')
			->get()
			->result();
	}
	
	public function menambahdatadetailpenginapan($data)
	{
		$this->db->insert('tbl_detail_penginapan', $data);
	}

	public function updatedatadetailpenginapan($data, $id_daftarpengeluaranrill)
	{
		$this->db->where('id_daftarpengeluaranrill', $id_daftarpengeluaranrill);
		$this->db->update('tbl_detail_penginapan', $data);
	}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */