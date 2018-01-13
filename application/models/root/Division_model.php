<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Division_model extends CI_Model{
		/**
		 * 分部验收记录
		 */
		//申请
		public function application($division_timestamp){
			$sql = "select id,分部工程名称,发起时间,发起单位,监理单位 from 分部验收 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($division_timestamp,'施工申请','重新组织验收'))->result_array();
			return $data;
		}

		//确认
		public function confirmation($division_timestamp){
			$sql = "select id,分部工程名称,发起时间,发起单位,监理单位 from 分部验收 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($division_timestamp,'监理确认','资料完善'))->result_array();
			return $data;
		}

		//审批
		public function approval($division_timestamp){
			$sql = "select id,工程单状态,分部工程名称,发起时间,发起单位,监理单位,验收时间 from 分部验收 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($division_timestamp,'待审批','审批通过'))->result_array();
			return $data;
		}
		//详情
		public function check($division_id){
			$sql = "select * from 分部验收  where id=? ";
			$data = $this->db->query($sql,array($division_id))->result_array();
			return $data;
		}
	}
?>