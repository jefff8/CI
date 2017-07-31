<?php
	require("conn.php");
	$sql = "select count(*) as pj_num from 我的工程  ";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			$pj_num = $row['pj_num'];
		}
		$status = "success";
	}
	$json = '{
		"status":"'.$status.'",
		"pj_num":"'.$pj_num.'"
	}';
	echo $json;
	$conn->close();
?>