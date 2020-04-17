<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buku');
	}

	public function index()
	{
		$data['products'] = $this->model_buku->all();
		$this->load->view('welcome_message', $data);
	}
	
	public function add_to_cart($product_id)
	{
		$product = $this->model_buku->find($product_id);
		$data = array(
					   'id'      => $product->id_buku,
					   'qty'     => 1,
					   'price'   => $product->harga_jual,
					   'name'    => $product->judul
					);

		$this->cart->insert($data);
		redirect(base_url());
	}
	
	public function cart(){
		$this->load->view('show_cart');
	}
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
}

/* Yunan Helmi Al Anbarry */
/* Toko Online*/