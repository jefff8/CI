<?php
   	require('../conn.php');
    $selfid = $_POST['selfid'];
	$sql = "select * from 信息发布   where id='".$selfid."'";
	$result = $conn->query($sql);
	$i = 0;
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			$data_arr[$i]['id']=$row['id'];
			$data_arr[$i]['发布人']=$row['发布人'];
			$data_arr[$i]['公告标题']=$row['公告标题'];
			$data_arr[$i]['公告内容']=$row['公告内容'];
			$data_arr[$i]['发布时间']=$row['发布时间'];
			$i++;
		}
	}
	$conn->close();
	$data_json = json_encode($data_arr);
	echo $data_json;
?>