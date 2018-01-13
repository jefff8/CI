<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Household extends MY_Controller{
		public function index(){
			$household_timestamp = $this->uri->segment(3);
		}
	}
?>