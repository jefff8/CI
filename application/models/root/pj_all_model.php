<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_all_model extends CI_Model{
	/**
	 * 全部项目
	 * @return [type] [description]
	 */		
	public function index(){
		$data = $this->db->get('我的工程')->result_array();
		return $data;
	}

	/**
	 * 添加项目
	 */
	public function add($data){
		$this->db->insert('我的工程',$data);
	}

	/**
	 * 删除项目
	 */
	public function del($timestamp){
		$this->db->delete('我的工程',array('时间戳'=>$timestamp));
	}

}
?>