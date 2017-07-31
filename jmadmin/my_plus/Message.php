<?php
date_default_timezone_set('PRC'); //设置时区为东八区否则时间比北京时间早8小时
 
 $url = 'http://IP/端口;//接口地址//'
 $mttime=date("YmdHis");
 $name = '＊＊＊＊＊＊＊';//开通的用户名
 $password='＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊';//密码
 $post_data['name']  = $name;
 $post_data['pwd'] = md5($password.$mttime);
 $post_data['content'] = '【阅信短信平台】验证码888888，打死也不能告诉别人哦。';
 $post_data['phone']    = '12345678901';//手机号码
 $post_data['subid']    = '';
 $post_data['mttime']=$mttime;
 $o = "";
foreach( $post_dataas $k => $v )
  {
     $o.= "$k=" . urlencode( $v ). "&" ;
  }
 $post_data = substr($o,0,-1);
 $res = request_post($url, $post_data);
print $res;
 
 
/**
2
* 模拟post进行url请求
 * @param string $url
 * @param string $param
 */
functionrequest_post($url = '', $param = '') {
   if (empty($url) || empty($param)) {
      return false;
   }
 
   $postUrl = $url;
   $curlPost = $param;
   $ch = curl_init();//初始化curl
   curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
   curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且屏幕上
   curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
   curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
   $data = curl_exec($ch);//运行curl
   curl_close($ch);
 
   return $data;
}

?>