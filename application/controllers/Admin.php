<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_admin','madmin');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$this->load->view('admin/admin_beranda');
	}
	function ambil_user()
	{
		$data['admin'] = $this->madmin->ambil_user(10,0)->result();
		$this->load->view('admin/tabel_admin',$data);
	}
	
}
