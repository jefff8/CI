<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commission_model extends CI_Model{
	/**
	 * 第三方实体检测记录
	 * @return [type] [description]
	 */
	public function commission($commission_timestamp){
		$sql = "select * from 实体检测  where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($commission_timestamp,'新建','准备'))->result_array();
		return $data;
	}
	public function witness($commission_timestamp){
		$sql = "select * from 实体检测 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($commission_timestamp,'待确认','已确认'))->result_array();
		return $data;
	}
	public function result($commission_timestamp){
		$sql = "select * from 实体检测 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=?)";
		$data = $this->db->query($sql,array($commission_timestamp,'合格','不合格','已处理'))->result_array();
		return $data;
	}
	public function check($com_id){
//		$data = $this->db->where(array('id'=>$com_id))->get('实体检测')->result_array();
		$sql = "select * from 实体检测 where id=? ";
		$data = $this->db->query($sql,array($com_id))->result_array();
		return $data;
	}
}
?>