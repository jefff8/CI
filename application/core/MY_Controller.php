<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
/**
 * 验证是否登陆(限制访问)
 */
class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//接收session值
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('userid');
		if(!$username||!$userid){
			redirect('login/index');
		}
	}
}
?>