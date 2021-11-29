<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->Model('Model_pembebanananggaran');
		$this->load->Model('Model_menu');
		$this->load->Model('Model_sk');
		$this->load->Model('Model_ssh');
		$this->load->Model('Model_spj');
		$this->load->Model('Model_rekanan');

		$session=$this->session->userdata('nip');
        if(empty($session))
        {
            redirect('login');
        }
	}

	public function index()
	{
		$this->load->view('pengaturan/home');
	}

	//Menu

	public function menu()
	{
		$data['content'] = $this->Model_menu->menu();
		$this->load->view('pengaturan/menu',$data);
	}

	public function menutambah()
	{
		$this->load->view('pengaturan/menutambah');
	}

	function action_menutambah()
    {       
        $data = array(
            'nip'=>$this->input->post('nip'),
            'menu'=>$this->input->post('menu')
		);         
		$this->Model_menu->menambahdatamenu($data);
		redirect('pengaturan/menu','refresh');
	}

	function updatemenu($id_menu = NULL)
    {
            $this->db->where('id_menu', $id_menu);
            $data['content'] = $this->db->get('tbl_menu');
			$this->load->view('pengaturan/menuedit', $data);
	}
	
    function action_updatemenu($id_menu ='')
    {
        $data = array(
            'nip'=>$this->input->post('nip'),
            'menu'=>$this->input->post('menu')
        );
        $this->Model_menu->updatemenu($data, $id_menu);
        redirect('pengaturan/menu','refresh');
	}

	public function action_deletemenu($id_menu = '')
	{
		$this->Model_menu->deletemenu($id_menu);
		redirect('pengaturan/menu','refresh');
	}

	//Pembebanan Anggaran

	public function pembebanananggaran()
	{
		$data['content'] = $this->Model_pembebanananggaran->pembebanananggaran();
		$this->load->view('pengaturan/pembebanananggaran',$data);
	}

	public function pembebanananggarantambah()
	{
		$this->load->view('pengaturan/pembebanananggarantambah');
	}

	function action_pembebanananggarantambah()
    {       
        $data = array(
            'instansi'=>$this->input->post('instansi'),
            'mataanggaran'=>$this->input->post('mataanggaran')
		);         
        $data['id_opd']=$this->session->userdata('id_opd');
		$this->Model_pembebanananggaran->menambahdatapembebanananggaran($data);
		redirect('pengaturan/pembebanananggaran','refresh');
	}

	function updatepembebanananggaran($id_pembebanananggaran = NULL)
    {
            $this->db->where('id_pembebanananggaran', $id_pembebanananggaran);
            $data['content'] = $this->db->get('tbl_pembebanananggaran');
			$this->load->view('pengaturan/pembebanananggaranedit', $data);
	}
	
    function action_updatepembebanananggaran($id_pembebanananggaran ='')
    {
        $data = array(
            'instansi'=>$this->input->post('instansi'),
            'mataanggaran'=>$this->input->post('mataanggaran')
        );
        $this->Model_pembebanananggaran->updatepembebanananggaran($data, $id_pembebanananggaran);
        redirect('pengaturan/pembebanananggaran','refresh');
	}

	public function action_deletepembebanananggaran($id_pembebanananggaran = '')
	{
		$this->Model_pembebanananggaran->deletepembebanananggaran($id_pembebanananggaran);
		redirect('pengaturan/pembebanananggaran','refresh');
	}

	//SK

	public function suratkeputusan()
	{
		$data['content'] = $this->Model_sk->suratkeputusan();
		$this->load->view('pengaturan/suratkeputusan',$data);
	}

	public function suratkeputusantambah()
	{
		$this->load->view('pengaturan/suratkeputusantambah');
	}

	function action_suratkeputusantambah()
    {       
        $data = array(
            'no_sk'=>$this->input->post('no_sk'),
            'jabatan_sk'=>$this->input->post('jabatan_sk'),
            'nip'=>$this->input->post('nip'),
            'tanggal_sk'=>$this->input->post('tanggal_sk'),
            'tanggal_skberakhir'=>$this->input->post('tanggal_skberakhir'),
            'gol_sk'=>$this->input->post('gol_sk'),
            'pangkat_sk'=>$this->input->post('pangkat_sk')
		);         
		$data['id_opd'] =  $this->session->userdata('id_opd');
		$this->Model_sk->menambahdatasuratkeputusan($data);
		redirect('pengaturan/suratkeputusan','refresh');
	}

	public function action_deletesuratkeputusan($id = '')
	{
		$this->Model_sk->deletedatasuratkeputusan($id);
		redirect('pengaturan/suratkeputusan','refresh');
	}

	// SSH
	function ssh()
	{
        $data['content'] = $this->db->get('tbl_ssh');
        $this->load->view('pengaturan/ssh/ssh', $data);
	}

   	function menambahdatassh()
		{
			$this->load->view('pengaturan/ssh/add');   
		}
	
	function action_menambahdatassh()
    {       
                    	$data = array(
                            'Kelompok_ssh'=>$this->input->post('Kelompok_ssh'),
                            'Namabarang_ssh'=>$this->input->post('Namabarang_ssh'),
                            'Jenisbarang_ssh'=>$this->input->post('Jenisbarang_ssh'),
                            'Ukuran_ssh'=>$this->input->post('Ukuran_ssh'),
                            'Spesifikasi_ssh'=>$this->input->post('Spesifikasi_ssh'),
                            'Satuan_ssh'=>$this->input->post('Satuan_ssh'),
                            'Hargasatuan_ssh'=>$this->input->post('Hargasatuan_ssh'),
                            'Tahun_ssh'=>$this->input->post('Tahun_ssh')
					);
					$this->Model_ssh->menambahdatassh($data);
					redirect('pengaturan/ssh','refresh');
	}

	function updatedatassh($id_ssh = NULL)
    {
            $this->db->where('id_ssh', $id_ssh);
            $data['content'] = $this->db->get('tbl_ssh');
			$this->load->view('pengaturan/ssh/update', $data);
	}
	
    function action_updatedatassh($id_ssh ='')
    {
        $data = array(
            'Kelompok_ssh'=>$this->input->post('Kelompok_ssh'),
            'Namabarang_ssh'=>$this->input->post('Namabarang_ssh'),
            'Jenisbarang_ssh'=>$this->input->post('Jenisbarang_ssh'),
            'Ukuran_ssh'=>$this->input->post('Ukuran_ssh'),
            'Spesifikasi_ssh'=>$this->input->post('Spesifikasi_ssh'),
            'Satuan_ssh'=>$this->input->post('Satuan_ssh'),
            'Hargasatuan_ssh'=>$this->input->post('Hargasatuan_ssh'),
            'Tahun_ssh'=>$this->input->post('Tahun_ssh')
        );
		
        $this->Model_ssh->updatedatassh($data, $id_ssh);
        redirect('pengaturan/ssh');
	}

	public function action_deletedatassh($id_ssh = '')
	{
			$this->Model_ssh->deletedatassh($id_ssh);
			redirect('pengaturan/ssh','refresh');
	}
	

	// REKANAN
	function rekanan()
	{
        $data['content'] = $this->Model_rekanan->Tampilrekanan();
        $this->load->view('pengaturan/rekanan/rekanan', $data);
	}

   	function menambahdatarekanan()
		{
			$this->load->view('pengaturan/rekanan/add');   
		}
	
	function action_menambahdatarekanan()
    {       
		$nama_rekanan = $this->input->post('nama_rekanan');
        $this->db->from('tbl_rekanan');
        $this->db->where('nama_rekanan', $nama_rekanan);
        $query = $this->db->get();  
        $rowcount = $query->num_rows();
 
        if ($rowcount>0){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Nama Rekanan sudah Terdaftar</div>');
					redirect('rekanan','refresh');
        }else{
                    	$data = array(
                            'nama_pimpinan'=>$this->input->post('nama_pimpinan'),
                            'nama_rekanan'=>$this->input->post('nama_rekanan'),
                            'alamat_rekanan'=>$this->input->post('alamat_rekanan'),
							'npwp_rekanan'=>$this->input->post('npwp_rekanan'),
							'rekening_rekanan'=>$this->input->post('rekening_rekanan')
						);
					$this->Model_rekanan->menambahdatarekanan($data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Rekanan Berhasil di Tambah</div>');
					redirect('pengaturan/rekanan','refresh');
		}
	}

	function updatedatarekanan($id_rekanan = NULL)
    {
        $this->db->where('id_rekanan', $id_rekanan);
            $data['content'] = $this->db->get('tbl_rekanan');
			$this->load->view('pengaturan/rekanan/update', $data);
	}
	
    function action_updatedatarekanan($id_rekanan ='')
    {
        $data = array(
            'nama_pimpinan'=>$this->input->post('nama_pimpinan'),
            'nama_rekanan'=>$this->input->post('nama_rekanan'),
            'alamat_rekanan'=>$this->input->post('alamat_rekanan'),
            'npwp_rekanan'=>$this->input->post('npwp_rekanan'),
            'rekening_rekanan'=>$this->input->post('rekening_rekanan')
        );	
        $this->Model_rekanan->updatedatarekanan($data, $id_rekanan);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Rekanan berhasil diubah</div>');
        redirect('pengaturan/rekanan');
	}

	public function action_deletedatarekanan($id_rekanan = '')
	{
			$this->Model_rekanan->deletedatarekanan($id_rekanan);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Rekanan berhasil dihapus</div>');
			redirect('pengaturan/rekanan','refresh');
	}

	// SATUAN HARGA REKANAN atau spj

	function spj()
	{
        $data['content'] = $this->db->get('tbl_ssh');
        $this->load->view('pengaturan/spj/spj', $data);
	}

   	function menambahdataspj()
		{
			$this->load->view('pengaturan/spj/add');   
		}
	
	function action_menambahdataspj()
    {       
                    	$data = array(
                            'Kelompok_spj'=>$this->input->post('Kelompok_spj'),
                            'Namabarang_ssh'=>$this->input->post('Namabarang_ssh'),
                            'Jenisbarang_spj'=>$this->input->post('Jenisbarang_spj'),
                            'Ukuran_spj'=>$this->input->post('Ukuran_spj'),
                            'Spesifikasi_ssh'=>$this->input->post('Spesifikasi_ssh'),
                            'Satuan_ssh'=>$this->input->post('Satuan_ssh'),
                            'Hargasatuan_ssh'=>$this->input->post('Hargasatuan_ssh'),
                            'Tahun_spj'=>$this->input->post('Tahun_spj')
					);
					$this->Model_spj->menambahdataspj($data);
					redirect('pengaturan/spj','refresh');
	}

	function updatedataspj($id_ssh = NULL)
    {
            $this->db->where('id_ssh', $id_ssh);
            $data['content'] = $this->db->get('tbl_ssh');
			$this->load->view('pengaturan/spj/update', $data);
	}
	
    function action_updatedataspj($id_ssh ='')
    {
        $data = array(
            'Kelompok_spj'=>$this->input->post('Kelompok_spj'),
            'Namabarang_ssh'=>$this->input->post('Namabarang_ssh'),
            'Jenisbarang_spj'=>$this->input->post('Jenisbarang_spj'),
            'Ukuran_spj'=>$this->input->post('Ukuran_spj'),
            'Spesifikasi_ssh'=>$this->input->post('Spesifikasi_ssh'),
            'Satuan_ssh'=>$this->input->post('Satuan_ssh'),
            'Hargasatuan_ssh'=>$this->input->post('Hargasatuan_ssh'),
            'Tahun_spj'=>$this->input->post('Tahun_spj')
        );
		
        $this->Model_spj->updatedataspj($data, $id_ssh);
        redirect('pengaturan/spj');
	}

	public function action_deletedataspj($id_ssh = '')
	{
			$this->Model_spj->deletedataspj($id_ssh);
			redirect('pengaturan/spj','refresh');
	}

}
