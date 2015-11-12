<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_pengeluaran extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function ambil_pengeluaran($limit,$offset)
		{
			$this->db->select('
			tbl_pengeluaran.seq,
			tbl_pengeluaran.barang,
			tbl_pengeluaran.keterangan,
			tbl_pengeluaran.harga,
			tbl_pengeluaran.tanggal,
			tbl_pengeluaran.user,
			');
			$this->db->where('tbl_pengeluaran.aktif','1');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('tbl_pengeluaran');
			$this->db->order_by('tanggal','desc');
			return $this->db->get();  	
		}
}
