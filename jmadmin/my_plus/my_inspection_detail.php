<?php
	$flag = $_POST['flag'];
	
	if($flag == "获取信息" ){
		$timestamp = $_POST['sjc'];
		$project_id = $_POST['gcid'];
		require("../conn.php");
		$sql = "select  *  from 材料自检   where id='$project_id' and 时间戳='$timestamp'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$return_data['工程单状态']=$row['工程单状态'];
				$return_data['自检自测类型']=$row['自检自测类型'];
				$return_data['检测部位']=$row['检测部位'];
				$return_data['检测数量']=$row['数量'];
				$return_data['检测人']=$row['检测人'];
				$return_data['检测日期']=$row['检测日期'];
				$return_data['检测单位']=$row['检测单位'];
				$return_data['备注']=$row['备注'];
				$return_data['送样日期']=$row['送样日期'];
				$return_data['收样日期']=$row['收样日期'];
				$return_data['送样单位']=$row['送样单位'];
				$return_data['收样单位']=$row['收样单位'];
				$return_data['见证单位']=$row['见证单位'];
				$return_data['送样人']=$row['送样人'];
				$return_data['见证人']=$row['见证人'];
				$return_data['检测报告编号']=$row['检测报告编号'];
				$return_data['处理情况']=$row['处理情况'];
				$return_data['退厂记录']=$row['退厂记录'];
			}
		}
		$json = json_encode($return_data);
		echo $json;
		$conn->close();
	}else if($flag == "获取图片"){
		$timestamp = $_POST['sjc'];
		$project_id = $_POST['gcid'];
		require("../conn.php");
		$sql = "select 时间戳,工程单状态,检测前照片,检测实施过程照片,检测设备照片,自测照片,处理照片 from 材料自检   where id='$project_id' and 时间戳='$timestamp'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$return_data['时间戳']=$row['时间戳'];
				$return_data['工程单状态']=$row['工程单状态'];
				$return_data['检测前照片']=$row['检测前照片'];
				$return_data['检测实施过程照片']=$row['检测实施过程照片'];
				$return_data['检测设备照片']=$row['检测设备照片'];
				$return_data['自测照片']=$row['自测照片'];
				$return_data['处理照片']=$row['处理照片'];
			}
		}
		$json = json_encode($return_data);
		echo $json;
		$conn->close();
	}
?>