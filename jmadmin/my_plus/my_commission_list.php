<?php

	$flag = $_POST['flag'];//执行什么的判断条件
	$gcmc = $_POST['gcmc'];
	$timestamp = $_POST['timestamp'];
	if($flag=="创建卡项"){
		require('../conn.php');
		$sql = "select * from 实体检测  where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];				
				$data_arr[$i]['检测类型']=$row['检测类型'];
				$data_arr[$i]['检测部位']=$row['检测部位'];
				$data_arr[$i]['检测数量']=$row['数量'];
				$data_arr[$i]['检测人']=$row['检测人'];
				$data_arr[$i]['检测日期']=$row['检测日期'];
				$data_arr[$i]['备注']=$row['备注'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="获取状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "select 工程单状态  from 实体检测  where id = '$ulid' and 工程名称 = '".$gcmc."' " ;
		$result = $conn->query($sql);
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr['工程单状态']=$row['工程单状态'];
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="准备"){
		$ulid = $_POST['ulid'];
		$code = $_POST['code'];
		require('../conn.php');
		$sql = "update 实体检测 set 工程单状态 = '准备',委托编号='".$code."' where id ='$ulid'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="操作成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="删除"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "delete from 实体检测  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="删除成功！";
		}else{
			$data_arr['结果']="删除失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}
	else if($flag=="撤销准备"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体检测  set 工程单状态 = '新建' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="撤销成功！";
		}else{
			$data_arr['结果']="撤销失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}
//	else if($flag=="不合格"){
//		$ulid = $_POST['ulid'];
//		$timestamp = $_POST['timestamp'];
//		$tresult = $_POST['tresult'];
//		require('../conn.php');
//		$sql = "update 实体检测  set 不合格报告 = '".$tresult."',工程单状态 = '不合格' where id ='$ulid' and 工程时间戳 = '".$timestamp."' ";
//		$result = $conn->query($sql);
//		if($result){
//			$data_arr['结果']="处理成功！";
//		}else{
//			$data_arr['结果']="失败！";
//		}
//		$conn->close();
//		$data_json = json_encode($data_arr);
//		echo $data_json;
//	}
	else if($flag=="合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体检测  set 工程单状态 = '合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}				
	
	
	

	
?>