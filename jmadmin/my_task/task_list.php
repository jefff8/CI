<?php
	require("../conn.php");
	$flag=$_POST['flag'];
	
	if($flag=='获取工程时间戳'){
		$uid = $_POST['uid'];
		$sql = "SELECT * from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid'";
		$result = $conn->query($sql);
		$i=0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data[$i]['时间戳'] = $row['时间戳'];
				$i++;
			}
		}
		
	}
	
	//材料送检
	if($flag=='材料送检'){
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='取样' or 工程单状态='新增复检' or 工程单状态='取样复检')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='未见证' or 工程单状态='未见证复检' or 工程单状态='已见证' or 工程单状态='已见证复检')";
		}else if($unit=='检测单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='收样' or 工程单状态='收样复检')";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['取样类型'] = $row['取样类型'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['规格'] = $row['规格'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['取样人'] = $row['取样人'];
				$data[$i]['取样日期'] = $row['取样日期'];
				$i++;
			}
		}
	}
	
	//材料自检
	if($flag=='材料自检'){
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 材料自检  where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='准备材料')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 材料自检  where 工程时间戳='$pj_timestamp' and (工程单状态='提交见证' or 工程单状态='确定自测' )";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 材料自检 where 工程时间戳='$pj_timestamp' ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['自检自测类型'] = $row['自检自测类型'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	
	//实体自检
	if($flag=='实体自检'){
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 实体自检  where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='准备材料')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 实体自检  where 工程时间戳='$pj_timestamp' and (工程单状态='未检测' or 工程单状态='确定检测' )";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 实体自检 where 工程时间戳='$pj_timestamp' ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['自检自测类型'] = $row['自检自测类型'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	
	//实体检测
	if($flag=='实体检测'){
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='检测单位'){
			$sql = "SELECT * from 实体检测  where 工程时间戳='$pj_timestamp' and (工程单状态='新建' or 工程单状态='准备' or 工程单状态='提交结果')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 实体检测  where 工程时间戳='$pj_timestamp' and (工程单状态='待确认' or 工程单状态='已确认' )";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 实体检测 where 工程时间戳='$pj_timestamp' ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['检测类型'] = $row['检测类型'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	$json = json_encode($data);
	echo $json;
	$conn->close();
?>