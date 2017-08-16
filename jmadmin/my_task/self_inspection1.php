<?php
	require("../conn.php");
	$flag = $_POST['flag'];
	$ulId = $_POST['ulId'];
	switch($flag){
		case "获取状态":
			$sql = "select 工程单状态  from 材料自检  where  id = '$ulId' " ;
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data_arr['工程单状态']=$row['工程单状态'];
				}
			}
			$data_json = json_encode($data_arr);
			echo $data_json;
			$conn->close();
			break;
		case "获取时间戳":
			$sql = "select 时间戳  from 材料自检  where  id = '$ulId' " ;
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data_arr['时间戳']=$row['时间戳'];
				}
			}
			$data_json = json_encode($data_arr);
			echo $data_json;
			$conn->close();
			break;
		case "单位名称":
			$pj_time = $_POST['pj_timestamp'];
			$sql = "select 施工单位,检测单位,监理单位 from 我的工程  where 时间戳='$pj_time'";
			$result = $conn->query($sql);
			if($result){
				$row = $result->fetch_assoc();
				$data[0]['施工单位'] = $row['施工单位'];
				$data[0]['检测单位'] = $row['检测单位'];
				$data[0]['监理单位'] = $row['监理单位'];
			}
			$conn->close();
			$data = json_encode($data);
			echo $data;
			break;
		case "删除":
			$sql = "delete from 材料自检  where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$return['result'] = "删除成功！";
			}else{
				$return['result'] = "删除失败！";
			}
			$json = json_encode($return);
			echo $json;
			$conn->close(); 
			break;
		case "准备材料":
			$sql = "update 材料自检 set 工程单状态='准备材料' where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$return['result'] = "成功";
			}else{
				$return['result'] = "失败";
			}
			$json = json_encode($return);
			echo $json;
			$conn->close();
			break;
		case "提交见证":
			$sql = "update 材料自检 set 工程单状态='提交见证' where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$return['result'] = "提交成功";
			}else{
				$return['result'] = "提交失败";
			}
			$json = json_encode($return);
			echo $json;
			$conn->close();
			break;
		case "撤销取样":
			$sql = "update 材料自检 set 工程单状态='新增' where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$return['result'] = "撤销成功";
			}else{
				$return['result'] = "撤销失败";
			}
			$json = json_encode($return);
			echo $json;
			$conn->close();
			break;
		case "合格":
			$sql = "update 材料自检 set 工程单状态='合格' where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$return['result'] = "操作成功";
			}else{
				$return['result'] = "操作失败";
			}
			$json = json_encode($return);
			echo $json;
			$conn->close();
			break;
	}
?>