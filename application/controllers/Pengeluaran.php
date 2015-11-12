<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_pengeluaran','mpengeluaran');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$this->load->view('pengeluaran/pengeluaran_beranda');
	}
	function ambil_pengeluaran()
	{
		$data['pengeluaran'] = $this->mpengeluaran->ambil_pengeluaran(10,0)->result();
		$this->load->view('pengeluaran/tabel_pengeluaran',$data);
	}
	
}
