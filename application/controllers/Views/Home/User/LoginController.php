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
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		$data = [

			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/login',
			'style' => ['/css/user/user.css'],
			'js' => [''],
		];
		$this->load->view('home/index', $data);
	}


	public function login_employee()
	{
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/login_employee',
			'style' => ['/css/user/user.css', '/css/user/login_employee.css'],
			'js' => ['/scripts/home/user/login_employee.js'],
		];
		$this->load->view('home/index', $data);
	}


	public function login_company()
	{
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/user/login_company',
			'style' => ['/css/user/user.css', '/css/user/login_company.css'],
			'js' => ['/scripts/home/user/login_company.js'],
		];
		$this->load->view('home/index', $data);
	}
}
