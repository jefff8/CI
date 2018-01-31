<?php
	require("conn.php");
	$mobPhone = $_POST["mobPhone"];
	$sql1 = "select * from 用户信息  where 手机='$mobPhone'";
	$result = $conn->query($sql1);
	if($result->num_rows >0){
		$row = $result->fetch_assoc();
		$account = $row['账号'];
		$password1 = $row['密码'];
		$jsonresult = "success";
	}else{
		$jsonresult = "error";
		$account = '';
		$password1 = '';
	}
	$json = '{"result":"'.$jsonresult.'",
			  "account":"'.$account.'",
			  "password":"'.$password1.'"
			}';
	echo $json;
	$conn->close();
?>