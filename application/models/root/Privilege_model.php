<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Privilege_model extends CI_Model{
	/**
	 * 用户对应单位特权
	 */
	public function index($uid){
		$data = $this->db->query("select 单位 from 用户信息 where id='$uid'")->result_array();
		return $data;
	}
}
?>