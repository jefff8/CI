<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ItemType_model extends CI_Model{
		/**
		 * 所有分类
		 */
		public function check(){
			$data = $this->db->get('项目类型选择')->result_array();
			return $data;
		}
		/**
		 * 添加
		 */
		public function add($data){
			$this->db->insert('项目类型选择',$data);
		}
	}
?>