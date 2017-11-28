<?php
	require("../conn.php");
	$flag = $_POST["flag"];
	switch($flag)
	{
		case "material":
			$ulId = $_POST["ulId"];
			$rejection = $_POST["rejection"];
			$sql = "update 材料送检  set 工程单状态='拒收',拒收理由='$rejection' where id='$ulId'";
			$conn->query($sql);
			$conn->close();
			break;
		case "material_rejection":
			$pj_timestamp = $_POST["timestamp"];
			$sql = "select id,取样类型,拒收理由,时间戳 from 材料送检 where 工程时间戳='$pj_timestamp' and 工程单状态='拒收'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i=0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['时间戳'] = $row['时间戳'];
					$data[$i]['取样类型'] = $row['取样类型'];
					$data[$i]['拒收理由'] = $row['拒收理由'];
				}
			}
			$conn->close();
			$json = json_encode($data);
			echo $json;
			break;
		case "commission":
			$ulId = $_POST["ulId"];
			$rejection = $_POST["rejection"];
			$sql = "update 实体检测  set 工程单状态='拒收',拒收理由='$rejection' where id='$ulId'";
			$conn->query($sql);
			$conn->close();
			break;
		case "commission_rejection":
			$pj_timestamp = $_POST["timestamp"];
			$sql = "select id,检测类型,拒收理由,时间戳 from 实体检测 where 工程时间戳='$pj_timestamp' and 工程单状态='拒收'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i=0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['时间戳'] = $row['时间戳'];
					$data[$i]['检测类型'] = $row['检测类型'];
					$data[$i]['拒收理由'] = $row['拒收理由'];
				}
			}
			$conn->close();
			$json = json_encode($data);
			echo $json;
			break;
		case "insp_material":
			$ulId = $_POST["ulId"];
			$rejection = $_POST["rejection"];
			$sql = "update 材料自检  set 工程单状态='拒收',拒收理由='$rejection' where id='$ulId'";
			$conn->query($sql);
			$conn->close();
			break;
		case "insp_entity":
			$ulId = $_POST["ulId"];
			$rejection = $_POST["rejection"];
			$sql = "update 实体自检  set 工程单状态='拒收',拒收理由='$rejection' where id='$ulId'";
			$conn->query($sql);
			$conn->close();
			break;
	}
	
?>