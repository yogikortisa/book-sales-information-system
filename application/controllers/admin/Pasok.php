<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasok extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_pasok
		$this->load->model('model_pasok');
	}
	
	public function index()
	{
		$data['pasoks'] = $this->model_pasok->all();
		$this->load->view('backend/view_all_pasok', $data);
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
			$this->load->view('backend/form_tambah_pasok',$data);
		} 
		else
		{
			$data_pasok =	array(
					'id_distributor'	=> set_value('id_distributor'),
					'id_buku'	=> set_value('id_buku'),
					'jumlah'			=> set_value('jumlah'),
					'tanggal'	=> date('Y-m-d')
				);
			$this->model_pasok->create($data_pasok);


			$this->load->model('modelbuku');
			$query = $this->modelbuku->infobuku($data_pasok['id_buku'])->row_array();

			if($query)
			{
			$stokbaru = $query['stok'] + $data_pasok['jumlah'];
			$databuku = [												
							'stok'			=> $stokbaru
							];
			$this->db->where('id_buku', $data_pasok['id_buku']);
			$this->db->update('buku', $databuku);
			redirect('admin/pasok');
			}
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
			$data['pasok'] = $this->model_pasok->find($id);
			$this->load->view('backend/form_edit_pasok', $data);
		} else {

				$data_pasok =	array(
					'id_distributor'	=> set_value('id_distributor'),
					'id_buku'	=> set_value('id_buku'),
					'jumlah'			=> set_value('jumlah'),
					'tanggal'	=> date('Y-m-d')
				);
				$this->model_pasok->update($id, $data_pasok);


				$this->load->model('modelbuku');
				$query = $this->modelbuku->infobuku($data_pasok['id_buku'])->row_array();

				if($query)
				{
					$stokbaru = $query['stok'] + $data_pasok['jumlah'];
					$databuku = [												
									'stok'			=> $stokbaru
									];
					$this->db->where('id_buku', $data_pasok['id_buku']);
					$this->db->update('buku', $databuku);
					redirect('admin/pasok');
				}
				
			}
		}
	
	public function delete($id){
		$this->model_pasok->delete($id);
		redirect('admin/pasok');
	}
}