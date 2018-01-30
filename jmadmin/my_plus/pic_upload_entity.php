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
	$mchen=$_POST["mchen"];//时间戳
	//项目新建
	if($lx=='insert'){
		$myInfo = $_POST["myInfo"];
		$pj_name = $_POST["project_name"];
		$pj_timestamp = $_POST["timestamp"];
		$Info = explode("|", $myInfo);
		$sql = "insert into 实体自检(工程名称,工程时间戳,自检自测类型,检测部位,数量,检测人,检测日期,备注,时间戳,工程单状态,监理操作单位) values ('$pj_name','$pj_timestamp','$Info[0]','$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','新增','$Info[7]')";
		$conn->query($sql);
		$conn->close();
	}
	//信息修改
	if($lx=='updateInfo'){
		$myInfo = $_POST["myInfo"];
		$Info = explode("|", $myInfo);
		$sql = "update 实体自检  set 自检自测类型='$Info[0]',检测部位='$Info[1]',数量='$Info[2]',检测人='$Info[3]',检测日期='$Info[4]',备注='$Info[5]' where 时间戳='$mchen'";
		$conn->query($sql);
		$conn->close();
	}
	//图片叠加
	if($lx=='update1'){
		$Text1 = $_POST["Text1"];
		$sql = "update 实体自检  set 检测前照片=concat(检测前照片,'".$filenames1."'),场景照片说明='$Text1' where 时间戳='$mchen'";
		$conn->query($sql);
		$conn->close();
	}
	if($lx=='update2'){
		$Text2 = $_POST["Text2"];
		$sql = "update 实体自检  set 检测实施过程照片=concat(检测实施过程照片,'$filenames2'),检测实施过程照片说明='$Text2' where 时间戳='$mchen'";
		$conn->query($sql);
		$conn->close();
	}
	if($lx=='update3'){
		$Text3 = $_POST["Text3"];
		$sql = "update 实体自检  set 检测设备照片=concat(检测设备照片,'$filenames3'),检测设备照片说明='$Text3' where 时间戳='$mchen'";
		$conn->query($sql);
		$conn->close();
	}
	if($lx=='step1'){
		$Text1 = $_POST["Text1"];
		$Text2 = $_POST["Text2"];
		$Text3 = $_POST["Text3"];
//		$sqli = "insert into  实体自检(检测前照片,检测实施过程照片,检测设备照片,场景照片说明,检测实施过程照片说明,检测设备照片说明) values(" "'".$filenames1."','".$filenames2."','".$filenames3."','$Text1','$Text2','$Text3')";
		$sqli = "update 实体自检  set 检测前照片='$filenames1',检测实施过程照片='$filenames2',检测设备照片='$filenames3',场景照片说明='$Text1',检测实施过程照片说明='$Text2',检测设备照片说明='$Text3' where 时间戳='$mchen' ";
	}
	$sql = "select * from 实体自检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='zczp'){
			$Text4 = $_POST["Text4"];
			$myInfo = $_POST["myInfo"];
			$Info = explode("|", $myInfo);
			$sqli = "update 实体自检   set  送样日期='$Info[0]',收样日期='$Info[1]',送样单位='$Info[2]',见证单位='$Info[3]',收样单位='$Info[4]',见证人='$Info[5]',工程单状态='确定检测',自测照片='".$filenames1."',自测照片说明='".$Text4."'  where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$Text5 = $_POST["Text5"];
			$HandleRecord = $_POST["HandleRecord"];
			$sqli = "update 实体自检   set  工程单状态='已处理',退场记录='$HandleRecord',处理照片='".$filenames1."',处理照片说明='".$Text5."'  where 时间戳='".$mchen."' ";
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