<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
<<<<<<< HEAD
		$this->load->model(['Generals_model', 'Home/User_model', 'Home/Apply_model', 'Home/Save_news_model', 'Home/News_model', 'Home/Save_users_model','Home/Worker_point_model']);
		$this->load->helper('function');
		$this->load->library('session');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if (!isset($_SESSION['user'])) { {
				redirect('/login');
			}
		} else {
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
=======
		$this->load->model(['Generals_model','Home/User_model']);
		$this->load->helper('function');
		$this->load->library('session');
		$this->load->helper('url');
		if(!isset($_SESSION['user'])){
			{
				redirect('/login');
			}
		}
		else{
			if($_SESSION['user']['user_type']==0){
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$user['user_type']=0;
			}
			else{
				$user=$this->Generals_model->get_one_where('tbl_companys',['id'=>$_SESSION['user']['id']]);
				$user['user_type']=1;
			}
			$this->session->unset_userdata('user');
			$this->session->set_userdata(['user' => $user]);
			if($_SESSION['user']['active']==0 && $_SESSION['user']['user_type']==0){
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$_SESSION['user_email_verify_token']=$user['email_verify_token'];
				redirect('/register/employee/verify');
			}
			elseif($_SESSION['user']['active']==0 && $_SESSION['user']['user_type']==1){
				$user=$this->Generals_model->get_one_where('tbl_companys',['id'=>$_SESSION['user']['id']]);
				$_SESSION['company_email_verify_token']=$user['email_verify_token'];
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				redirect('/register/company/verify');
			}
		}
	}
	public function general()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
<<<<<<< HEAD
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$list_save = $this->Save_news_model->get_list_save_new($user['id']);
				$list_save_limit = $this->Save_news_model->get_list_save_new_limit($user['id'],6,0);
				$list_apply_limit = $this->Apply_model->get_list_apply_limit($user['id'],6,0);
				$list_apply = $this->Apply_model->get_list_apply($user['id']);
				$list_accept = $this->Apply_model->get_list_accept($user['id']);
				for ($i = 0; $i < count($list_save_limit); $i++) {
					$list_save_limit[$i]['full_address'] = '';
					if ($list_save_limit[$i]['address'] != '') {
						$list_save_limit[$i]['full_address'] .= $list_save_limit[$i]['address'] . ', ';
					}
					$list_save_limit[$i]['full_address'] .= $this->Generals_model->get_city_name($list_save_limit[$i]['district_id']) . ', ';
					$list_save_limit[$i]['full_address'] .= $this->Generals_model->get_city_name($list_save_limit[$i]['city_id']);
				}
				for ($i = 0; $i < count($list_apply_limit); $i++) {
					$list_apply_limit[$i]['full_address'] = '';
					if ($list_apply_limit[$i]['address'] != '') {
						$list_apply_limit[$i]['full_address'] .= $list_apply_limit[$i]['address'] . ', ';
					}
					$list_apply_limit[$i]['full_address'] .= $this->Generals_model->get_city_name($list_apply_limit[$i]['district_id']) . ', ';
					$list_apply_limit[$i]['full_address'] .= $this->Generals_model->get_city_name($list_apply_limit[$i]['city_id']);
=======
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$list_save=$this->User_model->get_list_save_new($user['id']);
				$list_apply_waiting=$this->User_model->get_list_apply_waiting($user['id']);
				$list_apply=$this->User_model->get_list_apply($user['id']);
				$list_accept=$this->User_model->get_list_accept($user['id']);
				for($i=0;$i<count($list_save);$i++){
					$list_save[$i]['full_address']='';
					if($list_save[$i]['address']!=''){
						$list_save[$i]['full_address'].=$list_save[$i]['address'].', ';
					}
					$list_save[$i]['full_address'].=$this->Generals_model->get_city_name($list_save[$i]['district_id']).', ';
					$list_save[$i]['full_address'].=$this->Generals_model->get_city_name($list_save[$i]['city_id']);
				}
				for($i=0;$i<count($list_apply_waiting);$i++){
					$list_apply_waiting[$i]['full_address']='';
					if($list_apply_waiting[$i]['address']!=''){
						$list_apply_waiting[$i]['full_address'].=$list_apply_waiting[$i]['address'].', ';
					}
					$list_apply_waiting[$i]['full_address'].=$this->Generals_model->get_city_name($list_apply_waiting[$i]['district_id']).', ';
					$list_apply_waiting[$i]['full_address'].=$this->Generals_model->get_city_name($list_apply_waiting[$i]['city_id']);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				}
				// var_dump($list_save); 
				// die();
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/general',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css','/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js'],
					'user' => $user,
					'list_save' => $list_save,
					'list_save_limit'=>$list_save_limit,
					'list_apply_limit' => $list_apply_limit,
					'list_apply' => $list_apply,
					'list_accept' => $list_accept
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$list_news = $this->News_model->get_list_manager_limit($_SESSION['user']['id'],15,0);
				$list_user_apply = $this->Apply_model->get_list_user_apply($_SESSION['user']['id']);
				$list_user_accept = $this->Apply_model->get_list_user_accept($_SESSION['user']['id']);
				$list_user_saved = $this->Save_users_model->get_list_save_user($_SESSION['user']['id']);
				$count_user_saved = count($list_user_saved);
				$count_user_apply = count($list_user_apply);
				$count_user_accept = count($list_user_accept);
				for ($i = 0; $i < count($list_news); $i++) {
					$list_news[$i]['full_address'] = '';
					if ($list_news[$i]['address'] != '') {
						$list_news[$i]['full_address'] .= $list_news[$i]['address'] . ', ';
					}
					$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['district_id']) . ', ';
					$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['city_id']);
				}

