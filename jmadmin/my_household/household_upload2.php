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

	require("../conn.php");
	$selfId=$_POST["selfId"];
	$rectification_notice = $_POST["rectification_notice"];
	$sql = "select id from 分户验收  where id='".$selfId."'";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
			$sqli = "update 分户验收  set  工程单状态 = '审批不通过',整改通知单 = '".$filenames1."',整改通知单说明='".$rectification_notice."' where id='".$selfId."'";
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