<?php
	require("../conn.php");
	$title = $_POST['title'];
	$notice = $_POST['notice'];
	$my_name = $_POST['my_name'];
	$mytime = $_POST['mytime'];
	$sql = " insert into 信息发布  (发布人,公告标题,公告内容,发布时间) values ('".$my_name."','".$title."','".$notice."','".$mytime."') ";
	if($conn->query($sql) === TRUE){
		$jsonresult = 'success';
	}else{
		$jsonresult = 'fail';
	}
	$json = '{"result":"'.$jsonresult.'"
			}';	
	echo $json;
	$conn->close();	
?>