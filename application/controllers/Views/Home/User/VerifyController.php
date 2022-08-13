<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerifyController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('function');
	}
	public function verify_employee()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/verify',
			'style' => ['/css/user/user.css','/css/user/verify_account.css'],
			'js' => ['/scripts/home/user/verify_employee.js','/scripts/home/function.js'],
		];
		$this->load->view('home/index', $data);
	}

	public function verify_company()
	{
		$data = [
			'header'=>'header',
			'footer'=>'footer',
			'page_name' => 'home/user/verify',
			'style' => ['/css/user/user.css','/css/user/verify_account.css'],
			'js' => ['/scripts/home/user/verify_company.js','/scripts/home/function.js'],
		];
		$this->load->view('home/index', $data);
	}
}
