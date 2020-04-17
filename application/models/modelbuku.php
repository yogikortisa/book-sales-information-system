<?php

class ModelBuku extends CI_Model{
	
	function tampillistbuku(){

		//Ambil data buku dari tabel buku
		$buku = $this->db->get('buku');
		//$buku = $this->db->query('select * from buku');

		return $buku;
	}

	function infobuku($idbuku){
		
		return $this->db->get_where('buku', ['id_buku'=>$idbuku]);

	}

	function caribuku($judul){
		$this->db->like('judul', $judul);
		$buku = $this->db->get('buku');

		return $buku;
		

	}

}

?>