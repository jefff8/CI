<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sy_pho_model extends CI_Model{
	public function index(){
		$data = $this->db->get('用户信息')->result_array();
		return $data;
	}
	public function add(){
		
	}
}
?>