<?php
	require("../conn.php");
	$flag = $_POST['flag'];
//	$ulId = $_POST['ulId'];
	switch($flag)
	{	
		case "获取状态":
		$ulId = $_POST['ulId'];
			$sql = "select 工程单状态,工程名称,工程时间戳  from 实体监督抽检 where  id = '$ulId' " ;
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data_arr['工程单状态']=$row['工程单状态'];
					$data_arr['工程名称']=$row['工程名称'];
					$pj_timestamp=$row['工程时间戳'];
				}
			}
			$sql2 = "select id from 我的工程 where 时间戳='$pj_timestamp'";
			$result2 = $conn->query($sql2);
			if($result2->num_rows >0){
				while($row2 = $result2->fetch_assoc()){
					$data_arr['id']=$row2['id'];
				}
			}
			$data_json = json_encode($data_arr);
			echo $data_json;
//			print_r($data_arr);
			$conn->close();
		break;
}
?>