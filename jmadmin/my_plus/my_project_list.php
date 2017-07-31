<?php
	require('../conn.php');
	$sql = "select id,时间戳,工程名称,地区  from 我的工程  order by id";
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