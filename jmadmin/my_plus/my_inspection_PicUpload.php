<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];//时间戳
	$Text1 = $_POST["Text1"];
	$Text2 = $_POST["Text2"];
	$Text3 = $_POST["Text3"];
	$Text4 = $_POST["Text4"];
	$Text5 = $_POST["Text5"];
	$sql = "select * from 材料自检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='cjzp'){
			$sqli = "update 材料自检  set  检测前照片='".$filenames."',场景照片说明='".$Text1."' where 时间戳='".$mchen."' ";
		}
		if($lx=='ypzp'){
			$sqli = "update 材料自检  set  检测实施过程照片='".$filenames."',检测实施过程照片说明='".$Text2."' where 时间戳='".$mchen."' ";
		}
		if($lx=='sbzp'){
			$sqli = "update 材料自检  set  检测设备照片='".$filenames."',检测设备照片说明='".$Text3."' where 时间戳='".$mchen."' ";
		}
		if($lx=='zczp'){
			$sqli = "update 材料自检   set  自测照片='".$filenames."',自测照片说明='".$Text4."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$sqli = "update 材料自检   set  处理照片='".$filenames."',处理照片说明='".$Text5."' where 时间戳='".$mchen."' ";
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