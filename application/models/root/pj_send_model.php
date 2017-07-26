<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_send_model extends CI_Model{
	/**
	 * 送检记录
	 * @return [type] [description]
	 */
	public function check($pj_timestamp){
		$data = $this->db->get_where('材料送检',array('工程时间戳'=>$pj_timestamp))->result_array();
		return $data;
	}

	/**
	 * 送检添加
	 */
	public function add($data){
		$this->db->insert('材料送检',$data);
	}

	/**
	 * 送检详情
	 */
	public function detail($send_id){
		$data = $this->db->get_where('材料送检',array('id'=>$send_id))->result_array();
		return $data;
	}

}
?>