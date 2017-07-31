<?php
/*
<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="upfile" /><br> 
<input type="submit" value="上传" /></form> 
 */

$nub=$_POST["nub"]; //上传的数量
$files =$_POST['files1'];  //获取base64数据流
$sjc=time();
$strsShuzu = explode('︴',$files);
$length=count($strsShuzu)-1;
$filenames="";
for ($i= 0;$i< $nub; $i++){
	$fengeOk=substr($strsShuzu[$i],1);
	$files1 = substr($fengeOk,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
	$tmp  = base64_decode($files1);  //解码
	$sjc=time().$i;
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp=$s."/upload/".$sjc.".jpg";  //确定图片文件位置及名称
	$filenames=$filenames."~*^*~".$sjc.".jpg";
	//写文件
	file_put_contents( $fp, $tmp);
}

	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
//	$gcmc=$_POST["gcmc"];
	
	if($lx=='syzp'){
		$sql = "select * from 实体检测  where 工程时间戳='".$mchen."'";
	}else if($lx=='clzp'){
		$sql = "select * from 实体检测  where 工程时间戳='".$mchen."'";
	}else if($lx=='wtjc'){
		$sql = "select * from 实体检测  where 工程时间戳='".$mchen."'";
	}
	else{
		$sql = "select * from 实体检测  where 时间戳='".$mchen."'";
	}

	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='cjzp'){
			$sqli = "update 实体检测  set  检测前照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='ypzp'){
			$sqli = "update 实体检测  set  检测实施过程照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='teqm'){
			$sqli = "update 实体检测  set  检测设备照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='syzp'){
			$dataAll=$_POST["dataAll"];
			$id=$_POST["id"];
			$str = explode("|",$dataAll);
//			提交见证时的状态更改和其他数据上传
			$sqli = "update 实体检测  set 送样日期='".$str[0]."',收样日期='".$str[1]."',工程单状态 = '已确认',送样单位='".$str[2]."',
					见证单位='".$str[3]."',收样单位='".$str[4]."',送样人='".$str[5]."',见证人='".$str[6]."',检测报告编号='".$str[7]."',实测照片='".$filenames."' where id='".$id."'";
		}
		if($lx=='clzp'){
			$tresult=$_POST["tresult"];
			$id=$_POST["id"];
			$sqli = "update 实体检测  set  不合格报告 = '".$tresult."',工程单状态 = '不合格',不合格报表='".$filenames."' where id='".$id."'";
		}
		if($lx=='wtjc'){
			$tresult=$_POST["tresult"];
			$id=$_POST["id"];
			$sqli = "update 实体检测  set  退场记录 = '".$tresult."',工程单状态 = '已处理',处理照片='".$filenames."' where id='".$id."'";
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