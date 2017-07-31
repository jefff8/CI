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
		$sql = "insert into  实体自检(工程名称,工程时间戳,自检自测类型,规格,数量,生产厂家,取样人,进厂日期,取样日期,合格证编号,使用部位,经销商单位,备注,时间戳,工程单状态) values(";
		$sql .= "'$project_name','$timestamp','$data_arr[0]','$data_arr[1]','$data_arr[2]','$data_arr[3]','$data_arr[4]','$data_arr[5]','$data_arr[6]','$data_arr[7]','$data_arr[8]','$data_arr[9]','$data_arr[10]','$data_arr[11]','新增')";
		
//		echo $sql;
		$result=$conn->query($sql);
		if($result===true){
			$json = 'success';
		}else{
			$json = 'fail';
		}
		$jsonresult = '{"result":"'.$json.'"}';
		echo $jsonresult;
		$conn->close();
	}
?>