<?php
	$flag = $_POST['flag'];
//	$gcmc = $_POST['gcmc'];
	if($flag=='获取信息'){
		$myid = $_POST['myid'];
		
		require('../conn.php');
		$sql = "select * from 实体检测 where id='$myid' ";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result);
		$i = 0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data_arr[$i]['卡项id']=$row['id'];
				$data_arr[$i]['时间戳']=$row['时间戳'];
				$data_arr[$i]['工程时间戳']=$row['工程时间戳'];
				$data_arr[$i]['工程名称']=$row['工程名称'];
				$data_arr[$i]['工程单状态']=$row['工程单状态'];
				$data_arr[$i]['委托编号']=$row['委托编号'];
				$data_arr[$i]['检测类型']=$row['检测类型'];					
				$data_arr[$i]['检测数量']=$row['数量'];
				$data_arr[$i]['检测人']=$row['检测人'];
				$data_arr[$i]['检测日期']=$row['检测日期'];				
				$data_arr[$i]['检测部位']=$row['检测部位'];
				$data_arr[$i]['备注']=$row['备注'];					
				$data_arr[$i]['检测单位']=$row['检测单位'];				
				$data_arr[$i]['送样日期']=$row['送样日期'];
				$data_arr[$i]['收样日期']=$row['收样日期'];
				$data_arr[$i]['送样单位']=$row['送样单位'];				
				$data_arr[$i]['见证单位']=$row['见证单位'];
				$data_arr[$i]['收样单位']=$row['收样单位'];
				$data_arr[$i]['送样人']=$row['送样人'];
				$data_arr[$i]['见证人']=$row['见证人'];
				$data_arr[$i]['检测报告编号']=$row['检测报告编号'];									
				$data_arr[$i]['检测前照片']=$row['检测前照片'];
				$data_arr[$i]['检测实施过程照片']=$row['检测实施过程照片'];
				$data_arr[$i]['检测设备照片']=$row['检测设备照片'];				
				$data_arr[$i]['实测照片']=$row['实测照片'];
				$data_arr[$i]['不合格报告']=$row['不合格报告'];
				$data_arr[$i]['退场记录']=$row['退场记录'];
				$data_arr[$i]['处理照片']=$row['处理照片'];
				$data_arr[$i]['不合格报表']=$row['不合格报表'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
		
	}
?>