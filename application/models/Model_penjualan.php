<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_penjualan extends CI_Model {

	public function all(){
		//query semua record di table products
		$hasil = $this->db->get('penjualan');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id_penjualan', $id)
						  ->limit(1)
						  ->get('penjualan');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('penjualan', $data_products);
	}

	public function update($id, $data_products){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id_penjualan', $id)
				 ->update('penjualan', $data_products);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id_penjualan', $id)
				 ->delete('penjualan');
	}
	
}