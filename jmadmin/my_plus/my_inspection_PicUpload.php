<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];//时间戳
//	$gcmc=$_POST["gcmc"];
	
	$sql = "select * from 材料自检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='cjzp'){
			$sqli = "update 材料自检  set  检测前照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='ypzp'){
			$sqli = "update 材料自检  set  检测实施过程照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='sbzp'){
			$sqli = "update 材料自检  set  检测设备照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='zczp'){
			$sqli = "update 材料自检   set  自测照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$sqli = "update 材料自检   set  处理照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
	}
	if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
	}
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>