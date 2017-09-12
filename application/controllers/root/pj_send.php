<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pj_send extends MY_Controller{
	/**
	 * 材料见证送检页面
	 * @return [type] [description]
	 */
	public function index(){
		$pj_timestamp = $this->uri->segment(3);
		$this->load->model('root/pj_send_model','pj_send');
		$data['send_data'] = $this->pj_send->check($pj_timestamp);
		$data['witness_data'] = $this->pj_send->witness($pj_timestamp);
		$data['samp_data'] = $this->pj_send->samp($pj_timestamp);
		$data['result_data'] = $this->pj_send->result($pj_timestamp);
		$data['pj_timestamp'] = $pj_timestamp;
		$this->load->view('root/pj_send.html',$data);
	}

     /**
	 /* 送检添加页面
	 */
	public function add_page(){
		$this->load->helpers('form');
		$pj_data['pj_timestamp'] = $this->uri->segment(3);
		$name = $this->uri->segment(4);
		//接收中文解码
		$pj_data['pj_name'] = urldecode($name);
		$this->load->view('root/pj_sendAdd.html',$pj_data);
	}

	/**
	 * 送检添加
	 */
	public function add(){
		$pj_timestamp = $this->input->post('pj_timestamp');
		$data = array(
				'时间戳' => $this->input->post('timestamp'),
				'工程时间戳' => $this->input->post('pj_timestamp'),
				'工程名称' => $this->input->post('pj_name'),
				'工程单状态' => $this->input->post('pj_status'),
				'取样类型' => $this->input->post('get_type'),
				'规格' => $this->input->post('specification'),
				'数量' => $this->input->post('num'),
				'生产厂家' => $this->input->post('manufacturers'),
				'取样人' => $this->input->post('get_guy'),
				'进场日期' => $this->input->post('enter_date'),
				'取样日期' => $this->input->post('get_date'),
				'合格证编号' => $this->input->post('qualified_num'),
				'经销商单位' => $this->input->post('agency'),
				'备注' => $this->input->post('remark'),
				'检测单位' => $this->input->post('test_unit')
			);
		$this->load->model('root/pj_send_model','send_add');
		$this->send_add->add($data);
		success('pj_send/index/'.$pj_timestamp,"新增成功!");

	}

	/**
	 * 送检详情
	 */
	public function check(){
		$passval['send_id'] = $this->uri->segment(3);
		$passval['pj_timestamp'] = $this->uri->segment(4);
		$this->load->model('root/pj_send_model','send_detail');
		$passval['send_data_st'] = $this->send_detail->detail_st($passval['send_id']);
		$passval['send_data_nd'] = $this->send_detail->detail_nd($passval['send_id']);
//		$this->output->enable_profiler(TRUE);
		$this->load->view('root/pj_sendDetail.html',$passval);
	}

	/**
	 * 送检合格
	 */
	public function qualified(){
		$pj_timestamp = $this->input->post('pj_timestamp');
		$data['self_id'] = $this->input->post('self_id');
		$data['testNum'] =  $this->input->post('testNum');
		$data['pj_status'] = $this->input->post('pj_status');
		$this->load->model('root/Pj_send_model','qualified');
		$this->qualified->qualified($data);
	}

	/**
	 * 文件上传
	 */
	public function do_upload(){
		$imgs = $_FILES;
		$data['self_id'] = $this->input->post('self_id');
		$data['testNum'] =  $this->input->post('testNum');
		$data['explain'] =  $this->input->post('explain');
		$pj_timestamp = $this->input->post('pj_timestamp');
		//上传配置  
		$config['upload_path'] = './jmadmin/upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['file_name']  = time();
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
            $data['upload_data']=$this->upload->data();  //文件的一些信息
	        $img=$data['upload_data']['file_name'];  //取得文件名
	        $data['filename'] = "~*^*~".$img; //保存文件名
	        // foreach ($data['upload_data'] as $item => $value){ 
	        //      echo $item . ":" . $value . "<br>";    
	        // }
	        $this->load->model('root/Pj_send_model','fail');
	        $this->fail->fail($data);
	        success('Pj_send/index/'.$pj_timestamp,"操作成功！");
        }
	}

}
?>