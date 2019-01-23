<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Supervision_material extends MY_Controller{
		//材料监督抽检
		public function index(){
			//获取工程时间戳
			$pj_timestamp = $this->uri->segment(3);
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Supervision_material_model','supervision_material');
			$this->load->model('root/pj_all_model','get_pjname');
			$data['projectName'] = $this->get_pjname->get_pjname($pj_timestamp);
			$data['supervisel_data'] = $this->supervision_material->supervised_inspection($pj_timestamp);
			$data['witness_data'] = $this->supervision_material->witness($pj_timestamp);
			$data['result_data'] = $this->supervision_material->result($pj_timestamp);
			$data['pj_timestamp'] = $pj_timestamp;
			$this->load->view('root/supervision_material.html',$data);
			// print_r($data['supervisel_data']);
		}
		
		//查看详情
		public function check(){
			//获取材料抽检id
			$material_id = $this->uri->segment(3);
			//获取工程时间戳
			$pj_timestamp = $this->uri->segment(4);
			//获取用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Supervision_material_model','supervision_material');
			$data['detail_data'] = $this->supervision_material->check($material_id);
			$data['pj_timestamp']= $pj_timestamp;
			$this->load->view('root/supervision_material_Detail.html',$data);
			// print_r($data['detail_data']);
		}
		
		/**
	 * 送检（送样）信息修改保存
	 */
		public function saving(){
		$data = array(
		'时间戳' =>$this ->input->post('timestamp'),
		'合格证编号' =>$this ->input->post('save_pass'),
		'进场日期'   =>$this ->input->post('save_date')
		);
		$this ->load ->model('root/supervision_material_model','update');
		$this->update->update($data);
	}
		
		/**
	 * 送检（收样）信息修改保存
	 */
	public function saving1(){
		$data = array(
		'取样类型'   =>$this ->input->post('qylx'),
		'时间戳' =>$this ->input->post('timestamp'),
		'样品编号' =>$this ->input->post('save_pass1'),
		'送样日期'   =>$this ->input->post('save_date1')
		);
		$this ->load ->model('root/supervision_material_model','update');
		$this->update->update1($data);
	}
	}
?>