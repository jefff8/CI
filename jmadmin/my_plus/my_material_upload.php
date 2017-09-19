<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
//	$gcmc=$_POST["gcmc"];
	
	if($lx=='step1'){
		$myInfo = $_POST["myInfo"];
		$sceneText = $_POST["sceneText"];
		$sampleText = $_POST["sampleText"];
		$pj_name = $_POST["pj_name"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$Info = explode("|", $myInfo);
		$sqli = "insert into 材料送检(时间戳,工程时间戳,工程名称,取样类型,规格,数量,生产厂家,取样人,进场日期,取样日期,合格证编号,使用部位,经销商单位,备注,检测单位,工程单状态,监理操作单位,场景照片,场景照片说明,样品照片,样品照片说明) values('$mchen','$pj_timestamp','$pj_name','$Info[0]','$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','$Info[7]','$Info[8]','$Info[9]','$Info[10]','$Info[11]','新增','$Info[12]','".$filenames1."','$sceneText','".$filenames2."','$sampleText')";
	}
	$sql = "select * from 材料送检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='syzp'||$lx=='syzp2'){
			$myInfo = $_POST["myInfo"];
			$receivedText = $_POST["receivedText"];
			$Info = explode("|", $myInfo);
			if($lx=='syzp'){
				$status = '收样';
			}else{
				$status = '收样复检';
			}
			$sqli = "update 材料送检  set 工程单状态='".$status."',收样日期='".$Info[0]."',送样日期='".$Info[1]."',送样单位='".$Info[2]."',见证单位='".$Info[3]."',收样单位='".$Info[4]."',送样人='".$Info[5]."',见证人='".$Info[6]."',样品编号='".$Info[7]."',检测操作单位='".$Info[8]."',  收样照片='".$filenames1."',收样照片说明='".$receivedText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='jczp'){
			$report = $_POST["report"];
			$testNum = $_POST["testNum"];
			$sqli = "update  材料送检  set 工程单状态='不合格', 检测照片='".$filenames1."',检测报告编号='".$testNum."',检测报告照片说明='".$report."' where 时间戳='".$mchen."' ";
		}
		if($lx=='jczp2'){
			$report = $_POST["report"];
			$testNum = $_POST["testNum"];
			$sqli = "update 材料送检  set 工程单状态='复检不合格', 检测照片='".$filenames1."',复检编号='".$testNum."',检测报告照片说明='".$report."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$disposeText = $_POST["disposeText"];
			$records_back = $_POST["records_back"];
			$sqli = "update 材料送检  set 工程单状态='待审批',退厂记录='".$records_back."',  处理照片='".$filenames1."',处理照片说明='".$disposeText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='step2'){
			$myInfo = $_POST["myInfo"];
			$Info = explode("|", $myInfo);
			$sceneText = $_POST["sceneText"];
			$sampleText = $_POST["sampleText"];
			$sqli = "update 材料送检  set 工程单状态='取样复检',取样类型='$Info[0]',规格='$Info[1]',数量='$Info[2]',生产厂家='$Info[3]',取样人='$Info[4]',进场日期='$Info[5]',取样日期='$Info[6]',合格证编号='$Info[7]',使用部位='$Info[8]',经销商单位='$Info[9]',备注='$Info[10]',检测单位='$Info[11]',监理操作单位='$Info[12]',场景照片说明='$sceneText',样品照片说明='$sampleText',场景照片='".$filenames1."',样品照片='".$filenames2."' where 时间戳='".$mchen."'";
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