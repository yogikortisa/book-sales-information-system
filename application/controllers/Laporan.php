<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') == '2'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_laporan
		$this->load->model('model_laporan');
	}
	
	public function index()
	{
		$data['laporans'] = $this->model_laporan->all();
		$this->load->view('backend/view_all_laporan', $data);
	}
	
	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('id_distributor', 'ID Distributor', 'required');
		$this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['distributor']=$this->db->query("SELECT * FROM distributor")->result();
			$data['buku']=$this->db->query("SELECT * FROM buku")->result();
			$this->load->view('backend/form_tambah_laporan',$data);
		} 
		else
		{
			$data_laporan =	array(
					'id_distributor'	=> set_value('id_distributor'),
					'id_buku'	=> set_value('id_buku'),
					'jumlah'			=> set_value('jumlah'),
					'tanggal'	=> date('Y-m-d')
				);
			$this->model_laporan->create($data_laporan);
			redirect('admin/laporan');
		}			
	}
	
	public function update($id){
		$this->form_validation->set_rules('id_distributor');
		$this->form_validation->set_rules('id_buku');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['distributor']=$this->db->query("SELECT * FROM distributor")->result();
			$data['buku']=$this->db->query("SELECT * FROM buku")->result();
			$data['laporan'] = $this->model_laporan->find($id);
			$this->load->view('backend/form_edit_laporan', $data);
		} else {

				$data_laporan =	array(
					'id_distributor'	=> set_value('id_distributor'),
					'id_buku'	=> set_value('id_buku'),
					'jumlah'			=> set_value('jumlah'),
					'tanggal'	=> date('Y-m-d')
				);
				$this->model_laporan->update($id, $data_laporan);
				redirect('admin/laporan');
				
			}
		}
	
	public function delete($id){
		$this->model_laporan->delete($id);
		redirect('laporan');
	}
}