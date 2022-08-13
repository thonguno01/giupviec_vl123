<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'function'));
		$this->load->library(['form_validation', 'session']);
		$this->load->model(['Generals_model', 'Home/User_model', 'Home/City_model', 'Home/Save_users_model', 'Home/Worker_point_model', 'Home/Apply_model', 'Home/News_model', 'Home/Save_news_model','Home/Company_model']);
		$this->load->database();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}


	public function list_employee($alias, $tag_id, $city_id, $district_id)
	{
		$row_per_page=10;
		if(!$this->input->get('page') || $this->input->get('page')<1){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}
		$page_title = 'Danh sách ';
		if ($this->input->get('search_key')) {
			$search_key = $this->input->get('search_key');
		} else {
			$search_key = '';
		}
		$tag = $this->Generals_model->get_one_where('tbl_job_style', ['id' => $tag_id]);
		$city = $this->Generals_model->get_one_where('city', ['cit_id' => $city_id]);
		$district = $this->Generals_model->get_one_where('city', ['cit_id' => $district_id]);
		if (!empty($tag)) {
			$page_title .= $tag['content'] . ' ';
		} else {
			if ($search_key) {
				$page_title .= 'giúp việc "' . $search_key . '" ';
			} else {
				$page_title .= 'giúp việc ';
			}
		}
		if (!empty($district)) {
			$page_title .= 'tại ' . $district['cit_name'];
		} else {
			if (!empty($city)) {
				$page_title .= 'tại ' . $city['cit_name'];
			} else {
				$page_title .= 'mới nhất';
			}
		}

		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$list_city_worker = $this->City_model->get_city_top_employee();
		$list_district_worker = $this->City_model->get_district_top_employee();
		$list_work_type = $this->Generals_model->get_list('tbl_work_type');
		$list_user_save = '';
		$list_employee_full = $this->User_model->get_list_search($search_key, $tag_id, $city_id, $district_id);
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$list_user_save = $this->Save_users_model->get_list_saved($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_user_save); $i++) {
				$list_user_save[$i] = $list_user_save[$i]['user_id'];
			}
		}
		$total_page=ceil(count($list_employee_full)/$row_per_page);
		$list_employee=[];
		$skip=$row_per_page * ($page-1);
		$limit=$skip+$row_per_page;
		if($limit>count($list_employee_full)){
			$limit=count($list_employee_full);
		}
		for($i=$skip;$i<$limit;$i++){
			$list_employee[]=$list_employee_full[$i];
		}

		// ktra trạng thái đã xem, đã mở
		$list_worker_point_id = [];
		$list_worker_view_id = [];
		if (isset($_SESSION['user'])) {
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
		for($i=0;$i<count($list_employee);$i++){
			$list_employee[$i]['worker_point_status']=0;
			$list_employee[$i]['worker_view_status']=0;
			if(in_array($list_employee[$i]['id'],$list_worker_point_id)){
				$list_employee[$i]['worker_point_status']=1;
			}
			if(in_array($list_employee[$i]['id'],$list_worker_view_id)){
				$list_employee[$i]['worker_view_status']=1;
			}
		}

		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js', '/scripts/rSlider.min.js', '/scripts/home/home.js', '/scripts/home/filter.js',],
			'page_title' => $page_title,
			'list_job_style' => $list_job_style,
			'list_city_worker' => $list_city_worker,
			'list_district_worker' => $list_district_worker,
			'list_user_save' => $list_user_save,
			'list_employee' => $list_employee,
			'list_work_type' => $list_work_type,
			'page'=>$page,
			'total_page'=>$total_page,
			'preload'=>array('/images/bg_main_content.png','/images/lazy_load.gif')
		];
		if (isset($_SESSION['user'])) {
			if (!empty($district) || !empty($city)) {
				$data['page_name'] = 'home/list_employee';
				$data['style'] = ['/css/rSlider.min.css', '/css/header_after_login.css', '/css/home.css'];
			} else {
				$data['page_name'] = 'home/list_employee_by_tag';
				$data['style'] = ['/css/slick.css', '/css/rSlider.min.css', '/css/header_after_login.css', '/css/home.css'];
				if(empty($tag_id)){
					$post=$this->Generals_model->get_one_where('new_posts',['new_type'=>1]);
					$data['post'] = $post;
				}
				else{
					$post=$this->Generals_model->get_one_where('new_tags',['tag_id'=>$tag_id,'new_type'=>1]);
					$data['post'] = $post;
				}
			}
		} else {
			if (!empty($district) || !empty($city)) {
				$data['page_name'] = 'home/list_employee';
				$data['style'] = ['/css/rSlider.min.css', '/css/header_before_login.css', '/css/home.css'];
			} else {
				$data['page_name'] = 'home/list_employee_by_tag';
				$data['style'] = ['/css/slick.css', '/css/rSlider.min.css', '/css/header_before_login.css', '/css/home.css'];
				if(empty($tag_id)){
					$post=$this->Generals_model->get_one_where('new_posts',['new_type'=>1]);
					$data['post'] = $post;
				}
				else{
					$post=$this->Generals_model->get_one_where('new_tags',['tag_id'=>$tag_id,'new_type'=>1]);
					$data['post'] = $post;
				}
			}
		}
		$this->load->view('home/index', $data);
	}

	public function list_news($alias, $tag_id, $city_id, $district_id)
	{
		$row_per_page=10;
		if(!$this->input->get('page') || $this->input->get('page')<1){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}
		$page_title = 'Danh sách việc làm ';
		if ($this->input->get('search_key')) {
			$search_key = $this->input->get('search_key');
		} else {
			$search_key = '';
		}
		$tag = $this->Generals_model->get_one_where('tbl_job_style', ['id' => $tag_id]);
		$city = $this->Generals_model->get_one_where('city', ['cit_id' => $city_id]);
		$district = $this->Generals_model->get_one_where('city', ['cit_id' => $district_id]);
		if (!empty($tag)) {
			$page_title .= $tag['content'] . ' ';
		} else {
			if ($search_key) {
				$page_title .= 'giúp việc "' . $search_key . '" ';
			} else {
				$page_title .= 'giúp việc ';
			}
		}
		if (!empty($district)) {
			$page_title .= 'tại ' . $district['cit_name'];
		} else {
			if (!empty($city)) {
				$page_title .= 'tại ' . $city['cit_name'];
			} else {
				if (empty($tag)) {
					$page_title .= 'mới nhất';
				}
			}
		}
		if ($this->input->get('search_key')) {
			$search_key = $this->input->get('search_key');
		} else {
			$search_key = '';
		}
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$list_city_job = $this->City_model->get_city_top_job();
		$list_district_job = $this->City_model->get_district_top_job();
		$list_work_type = $this->Generals_model->get_list('tbl_work_type');
		$list_news_full = $this->News_model->get_list_search($search_key, $tag_id, $city_id, $district_id);
		$list_new_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$list_new_save = $this->Save_news_model->get_list_save_new($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_new_save); $i++) {
				$list_new_save[$i] = $list_new_save[$i]['new_id'];
			}
		}
		$total_page=ceil(count($list_news_full)/$row_per_page);
		$list_news=[];
		$skip=$row_per_page * ($page-1);
		$limit=$skip+$row_per_page;
		if($limit>count($list_news_full)){
			$limit=count($list_news_full);
		}
		for($i=$skip;$i<$limit;$i++){
			$list_news[]=$list_news_full[$i];
		}
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/rSlider.min.js', '/scripts/home/filter.js', '/scripts/home/list_job.js'],
			'style' => ['/css/rSlider.min.css', '/css/global/style.css', '/css/list_job.css'],
			'page_title' => $page_title,
			'list_job_style' => $list_job_style,
			'list_city_job' => $list_city_job,
			'list_district_job' => $list_district_job,
			'list_new_save' => $list_new_save,
			'list_news' => $list_news,
			'list_work_type' => $list_work_type,
			'page'=>$page,
			'total_page'=>$total_page,
			'preload'=>array('/images/post_HN.png','/images/post_DN.png','/images/post_HCM.png','/images/post_CT.png')
		];
		if($tag_id==0 && $city_id==0 && $district_id==0){
			$data['page_name'] = 'home/list_news_all';
			$post=$this->Generals_model->get_one_where('new_posts',['new_type'=>2]);
			$data['post'] = $post;
		}
		else{
			$data['page_name'] = 'home/list_news';
		}
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		$this->load->view('home/index', $data);
	}


	public function employee_detail($alias, $id)
	{
		$list_user_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$list_user_save = $this->Save_users_model->get_list_saved($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_user_save); $i++) {
				$list_user_save[$i] = $list_user_save[$i]['user_id'];
			}
		}
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$employee = $this->User_model->get_one($id);
		$employee_schedule = $this->Generals_model->get_one_where('user_calendar', ['user_id' => $employee['id']]);
		$employee_rate = $this->Apply_model->get_rate($employee['id']);
		
		$employee['worker_point_status'] = 0;
		
		$list_worker_point = [];
		if (isset($_SESSION['user'])) {
			$list_worker_point = $this->Worker_point_model->get_list_user($_SESSION['user']['id']);
		}
		if (!empty($list_worker_point)) {
			foreach ($list_worker_point as $worker_point) {
				if ($employee['id'] == $worker_point['user_id']) {
					$employee['worker_point_status'] = 1;
				}
			}
		}

		$potential_employees = $this->User_model->get_list_by_tag($employee['job_style_id']);
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$company_id = $_SESSION['user']['id'];
			$data_check=[
				'company_id' => $company_id,
				'user_id' => $id
			];
			$check_worker_point=$this->Generals_model->get_where('tbl_worker_point',$data_check);
			if(empty($check_worker_point)){
			$data_view = [
				'company_id' => $company_id,
				'user_id' => $id,
				'point_type' => 0,
				'status' => 0,
				'create_at' => strtotime(date('Y-m-d H:i:s')),
				'update_at' => strtotime(date('Y-m-d H:i:s')),
			];
			$this->Generals_model->insert('tbl_worker_point', $data_view);
			}
		}
		$canonical=CURL();
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js','/scripts/home/helper_detail_slick.js', '/scripts/home/helper_detail.js'],
			'style' => ['/css/slick.css', '/css/global/style.css', '/css/helper_detail.css'],
			'page_name' => 'home/employee_detail',
			'employee' => $employee,
			'employee_schedule' => $employee_schedule,
			'employee_rate' => $employee_rate,
			'list_job_style' => $list_job_style,
			'list_user_save' => $list_user_save,
			'potential_employees' => $potential_employees,
			'canonical'=>$canonical,
			'preload'=>array(rewirte_user_img_href($employee['id'], $employee['image']))
		];
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		// var_dump($employee_rate);
		$this->load->view('home/index', $data);
	}

	public function employee_profile($alias, $id)
	{
		if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 0 || $id!=$_SESSION['user']['id']){
			redirect('/login');
		}
		$list_user_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$list_user_save = $this->Save_users_model->get_list_saved($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_user_save); $i++) {
				$list_user_save[$i] = $list_user_save[$i]['user_id'];
			}
		}
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$employee = $this->User_model->get_one($id);
		$employee_schedule = $this->Generals_model->get_one_where('user_calendar', ['user_id' => $employee['id']]);
		$employee_rate = $this->Apply_model->get_rate($employee['id']);
		$employee['worker_point_status'] = 0;
		$list_worker_point = [];
		if (isset($_SESSION['user'])) {
			$list_worker_point = $this->Worker_point_model->get_list_user($_SESSION['user']['id']);
		}
		if (!empty($list_worker_point)) {
			foreach ($list_worker_point as $worker_point) {
				if ($employee['id'] == $worker_point['user_id']) {
					$employee['worker_point_status'] = 1;
				}
			}
		}
		// var_dump($potential_employees);
		$canonical=CURL();
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js', '/scripts/rSlider.min.js', '/scripts/home/home.js', '/scripts/home/helper_detail.js',],
			'style' => ['/css/slick.css', '/css/global/style.css', '/css/employee_profile.css'],
			'page_name' => 'home/employee_profile',
			'employee' => $employee,
			'employee_schedule' => $employee_schedule,
			'employee_rate' => $employee_rate,
			'list_job_style' => $list_job_style,
			'list_user_save' => $list_user_save,
			'canonical'=>$canonical
		];
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		// var_dump($employee_rate);
		$this->load->view('home/index', $data);
	}

	public function new_detail($alias, $new_id)
	{
		$new = $this->News_model->get_detail($new_id);
		$new['full_address'] = '';
		if ($new['address'] != '') {
			$new['full_address'] .= $new['address'] . ', ';
		}
		$new['full_address'] .= $this->Generals_model->get_city_name($new['district_id']) . ', ';
		$new['full_address'] .= $this->Generals_model->get_city_name($new['city_id']);
		$list_new_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$list_new_save = $this->Save_news_model->get_list_save_new($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_new_save); $i++) {
				$list_new_save[$i] = $list_new_save[$i]['new_id'];
			}
		}

		$new['apply_status']=0;
		if(isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type']==0){
		$check_apply=$this->Generals_model->get_where('tbl_apply',['new_id'=>$new['new_id'],'user_id'=>$_SESSION['user']['id']]);
		if(!empty($check_apply)){
			$new['apply_status']=1;
		}
		else {
			$new['apply_status']=0;
		}
		}

		$list_same_job=$this->News_model->get_list_by_tag($new['job_style_id']);
		for ($i = 0; $i < count($list_same_job); $i++) {
			$list_same_job[$i]['full_address'] = '';
			if ($list_same_job[$i]['address'] != '') {
				$list_same_job[$i]['full_address'] .= $list_same_job[$i]['address'] . ', ';
			}
			$list_same_job[$i]['full_address'] .= $this->Generals_model->get_city_name($list_same_job[$i]['district_id']) . ', ';
			$list_same_job[$i]['full_address'] .= $this->Generals_model->get_city_name($list_same_job[$i]['city_id']);
		}

		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js', '/scripts/home/new_detail.js','/scripts/home/new_detail_slick.js'],
			'style' => ['/css/slick.css', '/css/global/style.css', '/css/new_detail.css'],
			'page_name' => 'home/new_detail',
			'new' => $new,
			'list_new_save'=>$list_new_save,
			'list_same_job'=>$list_same_job,
			'preload'=>array(rewirte_company_img_href($new['company_id'], $new['image']))
			
		];
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		if($new['new_index']==1){
			$data['index']='index,follow';
		}
		$this->load->view('home/index', $data);
	}

	public function company_detail($alias,$id){
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$id]);
		$company['full_address'] = '';
		if ($company['address'] != '') {
			$company['full_address'] .= $company['address'] . ', ';
		}
		$company['full_address'] .= $this->Generals_model->get_city_name($company['district_id']) . ', ';
		$company['full_address'] .= $this->Generals_model->get_city_name($company['city_id']);

		$list_new_full=$this->News_model->get_list($id);
		$company['count_new']=count($list_new_full);

		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 10;
		$total_page = ceil(count($list_new_full) / $row_per_page);
		$list_new=$this->News_model->get_list_limit($id,$row_per_page,$row_per_page * ($page-1));
		$list_new_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$list_new_save = $this->Save_news_model->get_list_save_new($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_new_save); $i++) {
				$list_new_save[$i] = $list_new_save[$i]['new_id'];
			}
		}
		$this->Company_model->add_view($id);

		if($company['not_post']==1){
			$index="index,follow";
		}
		else{
			$index="noindex,nofollow";
		}

		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js', '/scripts/home/company_detail.js',],
			'style' => ['/css/slick.css', '/css/global/style.css', '/css/company_detail.css'],
			'page_name' => 'home/company_detail',
			'company'=>$company,
			'list_new'=>$list_new,
			'list_new_save'=>$list_new_save,
			'page' => $page,
			'total_page' => $total_page,
			'index'=>$index
		];
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		// var_dump($employee_rate);
		$this->load->view('home/index', $data);
	}

	public function list_employee_around(){
		if (!$this->input->get('page')||$this->input->get('page')<=0) {
			$page = 1;
		} else $page = $this->input->get('page');
		$row_per_page = 10;
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$list_work_type = $this->Generals_model->get_list('tbl_work_type');
		$list_employee_full=$this->User_model->get_list();
		$total_page = ceil(count($list_employee_full) / $row_per_page);
		$list_employee=$this->User_model->get_list_limit($row_per_page,$row_per_page*($page-1));
		$data = [
			'header' => 'header',
			'footer' => 'footer',
			'js' => ['/scripts/slick.js', '/scripts/rSlider.min.js','/scripts/home/filter.js'],
			'style' => ['/css/slick.css','/css/rSlider.min.css', '/css/global/style.css', '/css/list_employee_around.css'],
			'page_name' => 'home/list_employee_around',
			'list_employee'=>$list_employee,
			'list_job_style'=>$list_job_style,
			'list_work_type'=>$list_work_type,
			'page'=>$page,
			'total_page'=>$total_page
		];
		if (isset($_SESSION['user'])) {
			$data['style'][] = '/css/header_after_login.css';
		} else {
			$data['style'][] = '/css/header_before_login.css';
		}
		// var_dump($employee_rate);
		$this->load->view('home/index', $data);
	}
}
