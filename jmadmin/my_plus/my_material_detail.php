<?php
	$flag = $_POST['flag'];
	
	if($flag=='获取信息'){
		//用时间戳作为查询条件
		$sjc = $_POST['sjc'];
		
		require('../conn.php');
		$sql = "select * from 材料送检 where 时间戳='$sjc' ";
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
				$data_arr[$i]['进场日期']=$row['进场日期'];
				$data_arr[$i]['取样日期']=$row['取样日期'];
				$data_arr[$i]['合格证编号']=$row['合格证编号'];
				$data_arr[$i]['使用部位']=$row['使用部位'];
				$data_arr[$i]['经销商单位']=$row['经销商单位'];
				$data_arr[$i]['备注']=$row['备注'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	} else if($flag=='修改信息'){
		$sjc = $_POST['sjc'];
		$data = $_POST['data'];
		$data_arr = explode(',', $data);
		
		require('../conn.php');
		$sql = "update 材料送检 set 取样类型='$data_arr[0]',规格='$data_arr[1]',数量='$data_arr[2]',生产厂家='$data_arr[3]',取样人='$data_arr[4]',取样日期='$data_arr[5]',检测单位='$data_arr[6]' where 时间戳='$sjc' ";
		$result = $conn->query($sql);
		if($result){
			$data_arr['结果']="修改成功！";
			$data_arr['SQL语句']=$sql;
		}else{
			$data_arr['结果']="修改失败！";
			$data_arr['SQL语句']=$sql;
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}
?>