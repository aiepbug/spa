<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_kasir','mkasir');
		//$this->load->library('pdf');
	}
	public function index()
	{
		$data['barang']=$this->mkasir->barang_aktif()->result();
		$data['member']=$this->mkasir->ambil_member()->result();
		$this->load->view('kasir/kasir_beranda',$data);
	}
	public function caribarang()
	{
		$param = $this->input->post('param');
		$respon=$this->mkasir->caribarang($param)->result();
		foreach($respon as $data)
		{
			echo '<li><a href="javascript:void(0)" onclick="pilihbarang('.$data->id_produk.')">'.$data->id_produk.' - '.$data->nama.'</a></li>';
		}
	}
	function tambah_transaksi()
	{
		$id=$this->input->post('id');
		$this->mkasir->tmp_transaksi($id);
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function bayar()
	{
		$member=$this->input->post('member');
		$bayar=$this->input->post('bayar');
		$id_transaksi=sha1($this->session->userdata('userid').date('Y-m-d h:m:s'));
		$this->session->set_userdata('transaksi_terakhir',$id_transaksi);
		$this->mkasir->transaksi($id_transaksi,$member,$bayar);
		$this->mkasir->kosongkan_tmp_transksi();
		//$this->mkasir->detail_transaksi();
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function struk()
	{
		$id_transaksi=$this->session->userdata('transaksi_terakhir');
		$data['struk']=$this->mkasir->struk($id_transaksi)->result();
		$this->load->view('kasir/struk',$data);
	}
	function tmp_transaksi()
	{
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function hapus_tmp_kasir()
	{
		$seq=$this->input->post('seq');
		$this->mkasir->hapus_tmp_kasir($seq);
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function update_disc()
	{
		$seq=$this->input->post('seq');
		$disc=$this->input->post('disc');
		$this->mkasir->update_disc($seq,$disc);
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function hapus_terapis()
	{
		$seq=$this->input->post('seq');
		$this->mkasir->hapus_terapis($seq);
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	function pilih_terapis()
	{
		$seq=$this->session->userdata("seq");
		$terapis=$this->input->post('terapis');
		$this->mkasir->pilih_terapis($seq,$terapis);
		$data['kasir']=$this->mkasir->ambil_tmp_kasir()->result();
		$this->load->view('kasir/tmp_kasir',$data);
	}
	
	function ambilbarcode()
	{
		$id=$this->input->post('id');
		$method=$this->input->post('method');
		if($method=='cek')
		{
			if($this->mkasir->ambilbarcode($id)->num_rows()==0)
				{echo "Not Found";}
			else
				{echo "Oke";}
		}
	}
	function ambil_terapis()
	{
		$this->session->unset_userdata('seq');
		$this->session->set_userdata('seq', $this->input->post('seq'));
		$terapis=$this->mkasir->ambil_terapis()->result();
		echo '	
			<h4 class="modal-title" id="myModalLabel">Terapis ('.$this->session->userdata("seq").')</h4></div>
			<div class="modal-body">
			<table class="table table-hover table-condensed"><tr><td width="20%">ID</td><td width="60%">Nama</td><td width="20%"></td></tr>';
			foreach($terapis as $data){echo '<tr><td>'.$data->id_terapis.'</td><td>'.$data->nama.'</td>
				<td><a href="javascript:void(0)" onclick="pilih_terapis('.$data->id_terapis.')">Pilih</a></td></tr>';}
			echo '
			</table>
			</div>';
	}
	
}
