<?php
	require("../conn.php");
	$ulid=$_POST['ulid'];
	$tcjv=$_POST['tcjv'];
	$sql = "select * from 材料自检  where id='".$ulid."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if($result->num_rows > 0){
		$sqli = "update 材料自检  set 工程单状态='待审批',退场记录='".$tcjv."' where id='".$ulid."'";
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