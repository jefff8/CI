<?php
	require("../conn.php");
	$sql = "select count(*) as num  from 材料送检 ";
	$result = $conn->query($sql);
	if($result){
		while($row = $result->fetch_assoc()){
			$num[0]['任务数'] = $row['num'];
		}
	}
	$json = json_encode($num);
	echo $json;
	$conn->close();
?>