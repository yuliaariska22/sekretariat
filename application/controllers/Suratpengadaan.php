<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratpengadaan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       $this->load->model('Model_suratpengadaan'); //load model Model_suratpengadaan
    }

	function index()
	{
        $data['content'] = $this->Model_suratpengadaan->Getpengadaan();
        $this->load->view('suratpengadaan/suratpengadaan', $data);
	}

	function update($id_mutasi = NULL)
    {
        $data['ambil']=$this->Model_suratpengadaan->GetId_suratpengadaan($id_mutasi);
        $this->load->view('suratpengadaan/update',$data);
	}
	
    function simpan_update()
    {
        $data = array(
			'no_suratpermohonanpptk'=>$this->input->post('no_suratpermohonanpptk'),
			'no_suratpermohonanpenyedia'=>$this->input->post('no_suratpermohonanpenyedia'),
			'no_suratbalasan'=>$this->input->post('no_suratbalasan'),
            'no_suratperintahpengiriman'=>$this->input->post('no_suratperintahpengiriman'),
            'no_bapenyedia'=>$this->input->post('no_bapenyedia'),
			'no_bappk'=>$this->input->post('no_bappk'),
            'no_kwitansi'=>$this->input->post('no_kwitansi'),
            'kode_kegiatan'=>$this->input->post('kode_kegiatan'),
            'kode_rekening'=>$this->input->post('kode_rekening'),
            'no_faktur'=>$this->input->post('no_faktur'),
            'no_suratpermohonanpembayaran'=>$this->input->post('no_suratpermohonanpembayaran'),
            'no_bapembayaran'=>$this->input->post('no_bapembayaran'),
            'tanggal_suratpermohonanpptk'=>$this->input->post('tanggal_suratpermohonanpptk'),
			'tanggal_suratpermohonanpenyedia'=>$this->input->post('tanggal_suratpermohonanpenyedia'),
			'tanggal_suratbalasan'=>$this->input->post('tanggal_suratbalasan'),
            'tanggal_suratperintahpengiriman'=>$this->input->post('tanggal_suratperintahpengiriman'),
            'tanggal_bapenyedia'=>$this->input->post('tanggal_bapenyedia'),
			'tanggal_bappk'=>$this->input->post('tanggal_bappk'),
            'tanggal_kwitansi'=>$this->input->post('tanggal_kwitansi'),
            'tanggal_faktur'=>$this->input->post('tanggal_faktur'),
            'tanggal_suratpermohonanpembayaran'=>$this->input->post('tanggal_suratpermohonanpembayaran'),
            'tanggal_bapembayaran'=>$this->input->post('tanggal_bapembayaran'),
            'waktu_penyelesaian'=>$this->input->post('waktu_penyelesaian'),
            'belanja'=>$this->input->post('belanja'),
            'memesan'=>$this->input->post('memesan'),
            'ppn'=>$this->input->post('ppn'),
            'pphpasal22'=>$this->input->post('pphpasal22'),
            'pphpasal23'=>$this->input->post('pphpasal23'),
            'pasal4ayat2'=>$this->input->post('pasal4ayat2'),
            'pajakdaerah'=>$this->input->post('pajakdaerah'),
            'namakegiatan'=>$this->input->post('namakegiatan'),
            'namapekerjaan'=>$this->input->post('namapekerjaan'),
            'potppn'=>$this->input->post('potppn'),
            'potpphpasal22'=>$this->input->post('potpphpasal22'),
            'potpphpasal23'=>$this->input->post('potpphpasal23'),
            'potpasal4ayat2'=>$this->input->post('potpasal4ayat2'),
            'potpajakdaerah'=>$this->input->post('potpajakdaerah'),
            'hari'=>$this->input->post('hari'),
            'tanggal_spp'=>$this->input->post('tanggal_spp'),
            'no_spp'=>$this->input->post('no_spp'),
            'sppbelanja'=>$this->input->post('sppbelanja'),
            'tanggal_sppb'=>$this->input->post('tanggal_sppb'),
            'no_sppb'=>$this->input->post('no_sppb'),
            'untuk'=>$this->input->post('untuk')


        );
        $id_mutasi = $this->input->post('id_mutasi');
        $tanggal_kwitansi = $this->input->post('tanggal_suratpermohonanpptk');
        $surat = $this->input->post('surat');

        if (isset($_POST['btnPrint'])){
            
           
            $data1['pengadaan']= $this->Model_suratpengadaan->pengadaan($id_mutasi);

            $data1['penggunaanggaran'] = $this->Model_suratpengadaan->penggunaanggaran($tanggal_kwitansi);
            $data1['pejabatpembuatkomitmen'] = $this->Model_suratpengadaan->pejabatpembuatkomitmen($tanggal_kwitansi);
            $data1['bendahara'] = $this->Model_suratpengadaan->bendahara($tanggal_kwitansi);
            $data1['totalpembayaran'] = $this->Model_suratpengadaan->totalpembayaransementara($id_mutasi);
            
            $data2['pengadaan']= $this->Model_suratpengadaan->pengadaan($id_mutasi);

            $data2['penggunaanggaran'] = $this->Model_suratpengadaan->penggunaanggaran($tanggal_kwitansi);
            $data2['pejabatpembuatkomitmen'] = $this->Model_suratpengadaan->pejabatpembuatkomitmen($tanggal_kwitansi);
            $data2['bendahara'] = $this->Model_suratpengadaan->bendahara($tanggal_kwitansi);
            $data2['totalpembayaran'] = $this->Model_suratpengadaan->totalpembayaran($id_mutasi);
            


            $data1['detailpengadaansementara'] = $this->Model_suratpengadaan->detailpengadaansuratsementara($id_mutasi);
          
            $data2['detailpengadaan'] = $this->Model_suratpengadaan->detailpengadaansurat($id_mutasi);
           
            if ($surat == "surat1"){
                $this->load->view('suratpengadaan/'.$surat,$data1);
            }else if($surat == "surat2"){
			    $this->load->view('suratpengadaan/'.$surat,$data1);
            }else{
                $this->load->view('suratpengadaan/'.$surat,$data2);
            }

		}else{
			$this->db->where('id_mutasi', $id_mutasi);
            $this->db->update('tbl_mutasi',$data);
            redirect('suratpengadaan');
		}
		
	}

    function updatepbp($id_mutasi = NULL)
    {
        $data['ambil']=$this->Model_suratpengadaan->GetId_suratpengadaan($id_mutasi);
        $this->load->view('suratpengadaan/updatepbp',$data);
	}

}

/* End of file ssh.php */
/* Location: ./application/controllers/ssh.php */