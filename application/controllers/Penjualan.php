<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') == '3'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_penjualan
		//$this->load->model('model_penjualan');
		//$this->load->model('model_buku');
		error_reporting(0);
	}
	
	public function index()
	{
		//$data['penjualans'] = $this->model_penjualan->all();
		//$data['bukus'] = $this->model_buku->all();
		//$data['bukus']=$this->db->query("SELECT * FROM buku")->result();
		$this->load->model('modelbuku');

		$buku = $this->modelbuku->tampillistbuku()->result(); 
		
		$data['bukus'] = $buku; 
		$this->load->view('backend/view_all_penjualan', $data);
	}
	
	function edit(){
		//echo "Edit";
		$idbuku = $this->uri->segment(3);
		$this->load->model('modelbuku');
		$data['buku'] = $this->modelbuku->infobuku($idbuku)->row_array();
		$this->load->view('editbuku', $data);
	}

	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('noisbn', 'No. ISBN', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga_pokok', 'Harga Pokok', 'required|integer');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|integer');
		$this->form_validation->set_rules('ppn', 'PPN', 'required|float');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required|float');
		//$this->form_validation->set_rules('userfile', 'Product Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_tambah_penjualan');
		} else {
			
			//load uploading file library
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300'; //KB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				//file gagal diupload -> kembali ke form tambah
				$this->load->view('backend/form_tambah_penjualan');
			} else {
				//file berhasil diupload -> lanjutkan ke query INSERT
				// eksekusi query INSERT
				$gambar = $this->upload->data();
				$data_penjualan =	array(
					'judul'			=> set_value('judul'),
					'noisbn'	=> set_value('noisbn'),
					'penulis'			=> set_value('penulis'),
					'penerbit'			=> set_value('penerbit'),
					'tahun'			=> set_value('tahun'),
					'stok'	=> set_value('stok'),
					'harga_pokok'		=> set_value('harga_pokok'),
					'harga_jual'		=> set_value('harga_jual'),
					'ppn'		=> set_value('ppn'),
					'diskon'		=> set_value('diskon'),
					'image'			=> $gambar['file_name']
				);
				$this->model_penjualan->create($data_penjualan);
				redirect('admin/penjualan');
			}
			
		}
	}
	
	public function update($id){
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('noisbn', 'No. ISBN', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga_pokok', 'Harga Pokok', 'required|integer');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|integer');
		$this->form_validation->set_rules('ppn', 'PPN', 'required|float');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required|float');

		if ($this->form_validation->run() == FALSE)
		{
			$data['penjualan'] = $this->model_penjualan->find($id);
			$this->load->view('backend/form_edit_penjualan', $data);
		} else {
			if($_FILES['userfile']['name'] != ''){
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '300'; //KB
				$config['max_width']  = '2000'; //pixels
				$config['max_height']  = '2000'; //pixels

				$this->load->library('upload', $config);
			
			
				if ( ! $this->upload->do_upload())
				{
					$data['product'] = $this->model_penjualan->find($id);
					$this->load->view('backend/form_edit_penjualan', $data);
				} else {
					$gambar = $this->upload->data();
					$data_product =	array(
					'judul'			=> set_value('judul'),
					'noisbn'	=> set_value('noisbn'),
					'penulis'			=> set_value('penulis'),
					'penerbit'			=> set_value('penerbit'),
					'tahun'			=> set_value('tahun'),
					'stok'	=> set_value('stok'),
					'harga_pokok'		=> set_value('harga_pokok'),
					'harga_jual'		=> set_value('harga_jual'),
					'ppn'		=> set_value('ppn'),
					'diskon'		=> set_value('diskon'),
					'image'			=> $gambar['file_name']
					);
					$this->model_penjualan->update($id, $data_product);
					redirect('admin/penjualan');
				}
			} else {
				//form submit dengan gambar dikosongkan
				$data_product =	array(
					'judul'			=> set_value('judul'),
					'noisbn'	=> set_value('noisbn'),
					'penulis'			=> set_value('penulis'),
					'penerbit'			=> set_value('penerbit'),
					'tahun'			=> set_value('tahun'),
					'stok'	=> set_value('stok'),
					'harga_pokok'		=> set_value('harga_pokok'),
					'harga_jual'		=> set_value('harga_jual'),
					'ppn'		=> set_value('ppn'),
					'diskon'		=> set_value('diskon')				);
				$this->model_penjualan->update($id, $data_product);
				redirect('admin/penjualan');
			}
		}
	}
	
	public function delete($id){
		$this->model_penjualan->delete($id);
		redirect('admin/penjualan');
	}

	function beli(){
		//echo "Edit";
		$idbuku = $this->uri->segment(3);
		$this->load->model('modelbuku');
		$data['buku'] = $this->modelbuku->infobuku($idbuku)->row_array();
		$this->load->view('checkout', $data);
	}

	function prosescheckout(){		

		$idkasir = $this->session->userdata('id_kasir');
		$idbuku = $this->input->post('id');
		$judul = $this->input->post('judul');		
		$stok = $this->input->post('stok');		
		$hargajual = $this->input->post('hargajual');
		$ppn = $this->input->post('ppn');
		$diskon = $this->input->post('diskon');
		$banyak = $this->input->post('banyak');

		$this->load->model('modelbuku');
		$query = $this->modelbuku->infobuku($idbuku)->row_array();

		if($query){			
			$sisastok = $query['stok'] - $banyak;

			if ($sisastok < 0 ) {
				echo "Pembelian gagal. Jumlah buku yang anda pesan melebihi stok yang tersedia.";

			}else{

				$databuku = [												
								'stok'			=> $sisastok
							];
				$this->db->where('id_buku', $idbuku);
				$this->db->update('buku', $databuku);

				
				if ($query['ppn'] != null && $query['diskon'] != null) {
					$ppn = $hargajual * ($query['ppn'] / 100);
					$hargappn = $hargajual + $ppn;

					$diskon = $hargappn * ($query['diskon'] / 100);
					$hargaakhir = $hargappn - $diskon;				

				}else if ($query['ppn'] != null && $query['diskon'] == null) {
					$ppn = $hargajual * ($query['ppn'] / 100);
					$hargaakhir = $hargajual + $ppn;			

				}else if ($query['ppn'] == null && $query['diskon'] != null) {
					$diskon = $hargajual * ($query['diskon'] / 100);
					$hargaakhir = $hargajual - $diskon;				
				}
				
				$grandtotal = $hargaakhir * $banyak;

				$datatransaksi = [
								'id_buku'		=> $idbuku,
								'id_kasir'		=> $idkasir,
								'jumlah'		=> $banyak,
								'total'			=> $grandtotal,
								'tanggal'		=> date("Y-m-d")
							];
									
				$queryinsert = $this->db->insert('penjualan', $datatransaksi);
				
				if ($queryinsert) {
					redirect('penjualan');
				}else{
					echo "Pembelian gagal";
				}				

			}

		}else{
			echo "Data not found";
		}
	}

}