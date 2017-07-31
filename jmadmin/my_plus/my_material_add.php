<?php
	require("../conn.php");
	$str = $_POST["str"];
	$sjc = $_POST["sjc"];
	$gcmc = $_POST["gcmc"];
	$timestamp = $_POST["timestamp"];
	$cl = explode("|", $str);
	$sql = "insert into 材料送检(时间戳,工程时间戳,工程名称,取样类型,规格,数量,生产厂家,取样人,进场日期,取样日期,合格证编号,使用部位,经销商单位,备注,检测单位,工程单状态) values('$sjc','$timestamp','$gcmc','$cl[0]','$cl[1]','$cl[2]','$cl[3]','$cl[4]','$cl[5]','$cl[6]','$cl[7]','$cl[8]','$cl[9]','$cl[10]','$cl[11]','新增')";
	$result = $conn->query($sql);
	$conn->close();
?>