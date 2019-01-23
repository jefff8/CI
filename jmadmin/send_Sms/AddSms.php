<?php
	require("../conn.php");
	$flag = $_POST["flag"]; 
	$submodule = $_POST["submodule"];
	$PjName = $_POST["gcmc"];
	$mobile = $_POST["mobile"];
	if($flag=="add"){
		$intime = date("Y/m/d");
		$mytime = $_POST["mytime"];
		$my_name = $_POST["my_name"];
		$SecurityCode = $_POST["SecurityCode"];
		$delsql = "delete from 短信记录 where 手机号='$mobile' and 工程名称='$PjName' and 子模块='$submodule'";
		$conn->query($delsql);
		$sql = "insert into 短信记录  (工程名称,子模块,验证码,姓名,手机号,时间,插入时间) values ('$PjName','$submodule','$SecurityCode','$my_name','$mobile','$mytime','$intime')";
		$conn->query($sql);
		$conn->close();
		$json = '{
			"result":"success"
		}';
		echo $json;
	}else{
		$sql = "select 验证码  from 短信记录  where 手机号='$mobile' and 工程名称='$PjName' and 子模块='$submodule'";
		$result = $conn->query($sql);
		$i=0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$dataArray[$i]['验证码'] = $row['验证码'];
				$i++;
			}
		}
		$conn->close();
		$json = json_encode($dataArray);
		echo $json;
	}
?>