<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');
	class Commission extends MY_Controller{
		//第三方实体检测
		public function index(){
			$commission_timestamp = $this->uri->segment(3);
			$this->load->model('root/commission_model','commission');
			$data['commission_data'] = $this->commission->commission($commission_timestamp);
			$data['witness_data'] = $this->commission->witness($commission_timestamp);
			$data['test'] = $this->commission->test($commission_timestamp);
			$data['result_data'] = $this->commission->result($commission_timestamp);
			$data['commission_timestamp'] = $commission_timestamp;
			$this->load->view('root/commission.html',$data);
		}
		//详情查看
		public function check(){
			//获取id
			$com_id = $this->uri->segment(3);
			//获取工程时间戳
			$pj_timestamp = $this->uri->segment(4);
			//时间戳
			$timestamp = $this->uri->segment(5);
			$this ->load -> model('root/commission_model','commission');
			$data['detail_data'] = $this->commission->check($com_id);
			$data['pj_timestamp'] = $pj_timestamp;
			$this->load->view('root/commission_Detail.html',$data);
		}

		/**
		 * 合格
		 */
		public function qualified(){
			$pj_timestamp = $this->input->post('pj_timestamp');
			$data['self_id'] = $this->input->post('self_id');
			$data['testNum'] =  $this->input->post('testNum');
			$data['pj_status'] = $this->input->post('pj_status');
			$this->load->model('root/Commission_model','qualified');
			$this->qualified->qualified($data);
	    }
		
		/**
		 * 文件上传
		 */
		public function do_upload(){
			$imgs = $_FILES;
			$data['result'] =  $this->input->post('result');
			$data['self_id'] = $this->input->post('self_id');
			$data['testNum'] =  $this->input->post('testNum');
			$data['explain'] =  $this->input->post('explain');
			$pj_timestamp = $this->input->post('pj_timestamp');
			//上传配置  
			$config['upload_path'] = './jmadmin/upload/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = 0;
	        $config['max_width'] = 0;
	        $config['max_height'] = 0;
	        $config['file_name']  = time().'.jpg';
	        $data['filename'] = "~*^*~".$config['file_name'];
	        //加载上传类 
	        $this->load->library('upload', $config);
	        //执行上传任务
	        if (!$this->upload->do_upload('userfile'))
	        {
	        	//上传失败
	        	$error = $this->upload->display_errors();
	            echo "<script>alert('$error');window.history.back();</script>";
	            die;
	        }
	        else
	        {
	         //    $data['upload_data']=$this->upload->data();  //文件的一些信息
		        // $img=$data['upload_data']['file_name'];  //取得文件名
		        // echo $img."<br>";
		        // foreach ($data['upload_data'] as $item => $value){ 
		        //      echo $item . ":" . $value . "<br>";    
		        // }
		        $this->load->model('root/Commission_model','fail');
		        $this->fail->fail($data);
		        success('Commission/index/'.$pj_timestamp,"操作成功！");
	        }
		}
	}
?>