<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pasok extends CI_Model {

	public function all(){
		//query semua record di table products
		$this->db->select('a.*, b.nama_distributor, c.judul');
		$this->db->from('pasok a, distributor b, buku c');
		$where = "((a.id_distributor = b.id_distributor) AND (a.id_buku = c.id_buku))";
		$this->db->where($where);
		//$hasil = $this->db->get('pasok');
		$hasil = $this->db->query("SELECT a.*, b.nama_distributor, c.judul FROM pasok a, distributor b, buku c WHERE ((a.id_distributor = b.id_distributor) AND (a.id_buku = c.id_buku))");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id_pasok', $id)
						  ->limit(1)
						  ->get('pasok');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('pasok', $data_products);
	}

	public function update($id, $data_products){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id_pasok', $id)
				 ->update('pasok', $data_products);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id_pasok', $id)
				 ->delete('pasok');
	}
	
}