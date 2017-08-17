<?php
	require("conn.php");
	$mobile = $_POST['mobile'];
	$sql="select id,单位 from 用户信息 where 手机= '".$mobile."'";
	$result = $conn->query($sql);
	$i=0;
	if($result -> num_rows>0){
		while($row = $result->fetch_assoc()){
			$data[$i]['id']=$row['id'];
			$data[$i]['单位']=$row['单位'];
		}
	}
	$json = json_encode($data);
//	返回用户单位
//在页面用data[0]['单位']，判断是此用户是属于什么单位的用户，在进行下一步判断
	echo $json;
	$conn->close();
?>