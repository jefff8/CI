<?php
require("../conn.php");
header("Content-Type: text/html; charset=utf-8");

require_once(dirname(__FILE__) . '/' . 'IGt.Push.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.AppMessage.php');
require_once(dirname(__FILE__) . '/' . 'igetui/IGt.APNPayload.php');
require_once(dirname(__FILE__) . '/' . 'igetui/template/IGt.BaseTemplate.php');
require_once(dirname(__FILE__) . '/' . 'IGt.Batch.php');
require_once(dirname(__FILE__) . '/' . 'igetui/utils/AppConditions.php');




//http的域名
define('HOST','http://sdk.open.api.igexin.com/apiex.htm');

//定义常量
define('APPKEY','mc4JQGi3cx5t129WrFGpO7');
define('APPID','yRtSSQAlPy69RIOwsiInL4');
define('MASTERSECRET','9eKqfyfUFm8LV6q7Ww7Kg');


//$Cid=$_POST["Cid"];
//define('CID',$Cid);
//define('BEGINTIME','2015-03-06 13:18:00');
//define('ENDTIME','2015-03-06 13:24:00');

$title = $_POST['title'];
$notice = $_POST['notice'];
pushMessageToApp($title,$notice);




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




?>

