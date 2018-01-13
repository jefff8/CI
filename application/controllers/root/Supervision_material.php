<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Supervision_material extends MY_Controller{
		//材料监督抽检
		public function index(){
			$supervision_material_timestamp = $this->uri->segment(3);
		}
	}
?>