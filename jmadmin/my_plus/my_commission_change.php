<?php
	$id = $_POST['tid'];
//	$time = $_POST['test_time'];
//	$tpart = $_POST['test_part'];
	$sedate= $_POST['sedate'];
	$redate = $_POST['redate'];
	$seun = $_POST['seun'];
	$wiun = $_POST['wiun'];
	$reun = $_POST['reun'];
	$sepe = $_POST['sepe'];
	$wipe = $_POST['wipe'];
	$teid = $_POST['teid'];

	require'../conn.php';
	$sql = "UPDATE 实体检测 SET 送样日期='".$sedate."',收样日期='".$redate."' ,送样单位='".$seun."',见证单位='".$wiun."',
							收样单位='".$reun."',送样人='".$sepe."',见证人='".$wipe."',检测报告编号='".$teid."'
							WHERE `id`='".$id."' AND `工程时间戳`='".$protisp."'";
	$result  = $conn->query($sql);
	
	$sql2 = "update 实体检测  set 工程单状态 = '待确认' where id ='".$id."' AND `工程时间戳`='".$protisp."' ";
	$result2 = $conn->query($sql2);
	if($result2){
		$data_arr['结果']="提交成功！";
	}else{
		$data_arr['结果']="提交失败！";
	}
	$conn->close();
	$data_json = json_encode($data_arr);
	echo $data_json;

//	$conn->close();
?>