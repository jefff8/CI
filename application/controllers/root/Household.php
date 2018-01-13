<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Household extends MY_Controller{
		//分户验收列表
		public function index(){
			$household_timestamp = $this->uri->segment(3);
			//用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Household_model','household');
			$data['household_timestamp'] = $household_timestamp;
			$data['application_data'] = $this->household->application($household_timestamp);
			$data['confirmation_data'] = $this->household->confirmation($household_timestamp);
			$data['approval_data'] = $this->household->approval($household_timestamp);
			$this->load->view('root/household.html',$data);
		}

		//分户验收详情
		public function check(){
			$household_id = $this->uri->segment(3);
			$pj_timestamp = $this->uri->segment(4);
			//用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Household_model','household');
			$data['household_detail'] = $this->household->check($household_id);
			$data['photo_data'] = $this->household->photo($household_id);
			$data['nums'] = $this->household->nums($household_id);
			$data['pj_timestamp']=$pj_timestamp;
			$this->load->view('root/household_Detail.html',$data);
		}
	}
?>