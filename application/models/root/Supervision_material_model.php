<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Supervision_material_model extends CI_Model{
		/**
		 * 第一个选项卡：监督取样
		 * @param  string $material_timestamp 时间戳
		 * @return array                     材料监督抽检中位于第一选项卡（状态为新增）的数据
		 */
		public function supervised_inspection($material_timestamp){
			$sql = "select * from 材料监督抽检 where 工程时间戳=? and (工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($material_timestamp,'新增','新增复检'))->result_array();
			return $data;
		}

		/**
		 * 第二个选项卡
		 * @param  string $material_timestamp 时间戳
		 * @return array                      在材料监督抽检中位于第二选项卡（状态为已取样和收样）的数据
		 */
		public function witness($material_timestamp){
			$sql = "select * from 材料监督抽检 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($material_timestamp,'已取样','收样','已取样复检','收样复检'))->result_array();
			return $data;
		}

		/**
		 * 材料抽检结果
		 * @param  string $material_timestamp 时间戳
		 * @return array                      在材料监督抽检结果中的数据
		 */
		public function result($material_timestamp){
			$sql = "select * from 材料监督抽检 where 工程时间戳=? and (工程单状态=? or 工程单状态=? or 工程单状态=? or 工程单状态=?)";
			$data = $this->db->query($sql,array($material_timestamp,'合格','不合格','待审批','已处理'))->result_array();
			return $data;
		}

		public function check($material_id){
			//初检信息
			$data['st'] = $this->db->get_where('材料监督抽检',array('id'=>$material_id))->result_array();
			//复检信息
			$data['nd'] = $this->db->get_where('材料监督抽检初检表',array('id'=>$material_id))->result_array();
			return $data;
		}
	}
?>