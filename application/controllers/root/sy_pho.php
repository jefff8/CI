<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Sy_pho extends MY_Controller{
	//页面账号信息显示
	public function index(){
		//用户id
		$data['uid'] = $this->session->userdata('userid');
		$this->load->model('root/Privilege_model','unit');
		//用户单位
		$data['unit'] = $this->unit->index($data['uid']);
		$this->load->model('root/sy_pho_model','sy_pho');
		$data['sy_all'] = $this->sy_pho->index();
		$this->load->view('root/sy_pho.html',$data);
		
		
	}
	//账号新建页面
	public function add(){
		$this->load->view('root/sy_pho_add.html');
	}
	//账号验证
	public function check(){
		$mas = $this->input->post('mas');
		$this->load->model('root/sy_pho_model','sy_pho');
		$data = $this->sy_pho->check($mas);
		echo $data;
	}
	//账号新建保存
	public function save(){
		$data = array(
			'姓名' => $this->input->post('name'),
			'账号' => $this->input->post('account'),
			'密码' => $this->input->post('password'),
			'邮箱' => $this->input->post('mail'),
			'手机' => $this->input->post('phone'),
			'单位' => $this->input->post('part'),
			'单位名称' => $this->input->post('part_name')
		);
		$this->load->model('root/sy_pho_model','sy_pho');
		$this->sy_pho->save($data);
		success('sy_pho','保存成功');
	}
	

		
	

	//删除用户信息
public function del_user(){
		$user_id = $this->input->post('user_id');
		$this->load->model('root/sy_pho_model','del_user');
		$this->del_user->del_user($user_id);
	}

}



?>