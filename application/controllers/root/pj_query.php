<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_query extends MY_Controller{
	/**
	 * 查询页面
	 */
	public function index(){
		$data['pj_timestamp'] = $this->uri->segment(3);
		$this->load->view('root/pj_query.html',$data);
//		$this->output->enable_profiler(TRUE);
	}

	/**
	 * 执行查询
	 */
	public function query(){
//		$type = '材料送检';
		$type = $this->input->post('type_data');
		$this ->load->model('root/pj_query_model');
		$data['total'] = $this->pj_query_model->select($type);
		$json = json_encode($data);
		echo $json;
		
	}
}
?>