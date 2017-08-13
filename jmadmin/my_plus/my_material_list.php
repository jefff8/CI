<?php

	$flag = $_POST['flag'];//执行什么的判断条件
	$gcmc = $_POST['gcmc'];
	$timestamp = $_POST['timestamp'];
	if($flag=="创建卡项"){
		require('../conn.php');
		$sql = "select * from 材料送检  where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['取样类型']=$row['取样类型'];
				$data_arr[$i]['规格']=$row['规格'];
				$data_arr[$i]['数量']=$row['数量'];
				$data_arr[$i]['生产厂家']=$row['生产厂家'];
				$data_arr[$i]['取样人']=$row['取样人'];
				$data_arr[$i]['取样日期']=$row['取样日期'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$i++;
			}
		}

		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="获取状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "select 工程单状态  from 材料送检 where id = '$ulid' and 工程名称 = '".$gcmc."' " ;
		$result = $conn->query($sql);
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr['工程单状态']=$row['工程单状态'];
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="改取样状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检 set 工程单状态 = '取样' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="取样成功！";
		}else{
			$data_arr['结果']="取样失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="删除"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "delete from 材料送检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="删除成功！";
		}else{
			$data_arr['结果']="删除失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="提交见证"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '未见证' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	} else if($flag=="撤销取样"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '新增' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="撤销成功！";
		}else{
			$data_arr['结果']="撤销失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="撤销见证"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '未见证' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="撤销成功！";
		}else{
			$data_arr['结果']="撤销失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="不合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '不合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="复检"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql2 = "insert into 材料送检初检表  select * from 材料送检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$conn->query($sql2);
		$sql = "update 材料送检  set 工程单状态 = '新增复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="复检成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$testNum = $_POST['testNum'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '合格',检测报告编号='$testNum' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="取样复检"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '取样复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="取样成功！";
		}else{
			$data_arr['结果']="取样失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="撤销取样复检"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '新增复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="取样成功！";
		}else{
			$data_arr['结果']="取样失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="提交复检见证"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '未见证复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="复检不合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '复检不合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=='初检单'){
		require('../conn.php');
		//初检单
		$sql = "select * from 材料送检初检表 where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
		$result = $conn->query($sql);
		$i = 0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['取样类型']=$row['取样类型'];
				$data_arr[$i]['规格']=$row['规格'];
				$data_arr[$i]['数量']=$row['数量'];
				$data_arr[$i]['生产厂家']=$row['生产厂家'];
				$data_arr[$i]['取样人']=$row['取样人'];
				$data_arr[$i]['取样日期']=$row['取样日期'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$i++;
			}
		}
		$data_json = json_encode($data_arr);
		echo $data_json;
		$conn->close();
	}else if($flag=='审批通过'){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料送检  set 工程单状态 = '已处理' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}											
?>