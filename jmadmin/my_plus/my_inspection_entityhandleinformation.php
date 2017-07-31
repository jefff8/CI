<?php
	$timestamp =  $_POST["self_timestamp"];
	$information = $_POST["data_sent"];
	require("../conn.php");
	$sql = "update 实体自检 set 处理情况='$information',工程单状态='不合格' where 时间戳='$timestamp' ";
	$result=$conn->query($sql);
?>