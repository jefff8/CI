<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_send_model extends CI_Model{
	/**
	 * 送检记录
	 * @return [type] [description]
	 */
	public function check($pj_timestamp){
		$data = $this->db->get_where('材料送检',array('工程时间戳'=>$pj_timestamp))->result_array();
		return $data;
	}
}
?>