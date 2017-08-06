<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_all extends MY_Controller{
	/**
	 * 首页全部工程
	 * @return [type] [description]
	 */
	public function index(){
		$uid = $this->session->userdata('userid');
		$this->load->model('root/pj_all_model','pj_all');
		$data['pj_all'] = $this->pj_all->index($uid);
		$this->load->view('root/pj_all.html',$data);
	}

	/**
	 * 项目添加页面
	 */
	public function pj_add(){
		$this->load->helpers('form');
		//获取各单位人员
		$this->load->model('root/pj_all_model','get_user');
		$data['all'] = $this->get_user->user_name();
		// p($data);
		$this->load->view('root/pj_add.html',$data);
	}

	/**
	 * 项目添加数据
	 */
	public function add(){
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程名称'=> $this->input->post('pj_name'),
				'所属公司'=> $this->input->post('company'),
				'施工单位'=> $this->input->post('construction'),
				'监理单位'=> $this->input->post('supervision'),
				'检测单位'=> $this->input->post('detection'),
				'地区'=> $this->input->post('area'),
				'栋数'=> $this->input->post('house_num'),
				'层数'=> $this->input->post('layer_num'),
				'高度'=> $this->input->post('height'),
				'建筑面积'=> $this->input->post('covered_area'),
				'基坑深度'=> $this->input->post('depth'),
				'开工日期'=> $this->input->post('start_date'),
				'竣工日期'=> $this->input->post('complete_date')
			);
		// p($data);
		$this->load->model('root/pj_all_model','all');
		$this->all->add($data);
		echo "<script> alert('添加成功~请添加工程人员！') </script>";
	}

	/**
	 * 项目详情
	 */
	public function detail(){
		$pid = $this->uri->segment(3);
		// //获取各单位人员
		$this->load->model('root/pj_all_model','get_user');
		$data['all'] = $this->get_user->user_name();
		$this->load->model('root/pj_all_model','pj_detail');
		$data['pj_detail'] = $this->pj_detail->detail($pid);
		// p($data['pj_detail']);
		$this->load->view('root/pj_detail.html',$data);
	}

	/**
	 * 删除项目
	 */
	public function del(){
		// $timestamp = $this->uri->segment(4);
		// p($timestamp);
		$pid = $this->input->post('pid');
		$this->load->model('root/pj_all_model','all');
		$this->all->del($pid);
		success('root/pj_all','删除成功');
	}

	/**
	 * 添加人员id到用户工程关系表
	 */
	public function add_userid(){
		$item_data = $this->input->post('item');//获取项目部选择的人员
		$road_data = $this->input->post('road_user');//获取施工单位选择的人员
		$overseeing_data = $this->input->post('overseeing');//获取监理单位选择的人员
		$detection_data = $this->input->post('detection');//获取检测单位选择的人员
		$Supervision_data = $this->input->post('Supervision');//获取监督单位选择的人员
		$user['item'] = explode('|',$item_data);
		// p ($item_data);
		$user['road_user'] = explode('|',$road_data);
		$user['overseeing'] = explode('|',$overseeing_data);
		$user['detection'] = explode('|',$detection_data);
		$user['Supervision'] = explode('|',$Supervision_data);
		// echo count($user['item']);
		// p($user['item'][0]);
		$this->load->model('root/pj_all_model','add_user');
		$this->add_user->add_id($user);
		success('pj_all/index','分配成功！');
		
	}

	/**
	 * 工程基本信息更新
	 */
	public function update(){
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程名称'=> $this->input->post('pj_name'),
				'所属公司'=> $this->input->post('company'),
				'施工单位'=> $this->input->post('construction'),
				'监理单位'=> $this->input->post('supervision'),
				'检测单位'=> $this->input->post('detection'),
				'地区'=> $this->input->post('area'),
				'栋数'=> $this->input->post('house_num'),
				'层数'=> $this->input->post('layer_num'),
				'高度'=> $this->input->post('height'),
				'建筑面积'=> $this->input->post('covered_area'),
				'基坑深度'=> $this->input->post('depth'),
				'开工日期'=> $this->input->post('start_date'),
				'竣工日期'=> $this->input->post('complete_date')
			);
		// $data['timestamp'] = $this->input->post('timestamp');
		// echo $data['工程名称'];
		$this->load->model('root/pj_all_model','update');
		$this->update->update($data);
	}

	/**
	 * 删除工程人员
	 */
	public function del_user(){
		$id = $this->input->post('id');
		$this->load->model('root/pj_all_model','del_user');
		$this->del_user->del_user($id);
	}


}
?>