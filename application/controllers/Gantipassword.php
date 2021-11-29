<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantipassword extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here 
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Model_login');
		$this->load->library('session');
	}

    public function index()
	{
        $data['ambil'] = $this->Model_login->Getgantipassword();
		$this->load->view('gantipassword/gantipassword', $data);
	}

	public function gantipassword()
	{
        $data['ambil'] = $this->Model_login->Getgantipassword();
		$this->load->view('gantipassword/gantipassword', $data);
	}
    

	function simpan_updatepassword($nip ='')
    {

        $password = $this->input->post('password');
		$passwordlama = $this->input->post('passwordlama');
		$passwordbaru1 = $this->input->post('passwordbaru1');
		$passwordbaru2 = $this->input->post('passwordbaru2');
 
        if ($passwordbaru1 != $passwordbaru2){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password Baru Tidak Sama</div>');
					redirect('gantipassword','refresh');
        }else if ($password != $passwordlama){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
			redirect('gantipassword','refresh');
		}else if ($passwordbaru1 == $passwordbaru2 && $password == $passwordlama){
        $data = array(
            'password'=>$this->input->post('passwordbaru2')
        );
        $this->Model_login->updatedatachangepassword($data, $password);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
        redirect('gantipassword/gantipassword');
		}
	}
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */