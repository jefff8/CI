<?php
	require("../conn.php");
	$pj_timestamp = $_POST['pj_timestamp'];
	$pj_name = $_POST['pj_name'];
	$category = $_POST['category'];
	
	//不合格数
	$sql1 = "select count(*) as result_fail from $category   where  工程时间戳 = '$pj_timestamp' and 工程名称 = '$pj_name' and 工程单状态 = '不合格' ";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
		while($row = $result1->fetch_assoc()){
			$fail = $row["result_fail"];
		}
	}
	
	//合格数
	$sql2 = "select count(*) as result_qualified from $category  where  工程时间戳 = '$pj_timestamp' and 工程名称 = '$pj_name' and 工程单状态 = '合格' ";
	$result2 = $conn->query($sql2);
	if($result2->num_rows>0){
		while($row = $result2->fetch_assoc()){
			$qualified = $row['result_qualified'];
		}
	}	
	
	$jsonresult='success';
	$json = '{	"result":"'.$jsonresult.'",
				"fail":"'.$fail.'",
			    "qualified":"'.$qualified.'"
			}';	
	echo $json;
	$conn->close();	
?>