<?php
	require("../conn.php");
	$self_id = $_POST['self_id'];
	$Str = $_POST['Str'];
	$data = explode("|", $Str);
	$sql = "select * from 材料自检  where id='".$self_id."' ";
	$result = $conn->query($sql);
	if($row = $result -> num_rows>0){
		$sql2 = "update 材料自检  set 自检自测类型='$data[0]',检测部位='$data[1]',数量='$data[2]',检测人='$data[3]',检测日期='$data[4]',备注='$data[5]',检测单位='$data[6]',送样日期='$data[7]',收样日期='$data[8]',送样单位='$data[9]',见证单位='$data[10]',收样单位='$data[11]',见证人='$data[12]' where id='$self_id'";
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