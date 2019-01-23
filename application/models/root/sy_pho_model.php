<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sy_pho_model extends CI_Model{
	public function index(){
		$data = $this->db->get('用户信息')->result_array();
		return $data;
	}
	
	public function check($mas){
		$sql = "select * from 用户信息 where 账号 =?";
		$data = $this->db->query($sql,array($mas))->result_array();
		$return = count($data);
		return $return;
	}
	
	public function save($data){
		$this->db->insert('用户信息',$data);
	}
	
		
	
	//删除用户信息
	public function del_user($user_id){
		$this->db->delete('用户信息',array('id'=>$user_id));
		
	}
}
?>