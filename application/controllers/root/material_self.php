<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');
	class material_self extends CI_Controller{
		//材料自检
		public function index(){
			$material_timestamp = $this->uri->segment(3);
			$this->load->model('root/material_self_model','material_self');
			$data['material_data'] = $this->material_self->self_inspection($material_timestamp);
			$data['witness_data'] = $this->material_self->witness($material_timestamp);
			$data['result_data'] = $this->material_self->result($material_timestamp);
			$data['material_timestamp'] = $material_timestamp;
			$this->load->view('root/material_self.html',$data);
		}
	}
?>