<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_all extends CI_Controller{
	/**
	 * 首页全部工程
	 * @return [type] [description]
	 */
	public function index(){
		$this->load->model('root/pj_all_model','pj_all');
		$data['pj_all'] = $this->pj_all->index();
		$this->load->view('root/pj_all.html',$data);
	}

	/**
	 * 项目添加页面
	 */
	public function pj_add(){
		$this->load->helpers('form');
		$this->load->view('root/pj_add.html');
	}

	/**
	 * 项目添加数据
	 */
	public function add(){
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程名称'=> $this->input->post('pj_name'),
				'地区'=> $this->input->post('area')
			);
		// p($data);
		$this->load->model('root/pj_all_model','all');
		$this->all->add($data);
		success('pj_all',"添加成功!");
	}

	/**
	 * 删除项目
	 */
	public function del(){
		// $timestamp = $this->uri->segment(4);
		// p($timestamp);
		$timestamp = $this->input->post('pj_timestamp');
		$this->load->model('root/pj_all_model','all');
		$this->all->del($timestamp);
		success('root/pj_all','删除成功');
	}

}
?>