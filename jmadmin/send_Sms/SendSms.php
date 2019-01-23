<?php

error_reporting(E_ALL^E_NOTICE);
header("Content-Type: text/html;charset=utf-8");

try {
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
	$mobPhone=$_POST['mobPhone'];
//	$gcmc=$_POST['gcmc'];//工程名称
//	$mytime=$_POST['mytime'];//当前时间与日期
//	$myName=$_POST['myName'];//账号人姓名
//	$send=$_POST['send'];//子模块名
	//短信内容
	$smsContent=$_POST['smsContent'];
	//产生随机数
	$yzm=rand(pow(10,(6-1)),pow(10,6)-1);
	//短信内容+验证码
	$smsContent=$smsContent.$yzm;
	
	//添加记录
//	require("../conn.php");
//	$sql = "insert into 短信记录 (工程名称,子模块,姓名,手机号,时间) values ('".$gcmc."','".$send."','".$myName."','".$mobPhone."','".$mytime."')";
//	$conn->query($sql);
//	$conn->close();
	
	$longSms=0;
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $groupId=$client->ArrayOfSmsIDList[1];
	print_r($groupId);
	
	$group=$client-> ArrayOfMobileList[1];
	$group[0] =$client->MobileListGroup;
	$group[0] = new stdClass(); //php高版本需要添加(否则会出现警告)
    $group[0]->Mobile = $mobPhone;
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'AddNum'=>$addnum,'Timer'=>$timer,'LongSms'=>$longSms,'MobileList'=>$group,
	'Content'=>$smsContent);
	$result = $client->Sms_Send($param);
	//print_r($result);
//	print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
	
	$jsonresult='success';
	$json = '{"result":"'.$jsonresult.'",
			  "smsContent":"'.$smsContent.'",
			  "yzm":"'.$yzm.'"
			}';
	echo $json;
	//print_r($result->SmsIDList);
	//print_r($result);
	//if($result->ErrCode==0)
	//{
	      //print_r($result->Sign+":"+$result->);
	//}
	//else
	//{
	   //print_r($result->ErrMsg);
	//}

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