=======
					'style' => ['/css/select2.min.css','/css/account_manager/employee_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user,
					'list_save'=>$list_save,
					'list_apply_waiting'=>$list_apply_waiting,
					'list_apply'=>$list_apply,
					'list_accept'=>$list_accept
				];
				$this->load->view('home/index', $data);
			} else {
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/general',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css','/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/company_account_manager.js'],
					'company' => $company,
					'list_news' => $list_news,
					'count_user_apply' => $count_user_apply,
					'count_user_accept' => $count_user_accept,
					'count_user_saved' => $count_user_saved
				];
				$this->load->view('home/index', $data);
			}
		} else {
=======
					'style' => ['/css/select2.min.css','/css/account_manager/company_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else{
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$data = [

				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/login',
				'style' => ['/css/user/user.css'],
				'js' => [''],
			];
			$this->load->view('home/index', $data);
		}
	}
	public function list_apply()
	{
<<<<<<< HEAD
		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 10;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$list_apply = $this->Apply_model->get_list_apply($user['id']);
				$total_page = ceil(count($list_apply) / $row_per_page);
				$list_apply = $this->Apply_model->get_list_apply_limit($user['id'], $row_per_page, $row_per_page * ($page - 1));
				for ($i = 0; $i < count($list_apply); $i++) {
					$list_apply[$i]['full_address'] = '';
					if ($list_apply[$i]['address'] != '') {
						$list_apply[$i]['full_address'] .= $list_apply[$i]['address'] . ', ';
					}
					$list_apply[$i]['full_address'] .= $this->Generals_model->get_city_name($list_apply[$i]['district_id']) . ', ';
					$list_apply[$i]['full_address'] .= $this->Generals_model->get_city_name($list_apply[$i]['city_id']);
=======
		if(!$this->input->get('page')){
			$page=1;
		}
		else $page=$this->input->get('page');
		$row_per_page=10;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$list_apply=$this->User_model->get_list_apply($user['id']);
				$total_page=ceil(count($list_apply)/$row_per_page);
				$list_apply=$this->User_model->get_list_apply_limit($user['id'],$row_per_page,$row_per_page*($page-1));
				for($i=0;$i<count($list_apply);$i++){
					$list_apply[$i]['full_address']='';
					if($list_apply[$i]['address']!=''){
						$list_apply[$i]['full_address'].=$list_apply[$i]['address'].', ';
					}
					$list_apply[$i]['full_address'].=$this->Generals_model->get_city_name($list_apply[$i]['district_id']).', ';
					$list_apply[$i]['full_address'].=$this->Generals_model->get_city_name($list_apply[$i]['city_id']);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				}
				// var_dump($list_save);
				// die();
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/list_apply',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css','/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js'],
					'user' => $user,
					'list_apply' => $list_apply,
					'page' => $page,
					'total_page' => $total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$list_apply_all = $this->Apply_model->get_list_user_apply($company['id']);
				$total_page = ceil(count($list_apply_all) / $row_per_page);
				$list_apply = $this->Apply_model->get_list_user_apply_limit($company['id'], $row_per_page, $row_per_page * ($page - 1));
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/list_apply',
					'style' => ['/css/select2.min.css', '/css/header_after_login.css','/css/account_manager/company_account_manager.css' ],
					'js' => ['/scripts/select2.min.js','/scripts/home/account/company_account_manager.js'],
					'company'=>$company,
					'list_apply'=>$list_apply,
					'page' => $page,
					'total_page' => $total_page
				];
				$this->load->view('home/index', $data);
			}
		} else {
=======
					'style' => ['/css/select2.min.css','/css/account_manager/employee_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user,
					'list_apply'=>$list_apply,
					'page'=>$page,
					'total_page'=>$total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/company_account_manager',
					'style' => ['/css/account_manager/company_account_manager.css', '/css/header_after_login.css','/css/select2.min.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else{
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$data = [

				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/login',
				'style' => ['/css/user/user.css'],
				'js' => [''],
			];
			$this->load->view('home/index', $data);
		}
	}
	public function list_save()
	{
<<<<<<< HEAD
		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 8;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$list_save = $this->Save_news_model->get_list_save_new($user['id']);
				$total_page = ceil(count($list_save) / $row_per_page);
				$list_save = $this->Save_news_model->get_list_save_new_limit($user['id'], $row_per_page, $row_per_page * ($page - 1));
				for ($i = 0; $i < count($list_save); $i++) {
					$list_save[$i]['full_address'] = '';
					if ($list_save[$i]['address'] != '') {
						$list_save[$i]['full_address'] .= $list_save[$i]['address'] . ', ';
					}
					$list_save[$i]['full_address'] .= $this->Generals_model->get_city_name($list_save[$i]['district_id']) . ', ';
					$list_save[$i]['full_address'] .= $this->Generals_model->get_city_name($list_save[$i]['city_id']);
=======
		if(!$this->input->get('page')){
			$page=1;
		}
		else $page=$this->input->get('page');
		$row_per_page=6;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$list_save=$this->User_model->get_list_save_new($user['id']);
				$total_page=ceil(count($list_save)/$row_per_page);
				$list_save=$this->User_model->get_list_save_new_limit($user['id'],$row_per_page,$row_per_page*($page-1));
				for($i=0;$i<count($list_save);$i++){
					$list_save[$i]['full_address']='';
					if($list_save[$i]['address']!=''){
						$list_save[$i]['full_address'].=$list_save[$i]['address'].', ';
					}
					$list_save[$i]['full_address'].=$this->Generals_model->get_city_name($list_save[$i]['district_id']).', ';
					$list_save[$i]['full_address'].=$this->Generals_model->get_city_name($list_save[$i]['city_id']);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				}
				// var_dump($list_save);
				// die();
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/list_save',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js'],
					'user' => $user,
					'list_save' => $list_save,
					'page' => $page,
					'total_page' => $total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$list_save_all=$this->Save_users_model->get_list_save_user($company['id']);
				$total_page = ceil(count($list_save_all) / $row_per_page);
				$list_save=$this->Save_users_model->get_list_save_user_limit($company['id'],$row_per_page, $row_per_page * ($page - 1));
				$list_job_style=$this->Generals_model->get_list('tbl_job_style');
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/list_save',
					'style' => ['/css/select2.min.css','/css/header_after_login.css','/css/account_manager/company_account_manager.css'],
					'js' => ['/scripts/select2.min.js','/scripts/home/account/company_account_manager.js'],
					'company'=>$company,
					'list_save'=>$list_save,
					'list_job_style'=>$list_job_style,
					'page' => $page,
					'total_page' => $total_page
				];
				// var_dump($list_save);
				$this->load->view('home/index', $data);
			}
		} else echo "Chưa đăng nhập!";
	}
	public function list_accept()
	{
		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 10;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$list_accept = $this->Apply_model->get_list_accept($user['id']);
				$total_page = ceil(count($list_accept) / $row_per_page);
				$list_accept = $this->Apply_model->get_list_accept_limit($user['id'], $row_per_page, $row_per_page * ($page - 1));
				for ($i = 0; $i < count($list_accept); $i++) {
					$list_accept[$i]['full_address'] = '';
					if ($list_accept[$i]['address'] != '') {
						$list_accept[$i]['full_address'] .= $list_accept[$i]['address'] . ', ';
					}
					$list_accept[$i]['full_address'] .= $this->Generals_model->get_city_name($list_accept[$i]['district_id']) . ', ';
					$list_accept[$i]['full_address'] .= $this->Generals_model->get_city_name($list_accept[$i]['city_id']);
=======
					'style' => ['/css/select2.min.css','/css/account_manager/employee_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user,
					'list_save'=>$list_save,
					'page'=>$page,
					'total_page'=>$total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/company_account_manager',
					'style' => ['/css/select2.min.css','/css/account_manager/company_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else echo "Chưa đăng nhập!";
	}
	public function list_accept()
	{
		if(!$this->input->get('page')){
			$page=1;
		}
		else $page=$this->input->get('page');
		$row_per_page=10;
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$list_accept=$this->User_model->get_list_accept($user['id']);
				$total_page=ceil(count($list_accept)/$row_per_page);
				$list_accept=$this->User_model->get_list_accept_limit($user['id'],$row_per_page,$row_per_page*($page-1));
				for($i=0;$i<count($list_accept);$i++){
					$list_accept[$i]['full_address']='';
					if($list_accept[$i]['address']!=''){
						$list_accept[$i]['full_address'].=$list_accept[$i]['address'].', ';
					}
					$list_accept[$i]['full_address'].=$this->Generals_model->get_city_name($list_accept[$i]['district_id']).', ';
					$list_accept[$i]['full_address'].=$this->Generals_model->get_city_name($list_accept[$i]['city_id']);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				}
				// var_dump($list_save);
				// die();
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/list_accept',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js'],
					'user' => $user,
					'list_accept' => $list_accept,
					'page' => $page,
					'total_page' => $total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$list_accept_all = $this->Apply_model->get_list_user_accept($company['id']);
				$total_page = ceil(count($list_accept_all) / $row_per_page);
				$list_accept = $this->Apply_model->get_list_user_accept_limit($company['id'], $row_per_page, $row_per_page * ($page - 1));
				for ($i = 0; $i < count($list_accept); $i++) {
					$list_accept[$i]['full_address'] = '';
					if ($list_accept[$i]['address'] != '') {
						$list_accept[$i]['full_address'] .= $list_accept[$i]['address'] . ', ';
					}
					$list_accept[$i]['full_address'] .= $this->Generals_model->get_city_name($list_accept[$i]['district_id']) . ', ';
					$list_accept[$i]['full_address'] .= $this->Generals_model->get_city_name($list_accept[$i]['city_id']);
				}
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/list_accept',
					'style' => ['/css/select2.min.css', '/css/header_after_login.css','/css/account_manager/company_account_manager.css'],
					'js' => ['/scripts/select2.min.js','/scripts/home/account/company_account_manager.js'],
					'company'=>$company,
					'list_accept'=>$list_accept,
					'page' => $page,
					'total_page' => $total_page
				];
				// var_dump($list_accept);
				$this->load->view('home/index', $data);
			}
		} else echo "Chưa đăng nhập!";
