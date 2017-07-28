<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_detail_model extends CI_Model{
	/**
	 * 送检记录
	 * @return [type] [description]
	 */
	public function detail($pj_timestamp){
		$sql = "select * from 材料送检 where 时间戳=?";
		$data = $this->db->query($sql,array($pj_timestamp))->result_array();
		return $data;
	}
	
}
?>