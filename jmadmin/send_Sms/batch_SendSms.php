<?php
error_reporting(E_ALL^E_NOTICE);
header("Content-Type: text/html;charset=utf-8");

try {
	require('../conn.php');
	$pj_id =$_POST['pj_id'];
	$ulId =$_POST['ulId'];
	$flag =$_POST['flag'];
	$tcjv=$_POST['tcjv'];//监督站整改意见
	switch($flag)
	{
		case "扩大抽检":
//			$sql = "update 实体监督抽检  set 工程单状态 = '已处理',检测前照片='',场景照片说明='',检测实施过程照片='',检测实施过程照片说明='',检测设备照片='',检测设备照片说明='',实测照片='',实测照片说明='',处理照片='',处理照片说明='',退场记录='' where id ='$ulId' ";
			$sql = "update 实体监督抽检  set 工程单状态 = '已处理',退场记录='".$tcjv."' where id ='$ulId'  ";
			break;
		case "监理处理":
			$sql = "update 实体监督抽检  set 工程单状态 = '已处理',退场记录='".$tcjv."' where id ='$ulId'  ";
			break;
	}
		
	$result = $conn->query($sql);
	//获取接收短信的人员（根据工程id从表中获取相关人员“施工单位和监理单位”）
	$sql = "SELECT `手机` FROM `用户信息` INNER JOIN `用户工程关系表` ON 用户信息.id = 用户id WHERE (`单位` = '施工单位' OR `单位` = '监理单位') AND `工程id`='".$pj_id."';";
	$result = $conn->query($sql);
	$i = 0;
	//创建空数组,将获取到的人员手机号存到$mobPhone
	$mobPhone = array();
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			$mobPhone[$i]=$row['手机'];
			$i++;
		}
	}
	//获取数组长度
	$num = count($mobPhone);
	$conn->close();
    //$client = new SoapClient(null,
   //     array('location' =>"http://sms3.mobset.com:8080/Api",'uri' => "http://localhost:82/")
    //);
	$wsdl =$_POST['serverIP'];
	//"http://sms3.mobset.com:8080/Api?wsdl";
    $client = new SoapClient($wsdl);
	$client->soap_defencoding = 'utf-8';
    $client->decode_utf8 = false;
    $errMsg="";
    $strSign="";
	$addnum="";
	$timer="";
	$lCorpID =$_POST['CorpID'];
    $strLoginName=$_POST['LoginName'];
	$strPasswd=$_POST['pwd'];
	// $mobPhone=$_POST['mobPhone'];
	
	//短信内容
	$smsContent=$_POST['smsContent'];
	
	$gcmc=$_POST['gcmc'];//工程名称
	$smsContent=$gcmc.$smsContent.$tcjv;
	
	$longSms=0;
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $groupId=$client->ArrayOfSmsIDList[1];
	print_r($groupId);
	$group=$client-> ArrayOfMobileList[1];
	$group[0] =$client->MobileListGroup;

	//循环批量发送短信
	for($i=0;$i<$num;$i++){
		$group[$i]->Mobile = $mobPhone[$i];
	}
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'AddNum'=>$addnum,'Timer'=>$timer,'LongSms'=>$longSms,'MobileList'=>$group,
	'Content'=>$smsContent);
	$result = $client->Sms_Send($param);
	
//	$jsonresult='success';
//	$json = '{"result":"'.$jsonresult.'"}';
//	echo $json;
//	print_r($result);
//	print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
//	print_r($result->SmsIDList);
//	print_r($result);
//	if($result->ErrCode==0)
//	{
//	      print_r($result->Sign+":"+$result->);
//	}
//	else
//	{
//	   print_r($result->ErrMsg);
//	}

}
 catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
function GetTimeString()
{
  date_default_timezone_set('Asia/Shanghai');
  $timestamp=time();
  $hours = date('H',$timestamp); 
  $minutes = date('i',$timestamp); 
  $seconds =date('s',$timestamp);
  $month = date('m',$timestamp);
  $day =  date('d',$timestamp);
  $stamp= $month.$day.$hours.$minutes.$seconds;
  return $stamp;
}
?> 