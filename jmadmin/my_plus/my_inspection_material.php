<?php
	$flag = $_POST['flag'];//做什么的标志
	
	if($flag == "创建卡项"){
		$gcmc = $_POST['gcmc'];
		$timestamp = $_POST['timestamp'];
		require("../conn.php");
		$sql = "select * from 材料自检   where 工程名称='$gcmc' and 工程时间戳='$timestamp' order by id desc";
		$result = $conn->query($sql);
		$i=0;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$return_data[$i]['id']=$row['id'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$return_data[$i]['自检自测类型']=$row['自检自测类型'];
				$return_data[$i]['检测部位']=$row['检测部位'];
				$return_data[$i]['检测数量']=$row['数量'];
				$return_data[$i]['检测人']=$row['检测人'];
				$return_data[$i]['检测日期']=$row['检测日期'];
				$return_data[$i]['时间戳']=$row['时间戳'];
				$return_data[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['备注']=$row['备注'];
				$i++;
			}
		}
		$json = json_encode($return_data);
		echo $json;
		$conn->close();
		
	}else if($flag == "删除抽检"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "delete from 材料自检  where id='$ulid'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "删除成功！";
		}else{
			$return['result'] = "删除失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "获取状态"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "select 工程单状态,时间戳 from 材料自检   where id='$ulid'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$data_send['工程单状态'] = $row['工程单状态'];
				$data_send['时间戳'] = $row['时间戳'];
			}
		}
		$json = json_encode($data_send);
		echo $json;
		$conn->close();
	}else if($flag == "准备材料"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='准备材料' where id='$ulid'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "取样成功！";
		}else{
			$return['result'] = "取样失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "撤销取样"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='新增' where id='$ulid'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "撤销取样成功！";
		}else{
			$return['result'] = "撤销取样失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "提交见证"){
		$self_id = $_POST['gcdId'];
		require('../conn.php');
		$sql = "update 材料自检 set 工程单状态='提交见证' where id='$self_id' and 工程单状态='准备材料'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "提交成功";
		}else{
			$return['result'] = "提交失败";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close();
	}else if($flag == "合格"){
		$self_timestamp = $_POST['self_timestamp'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='合格' where 时间戳='$self_timestamp'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "处理成功！";
		}else{
			$return['result'] = "处理失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "不合格"){
		$ulId = $_POST['ulId'];
		require("../conn.php");
		$sql = "update 材料自检 set 工程单状态='不合格' where id='$ulId' ";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "处理成功!";
		}else{
			$return['result'] = "处理失败!";
		}
		$josn = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag=="取样送检"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql2 = "insert into 材料自检初检表  select * from 材料自检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$conn->query($sql2);
		$sql = "update 材料自检  set 工程单状态 = '取样送检',检测前照片='',场景照片说明='',检测实施过程照片='',检测实施过程照片说明='',检测设备照片='',检测设备照片说明='',自测照片='',自测照片说明='',处理照片='',处理照片说明='',退场记录='' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="取样送检成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=='初检单'){
		require('../conn.php');
		$gcmc = $_POST['gcmc'];
		$timestamp = $_POST['timestamp'];
		//初检单
		$sql = "select * from 材料自检初检表 where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
		$result = $conn->query($sql);
		$i = 0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['自检自测类型']=$row['自检自测类型'];
				$data_arr[$i]['备注']=$row['备注'];
				$data_arr[$i]['数量']=$row['数量'];
				$data_arr[$i]['检测部位']=$row['检测部位'];
				$data_arr[$i]['检测人']=$row['检测人'];
				$data_arr[$i]['检测日期']=$row['检测日期'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$i++;
			}
		}
		$data_json = json_encode($data_arr);
		echo $data_json;
		$conn->close();
	}else if($flag == "取样送检准备材料"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='取样送检准备材料' where id='$ulid'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "取样成功！";
		}else{
			$return['result'] = "取样失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "撤销取样送检准备材料"){
		$ulid = $_POST['ulid'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='取样送检' where id='$ulid'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "撤销取样成功！";
		}else{
			$return['result'] = "撤销取样失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}else if($flag == "取样送检提交见证"){
		$self_id = $_POST['gcdId'];
		require('../conn.php');
		$sql = "update 材料自检 set 工程单状态='取样送检提交见证' where id='$self_id' and 工程单状态='取样送检准备材料'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "提交成功";
		}else{
			$return['result'] = "提交失败";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close();
	}else if($flag == "取样送检合格"){
		$self_timestamp = $_POST['self_timestamp'];
		require("../conn.php");
		$sql = "update 材料自检   set 工程单状态='取样送检合格' where 时间戳='$self_timestamp'";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "处理成功！";
		}else{
			$return['result'] = "处理失败！";
		}
		$json = json_encode($return);
		echo $json;
		$conn->close(); 
	}
	
	
	
?>