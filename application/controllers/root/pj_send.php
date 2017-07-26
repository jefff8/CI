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
	 * 送检添加页面
	 */
	public function add_page(){
		$this->load->helpers('form');
		$pj_data['pj_timestamp'] = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		//接收中文解码
		$pj_data['pj_name'] = urldecode($name);
		$this->load->view('root/pj_sendAdd.html',$pj_data);
	}

	/**
	 * 送检添加
	 */
	public function add(){
		$pj_timestamp = $this->input->post('pj_timestamp');
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程时间戳' => $this->input->post('pj_timestamp'),
				'工程名称' => $this->input->post('pj_name'),
				'工程单状态' => $this->input->post('pj_status'),
				'取样类型' => $this->input->post('get_type'),
				'规格' => $this->input->post('specification'),
				'数量' => $this->input->post('num'),
				'生产厂家' => $this->input->post('manufacturers'),
				'取样人' => $this->input->post('get_guy'),
				'进场日期' => $this->input->post('enter_date'),
				'取样日期' => $this->input->post('get_date'),
				'合格证编号' => $this->input->post('qualified_num'),
				'经销商单位' => $this->input->post('agency'),
				'备注' => $this->input->post('remark'),
				'检测单位' => $this->input->post('test_unit')
			);
		$this->load->model('root/pj_send_model','send_add');
		$this->send_add->add($data);
		success('pj_send/index/'.$pj_timestamp,"新增成功!");
	}

	/**
	 * 送检详情
	 */
	public function check(){
		$passval['send_id'] = $this->uri->segment(3);
		$passval['pj_timestamp'] = $this->uri->segment(4);
		$this->load->model('root/pj_send_model','send_detail');
		$passval['send_data'] = $this->send_detail->detail($passval['send_id']);
		$this->load->view('root/pj_sendDetail.html',$passval);
	}


}
?>