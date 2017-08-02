<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	
	/**
	 * 登陆界面
	 * @return [type] [description]
	 */
	public function index(){
		//加载表单
		$this->load->helpers('form');
		$this->load->view('root/login.html');
		// redirect('login/test');   
		// echo site_url();
		// echo '<hr/>';
		// echo base_url();
	}


	/**
	 * 登陆验证
	 * @return [type] [description]
	 */
	public function verify(){
		//载入验证类
		$this->load->library('form_validation');
		//设置规则
		$this->form_validation->set_rules('username','用户名','required|min_length[5]');
		//执行验证
		$status = $this->form_validation->run();
		if($status){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('root/login_model','login');
			$user_data = $this->login->check($username);
			// p($username_data);
			if(!$user_data || $user_data[0]['密码']!=$password){
				error("账号不存在或密码错误！");
			}else{
				//储存用户session值
				$sessionData = array(
					'username' => $username,
					'userid' => $user_data[0]['id'],
					'logintime' => time()
					);
				//变量$sessionData设置到userdata
				$this->session->set_userdata($sessionData); 
				$this->load->model('root/pj_all_model','pj_all');
				$data['pj_all'] = $this->pj_all->index();
				$this->load->view('root/pj_all.html',$data);
			}
		}else{
			$this->load->view('root/login.html');
		}
	}

	/**
	 * 用户注销
	 */
	public function login_out(){
		//消除session值
		$this->session->sess_destroy();
		success('login/index','注销成功~');
	}

}
?>