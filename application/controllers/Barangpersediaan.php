<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangpersediaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Model_laporanbarangpersediaan');
		$this->load->model('Model_pengadaan');
		$this->load->model('Model_pengadaanfix');
		$this->load->model('Model_penyaluran');
		$this->load->model('Model_suratpenyaluran');

		$session=$this->session->userdata('nip');
        if(empty($session))
        {
            redirect('login');
        }
	}

    // Pengadaan

    function pengajuanpengadaan()
	{
        $data['content'] = $this->Model_pengadaan->Getpengadaan();
        $this->load->view('barangpersediaan/pengadaan/pengadaan', $data);
	}

	function pengadaanselesai()
	{
        $data['content'] = $this->Model_pengadaan->Getpengadaanselesai();
        $this->load->view('barangpersediaan/pengadaan/pengadaanselesai', $data);
	}

   	function menambahdatapengadaan()
		{
			$this->load->view('barangpersediaan/pengadaan/add');   
		}
	
	function action_menambahdatapengadaan()
    {       
            $data = array(
			'jenis_mutasi'=>$this->input->post('jenis_mutasi'),
            'tanggal_pesan'=>$this->input->post('tanggal_pesan'),
			'id_rekanan'=>$this->input->post('id_rekanan'),
			'id_bidang_opd'=>$this->input->post('id_bidang_opd'),
            'keterangan'=>$this->input->post('keterangan'),            
            'statusorder'=>$this->input->post('statusorder'),
            'username'=>$this->input->post('username'),
            'id_opd'=>$this->input->post('id_opd')
					);
					$data['jenis_mutasi'] = "Pengadaan";
					$data['keterangan'] = "Menunggu Konfirmasi";
					$data['statusorder'] = "-";
					$data['username'] = $this->session->userdata('nip');
					$data['id_opd'] = $this->session->userdata('id_opd');
					
					$this->Model_pengadaan->menambahdatapengadaan($data);
					redirect('barangpersediaan/pengajuanpengadaan','refresh');
	}
	

	public function action_deletedatapengadaan($id_pengadaan = '')
	{
			$this->Model_pengadaan->deletedatapengadaan($id_pengadaan);
			redirect('barangpersediaan/pengajuanpengadaan','refresh');
	}

    // Detail Pengadaan

    function detailpengadaan($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_pengadaan->Tampildetailpengadaan($id_mutasi);
			$this->load->view('barangpersediaan/detailpengadaan/detailpengadaan',$data);
	}

    function detailpengadaanselesai($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_pengadaan->Tampildetailpengadaan($id_mutasi);
			$this->load->view('barangpersediaan/detailpengadaan/detailpengadaanselesai',$data);
	}
	
	function tambahdetailpengadaan()
		{
            $data['hasilparsing'] = $this->uri->segment(3);
            $this->load->view('barangpersediaan/detailpengadaan/add',$data); 
		}
		
	
	function simpan_detailpengadaan($hasilparsing)
    {

            $result = $this->input->post('id_ssh');
            $result_explode = explode('|', $result);
            $hargassh = $result_explode[1];
            $hargasatuanrekanan = $this->input->post('hargasatuanrekanan');
            //echo "Model: ". $result_explode[0]."<br />";
            //echo "Colour: ". $result_explode[1]."<br />";


       $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'total_barang_in'=>$this->input->post('total_barang_in'),
            'username'=>$this->input->post('username')
        );
        if($hargasatuanrekanan<=$hargassh){
            $data['hargasatuanrekanan'] = $hargasatuanrekanan;
        }else{
            $data['hargasatuanrekanan'] = 0;
        }
        $data['id_ssh'] = $result_explode[0];
        $data['id_mutasi'] = $hasilparsing;
        $data['username'] = $this->session->userdata('nip');
        $this->db->insert('tbl_detailmutasisementara',$data);
    
        $data2 =array(
            'keterangan'=>$this->input->post('keterangan'),
            'statusorder'=>$this->input->post('statusorder')
        );
        $data2['keterangan'] = "Menunggu Konfirmasi";
        $data2['statusorder'] = "-";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);
        redirect('barangpersediaan/detailpengadaan/'.$hasilparsing);
    

	}

	function updatedetailpengadaan($id_detailmutasisementara)
    {
        $data['hasilparsing'] = $this->uri->segment(4);
        $data['ambil']=$this->Model_pengadaan->Getid_detailpengadaan($id_detailmutasisementara);
        $this->load->view('barangpersediaan/detailpengadaan/update',$data);
	}
	
    function simpan_updatedetailpengadaan($hasilparsing)
    {
        $result = $this->input->post('id_ssh');
        $result_explode = explode('|', $result);
        $hargassh = $result_explode[1];
        $hargasatuanrekanan = $this->input->post('hargasatuanrekanan');
        //echo "Model: ". $result_explode[0]."<br />";
        //echo "Colour: ". $result_explode[1]."<br />";

        $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'id_ssh'=>$this->input->post('id_ssh'),
            'total_barang_in'=>$this->input->post('total_barang_in'),
            'hargasatuanrekanan'=>$this->input->post('hargasatuanrekanan'),
            'username'=>$this->input->post('username')
        );
        if($hargassh>$hargasatuanrekanan){
            $data['hargasatuanrekanan'] = $hargasatuanrekanan;
        }else{
            $data['hargasatuanrekanan'] = 0;
        }
        $data['id_mutasi'] = $hasilparsing;    
        $data['username'] = $this->session->userdata('nip');
		$id_detailmutasisementara = $this->input->post('id_detailmutasisementara');
		$this->db->where('id_detailmutasisementara', $id_detailmutasisementara);
        $this->db->update('tbl_detailmutasisementara',$data);

        $data2 =array(
            'keterangan'=>$this->input->post('keterangan'),
            'statusorder'=>$this->input->post('statusorder')
        );
        $data2['keterangan'] = "Menunggu Konfirmasi";
        $data2['statusorder'] = "-";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);

        redirect('barangpersediaan/detailpengadaan/'.$hasilparsing);
	}

	function hapusdetailpengadaan($id_detailmutasisementara,$hasilparsing)
    {
        
        $this->Model_pengadaan->Hapusdetailpengadaan($id_detailmutasisementara);
        redirect('barangpersediaan/detailpengadaan/'.$hasilparsing);
    }

    // Pengadaan Fix

    function pengadaanfix()
	{
        $data['content'] = $this->Model_pengadaanfix->Getpengadaan();
        $this->load->view('barangpersediaan/pengadaanfix/pengadaanfix', $data);
	}

	function pengadaanfixselesai()
	{
        $data['content'] = $this->Model_pengadaanfix->Getpengadaanselesai();
        $this->load->view('barangpersediaan/pengadaanfix/pengadaanfixselesai', $data);
	}

   	function menambahdatapengadaanfix()
		{
			$this->load->view('barangpersediaan/pengadaanfix/add');   
		}
	
	function action_menambahdatapengadaanfix()
    {       
            $data = array(
			'jenis_mutasi'=>$this->input->post('jenis_mutasi'),
            'tanggal_pesan'=>$this->input->post('tanggal_pesan'),
			'id_rekanan'=>$this->input->post('id_rekanan'),
            'keterangan'=>$this->input->post('keterangan'),            
            'statusorder'=>$this->input->post('statusorder'),
            'username'=>$this->input->post('username'),
            'id_opd'=>$this->input->post('id_opd')
					);
					$data['jenis_mutasi'] = "pengadaanfix";
					$data['keterangan'] = "Menunggu Konfirmasi";
					$data['statusorder'] = "-";
					$data['username'] = $this->session->userdata('nip');
					$data['id_opd'] = $this->session->userdata('id_opd');
					
					$this->Model_pengadaanfix->menambahdatapengadaanfix($data);
					redirect('barangpersediaan/pengadaanfix','refresh');
	}

	public function action_deletedatapengadaanfix($id_pengadaanfix = '')
	{
			$this->Model_pengadaanfix->deletedatapengadaanfix($id_pengadaanfix);
			redirect('barangpersediaan/pengadaanfix','refresh');
	}

    // Detail Pengadaan Fix

    function detailpengadaanfix($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_pengadaanfix->Tampildetailpengadaanfix($id_mutasi);
			$this->load->view('barangpersediaan/detailpengadaanfix/detailpengadaanfix',$data);
	}

    function detailpengadaanfixselesai($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_pengadaanfix->Tampildetailpengadaanfix($id_mutasi);
			$this->load->view('barangpersediaan/detailpengadaanfix/detailpengadaanfixselesai',$data);
	}
	
	function tambahdetailpengadaanfix()
		{
            $data['hasilparsing'] = $this->uri->segment(3);
            $this->load->view('barangpersediaan/detailpengadaanfix/add',$data); 
		}
	
	function simpan_detailpengadaanfix($hasilparsing)
    {
       $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'id_ssh'=>$this->input->post('id_ssh'),
            'total_barang_in'=>$this->input->post('total_barang_in'),
            'username'=>$this->input->post('username')
        );
        $data['id_mutasi'] = $hasilparsing;
        $data['username'] = $this->session->userdata('nip');
        $this->db->insert('tbl_detailmutasisementara',$data);
    
        $data2 =array(
            'statusorder'=>$this->input->post('statusorder')
        );
        $data2['statusorder'] = "-";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);


        redirect('barangpersediaan/detailpengadaanfix/'.$hasilparsing);
	}

	function updatedetailpengadaanfix($id_detailmutasisementara)
    {
        $data['hasilparsing'] = $this->uri->segment(4);
        $data['ambil']=$this->Model_pengadaanfix->Getid_detailpengadaanfix($id_detailmutasisementara);
        $this->load->view('barangpersediaan/detailpengadaanfix/update',$data);
	}
	
    function simpan_updatedetailpengadaanfix($hasilparsing)
    {
        $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'id_ssh'=>$this->input->post('id_ssh'),
            'total_barang_in'=>$this->input->post('total_barang_in'),
            'username'=>$this->input->post('username')
        );
        $data['id_mutasi'] = $hasilparsing;    
        $data['username'] = $this->session->userdata('nip');
		$id_detailmutasisementara = $this->input->post('id_detailmutasisementara');
		$this->db->where('id_detailmutasisementara', $id_detailmutasisementara);
        $this->db->update('tbl_detailmutasisementara',$data);

        $data2 =array(
            'statusorder'=>$this->input->post('statusorder')
        );
        $data2['statusorder'] = "-";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);

        redirect('barangpersediaan/detailpengadaanfix/'.$hasilparsing);
	}

	function hapusdetailpengadaanfix($id_detailmutasisementara,$hasilparsing)
    {
        
        $this->Model_pengadaanfix->Hapusdetailpengadaanfix($id_detailmutasisementara);
        redirect('barangpersediaan/detailpengadaanfix/'.$hasilparsing);
    }

    // Konfirmasi Penerimaan Barang

    function pengadaanpbp()
	{
        $data['content'] = $this->Model_pengadaan->GetpengadaanPBP();
        $this->load->view('barangpersediaan/pengadaanpbp/pengadaanpbp', $data);
	}

    function updatestatusorder($id_mutasi)
    {
        $data = array(
            'statusorder'=>$this->input->post('statusorder'),
            'tanggalterimabarang'=>$this->input->post('tanggalterimabarang')
        );
        $data['statusorder'] = "Selesai";
        $data['tanggalterimabarang'] = date("Y-m-d");        
		$id = $this->input->post('id_mutasi');
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('barangpersediaan/pengadaanpbp');
    }

    function lihatlistpengadaan($id_mutasi)
	{
        $data['hasil']=$this->Model_pengadaan->LihatlistpengadaanPBP($id_mutasi);
        $this->load->view('barangpersediaan/pengadaanpbp/lihatlistorder',$data);
	}

	//Laporan

	function laporanpenerimaan()
	{
			$this->load->view('barangpersediaan/laporanpenerimaan');
	}
	
    function printlaporanpenerimaan()
	{   
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil'] = $this->Model_laporanbarangpersediaan->Gettahun_pesanPenerimaan($tanggal_mulai,$tanggal_sampai);
        $this->load->view('barangpersediaan/printlaporanpenerimaan',$data);
	}

	function laporanpengeluaran()
	{
		$this->load->view('barangpersediaan/laporanpengeluaran');
	}
	
    function printlaporanpengeluaran()
	{   
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');
        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil'] = $this->Model_laporanbarangpersediaan->Gettahun_pesanPengeluaran($tanggal_mulai,$tanggal_sampai);
        $this->load->view('barangpersediaan/printlaporanpengeluaran',$data);
	}

	function laporanbuku()
	{
		$this->load->view('barangpersediaan/laporanbuku');
	}
	
    function printlaporanbuku()
	{   
		$tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil']=$this->Model_laporanbarangpersediaan->Gettahun_pesanBuku($tanggal_mulai,$tanggal_sampai);
       $this->load->view('barangpersediaan/printlaporanbuku',$data);
	}

	function laporanrekapitulasi()
	{
		$this->load->view('barangpersediaan/laporanrekapitulasi');
	}
	
    function printlaporanrekapitulasi()
	{   
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil']=$this->Model_laporanbarangpersediaan->Gettahun_pesanRekapitulasi($tanggal_mulai,$tanggal_sampai);
        $this->load->view('barangpersediaan/printlaporanrekapitulasi',$data);
	}

    // Penyaluran

    function penyaluran()
	{
        $data['content'] = $this->Model_penyaluran->Getpenyaluran();
        $this->load->view('barangpersediaan/penyaluran/penyaluran', $data);
	}

	function penyaluranselesai()
	{
        $data['content'] = $this->Model_penyaluran->Getpenyaluranselesai();
        $this->load->view('barangpersediaan/penyaluran/penyaluranselesai', $data);
	}

   	function menambahdatapenyaluran()
		{
			$this->load->view('barangpersediaan/penyaluran/add');   
		}
	
	function action_menambahdatapenyaluran()
    {       
            $data = array(
			'jenis_mutasi'=>$this->input->post('jenis_mutasi'),
            'tanggal_pesan'=>$this->input->post('tanggal_pesan'), 
            'statuspenyaluran'=>$this->input->post('statuspenyaluran'),
            'id_bidang_opd'=>$this->input->post('id_bidang_opd'),
            'username'=>$this->input->post('username'),
            'id_opd'=>$this->input->post('id_opd')
					);
					$data['jenis_mutasi'] = "Penyaluran";
					$data['statuspenyaluran'] = "Belum Diproses";
					$data['username'] = $this->session->userdata('nip');
					$data['id_opd'] = $this->session->userdata('id_opd');
					
					$this->Model_penyaluran->menambahdatapenyaluran($data);
					redirect('barangpersediaan/penyaluran','refresh');
	}
	

	public function action_deletedatapenyaluran($id_mutasi = '')
	{
			$this->Model_penyaluran->deletedatapenyaluran($id_mutasi);
			redirect('barangpersediaan/penyaluran','refresh');
	}

    function laporanbukupeny()
	{
		$this->load->view('barangpersediaan/laporanbukupeny');
	}
	
    function printlaporanbukupeny()
	{   
		$tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil']=$this->Model_laporanbarangpersediaan->Gettahun_pesanBukupeny($tanggal_mulai,$tanggal_sampai);
       $this->load->view('barangpersediaan/printlaporanbukupeny',$data);
	}

    function laporanrekapitulasipeny()
	{
		$this->load->view('barangpersediaan/laporanrekapitulasipeny');
	}
	
    function printlaporanrekapitulasipeny()
	{   
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['atasanlangsung'] = $this->Model_laporanbarangpersediaan->atasanlangsung();
        $data['pejabatpenatausahaanbarang'] = $this->Model_laporanbarangpersediaan->pejabatpenatausahaanbarang();
        $data['pbp'] = $this->Model_laporanbarangpersediaan->pbp();
          
        $data['opd'] = $this->Model_laporanbarangpersediaan->Getopd();
        $data['tanggal_mulai'] =  $tanggal_mulai;
        $data['tanggal_sampai'] =  $tanggal_sampai;
        $data['hasil']=$this->Model_laporanbarangpersediaan->Gettahun_pesanRekapitulasipeny($tanggal_mulai,$tanggal_sampai);
        $this->load->view('barangpersediaan/printlaporanrekapitulasipeny',$data);
	}

    // Detail Penyaluran
    function detailpenyaluran($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_penyaluran->Tampildetailpenyaluran($id_mutasi);
			$this->load->view('barangpersediaan/detailpenyaluran/detailpenyaluran',$data);
	}

    function detailpenyaluranselesai($id_mutasi)
	{
            $data['hasilparsing'] = $this->uri->segment(3);
		    $data['hasil']=$this->Model_penyaluran->Tampildetailpenyaluran($id_mutasi);
			$this->load->view('barangpersediaan/detailpenyaluran/detailpenyaluranselesai',$data);
	}
	
	function tambahdetailpenyaluran()
		{
            $data['hasilparsing'] = $this->uri->segment(3);
            $data['ssh'] = $this->Model_pengadaan->get_detailmutasisementara()->result();
            $this->load->view('barangpersediaan/detailpenyaluran/add',$data); 
		}
	
	function simpan_detailpenyaluran($hasilparsing)
    {
            $result = $this->input->post('id_ssh');
            $result_explode = explode('|', $result);
            //echo $result_explode[0]."<br />";
            //echo $result_explode[1]."<br />";
            // die;

       $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'total_barang_out'=>$this->input->post('total_barang_out'),
            'username'=>$this->input->post('username')
        );
        $data['id_ssh'] = $result_explode[0];
        $data['hargasatuanrekanan'] = $result_explode[1];
        $data['id_mutasi'] = $hasilparsing;
        $data['username'] = $this->session->userdata('nip');
        $this->db->insert('tbl_detailmutasisementara',$data);
    
        $data2 =array(
            'keterangan'=>$this->input->post('keterangan')
        );
        $data2['keterangan'] = "Menunggu Konfirmasi";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);


        redirect('barangpersediaan/detailpenyaluran/'.$hasilparsing);
	}

	function updatedetailpenyaluran($id_detailmutasisementara)
    {
        $data['hasilparsing'] = $this->uri->segment(4);
        $data['ambil']=$this->Model_penyaluran->Getid_detailpenyaluran($id_detailmutasisementara);
        $this->load->view('barangpersediaan/detailpenyaluran/update',$data);
	}
	
    function simpan_updatedetailpenyaluran($hasilparsing)
    {
        $data = array(
			'id_detailmutasisementara'=>$this->input->post('id_detailmutasisementara'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'id_ssh'=>$this->input->post('id_ssh'),
            'total_barang_out'=>$this->input->post('total_barang_out'),
            'username'=>$this->input->post('username')
        );
        $data['id_mutasi'] = $hasilparsing;    
        $data['username'] = $this->session->userdata('nip');
		$id_detailmutasisementara = $this->input->post('id_detailmutasisementara');
		$this->db->where('id_detailmutasisementara', $id_detailmutasisementara);
        $this->db->update('tbl_detailmutasisementara',$data);

        $data2 =array(
            'keterangan'=>$this->input->post('keterangan')
        );
        $data2['keterangan'] = "Menunggu Konfirmasi";
        $this->db->where('id_mutasi', $hasilparsing);
        $this->db->update('tbl_mutasi',$data2);

        redirect('barangpersediaan/detailpenyaluran/'.$hasilparsing);
	}

	function hapusdetailpenyaluran($id_detailmutasisementara,$hasilparsing)
    {
       
        $this->Model_penyaluran->Hapusdetailpenyaluran($id_detailmutasisementara);
        redirect('barangpersediaan/detailpenyaluran/'.$hasilparsing);
    }

    // Konfirmasi Penerimaan Barang

    function penyaluranpbp()
	{
        $data['content'] = $this->Model_penyaluran->GetpenyaluranPBP();
        $this->load->view('barangpersediaan/penyaluranpbp/penyaluranpbp', $data);
	}

    function penyaluranpbpselesai()
	{
        $data['content'] = $this->Model_penyaluran->GetpenyaluranselesaiPBP();
        $this->load->view('barangpersediaan/penyaluranpbp/penyaluranpbpselesai', $data);
	}

    function updateketerangan($id_mutasi)
    {
        $data = array(
            'keterangan'=>$this->input->post('keterangan')
        );
        $data['keterangan'] = "Disetujui";
		$id = $this->input->post('id_mutasi');
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('barangpersediaan/penyaluranpbp');
    }

    function updatestatusorderpenyaluran($id_mutasi)
    {
        $data = array(
            'statuspenyaluran'=>$this->input->post('statuspenyaluran'),
            'tanggalpenyaluran'=>$this->input->post('tanggalpenyaluran')
        );
        $data['statuspenyaluran'] = "Sudah Disalurkan";   
        $data['tanggalpenyaluran'] = date("Y-m-d");   
		$id = $this->input->post('id_mutasi');
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('barangpersediaan/penyaluranpbp');
    }

    function lihatlistpenyaluran($id_mutasi)
	{
        $data['hasil']=$this->Model_penyaluran->LihatlistpenyaluranPBP($id_mutasi);
        $this->load->view('barangpersediaan/penyaluranpbp/lihatlistorder',$data);
	}

    function updateberitaacarapbp($id_mutasi = NULL)
    {
        $data['ambil']=$this->Model_suratpenyaluran->GetId_suratpenyaluran($id_mutasi);
        $this->load->view('barangpersediaan/penyaluranpbp/update',$data);
	}

    function simpan_update_beritaacarapbp()
    {
        $data = array(
		
			'no_bapenyaluranbarang'=>$this->input->post('no_bapenyaluranbarang'),
        
			'tanggal_bapenyaluranbarang'=>$this->input->post('tanggal_bapenyaluranbarang'),
		
        );
        $surat = $this->input->post('surat');
        $id_mutasi = $this->input->post('id_mutasi');
        $tanggal_bapenyaluranbarang = $this->input->post('tanggal_bapenyaluranbarang');

        if (isset($_POST['btnPrint'])){
            $data1['penyaluran']= $this->Model_suratpenyaluran->penyaluran($id_mutasi);
            $detailpenyaluran = $this->Model_suratpenyaluran->detailpenyaluran();
            $data1['penggunabarang'] = $this->Model_suratpenyaluran->penggunabarang($tanggal_bapenyaluranbarang);
            $data1['pejabatpenatausahaanbarang'] = $this->Model_suratpenyaluran->pejabatpenatausahaanbarang($tanggal_bapenyaluranbarang);
            $data1['pbp'] = $this->Model_suratpenyaluran->pbp($tanggal_bapenyaluranbarang);
            
            if ($detailpenyaluran)
            {
                $data1['detailpenyaluran'] = $this->Model_suratpenyaluran->detailpenyaluransurat($id_mutasi);
            }
			$this->load->view('suratpenyaluran/'.$surat,$data1);
		}else{
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('barangpersediaan/penyaluranpbp');
        }
	}

	
}
