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
		case "已见证":
			$sql = "update 材料送检  set 工程单状态 = '已见证' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="见证成功！";
			}else{
				$data_arr['结果']="见证失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "已见证复检":
			$sql = "update 材料送检  set 工程单状态 = '已见证复检' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="见证成功！";
			}else{
				$data_arr['结果']="见证失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "获取工程时间戳":
			$sql = "select 工程时间戳  from 材料送检  where id='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$row = $result->fetch_assoc();
				$pj_timestamp[0]['工程时间戳'] = $row['工程时间戳'];
			}
			$conn->close();
			$pj_timestamp = json_encode($pj_timestamp);
			echo $pj_timestamp;
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
		case "合格":
			$testNum = $_POST['testNum'];
			$sql = "update 材料送检  set 工程单状态 = '合格',检测报告编号='$testNum' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="操作成功！";
			}else{
				$data_arr['结果']="操作失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "复检合格":
			$recheckNum = $_POST['recheckNum'];
			$sql = "update 材料送检  set 工程单状态 = '合格',复检编号 = '$recheckNum' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="操作成功！";
			}else{
				$data_arr['结果']="操作失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "不合格":
			$sql = "update 材料送检  set 工程单状态 = '不合格' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="处理成功！";
			}else{
				$data_arr['结果']="失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "复检不合格":
			$recheckNum = $_POST['recheckNum'];
			$sql = "update 材料送检  set 工程单状态 = '复检不合格',复检编号 = '$recheckNum' where id ='$ulId'  ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="处理成功！";
			}else{
				$data_arr['结果']="失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
			break;
		case "复检":
			$sql2 = "insert into 材料送检初检表  select * from 材料送检  where id ='$ulId' ";
			$conn->query($sql2);
			$sql = "update 材料送检  set 工程单状态 = '新增复检',场景照片='',场景照片说明='',样品照片='',样品照片说明='',收样照片='',收样照片说明='',检测照片='',检测报告照片说明='',处理照片='',处理照片说明='',退厂记录='' where id ='$ulId'";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="复检成功！";
			}else{
				$data_arr['结果']="失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
		case "审批通过":
			$sql = "update 材料送检  set 工程单状态 = '已处理' where id ='$ulId' ";
			$result = $conn->query($sql);
			if($result){
				$data_arr['结果']="提交成功！";
			}else{
				$data_arr['结果']="提交失败！";
			}
			$conn->close();
			$data_json = json_encode($data_arr);
			echo $data_json;
	}
?>