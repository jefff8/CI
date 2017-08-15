<?php
	require("../conn.php");
	$flag = $_POST['flag'];
	$ulId = $_POST['ulId'];
	switch($flag)
	{
		case "获取状态":
			$sql = "select 工程单状态  from 材料送检 where  id = '$ulId' " ;
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
		case "取样":
			$sql = "update 材料送检 set 工程单状态 = '取样' where id ='$ulId' ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="取样成功！";
			}else{
				$data_arr['结果']="取样失败！";
			}
			$data_json = json_encode($data_arr);
			echo $data_json;
			$conn->close();
			break;
		case "删除":
			$sql = "delete from 材料送检  where id ='$ulId' ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="删除成功！";
			}else{
				$data_arr['结果']="删除失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "提交见证":
			$sql = "update 材料送检  set 工程单状态 = '未见证' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="提交成功！";
			}else{
				$data_arr['结果']="提交失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "撤销取样":
			$sql = "update 材料送检  set 工程单状态 = '新增' where id ='$ulId' ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="撤销成功！";
			}else{
				$data_arr['结果']="撤销失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "取样复检":
			$sql = "update 材料送检  set 工程单状态 = '取样复检' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="取样成功！";
			}else{
				$data_arr['结果']="取样失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "撤销取样复检":
			$sql = "update 材料送检  set 工程单状态 = '新增复检' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="撤销成功！";
			}else{
				$data_arr['结果']="撤销失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
	}
?>