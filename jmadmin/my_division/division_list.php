<?php
	require("../conn.php");
	$flag = $_POST["flag"];
	switch($flag){
		case "list":
			$pj_timestamp = $_POST["pj_timestamp"];
			$sql = "select id,工程单状态,分部类型,申请人,申请时间  from 分部验收 where 工程时间戳='$pj_timestamp' order by id desc";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['工程单状态'] = $row['工程单状态'];
					$data[$i]['分部类型'] = $row['分部类型'];
					$data[$i]['申请人'] = $row['申请人'];
					$data[$i]['申请时间'] = $row['申请时间'];
					$i++;
				}
				$jsonresult = 'success';
			}else{
				$jsonresult = 'fail';
			}
			$jsonData = json_encode($data);
			echo $jsonData;
			$conn->close();
			break;
		case "details":
			$id = $_POST["ulId"];
			$sql = "select * from 分部验收 where id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['工程单状态'] = $row['工程单状态'];
					$data[$i]['分部类型'] = $row['分部类型'];
					$data[$i]['申请人'] = $row['申请人'];
					$data[$i]['申请时间'] = $row['申请时间'];
					$i++;
				}
				$jsonresult = 'success';
			}else{
				$jsonresult = 'fail';
			}
			$jsonData = json_encode($data);
			echo $jsonData;
			$conn->close();
			break;
		case "提交申请":
			$ulId = $_POST["ulId"];
			$sql = "update 分部验收  set 工程单状态='监理确认1' where id='$ulId'";
			$conn->query($sql);
			break;
		case "delete":
			$ulId = $_POST["ulId"];
			$sql = "delete from 分部验收  where id='$ulId'";
			$conn->query($sql);
			break;
		case "审批通过":
			$ulId = $_POST["ulId"];
			$sql = "update 分部验收  set 工程单状态='审批通过' where id='$ulId'";
			$conn->query($sql);
			break;
	}
?>