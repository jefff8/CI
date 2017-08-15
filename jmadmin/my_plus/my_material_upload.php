<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
//	$gcmc=$_POST["gcmc"];
	$sceneText = $_POST["sceneText"];
	$sampleText = $_POST["sampleText"];
	$receivedText = $_POST["receivedText"];
	$report = $_POST["report"];
	$testNum = $_POST["testNum"];
	$disposeText = $_POST["disposeText"];
	$sql = "select * from 材料送检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='cjzp'){
			$sqli = "update 材料送检  set  场景照片='".$filenames."',场景照片说明='".$sceneText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='ypzp'){
			$sqli = "update 材料送检  set  样品照片='".$filenames."',样品照片说明='".$sampleText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='syzp'){
			$sqli = "update 材料送检  set  收样照片='".$filenames."',收样照片说明='".$receivedText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='jczp'){
			$sqli = "update 材料送检  set  检测照片='".$filenames."',检测报告编号='".$testNum."',检测报告照片说明='".$report."' where 时间戳='".$mchen."' ";
		}
		if($lx=='jczp2'){
			$sqli = "update 材料送检  set  检测照片='".$filenames."',复检编号='".$testNum."',检测报告照片说明='".$report."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$sqli = "update 材料送检  set  处理照片='".$filenames."',处理照片说明='".$disposeText."' where 时间戳='".$mchen."' ";
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