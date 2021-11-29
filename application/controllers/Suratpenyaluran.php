<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratpenyaluran extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       $this->load->model('Model_suratpenyaluran'); //load model Model_suratpenyaluran
	 

    }

	function index()
	{
        $data['content'] = $this->Model_suratpenyaluran->Getpenyaluran();
        $this->load->view('suratpenyaluran/suratpenyaluran', $data);
	}

    function suratpenyaluranpbp()
	{
        $data['content'] = $this->Model_suratpenyaluran->Getpenyaluranpbp();
        $this->load->view('suratpenyaluran/suratpenyaluranpbp', $data);
	}

 	function action_menambahdatapenyaluran()
    {       
            $data = array(
            'tanggal_pesan'=>$this->input->post('tanggal_pesan'),
			'id_mutasi'=>$this->input->post('id_mutasi'),
            'keterangan'=>$this->input->post('keterangan'),            
			'memesan'=>$this->input->post('memesan'),			        
			'belanja'=>$this->input->post('belanja'),
            'statuspenyaluran'=>$this->input->post('statuspenyaluran'),
            'username'=>$this->input->post('username')
					);
					$data['keterangan'] = "Menunggu Konfirmasi";
					$data['statuspenyaluran'] = "Sedang Diproses";
					$data['username'] = $this->session->userdata('username');
					
					$this->Model_suratpenyaluran->menambahdatapenyaluran($data);
					redirect('penyaluran','refresh');
	}

	function update($id_mutasi = NULL)
    {
        $data['ambil']=$this->Model_suratpenyaluran->GetId_suratpenyaluran($id_mutasi);
        $this->load->view('suratpenyaluran/update',$data);
	}

    function updatepbp($id_mutasi = NULL)
    {
        $data['ambil']=$this->Model_suratpenyaluran->GetId_suratpenyaluran($id_mutasi);
        $this->load->view('suratpenyaluran/updatepbp',$data);
	}
	
    function simpan_update()
    {
        $data = array(
			'no_sppb'=>$this->input->post('no_sppb'),
            'tanggal_sppb'=>$this->input->post('tanggal_sppb'),
			'untuk'=>$this->input->post('untuk')

        );
        $surat = $this->input->post('surat');
        $id_mutasi = $this->input->post('id_mutasi');
        $tanggal_sppb = $this->input->post('tanggal_sppb');
        if (isset($_POST['btnPrint'])){
            $data1['penyaluran']= $this->Model_suratpenyaluran->penyaluran($id_mutasi);
            $detailpenyaluran = $this->Model_suratpenyaluran->detailpenyaluran();
            $data1['penggunaanggaran'] = $this->Model_suratpenyaluran->penggunaanggaran($tanggal_sppb);
            
            if ($detailpenyaluran)
            {
                $data1['detailpenyaluran'] = $this->Model_suratpenyaluran->detailpenyaluransurat($id_mutasi);
            }
			$this->load->view('suratpenyaluran/'.$surat,$data1);
		}else{
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('suratpenyaluran');
        }
	}

    function simpan_updatepbp()
    {
        $data = array(
			'no_sppb'=>$this->input->post('no_sppb'),
			'no_bapenyaluranbarang'=>$this->input->post('no_bapenyaluranbarang'),
            'tanggal_sppb'=>$this->input->post('tanggal_sppb'),
			'tanggal_bapenyaluranbarang'=>$this->input->post('tanggal_bapenyaluranbarang'),

        );
        $surat = $this->input->post('surat');
        $id_mutasi = $this->input->post('id_mutasi');
        if (isset($_POST['btnPrint'])){
            $data1['penyaluran']= $this->Model_suratpenyaluran->penyaluran($id_mutasi);
            $detailpenyaluran = $this->Model_suratpenyaluran->detailpenyaluran();
            $data1['penggunabarang'] = $this->Model_suratpenyaluran->penggunabarang($id_mutasi);
            $data1['pejabatpenatausahaanbarang'] = $this->Model_suratpenyaluran->pejabatpenatausahaanbarang($id_mutasi);
            $data1['pbp'] = $this->Model_suratpenyaluran->pbp($id_mutasi);
            
            if ($detailpenyaluran)
            {
                $data1['detailpenyaluran'] = $this->Model_suratpenyaluran->detailpenyaluransurat($id_mutasi);
            }
			$this->load->view('suratpenyaluran/'.$surat,$data1);
		}else{
		$this->db->where('id_mutasi', $id_mutasi);
        $this->db->update('tbl_mutasi',$data);
        redirect('suratpenyaluran/suratpenyaluranpbp');
        }
	}

}