<?php
	require('../conn.php');
	$uid = $_POST['uid'];
	if($uid=='1'){
		$sql = "select * from 我的工程";
	}else{
		$sql = "SELECT * from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid' order by 工程id";
	}
	
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result);
	$i = 0;
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
//			$sqldata=$sqldata.'{"id":'.$row['id'].','.'"时间戳":'.$row['时间戳'].','.'"工程名称":'.$row['工程名称'].','.'"地区":'.$row['地区'].'},';
			$data_arr[$i]['id']=$row['id'];
			$data_arr[$i]['时间戳']=$row['时间戳'];
			$data_arr[$i]['工程名称']=$row['工程名称'];
			$data_arr[$i]['地区']=$row['地区'];
			$data_arr[$i]['施工单位']=$row['施工单位'];
			$data_arr[$i]['监理单位']=$row['监理单位'];
			$data_arr[$i]['检测单位']=$row['检测单位'];
			$i++;
		}
	}
	/*
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldata.$otherdate.']';
	echo $json;
	*/
	$data_json = json_encode($data_arr);
	echo $data_json;
?>