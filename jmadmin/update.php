<?php
	$appid="H5986FCE1";
	$version="1.0.3";	//app版本号
	$note="江门市建设工程施工质量管理系统";	//app描述
	//$appurl="http://192.168.155.1:80/hxajxt/release/hxajxt.apk";	//app下载地址
	$appurl="http://182.61.39.167/jmConstr/jmadmin/release/jmConstr.apk";
	$json = '{"appid":"'.$appid.'",
				"version":"'.$version.'",
				"note":"'.$note.'",
				"appurl":"'.$appurl.'"
			}';
	
	echo $json;

?>