<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
	public function check($username){
		$data = $this->db->get_where('用户信息',array('账号'=>$username))->result_array();
		return $data;
	}
}
?>