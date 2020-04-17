<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

	function datahariini() {

		//$this->db->select("SELECT a.*, b.nama as namakasir, c.id_buku as judulbuku");
		$where = "((a.id_kasir=b.id_kasir AND a.id_buku=c.id_buku))";
		$result = $this->db->where($where);
		$this->db->where('tanggal',date('Y-m-d'));
        $this->db->from('penjualan a, kasir b, buku c');
        $query = $this->db->get();
        return $query->result();
    }

    function dataperiode($minvalue,$maxvalue) {

		$this->db->where('a.tanggal >=', $minvalue);
		$this->db->where('a.tanggal <=', $maxvalue);
		$where = "((a.id_kasir=b.id_kasir AND a.id_buku=c.id_buku))";
		$result = $this->db->where($where);
        $this->db->from('penjualan a, kasir b, buku c');
        $query = $this->db->get();
        return $query->result();
    }
}
