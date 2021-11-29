<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('Model_kibb'); 
        $this->load->model('Model_kiba'); 

		$session=$this->session->userdata('nip');
        if(empty($session))
        {
            redirect('login');
        }
	}

    // KIB B

    function kibb()
	{
        $data['content'] = $this->Model_kibb->Getkibb();
        $this->load->view('aset/kibb/kibb/kibb', $data);
	}
    
    function menambahdatakibb()
    {
        $this->load->view('aset/kibb/kibb/add');   
    }

    function action_menambahdatakibb()
    {       
                    $data = array(
                        'no_polisi'=>$this->input->post('no_polisi'),
                        'no_pabrik'=>$this->input->post('no_pabrik'),
                        'no_rangka'=>$this->input->post('no_rangka'),
                        'no_mesin'=>$this->input->post('no_mesin'),
                        'no_bpkb'=>$this->input->post('no_bpkb'),
                        'no_stnk'=>$this->input->post('no_stnk'),
                        'nama_barang'=>$this->input->post('nama_barang'),
                        'roda'=>$this->input->post('roda'),
                        'merk'=>$this->input->post('merk'),
                        'type'=>$this->input->post('type'),
                        'bahan'=>$this->input->post('bahan'),
                        'tahun_pembelian'=>$this->input->post('tahun_pembelian'),
                        'harga'=>$this->input->post('harga'),
                        'sumber_perolehan'=>$this->input->post('sumber_perolehan'),
                        'tgl_berlaku_pajak'=>$this->input->post('tgl_berlaku_pajak'),
                        'tgl_berlaku_stnk'=>$this->input->post('tgl_berlaku_stnk'),
                        'keterangan'=>$this->input->post('keterangan')
                    );
                    $data['nip']= $this->session->userdata('nip');
                    $this->Model_kibb->menambahdatakibb($data);

                    $data2 = array(
                        'no_polisi'=>$this->input->post('no_polisi'),
                        'pejabat_pengguna'=>$this->input->post('pejabat_pengguna'),
                        'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan')
                    );
                    $data2['id_opd']= $this->session->userdata('id_opd');
                    $data2['status_kibb']= "Tersedia";
                    $data2['dimutasi']= "Tidak";
                    $data2['hasil_mutasi']= "Tidak";
                    $this->Model_kibb->menambahdatariwayatkibb($data2);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Kendaraan Baru Berhasil di Tambah</div>');
                    redirect('aset/kibb','refresh');
    }

        function updatedatakibb($id_riwayat_kibb = NULL,$no_polisi = NULL)
        {
            $this->db->where('no_polisi', $no_polisi);
            $data['content'] = $this->db->get('tbl_kibb');

            $this->db->where('id_riwayat_kibb', $id_riwayat_kibb);
            $data['content2'] = $this->db->get('tbl_riwayat_kibb');

            $this->load->view('aset/kibb/kibb/update', $data);
        }

        function action_updatedatakibb($id_riwayat_kibb='',$no_polisi = '')
        {
            $data = array(
                'no_polisi'=>$this->input->post('no_polisi'),
                'no_pabrik'=>$this->input->post('no_pabrik'),
                'no_rangka'=>$this->input->post('no_rangka'),
                'no_mesin'=>$this->input->post('no_mesin'),
                'no_bpkb'=>$this->input->post('no_bpkb'),
                'no_stnk'=>$this->input->post('no_stnk'),
                'nama_barang'=>$this->input->post('nama_barang'),
                'roda'=>$this->input->post('roda'),
                'merk'=>$this->input->post('merk'),
                'type'=>$this->input->post('type'),
                'bahan'=>$this->input->post('bahan'),
                'tahun_pembelian'=>$this->input->post('tahun_pembelian'),
                'harga'=>$this->input->post('harga'),
                'sumber_perolehan'=>$this->input->post('sumber_perolehan'),
                'tgl_berlaku_pajak'=>$this->input->post('tgl_berlaku_pajak'),
                'tgl_berlaku_stnk'=>$this->input->post('tgl_berlaku_stnk'),
                'keterangan'=>$this->input->post('keterangan')
            );	
            $this->Model_kibb->updatedatakibb($data, $no_polisi);

            $data2 = array(
                'pejabat_pengguna'=>$this->input->post('pejabat_pengguna'),
                'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan'),
            );	
            $this->Model_kibb->updatedatariwayatkibb($data2, $id_riwayat_kibb);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil diubah</div>');
            redirect('aset/kibb');
        }

        public function action_deletedatakibb($id_riwayat_kibb = '')
        {
                $this->Model_kibb->deletedatakibb($id_riwayat_kibb);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil dihapus</div>');
                redirect('aset/kibb','refresh');
        }

        function mutasidatakibb($id_riwayat_kibb = NULL)
        {
            $this->db->where('id_riwayat_kibb', $id_riwayat_kibb);
            $data['content'] = $this->db->get('tbl_riwayat_kibb');

            $this->load->view('aset/kibb/kibb/mutasikibb', $data);
        }

        function action_mutasidatakibb($id_riwayat_kibb ='')
        {
            $data = array(
                'tanggal_mutasi'=>$this->input->post('tanggal_pencatatan')
            );
            $data['status_kibb'] = "Tidak Tersedia" ;
            $data['dimutasi'] = "YA" ;
            $data['hasil_mutasi'] = "TIDAK" ;
            $this->Model_kibb->mutasilamadatakibb($data, $id_riwayat_kibb);

            $data2 = array(
                'no_polisi'=>$this->input->post('no_polisi'),
                'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan'),
                'id_opd'=>$this->input->post('id_opd')
            );	
            $data2['status_kibb']= "Tersedia";
            $data2['dimutasi']= "TIDAK";
            $data2['hasil_mutasi']= "YA";
            $this->Model_kibb->mutasibarudatakibb($data2);


            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil diubah</div>');
            redirect('aset/kibb');
        }
        
            
        // LAPORAN REKAP KIB B

        function rekapkibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanrekap');
	    }

        function printlaporanrekap()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanrekap($tanggal_mulai,$tanggal_sampai);
            $this->load->view('aset/kibb/laporan/printlaporanrekap',$data);
        }

        // LAPORAN GLOBAL KIB B

        function globalkibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanglobal');
	    }

        function printlaporanglobal()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanglobal($tanggal_mulai,$tanggal_sampai);
            $this->load->view('aset/kibb/laporan/printlaporanglobal',$data);
        }

        // LAPORAN PER OPD KIB B

        function opdkibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanopd');
	    }

        function printlaporanopd()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $id_opd = $this->input->post('id_opd');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanopd($tanggal_mulai,$tanggal_sampai,$id_opd);
            $this->load->view('aset/kibb/laporan/printlaporanopd',$data);
        }

        // LAPORAN HILANG KIB B

        function hilangkibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanhilang');
	    }

        function printlaporanhilang()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanhilang($tanggal_mulai,$tanggal_sampai);
            $this->load->view('aset/kibb/laporan/printlaporanhilang',$data);
        }

        

        // LAPORAN REKAP JENIS KENDARAAN KIB B
        function jeniskendaraankibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanjeniskendaraan');
	    }

        function printlaporanjeniskendaraan()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanjeniskendaraan($tanggal_mulai,$tanggal_sampai);
            $this->load->view('aset/kibb/laporan/printlaporanjeniskendaraan',$data);
        }

        // LAPORAN PENAMBAHAN KIB B

        function penambahankibb()
	    {
		    $this->load->view('aset/kibb/laporan/laporanpenambahan');
	    }

        function printlaporanpenambahan()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kibb->Gethasillaporanpenambahan($tanggal_mulai,$tanggal_sampai);
            $this->load->view('aset/kibb/laporan/printlaporanpenambahan',$data);
        }

        // LAPORAN KIB A REKAP
        function rekapkiba()
	    {
		    $this->load->view('aset/kiba/laporan/laporanrekap');
	    }

        function printlaporanrekapkiba()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            
            $data['hasil']=$this->Model_kiba->Gethasillaporanrekap($tanggal_mulai,$tanggal_sampai);

            $data['jumlah_tanah_jalan']=$this->Model_kiba->Gethasiltanahjalan($tanggal_mulai,$tanggal_sampai);
            $data['jumlah_tanah_bangunan']=$this->Model_kiba->Gethasiltanahbangunan($tanggal_mulai,$tanggal_sampai);
            $data['jumlah_tanah_bangunan_air_irigasi']=$this->Model_kiba->Gethasiltanahbangunanairirigasi($tanggal_mulai,$tanggal_sampai);


            $data['sertifikat']=$this->Model_kiba->sertifikat($tanggal_mulai,$tanggal_sampai);
            $data['sppt']=$this->Model_kiba->sppt($tanggal_mulai,$tanggal_sampai);
            $data['ajb']=$this->Model_kiba->ajb($tanggal_mulai,$tanggal_sampai);
            $data['aphdg']=$this->Model_kiba->aphdg($tanggal_mulai,$tanggal_sampai);
            $data['pgr']=$this->Model_kiba->pgr($tanggal_mulai,$tanggal_sampai);
            $data['sp']=$this->Model_kiba->sp($tanggal_mulai,$tanggal_sampai);
            $data['tbai']=$this->Model_kiba->tbai($tanggal_mulai,$tanggal_sampai);
            $data['ttd']=$this->Model_kiba->ttd($tanggal_mulai,$tanggal_sampai);
            $data['hibah']=$this->Model_kiba->hibah($tanggal_mulai,$tanggal_sampai);

            $this->load->view('aset/kiba/laporan/printlaporanrekap',$data);
        }

         // LAPORAN KIB A GLOBAL
         function globalkiba()
         {
             $this->load->view('aset/kiba/laporan/laporanglobal');
         }
 
         function printlaporanglobalkiba()
         {   
             $tanggal_mulai = $this->input->post('tanggal_mulai');
             $tanggal_sampai = $this->input->post('tanggal_sampai');
             $data['tanggal_mulai'] =  $tanggal_mulai;
             $data['tanggal_sampai'] =  $tanggal_sampai;
             $data['hasil']=$this->Model_kiba->Gethasillaporanglobal($tanggal_mulai,$tanggal_sampai);
             $this->load->view('aset/kiba/laporan/printlaporanglobal',$data);
         }

          // LAPORAN KIBA OPD
        function opdkiba()
	    {
		    $this->load->view('aset/kiba/laporan/laporanopd');
	    }

        function printlaporanopdkiba()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $id_opd = $this->input->post('id_opd');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['hasil']=$this->Model_kiba->Gethasillaporanopd($tanggal_mulai,$tanggal_sampai,$id_opd);
            $this->load->view('aset/kiba/laporan/printlaporanopd',$data);
        }

         // LAPORAN KIBA DAFTAR
         function daftarkiba()
         {
             $this->load->view('aset/kiba/laporan/laporandaftar');
         }
 
         function printlaporandaftarkiba()
         {   
             $tanggal_mulai = $this->input->post('tanggal_mulai');
             $tanggal_sampai = $this->input->post('tanggal_sampai');
             $data['tanggal_mulai'] =  $tanggal_mulai;
             $data['tanggal_sampai'] =  $tanggal_sampai;
             $data['hasil']=$this->Model_kiba->Gethasillaporandaftar($tanggal_mulai,$tanggal_sampai);
             $this->load->view('aset/kiba/laporan/printlaporandaftar',$data);
         }

        // LAPORAN KIBA TANAH
        function tanahkiba()
	    {
		    $this->load->view('aset/kiba/laporan/laporantanah');
	    }

        function printlaporantanahkiba()
        {   
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_sampai = $this->input->post('tanggal_sampai');
            $tanah = $this->input->post('tanah');
            $data['tanggal_mulai'] =  $tanggal_mulai;
            $data['tanggal_sampai'] =  $tanggal_sampai;
            $data['tanah'] =  $tanah;
            $data['hasil']=$this->Model_kiba->Gethasillaporantanah($tanggal_mulai,$tanggal_sampai,$tanah);
            $this->load->view('aset/kiba/laporan/printlaporantanah',$data);
        }


        // KIB A

    function kiba()
	{
        $data['content'] = $this->Model_kiba->Getkiba();
        $this->load->view('aset/kiba/kiba/kiba', $data);
	}
    
    function menambahdatakiba()
    {
        $this->load->view('aset/kiba/kiba/add');   
    }

    function action_menambahdatakiba()
    {       

        $last = $this->db->order_by('id_kiba',"DESC")
        ->limit(1)
        ->get('tbl_kiba')
        ->row();

                    $data = array(
                        'nama_barang'=>$this->input->post('nama_barang'),
                        'no_kode_barang'=>$this->input->post('no_kode_barang'),
                        'no_register'=>$this->input->post('no_register'),
                        'kor_tambah_unit'=>$this->input->post('kor_tambah_unit'),
                        'kor_tambah_luas'=>$this->input->post('kor_tambah_luas'),
                        'kor_tambah_nilai'=>$this->input->post('kor_tambah_nilai'),
                        'kor_kurang_unit'=>$this->input->post('kor_kurang_unit'),
                        'kor_kurang_luas'=>$this->input->post('kor_kurang_luas'),
                        'kor_kurang_nilai'=>$this->input->post('kor_kurang_nilai'),
                        'ket_tanah'=>$this->input->post('ket_tanah'),
                        'luas_catat_kib'=>$this->input->post('luas_catat_kib'),
                        'tahun_pengadaan'=>$this->input->post('tahun_pengadaan'),
                        'alamat'=>$this->input->post('alamat'),
                        'statustanah_hak'=>$this->input->post('statustanah_hak'),
                        'tanggal_sertifikat'=>$this->input->post('tanggal_sertifikat'),
                        'no_sertifikat'=>$this->input->post('no_sertifikat'),
                        'harga'=>$this->input->post('harga'),
                        'ket_perolehan'=>$this->input->post('ket_perolehan'),
                        'keterangan_penguasaan'=>$this->input->post('keterangan_penguasaan')
                    );
                    $data['id_kiba'] = $last->id_kiba+1;
                    $this->Model_kiba->menambahdatakiba($data);

                    $data2 = array(
                        'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan')
                    );
                    $data2['id_kiba'] = $last->id_kiba+1;
                    $data2['id_opd']= $this->session->userdata('id_opd');
                    $data2['status_kiba']= "Tersedia";
                    $data2['dimutasi']= "Tidak";
                    $data2['hasil_mutasi']= "Tidak";
                    $this->Model_kiba->menambahdatariwayatkiba($data2);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Tanah Baru Berhasil di Tambah</div>');
                    redirect('aset/kiba','refresh');
    }

        function updatedatakiba($id_riwayat_kiba = NULL,$id_kiba = NULL)
        {
            $this->db->where('id_kiba', $id_kiba);
            $data['content'] = $this->db->get('tbl_kiba');
                
            $this->db->where('id_riwayat_kiba', $id_riwayat_kiba);
            $data['content2'] = $this->db->get('tbl_riwayat_kiba');

            $this->load->view('aset/kiba/kiba/update', $data);
        }

        function action_updatedatakiba($id_kiba ='',$id_riwayat_kiba='')
        {
            $data = array(
                        'nama_barang'=>$this->input->post('nama_barang'),
                        'no_kode_barang'=>$this->input->post('no_kode_barang'),
                        'no_register'=>$this->input->post('no_register'),
                        'kor_tambah_unit'=>$this->input->post('kor_tambah_unit'),
                        'kor_tambah_luas'=>$this->input->post('kor_tambah_luas'),
                        'kor_tambah_nilai'=>$this->input->post('kor_tambah_nilai'),
                        'kor_kurang_unit'=>$this->input->post('kor_kurang_unit'),
                        'kor_kurang_luas'=>$this->input->post('kor_kurang_luas'),
                        'kor_kurang_nilai'=>$this->input->post('kor_kurang_nilai'),
                        'ket_tanah'=>$this->input->post('ket_tanah'),
                        'luas_catat_kib'=>$this->input->post('luas_catat_kib'),
                        'tahun_pengadaan'=>$this->input->post('tahun_pengadaan'),
                        'alamat'=>$this->input->post('alamat'),
                        'statustanah_hak'=>$this->input->post('statustanah_hak'),
                        'tanggal_sertifikat'=>$this->input->post('tanggal_sertifikat'),
                        'no_sertifikat'=>$this->input->post('no_sertifikat'),
                        'harga'=>$this->input->post('harga'),
                        'ket_perolehan'=>$this->input->post('ket_perolehan'),
                        'keterangan_penguasaan'=>$this->input->post('keterangan_penguasaan')
            );	
            $this->Model_kiba->updatedatakiba($data, $id_kiba);

            $data2 = array(
                        'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan')
            );	
            $this->Model_kiba->updatedatariwayatkiba($data2, $id_riwayat_kiba);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil diubah</div>');
            redirect('aset/kiba');
        }

        public function action_deletedatakiba($id_riwayat_kiba = '')
        {
                $this->Model_kiba->deletedatakiba($id_riwayat_kiba);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil dihapus</div>');
                redirect('aset/kiba','refresh');
        }

        function mutasidatakiba($id_riwayat_kiba = NULL)
        {
            $this->db->where('id_riwayat_kiba', $id_riwayat_kiba);
            $data['content'] = $this->db->get('tbl_riwayat_kiba');

            $this->load->view('aset/kiba/kiba/mutasikiba', $data);
        }

        function action_mutasidatakiba($id_riwayat_kiba ='')
        {
            $data = array(
                'tanggal_mutasi'=>$this->input->post('tanggal_pencatatan')
            );
            $data['status_kiba'] = "Tidak Tersedia" ;
            $data['dimutasi'] = "YA" ;
            $data['hasil_mutasi'] = "TIDAK" ;
            $this->Model_kiba->mutasilamadatakiba($data, $id_riwayat_kiba);

            $data2 = array(
                'id_kiba'=>$this->input->post('id_kiba'),
                'tanggal_pencatatan'=>$this->input->post('tanggal_pencatatan'),
                'id_opd'=>$this->input->post('id_opd')
            );	
            $data2['status_kiba']= "Tersedia";
            $data2['dimutasi']= "TIDAK";
            $data2['hasil_mutasi']= "YA";
            $this->Model_kiba->mutasibarudatakiba($data2);


            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat KIB B berhasil diubah</div>');
            redirect('aset/kiba');
        }
}
