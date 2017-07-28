<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Material_self_model extends CI_Model{
	/**
	 * 实体自检记录
	 * @return [type] [description]
	 */
	public function self_inspection($entity_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'新增','准备材料'))->result_array();
		return $data;
	}
	public function witness($entity_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'提交见证','确定自测'))->result_array();
		return $data;
	}
	public function result($entity_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'合格','不合格'))->result_array();
		return $data;
	}
}
?>