=======
					'style' => ['/css/account_manager/employee_account_manager.css', '/css/header_after_login.css','/css/select2.min.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user,
					'list_accept'=>$list_accept,
					'page'=>$page,
					'total_page'=>$total_page
				];
				$this->load->view('home/index', $data);
			} else {
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/company_account_manager',
					'style' => ['/css/account_manager/company_account_manager.css', '/css/header_after_login.css','/css/select2.min.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else echo "Chưa đăng nhập!";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
	public function profile()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
<<<<<<< HEAD
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
				$user_schedule = $this->Generals_model->get_one_where('user_calendar', ['user_id' => $user['id']]);
				$list_city = $this->Generals_model->get_list_city();
				$list_district = $this->Generals_model->get_list_district($user['city_id']);
				$list_work_type = $this->Generals_model->get_list('tbl_work_type');
				$list_job_style = $this->Generals_model->get_list('tbl_job_style');
=======
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
				$user_schedule=$this->Generals_model->get_one_where('user_calendar',['user_id'=>$user['id']]);
				$list_city=$this->Generals_model->get_list_city();
				$list_district=$this->Generals_model->get_list_district($user['city_id']);
				$list_work_type=$this->Generals_model->get_list('tbl_work_type');
				$list_job_style=$this->Generals_model->get_list('tbl_job_style');
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				// var_dump($list_save);
				// die();
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/profile',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => [ '/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js', '/scripts/home/account/user_profile.js','/scripts/home/validate_function.js'],
					'user' => $user,
					'user_schedule' => $user_schedule,
					'list_city' => $list_city,
					'list_district' => $list_district,
					'list_work_type' => $list_work_type,
					'list_job_style' => $list_job_style
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$list_city = $this->Generals_model->get_list_city();
				$list_district = $this->Generals_model->get_list_district($company['city_id']);
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/profile',
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/company_account_manager.js','/scripts/home/validate_function.js'],
					'company'=>$company,
					'list_city' => $list_city,
					'list_district' => $list_district,
				];
				$this->load->view('home/index', $data);
			}
		} else echo "Chưa đăng nhập!";
