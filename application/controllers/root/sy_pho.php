<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Sy_pho extends CI_Controller{
	//页面账号信息显示
	public function index(){
		$this->load->model('root/sy_pho_model','sy_pho');
		$data['sy_all'] = $this->sy_pho->index();
		$this->load->view('root/sy_pho.html',$data);
	}
	//账号新建
	public function add(){
		$this->load->view('root/sy_pho_add.html');
	}
}

?>