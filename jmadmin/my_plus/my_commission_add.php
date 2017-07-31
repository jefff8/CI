<?php
	$type = $_POST["test_type"];//获取类型
	
	$norm = $_POST["norm"];//获取规格
	$num = $_POST["num"];//获取数量
	$procj = $_POST["procj"];//获取生产厂家
	$qpeo = $_POST["qpeo"];//获取取样人
	$jcdata = $_POST["jcdata"];//获取进厂日期
	$qdata = $_POST["qdata"];//获取取样日期
	$hgid = $_POST["hgid"];//获取合格者编号
	$usap = $_POST["usap"];//获取使用部位
	$ecun = $_POST["ecun"];//获取经销商单位
	$rmark = $_POST["rmark"];//获取备注
		
	$dpm = $_POST["test_dpm"];//获取检测单位
	$tsp = $_POST["owtst"];//获取時間戳
	$protsp = $_POST["prots"];//获取工程時間戳
	$pronewpe = $_POST["pronewpe"];//获取案件新建人
	$proname = $_POST["proname"];//获取工程名稱
	
	require"../conn.php";
		$sql = "insert into 实体检测(时间戳,工程名称,工程时间戳,检测类型,
								规格,数量,生产厂家,取样人,进场日期,取样日期,合格证编号,使用部位,经销商单位,备注,
								检测单位,工程单状态)  
								values ('".$tsp."','".$proname."','".$protsp."','".$type."',
						'".$norm."','".$num."','".$procj."','".$qpeo."','".$jcdata."','".$qdata."','".$hgid."',
						'".$usap."','".$ecun."','".$rmark."',
						'".$dpm."','新建')";
			
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