=======
					'style' => ['/css/select2.min.css','/css/account_manager/employee_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user,
					'user_schedule'=>$user_schedule,
					'list_city'=>$list_city,
					'list_district'=>$list_district,
					'list_work_type'=>$list_work_type,
					'list_job_style'=>$list_job_style
				];
				$this->load->view('home/index', $data);
			} else {
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/company_account_manager',
					'style' => ['/css/select2.min.css','/css/account_manager/company_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else echo "Chưa đăng nhập!";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
	public function change_password()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
<<<<<<< HEAD
				$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
=======
				$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/employee_account_manager/change_password',
<<<<<<< HEAD
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/employee_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/employee_account_manager.js', '/scripts/home/account/change_password.js','/scripts/home/validate_function.js'],
					'user' => $user
				];
				$this->load->view('home/index', $data);
			} else {
				$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/change_password',
					'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
					'js' => ['/scripts/select2.min.js', '/scripts/home/account/company_account_manager.js', '/scripts/home/account/change_password.js','/scripts/home/validate_function.js'],
					'company'=>$company,
				];
				$this->load->view('home/index', $data);
			}
		} else echo "Chưa đăng nhập!";
	}

	public function new_post()
	{
		if ($_SESSION['user']['user_type'] == 1) {
			$list_city = $this->Generals_model->get_list_city();
			$list_work_type = $this->Generals_model->get_list('tbl_work_type');
			$list_job_style = $this->Generals_model->get_list('tbl_job_style');
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);

			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/company_account_manager/new_post',
				'style' => ['/css/select2.min.css', '/css/rSlider.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
				'js' => [ '/scripts/select2.min.js', '/scripts/rSlider.min.js', '/scripts/home/account/company_account_manager.js', '/scripts/home/account/new_post.js','/scripts/home/validate_function.js'],
				'company' => $company,
				'list_city' => $list_city,
				'list_work_type' => $list_work_type,
				'list_job_style' => $list_job_style
			];
			$this->load->view('home/index', $data);
		}
	}

	public function list_post()
	{
		if($this->input->get('page')&&$this->input->get('page')>0){
			$page=$this->input->get('page');
		}
		else{
			$page=1;
		}
		$row_per_page=15;
		if ($_SESSION['user']['user_type'] == 1) {
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
			$list_news_all = $this->News_model->get_list_manager($_SESSION['user']['id']);
			
			$total_page=ceil(count($list_news_all)/$row_per_page);
			$list_news = $this->News_model->get_list_manager_limit($_SESSION['user']['id'],$row_per_page,$row_per_page*($page-1));

			for ($i = 0; $i < count($list_news); $i++) {
				$list_news[$i]['full_address'] = '';
				if ($list_news[$i]['address'] != '') {
					$list_news[$i]['full_address'] .= $list_news[$i]['address'] . ', ';
				}
				$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['district_id']) . ', ';
				$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['city_id']);
			}

			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/company_account_manager/list_post',
				'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
				'js' => ['/scripts/select2.min.js', '/scripts/home/account/company_account_manager.js'],
				'company' => $company,
				'list_news' => $list_news,
				'page'=>$page,
				'total_page'=>$total_page
			];
			$this->load->view('home/index', $data);
		}
	}

	public function edit_post()
	{
		if ($_SESSION['user']['user_type'] == 1) {
			$list_city = $this->Generals_model->get_list_city();
			$list_work_type = $this->Generals_model->get_list('tbl_work_type');
			$list_job_style = $this->Generals_model->get_list('tbl_job_style');
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
			$post_id=$this->input->get('id');
			$post= $this->Generals_model->get_one_where('tbl_news', ['id' => $post_id]);
			$list_district = $this->Generals_model->get_list_district($post['city_id']);
			$work_schedule = $this->Generals_model->get_one_where('new_calendar', ['new_id' => $post_id]);
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/company_account_manager/edit_post',
				'style' => ['/css/select2.min.css', '/css/rSlider.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
				'js' => [ '/scripts/select2.min.js', '/scripts/rSlider.min.js', '/scripts/home/account/company_account_manager.js', '/scripts/home/account/edit_post.js','/scripts/home/validate_function.js'],
				'company' => $company,
				'post' => $post,
				'work_schedule'=>$work_schedule,
				'list_city' => $list_city,
				'list_district' => $list_district,
				'list_work_type' => $list_work_type,
				'list_job_style' => $list_job_style
			];
			// var_dump($work_schedule);
			$this->load->view('home/index', $data);
		}
	}

	public function list_worker_point(){
		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 10;

		$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
		$list_worker_point_all=$this->Worker_point_model->get_list_user($company['id']);
		$total_page=ceil(count($list_worker_point_all)/$row_per_page);
		$list_worker_point=$this->Worker_point_model->get_list_user_limit($company['id'],$row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_worker_point); $i++) {
			$list_worker_point[$i]['full_address'] = '';
			if ($list_worker_point[$i]['address'] != '') {
				$list_worker_point[$i]['full_address'] .= $list_worker_point[$i]['address'] . ', ';
			}
			$list_worker_point[$i]['full_address'] .= $this->Generals_model->get_city_name($list_worker_point[$i]['district_id']) . ', ';
			$list_worker_point[$i]['full_address'] .= $this->Generals_model->get_city_name($list_worker_point[$i]['city_id']);
		}
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'page_name' => 'home/company_account_manager/list_worker_point',
			'style' => ['/css/select2.min.css', '/css/header_after_login.css', '/css/account_manager/company_account_manager.css'],
			'js' => ['/scripts/select2.min.js', '/scripts/home/account/company_account_manager.js'],
			'company' => $company,
			'list_worker_point' => $list_worker_point,
			'page'=>$page,
			'total_page'=>$total_page
		];
		$this->load->view('home/index', $data);
=======
					'style' => ['/css/select2.min.css','/css/account_manager/employee_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/employee_account_manager.js','/scripts/select2.min.js'],
					'user'=>$user
				];
				$this->load->view('home/index', $data);
			} else {
				$data = [
					'header' => 'header',
					'footer' => 'footer',
					'page_name' => 'home/company_account_manager/company_account_manager',
					'style' => ['/css/select2.min.css','/css/account_manager/company_account_manager.css', '/css/header_after_login.css'],
					'js' => ['/scripts/home/account/company_account_manager.js','/scripts/select2.min.js'],
				];
				$this->load->view('home/index', $data);
			}
		}
		else echo "Chưa đăng nhập!";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
}
