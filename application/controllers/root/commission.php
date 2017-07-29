<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');
	class Commission extends CI_Controller{
		//第三方实体检测
		public function index(){
			$commission_timestamp = $this->uri->segment(3);
			$this->load->model('root/commission_model','commission');
			$data['commission_data'] = $this->commission->commission($commission_timestamp);
			$data['witness_data'] = $this->commission->witness($commission_timestamp);
			$data['result_data'] = $this->commission->result($commission_timestamp);
			$data['commission_timestamp'] = $commission_timestamp;
			$this->load->view('root/commission.html',$data);
		}
		//详情查看
		public function check(){
			//获取id
			$com_id = $this->uri->segment(3);
			//获取工程时间戳
			$pj_timestamp = $this->uri->segment(4);
			//时间戳
			$timestamp = $this->uri->segment(5);
			$this ->load -> model('root/commission_model','commission');
			$data['detail_data'] = $this->commission->check($com_id);
			$data['pj_timestamp'] = $pj_timestamp;
			$this->load->view('root/commission_Detail.html',$data);
		}
		
		
	}
?>