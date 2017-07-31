<?php
	require("../conn.php");
	$self_id = $_POST['self_id'];
	$Str = $_POST['Str'];
	$data = explode("|", $Str);
	$sql = "select * from 材料送检  where id='".$self_id."' ";
	$result = $conn->query($sql);
	if($row = $result -> num_rows>0){
		$sql2 = "update 材料送检  set 取样类型='$data[0]',规格='$data[1]',数量='$data[2]',生产厂家='$data[3]',取样人='$data[4]',进场日期='$data[5]',取样日期='$data[6]',合格证编号='$data[7]',使用部位='$data[8]',经销商单位='$data[9]',备注='$data[10]',检测单位='$data[11]' where id='$self_id'";
		if($conn->query($sql2)){
			$json_result = 'success';
		}else{
			$json_result = 'fail';
		}
	}
	$json = '{"result":"'.$json_result.'"}';
	echo $json;
	$conn->close();
?>