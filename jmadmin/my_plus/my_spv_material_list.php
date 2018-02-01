<?php

	$flag = $_POST['flag'];//执行什么的判断条件
	$gcmc = $_POST['gcmc'];
	
	if($flag=="创建卡项"){
		require('../conn.php');
		$timestamp = $_POST['pj_timestamp'];
		$sql = "select * from 材料监督抽检  where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
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
				$data_arr[$i]['监理操作单位']=$row['监理操作单位'];
				$data_arr[$i]['检测操作单位']=$row['检测操作单位'];
				$i++;
			}
		}

//		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//		print_r($data_arr);
		
	}else if($flag=="获取状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "select 工程单状态 ,工程时间戳  from 材料监督抽检 where id = '$ulid' and 工程名称 = '".$gcmc."' " ;
		$result = $conn->query($sql);
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr['工程单状态']=$row['工程单状态'];
				$data_arr['工程时间戳']=$row['工程时间戳'];
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="改新增状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$gcdzt = $_POST['gcdzt'];
		require('../conn.php');
		if($gcdzt=='新增复检'){
			$state = '已取样复检';
		}else{
			$state = '已取样';
		}
		$sql = "update 材料监督抽检 set 工程单状态 = '".$state."' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="委托成功！";
		}else{
			$data_arr['结果']="委托失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="删除"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "delete from 材料监督抽检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="删除成功！";
		}else{
			$data_arr['结果']="删除失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
		
	} else if($flag=="撤销取样"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 材料监督抽检  set 工程单状态 = '新增' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '未见证' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '不合格' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql2 = "insert into 材料监督抽检初检表  select * from 材料监督抽检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$conn->query($sql2);
		$sql = "update 材料监督抽检  set 工程单状态 = '新增复检',场景照片='',场景照片说明='',样品照片='',样品照片说明='',收样照片='',收样照片说明='',检测照片='',检测报告照片说明='',处理照片='',处理照片说明='',退厂记录='' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '合格',检测报告编号='$testNum' where id ='$ulid'  ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '取样复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '新增复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '未见证复检' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="复检不合格"||$flag=="复检合格"){
		if($flag=="复检合格"){
			$flag = '合格';
		}
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$recheckNum = $_POST['recheckNum'];
		require('../conn.php');
		$sql = "update 材料监督抽检  set 工程单状态 = '$flag',复检编号 = '$recheckNum' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['result']="success";
		}else{
			$data_arr['result']="fail";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=='初检单'){
		require('../conn.php');
		$timestamp = $_POST['timestamp'];
		//初检单
		$sql = "select * from 材料监督抽检初检表 where 工程名称='".$gcmc."' and 工程时间戳 ='".$timestamp."' order by id desc";
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
		$sql = "update 材料监督抽检  set 工程单状态 = '已处理' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=='新建'){
		$sjc=$_POST["sjc"];
		$myInfo = $_POST["myInfo"];
//		$pj_name = $_POST["pj_name"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$Info = explode("|", $myInfo);
		require('../conn.php');
		$sqli = "insert into 材料监督抽检(时间戳,工程时间戳,工程名称,取样类型,规格,数量,生产厂家,取样人,进场日期,取样日期,合格证编号,使用部位,经销商单位,备注,检测单位,工程单状态,监理操作单位,检测操作单位) values('$sjc','$pj_timestamp','$gcmc','$Info[0]','$Info[1]','$Info[2]','$Info[3]','$Info[4]','$Info[5]','$Info[6]','$Info[7]','$Info[8]','$Info[9]','$Info[10]','$Info[11]','新增','$Info[12]','$Info[11]')";
//		$sql = "update 材料监督抽检  set 工程单状态 = '已处理' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sqli);
		if($result){
			$data_arr['结果']="提交成功！";
		}else{
			$data_arr['结果']="提交失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//		print_r($data_arr);
	}											
?>