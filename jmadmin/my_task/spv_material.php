<?php
	require("../conn.php");
	$flag = $_POST['flag'];
//	$ulId = $_POST['ulId'];
	switch($flag)
	{	
		case "获取状态":
		$ulId = $_POST['ulId'];
			$sql = "select 工程单状态,工程名称,工程时间戳  from 材料监督抽检 where  id = '$ulId' " ;
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data_arr['工程单状态']=$row['工程单状态'];
					$data_arr['工程名称']=$row['工程名称'];
					$pj_timestamp=$row['工程时间戳'];
				}
			}
			$sql2 = "select id from 我的工程 where 时间戳='$pj_timestamp'";
			$result2 = $conn->query($sql2);
			if($result2->num_rows >0){
				while($row2 = $result2->fetch_assoc()){
					$data_arr['id']=$row2['id'];
				}
			}
			$data_json = json_encode($data_arr);
			echo $data_json;
//			print_r($data_arr);
			$conn->close();
		break;
		
		
		case "获取照片":
		$gcid=$_POST['gcid'];
		$pj_timestamp = $_POST['pj_timestamp'];
		$sqldate="";
		$sql = "select * from 材料监督抽检  where id='".$gcid."' ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
//			 	$sqldate= $sqldate.'{"时间戳":"'.$row["时间戳"].'","工程单状态":"'.$row["工程单状态"].'","取样类型":"'.$row["取样类型"].'","规格":"'.$row["规格"].'","数量":"'.$row["数量"].'","生产厂家":"'.$row["生产厂家"].'","取样人":"'.$row["取样人"].'","见证人":"'.$row["见证人"].'","取样日期":"'.$row["取样日期"].'","送样日期":"'.$row["送样日期"].'","收样日期":"'.$row["收样日期"].'","送样单位":"'.$row["送样单位"].'","见证单位":"'.$row["见证单位"].'","收样单位":"'.$row["收样单位"].'","送样人":"'.$row["送样人"].'","检测单位":"'.$row["检测单位"].'","场景照片":"'.$row["场景照片"].'","样品照片":"'.$row["样品照片"].'","收样照片":"'.$row["收样照片"].'","检测照片":"'.$row["检测照片"].'","样品编号":"'.$row["样品编号"].'","退厂记录":"'.$row["退厂记录"].'","处理照片":"'.$row["处理照片"].'","复检编号":"'.$row["复检编号"].'","使用部位":"'.$row["使用部位"].'","合格证编号":"'.$row["合格证编号"].'","进场日期":"'.$row["进场日期"].'","经销商单位":"'.$row["经销商单位"].'","备注":"'.$row["备注"].'","检测报告编号":"'.$row["检测报告编号"].'","场景照片说明":"'.$row["场景照片说明"].'","样品照片说明":"'.$row["样品照片说明"].'","收样照片说明":"'.$row["收样照片说明"].'","检测报告照片说明":"'.$row["检测报告照片说明"].'","处理照片说明":"'.$row["处理照片说明"].'",';
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
				$data_arr[$i]['检测报告编号']=$row['检测报告编号'];
				$data_arr[$i]['场景照片']=$row['场景照片'];
				$data_arr[$i]['复检编号']=$row['复检编号'];
				$data_arr[$i]['退厂记录']=$row['退厂记录'];
				$i++;
			 }
		} else {
			//echo "0 results";
		}
		
		$sql = "SELECT * FROM 我的工程 WHERE 是否竣工 = '0' AND `时间戳` = '$pj_timestamp'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'"施工单位":"'.$row["施工单位"].'","监理单位":"'.$row["监理单位"].'","检测单位":"'.$row["检测单位"].'"},';
			 }
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
		break;
	}
		
			

?>