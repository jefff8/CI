<?php
	$flag = $_POST['flag'];//做什么的标志
	
	if($flag == "保存信息"){
		//获取信息并整理
		$project_name = $_POST['project_name'];
		$timestamp = $_POST['timestamp'];
		$str_send = $_POST['str_send'];
		$data_arr=explode("|", $str_send);
		//保存到数据库
		require("../conn.php");
		$sql = "insert into  材料自检(工程名称,工程时间戳,自检自测类型,检测部位,数量,检测人,检测日期,备注,检测单位,时间戳,工程单状态) values(";
		$sql .= "'$project_name','$timestamp','$data_arr[0]','$data_arr[1]','$data_arr[2]','$data_arr[3]','$data_arr[4]','$data_arr[5]','$data_arr[6]','$data_arr[7]','新增')";
//		echo $sql;
		$result=$conn->query($sql);
		if($result===true){
			$return= "success";
		}else{
			$return= "fail";
		}
		
//		$json = json_encode($return);
		$json = '{"result":"'.$return.'"}';
		echo $json;
		$conn->close();
	}
?>