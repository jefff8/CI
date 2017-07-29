<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Material_self_model extends CI_Model{
	/**
	 * 材料自检记录
	 * @return [type] [description]
	 */
	public function self_inspection($material_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($material_timestamp,'新增','准备材料'))->result_array();
		return $data;
	}
	public function witness($material_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($material_timestamp,'提交见证','确定自测'))->result_array();
		return $data;
	}
	public function result($material_timestamp){
		$sql = "select * from 材料自检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($material_timestamp,'合格','不合格'))->result_array();
		return $data;
	}
	public function check($material_id){
		$sql = "select * from 材料自检  where id=? ";
		$data = $this->db->query($sql,array($material_id))->result_array();
//		return $material_id;
		return $data;
	}
}
?>