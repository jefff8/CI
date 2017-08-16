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
	}
?>