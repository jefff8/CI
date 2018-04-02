<?php
	require("conn.php");
	
	$account=$_POST["account"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$my_name=$_POST["my_name"];
	$units=$_POST["units"];
	$unitName=$_POST["unitName"];
	$cid=$_POST["cid"];
	
	if($account){
	$sql = "select * from 用户信息 where 账号='".$account."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$jsonresult='该账号已被注册了,请更换!';
	} else {
		$sql = "select * from 用户信息 where 手机='".$mobile."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='该手机已被注册，请更换!';
		} else{
			$sql = "select * from 用户信息 where 邮箱='".$email."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$jsonresult='该邮箱已被注册,请更换!';
			} else{
				$sqli = "insert into 用户信息 (账号,密码,邮箱,手机,姓名,单位,单位名称,cid) values ('$account', '$password', '$email', '$mobile' , '$my_name' , '$units' , '$unitName' , '$cid')";
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}
		}
	}	
	$json = '{"result":"'.$jsonresult.'"		
				}';
	echo $json;
	$conn->close();

	}
?>