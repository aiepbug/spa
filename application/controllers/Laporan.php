<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_laporan','mlaporan');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$this->load->view('laporan/laporan_beranda');
	}
		
}
