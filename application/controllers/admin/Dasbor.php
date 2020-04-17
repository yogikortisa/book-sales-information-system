<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_buku
		$this->load->model('model_buku');
	}
	
	public function index()
	{
		$data['bukus'] = $this->model_buku->all();
		$this->load->view('backend/view_all_buku', $data);
	}

}