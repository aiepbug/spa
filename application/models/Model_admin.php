<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function ambil_user($limit,$offset)
		{
			$this->db->select('
			tbl_user.id,
			tbl_user.userid,
			tbl_user.password,
			tbl_user.nama,
			tbl_user.level,
			tbl_user.aktif,
			');
			$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->from('tbl_user');
			return $this->db->get();  	
		}
}
