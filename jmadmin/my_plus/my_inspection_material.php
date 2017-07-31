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
				$return_data[$i]['自检自测类型']=$row['自检自测类型'];
				$return_data[$i]['规格']=$row['规格'];
				$return_data[$i]['数量']=$row['数量'];
				$return_data[$i]['生产厂家']=$row['生产厂家'];
				$return_data[$i]['取样人']=$row['取样人'];
				$return_data[$i]['进场日期']=$row['进场日期'];
				$return_data[$i]['时间戳']=$row['时间戳'];
				$return_data[$i]['取样日期']=$row['取样日期'];
				$return_data[$i]['合格证编号']=$row['合格证编号'];
				$return_data[$i]['使用部位']=$row['使用部位'];
				$return_data[$i]['工程单状态']=$row['工程单状态'];
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
	}else if($flag == "撤销准备材料"){
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
		$sql = "update 材料自检 set 工程单状态='已处理' where id='$ulId' ";
		$result = $conn->query($sql);
		if($result){
			$return['result'] = "处理成功!";
		}else{
			$return['result'] = "处理失败!";
		}
		$josn = json_encode($return);
		echo $json;
		$conn->close(); 
	}
	
	
	
?>