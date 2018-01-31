<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');
	class Supervision_entity extends MY_Controller{
		//实体监督抽检
		public function index(){
			$pj_timestamp = $this->uri->segment(3);
			//用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Supervision_entity_model','Supervision_entity');
			$this->load->model('root/pj_all_model','get_pjname');
			$data['projectName'] = $this->get_pjname->get_pjname($pj_timestamp);
			$data['draft_data'] = $this->Supervision_entity->supervised_inspection($pj_timestamp);
			$data['witness_data'] = $this->Supervision_entity->witness($pj_timestamp);
			$data['detection_result_data'] = $this->Supervision_entity->detection_result($pj_timestamp);
			$data['result_data'] = $this->Supervision_entity->result($pj_timestamp);
			$data['pj_timestamp'] = $pj_timestamp;
			$this->load->view('root/Supervision_entity.html',$data);
			// print_r($data['draft_data']);
		}

		//查看详情
		public function check(){
			//获取材料抽检id
			$entity_id = $this->uri->segment(3);
			//获取工程时间戳
			$pj_timestamp = $this->uri->segment(4);
			//获取用户id
			$data['uid'] = $this->session->userdata('userid');
			$this->load->model('root/Privilege_model','unit');
			//用户单位
			$data['unit'] = $this->unit->index($data['uid']);
			$this->load->model('root/Supervision_entity_model','supervision_entity');
			$data['detail_data'] = $this->supervision_entity->check($entity_id);
			$data['pj_timestamp']= $pj_timestamp;
			$this->load->view('root/supervision_entity_Detail.html',$data);
			// print_r($data);
		}
		
	}
?>