<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper(['url','function']);
	}
	

	public function register_company(){
		$list_city=$this->Generals_model->get_list_city();
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/register_company',
			'style' => ['/css/user/user.css','/css/user/register_company.css'],
			'js' => ['/scripts/home/user/register_company.js','/scripts/home/validate_function.js'],
			'list_city'=>$list_city
		];
		$this->load->view('home/index', $data);
	}
	public function register_company_success(){
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/register_company_success',
			'style' => ['/css/user/user.css','/css/user/register_success.css'],
			'js' => [],
		];
		$this->load->view('home/index', $data);
	}
	public function forgot_password_company()
	{
		$account_type="người tuyển dụng";
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/forgot_password',
			'style' => ['/css/user/user.css','/css/user/forgot_password.css'],
<<<<<<< HEAD
			'js' => ['/scripts/home/user/forgot_password_company.js','/scripts/home/validate_function.js'],
=======
			'js' => ['/scripts/home/user/forgot_password_company.js'],
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			'account_type'=>$account_type
		];
		$this->load->view('home/index', $data);
	}
	public function forgot_password_send()
	{
		$link='/forgot-password-company';
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/forgot_password_send',
			'style' => ['/css/user/user.css','/css/user/forgot_password_send.css'],
			'js' => ['/scripts/home/user/forgot_password_company.js'],
			'link'=>$link
		];
		$this->load->view('home/index', $data);
	}
	public function reset_password()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/reset_password',
			'style' => ['/css/user/user.css','/css/user/reset_password.css'],
<<<<<<< HEAD
			'js' => ['/scripts/home/user/reset_password_company.js','/scripts/home/validate_function.js'],
=======
			'js' => ['/scripts/home/user/reset_password_company.js'],
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		];
		$this->load->view('home/index', $data);
	}

	public function reset_password_success()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/reset_password_success',
			'style' => ['/css/user/user.css','/css/user/reset_password_success.css'],
			'js' => [],
		];
		$this->load->view('home/index', $data);
	}
	public function error()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/error',
			'style' => ['/css/user/user.css','/css/user/error.css'],
			'js' => [],
		];
		$this->load->view('home/index', $data);
	}
}
