<?php
	require("../conn.php");
	$divisionType = $_POST["divisionType"];
	$constructionUnits = $_POST["constructionUnits"]; 
	$applicationTime = $_POST["applicationTime"];
	$timestamp = $_POST["timestamp"];
	$pj_name = $_POST["pj_name"];
	$pj_timestamp = $_POST["pj_timestamp"];
	$supervision = $_POST["supervision"];
	$prospectingUnits = $_POST["prospectingUnits"];
	$designUnits = $_POST["designUnits"];
	$sql = "insert into 分部验收 (时间戳,工程时间戳,工程名称,工程单状态,分部工程名称,发起时间,发起单位,监理单位,勘察单位,设计单位) values ('$timestamp','$pj_timestamp','$pj_name','施工申请','$divisionType','$applicationTime','$constructionUnits','$supervision','$prospectingUnits','$designUnits')";
	
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