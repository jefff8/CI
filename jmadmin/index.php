<?php
	require("conn.php");
	$uid = $_POST['uid'];
	if($uid=="1"){
		$sql = "select count(*) as pj_num from 我的工程  where 是否竣工='0'";
	}else{
		$sql = "SELECT count(*) as pj_num from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid' and 是否竣工='0' ";
	}
	
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