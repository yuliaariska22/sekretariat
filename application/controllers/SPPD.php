<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_login');
		$this->load->model('model_pegawai');
		$this->load->model('model_sppd');
		$this->load->model('model_opd');
		$this->load->model('model_sk');

		$session=$this->session->userdata('nip');
        if(empty($session))
        {
            redirect('login');
        }
	}

	public function index()
	{
		$this->load->view('sppd/home');
	}
	public function pengajuansppd()
	{
		$data['content'] = $this->model_sppd->sppd();
		$this->load->view('sppd/pengajuansppd',$data);
	}

	public function pengajuansppdtambah()
	{
		$this->load->view('sppd/pengajuansppdtambah');
	}

	function action_pengajuansppdtambah()
    {       
        $data = array(
            'tanggal_sppd'=>$this->input->post('tanggal_sppd'),
            'alat_angkut'=>$this->input->post('alat_angkut'),
            'alamat_berangkat'=>$this->input->post('alamat_berangkat'),
            'kota_berangkat'=>$this->input->post('kota_berangkat'),
            'alamat_tujuan'=>$this->input->post('alamat_tujuan'),
            'kota_tujuan'=>$this->input->post('kota_tujuan'),
            'tanggal_berangkat'=>$this->input->post('tanggal_berangkat'),
            'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
            'pembebanan_anggaran'=>$this->input->post('pembebanan_anggaran'),
            'keterangan_lain'=>$this->input->post('keterangan_lain'),
            'dinas'=>$this->input->post('dinas'),
            'no_spt'=>$this->input->post('no_spt'),
            'no_sppd'=>$this->input->post('no_sppd'),
            'no_kwitansi'=>$this->input->post('no_kwitansi'),
            'no_daftarpembayaran'=>$this->input->post('no_daftarpembayaran')
		);         
        $data['id_opd']=$this->session->userdata('id_opd');
        $data['nip']=$this->session->userdata('nip');
		$this->model_sppd->menambahdatasppd($data);
		redirect('sppd/pengajuansppd','refresh');
	}

	function updatesppd($id_sppd = NULL)
    {
			$data['content'] = $this->model_sppd->getupdatesppd($id_sppd);
			$this->load->view('sppd/pengajuansppdedit', $data);
	}
	
    function action_updatesppd($id_sppd ='')
    {
        $data = array(
            'tanggal_sppd'=>$this->input->post('tanggal_sppd'),
            'alat_angkut'=>$this->input->post('alat_angkut'),
            'alamat_berangkat'=>$this->input->post('alamat_berangkat'),
            'kota_berangkat'=>$this->input->post('kota_berangkat'),
            'alamat_tujuan'=>$this->input->post('alamat_tujuan'),
            'kota_tujuan'=>$this->input->post('kota_tujuan'),
            'tanggal_berangkat'=>$this->input->post('tanggal_berangkat'),
            'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
            'pembebanan_anggaran'=>$this->input->post('pembebanan_anggaran'),
            'keterangan_lain'=>$this->input->post('keterangan_lain'),
            'dinas'=>$this->input->post('dinas'),
            'no_spt'=>$this->input->post('no_spt'),
            'no_sppd'=>$this->input->post('no_sppd'),
            'no_kwitansi'=>$this->input->post('no_kwitansi'),
            'no_daftarpembayaran'=>$this->input->post('no_daftarpembayaran')
        );
        $this->model_sppd->updatesppd($data, $id_sppd);
        redirect('sppd/pengajuansppd','refresh');
	}

	public function action_deletesppd($id_sppd = '')
	{
		$this->model_sppd->deletesppd($id_sppd);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function detailsppd($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detailsppd($id_sppd);
		$this->load->view('sppd/detailsppd',$data);
	}

	function action_detailsppdtambah()
    {       
        $data = array(
            'nip'=>$this->input->post('nip'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatadetailsppd($data);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function action_deletedetailsppd($id_detailsppd = '')
	{
		$this->model_sppd->deletedetailsppd($id_detailsppd);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function detailsppdpengikut($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detailsppdpengikut($id_sppd);
		$this->load->view('sppd/detailsppdpengikut',$data);
	}

	function action_detailsppdpengikuttambah()
    {       
        $data = array(
            'nama'=>$this->input->post('nama'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatadetailsppdpengikut($data);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function action_deletedetailsppdpengikut($id_detailsppdpengikut = '')
	{
		$this->model_sppd->deletedetailsppdpengikut($id_detailsppdpengikut);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function detailsppdtujuan($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detailsppdtujuan($id_sppd);
		$this->load->view('sppd/detailsppdtujuan',$data);
	}

	function action_detailsppdtujuantambah()
    {       
        $data = array(
            'tujuan'=>$this->input->post('tujuan'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatadetailsppdtujuan($data);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function action_deletedetailsppdtujuan($id_detailsppdtujuan = '')
	{
		$this->model_sppd->deletedetailsppdtujuan($id_detailsppdtujuan);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function detailsppddasar($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detailsppddasar($id_sppd);
		$this->load->view('sppd/detailsppddasar',$data);
	}

	function action_detailsppddasartambah()
    {       
        $data = array(
            'dasar'=>$this->input->post('dasar'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatadetailsppddasar($data);
		redirect('sppd/pengajuansppd','refresh');
	}

	public function action_deletedetailsppddasar($id_detailsppddasar = '')
	{
		$this->model_sppd->deletedetailsppddasar($id_detailsppddasar);
		redirect('sppd/pengajuansppd','refresh');
	}


	function cetakspt($id_sppd ='',$tanggal_sppd ='')
    {
			$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
			$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
			$data['cetakdetailsppd']= $this->model_sppd->cetakdetailspt($id_sppd);
			$data['cetakdetailsppddasar']= $this->model_sppd->cetakdetailsppddasar($id_sppd);
			$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuan($id_sppd);

			$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
			$this->load->view('sppd/cetakspt', $data);
	}

	function cetaksppd($id_sppd ='',$tanggal_sppd ='')
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailspt($id_sppd);
		$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuansatu($id_sppd);
		
		$data['cetakdetailsppdpengikut']= $this->model_sppd->cetakdetailsppdpengikut($id_sppd);

		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$this->load->view('sppd/cetaksppd', $data);
	}

	function cetakkwitansi($id_sppd ='',$tanggal_sppd ='')
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailspt($id_sppd);
		$data['cetakdetailbiaya']= $this->model_sppd->cetakdetailbiaya($id_sppd);
		
		$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuansatu($id_sppd);


		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sppd);
		$data['pelaksana'] = $this->model_sppd->pelaksana();
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$this->load->view('sppd/cetakkwitansi', $data);
	}

	function cetakkwitansidinasdalam($id_sppd ='',$tanggal_sppd ='')
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailspt($id_sppd);
		$data['cetakdetailbiaya']= $this->model_sppd->cetakdetailbiaya($id_sppd);
		
		$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuansatu($id_sppd);


		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sppd);
		$data['pelaksana'] = $this->model_sppd->pelaksana();
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$this->load->view('sppd/cetakkwitansidinasdalam', $data);
	}
	function cetakdaftarpembayaran($id_sppd ='',$tanggal_sppd ='')
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailspt($id_sppd);
		$data['cetakdetailbiaya']= $this->model_sppd->cetakdetailbiaya($id_sppd);
		
		$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuansatu($id_sppd);


		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sppd);
		$data['pelaksana'] = $this->model_sppd->pelaksana();
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$this->load->view('sppd/cetakdaftarpembayaran', $data);
	}

	public function laporansppd()
	{
		$this->load->view('sppd/laporansppd');
	}

	public function updatelaporanmaksud($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detaillaporanmaksud($id_sppd);
		$this->load->view('sppd/updatelaporanmaksud',$data);
	}

	function action_laporanmaksudtambah()
    {       
        $data = array(
            'maksud'=>$this->input->post('maksud'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatalaporanmaksud($data);
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	public function action_deletelaporanmaksud($id_laporanmaksud = '')
	{
		$this->model_sppd->deletelaporanmaksud($id_laporanmaksud);
		redirect('sppd/laporanperjalanandinas','refresh');
	}


	public function laporanperjalanandinas()
	{
		$data['content'] = $this->model_sppd->sppdperorangan();
		$this->load->view('sppd/laporanperjalanandinas', $data);
	}

	public function updatelaporan($id_sppd = '')
	{
		$data['id_sppd'] = $id_sppd;
		$data['content'] = $this->model_sppd->detaillaporan($id_sppd);
		$this->load->view('sppd/updatelaporan',$data);
	}

	function action_laporanperjalanandinastambah()
    {       
        $data = array(
            'isi'=>$this->input->post('isi'),
            'id_sppd'=>$this->input->post('id_sppd')
		);         
		$this->model_sppd->menambahdatalaporanperjalanandinas($data);
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	public function action_deletelaporanperjalanandinas($id_laporanperjalanandinas = '')
	{
		$this->model_sppd->deletelaporanperjalanandinas($id_laporanperjalanandinas);
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	public function updatedaftarpengeluaranrill($id_detailsppd = '')
	{
		$data['id_detailsppd'] = $id_detailsppd;
		$data['content'] = $this->model_sppd->detaildaftarpengeluaranrill($id_detailsppd);
		$this->load->view('sppd/updatedaftarpengeluaranrill',$data);
	}

	function action_daftarpengeluaranrilltambah()
    {       

		$result = $this->input->post('uraian');
        $result_explode = explode('|', $result);
        $hargassh = $result_explode[1];
        $bukti = $this->input->post('bukti');


        $data = array(
            'jumlah'=>$this->input->post('jumlah'),
            'bukti'=>$this->input->post('bukti'),
            'id_detailsppd'=>$this->input->post('id_detailsppd')
		);         
		$data['uraian']=$result_explode[0];

		if($bukti=='Ada'){
			$data['harga_rill']=$this->input->post('harga_sesuai_bukti');
		}else{
			$data['harga_rill']=$hargassh;
		}

		$this->model_sppd->menambahdatadaftarpengeluaranrill($data);
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	public function action_deletedaftarpengeluaranrill($id_laporanperjalanandinas = '')
	{
		$this->model_sppd->deletedaftarpengeluaranrill($id_laporanperjalanandinas);
		redirect('sppd/laporanperjalanandinas','refresh');
	}


	public function updatedaftarpengeluaran($id_detailsppd = '')
	{
		$data['id_detailsppd'] = $id_detailsppd;
		$data['content'] = $this->model_sppd->detaildaftarpengeluaran($id_detailsppd);

        $datadetailsppd = $this->db->get_where('tbl_daftarpengeluaranrill', ['id_detailsppd' =>$id_detailsppd])->row_array();


		if($datadetailsppd == NULL){
			$this->load->view('sppd/tambahdaftarpengeluaran',$data);
		}else{
			$this->load->view('sppd/updatedaftarpengeluaran',$data);
		}
	}

	function action_daftarpengeluarantambah()
    {       
        $data = array(
            'no_bku'=>$this->input->post('no_bku'),
            'uangharian'=>$this->input->post('uangharian'),
            'representasi'=>$this->input->post('representasi'),
            'tiket_angkutan_darat'=>$this->input->post('tiket_angkutan_darat'),
            'taxi'=>$this->input->post('taxi'),
            'biaya_kontribusi'=>$this->input->post('biaya_kontribusi'),
            'keb_maskapai'=>$this->input->post('keb_maskapai'),
            'keb_kode_booking'=>$this->input->post('keb_kode_booking'),
            'keb_no_tiket'=>$this->input->post('keb_no_tiket'),
            'keb_no_flight'=>$this->input->post('keb_no_flight'),
            'keb_origin'=>$this->input->post('keb_origin'),
            'keb_destination'=>$this->input->post('keb_destination'),
            'keb_tgl_penerbangan'=>$this->input->post('keb_tgl_penerbangan'),
            'keb_basicfare'=>$this->input->post('keb_basicfare'),
            'keb_taxes'=>$this->input->post('keb_taxes'),
            'ked_maskapai'=>$this->input->post('ked_maskapai'),
            'ked_kode_booking'=>$this->input->post('ked_kode_booking'),
            'ked_no_tiket'=>$this->input->post('ked_no_tiket'),
            'ked_no_flight'=>$this->input->post('ked_no_flight'),
            'ked_origin'=>$this->input->post('ked_origin'),
            'ked_destination'=>$this->input->post('ked_destination'),
            'ked_tgl_penerbangan'=>$this->input->post('ked_tgl_penerbangan'),
            'ked_basicfare'=>$this->input->post('ked_basicfare'),
            'ked_taxes'=>$this->input->post('ked_taxes'),
            'nama_hotel'=>$this->input->post('nama_hotel'),
            'alamat_hotel'=>$this->input->post('alamat_hotel'),
            'tgl_check_in'=>$this->input->post('tgl_check_in'),
            'tgl_check_out'=>$this->input->post('tgl_check_out'),
            'no_kamar'=>$this->input->post('no_kamar'),
            'harga_per_malam'=>$this->input->post('harga_per_malam'),
            'no_invoice'=>$this->input->post('no_invoice'),
            'agen_perjalanan'=>$this->input->post('agen_perjalanan'),
            'bukti_pembayaran_hotel'=>$this->input->post('bukti_pembayaran_hotel'),
            'id_detailsppd'=>$this->input->post('id_detailsppd')
		);         

		$id_detailsppd = $this->input->post('id_detailsppd');
        $datadetailsppd = $this->db->get_where('tbl_daftarpengeluaranrill', ['id_detailsppd' =>$id_detailsppd])->row_array();

		if($datadetailsppd == NULL){
		$this->model_sppd->menambahdatadaftarpengeluaran($data);
		}else{
		$this->model_sppd->updatedatadaftarpengeluaran($data,$id_detailsppd);
		}
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	function cetaklaporanperjalanandinas($id_sppd = NULL, $tanggal_sppd = NULL)
    {
			$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
			$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
			$data['cetakdetailsppd']= $this->model_sppd->cetakdetailsppd($id_sppd);
			$data['cetakdetaillaporan']= $this->model_sppd->cetakdetaillaporan($id_sppd);
			$data['cetakdetailsppddasar']= $this->model_sppd->cetakdetailsppddasar($id_sppd);
			$data['cetakdetailsppdtujuan']= $this->model_sppd->cetakdetailsppdtujuansatu($id_sppd);
			$data['cetaklaporanmaksud']= $this->model_sppd->cetaklaporanmaksud($id_sppd);

			$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
			$this->load->view('sppd/cetaklaporanperjalanandinas', $data);
	}

	function cetakrincianpembayaranrampung($id_sppd = NULL, $tanggal_sppd = NULL)
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailsppd($id_sppd);
		$data['cetakdetailbiaya']= $this->model_sppd->cetakdetailbiaya($id_sppd);

		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sppd);
		$data['pelaksana'] = $this->model_sppd->pelaksana();

		$this->load->view('sppd/cetakrincianpembayaranrampung', $data);
	}

	function cetakdaftarpengeluaranrill($id_sppd = NULL, $tanggal_sppd = NULL)
    {
		$data['kopsuratsppd']= $this->model_opd->kopsuratsppd($id_sppd);
		$data['cetaksppd']= $this->model_sppd->cetaksppd($id_sppd);
		$data['cetakdetailsppd']= $this->model_sppd->cetakdetailsppd($id_sppd);
		$data['cetakdetailbiayarill']= $this->model_sppd->cetakdetailbiayarill($id_sppd);

		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sppd);
		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sppd);
		$data['ppk'] = $this->model_sk->ppk($tanggal_sppd);
		$data['pelaksana'] = $this->model_sppd->pelaksana();
			$this->load->view('sppd/cetakdaftarpengeluaranrill', $data);
	}

	public function rekapitulasisppd()
	{
		$this->load->view('sppd/rekapitulasisppd');
	}

	public function cetakrekapitulasisppd()
	{
		$id_opd = $this->session->userdata('id_opd');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_sampai = $this->input->post('tanggal_sampai');

		
		$data['opd'] = $this->model_opd->opd($id_opd);
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaransampai($tanggal_sampai);
		$data['bendahara'] = $this->model_sk->bendaharasampai($tanggal_sampai);
		$data['daftarpengeluaran'] = $this->model_sppd->daftarpengeluaran($tanggal_mulai,$tanggal_sampai,$id_opd);
		$data['daftarpengeluaran_periodelalu'] = $this->model_sppd->daftarpengeluaran_periodelalu($tanggal_mulai,$id_opd);
		$data['daftarpengeluaran_periodeini'] = $this->model_sppd->daftarpengeluaran_periodeini($tanggal_sampai,$id_opd);
		$this->load->view('sppd/cetakrekapitulasisppd',$data);
	}

	public function rekapitulasisppdtransportasiudara()
	{
		$this->load->view('sppd/rekapitulasisppdtransportasiudara');
	}

	public function cetakrekapitulasisppdtransportasiudara()
	{
		$id_opd = $this->session->userdata('id_opd');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_sampai = $this->input->post('tanggal_sampai');

		
		$data['opd'] = $this->model_opd->opd($id_opd);
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sampai);
		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sampai);
		$data['daftarpengeluarantransportasiudara'] = $this->model_sppd->daftarpengeluarantransportasiudara($tanggal_mulai,$tanggal_sampai,$id_opd);
		$this->load->view('sppd/cetakrekapitulasisppdtransportasiudara',$data);
	}

	public function rekapitulasibiayapenginapan()
	{
		$this->load->view('sppd/rekapitulasibiayapenginapan');
	}

	public function cetakrekapitulasibiayapenginapan()
	{
		$id_opd = $this->session->userdata('id_opd');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_sampai = $this->input->post('tanggal_sampai');

		
		$data['opd'] = $this->model_opd->opd($id_opd);
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sampai);
		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sampai);
		$data['daftarpengeluaranpenginapan'] = $this->model_sppd->daftarpengeluaranpenginapan($tanggal_mulai,$tanggal_sampai,$id_opd);
		$this->load->view('sppd/cetakrekapitulasibiayapenginapan',$data);
	}

	public function rekapitulasisppddalamdaerah()
	{
		$this->load->view('sppd/rekapitulasisppddalamdaerah');
	}

	public function cetakrekapitulasisppddalamdaerah()
	{
		$id_opd = $this->session->userdata('id_opd');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_sampai = $this->input->post('tanggal_sampai');

		
		$data['opd'] = $this->model_opd->opd($id_opd);
		$data['penggunaanggaran'] = $this->model_sk->penggunaanggaran($tanggal_sampai);
		$data['bendahara'] = $this->model_sk->bendahara($tanggal_sampai);
		$data['cetaksppddalam']= $this->model_sppd->cetaksppddalam($tanggal_mulai,$tanggal_sampai,$id_opd);
		$data['cetaksppddalam_periodelalu']= $this->model_sppd->cetaksppddalam_periodelalu($tanggal_mulai,$id_opd);
		$data['cetaksppddalam_periodeini']= $this->model_sppd->cetaksppddalam_periodeini($tanggal_sampai,$id_opd);
		$this->load->view('sppd/cetakrekapitulasisppddalamdaerah',$data);
	}

	public function tiketpesawat($id_daftarpengeluranrill)
	{
		$data['content'] = $this->model_sppd->Getdetailtiketpesawat($id_daftarpengeluranrill);

		if ($data['content'] == NULL ) {
        $this->load->view('sppd/tambahdetailtiketpesawat');
		}else{
		$this->load->view('sppd/detailtiketpesawat', $data);
		}
	}

	
	function action_tambahdetailtiketpesawat()
    {       
        $data = array(
            'keb_maskapai'=>$this->input->post('keb_maskapai'),
            'keb_kode_booking'=>$this->input->post('keb_kode_booking'),
            'keb_no_tiket'=>$this->input->post('keb_no_tiket'),
            'keb_no_flight'=>$this->input->post('keb_no_flight'),
            'keb_origin'=>$this->input->post('keb_origin'),
            'keb_destination'=>$this->input->post('keb_destination'),
            'keb_tgl_penerbangan'=>$this->input->post('keb_tgl_penerbangan'),
            'keb_basicfare'=>$this->input->post('keb_basicfare'),
            'keb_taxes'=>$this->input->post('keb_taxes'),
            'ked_maskapai'=>$this->input->post('ked_maskapai'),
            'ked_kode_booking'=>$this->input->post('ked_kode_booking'),
            'ked_no_tiket'=>$this->input->post('ked_no_tiket'),
            'ked_no_flight'=>$this->input->post('ked_no_flight'),
            'ked_origin'=>$this->input->post('ked_origin'),
            'ked_destination'=>$this->input->post('ked_destination'),
            'ked_tgl_penerbangan'=>$this->input->post('ked_tgl_penerbangan'),
            'ked_basicfare'=>$this->input->post('ked_basicfare'),
            'ked_taxes'=>$this->input->post('ked_taxes'),
            'bukti_pembayaran'=>$this->input->post('bukti_pembayaran'),
            'id_daftarpengeluaranrill'=>$this->input->post('id_daftarpengeluaranrill')
		);         

		$id_daftarpengeluaranrill = $this->input->post('id_daftarpengeluaranrill');
        $datadetailtiketpesawat = $this->db->get_where('tbl_detail_tiketpesawat', ['id_daftarpengeluaranrill' =>$id_daftarpengeluaranrill])->row_array();

		if($datadetailtiketpesawat == NULL){
		$this->model_sppd->menambahdatadetailtiketpesawat($data);
		}else{
		$this->model_sppd->updatedatadetailtiketpesawat($data,$id_daftarpengeluaranrill);
		}
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	public function penginapan($id_daftarpengeluranrill)
	{
		$data['content'] = $this->model_sppd->Getdetailpenginapan($id_daftarpengeluranrill);

		if ($data['content'] == NULL ) {
        $this->load->view('sppd/tambahdetailpenginapan');
		}else{
		$this->load->view('sppd/detailpenginapan', $data);
		}
	}

	
	function action_tambahdetailpenginapan()
    {       
        $data = array(
            'nama_hotel'=>$this->input->post('nama_hotel'),
            'alamat_hotel'=>$this->input->post('alamat_hotel'),
            'tgl_check_in'=>$this->input->post('tgl_check_in'),
            'tgl_check_out'=>$this->input->post('tgl_check_out'),
            'no_kamar'=>$this->input->post('no_kamar'),
            'no_invoice'=>$this->input->post('no_invoice'),
            'agen_perjalanan'=>$this->input->post('agen_perjalanan'),
            'id_daftarpengeluaranrill'=>$this->input->post('id_daftarpengeluaranrill')
		);         

		$id_daftarpengeluaranrill = $this->input->post('id_daftarpengeluaranrill');
        $datadetailpenginapan = $this->db->get_where('tbl_detail_penginapan', ['id_daftarpengeluaranrill' =>$id_daftarpengeluaranrill])->row_array();

		if($datadetailpenginapan == NULL){
		$this->model_sppd->menambahdatadetailpenginapan($data);
		}else{
		$this->model_sppd->updatedatadetailpenginapan($data,$id_daftarpengeluaranrill);
		}
		redirect('sppd/laporanperjalanandinas','refresh');
	}

	function updatedetailsppd($id_detailsppd = NULL)
    {
			$data['content'] = $this->model_sppd->getupdatedetailsppd($id_detailsppd);
			$this->load->view('sppd/detailsppdedit', $data);
	}
	
    function action_updatedetailsppd($id_detailsppd ='')
    {
		$id_detailsppd = $this->input->post('id_detailsppd');
        $data = array(
            'no_bku'=>$this->input->post('no_bku'),
        );
        $this->model_sppd->updatedetailsppd($data, $id_detailsppd);
        redirect('sppd/pengajuansppd','refresh');
	}
}
