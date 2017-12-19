<?php
	require("conn.php");
	$ulId = $_POST['ulId'];
	$mobile = $_POST['mobile'];
	$flag = $_POST['flag'];
	switch($flag)
	{
		case "send":
			$sql0 = "select 监理操作单位,检测操作单位 from 材料送检 where id='".$ulId."'";
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result0 = $conn->query($sql0);
			$result = $conn->query($sql);
			$row0 = $result0->fetch_assoc();
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$data['检测操作单位']=$row0['检测操作单位'];	
			$json = json_encode($data);
			echo $json;
			break;
		case "self_inspection1":
			$sql0 = "select 监理操作单位 from 材料自检 where id='".$ulId."'";
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result0 = $conn->query($sql0);
			$result = $conn->query($sql);
			$row0 = $result0->fetch_assoc();
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$json = json_encode($data);
			echo $json;
			break;
		case "self_inspection2":
			$sql0 = "select 监理操作单位 from 实体自检 where id='".$ulId."'";
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result0 = $conn->query($sql0);
			$result = $conn->query($sql);
			$row0 = $result0->fetch_assoc();
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$json = json_encode($data);
			echo $json;
			break;
		case "commission":
			$sql0 = "select 监理操作单位,检测操作单位 from 实体检测 where id='".$ulId."'";
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result0 = $conn->query($sql0);
			$result = $conn->query($sql);
			$row0 = $result0->fetch_assoc();
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$data['检测操作单位']=$row0['检测操作单位'];	
			$json = json_encode($data);
			echo $json;
			break;
		case "my_spv_material":
			$sql0 = "select 监理操作单位,检测操作单位 from 材料监督抽检 where id='".$ulId."'";
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result0 = $conn->query($sql0);
			$result = $conn->query($sql);
			$row0 = $result0->fetch_assoc();
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$data['检测操作单位']=$row0['检测操作单位'];	
			$json = json_encode($data);
			echo $json;
			break;
		case "division":
			$sql="select id,单位,单位名称 from 用户信息 where 手机= '".$mobile."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$data['id']=$row['id'];
			$data['单位']=$row['单位'];
			$data['单位名称']=$row['单位名称'];
			$data['监理操作单位']=$row0['监理操作单位'];
			$data['检测操作单位']=$row0['检测操作单位'];	
			$json = json_encode($data);
			echo $json;
			break;
	}
	
//	返回用户单位
//在页面用data[0]['单位']，判断是此用户是属于什么单位的用户，在进行下一步判断
	
	$conn->close();
?>