<?php
/*
<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="upfile" /><br> 
<input type="submit" value="上传" /></form> 
 */

$nub1=$_POST["nub1"]; //上传的数量
$files1 =$_POST['files1'];  //获取base64数据流
$sjc_1=time();
$strsShuzu1 = explode('︴',$files1);
$length1=count($strsShuzu1)-1;
$filenames1="";
for ($i= 0;$i< $nub1; $i++){
	$fengeOk_1=substr($strsShuzu1[$i],1);
	$files_1 = substr($fengeOk_1,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
	$tmp_1  = base64_decode($files_1);  //解码
	$sjc_1=time().$i.'1';
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp1=$s."/upload/".$sjc_1.".jpg";  //确定图片文件位置及名称
	$filenames1=$filenames1."~*^*~".$sjc_1.".jpg";
	//写文件
	file_put_contents( $fp1, $tmp_1);     
}

$nub2=$_POST["nub2"]; //上传的数量
$files2 =$_POST['files2'];  //获取base64数据流
$sjc_2=time();
$strsShuzu2 = explode('︴',$files2);
$length2=count($strsShuzu2)-1;
$filenames2="";
for ($i= 0;$i< $nub2; $i++){
	$fengeOk_2=substr($strsShuzu2[$i],1);
	$files_2 = substr($fengeOk_2,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
	$tmp_2  = base64_decode($files_2);  //解码
	$sjc_2=time().$i.'2';
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp2=$s."/upload/".$sjc_2.".jpg";  //确定图片文件位置及名称
	$filenames2=$filenames2."~*^*~".$sjc_2.".jpg";
	//写文件
	file_put_contents( $fp2, $tmp_2);     
}

$nub3=$_POST["nub3"]; //上传的数量
$files3 =$_POST['files3'];  //获取base64数据流
$sjc_3=time();
$strsShuzu3 = explode('︴',$files3);
$length3=count($strsShuzu3)-1;
$filenames3="";
for ($i= 0;$i< $nub3; $i++){
	$fengeOk_3=substr($strsShuzu3[$i],1);
	$files_3 = substr($fengeOk_3,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
	$tmp_3  = base64_decode($files_3);  //解码
	$sjc_3=time().$i;
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp3=$s."/upload/".$sjc_3.".jpg";  //确定图片文件位置及名称
	$filenames3=$filenames3."~*^*~".$sjc_3.".jpg";
	//写文件
	file_put_contents( $fp3, $tmp_3);     
}


	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
	if($lx=='step1'){
		$myInfo = $_POST["myInfo"];
		$Info = explode("|", $myInfo);
		$Text1 = $_POST["Text1"];
		$Text2 = $_POST["Text2"];
		$Text3 = $_POST["Text3"];
		$pj_name = $_POST["pj_name"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$sqli = "insert into 实体监督抽检(时间戳,工程名称,工程时间戳,检测类型,检测部位,数量,检测人,检测日期,备注,检测单位,工程单状态,监理操作单位,场景照片说明,检测实施过程照片说明,检测设备照片说明,检测前照片,检测实施过程照片,检测设备照片,检测操作单位) values ('$mchen','$pj_name','$pj_timestamp','$Info[0]',
'$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','新建','$Info[7]','$Text1','$Text2','$Text3','".$filenames1."','".$filenames2."','".$filenames3."','$Info[6]')";
	}
	if($lx=='step2'){
		$myInfo = $_POST["myInfo"];
		$Info = explode("|", $myInfo);
		$Text1 = $_POST["Text1"];
		$Text2 = $_POST["Text2"];
		$Text3 = $_POST["Text3"];
		$pj_name = $_POST["pj_name"];
		$pj_timestamp = $_POST["pj_timestamp"];
//		$sqli = "insert into 实体监督抽检(时间戳,工程名称,工程时间戳,检测类型0,检测部位1,数量2,检测人3,检测日期4,备注5,检测单位6,工程单状态,监理操作单位7,场景照片说明8,检测实施过程照片说明9,检测设备照片说明10,检测前照片11,检测实施过程照片12,检测设备照片13,检测操作单位14) values ('$mchen','$pj_name','$pj_timestamp','$Info[0]',
//'$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','新建','$Info[7]','$Text1','$Text2','$Text3','".$filenames1."','".$filenames2."','".$filenames3."','$Info[6]')";
		$sqli = "update 实体监督抽检  set 检测类型='$Info[0]',检测部位='$Info[1]',数量='$Info[2]',检测人='$Info[3]',检测日期='$Info[4]',备注='$Info[5]',检测单位='$Info[6]',监理操作单位='$Info[7]',场景照片说明='$Text1',检测实施过程照片说明='$Text2',检测设备照片说明='$Text3',检测前照片='".$filenames1."',检测实施过程照片='".$filenames2."',检测设备照片='".$filenames3."',检测操作单位='$Info[6]' where 时间戳='".$mchen."'";
	}
	$sql = "select * from 实体监督抽检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='syzp'){
			$dataAll=$_POST["dataAll"];
			$id=$_POST["id"];
			$Text4 = $_POST["Text4"];
			$operation_unit = $_POST["operation_unit"];
			$str = explode("|",$dataAll);
//			提交见证时的状态更改和其他数据上传
			$sqli = "update 实体监督抽检  set 送样日期='".$str[0]."',收样日期='".$str[1]."',工程单状态 = '已确认',送样单位='".$str[2]."',见证单位='".$str[3]."',收样单位='".$str[4]."',见证人='".$str[5]."',实测照片='".$filenames1."',实测照片说明='".$Text4."',检测操作单位='".$operation_unit."' where id='".$id."'";
		}
		if($lx=='clzp'){
//			$tresult=$_POST["tresult"];
//			$testNum=$_POST["testNum"];
//			$report=$_POST["report"];
//			$id=$_POST["id"];
//			$sqli = "update 实体监督抽检  set  不合格报告 = '".$tresult."',检测报告编号 = '".$testNum."',报告照片说明 = '".$report."',工程单状态 = '不合格',不合格报表='".$filenames1."' where id='".$id."'";
			$disposeText = $_POST["disposeText"];
			$records_back = $_POST["records_back"];
			$sqli = "update 实体监督抽检  set 工程单状态='待审批',退场记录='".$records_back."',  处理照片='".$filenames1."',处理照片说明='".$disposeText."' where 时间戳='".$mchen."' ";
		}
		if($lx=='wtjc'){
			$tresult=$_POST["tresult"];
			$id=$_POST["id"];
			$Text6 = $_POST["Text6"];
			$process_type = $_POST["process_type"];
			$sqli = "update 实体监督抽检  set  退场记录 = '".$tresult."',工程单状态 = '待审批',处理照片='".$filenames1."',处理照片说明='".$Text6."',处理类型='".$process_type."'  where id='".$id."'";
		}
		if($lx=='jczp'){
			$report = $_POST["report"];
			$testNum = $_POST["testNum"];
			$gcdzt = $_POST["gcdzt"];
			if($gcdzt=='提交检测'){
				$result = '不合格';
			}else{
				$result = '扩大抽检不合格';
			}
			$sqli = "update  实体监督抽检  set 工程单状态='".$result."', 检测照片='".$filenames1."',检测报告编号='".$testNum."',报告照片说明='".$report."' where 时间戳='".$mchen."' ";
//$sqli = "update  实体监督抽检  set 工程单状态='不合格' ";
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