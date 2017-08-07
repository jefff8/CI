<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class ItemType extends MY_Controller{
		/**
		 * 项目类型自定义页面
		 */
		public function index(){
			$this->load->model('root/itemType_model','itemType');
			$data['all'] = $this->itemType->check();
			$this->load->view('root/sy_itemType.html',$data);
		}
		/**
		 * 添加页面
		 */
		public function add_page(){
			$this->load->view('root/sy_itemType_add.html');
		}
		/**
		 * 添加
		 */
		public function add(){
			$data = array(
					'项目模块'=>$this->input->post('module'),
					'大类'=>$this->input->post('type1'),
					'类型'=>$this->input->post('type2')
				);
			$this->load->model('root/itemType_model','itemType');
			$this->itemType->add($data);
		}
	}
?>