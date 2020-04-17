<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_kasir
		$this->load->model('model_kasir');
	}
	
	public function index()
	{
		$data['kasirs'] = $this->model_kasir->all();
		$this->load->view('backend/view_all_kasir', $data);
	}
	
	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|md5');
		$this->form_validation->set_rules('akses', 'Akses', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_tambah_kasir');
		} 
		else
		{
			$data_kasir =	array(
					'nama'			=> set_value('nama'),
					'alamat'	=> set_value('alamat'),
					'telepon'			=> set_value('telepon'),
					'status'			=> set_value('status'),
					'username'			=> set_value('username'),
					'password'	=> set_value('password'),
					'akses'		=> set_value('akses')
				);
			$this->model_kasir->create($data_kasir);
			redirect('admin/kasir');
		}			
	}
	
	public function update($id){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|md5');
		$this->form_validation->set_rules('akses', 'Akses', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['kasir'] = $this->model_kasir->find($id);
			$this->load->view('backend/form_edit_kasir', $data);
		} else {

				$data_kasir =	array(
					'nama'			=> set_value('nama'),
					'alamat'	=> set_value('alamat'),
					'telepon'			=> set_value('telepon'),
					'status'			=> set_value('status'),
					'username'			=> set_value('username'),
					'password'	=> set_value('password'),
					'akses'		=> set_value('akses')
				);
				$this->model_kasir->update($id, $data_kasir);
				redirect('admin/kasir');
				
			}
		}
	
	public function delete($id){
		$this->model_kasir->delete($id);
		redirect('admin/kasir');
	}
}