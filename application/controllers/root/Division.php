<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Division extends MY_Controller{
		//分部验收
		public function index(){
			$division_timestamp = $this->uri->segment(3);
			//用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Division_model','Division');
			$data['division_timestamp'] = $division_timestamp;
			$data['application_data'] = $this->Division->application($division_timestamp);
			$data['confirmation_data'] = $this->Division->confirmation($division_timestamp);
			$data['approval_data'] = $this->Division->approval($division_timestamp);
			$this->load->view('root/division.html',$data);
		}
		//分部验收详情
		public function check(){
			$division_id = $this->uri->segment(3);
			$pj_timestamp = $this->uri->segment(4);
			//用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Division_model','division');
			$data['division_detail'] = $this->division->check($division_id);
			$data['pj_timestamp']=$pj_timestamp;
			$this->load->view('root/division_Detail.html',$data);
		}
	}
?>