<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_query extends CI_Model{
	/**
	 * 综合查询结果
	 */
	public function query($type_data){
		$data['qualified_num'] = $this->db->select('count(*)')->where('合格')->get('$type_data')->result_array();
		$data['fail_num'] = $this->db->select('count(*)')->where('不合格')->get('$type_data')->result_array();
		return $data;
	}
}
?>