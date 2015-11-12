<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_laporan extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function caribarang($param)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			');
			$this->db->where("mst_produk.id_produk LIKE", '%'.$param.'%'); 	
			$this->db->or_where('mst_produk.nama LIKE', '%'.$param.'%'); 
			$this->db->or_where('mst_produk.deskripsi LIKE', '%'.$param.'%'); 
			$this->db->limit('5'); 
			$this->db->from('mst_produk');
			return $this->db->get();  	
		}
		function ambilbarcode($id)
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk,
			mst_produk.nama,
			mst_produk.deskripsi,
			mst_produk.harga_beli,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			');
			$this->db->where("mst_produk.id_produk",$id); 	
			$this->db->from('mst_produk');
			return $this->db->get();  	
		}
		
		function barang_aktif()
		{
			$this->db->select('
			mst_produk.seq,
			mst_produk.id_produk AS value,
			mst_produk.nama AS label,
			mst_produk.deskripsi AS desc,
			mst_produk.harga_beli,
			mst_produk.jenis,
			mst_produk.tgl_daftar,
			mst_produk.user,
			');
			$this->db->from('mst_produk');
			$this->db->where('mst_produk.aktif', 1); 
			return $this->db->get();  	
		}
		
		function ambil_tmp_kasir()
		{
			$this->db->select('
			tmp_kasir.seq,
			tmp_kasir.id_produk,
			tmp_kasir.disc,
			mst_produk.harga_beli,
			mst_produk.jenis,
			mst_produk.nama,
			mst_produk.deskripsi,
			tbl_harga.harga_jual,
			tbl_terapis.nama AS terapis,
			');
			$this->db->where('tbl_harga.aktif','1');
			$this->db->from('tmp_kasir');
			$this->db->join('mst_produk','tmp_kasir.id_produk=mst_produk.id_produk','left');
			$this->db->join('tbl_harga','tmp_kasir.id_produk=tbl_harga.id_produk','left');
			$this->db->join('tbl_terapis','tmp_kasir.terapis=tbl_terapis.id_terapis','left');
			$this->db->where('tmp_kasir.user', $this->session->userdata('userid')); 
			return $this->db->get();  	
		}
		function ambil_terapis()
		{
			$this->db->select('
			tbl_terapis.seq,
			tbl_terapis.id_terapis,
			tbl_terapis.nama,
			tbl_terapis.alamat,
			tbl_terapis.hp,
			tbl_terapis.tgl_daftar,
			tbl_terapis.user,
			');
			$this->db->where('tbl_terapis.aktif', '1'); 
			$this->db->order_by('tbl_terapis.nama','asc');
			$this->db->from('tbl_terapis');
			$this->db->where('id_terapis !=',0);
			return $this->db->get();  	
		}
		function ambil_member()
		{
			$this->db->select('
			tbl_member.seq,
			tbl_member.id_member,
			tbl_member.nama,
			tbl_member.jenis_nik,
			tbl_member.alamat,
			tbl_member.hp,
			tbl_member.tgl_daftar,
			tbl_member.user,
			');
			$this->db->order_by('tbl_member.nama','asc');
			$this->db->from('tbl_member');
			return $this->db->get();  	
		}
		
		function tmp_transaksi($id)
		{	
			$this->id_produk = $id;
			$this->disc = '0';
			$this->user = $this->session->userdata('userid');
			$this->db->insert('tmp_kasir', $this);	 	
		}
		
		function transaksi($id_transaksi,$member)
		{	
			$this->db->select('
			tmp_kasir.seq,
			tmp_kasir.id_produk,
			tmp_kasir.disc,
			mst_produk.harga_beli,
			mst_produk.jenis,
			mst_produk.nama,
			mst_produk.deskripsi,
			tbl_harga.harga_jual,
			tbl_terapis.nama AS terapis,
			tbl_terapis.id_terapis,
			');
			$this->db->where('tbl_harga.aktif','1');
			$this->db->from('tmp_kasir');
			$this->db->join('mst_produk','tmp_kasir.id_produk=mst_produk.id_produk','left');
			$this->db->join('tbl_harga','tmp_kasir.id_produk=tbl_harga.id_produk','left');
			$this->db->join('tbl_terapis','tmp_kasir.terapis=tbl_terapis.id_terapis','left');
			$this->db->where('tmp_kasir.user', $this->session->userdata('userid')); 
			$hasil=$this->db->get(); 
			foreach($hasil->result() as $data)
			{			
				$this->id_transaksi = $id_transaksi;
				$this->id_member = $member;
				$this->id_produk = $data->id_produk;
				$this->id_terapis = $data->id_terapis;
				$this->tgl_transaksi = date('Y-m-d h:m:s');
				$this->harga_beli = $data->harga_beli;
				$this->harga_jual = $data->harga_jual;
				$this->disc = $data->disc;
				$this->user = $this->session->userdata('userid');
				$this->db->insert('mst_transaksi', $this);	 	 	
			}
		}
		function detail_transaksi()
		{			
			$this->id_transaksi = '123';
			$this->bayar = '123';
			$this->db->insert('tbl_transaksi', $this);	 	 	
		}
		function kosongkan_tmp_transksi()
		{
			$this->db->where('tmp_kasir.user', $this->session->userdata('userid')); 
			$this->db->delete('tmp_kasir');
		}
		
		function hapus_tmp_kasir($seq)
		{	
			$this->db->where('seq',$seq);
			$this->db->where('user',$this->session->userdata('userid'));
			$this->db->delete('tmp_kasir');	
		}
		function update_disc($seq,$disc)
		{
			$data=array('seq' => $seq,'disc'=>$disc);
			$this->db->where('seq',$seq);
			$this->db->where('user',$this->session->userdata('userid'));
			$this->db->update('tmp_kasir',$data);	
		}
		function hapus_terapis($seq)
		{
			$data=array('terapis' => '');
			$this->db->where('seq',$seq);
			$this->db->where('user',$this->session->userdata('userid'));
			$this->db->update('tmp_kasir',$data);	
		}
		function pilih_terapis($seq,$terapis)
		{
			$data=array('terapis' => $terapis);
			$this->db->where('seq',$seq);
			$this->db->where('user',$this->session->userdata('userid'));
			$this->db->update('tmp_kasir',$data);	
		}
}
