<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
	//新建项目
	if($lx=='insert'){
		$myInfo = $_POST["myInfo"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$pj_name = $_POST["pj_name"];
		$Info = explode("|", $myInfo);
		$sql = "insert into 材料送检(时间戳,工程时间戳,工程名称,取样类型,规格,数量,生产厂家,取样人,进场日期,取样日期,合格证编号,使用部位,经销商单位,备注,检测单位,工程单状态,监理操作单位) values('$mchen','$pj_timestamp','$pj_name','$Info[0]','$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','$Info[7]','$Info[8]','$Info[9]','$Info[10]','$Info[11]','新增','$Info[12]')";
		$conn->query($sql);
		$conn->close();
	}
	//新建项目信息修改
	if($lx=='updateForm'){
		$formStr=$_POST["formStr"];
		$formStr = explode("|", $formStr);
		$sql = "update 材料送检  set 取样类型='$formStr[0]',规格='$formStr[1]',数量='$formStr[2]',生产厂家='$formStr[3]',取样人='$formStr[4]',进场日期='$formStr[5]',取样日期='$formStr[6]',合格证编号='$formStr[7]',使用部位='$formStr[8]',经销商单位='$formStr[9]',备注='$formStr[10]',检测单位='$formStr[11]' where 时间戳='$mchen'";
		$conn->query($sql);
		$conn->close();
	}
	//叠加附件
	if($lx=='update1'){
		$sceneText = $_POST["sceneText"];
		$sql = "update 材料送检  set 场景照片=concat(场景照片,'".$filenames1."'),场景照片说明='".$sceneText."' where 时间戳='".$mchen."'";
		$conn->query($sql);
		$conn->close();
	}
	if($lx=='update2'){
		$sampleText = $_POST["sampleText"];
		$sql = "update 材料送检  set 样品照片=concat(样品照片,'".$filenames2."'),样品照片说明='".$sampleText."' where 时间戳='".$mchen."'";
		$conn->query($sql);
		$conn->close();
	}
	//更新附件
	if($lx=='step1'){
		$sceneText = $_POST["sceneText"];
		$sampleText = $_POST["sampleText"];
		$sqli = "update 材料送检  set 场景照片='".$filenames1."',场景照片说明='".$sceneText."',样品照片='".$filenames2."',样品照片说明='".$sampleText."' where 时间戳='".$mchen."'";
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
//			$Info = explode("|", $myInfo);
			$sceneText = $_POST["sceneText"];
			$sampleText = $_POST["sampleText"];
			$sqli = "update 材料送检  set 工程单状态='取样复检',场景照片说明='$sceneText',样品照片说明='$sampleText',场景照片='".$filenames1."',样品照片='".$filenames2."' where 时间戳='".$mchen."'";
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