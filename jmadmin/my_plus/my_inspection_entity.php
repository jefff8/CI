<?php
	$flag = $_POST['flag'];
	if($flag=="创建卡项"){
		$gcmc = $_POST['gcmc'];
		$timestamp = $_POST['timestamp'];
		require('../conn.php');
		$sql = "select * from 实体自检  where 工程名称 ='".$gcmc."' and 工程时间戳='".$timestamp."' order by id desc";
		$result = $conn->query($sql);
		
		$i=0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['自检自测类型']=$row['自检自测类型'];
				$data_arr[$i]['规格']=$row['规格'];
				$data_arr[$i]['数量']=$row['数量'];
				$data_arr[$i]['生产厂家']=$row['生产厂家'];
				$data_arr[$i]['取样人']=$row['取样人'];
				$data_arr[$i]['进厂日期']=$row['进厂日期'];
				$data_arr[$i]['取样日期']=$row['取样日期'];
				$data_arr[$i]['合格证编号']=$row['合格证编号'];
				$data_arr[$i]['使用部位']=$row['使用部位'];
				$data_arr[$i]['经销商单位']=$row['经销商单位'];
				$data_arr[$i]['备注']=$row['备注'];
				$i++;
			}
		}else{
			$data_arr ='';
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag == "获取状态"){
		$ulid = $_POST['ulid'];
//		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "select 工程单状态,时间戳 from 实体自检 where id = '$ulid' ";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$data_arr['工程单状态']=$row['工程单状态'];
				$data_arr['时间戳']=$row['时间戳'];
				
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="删除"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "delete from 实体自检  where id = '$ulid' and 工程名称 = '".$gcmc."'";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="删除成功！";
		}else{
			$data_arr['结果']="删除失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体自检  set 工程单状态 = '合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="不合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体自检  set 工程单状态 = '不合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="撤销准备"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体自检  set 工程单状态 = '新增' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="撤销成功！";
		}else{
			$data_arr['结果']="撤销失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="准备材料"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体自检  set 工程单状态 = '准备材料' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}
?>