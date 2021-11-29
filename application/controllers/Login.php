<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_login');
		
		
	}

	public function index()
	{
		$session=$this->session->userdata('nip');
        if(empty($session))
        {
			$this->load->view('login');
        }else{
			redirect('welcome','refresh');
		}
	}

    public function action_login()
	{
		$nip = $this->input->post("nip");
		$password = $this->input->post("password");
		$ceklogin = $this->model_login->action_login($nip, $password);
		$cekjabatan = $this->model_login->cekjabatan($nip);

		if ($ceklogin) {
			foreach ($ceklogin as $row) {
				$this->session->set_userdata('nip', $row->nip);
				$this->session->set_userdata('nama', $row->nama);	
				$this->session->set_userdata('id_opd', $row->id_opd);	

				foreach ($cekjabatan as $cekjabatan){
				$this->session->set_userdata('gol', $cekjabatan->gol);	
				$this->session->set_userdata('eselon', $cekjabatan->eselon);	
				}

				redirect('welcome','refresh');
			}
		}
				 else {
					redirect('login','refresh');
				}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
