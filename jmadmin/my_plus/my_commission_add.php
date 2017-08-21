<?php
	$type = $_POST["test_type"];//获取类型
	$jcbw = $_POST["jcbw"];//检测部位
	$num = $_POST["num"];//获取数量
	$jcr = $_POST["jcr"];//检测人
	$jcrq = $_POST["jcrq"];//检测日期
	$rmark = $_POST["rmark"];//备注		
	$dpm = $_POST["test_dpm"];//获取检测单位
	$tsp = $_POST["owtst"];//获取時間戳
	$protsp = $_POST["prots"];//获取工程時間戳
	$proname = $_POST["proname"];//获取工程名稱
	
	require"../conn.php";
		$sql = "insert into 实体检测(时间戳,工程名称,工程时间戳,检测类型,检测部位,数量,检测人,检测日期,备注,检测单位,工程单状态)  
								values ('".$tsp."','".$proname."','".$protsp."','".$type."',
'".$jcbw."','".$num."','".$jcr."','".$jcrq."','".$rmark."','".$dpm."','新建')";
			
	$result = $conn->query($sql);
	if($result){
		$jsonresult = 'success';
	}else{
		$jsonresult = 'fail';
	}
//	echo 1;
	$json = '{"result":"'.$jsonresult.'"}';
	echo $json;
	echo $sql;
	$conn->close();
//	echo 0; 
?>