<?php
require("../conn.php");
header("Content-Type: text/html; charset=utf-8");

require_once(dirname(__FILE__) . '/' . 'IGt.Push.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.AppMessage.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.APNPayload.php');
require_once(dirname(__FILE__) . '/' . 'igetui/template/IGt.BaseTemplate.php');
require_once(dirname(__FILE__) . '/' . 'IGt.Batch.php');
require_once(dirname(__FILE__) . '/' . 'igetui/utils/AppConditions.php');

$title = $_POST['title'];
$notice = $_POST['notice'];
$pj_id = $_POST['pj_id'];
$sql = "SELECT 用户id,cid from 用户工程关系表 A INNER JOIN 用户信息 B ON A.用户id=B.id where A.工程id='$pj_id' ";
$result = $conn->query($sql);
if($result->num_rows>0){
	$i=1;
	while($row = $result->fetch_assoc()){
		$data[$i]['cid'] = $row['cid'];
		define('CID'.$i, $data[$i]['cid']);
		$i++;
	}
}
//$cid = json_encode($data);
//global $cid_length;
$cid_length = count($data);
//print($cid_length);
//http的域名
define('HOST','http://sdk.open.api.igexin.com/apiex.htm');

//定义常量
define('APPKEY','mc4JQGi3cx5t129WrFGpO7');
define('APPID','yRtSSQAlPy69RIOwsiInL4');
define('MASTERSECRET','9eKqfyfUFm8LV6q7Ww7Kg');
//define('CID1','44e1cb2f288570a064b3af2d64a987c3');

//$Cid=$_POST["Cid"];
//define('CID',$Cid);
//define('BEGINTIME','2015-03-06 13:18:00');
//define('ENDTIME','2015-03-06 13:24:00');



//pushMessageToApp($title,$notice);
pushMessageToList($title,$notice,$cid_length);



//群推接口案例
function pushMessageToApp($title,$notice){
    $igt = new IGeTui(HOST,APPKEY,MASTERSECRET);
    $template = IGtNotificationTemplateDemo($title,$notice);
    //个推信息体
    //基于应用消息体
    $message = new IGtAppMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(10 * 60 * 1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
    $message->set_data($template);

    $appIdList=array(APPID);
    $phoneTypeList=array('ANDROID');
    $provinceList=array('广东');
    $tagList=array('haha');
//  $age = array("0000", "0010");


//  $cdt = new AppConditions();
//  $cdt->addCondition(AppConditions::PHONE_TYPE, $phoneTypeList);
//  $cdt->addCondition(AppConditions::REGION, $provinceList);
//  $cdt->addCondition(AppConditions::TAG, $tagList);
//  $cdt->addCondition("age", $age);

    $message->set_appIdList($appIdList);
//  $message->condition = $cdt;

    $rep = $igt->pushMessageToApp($message,"任务组名");

    var_dump($rep);
    echo ("<br><br>");
}

//所有推送接口均支持四个消息模板，依次为通知弹框下载模板，通知链接模板，通知透传模板，透传模板
//注：IOS离线推送需通过APN进行转发，需填写pushInfo字段，目前仅不支持通知弹框下载功能



function IGtNotificationTemplateDemo($title,$notice){
    $template =  new IGtNotificationTemplate();
    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    $template->set_transmissionType(1);//透传消息类型
    $template->set_transmissionContent("测试离线");//透传内容
    $template->set_title($title);//通知栏标题
    $template->set_text($notice);//通知栏内容
    $template->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
    $template->set_logoURL("");//通知栏logo链接
    $template->set_isRing(true);//是否响铃
    $template->set_isVibrate(true);//是否震动
    $template->set_isClearable(true);//通知栏是否可清除
    return $template;
}

//多推接口案例
function pushMessageToList($title,$notice,$cid_length)
{
    putenv("gexin_pushList_needDetails=true");
    putenv("gexin_pushList_needAsync=true");

    $igt = new IGeTui(HOST, APPKEY, MASTERSECRET);
    //消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板


    //$template = IGtNotyPopLoadTemplateDemo();
    $template = IGtNotificationTemplateDemo($title,$notice);
//  $template = IGtNotificationTemplateDemo($title,$notice);
//  $template = IGtTransmissionTemplateDemo();
    //个推信息体
    $message = new IGtListMessage();
    $message->set_isOffline(true);//是否离线
    $message->set_offlineExpireTime(3600 * 12 * 1000);//离线时间
    $message->set_data($template);//设置推送消息类型
//    $message->set_PushNetWorkType(1);	//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
//    $contentId = $igt->getContentId($message);
    $contentId = $igt->getContentId($message);	//根据TaskId设置组名，支持下划线，中文，英文，数字
    //接收方1
   	for($i=1;$i<=$cid_length;$i++){
   		$target = new IGtTarget();
	    $target->set_appId(APPID);
		$CID = constant("CID".$i);
	    $target->set_clientId($CID);
		$targetList[$i-1] = $target;
   	}
//  $target1 = new IGtTarget();
//  $target1->set_appId(APPID);
//  $target1->set_clientId(CID1);
//    $target1->set_alias(Alias);
    

    $rep = $igt->pushMessageToList($contentId, $targetList);

    var_dump($rep);

    echo ("<br><br>");

}

function IGtLinkTemplateDemo($title,$notice){
    $template =  new IGtLinkTemplate();
    $template ->set_appId(APPID);//应用appid
    $template ->set_appkey(APPKEY);//应用appkey
    $template ->set_title($title);//通知栏标题
    $template ->set_text($notice);//通知栏内容
    $template ->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
    $template ->set_isRing(true);//是否响铃
    $template ->set_isVibrate(true);//是否震动
    $template ->set_isClearable(true);//通知栏是否可清除
    $template ->set_url("http://www.igetui.com/");//打开连接地址
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    return $template;
}


?>

