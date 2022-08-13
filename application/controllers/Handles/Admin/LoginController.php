<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function login()
	{
		$user_name = $this->input->post('user_name');
		$password = md5($this->input->post('password'));
		$admin=$this->Generals_model->get_one_where('tbl_admin',['name'=>$user_name,'password'=>$password]);
		if(!empty($admin)){
			$this->session->set_userdata(['admin' => $admin]);
			$output['result']=true;
		}
		else{
			$output['result']=false;
		}
		// var_dump($admin);
		echo json_encode($output);
	}
}
