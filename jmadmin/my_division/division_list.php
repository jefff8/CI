<?php
	require("../conn.php");
	$flag = $_POST["flag"];
	switch($flag){
		case "list":
			$pj_timestamp = $_POST["pj_timestamp"];
			$sql = "select id,工程单状态,分部工程名称,发起时间,发起单位,监理单位  from 分部验收 where 工程时间戳='$pj_timestamp' order by id desc";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['工程单状态'] = $row['工程单状态'];
					$data[$i]['分部工程名称'] = $row['分部工程名称'];
					$data[$i]['发起单位'] = $row['发起单位'];
					$data[$i]['发起时间'] = $row['发起时间'];
					$data[$i]['监理单位'] = $row['监理单位'];
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
					$data[$i]['分部工程名称'] = $row['分部工程名称'];
					$data[$i]['发起时间'] = $row['发起时间'];
					$data[$i]['发起单位'] = $row['发起单位'];
					$data[$i]['监理单位'] = $row['监理单位'];
					$data[$i]['勘察单位'] = $row['勘察单位'];
					$data[$i]['设计单位'] = $row['设计单位'];
					$data[$i]['验收时间'] = $row['验收时间'];
					$data[$i]['验收通知'] = $row['验收通知'];
					$data[$i]['会议照片'] = $row['会议照片'];
					$data[$i]['签到记录表'] = $row['签到记录表'];
					$data[$i]['验收报告'] = $row['验收报告'];
					$data[$i]['验收通知说明'] = $row['验收通知说明'];
					$data[$i]['会议照片说明'] = $row['会议照片说明'];
					$data[$i]['签到记录表说明'] = $row['签到记录表说明'];
					$data[$i]['验收报告说明'] = $row['验收报告说明'];
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
			$sql = "update 分部验收  set 工程单状态='监理确认' where id='$ulId'";
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
		case "资料完善":
			$ulId = $_POST["ulId"];
			$sql = "update 分部验收  set 工程单状态='资料完善' where id='$ulId'";
			$conn->query($sql);
			break;
		case "重新组织验收":
			$ulId = $_POST["ulId"];
			$sql = "update 分部验收  set 工程单状态='重新组织验收',验收时间='',验收通知='',会议照片='',签到记录表='',验收报告='',验收通知说明='',会议照片说明='',签到记录表说明='',验收报告说明='' where id='$ulId'";
			$conn->query($sql);
			break;
		case "重新组织验收修改":
			$ulId = $_POST["ulId"];
			$acceptanceTime = $_POST["acceptanceTime"];
			$sql = "update 分部验收  set 验收时间='$acceptanceTime' where id='$ulId'";
			$conn->query($sql);
			break;
		case "资料完善修改":
			$ulId = $_POST["ulId"];
			$acceptanceTime = $_POST["acceptanceTime"];
			$sql = "update 分部验收  set 工程单状态='待审批',验收时间='$acceptanceTime' where id='$ulId'";
			$conn->query($sql);
			break;
	}
?>