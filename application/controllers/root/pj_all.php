<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pj_all extends MY_Controller{
	/**
	 * 首页全部工程
	 * @return [type] [description]
	 */
	public function index(){
		$data['uid'] = $this->session->userdata('userid');
		$this->load->model('root/pj_all_model','pj_all');
		$data['pj_all'] = $this->pj_all->index($data['uid']);
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
		$data['org'] = $this->get_user->org_name();
//		 p($data['org']);
		$this->load->view('root/pj_add.html',$data);
	}

	/**
	 * 项目添加数据
	 */
	public function add(){
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程名称'=> $this->input->post('pj_name'),
				'施工单位'=> $this->input->post('construction'),
				'监理单位'=> $this->input->post('supervision'),
				'检测单位'=> $this->input->post('detection'),
				'监督机构'=> $this->input->post('Supervision_0'),
				'地址'=> $this->input->post('area'),
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
	 * 检测手机号：获取手机号
	 */
	 public function check_phone(){
	 	$this->load->model('root/pj_all_model','get_user');
		$data = $this->get_user->user_name();
//		print_r($data);
		$json = json_encode($data);
		echo $json;
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
		$data['org'] = $this->get_user->org_name();
		// p($data['pj_detail']);
		$this->load->view('root/pj_detail.html',$data);
	}

	/**
	 * 竣工项目
	 */
	public function del(){
		// $timestamp = $this->uri->segment(4);
		$pj_timestamp = $this->input->post('pj_timestamp');
		$this->load->model('root/Pj_all_model','all');
		$data = $this->all->del($pj_timestamp);
		$pj_send_length = count($data['pj_send']); //材料送检
		$commission_length = count($data['commission']); //实体检测
		$materital_self_length = count($data['materital_self']);//材料自检
		$entity_self_length = count($data['entity_self']);//实体自检
		//材料送检删除
		for($i=0;$i<$pj_send_length;$i++){
			foreach($data['pj_send'][$i] as $key =>$getoutvis0)
	      	{
	        	if(!$getoutvis0||$getoutvis0=="")
	        	{
	          		unset($data['pj_send'][$i][$key]);
	        	}
	      	}
	      	$file = implode("",$data['pj_send'][$i]);  //数组转换为字符串
	      	$del_file = explode("~*^*~",$file);
	      	$file_length = count($del_file);
	      	if(!empty($data['pj_send'][$i])){
      			for($j=1;$j<$file_length;$j++){
					$del = $del_file[$j];
					$path = "../../../jmadmin/upload/".$del;
					unlink($path); //删除的文件
				}
      		}
		}
		//实体检测删除
		for($i=0;$i<$commission_length;$i++){
			foreach($data['commission'][$i] as $key =>$getoutvis0)
	      	{
	        	if(!$getoutvis0||$getoutvis0=="")
	        	{
	          		unset($data['commission'][$i][$key]);
	        	}
	      	}
	      	$file = implode("",$data['commission'][$i]);  //数组转换为字符串
	      	$del_file = explode("~*^*~",$file);
	      	$file_length = count($del_file);
	      	if(!empty($data['commission'][$i])){
      			for($j=1;$j<$file_length;$j++){
					$del = $del_file[$j];
					$path = "../../../jmadmin/upload/".$del;
					unlink($path); //删除的文件
				}
      		}
		}
		//材料自检
		for($i=0;$i<$materital_self_length;$i++){
			foreach($data['materital_self'][$i] as $key =>$getoutvis0)
	      	{
	        	if(!$getoutvis0||$getoutvis0=="")
	        	{
	          		unset($data['materital_self'][$i][$key]);
	        	}
	      	}
	      	$file = implode("",$data['materital_self'][$i]);  //数组转换为字符串
	      	$del_file = explode("~*^*~",$file);
	      	$file_length = count($del_file);
	      	if(!empty($data['materital_self'][$i])){
      			for($j=1;$j<$file_length;$j++){
					$del = $del_file[$j];
					$path = "../../../jmadmin/upload/".$del;
					unlink($path); //删除的文件
				}
      		}
		}
		//实体自检
		for($i=0;$i<$entity_self_length;$i++){
			foreach($data['entity_self'][$i] as $key =>$getoutvis0)
	      	{
	        	if(!$getoutvis0||$getoutvis0=="")
	        	{
	          		unset($data['entity_self'][$i][$key]);
	        	}
	      	}
	      	$file = implode("",$data['entity_self'][$i]);  //数组转换为字符串
	      	$del_file = explode("~*^*~",$file);
	      	$file_length = count($del_file);
	      	if(!empty($data['entity_self'][$i])){
      			for($j=1;$j<$file_length;$j++){
					$del = $del_file[$j];
					$path = "../../../jmadmin/upload/".$del;
					unlink($path); //删除的文件
				}
      		}
		}
		$this->load->model('root/Pj_all_model','del_img');
		$this->del_img->del_img($pj_timestamp);
	 	
      	
      	
		// for($i=0;$i<$pj_send_length;$i++){
			
			
			// unlink('D:\Data\hxajxt\WWW\CI\jmadmin\upload\15056140321.jpg');  //删除文件函数
			
			
			
			// echo $file_length;		
		// }
		
		// p($del_file);
		// p($data);
		// success('root/pj_all','已确认竣工！');
	}

	/**
	 * 添加人员id到用户工程关系表
	 */
	public function add_userid(){
		$pj_id = $this->input->post('pj_id');
		$road_data = $this->input->post('road_user');//获取施工单位选择的人员
		$overseeing_data = $this->input->post('overseeing');//获取监理单位选择的人员
		$detection_data = $this->input->post('detection');//获取检测单位选择的人员
		$Supervision_data = $this->input->post('Supervision');//获取监督单位选择的人员
//		$user['item'] = explode('|',$item_data);
		// p ($item_data);
		$user['pj_id'] = $pj_id;
		$user['road_user'] = explode('|',$road_data);
		$user['overseeing'] = explode('|',$overseeing_data);
		$user['detection'] = explode('|',$detection_data);
		$user['Supervision'] = explode('|',$Supervision_data);
		// echo count($user['item']);
		// p($user['item'][0]);
		$this->load->model('root/Pj_all_model','add_user');
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
				'施工单位'=> $this->input->post('construction'),
				'监理单位'=> $this->input->post('supervision'),
				'检测单位'=> $this->input->post('detection'),
				'监督机构'=> $this->input->post('Supervision_0'),
				'地址'=> $this->input->post('area'),
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

	/**
	 * 删除工程
	 */
	public function del_pj(){
		$pj_id = $this->input->post('pj_id');
		$this->load->model('root/Pj_all_model','del_pj');
		$this->del_pj->del_pj($pj_id);
	}


}
?>