<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_distributor
		$this->load->model('model_distributor');
	}
	
	public function index()
	{
		$data['distributors'] = $this->model_distributor->all();
		$this->load->view('backend/view_all_distributor', $data);
	}
	
	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('nama_distributor', 'Nama Distributor', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_tambah_distributor');
		} 
		else
		{
			$data_distributor =	array(
					'nama_distributor'			=> set_value('nama_distributor'),
					'alamat'	=> set_value('alamat'),
					'telepon'			=> set_value('telepon')
				);
			$this->model_distributor->create($data_distributor);
			redirect('admin/distributor');
		}			
	}
	
	public function update($id){
		$this->form_validation->set_rules('nama_distributor', 'Nama Distributor', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['distributor'] = $this->model_distributor->find($id);
			$this->load->view('backend/form_edit_distributor', $data);
		} else {

				$data_distributor =	array(
					'nama_distributor'			=> set_value('nama_distributor'),
					'alamat'	=> set_value('alamat'),
					'telepon'			=> set_value('telepon')
				);
				$this->model_distributor->update($id, $data_distributor);
				redirect('admin/distributor');
				
			}
		}
	
	public function delete($id){
		$this->model_distributor->delete($id);
		redirect('admin/distributor');
	}
}