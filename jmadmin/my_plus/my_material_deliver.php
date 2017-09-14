<?php
	require("../conn.php");
	$id=$_POST['ulId'];
	$shyrq=$_POST['shyrq'];
	$soyrq=$_POST['soyrq'];
	$sydw=$_POST['sydw'];
	$jzdw=$_POST['jzdw'];
	$shydw=$_POST['shydw'];
	$syr=$_POST['syr'];
	$jzr=$_POST['jzr'];
	$ypbh=$_POST['ypbh'];
	$operation_unit=$_POST['operation_unit'];
	$sql = "select * from 材料送检  where id='".$id."'";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	if($result->num_rows>0){
		$sqli = "update 材料送检  set 工程单状态='收样',收样日期='".$soyrq."',送样日期='".$shyrq."',送样单位='".$sydw."',见证单位='".$jzdw."',收样单位='".$shydw."',送样人='".$syr."',见证人='".$jzr."',样品编号='".$ypbh."',检测操作单位='".$operation_unit."' where id='".$id."'";
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