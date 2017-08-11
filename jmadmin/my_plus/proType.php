<?php
	require("../conn.php");
	$pj_type = $_POST['pj_type'];
	
	//材料送检类型
	if($pj_type=='材料送检'){
		$sql1 = "select * from 项目类型选择  where 项目模块='$pj_type' and 大类='房建工程'";
		$result1 = $conn->query($sql1);
		if($result1->num_rows>0){
			$i=0;
			while($row = $result1->fetch_assoc()){
				$type[$i]['房建工程']=$row['类型'];
				$i++;
			}
		}
		$sql2 = "select * from 项目类型选择  where 项目模块='$pj_type' and 大类='市政工程'";
		$result2 = $conn->query($sql2);
		if($result2->num_rows>0){
			$i=0;
			while($row = $result2->fetch_assoc()){
				$type[$i]['道路工程']=$row['类型'];
				$i++;
			}
		}
	}
	
	//自检自测类型
	if($pj_type=='自检自测'){
		$sql = "select * from 项目类型选择  where 项目模块='$pj_type' ";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$type[$i]['自检自测'] = $row['类型'];
				$i++;
			}
		}
	}
	
	
	//实体检测类型
	if($pj_type=='实体检测'){
		$sql = "select * from 项目类型选择  where 项目模块='$pj_type' and 大类='房建工程' ";
		$result1 = $conn->query($sql);
		if($result1->num_rows>0){
			$i=0;
			while($row = $result1->fetch_assoc()){
				$type[$i]['房建工程'] = $row['类型'];
				$i++;
			}
			
		}
		$sql2 = "select * from 项目类型选择  where 项目模块='$pj_type' and 大类='市政工程'";
		$result2 = $conn->query($sql2);
		if($result2->num_rows>0){
			$i=0;
			while($row = $result2->fetch_assoc()){
				$type[$i]['道路工程']=$row['类型'];
				$i++;
			}
		}
	}
	


	$json = json_encode($type);
	echo $json;
	$conn->close();
?>