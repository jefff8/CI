<?php
	require("../conn.php");
	$imgID = $_POST["imgID"];
	$module = $_POST["module"];
	$type = $_POST["type"];
	$imgsrc = $_POST["imgsrc"];
	$sjc = $_POST["sjc"];
	//判断图片是否存在
	if(file_exists($imgsrc)){
		//删除图片
		unlink($imgsrc);
	}else{
		
	}
	switch($module){
		case "材料送检":
			if($type=='场景照片'){
				$sql = "update 材料送检  set 场景照片=replace(场景照片,'".$imgID."','') where 时间戳='$sjc'";
				$conn->query($sql);
				$conn->close();
			}else{
				$sql = "update 材料送检  set 样品照片=replace(样品照片,'".$imgID."','') where 时间戳='$sjc'";
				$conn->query($sql);
				$conn->close();
			}
			break;
		case "实体检测":
			if($type=='场景照片'){
				$sql = "update 实体检测  set 检测前照片=replace(检测前照片,'".$imgID."','') where 时间戳='$sjc'";
				$conn->query($sql);
				$conn->close();
			}else if($type=='检测实施过程中照片'){
				$sql = "update 实体检测  set 检测实施过程中照片=replace(检测实施过程中照片,'".$imgID."','') where 时间戳='$sjc'";
				$conn->query($sql);
				$conn->close();
			}else{
				$sql = "update 实体检测  set 检测设备照片=replace(检测设备照片,'".$imgID."','') where 时间戳='$sjc'";
				$conn->query($sql);
				$conn->close();
			}
			break;
	}
	
?>