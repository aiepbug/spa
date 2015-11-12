<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_login extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
		function login($userid,$password){
		$this->db->select('
		tbl_user.id,
		tbl_user.userid,
		tbl_user.level,
		tbl_user.nama,
		tbl_user.password,
		');
		$this->db->where('tbl_user.userid',$userid);
		$this->db->where('tbl_user.password',$password);
		$this->db->from('tbl_user');
		return $this->db->get();  	
		}
}
