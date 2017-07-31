<?php
	require("../conn.php");
	$gcdId=$_POST["gcdId"];
	$zjzt=$_POST["zjzt"];
	
	
	////////////////////////////////见证中//////////////////////////////
	if($zjzt=='qdjc'){
		$qdjc = '未检测';
		$sqli = "update 实体自检   set 工程单状态='".$qdjc."' where id='".$gcdId."' ";
		$result =$conn->query($sqli);
	}
	////////////////////////////////见证中//////////////////////////////
			
//	$json = '['.$otherdate.']';
	
	$conn->close();	
?>