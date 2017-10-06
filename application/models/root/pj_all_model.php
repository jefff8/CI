<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_all_model extends CI_Model{
	/**
	 * 全部工程
	 * @return [type] [description]
	 */		
	public function index($uid){
		if($uid=='1'){
			$data = $this->db->query("select id as 工程id,时间戳,工程名称,地址,施工单位,监理单位,检测单位,监督机构,是否竣工 from 我的工程 ")->result_array();
			return $data;
		}else{
			$data = $this->db->query("select * from 用户工程关系表 a inner join 我的工程 b on a.工程id=b.id where 用户id='$uid' ")->result_array();
			return $data;
		}
		
	}

	
	/**
	 * 添加工程
	 */
	public function add($data){
		$this->db->insert('我的工程',$data);
	}

	/**
	 * 工程竣工
	 */
	public function del($pj_timestamp){
		$data['pj_send'] = $this->db->query("select 场景照片,样品照片,收样照片,检测照片,处理照片 from 材料送检 where 工程时间戳='$pj_timestamp' ")->result_array();
		$data['commission'] = $this->db->query("select 检测前照片,检测实施过程照片,检测设备照片,实测照片,不合格报表,处理照片 from 实体检测 where 工程时间戳='$pj_timestamp' ")->result_array();
		$data['materital_self'] = $this->db->query("select 检测前照片,检测实施过程照片,检测设备照片,自测照片,处理照片 from 材料自检 where 工程时间戳='$pj_timestamp' ")->result_array();
		$data['entity_self'] = $this->db->query("select 检测前照片,检测实施过程照片,检测设备照片,自测照片,处理照片 from 实体自检 where 工程时间戳='$pj_timestamp' ")->result_array();
		return $data;
		// $this->db->delete('用户工程关系表',array('工程id'=>$pid));
	}

	/**
	 * 竣工的图片处理
	 */
	public function del_img($pj_timestamp){
		$this->db->query("update 材料送检 set 场景照片='0',样品照片='0',收样照片='0',检测照片='0',处理照片='0' where 工程时间戳='$pj_timestamp'");
		$this->db->query("update 实体检测 set 检测前照片='0',检测实施过程照片='0',检测设备照片='0',实测照片='0',不合格报表='0',处理照片='0' where 工程时间戳='$pj_timestamp'");
		$this->db->query("update 材料自检 set 检测前照片='0',检测实施过程照片='0',检测设备照片='0',自测照片='0',处理照片='0' where 工程时间戳='$pj_timestamp'");
		$this->db->query("update 实体自检 set 检测前照片='0',检测实施过程照片='0',检测设备照片='0',自测照片='0',处理照片='0' where 工程时间戳='$pj_timestamp'");
		$this->db->query("update 我的工程 set 是否竣工='1' where 时间戳='$pj_timestamp'");
	}

	/**
	 * 工程详情
	 */
	public function detail($pid){
		$data['detail'] = $this->db->query("select * from 我的工程 where id='$pid' ")->result_array();
		//项目部
		$data['item'] = $this->db->query("select a.id,b.姓名,b.手机,b.单位名称 from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='项目部' ")->result_array();

		//施工单位
		$data['road'] = $this->db->query("select a.id,b.姓名,b.手机,b.单位名称 from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='施工单位' ")->result_array();

		//监理单位
		$data['overseeing'] = $this->db->query("select a.id,b.姓名,b.手机,b.单位名称 from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='监理单位' ")->result_array();

		//检测单位
		$data['detection'] = $this->db->query("select a.id,b.姓名,b.手机,b.单位名称 from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='检测单位' ")->result_array();

		//监督单位
		$data['Supervision'] = $this->db->query("select a.id,b.姓名,b.手机,b.单位名称 from 用户工程关系表 a inner join 用户信息 b on a.用户id=b.id where a.工程id='$pid' and b.单位='监督机构' ")->result_array();
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
	 * 获取单位名称信息
	 */
	public function org_name(){
		$sql = "SELECT id,单位名称 FROM 用户信息 WHERE 单位=? GROUP BY 单位名称";
		// $user['item'] = $this->db->query($sql,array('项目部'))->result_array();
		$user['road'] = $this->db->query($sql,array('施工单位'))->result_array();
		$user['overseeing'] = $this->db->query($sql,array('监理单位'))->result_array();
		$user['detection'] = $this->db->query($sql,array('检测单位'))->result_array();
		$user['Supervision'] = $this->db->query($sql,array('监督机构'))->result_array();
		return $user;
	}
	/**
	 * 插入用户id
	 */
	public function add_id($data){
		//获取当前新添加的工程id
		$pj_id = $this->db->query("select max(id) as 工程id from 我的工程")->result_array();
		$new_pj = $pj_id[0]['工程id'];

//		//项目部
//		$length0 = count($data['item']);
//		$item = $data['item'];
//		if($item[0]){
//			for($i=0;$i<$length0;$i++){
//				$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$item[$i]','$new_pj')");
//			}
//		}
		

		//施工单位:先通过手机号获取id再保存
		$length1 = count($data['road_user']);
		$road = $data['road_user'];
		if($road[0]){
			for($i=0;$i<$length1;$i++){
				$data_id = $this->db->query("select id from 用户信息  where 手机='$road[$i]'")->result_array();
				$road_id[] = $data_id[0]['id'];
			}
		}
		$length1 = count($road_id);
		if($road_id[0]){
			for($i=0;$i<$length1;$i++){
				$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$road_id[$i]','$new_pj')");
			}
		}
		

		//监理单位
		$length2 = count($data['overseeing']);
		$overseeing = $data['overseeing'];
		if($overseeing[0]){
			for($i=0;$i<$length2;$i++){
				$data_id2 = $this->db->query("select id from 用户信息  where 手机='$overseeing[$i]'")->result_array();
				$overseeing_id[] = $data_id2[0]['id'];
			}
		}
		$length2 = count($overseeing_id);
		if($overseeing_id[0]){
			for($i=0;$i<$length2;$i++){
				$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$overseeing_id[$i]','$new_pj')");
			}
		}
		

		//检测单位
		$length3 = count($data['detection']);
		$detection = $data['detection'];
		if($detection[0]){
			for($i=0;$i<$length3;$i++){
				$data_id3 = $this->db->query("select id from 用户信息  where 手机='$detection[$i]'")->result_array();
				$detection_id[] = $data_id3[0]['id'];
			}
		}		
		$length3 = count($detection_id);
		if($detection_id[0]){
			for($i=0;$i<$length3;$i++){
				$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$detection_id[$i]','$new_pj')");
			}
		}
		

		//监督单位
		$length4 = count($data['Supervision']);
		$Supervision = $data['Supervision'];
		if($Supervision[0]){
			for($i=0;$i<$length4;$i++){
				$data_id4 = $this->db->query("select id from 用户信息  where 手机='$Supervision[$i]'")->result_array();
				$Supervision_id[] = $data_id4[0]['id'];
			}
		}		
		$length4 = count($Supervision_id);
		if($Supervision_id[0]){
			for($i=0;$i<$length4;$i++){
				$this->db->query("insert into 用户工程关系表 (用户id,工程id) values ('$Supervision_id[$i]','$new_pj')");
			}
		}
	}

	/**
	 * 工程基本信息更新
	 */
	public function update($data){
		$timestamp = $data['时间戳'];
		$where = " 时间戳 = '$timestamp' ";
		$this->db->update('我的工程',$data,$where);
	}

	/**
	 * 删除工程人员
	 */
	public function del_user($id){
		$this->db->delete('用户工程关系表',array('id'=>$id));
	}

	/**
	 * 删除工程
	 */
	public function del_pj($pj_id){
		$this->db->delete('我的工程',array('id'=>$pj_id));
		$this->db->delete('用户工程关系表',array('工程id'=>$pj_id));
	}

}
?>