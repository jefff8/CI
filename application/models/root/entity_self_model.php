<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Entity_self_model extends CI_Model{
	/**
	 * 实体自检记录
	 * @return [type] [description]
	 */
	public function check($entity_timestamp){
		$data = $this->db->get_where('实体自检',array('工程时间戳'=>$entity_timestamp))->result_array();
		return $data;
	}
}
?>