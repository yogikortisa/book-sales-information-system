<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_distributor extends CI_Model {

	public function all(){
		//query semua record di table products
		$hasil = $this->db->get('distributor');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id_distributor', $id)
						  ->limit(1)
						  ->get('distributor');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('distributor', $data_products);
	}

	public function update($id, $data_products){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id_distributor', $id)
				 ->update('distributor', $data_products);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id_distributor', $id)
				 ->delete('distributor');
	}
	
}