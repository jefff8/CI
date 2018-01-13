<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_query extends MY_Controller{
	/**
	 * 查询页面
	 */
	public function index(){
		$data['pj_timestamp'] = $this->uri->segment(3);
		//用户id
		$data['uid'] = $this->session->userdata('userid');
		$this->load->model('root/Privilege_model','unit');
		//用户单位
		$data['unit'] = $this->unit->index($data['uid']);
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