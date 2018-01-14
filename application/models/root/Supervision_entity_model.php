<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Supervision_entity_model extends CI_Model{
		/**
		 * 第一个选项卡：监督取样
		 * @param  string $entity_timestamp 时间戳
		 * @return array                    实体监督抽检中位于第一选项卡（状态为新建）的数据
		 */
		public function supervised_inspection($entity_timestamp){
			$sql = "select * from 实体监督抽检 where 工程时间戳=? and 工程单状态=?";
			$data = $this->db->query($sql,array($entity_timestamp,'新建'))->result_array();
			return $data;
		}

		/**
		 * 第二个选项卡
		 * @param  string $entity_timestamp 时间戳
		 * @return array                    在实体监督抽检中位于第二选项卡（状态为已取样和已委托）的数据
		 */
		public function witness($entity_timestamp){
			$sql = "select * from 实体监督抽检 where 工程时间戳=? and 工程单状态=?";
			$data = $this->db->query($sql,array($entity_timestamp,'准备'))->result_array();
			return $data;
		}

		/**
		 * 第三个选项卡
		 * @param  string $entity_timestamp 时间戳
		 * @return array                    在实体监督抽检中位于第三选项卡（状态为已取样和已委托）的数据
		 */
		public function detection_result($entity_timestamp){
			$sql = "select * from 实体监督抽检 where 工程时间戳=? and 工程单状态=?";
			$data = $this->db->query($sql,array($entity_timestamp,'提交检测'))->result_array();
			return $data;
		}

		/**
		 * 实体抽检结果
		 * @param  string $entity_timestamp 时间戳
		 * @return array                    在实体监督抽检结果中的数据
		 */
		public function result($entity_timestamp){
			$sql = "select * from 实体监督抽检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?  or 工程单状态=?)";
			$data = $this->db->query($sql,array($entity_timestamp,'合格','不合格','已处理'))->result_array();
			return $data;
		}

		public function check($entity_id){
			$data = $this->db->get_where('实体监督抽检',array('id'=>$entity_id))->result_array();
			return $data;
		}
	}
?>