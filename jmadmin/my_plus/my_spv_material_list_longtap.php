<?php
	require("../conn.php");
	$gcdId=$_POST["gcdId"];//工程单id
	$gcdzt=$_POST["gcdzt"];//工程单状态
	
	
	////////////////////////////////见证中//////////////////////////////
	if($gcdzt=='jzz'){
		$yjz = '已委托';
		$sql = "select * from 材料监督抽检  where id='".$gcdId."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);
		if($result->num_rows > 0){
			$sqli = "update 材料监督抽检   set 工程单状态='".$yjz."' where id='".$gcdId."' ";
			if($conn->query($sqli) === TRUE){
				$jsonresult = 'success';
			}else{
				$jsonresult = 'fail';
			}
		}else{
			$jsonresult = '数据库并无改数据';
		}
	}else if($gcdzt=='recheck'){
		$yjz = '已委托复检';
		$sql = "select * from 材料监督抽检  where id='".$gcdId."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);
		if($result->num_rows > 0){
			$sqli = "update 材料监督抽检   set 工程单状态='".$yjz."' where id='".$gcdId."' ";
			if($conn->query($sqli) === TRUE){
				$jsonresult = 'success';
			}else{
				$jsonresult = 'fail';
			}
		}else{
			$jsonresult = '数据库并无改数据';
		}
	}
	////////////////////////////////见证中//////////////////////////////
	$json = '{"result":"'.$jsonresult.'",
			  "count":"'.$count.'"
			}';				
//	$json = '['.$otherdate.']';
	echo $json;
	$conn->close();	
?>