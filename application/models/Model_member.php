<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_member extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function ambil_member($limit,$offset)
		{
			$this->db->select('
			tbl_member.seq,
			tbl_member.id_member,
			tbl_member.nama,
			tbl_member.nik,
			tbl_member.jenis_nik,
			tbl_member.alamat,
			tbl_member.hp,
			tbl_member.tgl_daftar,
			tbl_member.user,
			tbl_member.aktif,
			');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('tbl_member');
			$this->db->where('tbl_member.aktif',1);
			$this->db->order_by('nama','asc');
			return $this->db->get();  	
		}
		function cari_member($limit,$offset,$param)
		{
			$this->db->select('
			tbl_member.seq,
			tbl_member.id_member,
			tbl_member.nama,
			tbl_member.nik,
			tbl_member.jenis_nik,
			tbl_member.alamat,
			tbl_member.hp,
			tbl_member.tgl_daftar,
			tbl_member.user,
			tbl_member.aktif,
			');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('tbl_member');
			$this->db->where('tbl_member.nama LIKE', '%'.$param.'%');
			$this->db->where('tbl_member.aktif', 1);
			$this->db->order_by('nama','asc');
			return $this->db->get();  	
		}
		function detail_member($id_member)
		{
			$this->db->select('
			tbl_member.seq,
			tbl_member.id_member,
			tbl_member.nama,
			tbl_member.nik,
			tbl_member.jenis_nik,
			tbl_member.alamat,
			tbl_member.hp,
			tbl_member.tgl_daftar,
			tbl_member.user,
			tbl_member.aktif,
			');
			$this->db->from('tbl_member');
			$this->db->where('id_member',$id_member);
			return $this->db->get();  	
		}
		function simpan_member($nama,$jid,$nik,$alamat,$hp)
		{	
			$id=$this->db->query("SELECT MAX(id_member) AS seq FROM tbl_member")->result();
			$id=(substr($id[0]->seq,-3))+1;
			$this->id_member = date("Y").str_pad(($id),3,"0",STR_PAD_LEFT);
			$this->nama = $nama;
			$this->nik = $nik;
			$this->jenis_nik = $jid;
			$this->alamat = $alamat;
			$this->hp = $hp;
			$this->tgl_daftar = date('Y-m-d');
			$this->user = $this->session->userdata('userid');
			$this->aktif = '0';
			$this->db->insert('tbl_member', $this);	 	
		}
		function update_member($id_member,$nama,$jid,$nik,$alamat,$hp)
		{	
			$data=array('nama' => $nama,'jenis_nik' => $jid,'nik' => $nik,'alamat' => $alamat,'hp' => $hp);
			$this->db->where('id_member',$id_member);
			$this->db->update('tbl_member', $data);
		}
		function hapus_member($id_member)
		{	
			$data=array('aktif' => 0);
			$this->db->where('id_member',$id_member);
			$this->db->update('tbl_member', $data);
		}
}
