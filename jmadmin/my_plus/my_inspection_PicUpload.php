<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];//时间戳
	
	if($lx=='step1'){
		$myInfo = $_POST["myInfo"];
		$Info = explode("|", $myInfo);
		$Text1 = $_POST["Text1"];
		$Text2 = $_POST["Text2"];
		$Text3 = $_POST["Text3"];
		$pj_name = $_POST["pj_name"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$sqli = "insert into  材料自检(工程名称,工程时间戳,自检自测类型,检测部位,数量,检测人,检测日期,备注,时间戳,工程单状态,监理操作单位,检测前照片,检测实施过程照片,检测设备照片,场景照片说明,检测实施过程照片说明,检测设备照片说明) values(";
		$sqli .= "'$pj_name','$pj_timestamp','$Info[0]','$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','新增','$Info[7]','".$filenames1."','".$filenames2."','".$filenames3."','$Text1','$Text2','$Text3')";
	}
	$sql = "select * from 材料自检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='zczp'){
			$myInfo = $_POST["myInfo"];
			$Info = explode("|", $myInfo);
			$Text4 = $_POST["Text4"];
			$sqli = "update 材料自检   set  送样日期='$Info[0]',收样日期='$Info[1]',送样单位='$Info[2]',见证单位='$Info[3]',收样单位='$Info[4]',见证人='$Info[5]',工程单状态='确定自测', 自测照片='".$filenames1."',自测照片说明='".$Text4."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$Text5 = $_POST["Text5"];
			$HandleRecord = $_POST["HandleRecord"];
			$sqli = "update 材料自检   set  工程单状态='已处理',退场记录='".$HandleRecord."',处理照片='".$filenames1."',处理照片说明='".$Text5."' where 时间戳='".$mchen."' ";
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