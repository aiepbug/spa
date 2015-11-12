<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_produk extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function ambil_stok($id_produk)
		{
			$this->db->select('SUM(jumlah) AS stok');
			$this->db->from('tbl_stok');
			$this->db->where('id_produk',$id_produk);
			return $this->db->get();  	
		}
		function ambil_produk($limit,$offset)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli AS hb,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			mst_produk.aktif,
			tbl_harga_jual.harga_jual,
			tbl_harga_beli.harga_beli,
			');
			$this->db->join('tbl_harga_jual','mst_produk.id_produk=tbl_harga_jual.id_produk','left');
			$this->db->join('tbl_harga_beli','mst_produk.id_produk=tbl_harga_beli.id_produk','');
			$this->db->where('tbl_harga_jual.aktif','1');
			$this->db->where('tbl_harga_beli.aktif','1');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('mst_produk');
			$this->db->order_by('nama','asc');
			$this->db->order_by('tbl_harga_jual.seq','desc');
			$this->db->order_by('tbl_harga_beli.seq','desc');
			return $this->db->get();  	
		}
		function ambil_jenis()
		{
			$this->db->select('
			tbl_jenis.seq,
			tbl_jenis.jenis,
			');
			$this->db->from('tbl_jenis');
			$this->db->order_by('jenis','asc');
			return $this->db->get();  	
		}
		function cari_produk($limit,$offset,$param)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli AS hb,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			mst_produk.aktif,
			tbl_harga_jual.harga_jual,
			tbl_harga_beli.harga_beli,
			');
			$this->db->join('tbl_harga_jual','mst_produk.id_produk=tbl_harga_jual.id_produk','left');
			$this->db->join('tbl_harga_beli','mst_produk.id_produk=tbl_harga_beli.id_produk','left');
			$this->db->where('mst_produk.aktif','1');
			$this->db->where('mst_produk.nama LIKE','%'.$param.'%');
			$this->db->where('tbl_harga_jual.aktif','1');
			$this->db->where('tbl_harga_beli.aktif','1');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('mst_produk');
			$this->db->order_by('nama','asc');
			$this->db->order_by('tbl_harga_jual.seq','desc');
			$this->db->order_by('tbl_harga_beli.seq','desc');
			return $this->db->get();  	
		}
		function detail_produk($id_produk)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli AS hb,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			mst_produk.aktif,
			tbl_harga_jual.harga_jual,
			tbl_harga_beli.harga_beli,
			SUM(tbl_stok.jumlah) AS stok,
			COUNT(mst_transaksi.id_produk) AS terjual,
			');
			$this->db->join('tbl_harga_beli','mst_produk.id_produk=tbl_harga_beli.id_produk','left');
			$this->db->join('tbl_harga_jual','mst_produk.id_produk=tbl_harga_jual.id_produk','left');
			$this->db->join('tbl_stok','mst_produk.id_produk=tbl_stok.id_produk','left');
			$this->db->join('mst_transaksi','mst_produk.id_produk=mst_transaksi.id_produk','left');
			$this->db->where('mst_produk.aktif','1');
			$this->db->where('mst_produk.id_produk',$id_produk);
			$this->db->where('tbl_harga_jual.aktif','1');
			$this->db->where('tbl_harga_beli.aktif','1');
			//$this->db->where('tbl_stok.id_produk',$id_produk);
			$this->db->from('mst_produk');
			return $this->db->get();  	
		}
		function cari_barcode($barcode)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli AS hb,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			mst_produk.aktif,
			tbl_harga_jual.harga_jual,
			tbl_harga_beli.harga_beli,
			');
			$this->db->join('tbl_harga_jual','mst_produk.id_produk=tbl_harga_jual.id_produk','left');
			$this->db->join('tbl_harga_beli','mst_produk.id_produk=tbl_harga_beli.id_produk','left');
			$this->db->where('tbl_harga_jual.aktif','1');
			$this->db->where('tbl_harga_jual.id_produk',$barcode);
			$this->db->where('tbl_harga_beli.id_produk',$barcode);
			$this->db->from('mst_produk');
			return $this->db->get();  	
		}
		function simpan_produk($barcode,$nama,$harga_beli,$deskripsi,$jenis)
		{
			$this->id_produk = $barcode;
			$this->nama = $nama;
			$this->deskripsi = $deskripsi;
			$this->harga_beli = $harga_beli;
			$this->jenis = $jenis;	
			$this->tgl_daftar = date("Y-m-d");
			$this->user = $this->session->userdata('userid');
			$this->aktif = 1;
			$this->db->insert('mst_produk', $this);	 	
		}
		function simpan_harga($id_produk,$harga_jual)
		{
			$this->id_produk = $id_produk;
			$this->harga_jual = $harga_jual;
			$this->tgl_input = date("Y-m-d");
			$this->aktif = 1;
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_harga_jual', $this);	 	
		}
		function simpan_harga_beli($id_produk,$harga_beli)
		{
			$this->id_produk = $id_produk;
			$this->harga_beli = $harga_beli;
			$this->tgl_input = date("Y-m-d");
			$this->aktif = 1;
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_harga_beli', $this);	 	
		}
		function simpan_stok($id_produk,$jumlah,$keterangan)
		{
			$this->id_produk = $id_produk;
			$this->jumlah = $jumlah;
			$this->tgl_input = date("Y-m-d");
			$this->keterangan = $keterangan;
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_stok', $this);	 	
		}
		function update_produk($id_produk,$nama,$deskripsi,$jenis)
		{
			$data=array('nama'=>$nama,'deskripsi'=>$deskripsi,'jenis'=>$jenis);
			$this->db->where('id_produk',$id_produk);
			$this->db->update('mst_produk',$data);	
		}
		function harga_beli_baru($id_produk,$harga_beli_baru)
		{
			$data=array('aktif'=>0);
			$this->db->where('id_produk',$id_produk);
			$this->db->update('tbl_harga_beli',$data);	
			$this->id_produk = $id_produk;
			$this->harga_beli= $harga_beli_baru;
			$this->tgl_input = date("Y-m-d");
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_harga_beli', $this);	 	
		}
		function harga_jual_baru($id_produk,$harga_jual_baru)
		{
			$data=array('aktif'=>0);
			$this->db->where('id_produk',$id_produk);
			$this->db->update('tbl_harga_jual',$data);	
			$this->id_produk = $id_produk;
			$this->harga_jual= $harga_jual_baru;
			$this->tgl_input = date("Y-m-d");
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_harga_jual', $this);	 	
		}
		function stok_baru($id_produk,$stok_baru,$keterangan)
		{			
			$this->id_produk = $id_produk;
			$this->jumlah= $stok_baru;
			$this->keterangan= $keterangan;
			$this->tgl_input = date("Y-m-d");
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tbl_stok', $this);	 	
		}
}
