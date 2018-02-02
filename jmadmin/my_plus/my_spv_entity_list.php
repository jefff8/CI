<?php
	require('../conn.php');
	$flag = $_POST['flag'];//执行什么的判断条件
	if($flag=="创建卡项"){
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
				$data_arr[$i]['检测部位']=$row['检测部位'];
				$data_arr[$i]['委托编号']=$row['委托编号'];
				$data_arr[$i]['检测数量']=$row['数量'];
				$data_arr[$i]['检测人']=$row['检测人'];
				$data_arr[$i]['检测日期']=$row['检测日期'];
				$data_arr[$i]['备注']=$row['备注'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$data_arr[$i]['监理操作单位']=$row['监理操作单位'];
				$data_arr[$i]['检测操作单位']=$row['检测操作单位'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//		print_r($result);
	}else if($flag=="新建"){
		$myInfo = $_POST["myInfo"];
		$Info = explode("|", $myInfo);
		$pj_name = $_POST["pj_name"];
		$sjc = $_POST["sjc"];
		$pj_timestamp = $_POST["pj_timestamp"];
		$sqli = "insert into 实体监督抽检(时间戳,工程名称,工程时间戳,检测类型,检测人,委托编号,检测单位,工程单状态) values ('$sjc','$pj_name','$pj_timestamp','$Info[0]',
'$Info[1]','$Info[2]','$Info[3]','新建')";
//		$result = $conn->query($sql);
		if ($conn -> query($sqli) === TRUE) {
			$jsonresult = 'success';
		} else {
			$jsonresult = 'error';
		}
		$conn->close();
		$data_arr['result'] = $jsonresult;
		$data_json = json_encode($data_arr);		
//		print_r($data_json);
		echo $data_json;
		
	}else if($flag=="获取状态"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		
		$sql = "select 工程单状态,时间戳  from 实体监督抽检  where id = '$ulid' and 工程名称 = '".$gcmc."' " ;
		$result = $conn->query($sql);
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr['工程单状态']=$row['工程单状态'];
				$data_arr['时间戳']=$row['时间戳'];
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}else if($flag=="准备"){
		$ulid = $_POST['ulid'];
//		$code = $_POST['code'];
		
		$sql = "update 实体监督抽检 set 工程单状态 = '提交检测' where id ='$ulid'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="操作成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="扩大抽检准备"){
		$ulid = $_POST['ulid'];		
		$sql = "update 实体监督抽检 set 工程单状态 = '扩大抽检准备'where id ='$ulid'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="操作成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="提交检测"){
		$gcdId = $_POST['gcdId'];
		$gcdzt = $_POST['gcdzt'];
		if($gcdzt=='准备'){
			$result = '提交检测';
		}else if($gcdzt=='扩大抽检准备'){
			$result = '扩大抽检检测';
		}
		$sql = "update 实体监督抽检 set 工程单状态 = '".$result."' where id ='$gcdId'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交检测成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//print_r($data_arr);
	}else if($flag=="提交"){
		$gcdId = $_POST['gcdId'];
		$gcdzt = $_POST['gcdzt'];
		if($gcdzt=='新建'){
			$result = '准备';
		}else if($gcdzt=='扩大抽检'){
			$result = '扩大抽检准备';
		}
		$sql = "update 实体监督抽检 set 工程单状态 = '".$result."' where id ='$gcdId'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="提交检测成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="删除"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		
		$sql = "delete from 实体监督抽检  where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="删除成功！";
		}else{
			$data_arr['结果']="删除失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}
	else if($flag=="撤销准备"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$gcdzt = $_POST['gcdzt'];//工程单状态
		//根据工程单状态判断撤销准备后的状态
		if($gcdzt=='准备'){
			$result = '新建';
		}else if($gcdzt=='扩大抽检准备'){
			$result = '扩大抽检';
		}
		$sql = "update 实体监督抽检  set 工程单状态 = '".$result."' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="撤销成功！";
		}else{
			$data_arr['结果']="撤销失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;	
	}
	else if($flag=="提交结果"){
		$ulid = $_POST['ulid'];
		
		$sql = "update 实体监督抽检 set 工程单状态 = '提交结果' where id ='$ulid'  ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="操作成功！";
		}else{
			$data_arr['结果']="操作失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		}
	else if($flag=="检测单位"){
		$sql = "SELECT DISTINCT 单位名称 FROM `用户信息` WHERE `单位`='检测单位'";
		$result = $conn->query($sql);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['检测单位']=$row['单位名称'];
				$i++;
			}
		}	
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}
	else if($flag=="合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$testNum = $_POST['testNum'];
//		$gcdzt = $_POST['gcdzt'];
//		if($gcdzt=='提交检测'){
			$result = '合格';
//		}else if($gcdzt=='扩大抽检检测'){
//			$result = '扩大抽检合格';
//		}
		$sql = "update 实体监督抽检  set 工程单状态 = '".$result."',检测报告编号='$testNum' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="扩大抽检合格"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		$testNum = $_POST['testNum'];
//		$gcdzt = $_POST['gcdzt'];
//		if($gcdzt=='提交检测'){
//			$result = '合格';
//		}else if($gcdzt=='扩大抽检检测'){
			$result = '扩大抽检合格';
//		}
		$sql = "update 实体监督抽检  set 工程单状态 = '".$result."',检测报告编号='$testNum' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="处理成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}else if($flag=="扩大抽检"){
		$ulid = $_POST['ulid'];
		$gcmc = $_POST['gcmc'];
		require('../conn.php');
		$sql = "update 实体监督抽检  set 工程单状态 = '扩大抽检',检测前照片='',场景照片说明='',检测实施过程照片='',检测实施过程照片说明='',检测设备照片='',检测设备照片说明='',实测照片='',实测照片说明='',处理照片='',处理照片说明='',退场记录='' where id ='$ulid' and 工程名称 = '".$gcmc."' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="扩大抽检成功！";
		}else{
			$data_arr['结果']="失败！";
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
	}				
	
	
	

	
?>