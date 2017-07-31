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
	$mchen=$_POST["mchen"];//时间戳
//	$gcmc=$_POST["gcmc"];
	
	$sql = "select * from 实体自检  where 时间戳='".$mchen."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		if($lx=='cjzp'){
			$sqli = "update 实体自检  set  检测前照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='ypzp'){
			$sqli = "update 实体自检  set  检测实施过程照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='sbzp'){
			$sqli = "update 实体自检  set  检测设备照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='zczp'){
			$sqli = "update 实体自检   set  自测照片='".$filenames."' where 时间戳='".$mchen."' ";
		}
		if($lx=='clzp'){
			$sqli = "update 实体自检   set  处理照片='".$filenames."' where 时间戳='".$mchen."' ";
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