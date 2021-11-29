<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_login');
		$this->load->model('model_menu');
	}

	public function index()
	{
		$this->load->view('drw/menu');
	}

	public function datapribadi()
	{
		$this->load->view('drw/menu');
	}

	public function datapegawai()
	{
		$data['content'] = $this->model_menu->semuapegawai();
		$this->load->view('drw/datapegawai',$data);
	}

	public function verifikasidatapegawai()
	{
		$this->load->view('drw/verifikasidatapegawai');
	}

	public function suratkeputusan()
	{
		$this->load->view('drw/suratkeputusan');
	}
}
