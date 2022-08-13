<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper(['url','function']);
	}
	public function index()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/register',
			'style' => ['/css/user/user.css'],
			'js' => [''],
		];
		$this->load->view('home/index', $data);
	}

	public function register_employee(){
		$list_city=$this->Generals_model->get_list_city();
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
<<<<<<< HEAD
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/register_employee',
<<<<<<< HEAD
			'style' => ['/css/user/user.css','/css/user/register_employee.css'],
			'js' => ['/scripts/home/user/register_employee.js','/scripts/home/validate_function.js'],
			'list_city'=>$list_city,
			'list_work_type'=>$list_work_type,
			'list_job_style'=>$list_job_style
=======
			'style' => ['/css/select2.min.css','/css/user/user.css','/css/user/register_employee.css'],
			'js' => ['/scripts/select2.min.js','/scripts/home/user/register_employee.js','/scripts/home/function.js'],
			'list_city'=>$list_city,
			'list_work_type'=>$list_work_type
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		];
		$this->load->view('home/index', $data);
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
	public function register_employee_success(){
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/register_company_success',
			'style' => ['/css/user/user.css','/css/user/register_success.css'],
			'js' => [],
		];
		$this->load->view('home/index', $data);
	}

	public function forgot_password_employee()
	{
		$account_type='người giúp việc';
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/forgot_password',
			'style' => ['/css/user/user.css', '/css/user/forgot_password.css'],
			'js' => ['/scripts/home/user/forgot_password_employee.js'],
			'account_type'=>$account_type
		];
		$this->load->view('home/index', $data);
	}
	public function forgot_password_send()
	{
		$link='/forgot-password-employee';
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/forgot_password_send',
			'style' => ['/css/user/user.css', '/css/user/forgot_password_send.css'],
			'js' => ['/scripts/home/user/forgot_password_employee.js'],
			'link'=>$link,
		];
		$this->load->view('home/index', $data);
	}
	public function reset_password()
	{
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/reset_password',
			'style' => ['/css/user/user.css', '/css/user/reset_password.css'],
			'js' => ['/scripts/home/user/reset_password_employee.js'],
		];
		$this->load->view('home/index', $data);
	}

	public function reset_password_success()
	{
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/reset_password_success',
			'style' => ['/css/user/user.css', '/css/user/reset_password_success.css'],
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
