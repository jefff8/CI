<?php
	require("../conn.php");
	$gcid=$_POST['gcid'];
	$tcjv=$_POST['tcjv'];
	$sql = "select * from 材料送检  where id='".$gcid."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if($result->num_rows > 0){
		$sqli = "update 材料送检  set 工程单状态='待审批',退厂记录='".$tcjv."' where id='".$gcid."'";
		if($conn->query($sqli) === TRUE){
				$jsonresult = 'success';
			}else{
				$jsonresult = 'fail';
			}
	}else{
		$jsonresult = '数据库并无数据';
	}
	$json = '{"result":"'.$jsonresult.'",
			  "count":"'.$count.'"
			}';		
	echo $json;
	$conn->close();	
?>