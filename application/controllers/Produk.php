<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper('array');
		$this->load->model('Model_produk','mproduk');
		//$this->load->library('pdf');
	}
	public $limit = 10;
	public function index()
	{
		$this->load->view('produk/produk_beranda');
	}
	function ambil_produk()
	{
		$data['total'] = $this->mproduk->ambil_produk(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['produk'] = $this->mproduk->ambil_produk(10,0)->result();
		$this->load->view('produk/tabel_produk',$data);
	}
	function halaman()
	{
		$offset=$this->input->post('offset');
		if($offset==1){$offset=0;}else{$offset=($offset*$this->limit)/$offset;}
		$data['total'] = $this->mproduk->ambil_produk(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = $offset;
		$data['produk']=$this->mproduk->ambil_produk($this->limit,$offset)->result();
		$this->load->view('produk/tabel_produk',$data);
	}
	function tambah_produk()
	{
		$data['jenis'] = $this->mproduk->ambil_jenis()->result();
		$this->load->view('produk/tambah_produk',$data);
	}
	function cekbarcode()
	{
		$barcode=$this->input->post('barcode');
		if($this->mproduk->cari_barcode($barcode)->num_rows()>0){echo 'ada';}else{echo 'kosong';}
	}
	function input_harga_beli()
	{
		$id_produk=$this->input->post('id_produk');
		$harga_beli=$this->input->post('harga_beli');
		$this->mproduk->simpan_harga_beli($id_produk,$harga_beli);
	}
	function input_harga()
	{
		$id_produk=$this->input->post('id_produk');
		$harga_jual=$this->input->post('harga_jual');
		$this->mproduk->simpan_harga($id_produk,$harga_jual);
	}
	function input_stok()
	{
		$id_produk=$this->input->post('id_produk');
		$jumlah=$this->input->post('jumlah');
		$this->mproduk->simpan_stok($id_produk,$jumlah,'Stok awal');
		$data['total'] = $this->mproduk->ambil_produk(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['produk'] = $this->mproduk->ambil_produk(10,0)->result();
		$this->load->view('produk/tabel_produk',$data);
	}
	function simpan_produk()
	{
		$id_produk=$this->input->post('id_produk');
		$nama=$this->input->post('nama');
		$harga_beli=$this->input->post('harga_beli');
		$deskripsi=$this->input->post('deskripsi');
		$jenis=$this->input->post('jenis');
		$this->mproduk->simpan_produk($id_produk,$nama,$harga_beli,$deskripsi,$jenis);
	}
	function cari_produk()
	{
		$param=$this->input->post('param');
		$data['total'] = $this->mproduk->cari_produk(0,0,$param)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['produk']=$this->mproduk->cari_produk($this->limit,0,$param)->result();
		$this->load->view('produk/tabel_produk',$data);
	}
	function detail_produk()
	{
		$id_produk=$this->input->post('id_produk');
		$data['jenis'] = $this->mproduk->ambil_jenis()->result();
		$data['produk']=$this->mproduk->detail_produk($id_produk)->result();
		$data['stok']=$this->mproduk->ambil_stok($id_produk)->result();
		$this->load->view('produk/detail_produk',$data);
	}
	function update_produk()
	{
		$id_produk=$this->input->post('id_produk');
		$nama=$this->input->post('nama');
		$deskripsi=$this->input->post('deskripsi');
		$jenis=$this->input->post('jenis');
		$this->mproduk->update_produk($id_produk,$nama,$deskripsi,$jenis);
		$data['total'] = $this->mproduk->ambil_produk(0,0)->num_rows();
		$data['halaman'] = $this->limit;
		$data['offset'] = 0;
		$data['produk'] = $this->mproduk->ambil_produk(10,0)->result();
		$this->load->view('produk/tabel_produk',$data);
	}
	function harga_beli_baru()
	{
		$id_produk=$this->input->post('id_produk');
		$harga_beli_baru=$this->input->post('harga_beli_baru');
		$this->mproduk->harga_beli_baru($id_produk,$harga_beli_baru);
		$produk=$this->mproduk->detail_produk($id_produk)->result();
		echo $produk[0]->harga_beli;
	}
	function harga_jual_baru()
	{
		$id_produk=$this->input->post('id_produk');
		$harga_jual_baru=$this->input->post('harga_jual_baru');
		$this->mproduk->harga_jual_baru($id_produk,$harga_jual_baru);
		$produk=$this->mproduk->detail_produk($id_produk)->result();
		echo $produk[0]->harga_jual;
	}
	function stok_baru()
	{
		$id_produk=$this->input->post('id_produk');
		$stok_baru=$this->input->post('stok_baru');
		$this->mproduk->stok_baru($id_produk,$stok_baru,'Ubah stok');
		$produk=$this->mproduk->detail_produk($id_produk)->result();
		echo $produk[0]->stok;
	}

}
