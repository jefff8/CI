<?php
	$flag = $_POST['flag'];

	if($flag == "保存信息"){
		$id = $_POST['id'];
		$selfcheck_zcrq = $_POST['selfchek_zcrq'];
		$selfcheck_syrq = $_POST['selfchek_syrq'];
		$selfcheck_sydw = $_POST['selfchek_sydw'];
		$selfcheck_jzdw = $_POST['selfchek_jzdw'];
		$selfcheck_sdw = $_POST['selfchek_sdw'];
		$selfcheck_syr = $_POST['selfchek_syr'];
		$selfcheck_jzr = $_POST['selfchek_jzr'];
		$selfcheck_jcbh = $_POST['selfchek_jcbh'];
	}	
		require('../conn.php');
		$sql = "update  实体自检   set 送样日期='$selfcheck_zcrq',收样日期='$selfcheck_syrq',送样单位='$selfcheck_sydw',见证单位='$selfcheck_jzdw',收样单位='$selfcheck_sdw',送样人='$selfcheck_syr',见证人='$selfcheck_jzr',检测报告编号='$selfcheck_jcbh',工程单状态='确定检测' where id='$id' ";
		$result = $conn->query($sql);
		if($result){
			$return['result']='保存成功！';
			$return['sql'] = $sql;
		}else{
			$return['result']='保存失败！';
			$return['sql'] = $sql;
		}
		$json = json_encode($return);
		echo $json;
		$conn->close();
?>