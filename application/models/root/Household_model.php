<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Household_model extends CI_Model{
		/**
		 * 分户验收
		 */
		//申请
		public function application($household_timestamp){
			$sql = "select id,栋号,楼层,户数,起始日期,验收时间 from 分户验收 where 工程时间戳=? and (工程单状态=?)";
			$data = $this->db->query($sql,array($household_timestamp,'施工申请'))->result_array();
			return $data;
		}
		//确认
		public function confirmation($household_timestamp){
			$sql = "select id,栋号,楼层,户数,起始日期,验收时间 from 分户验收 where 工程时间戳=? and (工程单状态=?)";
			$data = $this->db->query($sql,array($household_timestamp,'监理确认'))->result_array();
			return $data;
		}
		//审批
		public function approval($household_timestamp){
			$sql = "select id,栋号,楼层,户数,起始日期,验收时间 from 分户验收 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($household_timestamp,'待审批','审批通过','审批不通过'))->result_array();
			return $data;
		}
		//详情
		public function check($household_id){
			$sql = "select * from 分户验收  where id=? ";
			$data = $this->db->query($sql,array($household_id))->result_array();
			return $data;
		}
		//各户图片
		public function photo($household_id){
			$sql = "select id,户号,状态 from 户号汇总  where 项目id=? ";
			$data = $this->db->query($sql,array($household_id))->result_array();
			return $data;
		}
		//各户总数
		public function nums($household_id){
			$sql = "select count(*) as nums from 户号汇总  where 项目id=? ";
			$data = $this->db->query($sql,array($household_id))->result_array();
			return $data;
		}
	}
?>