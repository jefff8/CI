<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_query extends CI_Controller{
	/**
	 * 查询页面
	 */
	public function index(){
		$data['pj_timestamp'] = $this->uri->segment(3);
		$this->load->view('root/pj_query.html',$data);
	}

	/**
	 * 执行查询
	 */
	public function query(){
		$data = $this->input->post('type_data');
		// $this->load->model('root/pj_query','check');
		// $data['total'] = $this->check->query($data);
		var_dump($data);
	}
}
?>