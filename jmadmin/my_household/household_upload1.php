<?php
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
	$sjc_3=time().$i.'3';
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp3=$s."/upload/".$sjc_3.".jpg";  //确定图片文件位置及名称
	$filenames3=$filenames3."~*^*~".$sjc_3.".jpg";
	//写文件
	file_put_contents( $fp3, $tmp_3); 
}

	require("../conn.php");
	$selfId=$_POST["selfId"];
	$recordText=$_POST["recordText"];
	$acceptText=$_POST["acceptText"];
	$summaryText=$_POST["summaryText"];
	$sql = "select id from 户号汇总  where id='".$selfId."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
			$sqli = "update 户号汇总  set  验收记录表 = '".$filenames1."',验收照片 = '".$filenames2."',验收汇总表='".$filenames3."',验收记录表说明='".$recordText."',验收照片说明='".$acceptText."',验收汇总表说明='".$summaryText."',上传状态='已上传' where id='".$selfId."'";
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