<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_send extends CI_Controller{
	/**
	 * 材料见证送检页面
	 * @return [type] [description]
	 */
	public function index(){
		$pj_timestamp = $this->uri->segment(3);
		$this->load->model('root/pj_send_model','pj_send');
		$data['send_data'] = $this->pj_send->check($pj_timestamp);
		$data['pj_timestamp'] = $pj_timestamp;
		$this->load->view('root/pj_send.html',$data);
	}

	/**
	 * 送检添加
	 */
	public function add(){
		$pj_timestamp['pj_timestamp'] = $this->uri->segment(3);
		$this->load->view('root/pj_sendAdd.html',$pj_timestamp);
	}

	/**
	 * 送检详情
	 */
	public function check(){
		$pj_timestamp['pj_timestamp'] = $this->uri->segment(3);
		$this->load->view('root/pj_sendAdd.html',$pj_timestamp);
	}


}
?>