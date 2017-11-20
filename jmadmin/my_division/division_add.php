<?php
	require("../conn.php");
	$divisionType = $_POST["divisionType"];
	$proposer = $_POST["proposer"];
	$applicationTime = $_POST["applicationTime"];
	$timestamp = $_POST["timestamp"];
	$pj_name = $_POST["pj_name"];
	$pj_timestamp = $_POST["pj_timestamp"];
	$sql = "insert into 分部验收 (时间戳,工程时间戳,工程名称,工程单状态,分部类型,申请人,申请时间) values ('$timestamp','$pj_timestamp','$pj_name','施工申请','$divisionType','$proposer','$applicationTime')";
	
	if($conn->query($sql)){
		$result = 'success';
	}else{
		$result = 'fail';
	}
	
	$json = '{
		"result":"'.$result.'"
	}';
	
	echo $json;
	$conn->close();
?>