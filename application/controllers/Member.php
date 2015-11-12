<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public $limit = 10;
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_member','mmember');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$this->load->view('member/member_beranda');
	}
	
	function ambil_member()
	{
		$data['total'] = $this->mmember->ambil_member(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['member']=$this->mmember->ambil_member($this->limit,0)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function cari_member()
	{
		$param=$this->input->post('param');
		$data['total'] = $this->mmember->cari_member(0,0,$param)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['member']=$this->mmember->cari_member($this->limit,0,$param)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function halaman()
	{
		$offset=$this->input->post('offset');
		if($offset==1){$offset=0;}else{$offset=($offset*$this->limit)/$offset;}
		$data['total'] = $this->mmember->ambil_member(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = $offset;
		$data['member']=$this->mmember->ambil_member($this->limit,$offset)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function simpan_member()
	{
		$nama=$this->input->post('nama');
		$jid=$this->input->post('jid');
		$nik=$this->input->post('nik');
		$alamat=$this->input->post('alamat');
		$hp=$this->input->post('hp');
		$this->mmember->simpan_member($nama,$jid,$nik,$alamat,$hp);
		$data['total'] = $this->mmember->ambil_member(0,0)->num_rows();
		$data['halaman'] = $limit;
		$offset=0;
		$data['member']=$this->mmember->ambil_member($this->limit,$offset)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function update_member()
	{
		$id_member=$this->input->post('id_member');
		$nama=$this->input->post('nama');
		$jid=$this->input->post('jid');
		$nik=$this->input->post('nik');
		$alamat=$this->input->post('alamat');
		$hp=$this->input->post('hp');
		$this->mmember->update_member($id_member,$nama,$jid,$nik,$alamat,$hp);
		$offset=0;
		$data['total'] = $this->mmember->ambil_member(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = $this->limit;
		$data['member']=$this->mmember->ambil_member($this->limit,$offset)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function hapus_member()
	{
		$id_member=$this->input->post('id_member');
		$this->mmember->hapus_member($id_member);
		$offset=0;
		$data['total'] = $this->mmember->ambil_member(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = $this->limit;
		$data['member']=$this->mmember->ambil_member($this->limit,$offset)->result();
		$this->load->view('member/tabel_member',$data);
	}
	function tambah_member()
	{
		$this->load->view('member/tambah_member');
	}

	function detail_member()
	{
		$id_member=$this->input->post('id_member');
		$data['member']=$this->mmember->detail_member($id_member)->result();
		$this->load->view('member/detail_member',$data);
	}

	
}
