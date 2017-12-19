<?php
	$flag = $_POST['flag'];
	require('../conn.php');
	if($flag=='获取信息'){
		//用时间戳作为查询条件
		$sjc = $_POST['sjc'];
		$sql = "select * from 材料监督抽检 where 时间戳='$sjc' ";
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
				$data_arr[$i]['送样人']=$row['送样人'];
				$data_arr[$i]['见证人']=$row['见证人'];
				$data_arr[$i]['进场日期']=$row['进场日期'];
				$data_arr[$i]['取样日期']=$row['取样日期'];
				$data_arr[$i]['送样日期']=$row['送样日期'];
				$data_arr[$i]['收样日期']=$row['收样日期'];
				$data_arr[$i]['合格证编号']=$row['合格证编号'];
				$data_arr[$i]['使用部位']=$row['使用部位'];
				$data_arr[$i]['经销商单位']=$row['经销商单位'];
				$data_arr[$i]['备注']=$row['备注'];
				$data_arr[$i]['样品编号']=$row['样品编号'];
				$data_arr[$i]['检测单位']=$row['检测单位'];
				$data_arr[$i]['送样单位']=$row['送样单位'];
				$data_arr[$i]['见证单位']=$row['见证单位'];
				$data_arr[$i]['收样单位']=$row['收样单位'];
				$i++;
			}
		}
		$conn->close();
		$data_json = json_encode($data_arr);
		echo $data_json;
//		echo($data_arr);
	} else if($flag=='修改信息'){
		$sjc = $_POST['sjc'];
		$data = $_POST['data'];
		$data_arr = explode(',', $data);
		$sql = "update 材料监督抽检 set 取样类型='$data_arr[0]',规格='$data_arr[1]',数量='$data_arr[2]',生产厂家='$data_arr[3]',取样人='$data_arr[4]',取样日期='$data_arr[5]',检测单位='$data_arr[6]' where 时间戳='$sjc' ";
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
		
	}else if($flag=='获取照片'){
		$gcid=$_POST['gcid'];
		$sqldate="";
		$sql = "select * from 材料监督抽检  where id='".$gcid."' ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"时间戳":"'.$row["时间戳"].'","工程单状态":"'.$row["工程单状态"].'","取样类型":"'.$row["取样类型"].'","规格":"'.$row["规格"].'","数量":"'.$row["数量"].'","生产厂家":"'.$row["生产厂家"].'","取样人":"'.$row["取样人"].'","见证人":"'.$row["见证人"].'","取样日期":"'.$row["取样日期"].'","送样日期":"'.$row["送样日期"].'","收样日期":"'.$row["收样日期"].'","送样单位":"'.$row["送样单位"].'","见证单位":"'.$row["见证单位"].'","收样单位":"'.$row["收样单位"].'","送样人":"'.$row["送样人"].'","检测单位":"'.$row["检测单位"].'","场景照片":"'.$row["场景照片"].'","样品照片":"'.$row["样品照片"].'","收样照片":"'.$row["收样照片"].'","检测照片":"'.$row["检测照片"].'","样品编号":"'.$row["样品编号"].'","退厂记录":"'.$row["退厂记录"].'","处理照片":"'.$row["处理照片"].'","复检编号":"'.$row["复检编号"].'","使用部位":"'.$row["使用部位"].'","合格证编号":"'.$row["合格证编号"].'","进场日期":"'.$row["进场日期"].'","经销商单位":"'.$row["经销商单位"].'","备注":"'.$row["备注"].'","检测报告编号":"'.$row["检测报告编号"].'","场景照片说明":"'.$row["场景照片说明"].'","样品照片说明":"'.$row["样品照片说明"].'","收样照片说明":"'.$row["收样照片说明"].'","检测报告照片说明":"'.$row["检测报告照片说明"].'","处理照片说明":"'.$row["处理照片说明"].'"},';
			 }
		} else {
			//echo "0 results";
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
		echo $json;
//		print_r($sqldate);
		$conn->close();
		
	}
?>