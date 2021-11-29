<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Model_login');
		$this->load->model('Model_pegawai');
		$this->load->model('Model_detailpegawai');
		$this->load->model('Model_pendidikan');
		$this->load->model('Model_kursus');
		$this->load->model('Model_pelatihan');
		$this->load->model('Model_riwayat_kepangkatan');
		$this->load->model('Model_riwayat_jabatan');
		$this->load->model('Model_penghargaan');
		$this->load->model('Model_pengalaman_luarnegeri');
		$this->load->model('Model_keluarga');
		$this->load->model('Model_organisasi');
		$this->load->model('Model_drh_keteranganlain');
		$this->load->model('Model_du_kepangkatan');
		$this->load->model('Model_skp');
		$this->load->model('Model_disiplin');
		$this->load->model('Model_penyaji');
		$this->load->model('Model_karyatulis');
		$this->load->model('Model_verifikasidatapegawai');
	}

	public function index()
	{
		$this->load->view('pegawai/home');
	}

	// Data Pribadi

	public function datapribadi()
	{
		$this->load->view('pegawai/datapribadi/datapribadi');
	}

	public function datadiri()
	{
		$data['content'] = $this->Model_detailpegawai->Getdetailpegawai();

		if ($data['content'] == NULL ) {
        $this->load->view('pegawai/datadiri/tambahdatadiri');
		}else{
		$this->load->view('pegawai/datadiri/datadiri', $data);
		}
	}

	function action_tambahdatadiri()
    {       

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('berkas'))
		{
			$data = array(
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'agama'=>$this->input->post('agama'),
				'status_perkawinan'=>$this->input->post('status_perkawinan'),
				'alamatrumah_jalan'=>$this->input->post('alamatrumah_jalan'),
				'alamatrumah_kelurahan'=>$this->input->post('alamatrumah_kelurahan'),
				'alamatrumah_kecamatan'=>$this->input->post('alamatrumah_kecamatan'),
				'alamatrumah_kota'=>$this->input->post('alamatrumah_kota'),
				'alamatrumah_provinsi'=>$this->input->post('alamatrumah_provinsi'),
				'keteranganbadan_tinggi'=>$this->input->post('keteranganbadan_tinggi'),
				'keteranganbadan_berat'=>$this->input->post('keteranganbadan_berat'),
				'keteranganbadan_rambut'=>$this->input->post('keteranganbadan_rambut'),
				'keteranganbadan_bentukmuka'=>$this->input->post('keteranganbadan_bentukmuka'),
				'keteranganbadan_warnakulit'=>$this->input->post('keteranganbadan_warnakulit'),
				'keteranganbadan_ciricirikhas'=>$this->input->post('keteranganbadan_ciricirikhas'),
				'keteranganbadan_cacattubuh'=>$this->input->post('keteranganbadan_cacattubuh'),
				'hobby'=>$this->input->post('hobby'),
				'jeniskepegawaian'=>$this->input->post('jeniskepegawaian'),
				'jeniskepegawaian'=>$this->input->post('jeniskepegawaian')
			);
			$data['nip']= $this->session->userdata('nip');
			$this->Model_detailpegawai->menambahdatadiri($data);

			$data2['status_verifikasi'] = "Belum Diverifikasi";
			$nip=$this->session->userdata('nip');
			$this->Model_pegawai->updatestatusverifikasi($data2, $nip);
				redirect('pegawai/datadiri','refresh');
		}
		else
		{
                    $data = array(
                        'tempat_lahir'=>$this->input->post('tempat_lahir'),
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                        'agama'=>$this->input->post('agama'),
                        'status_perkawinan'=>$this->input->post('status_perkawinan'),
                        'alamatrumah_jalan'=>$this->input->post('alamatrumah_jalan'),
                        'alamatrumah_kelurahan'=>$this->input->post('alamatrumah_kelurahan'),
                        'alamatrumah_kecamatan'=>$this->input->post('alamatrumah_kecamatan'),
                        'alamatrumah_kota'=>$this->input->post('alamatrumah_kota'),
                        'alamatrumah_provinsi'=>$this->input->post('alamatrumah_provinsi'),
                        'keteranganbadan_tinggi'=>$this->input->post('keteranganbadan_tinggi'),
                        'keteranganbadan_berat'=>$this->input->post('keteranganbadan_berat'),
                        'keteranganbadan_rambut'=>$this->input->post('keteranganbadan_rambut'),
                        'keteranganbadan_bentukmuka'=>$this->input->post('keteranganbadan_bentukmuka'),
                        'keteranganbadan_warnakulit'=>$this->input->post('keteranganbadan_warnakulit'),
                        'keteranganbadan_ciricirikhas'=>$this->input->post('keteranganbadan_ciricirikhas'),
                        'keteranganbadan_cacattubuh'=>$this->input->post('keteranganbadan_cacattubuh'),
                        'hobby'=>$this->input->post('hobby'),
                        'jeniskepegawaian'=>$this->input->post('jeniskepegawaian'),
                        'jeniskepegawaian'=>$this->input->post('jeniskepegawaian')
                    );
                    $data['nip']= $this->session->userdata('nip');
					$data['nama_berkas'] = $this->upload->data("file_name");
                    $this->Model_detailpegawai->menambahdatadiri($data);

					$data2['status_verifikasi'] = "Belum Diverifikasi";
					$nip=$this->session->userdata('nip');
					$this->Model_pegawai->updatestatusverifikasi($data2, $nip);


                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Diri Baru Berhasil di Tambah</div>');
                    redirect('pegawai/datadiri','refresh');
		}
    }

	function action_updatedatadiri($nip='')
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('berkas'))
		{
			$data = array(
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'agama'=>$this->input->post('agama'),
				'status_perkawinan'=>$this->input->post('status_perkawinan'),
				'alamatrumah_jalan'=>$this->input->post('alamatrumah_jalan'),
				'alamatrumah_kelurahan'=>$this->input->post('alamatrumah_kelurahan'),
				'alamatrumah_kecamatan'=>$this->input->post('alamatrumah_kecamatan'),
				'alamatrumah_kota'=>$this->input->post('alamatrumah_kota'),
				'alamatrumah_provinsi'=>$this->input->post('alamatrumah_provinsi'),
				'keteranganbadan_tinggi'=>$this->input->post('keteranganbadan_tinggi'),
				'keteranganbadan_berat'=>$this->input->post('keteranganbadan_berat'),
				'keteranganbadan_rambut'=>$this->input->post('keteranganbadan_rambut'),
				'keteranganbadan_bentukmuka'=>$this->input->post('keteranganbadan_bentukmuka'),
				'keteranganbadan_warnakulit'=>$this->input->post('keteranganbadan_warnakulit'),
				'keteranganbadan_ciricirikhas'=>$this->input->post('keteranganbadan_ciricirikhas'),
				'keteranganbadan_cacattubuh'=>$this->input->post('keteranganbadan_cacattubuh'),
				'hobby'=>$this->input->post('hobby'),
				'jeniskepegawaian'=>$this->input->post('jeniskepegawaian'),
				'jeniskepegawaian'=>$this->input->post('jeniskepegawaian')
			);	
			$this->Model_detailpegawai->updatedatadiri($data, $nip);
	
			$data2['status_verifikasi'] = "Belum Diverifikasi";
			$nip=$this->session->userdata('nip');
			$this->Model_pegawai->updatestatusverifikasi($data2, $nip);
				redirect('pegawai/datadiri','refresh');
		}
		else
		{
		$data = array(
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'status_perkawinan'=>$this->input->post('status_perkawinan'),
			'alamatrumah_jalan'=>$this->input->post('alamatrumah_jalan'),
			'alamatrumah_kelurahan'=>$this->input->post('alamatrumah_kelurahan'),
			'alamatrumah_kecamatan'=>$this->input->post('alamatrumah_kecamatan'),
			'alamatrumah_kota'=>$this->input->post('alamatrumah_kota'),
			'alamatrumah_provinsi'=>$this->input->post('alamatrumah_provinsi'),
			'keteranganbadan_tinggi'=>$this->input->post('keteranganbadan_tinggi'),
			'keteranganbadan_berat'=>$this->input->post('keteranganbadan_berat'),
			'keteranganbadan_rambut'=>$this->input->post('keteranganbadan_rambut'),
			'keteranganbadan_bentukmuka'=>$this->input->post('keteranganbadan_bentukmuka'),
			'keteranganbadan_warnakulit'=>$this->input->post('keteranganbadan_warnakulit'),
			'keteranganbadan_ciricirikhas'=>$this->input->post('keteranganbadan_ciricirikhas'),
			'keteranganbadan_cacattubuh'=>$this->input->post('keteranganbadan_cacattubuh'),
			'hobby'=>$this->input->post('hobby'),
			'jeniskepegawaian'=>$this->input->post('jeniskepegawaian'),
			'jeniskepegawaian'=>$this->input->post('jeniskepegawaian')
		);	
		$data['nama_berkas'] = $this->upload->data("file_name");
		$this->Model_detailpegawai->updatedatadiri($data, $nip);

		$data2['status_verifikasi'] = "Belum Diverifikasi";
		$nip=$this->session->userdata('nip');
		$this->Model_pegawai->updatestatusverifikasi($data2, $nip);

	
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Diri berhasil diubah</div>');
		redirect('pegawai/datadiri');
	}
	}

	// PENDIDIKAN

	 function pendidikan()
	 {
		 $data['content'] = $this->Model_pendidikan->Getpendidikan();
		 $this->load->view('pegawai//pendidikan/pendidikan', $data);
	 }
	 
	 function menambahdatapendidikan()
	 {
		 $this->load->view('pegawai/pendidikan//add');   
	 }
 
	 function action_menambahdatapendidikan()
	 {       
					 $data = array(
						 'tingkat'=>$this->input->post('tingkat'),
						 'nama_pendidikan'=>$this->input->post('nama_pendidikan'),
						 'jurusan'=>$this->input->post('jurusan'),
						 'tempat'=>$this->input->post('tempat'),
						 'nama_pimpinan_pendidikan'=>$this->input->post('nama_pimpinan_pendidikan'),
						 'no_ijazah'=>$this->input->post('no_ijazah'),
						 'tanggal_ijazah'=>$this->input->post('tanggal_ijazah')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_pendidikan->menambahdatapendidikan($data);
					 
					 $nip=$this->session->userdata('nip');
					 $data2['status_verifikasi'] = "Belum Diverifikasi";
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pendidikan Berhasil di Tambah</div>');
					 redirect('pegawai/pendidikan','refresh');
	 }
 
		 function updatedatapendidikan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_pendidikan');
 
			 $this->load->view('pegawai//pendidikan/update', $data);
		 }
 
		 function action_updatedatapendidikan($id='')
		 {
			 $data = array(
				'tingkat'=>$this->input->post('tingkat'),
				'nama_pendidikan'=>$this->input->post('nama_pendidikan'),
				'jurusan'=>$this->input->post('jurusan'),
				'tempat'=>$this->input->post('tempat'),
				'nama_pimpinan_pendidikan'=>$this->input->post('nama_pimpinan_pendidikan'),
				'no_ijazah'=>$this->input->post('no_ijazah'),
				'tanggal_ijazah'=>$this->input->post('tanggal_ijazah')
			 );	
			 $this->Model_pendidikan->updatedatapendidikan($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
			 $nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pendidikan berhasil diubah</div>');
			 redirect('pegawai/pendidikan');
		 }
 
		function action_deletedatapendidikan($id = '')
		 {
				 $this->Model_pendidikan->deletedatapendidikan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pendidikan berhasil dihapus</div>');
				 redirect('pegawai/pendidikan','refresh');
		 }

	
		 // kursus

	 function kursus()
	 {
		 $data['content'] = $this->Model_kursus->Getkursus();
		 $this->load->view('pegawai/kursus/kursus', $data);
	 }
	 
	 function menambahdatakursus()
	 {
		 $this->load->view('pegawai/kursus/add');   
	 }
 
	 function action_menambahdatakursus()
	 {       
					 $data = array(
						 'nama_kursus'=>$this->input->post('nama_kursus'),
						 'lama_kursus'=>$this->input->post('lama_kursus'),
						 'ijazah_tahun'=>$this->input->post('ijazah_tahun'),
						 'tempat'=>$this->input->post('tempat'),
						 'ket'=>$this->input->post('ket')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_kursus->menambahdatakursus($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Kursus Berhasil di Tambah</div>');
					 redirect('pegawai/kursus','refresh');
	 }
 
		 function updatedatakursus($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_kursus');
 
			 $this->load->view('pegawai/kursus/update', $data);
		 }
 
		 function action_updatedatakursus($id='')
		 {
			 $data = array(
				'nama_kursus'=>$this->input->post('nama_kursus'),
				'lama_kursus'=>$this->input->post('lama_kursus'),
				'ijazah_tahun'=>$this->input->post('ijazah_tahun'),
				'tempat'=>$this->input->post('tempat'),
				'ket'=>$this->input->post('ket')
			 );	
			 $this->Model_kursus->updatedatakursus($data, $id);

			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Kursus berhasil diubah</div>');
			 redirect('pegawai/kursus');
		 }
 
		function action_deletedatakursus($id = '')
		 {
				 $this->Model_kursus->deletedatakursus($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Kursus berhasil dihapus</div>');
				 redirect('pegawai/kursus','refresh');
		 }

		  // pelatihan

	 function pelatihan()
	 {
		 $data['content'] = $this->Model_pelatihan->Getpelatihan();
		 $this->load->view('pegawai/pelatihan/pelatihan', $data);
	 }
	 
	 function menambahdatapelatihan()
	 {
		 $this->load->view('pegawai/pelatihan/add');   
	 }
 
	 function action_menambahdatapelatihan()
	 {       
					 $data = array(
						 'jenis_pelatihan'=>$this->input->post('jenis_pelatihan'),
						 'nama_diklat'=>$this->input->post('nama_diklat'),
						 'tempat'=>$this->input->post('tempat'),
						 'nomor_sk'=>$this->input->post('nomor_sk'),
						 'tanggal_sk'=>$this->input->post('tanggal_sk'),
						 'tahun'=>$this->input->post('tahun'),
						 'tanggal_pendidikan_mulai'=>$this->input->post('tanggal_pendidikan_mulai'),
						 'tanggal_pendidikan_selesai'=>$this->input->post('tanggal_pendidikan_selesai')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_pelatihan->menambahdatapelatihan($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pelatihan Berhasil di Tambah</div>');
					 redirect('pegawai/pelatihan','refresh');
	 }
 
		 function updatedatapelatihan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_pelatihan');
 
			 $this->load->view('pegawai/pelatihan/update', $data);
		 }
 
		 function action_updatedatapelatihan($id='')
		 {
			 $data = array(
				'jenis_pelatihan'=>$this->input->post('jenis_pelatihan'),
				'nama_diklat'=>$this->input->post('nama_diklat'),
				'tempat'=>$this->input->post('tempat'),
				'nomor_sk'=>$this->input->post('nomor_sk'),
				'tanggal_sk'=>$this->input->post('tanggal_sk'),
				'tahun'=>$this->input->post('tahun'),
				'tanggal_pendidikan_mulai'=>$this->input->post('tanggal_pendidikan_mulai'),
				'tanggal_pendidikan_selesai'=>$this->input->post('tanggal_pendidikan_selesai')
			 );	
			 $this->Model_pelatihan->updatedatapelatihan($data, $id);

			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pelatihan berhasil diubah</div>');
			 redirect('pegawai/pelatihan');
		 }
 
		function action_deletedatapelatihan($id = '')
		 {
				 $this->Model_pelatihan->deletedatapelatihan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pelatihan berhasil dihapus</div>');
				 redirect('pegawai/pelatihan','refresh');
		 }

		   // riwayat_kepangkatan

	 function riwayat_kepangkatan()
	 {
		 $data['content'] = $this->Model_riwayat_kepangkatan->Getriwayat_kepangkatan();
		 $this->load->view('pegawai/riwayat_kepangkatan/riwayat_kepangkatan', $data);
	 }
	 
	 function menambahdatariwayat_kepangkatan()
	 {
		 $this->load->view('pegawai/riwayat_kepangkatan/add');   
	 }
 
	 function action_menambahdatariwayat_kepangkatan()
	 {       
					 $data = array(
						 'pangkat'=>$this->input->post('pangkat'),
						 'gol'=>$this->input->post('gol'),
						 'tmt'=>$this->input->post('tmt'),
						 'no_sk'=>$this->input->post('no_sk'),
						 'tanggal_sk'=>$this->input->post('tanggal_sk'),
						 'pejabat'=>$this->input->post('pejabat'),
						 'gaji_pokok'=>$this->input->post('gaji_pokok'),
						 'peraturan_dasar'=>$this->input->post('peraturan_dasar')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_riwayat_kepangkatan->menambahdatariwayat_kepangkatan($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Kepangkatan berhasil di Tambah</div>');
					 redirect('pegawai/riwayat_kepangkatan','refresh');
	 }
 
		 function updatedatariwayat_kepangkatan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_riwayat_kepangkatan');
 
			 $this->load->view('pegawai/riwayat_kepangkatan/update', $data);
		 }
 
		 function action_updatedatariwayat_kepangkatan($id='')
		 {
			 $data = array(
				'pangkat'=>$this->input->post('pangkat'),
				'gol'=>$this->input->post('gol'),
				'tmt'=>$this->input->post('tmt'),
				'no_sk'=>$this->input->post('no_sk'),
				'tanggal_sk'=>$this->input->post('tanggal_sk'),
				'pejabat'=>$this->input->post('pejabat'),
				'gaji_pokok'=>$this->input->post('gaji_pokok'),
				'peraturan_dasar'=>$this->input->post('peraturan_dasar')
			 );	
			 $this->Model_riwayat_kepangkatan->updatedatariwayat_kepangkatan($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Kepangkatan berhasil diubah</div>');
			 redirect('pegawai/riwayat_kepangkatan');
		 }
 
		function action_deletedatariwayat_kepangkatan($id = '')
		 {
				 $this->Model_riwayat_kepangkatan->deletedatariwayat_kepangkatan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Kepangkatan berhasil dihapus</div>');
				 redirect('pegawai/riwayat_kepangkatan','refresh');
		 }

		   // riwayat_jabatan

	 function riwayat_jabatan()
	 {
		 $data['content'] = $this->Model_riwayat_jabatan->Getriwayat_jabatan();
		 $this->load->view('pegawai/riwayat_jabatan/riwayat_jabatan', $data);
	 }
	 
	 function menambahdatariwayat_jabatan()
	 {
		 $this->load->view('pegawai/riwayat_jabatan/add');   
	 }
 
	 function action_menambahdatariwayat_jabatan()
	 {       
					 $data = array(
						 'jabatan'=>$this->input->post('jabatan'),
						 'gol'=>$this->input->post('gol'),
						 'tmt'=>$this->input->post('tmt'),
						 'nomor_sk'=>$this->input->post('nomor_sk'),
						 'tanggal_sk'=>$this->input->post('tanggal_sk'),
						 'pejabat'=>$this->input->post('pejabat'),
						 'eselon'=>$this->input->post('eselon')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_riwayat_jabatan->menambahdatariwayat_jabatan($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Jabatan berhasil di Tambah</div>');
					 redirect('pegawai/riwayat_jabatan','refresh');
	 }
 
		 function updatedatariwayat_jabatan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_riwayat_jabatan');
 
			 $this->load->view('pegawai/riwayat_jabatan/update', $data);
		 }
 
		 function action_updatedatariwayat_jabatan($id='')
		 {
			 $data = array(
				'jabatan'=>$this->input->post('jabatan'),
				'gol'=>$this->input->post('gol'),
				'tmt'=>$this->input->post('tmt'),
				'nomor_sk'=>$this->input->post('nomor_sk'),
				'tanggal_sk'=>$this->input->post('tanggal_sk'),
				'pejabat'=>$this->input->post('pejabat'),
				'eselon'=>$this->input->post('eselon')
			 );	
			 $this->Model_riwayat_jabatan->updatedatariwayat_jabatan($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Jabatan berhasil diubah</div>');
			 redirect('pegawai/riwayat_jabatan');
		 }
 
		function action_deletedatariwayat_jabatan($id = '')
		 {
				 $this->Model_riwayat_jabatan->deletedatariwayat_jabatan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Riwayat Jabatan berhasil dihapus</div>');
				 redirect('pegawai/riwayat_jabatan','refresh');
		 }


		   
		   // penghargaan

	 function penghargaan()
	 {
		 $data['content'] = $this->Model_penghargaan->Getpenghargaan();
		 $this->load->view('pegawai/penghargaan/penghargaan', $data);
	 }
	 
	 function menambahdatapenghargaan()
	 {
		 $this->load->view('pegawai/penghargaan/add');   
	 }
 
	 function action_menambahdatapenghargaan()
	 {       
					 $data = array(
						 'nama_penghargaan'=>$this->input->post('nama_penghargaan'),
						 'tahun_perolehan'=>$this->input->post('tahun_perolehan'),
						 'institusi'=>$this->input->post('institusi')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_penghargaan->menambahdatapenghargaan($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil di Tambah</div>');
					 redirect('pegawai/penghargaan','refresh');
	 }
 
		 function updatedatapenghargaan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_penghargaan');
 
			 $this->load->view('pegawai/penghargaan/update', $data);
		 }
 
		 function action_updatedatapenghargaan($id='')
		 {
			 $data = array(
				'nama_penghargaan'=>$this->input->post('nama_penghargaan'),
				'tahun_perolehan'=>$this->input->post('tahun_perolehan'),
				'institusi'=>$this->input->post('institusi')
			 );	
			 $this->Model_penghargaan->updatedatapenghargaan($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil diubah</div>');
			 redirect('pegawai/penghargaan');
		 }
 
		function action_deletedatapenghargaan($id = '')
		 {
				 $this->Model_penghargaan->deletedatapenghargaan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil dihapus</div>');
				 redirect('pegawai/penghargaan','refresh');
		 }

		 	   // pengalaman_luarnegeri

	 function pengalaman_luarnegeri()
	 {
		 $data['content'] = $this->Model_pengalaman_luarnegeri->Getpengalaman_luarnegeri();
		 $this->load->view('pegawai/pengalaman_luarnegeri/pengalaman_luarnegeri', $data);
	 }
	 
	 function menambahdatapengalaman_luarnegeri()
	 {
		 $this->load->view('pegawai/pengalaman_luarnegeri/add');   
	 }
 
	 function action_menambahdatapengalaman_luarnegeri()
	 {       
					 $data = array(
						 'negara'=>$this->input->post('negara'),
						 'tujuan'=>$this->input->post('tujuan'),
						 'tanggal_mulai'=>$this->input->post('tanggal_mulai'),
						 'tanggal_sampai'=>$this->input->post('tanggal_sampai'),
						 'yang_membiayai'=>$this->input->post('yang_membiayai')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_pengalaman_luarnegeri->menambahdatapengalaman_luarnegeri($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil di Tambah</div>');
					 redirect('pegawai/pengalaman_luarnegeri','refresh');
	 }
 
		 function updatedatapengalaman_luarnegeri($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_pengalaman_luarnegeri');
 
			 $this->load->view('pegawai/pengalaman_luarnegeri/update', $data);
		 }
 
		 function action_updatedatapengalaman_luarnegeri($id='')
		 {
			 $data = array(
						'negara'=>$this->input->post('negara'),
						 'tujuan'=>$this->input->post('tujuan'),
						 'tanggal_mulai'=>$this->input->post('tanggal_mulai'),
						 'tanggal_sampai'=>$this->input->post('tanggal_sampai'),
						 'yang_membiayai'=>$this->input->post('yang_membiayai')
			 );	
			 $this->Model_pengalaman_luarnegeri->updatedatapengalaman_luarnegeri($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil diubah</div>');
			 redirect('pegawai/pengalaman_luarnegeri');
		 }
 
		function action_deletedatapengalaman_luarnegeri($id = '')
		 {
				 $this->Model_pengalaman_luarnegeri->deletedatapengalaman_luarnegeri($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pengalaman Luar Negeri berhasil dihapus</div>');
				 redirect('pegawai/pengalaman_luarnegeri','refresh');
		 }


		 // keluarga

	 function keluarga()
	 {
		 $data['content'] = $this->Model_keluarga->Getkeluarga();
		 $this->load->view('pegawai/keluarga/keluarga', $data);
	 }
	 
	 function menambahdatakeluarga()
	 {
		 $this->load->view('pegawai/keluarga/add');   
	 }
 
	 function action_menambahdatakeluarga()
	 {       
					 $data = array(
						 'kategori'=>$this->input->post('kategori'),
						 'nama'=>$this->input->post('nama'),
						 'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
						 'tempat_lahir'=>$this->input->post('tempat_lahir'),
						 'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
						 'pekerjaan'=>$this->input->post('pekerjaan'),
						 'ket'=>$this->input->post('ket'),
						 'status'=>$this->input->post('status'),
						 'tanggal_nikah'=>$this->input->post('tanggal_nikah')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_keluarga->menambahdatakeluarga($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keluarga berhasil di Tambah</div>');
					 redirect('pegawai/keluarga','refresh');
	 }
 
		 function updatedatakeluarga($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_keluarga');
 
			 $this->load->view('pegawai/keluarga/update', $data);
		 }
 
		 function action_updatedatakeluarga($id='')
		 {
			 $data = array(
				'kategori'=>$this->input->post('kategori'),
				'nama'=>$this->input->post('nama'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'pekerjaan'=>$this->input->post('pekerjaan'),
				'ket'=>$this->input->post('ket'),
				'status'=>$this->input->post('status'),
				'tanggal_nikah'=>$this->input->post('tanggal_nikah')
			 );	
			 $this->Model_keluarga->updatedatakeluarga($data, $id);

			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keluarga berhasil diubah</div>');
			 redirect('pegawai/keluarga');
		 }
 
		function action_deletedatakeluarga($id = '')
		 {
				 $this->Model_keluarga->deletedatakeluarga($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keluarga berhasil dihapus</div>');
				 redirect('pegawai/keluarga','refresh');
		 }

		  // organisasi

	 function organisasi()
	 {
		 $data['content'] = $this->Model_organisasi->Getorganisasi();
		 $this->load->view('pegawai/organisasi/organisasi', $data);
	 }
	 
	 function menambahdataorganisasi()
	 {
		 $this->load->view('pegawai/organisasi/add');   
	 }
 
	 function action_menambahdataorganisasi()
	 {       
					 $data = array(
						 'masa'=>$this->input->post('masa'),
						 'nama'=>$this->input->post('nama'),
						 'kedudukan'=>$this->input->post('kedudukan'),
						 'tahun'=>$this->input->post('tahun'),
						 'tempat'=>$this->input->post('tempat'),
						 'nama_pimpinan'=>$this->input->post('nama_pimpinan')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_organisasi->menambahdataorganisasi($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Organisasi berhasil di Tambah</div>');
					 redirect('pegawai/organisasi','refresh');
	 }
 
		 function updatedataorganisasi($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_organisasi');
 
			 $this->load->view('pegawai/organisasi/update', $data);
		 }
 
		 function action_updatedataorganisasi($id='')
		 {
			 $data = array(
				'masa'=>$this->input->post('masa'),
				'nama'=>$this->input->post('nama'),
				'kedudukan'=>$this->input->post('kedudukan'),
				'tahun'=>$this->input->post('tahun'),
				'tempat'=>$this->input->post('tempat'),
				'nama_pimpinan'=>$this->input->post('nama_pimpinan')
			 );	
			 $this->Model_organisasi->updatedataorganisasi($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Organisasi berhasil diubah</div>');
			 redirect('pegawai/organisasi');
		 }
 
		function action_deletedataorganisasi($id = '')
		 {
				 $this->Model_organisasi->deletedataorganisasi($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Organisasi berhasil dihapus</div>');
				 redirect('pegawai/organisasi','refresh');
		 }

		   // drh_keteranganlain

	 function drh_keteranganlain()
	 {
		 $data['content'] = $this->Model_drh_keteranganlain->Getdrh_keteranganlain();
		 $this->load->view('pegawai/drh_keteranganlain/drh_keteranganlain', $data);
	 }
	 
	 function menambahdatadrh_keteranganlain()
	 {
		 $this->load->view('pegawai/drh_keteranganlain/add');   
	 }
 
	 function action_menambahdatadrh_keteranganlain()
	 {       
					 $data = array(
						 'nama_keterangan'=>$this->input->post('nama_keterangan'),
						 'surat_keterangan'=>$this->input->post('surat_keterangan'),
						 'no_surat_keterangan'=>$this->input->post('no_surat_keterangan'),
						 'tanggal'=>$this->input->post('tanggal')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_drh_keteranganlain->menambahdatadrh_keteranganlain($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keterangan Lain berhasil di Tambah</div>');
					 redirect('pegawai/drh_keteranganlain','refresh');
	 }
 
		 function updatedatadrh_keteranganlain($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_drh_keteranganlain');
 
			 $this->load->view('pegawai/drh_keteranganlain/update', $data);
		 }
 
		 function action_updatedatadrh_keteranganlain($id='')
		 {
			 $data = array(
				'nama_keterangan'=>$this->input->post('nama_keterangan'),
				'surat_keterangan'=>$this->input->post('surat_keterangan'),
				'no_surat_keterangan'=>$this->input->post('no_surat_keterangan'),
				'tanggal'=>$this->input->post('tanggal')
			 );	
			 $this->Model_drh_keteranganlain->updatedatadrh_keteranganlain($data, $id);

			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keterangan Lain berhasil diubah</div>');
			 redirect('pegawai/drh_keteranganlain');
		 }
 
		function action_deletedatadrh_keteranganlain($id = '')
		 {
				 $this->Model_drh_keteranganlain->deletedatadrh_keteranganlain($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Keterangan Lain berhasil dihapus</div>');
				 redirect('pegawai/drh_keteranganlain','refresh');
		 }

		   // du_kepangkatan

	 function du_kepangkatan()
	 {
		 $data['content'] = $this->Model_du_kepangkatan->Getdu_kepangkatan();
		 $this->load->view('pegawai/du_kepangkatan/du_kepangkatan', $data);
	 }
	 
	 function menambahdatadu_kepangkatan()
	 {
		 $this->load->view('pegawai/du_kepangkatan/add');   
	 }
 
	 function action_menambahdatadu_kepangkatan()
	 {       
					 $data = array(
						 'tahun'=>$this->input->post('tahun'),
						 'urutan'=>$this->input->post('urutan')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_du_kepangkatan->menambahdatadu_kepangkatan($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Daftar Urutan Kepangkatan Lain berhasil di Tambah</div>');
					 redirect('pegawai/du_kepangkatan','refresh');
	 }
 
		 function updatedatadu_kepangkatan($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_du_kepangkatan');
 
			 $this->load->view('pegawai/du_kepangkatan/update', $data);
		 }
 
		 function action_updatedatadu_kepangkatan($id='')
		 {
			 $data = array(
				'tahun'=>$this->input->post('tahun'),
				'urutan'=>$this->input->post('urutan')
			 );	
			 $this->Model_du_kepangkatan->updatedatadu_kepangkatan($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Daftar Urutan Kepangkatan Lain berhasil diubah</div>');
			 redirect('pegawai/du_kepangkatan');
		 }
 
		function action_deletedatadu_kepangkatan($id = '')
		 {
				 $this->Model_du_kepangkatan->deletedatadu_kepangkatan($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Daftar Urutan Kepangkatan berhasil dihapus</div>');
				 redirect('pegawai/du_kepangkatan','refresh');
		 }

		   // skp

	 function skp()
	 {
		 $data['content'] = $this->Model_skp->Getskp();
		 $this->load->view('pegawai/skp/skp', $data);
	 }
	 
	 function menambahdataskp()
	 {
		 $this->load->view('pegawai/skp/add');   
	 }
 
	 function action_menambahdataskp()
	 {       
					 $data = array(
						 'tahun'=>$this->input->post('tahun'),
						 'pejabat_penilai'=>$this->input->post('pejabat_penilai'),
						 'atasan_pejabat_penilai'=>$this->input->post('atasan_pejabat_penilai'),
						 'nilai'=>$this->input->post('nilai')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_skp->menambahdataskp($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data DP3/SKP berhasil di Tambah</div>');
					 redirect('pegawai/skp','refresh');
	 }
 
		 function updatedataskp($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_skp');
 
			 $this->load->view('pegawai/skp/update', $data);
		 }
 
		 function action_updatedataskp($id='')
		 {
			 $data = array(
				'tahun'=>$this->input->post('tahun'),
				'pejabat_penilai'=>$this->input->post('pejabat_penilai'),
				'atasan_pejabat_penilai'=>$this->input->post('atasan_pejabat_penilai'),
				'nilai'=>$this->input->post('nilai')
			 );	
			 $this->Model_skp->updatedataskp($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data DP3/SKP Lain berhasil diubah</div>');
			 redirect('pegawai/skp');
		 }
 
		function action_deletedataskp($id = '')
		 {
				 $this->Model_skp->deletedataskp($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data DP3/SKP berhasil dihapus</div>');
				 redirect('pegawai/skp','refresh');
		 }

		 // disiplin

	 function disiplin()
	 {
		 $data['content'] = $this->Model_disiplin->Getdisiplin();
		 $this->load->view('pegawai/disiplin/disiplin', $data);
	 }
	 
	 function menambahdatadisiplin()
	 {
		 $this->load->view('pegawai/disiplin/add');   
	 }
 
	 function action_menambahdatadisiplin()
	 {       
					 $data = array(
						 'tahun'=>$this->input->post('tahun'),
						 'tingkat'=>$this->input->post('tingkat'),
						 'jenis'=>$this->input->post('jenis')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_disiplin->menambahdatadisiplin($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Disiplin berhasil di Tambah</div>');
					 redirect('pegawai/disiplin','refresh');
	 }
 
		 function updatedatadisiplin($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_disiplin');
 
			 $this->load->view('pegawai/disiplin/update', $data);
		 }
 
		 function action_updatedatadisiplin($id='')
		 {
			 $data = array(
				'tahun'=>$this->input->post('tahun'),
				'tingkat'=>$this->input->post('tingkat'),
				'jenis'=>$this->input->post('jenis')
			 );	
			 $this->Model_disiplin->updatedatadisiplin($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Disiplin Lain berhasil diubah</div>');
			 redirect('pegawai/disiplin');
		 }
 
		function action_deletedatadisiplin($id = '')
		 {
				 $this->Model_disiplin->deletedatadisiplin($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Disiplin berhasil dihapus</div>');
				 redirect('pegawai/disiplin','refresh');
		 }

		  // penyaji

	 function penyaji()
	 {
		 $data['content'] = $this->Model_penyaji->Getpenyaji();
		 $this->load->view('pegawai/penyaji/penyaji', $data);
	 }
	 
	 function menambahdatapenyaji()
	 {
		 $this->load->view('pegawai/penyaji/add');   
	 }
 
	 function action_menambahdatapenyaji()
	 {       
					 $data = array(
						 'tempat'=>$this->input->post('tempat'),
						 'judul_makalah'=>$this->input->post('judul_makalah'),
						 'tahun'=>$this->input->post('tahun'),
						 'peran'=>$this->input->post('peran')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_penyaji->menambahdatapenyaji($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Penyaji berhasil di Tambah</div>');
					 redirect('pegawai/penyaji','refresh');
	 }
 
		 function updatedatapenyaji($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_penyaji');
 
			 $this->load->view('pegawai/penyaji/update', $data);
		 }
 
		 function action_updatedatapenyaji($id='')
		 {
			 $data = array(
				'tempat'=>$this->input->post('tempat'),
				'judul_makalah'=>$this->input->post('judul_makalah'),
				'tahun'=>$this->input->post('tahun'),
				'peran'=>$this->input->post('peran')
			 );	
			 $this->Model_penyaji->updatedatapenyaji($data, $id);

			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Penyaji Lain berhasil diubah</div>');
			 redirect('pegawai/penyaji');
		 }
 
		function action_deletedatapenyaji($id = '')
		 {
				 $this->Model_penyaji->deletedatapenyaji($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Penyaji berhasil dihapus</div>');
				 redirect('pegawai/penyaji','refresh');
		 }

		 // karyatulis

	 function karyatulis()
	 {
		 $data['content'] = $this->Model_karyatulis->Getkaryatulis();
		 $this->load->view('pegawai/karyatulis/karyatulis', $data);
	 }
	 
	 function menambahdatakaryatulis()
	 {
		 $this->load->view('pegawai/karyatulis/add');   
	 }
 
	 function action_menambahdatakaryatulis()
	 {       
					 $data = array(
						 'tahun'=>$this->input->post('tahun'),
						 'judul'=>$this->input->post('judul')
					 );
					 $data['nip']= $this->session->userdata('nip');
					 $this->Model_karyatulis->menambahdatakaryatulis($data);

					 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
					 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);
 
					 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Buku/Karya Tulis/Makalah berhasil di Tambah</div>');
					 redirect('pegawai/karyatulis','refresh');
	 }
 
		 function updatedatakaryatulis($id = NULL)
		 {
			 $this->db->where('id', $id);
			 $data['content'] = $this->db->get('tbl_karyatulis');
 
			 $this->load->view('pegawai/karyatulis/update', $data);
		 }
 
		 function action_updatedatakaryatulis($id='')
		 {
			 $data = array(
				'tahun'=>$this->input->post('tahun'),
				'judul'=>$this->input->post('judul')
			 );	
			 $this->Model_karyatulis->updatedatakaryatulis($data, $id);
 
			 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
			 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

			 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Buku/Karya Tulis/Makalah Lain berhasil diubah</div>');
			 redirect('pegawai/karyatulis');
		 }
 
		function action_deletedatakaryatulis($id = '')
		 {
				 $this->Model_karyatulis->deletedatakaryatulis($id);

				 $data2['status_verifikasi'] = "Belum Diverifikasi";
$nip=$this->session->userdata('nip');
				 $this->Model_pegawai->updatestatusverifikasi($data2, $nip);

				 $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Buku/Karya Tulis/Makalah berhasil dihapus</div>');
				 redirect('pegawai/karyatulis','refresh');
		 }



	// Verifikasi Data Pegawai

	function verifikasidatapegawai()
	{
		$data['content'] = $this->Model_verifikasidatapegawai->Getverifikasidatapegawai();
		$this->load->view('pegawai/verifikasidatapegawai/verifikasidatapegawai', $data);
	}
	
	function menambahdataverifikasidatapegawai()
	{
		$this->load->view('pegawai/verifikasidatapegawai/add');   
	}

	function action_menambahdataverifikasidatapegawai()
	{       
		$nip = $this->input->post('nip');
        $this->db->from('tbl_pegawai');
        $this->db->where('nip', $nip);
        $query = $this->db->get();  
        $rowcount = $query->num_rows();
 
        if ($rowcount>0){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">NIP sudah Terdaftar</div>');
					redirect('pegawai/verifikasidatapegawai','refresh');
        }else{
			$data = array(
				'nip'=>$this->input->post('nip'),
				'nama'=>$this->input->post('nama')
			);
			$data['password']= $this->input->post('nip');
			$data['id_opd']= $this->session->userdata('id_opd');
			$this->Model_verifikasidatapegawai->menambahdataverifikasidatapegawai($data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pegawai berhasil di Tambah</div>');
			redirect('pegawai/verifikasidatapegawai','refresh');
		}
	}


		function updateverifikasidatapegawai($nip='')
		{
			$data['status_verifikasi']= "Sudah Diverifikasi";
			$this->Model_verifikasidatapegawai->updatedataverifikasidatapegawai($data, $nip);


			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pegawai berhasil diubah</div>');
			redirect('pegawai/verifikasidatapegawai');
		}


	// CETAK BIODATA
	public function cetakbiodata($nip='')
	{
		if ($nip==NULL) {
			$nip=$this->session->userdata('nip');
		}

		$data['detailpegawai'] = $this->Model_detailpegawai->cetakdetailpegawai($nip);
		$data['pangkatterakhir'] = $this->Model_detailpegawai->cetakpangkatterakhir($nip);
		$data['jabatanterakhir'] = $this->Model_detailpegawai->cetakjabatanterakhir($nip);
	
		$data['riwayatkepangkatan'] = $this->Model_detailpegawai->cetakriwayatkepangkatan($nip);
		$data['riwayatjabatan'] = $this->Model_detailpegawai->cetakriwayatjabatan($nip);
		$data['pendidikan'] = $this->Model_detailpegawai->cetakpendidikan($nip);

		
		$data['pelatihankepempimpinan'] = $this->Model_detailpegawai->cetakpelatihankepempimpinan($nip);
		$data['pelatihanfungsional'] = $this->Model_detailpegawai->cetakpelatihanfungsional($nip);
		$data['pelatihanteknis'] = $this->Model_detailpegawai->cetakpelatihanteknis($nip);
		$data['pelatihanwawasan'] = $this->Model_detailpegawai->cetakpelatihanwawasan($nip);

		
		$data['duk'] = $this->Model_detailpegawai->cetakduk($nip);
		$data['skp'] = $this->Model_detailpegawai->cetakskp($nip);
		$data['disiplin'] = $this->Model_detailpegawai->cetakdisiplin($nip);
		$data['penyaji'] = $this->Model_detailpegawai->cetakpenyaji($nip);
		$data['makalah'] = $this->Model_detailpegawai->cetakmakalah($nip);
	
		$this->load->view('pegawai/cetakbiodata',$data);
	}

	// CETAK DAFTAR RIWAYAT HIDUP
	public function cetakdaftarriwayathidup($nip='')
	{
		if ($nip==NULL) {
			$nip=$this->session->userdata('nip');
		}
		
		$data['detailpegawai'] = $this->Model_detailpegawai->cetakdetailpegawai($nip);
		$data['pangkatterakhir'] = $this->Model_detailpegawai->cetakpangkatterakhir($nip);
		$data['jabatanterakhir'] = $this->Model_detailpegawai->cetakjabatanterakhir($nip);
	
		$data['riwayatkepangkatan'] = $this->Model_detailpegawai->cetakriwayatkepangkatan($nip);
		$data['riwayatjabatan'] = $this->Model_detailpegawai->cetakriwayatjabatan($nip);
		$data['pendidikan'] = $this->Model_detailpegawai->cetakpendidikan($nip);

		
		$data['pelatihankepempimpinan'] = $this->Model_detailpegawai->cetakpelatihankepempimpinan($nip);
		$data['pelatihanfungsional'] = $this->Model_detailpegawai->cetakpelatihanfungsional($nip);
		$data['pelatihanteknis'] = $this->Model_detailpegawai->cetakpelatihanteknis($nip);
		$data['pelatihanwawasan'] = $this->Model_detailpegawai->cetakpelatihanwawasan($nip);

		
		$data['duk'] = $this->Model_detailpegawai->cetakduk($nip);
		$data['skp'] = $this->Model_detailpegawai->cetakskp($nip);
		$data['disiplin'] = $this->Model_detailpegawai->cetakdisiplin($nip);
		$data['penyaji'] = $this->Model_detailpegawai->cetakpenyaji($nip);
		$data['makalah'] = $this->Model_detailpegawai->cetakmakalah($nip);

		
		$data['kursus'] = $this->Model_detailpegawai->cetakkursus($nip);
		$data['penghargaan'] = $this->Model_detailpegawai->cetakpenghargaan($nip);
		$data['pengalamanluarnegeri'] = $this->Model_detailpegawai->cetakpengalamanluarnegeri($nip);

		
		$data['suamiistri'] = $this->Model_detailpegawai->cetaksuamiistri($nip);
		$data['anak'] = $this->Model_detailpegawai->cetakanak($nip);
		$data['bapakibukandung'] = $this->Model_detailpegawai->cetakbapakibukandung($nip);
		$data['bapakibumertua'] = $this->Model_detailpegawai->cetakbapakibumertua($nip);
		$data['saudara'] = $this->Model_detailpegawai->cetaksaudara($nip);

		
		$data['organisasislta'] = $this->Model_detailpegawai->cetakorganisasislta($nip);
		$data['organisasiperguruantinggi'] = $this->Model_detailpegawai->cetakorganisasiorganisasiperguruantinggi($nip);

		$data['keteranganlain'] = $this->Model_detailpegawai->cetakketeranganlain($nip);

		$this->load->view('pegawai/cetakdaftarriwayathidup',$data);
	}

	// Update data pegawai

	function updatedatapegawai($nip = NULL)
    {
        	$this->db->where('nip', $nip);
            $data['content'] = $this->db->get('tbl_pegawai');
			$this->load->view('pegawai/verifikasidatapegawai/updatedatapegawai', $data);
	}
	
    function action_updatedatapegawai($nip ='')
    {
        $data = array(
            'nama'=>$this->input->post('nama')
        );	
        $this->Model_pegawai->updatedatapegawai($data, $nip);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Pegawai berhasil diubah</div>');
        redirect('pegawai/verifikasidatapegawai');
	}

}
