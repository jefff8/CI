<?php
	require('../conn.php');
	$flag = $_POST['flag'];
	if($flag=='获取'){
		$uid = $_POST['uid'];
		$sql = "select * from 用户信息  where id='$uid'  ";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['id']=$row['id'];
				$data_arr[$i]['账号']=$row['账号'];
				$data_arr[$i]['密码']=$row['密码'];
				$data_arr[$i]['手机']=$row['手机'];
				$data_arr[$i]['邮箱']=$row['邮箱'];
				$data_arr[$i]['单位']=$row['单位'];
				$data_arr[$i]['单位名称']=$row['单位名称'];
				$i++;
			}
		}
		$conn->close();
//		print_r($data_arr);
		$data_json = json_encode($data_arr);
		echo $data_json;
//		echo $data_arr;
	}else if($flag=='保存信息'){
//		echo 'ok';
		$uid = $_POST['uid'];
		$account = $_POST['account'];
		$passWord = $_POST['passWord'];
		$email = $_POST['email'];
		$Telephone = $_POST['Telephone'];
		$Company = $_POST['Company'];
		$sql = "UPDATE 用户信息  SET 账号='".$account."',密码='".$passWord."',邮箱='".$email."',手机='".$Telephone."',单位名称='".$Company."' WHERE id='".$uid."' ";
		$result = $conn->query($sql);
		if($result){
			$json_result = 'success';
		}else{
			$json_result = 'fail';
		}
		$json = '{"result":"'.$json_result.'"}';
		echo $json;
		$conn->close();
	}	
	
?>