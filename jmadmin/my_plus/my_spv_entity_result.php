<?php
	$flag = $_POST['flag'];
	if($flag=="创建卡项"){
		require('../conn.php');
		$gcmc = $_POST['gcmc'];
		$timestamp = $_POST['timestamp'];
		$sql = "select * from 实体监督抽检  where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];				
				$data_arr[$i]['检测类型']=$row['检测类型'];
				$data_arr[$i]['数量']=$row['数量'];
				$data_arr[$i]['检测部位']=$row['检测部位'];
				$data_arr[$i]['检测人']=$row['检测人'];
				$data_arr[$i]['检测日期']=$row['检测日期'];
				$data_arr[$i]['监理操作单位']=$row['监理操作单位'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}

	else if($flag=='获取状态'){
		//用id作为查询条件
		$id = $_POST['ulid'];
//		$sjc = $_POST['protsp'];
		
		require('../conn.php');
		$sql = "select * from 实体监督抽检 where id='$id' ";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];				
				$data_arr[$i]['检测类型']=$row['检测类型'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
//				$data_arr[$i]['规格']=$row['规格'];
				$data_arr[$i]['数量']=$row['数量'];
//				$data_arr[$i]['生产厂家']=$row['生产厂家'];
//				$data_arr[$i]['取样人']=$row['取样人'];
//				$data_arr[$i]['取样日期']=$row['取样日期'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}
	else if($flag=="监理处理"){
		require('../conn.php');
		$ulId = $_POST['ulId'];
//		$ttxt = $_POST['ttxt'];
//		$timestamp = $_POST['timestamp'];
		require('../conn.php');
//		$sql = "update 实体监督抽检  set 退场记录 = '".$ttxt."',工程单状态 = '待审核' where id ='$ulid' and 工程时间戳 = '".$timestamp."' ";
		$sql = "update 实体监督抽检  set 工程单状态 = '待审批' where id ='$ulId'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//		print_r($ulId);
		
	}else if($flag=="审批通过"){
		$ulId = $_POST['ulId'];
		require('../conn.php');
		$sql = "update 实体监督抽检  set 工程单状态 = '已处理' where id ='$ulId'  ";
		$result = $conn->query($sql);
		$conn->close();
	}
?>