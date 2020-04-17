<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function __construct() {
        parent::__construct();
        $this->load->model('penjualan_model');
        $this->load->library('dompdf_gen');
    }
 
    // fungsi cetak pdf
    public function cetakpdfhariini(){
        $data['title'] = 'Cetak PDF Penjualan'; //judul title
        $data['qbarang'] = $this->penjualan_model->datahariini(); //query model semua barang
 		$this->load->view('cetak/laporan', $data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporanpenjualanharini.pdf", array('Attachment'=>0));
    }

    public function cetakpdfperiode(){

    	$mulai = $_POST['mulai'];
    	$selesai = $_POST['selesai'];
    	$data['mulai']=$mulai;
    	$data['selesai']=$selesai;
        $data['title'] = 'Cetak PDF Penjualan'; //judul title
        $data['qbarang'] = $this->penjualan_model->dataperiode($mulai,$selesai); //query model semua barang
 
        $this->load->view('cetak/laporan', $data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporanpenjualanharini.pdf", array('Attachment'=>0));
    }
}
