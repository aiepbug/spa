<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_login','mlogin');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$this->load->view('css');
		$this->load->view('login');
		$this->load->view('js');
	}
	function logins()
	{
		$userid=$this->input->post('userid');
		$password=$this->input->post('password');
		$login=$this->mlogin->login($userid,$password);
		if($login->num_rows()>0)
		{
			$user=$this->mlogin->login($userid,$password)->result();
			$data=array(
			'userid'=>$userid,
			'nama'=>$user[0]->nama,
			'logged_in'=>'TRUE',
			'tahun'=>date('Y'),
			'kunci'=>'loginspa');
			$this->session->set_userdata($data);
			$this->load->view('beranda');
		}
		else
		{
			$data['pesan']='Salah Userid atau Password';
			$this->load->view('login',$data);
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		redirect('.');
		$this->load->view('css');
		$this->load->view('login');
		$this->load->view('js');
	}
}
