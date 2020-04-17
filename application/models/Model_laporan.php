<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	public function all(){
		//query semua record di table products
		$this->db->select('a.*, b.nama_distributor, c.judul');
		$this->db->from('laporan a, distributor b, buku c');
		$where = "((a.id_distributor = b.id_distributor) AND (a.id_buku = c.id_buku))";
		$this->db->where($where);
		//$hasil = $this->db->get('pasok');
		$hasil = $this->db->query("SELECT a.*, b.nama, c.judul FROM penjualan a, kasir b, buku c WHERE ((a.id_kasir=b.id_kasir) AND (a.id_buku=c.id_buku))");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id_laporan', $id)
						  ->limit(1)
						  ->get('laporan');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('laporan', $data_products);
	}

	public function update($id, $data_products){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id_laporan', $id)
				 ->update('laporan', $data_products);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id_penjualan', $id)
				 ->delete('penjualan');
	}
	
}