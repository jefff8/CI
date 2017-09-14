<?php
//	github test
	require("conn.php");
	$account=$_POST["account"];
	$password=$_POST["password"];	
	 
	$sql = "select * from 用户信息 where 账号='".$account."'";
	$result = $conn->query($sql);
//	echo $sql;
	$row = $result->fetch_assoc();
	if($password==$row["密码"])	{
		$jsonresult='success';
   		$shji=$row["手机"];
		$my_name=$row["姓名"];
		$uid=$row["id"];
		$unit=$row["单位"];
		$unitName=$row["单位名称"];
	}else{
		$jsonresult='error'; 
	}	
	$json = '{"result":"'.$jsonresult.'",
			  "shji":"'.$shji.'",
			  "my_name":"'.$my_name.'",
			  "uid":"'.$uid.'",
			  "unit":"'.$unit.'",
			  "unitName":"'.$unitName.'"
			}';
	echo $json;
	$conn->close();
?>