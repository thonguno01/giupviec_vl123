<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url','function']);
		$this->load->model(['Generals_model', 'Home/User_model', 'Home/City_model', 'Home/Save_users_model', 'Home/Worker_point_model']);
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$user['user_type'] = 0;
			} else {
				$user = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$user['user_type'] = 1;
			}
			$this->session->unset_userdata('user');
			$this->session->set_userdata(['user' => $user]);
			if ($_SESSION['user']['active'] == 0 && $_SESSION['user']['user_type'] == 0) {
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$_SESSION['user_email_verify_token'] = $user['email_verify_token'];
				redirect('/register/employee/verify');
			} elseif ($_SESSION['user']['active'] == 0 && $_SESSION['user']['user_type'] == 1) {
				$user = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$_SESSION['company_email_verify_token'] = $user['email_verify_token'];
				redirect('/register/company/verify');
			}
		}
	}
	public function index()
	{
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$list_city_worker = $this->City_model->get_city_top_employee();
		$list_district_worker = $this->City_model->get_district_top_employee();
		$list_user_save = '';
		$list_employee_rate_full = $this->User_model->get_list_rate();
		$list_employee_exp_full = $this->User_model->get_list_exp();


		$row_per_page = 10;
		$total_rate_page = ceil(count($list_employee_rate_full) / $row_per_page);
		if (!$this->input->get('rate_page')) {
			$rate_page = 1;
		} else {
			$rate_page = $this->input->get('rate_page');
		}

		$total_exp_page = ceil(count($list_employee_exp_full) / $row_per_page);
		if (!$this->input->get('exp_page')) {
			$exp_page = 1;
		} else {
			$exp_page = $this->input->get('exp_page');
		}

		$list_employee_rate = $this->User_model->get_list_rate_limit($row_per_page, $row_per_page * ($rate_page - 1));
		$list_employee_exp = $this->User_model->get_list_exp_limit($row_per_page, $row_per_page * ($exp_page - 1));


		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$list_user_save = $this->Save_users_model->get_list_saved($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_user_save); $i++) {
				$list_user_save[$i] = $list_user_save[$i]['user_id'];
			}
		}
		// ktra trạng thái đã xem, đã mở
		$list_worker_point=[];
		$list_worker_view=[];
		$list_worker_point_id = [];
		$list_worker_view_id = [];
		if (isset($_SESSION['user'])&&$_SESSION['user']['user_type']==1) {
			$list_worker_point = $this->Worker_point_model->get_list_user($_SESSION['user']['id']);
			$list_worker_view = $this->Worker_point_model->get_list_user_view($_SESSION['user']['id']);
		}
		if (!empty($list_worker_point)) {
			foreach ($list_worker_point as $worker_point) {
				$list_worker_point_id[]=$worker_point['user_id'];
			}
		}
		if (!empty($list_worker_view)) {
			foreach ($list_worker_view as $worker_view) {
				$list_worker_view_id[]=$worker_view['user_id'];
			}
		}
		for($i=0;$i<count($list_employee_rate);$i++){
			$list_employee_rate[$i]['worker_point_status']=0;
			$list_employee_rate[$i]['worker_view_status']=0;
			if(in_array($list_employee_rate[$i]['id'],$list_worker_point_id)){
				$list_employee_rate[$i]['worker_point_status']=1;
			}
			if(in_array($list_employee_rate[$i]['id'],$list_worker_view_id)){
				$list_employee_rate[$i]['worker_view_status']=1;
			}
		}
		for($i=0;$i<count($list_employee_exp);$i++){
			$list_employee_exp[$i]['worker_point_status']=0;
			$list_employee_exp[$i]['worker_view_status']=0;
			if(in_array($list_employee_exp[$i]['id'],$list_worker_point_id)){
				$list_employee_exp[$i]['worker_point_status']=1;
			}
			if(in_array($list_employee_exp[$i]['id'],$list_worker_view_id)){
				$list_employee_exp[$i]['worker_view_status']=1;
			}
		}
		if (isset($_SESSION['user'])) {
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/home_page',
				'style' => ['/css/slick.css', '/css/header_after_login.css', '/css/home.css'],
				'js' => ['/scripts/slick.js', '/scripts/home/home.js'],
				'list_job_style' => $list_job_style,
				'list_employee_rate' => $list_employee_rate,
				'list_employee_exp' => $list_employee_exp,
				'list_city_worker' => $list_city_worker,
				'list_district_worker' => $list_district_worker,
				'list_user_save' => $list_user_save,
				'exp_page' => $exp_page,
				'total_exp_page' => $total_exp_page,
				'rate_page' => $rate_page,
				'total_rate_page' => $total_rate_page,
				'preload'=>array('/images/banner_1.png','/images/lazy_load.gif','/images/bg_main_content.png','/images/banner_2_bg.png','/images/banner_3_bg.png')

			];
		} else {
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/home_page',
				'style' => ['/css/slick.css', '/css/header_before_login.css', '/css/home.css'],
				'js' => ['/scripts/slick.js','/scripts/home/home.js'],
				'list_job_style' => $list_job_style,
				'list_employee_rate' => $list_employee_rate,
				'list_employee_exp' => $list_employee_exp,
				'list_city_worker' => $list_city_worker,
				'list_district_worker' => $list_district_worker,
				'list_user_save' => $list_user_save,
				'exp_page' => $exp_page,
				'total_exp_page' => $total_exp_page,
				'rate_page' => $rate_page,
				'total_rate_page' => $total_rate_page,
				'preload'=>array('/images/banner_1.png','/images/lazy_load.gif','/images/bg_main_content.png','/images/banner_2_bg.png','/images/banner_3_bg.png')
			];
		}
		$this->load->view('home/index', $data);
	}
}
