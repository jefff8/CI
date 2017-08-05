<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_all_model extends CI_Model{
	/**
	 * 全部项目
	 * @return [type] [description]
	 */		
	public function index($uid){
		$data = $this->db->query("select * from 用户工程关系表 a inner join 我的工程 b on a.工程id=b.id where 用户id='$uid' ")->result_array();
		return $data;
	}

	/**
	 * 添加项目
	 */
	public function add($data){
		$this->db->insert('我的工程',$data);
	}

	/**
	 * 删除项目
	 */
	public function del($pid){
		$this->db->delete('我的工程',array('id'=>$pid));
		$this->db->delete('用户工程关系表',array('工程id'=>$pid));
	}

	/**
	 * 项目详情
	 */
	public function detail($pid){
		$data['detail'] = $this->db->query("select * from 我的工程 where id='$pid' ")->result_array();
		//项目部
		$data['item'] = $this->db->query("select * from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='项目部' ")->result_array();

		//施工单位
		$data['road'] = $this->db->query("select * from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='施工单位' ")->result_array();

		//监理单位
		$data['overseeing'] = $this->db->query("select * from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='监理单位' ")->result_array();

		//检测单位
		$data['detection'] = $this->db->query("select * from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='检测单位' ")->result_array();

		//监督单位
		$data['Supervision'] = $this->db->query("select * from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='监督机构' ")->result_array();
		return $data;
	}


	/**
	 * 获取单位人员信息
	 */
	public function user_name(){
		$user['item'] = $this->db->get_where('用户信息',array('单位'=>'项目部'))->result_array();
		$user['road'] = $this->db->get_where('用户信息',array('单位'=>'施工单位'))->result_array();
		$user['overseeing'] = $this->db->get_where('用户信息',array('单位'=>'监理单位'))->result_array();
		$user['detection'] = $this->db->get_where('用户信息',array('单位'=>'检测单位'))->result_array();
		$user['Supervision'] = $this->db->get_where('用户信息',array('单位'=>'监督机构'))->result_array();
		return $user;
	}


	/**
	 * 插入用户id
	 */
	public function add_id($data){
		//获取当前新添加的工程id
		$pj_id = $this->db->query("select max(id) as 工程id from 我的工程")->result_array();
		$new_pj = $pj_id[0]['工程id'];

		//项目部
		$length0 = count($data['item']);
		$item = $data['item'];
		for($i=0;$i<$length0;$i++){
			$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$item[$i]','$new_pj')");
		}


		//施工单位
		$length1 = count($data['road_user']);
		$road = $data['road_user'];
		for($i=0;$i<$length1;$i++){
			$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$road[$i]','$new_pj')");
		}

		//监理单位
		$length2 = count($data['overseeing']);
		$overseeing = $data['overseeing'];
		for($i=0;$i<$length2;$i++){
			$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$overseeing[$i]','$new_pj')");
		}

		//检测单位
		$length3 = count($data['detection']);
		$detection = $data['detection'];
		for($i=0;$i<$length3;$i++){
			$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$detection[$i]','$new_pj')");
		}

		//监督单位
		$length4 = count($data['Supervision']);
		$Supervision = $data['Supervision'];
		for($i=0;$i<$length4;$i++){
			$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$Supervision[$i]','$new_pj')");
		}
	}

}
?>