<?php
	require("../conn.php");
	$flag=$_POST['flag'];
	
	if($flag=='获取工程时间戳'){
		$uid = $_POST['uid'];
		$sql = "SELECT * from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid'";
		$result = $conn->query($sql);
		$i=0;
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data[$i]['时间戳'] = $row['时间戳'];
				$i++;
			}
		}
		
	}
	
	//材料送检
	if($flag=='材料送检'){
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		$unitName = $_POST['unitName'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='取样' or 工程单状态='新增复检' or 工程单状态='取样复检')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='未见证' or 工程单状态='未见证复检' or 工程单状态='已见证' or 工程单状态='已见证复检' or  工程单状态='复检不合格' or 工程单状态='不合格') and 监理操作单位='$unitName'";
		}else if($unit=='检测单位'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='收样' or 工程单状态='收样复检'  ) and 检测操作单位='$unitName'";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' ";
		}else if($unit=='监督机构'){
			$sql = "SELECT * from 材料送检 where 工程时间戳='$pj_timestamp' and (工程单状态='待审批' or 工程单状态='不合格') ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['取样类型'] = $row['取样类型'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['规格'] = $row['规格'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['取样人'] = $row['取样人'];
				$data[$i]['取样日期'] = $row['取样日期'];
				$i++;
			}
		}
	}
	
	//材料自检
	if($flag=='材料自检'){
		$unitName = $_POST['unitName'];
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 材料自检  where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='准备材料' or 工程单状态='取样送检' or 工程单状态='取样送检准备材料')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 材料自检  where 工程时间戳='$pj_timestamp' and (工程单状态='提交见证' or 工程单状态='确定自测' or 工程单状态='不合格' or 工程单状态='取样送检提交见证' or 工程单状态='取样送检确定自测' or 工程单状态='取样送检不合格') and 监理操作单位='$unitName'";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 材料自检 where 工程时间戳='$pj_timestamp' ";
		}else if($unit=='监督机构'){
			$sql = "SELECT * from 材料自检 where 工程时间戳='$pj_timestamp' and (工程单状态='不合格' or 工程单状态='取样送检不合格' or 工程单状态='待审批') ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['自检自测类型'] = $row['自检自测类型'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	
	//实体自检
	if($flag=='实体自检'){
		$unitName = $_POST['unitName'];
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='施工单位'){
			$sql = "SELECT * from 实体自检  where 工程时间戳='$pj_timestamp' and (工程单状态='新增' or 工程单状态='准备材料')";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 实体自检  where 工程时间戳='$pj_timestamp' and (工程单状态='未检测' or 工程单状态='确定检测' or 工程单状态='不合格' ) and 监理操作单位='$unitName'";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 实体自检 where 工程时间戳='$pj_timestamp' ";
		}else if($unit=='监督机构'){
			$sql = "SELECT * from 实体自检  where 工程时间戳='$pj_timestamp' and (工程单状态='不合格' or 工程单状态='待审批') ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['自检自测类型'] = $row['自检自测类型'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	
	//实体检测
	if($flag=='实体检测'){
		$unitName = $_POST['unitName'];
		$pj_timestamp = $_POST['pj_timestamp'];
		$unit = $_POST['unit'];
		if($unit=='检测单位'){
			$sql = "SELECT * from 实体检测  where 工程时间戳='$pj_timestamp' and (工程单状态='新建' or 工程单状态='准备' or 工程单状态='提交结果') and 检测操作单位='$unitName'";
		}else if($unit=='监理单位'){
			$sql = "SELECT * from 实体检测  where 工程时间戳='$pj_timestamp' and (工程单状态='待确认' or 工程单状态='已确认' or 工程单状态='不合格') and 监理操作单位='$unitName'";
		}else if($unit=='管理员'){
			$sql = "SELECT * from 实体检测 where 工程时间戳='$pj_timestamp' ";
		}else if($unit=='监督机构'){
			$sql = "SELECT * from 实体检测 where 工程时间戳='$pj_timestamp' and (工程单状态='待审批' or 工程单状态='不合格') ";
		}
		$result = $conn->query($sql);
		if($result->num_rows >0){
			$i=0;
			while($row = $result->fetch_assoc()){
				$data[$i]['id'] = $row['id'];
				$data[$i]['时间戳'] = $row['时间戳'];
				$data[$i]['工程名称'] = $row['工程名称'];
				$data[$i]['工程单状态'] = $row['工程单状态'];
				$data[$i]['检测类型'] = $row['检测类型'];
				$data[$i]['检测部位'] = $row['检测部位'];
				$data[$i]['数量'] = $row['数量'];
				$data[$i]['检测人'] = $row['检测人'];
				$data[$i]['检测日期'] = $row['检测日期'];
				$i++;
			}
		}
	}
	
	//材料抽检	
	if($flag=='材料抽检'){
		$uid = $_POST['uid'];
		$unit = $_POST['unit'];
		$unitName = $_POST['unitName'];
		$pj_timestamp = $_POST['pj_timestamp'];
		
		try {
		    if (!$unitName) {
		      throw new Exception('$unitName不存在');
		    }
			if($uid=='1'){
				$sql = "SELECT * FROM 我的工程 WHERE 是否竣工 = '0' AND `时间戳` = '$pj_timestamp'";
			}else{
				$sql = "SELECT * from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid' and 是否竣工='0' order by 工程id";
			}
			
			$result1 = $conn->query($sql);
			$class = mysqli_num_rows($result1);
			$i = 0;
			if($result1->num_rows >0){
				while($row = $result1->fetch_assoc()){
		//			$sqldata=$sqldata.'{"id":'.$row['id'].','.'"时间戳":'.$row['时间戳'].','.'"工程名称":'.$row['工程名称'].','.'"地区":'.$row['地区'].'},';
//					$data[$i]['pid']=$row['id'];//工程id
//					$data[$i]['工程名称']=$row['工程名称'];
					$data[$i]['施工单位']=$row['施工单位'];
					$data[$i]['监理单位']=$row['监理单位'];
					$data[$i]['检测单位']=$row['检测单位'];
					$i++;
				}
			}
		    
		    //
		    if($unit=='管理员'){
				$sql = " SELECT * FROM 材料监督抽检 WHERE 工程时间戳='$pj_timestamp' AND (工程单状态!='已处理' AND 工程单状态!='合格')";
			}else if($unit=='监督机构'){
				$sql = " SELECT * FROM 材料监督抽检  WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='新建' OR 工程单状态='不合格' OR 工程单状态='新增复检' OR 工程单状态='待审批') ";
			}else if($unit=='检测单位'){
				$sql = " SELECT * FROM 材料监督抽检  WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='已取样' OR 工程单状态='收样' OR 工程单状态='已取样复检' OR 工程单状态='收样复检') AND 检测操作单位='$unitName'";
			}else if($unit=='监理单位'){
				$sql = "SELECT * FROM 材料监督抽检 WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='不合格' OR 工程单状态='复检不合格') AND 监理操作单位='$unitName'";
			}
			$result = $conn->query($sql);
			$i=0;
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data[$i]['result']='success';
					$data[$i]['卡项id']=$row['id'];
					$data[$i]['时间戳']=$row['时间戳'];
					$data[$i]['工程名称']=$row['工程名称'];
					$data[$i]['工程单状态']=$row['工程单状态'];
					$data[$i]['取样类型']=$row['取样类型'];
					$data[$i]['规格']=$row['规格'];
					$data[$i]['数量']=$row['数量'];
					$data[$i]['生产厂家']=$row['生产厂家'];
					$data[$i]['取样人']=$row['取样人'];
					$data[$i]['取样日期']=$row['取样日期'];
//					$data[$i]['检测单位']=$row['检测单位'];
					$data[$i]['监理操作单位']=$row['监理操作单位'];
					$data[$i]['检测操作单位']=$row['检测操作单位'];
					$i++;
				}
			}else{
				$data[$i]['result']='fail';
//				$data[$i]['result234']=$result;
			}    
		} catch(Exception $e) {
		    echo $e->getMessage();
		}	
	}
	
	
	//实体抽检	
	if($flag=='实体抽检'){
		$uid = $_POST['uid'];
		$unit = $_POST['unit'];
		$unitName = $_POST['unitName'];
		$pj_timestamp = $_POST['pj_timestamp'];
		
		try {
		    if (!$unitName) {
		      throw new Exception('$unitName不存在');
		    }
			if($uid=='1'){
				$sql = "SELECT * FROM 我的工程 WHERE 是否竣工 = '0' AND `时间戳` = '$pj_timestamp'";
			}else{
				$sql = "SELECT * from 用户工程关系表 A INNER JOIN 我的工程 B ON A.工程id=B.id  where 用户id='$uid' and 是否竣工='0' order by 工程id";
			}
			
			$result1 = $conn->query($sql);
			$class = mysqli_num_rows($result1);
			$i = 0;
			if($result1->num_rows >0){
				while($row = $result1->fetch_assoc()){
		//			$sqldata=$sqldata.'{"id":'.$row['id'].','.'"时间戳":'.$row['时间戳'].','.'"工程名称":'.$row['工程名称'].','.'"地区":'.$row['地区'].'},';
//					$data[$i]['pid']=$row['id'];//工程id
//					$data[$i]['工程名称']=$row['工程名称'];
					$data[$i]['施工单位']=$row['施工单位'];
					$data[$i]['监理单位']=$row['监理单位'];
					$data[$i]['检测单位']=$row['检测单位'];
					$i++;
				}
			}

		    if($unit=='管理员'){
				$sql = " SELECT * FROM 实体监督抽检 WHERE 工程时间戳='$pj_timestamp' AND (工程单状态!='已处理' AND 工程单状态!='合格')";
			}else if($unit=='监督机构'){
				$sql = " SELECT * FROM 实体监督抽检  WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='新建' OR 工程单状态='不合格') ";
			}else if($unit=='检测单位'){
				$sql = " SELECT * FROM 实体监督抽检  WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='准备' OR 工程单状态='提交检测' ) AND 检测操作单位='$unitName'";
			}else if($unit=='监理单位'){
				$sql = "SELECT * FROM 实体监督抽检 WHERE 工程时间戳='$pj_timestamp' AND (工程单状态='不合格' ) AND 监理操作单位='$unitName'";
			}
			$result = $conn->query($sql);
			$i=0;
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					$data[$i]['result']='success';
					$data[$i]['卡项id']=$row['id'];
					$data[$i]['时间戳']=$row['时间戳'];
					$data[$i]['工程名称']=$row['工程名称'];
					$data[$i]['工程单状态']=$row['工程单状态'];				
					$data[$i]['检测类型']=$row['检测类型'];
					$data[$i]['检测部位']=$row['检测部位'];
					$data[$i]['委托编号']=$row['委托编号'];
					$data[$i]['检测数量']=$row['数量'];
					$data[$i]['检测人']=$row['检测人'];
					$data[$i]['检测日期']=$row['检测日期'];
					$data[$i]['备注']=$row['备注'];
					$data[$i]['检测单位']=$row['检测单位'];
					$data[$i]['监理操作单位']=$row['监理操作单位'];
					$data[$i]['检测操作单位']=$row['检测操作单位'];
					$i++;
				}
			}else{
				$data[$i]['result']='fail';
			}    
		} catch(Exception $e) {
		    echo $e->getMessage();
		}	
	}
	$json = json_encode($data);
	echo $json;
//	print_r($data);
	$conn->close();
?>