<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	   
        $session=$this->session->userdata('nip');
        if(empty($session))
        {
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
