<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_query_model extends CI_Model{
	/**
	 * 综合查询结果
	 */
	public function select($type_data){
		$str_0 = $this->db->select('count(id)')->where(array('工程单状态'=>'合格'))->get($type_data)->result_array();
		$str_1 = $this->db->select('count(id)')->where(array('工程单状态'=>'不合格'))->get($type_data)->result_array();
		$data['pass'] = array_values($str_0[0]) ;
		$data['fail'] = array_values($str_1[0]) ;
		return $data;
	}
	
}
?>