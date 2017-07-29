<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entity_self_model extends CI_Model{
	/**
	 * 实体自检记录
	 * @return [type] [description]
	 */
	public function self_inspection($entity_timestamp){
		$sql = "select * from 实体自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'新增','准备材料'))->result_array();
		return $data;
	}
	public function witness($entity_timestamp){
		$sql = "select * from 实体自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'未检测','确定检测'))->result_array();
		return $data;
	}
	public function result($entity_timestamp){
		$sql = "select * from 实体自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($entity_timestamp,'合格','不合格'))->result_array();
		return $data;
	}
	public function check($en_id){
		$sql = "select * from 实体自检  where id=? ";
		$data = $this->db->query($sql,array($en_id))->result_array();
		return $data;
	}
}
?>