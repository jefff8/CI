<?php
	require("../conn.php");
	$flag = $_POST["flag"];
	switch($flag){
		case "add":
			$buildingNum = $_POST["buildingNum"];
			$floor = $_POST["floor"];
			$households = $_POST["households"];
			$beginFloor = $_POST["beginFloor"];
			$pj_timestamp = $_POST["pj_timestamp"];
			$pj_name = $_POST["pj_name"];
			$mytime = $_POST["mytime"];
			$acceptanceTime = $_POST["acceptanceTime"];
			$allHouse = $_POST["allHouse"];
			$startTime = $_POST["startTime"];
			$houseNum = explode("|", $allHouse);
			$account = count($houseNum);
			$sql = "insert into 分户验收 (时间戳 ,工程时间戳,工程名称,工程单状态,栋号,楼层,户数,起始层,验收时间,起始日期) values ('$mytime','$pj_timestamp','$pj_name','施工申请','$buildingNum','$floor','$households','$beginFloor','$acceptanceTime','$startTime')";
			if($conn->query($sql)){
				$result = 'success';
			}else{
				$result = 'fail';
			}
			$json = '{
				"result":"'.$result.'"
			}';
			echo $json;
			$sql2 = "select max(id) as 项目id from 分户验收";
			$maxid_result = $conn->query($sql2);
			$row = $maxid_result->fetch_assoc();
			$itemId = $row['项目id'];
			for($i=0;$i<$account;$i++){
				$sql3 = "insert into 户号汇总 (项目id,户号) values ('$itemId','$houseNum[$i]')";
				$conn->query($sql3);
			}
			$conn->close();
			break;
		case "list":
			$pj_timestamp = $_POST["pj_timestamp"];
			$sql = "select id,工程单状态,栋号,楼层,户数,验收时间 from 分户验收  where 工程时间戳='$pj_timestamp' order by id desc";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['工程单状态'] = $row['工程单状态'];
					$data[$i]['栋号'] = $row['栋号'];
					$data[$i]['楼层'] = $row['楼层'];
					$data[$i]['户数'] = $row['户数'];
					$data[$i]['验收时间'] = $row['验收时间'];
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
			$sql = "update 分户验收 set 工程单状态='监理确认' where id='$ulId'";
			$conn->query($sql);
			break;
		case "delete":
			$ulId = $_POST["ulId"];
			$sql = "delete from 分户验收  where id='$ulId'";
			$conn->query($sql);
			break;
		case "details":
			$id = $_POST["ulId"];
			$sql = "select * from 分户验收  where id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['工程单状态'] = $row['工程单状态'];
					$data[$i]['栋号'] = $row['栋号'];
					$data[$i]['楼层'] = $row['楼层'];
					$data[$i]['户数'] = $row['户数'];
					$data[$i]['起始层'] = $row['起始层'];
					$data[$i]['验收时间'] = $row['验收时间'];
					$data[$i]['起始日期'] = $row['起始日期'];
					$data[$i]['验收方案'] = $row['验收方案'];
					$data[$i]['验收方案说明'] = $row['验收方案说明'];
					$data[$i]['整改通知单'] = $row['整改通知单'];
					$data[$i]['整改通知单说明'] = $row['整改通知单说明'];
					$data[$i]['汇总表'] = $row['汇总表'];
					$data[$i]['汇总表说明'] = $row['汇总表说明'];
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
		case "查看户号":
			$itemId = $_POST["itemId"];
			$sql = "select id,户号,状态 from 户号汇总 where 项目id='$itemId'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['id'] = $row['id'];
					$data[$i]['户号'] = $row['户号'];
					$data[$i]['状态'] = $row['状态'];
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
		case "查看附件":
			$houseId = $_POST["houseId"];
			$sql = "select * from 户号汇总 where id='$houseId'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['验收记录表'] = $row['验收记录表'];
					$data[$i]['验收照片'] = $row['验收照片'];
					$data[$i]['验收汇总表'] = $row['验收汇总表'];
					$data[$i]['验收记录表说明'] = $row['验收记录表说明'];
					$data[$i]['验收照片说明'] = $row['验收照片说明'];
					$data[$i]['验收汇总表说明'] = $row['验收汇总表说明'];
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
		case "监理确认":
			$ulId = $_POST["ulId"];
			$sql = "update 分户验收 set 工程单状态='待审批' where id='$ulId'";
			$conn->query($sql);
			break;
		case "审批通过":
			$ulId = $_POST["ulId"];
			$sql = "update 分户验收 set 工程单状态='审批通过' where id='$ulId'";
			$conn->query($sql);
			break;
		case "查看状态":
			$houseId = $_POST["houseId"];
			$sql = "select 状态 from 户号汇总 where id='$houseId'";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['状态'] = $row['状态'];
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
		case "检查":
			$itemId = $_POST["itemId"];
			$sql = "SELECT count(*) as '不合格' FROM 户号汇总 where 项目id='$itemId' and (状态='不合格' or 状态='未上传')";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				$i = 0;
				while($row = $result->fetch_assoc()){
					$data[$i]['不合格'] = $row['不合格'];
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
	}
?>