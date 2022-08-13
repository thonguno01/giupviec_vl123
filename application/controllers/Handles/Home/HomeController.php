<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['Generals_model', 'Home/City_model', 'Home/User_model', 'Home/News_model', 'Home/Notify_model', 'Home/Save_news_model', 'Home/Save_users_model', 'Home/Worker_point_model']);
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	//lấy danh sách tỉnh thành
	public function get_list_city()
	{
		$result = $this->Generals_model->get_list_city();
		die(json_encode($result));
	}

	//lấy danh sách quận huyện
	public function get_list_district()
	{
		$city_key = $this->input->get('city_key');
		if ($city_key == '') {
			$result = $this->City_model->get_list_district();
		} else {
			$result = $this->City_model->get_list_district_by_city_key($city_key);
		}
		die(json_encode($result));
	}


	public function get_tag()
	{
		$tag_name = $this->input->get('tag_name');
		$tag = $this->Generals_model->get_one_where('tbl_job_style', ['content' => $tag_name]);
		// $result=$this->Generals_model->get_one_where('city',['cit_id'=>$district['cit_parent']]);
		die(json_encode($tag));
	}

	public function get_list_tag()
	{
		$list_tag = $this->Generals_model->get_list('tbl_job_style');
		die(json_encode($list_tag));
	}

	//Lấy danh sách tỉnh thành nổi bật cho popup tìm kiếm
	public function get_list_hot_location()
	{
		$list_hot_HN = $this->City_model->get_hot_district_by_city(1);
		$list_hot_HCM = $this->City_model->get_hot_district_by_city(45);
		$list_hot_DN = $this->City_model->get_hot_district_by_city(26);
		$output = [
			'list_hot_HN' => $list_hot_HN,
			'list_hot_HCM' => $list_hot_HCM,
			'list_hot_DN' => $list_hot_DN
		];
		die(json_encode($output));
	}

	public function get_notify()
	{
		$noti_not_seen_count = 0;
		$noti = [];
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$noti = $this->Notify_model->get_by_user($_SESSION['user']['id']);
				$noti_not_seen = $this->Notify_model->get_by_user_not_seen($_SESSION['user']['id']);
				$noti_not_seen_count = count($noti_not_seen);
			} else {
				$noti = $this->Notify_model->get_by_company($_SESSION['user']['id']);
				$noti_not_seen = $this->Notify_model->get_by_company_not_seen($_SESSION['user']['id']);
				$noti_not_seen_count = count($noti_not_seen);
			}
		}
		// var_dump($noti);
		$output = [
			'noti' => $noti,
			'not_seen' => $noti_not_seen_count
		];
		die(json_encode($output));
		// var_dump($output);
	}

	public function seen_notify()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$this->Generals_model->update('tbl_notify', ['user_id' => $_SESSION['user']['id'],'owner_type'=>0], ['seen' => 1]);
			} else {
				$this->Generals_model->update('tbl_notify', ['company_id' => $_SESSION['user']['id'],'owner_type'=>1], ['seen' => 1]);
			}
		}
	}

	public function clear_notify()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['user_type'] == 0) {
				$this->Generals_model->delete('tbl_notify', ['user_id' => $_SESSION['user']['id'],'owner_type'=>0]);
			} else {
				$this->Generals_model->delete('tbl_notify', ['company_id' => $_SESSION['user']['id'],'owner_type'=>1]);
			}
		}
	}

	public function delete_notify()
	{
		$id=$this->input->get('id');
		if (isset($_SESSION['user'])) {
				$this->Generals_model->delete('tbl_notify', ['id' => $id]);
		}
	}


	//Lưu ứng viên
	public function action_save_employee()
	{
		$user_id = $this->input->post('user_id');
		$company_id = $_SESSION['user']['id'];
		$data_check = [
			'user_id' => $user_id,
			'company_id' => $company_id
		];
		$save_check = $this->Generals_model->get_where('tbl_save_users', $data_check);
		if (empty($save_check)) {
			$data = [
				'user_id' => $user_id,
				'company_id' => $company_id,
				'create_at' => strtotime(date('Y-m-d'))
			];
			if ($this->Generals_model->insert('tbl_save_users', $data)) {
				$result['result'] = true;
				$result['saved'] = true;
				$result['message'] = "Lưu người giúp việc thành công!";
			} else {
				$result = false;
			}
		} else {
			$data = [
				'user_id' => $user_id,
				'company_id' => $company_id
			];
			if ($this->Generals_model->delete('tbl_save_users', $data)) {
				$result['result'] = true;
				$result['saved'] = false;
				$result['message'] = "Bỏ lưu người giúp việc thành công!";
			} else {
				$result = false;
			}
		}
		die(json_encode($result));
	}

	//Lưu tin
	public function action_save_new()
	{
		$new_id = $this->input->post('new_id');
		$user_id = $_SESSION['user']['id'];
		$data_check = [
			'new_id' => $new_id,
			'user_id' => $user_id
		];
		$save_check = $this->Generals_model->get_where('tbl_save_news', $data_check);
		if (empty($save_check)) {
			$data = [
				'user_id' => $user_id,
				'new_id' => $new_id,
				'create_at' => strtotime(date('Y-m-d'))
			];
			if ($this->Generals_model->insert('tbl_save_news', $data)) {
				$result['result'] = true;
				$result['saved'] = true;
				$result['message'] = "Lưu người giúp việc thành công!";
			} else {
				$result = false;
			}
		} else {
			$data = [
				'new_id' => $new_id,
				'user_id' => $user_id
			];
			if ($this->Generals_model->delete('tbl_save_news', $data)) {
				$result['result'] = true;
				$result['saved'] = false;
				$result['message'] = "Bỏ lưu người giúp việc thành công!";
			} else {
				$result = false;
			}
		}
		die(json_encode($result));
	}

	//Kiểm tra điểm trước khi xem ứng viên
	function check_point()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
			$total_point = $company['point_free'] + $company['point_pay'];
			die(json_encode($total_point));
		}
	}

	//Xem ứng viên bằng điểm
	function use_point()
	{
		$email = '';
		$phone = '';
		if ($_SESSION['user']['user_type'] == 1) {
			$company_id = $_SESSION['user']['id'];
			$user_id = $this->input->post('user_id');
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $company_id]);
			if ($company['point_free'] > 0) {
				$data_check=[
					'company_id' => $company_id,
					'user_id' => $user_id
				];
				$check_worker_point=$this->Generals_model->get_where('tbl_worker_point',$data_check);
				if(empty($check_worker_point)){
				$data = [
					'company_id' => $company_id,
					'user_id' => $user_id,
					'point_type' => 1,
					'status' => 0,
					'create_at' => strtotime(date('Y-m-d H:i:s')),
					'update_at' => strtotime(date('Y-m-d H:i:s')),
				];
				$this->Generals_model->insert('tbl_worker_point', $data);
				}
				else{
					$this->Generals_model->update('tbl_worker_point', $data_check,['point_type'=>1]);
				}
				$this->Generals_model->update('tbl_companys', ['id' => $company_id], ['point_free' => $company['point_free'] - 1, 'update_at' => strtotime(date('Y-m-d H:i:s'))]);
				$employee = $this->Generals_model->get_one_where('tbl_users', ['id' => $user_id]);
				$email = $employee['email'];
				$phone = $employee['phone'];
				$result = true;
			} else if ($company['point_pay'] > 0) {
				$data_check=[
					'company_id' => $company_id,
					'user_id' => $user_id
				];
				$check_worker_point=$this->Generals_model->get_where('tbl_worker_point',$data_check);
				if(empty($check_worker_point)){
				$data = [
					'company_id' => $company_id,
					'user_id' => $user_id,
					'point_type' => 2,
					'status' => 0,
					'create_at' => strtotime(date('Y-m-d H:i:s')),
					'update_at' => strtotime(date('Y-m-d H:i:s')),
				];
				$this->Generals_model->insert('tbl_worker_point', $data);
				}
				else{
					$this->Generals_model->update('tbl_worker_point', $data_check,['point_type'=>2]);
				}
				$this->Generals_model->update('tbl_companys', ['id' => $company_id], ['point_pay' => $company['point_pay'] - 1, 'update_at' => strtotime(date('Y-m-d H:i:s'))]);
				$employee = $this->Generals_model->get_one_where('tbl_users', ['id' => $user_id]);
				$email = $employee['email'];
				$phone = $employee['phone'];
				$result = true;
			} else {
				$result = false;
			}
		} else {
			$result = false;
		}
		if($result){
			$data = [
				'company_id' => $company_id,
				'user_id' => $user_id,
				'create_at' => strtotime(date('Y-m-d H:i:s'))
			];
			$this->Generals_model->insert('tbl_history_point', $data);
		}
		$output = [
			'result' => $result,
			'email' => $email,
			'phone' => $phone
		];
		die(json_encode($output));
	}

	//ứng tuyển
	function action_apply()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$new_id = $this->input->post('new_id');
			$new = $this->Generals_model->get_one_where('tbl_news', ['id' => $new_id]);
			$check_apply = $this->Generals_model->get_where('tbl_apply', ['new_id' => $new_id, 'user_id' => $_SESSION['user']['id']]);
			if (!empty($check_apply)) {
				$result = false;
				$message="Đã có lỗi xảy ra!";
			} else {
				$timenow=strtotime(date('Y-m-d H:i:s'));
				if($new['new_status']!=1 || $new['close_time']<$timenow){
					$result = false;
					$message="Công việc đã ngừng tuyển dụng!";
				}
				else{
				$data = [
					'user_id' => $_SESSION['user']['id'],
					'new_id' => $new_id,
					'company_id' => $new['company_id'],
					'update_at' => strtotime(date('Y-m-d H:i:s')),
					'create_at' => strtotime(date('Y-m-d H:i:s')),
					'status' => 0,
					'work_status' => 0,
					'time_apply' => strtotime(date('Y-m-d H:i:s')),
				];
				$apply_id = $this->Generals_model->insert('tbl_apply', $data);
				
				if ($apply_id) {
					$apply = $this->Generals_model->get_one_where('tbl_apply', ['id' => $apply_id]);
					$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $apply['user_id']]);
					$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $apply['company_id']]);
					$noti = [
						'company_id' => $company['id'],
						'user_id' => $user['id'],
						'new_id'=>$new_id,
						'owner_type'=>1,
						'noti_type'=>0,
						'create_at' => strtotime(date('Y-m-d H:i:s'))
					];
					$this->Generals_model->insert('tbl_notify', $noti);
					$result = true;
					$message="Ứng tuyển thành công!";
				}
				 else {
					$result = false;
					$message="Đã có lỗi xảy ra!";
				}
			}
			}
		} else {
			$result = false;
		}
		$output=[
			'result'=>$result,
			'message'=>$message
		];
		die(json_encode($output));
	}

	function get_company_contact()
	{
		$output['email'] = '';
		$output['phone'] = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$company_id = $this->input->post('company_id');
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $company_id]);
			$output['email'] = $company['email'];
			$output['phone'] = $company['phone'];
			$output['result'] = true;
			// var_dump($company);
		} else {
			$output['result'] = false;
		}
		die(json_encode($output));
	}


	//Bộ lọc
	function apply_filter_employee()
	{
		$list_job_style = $this->Generals_model->get_where('tbl_job_style', ['status' => 1]);
		$list_user_save = '';
		// $list_employee_full = $this->User_model->get_list_search($search_key, $tag_id, $city_id, $district_id);
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) {
			$list_user_save = $this->Save_users_model->get_list_saved($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_user_save); $i++) {
				$list_user_save[$i] = $list_user_save[$i]['user_id'];
			}
		}
		$row_per_page = 10;
		if (!$this->input->post('page') || $this->input->post('page') < 1) {
			$page = 1;
		} else {
			$page = $this->input->post('page');
		}
		$job_style_id = $this->input->post('job_style_id');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$min_age = $this->input->post('min_age');
		$max_age = $this->input->post('max_age');
		$exp = $this->input->post('exp');
		$salary_type = $this->input->post('salary_type');
		$salary1 = $this->input->post('salary1');
		$salary2 = $this->input->post('salary2');
		$salary_time = $this->input->post('salary_time');
		$work_schedule = $this->input->post('work_schedule');
		$work_type_id = $this->input->post('work_type_id');
		$list_employee_full = $this->User_model->get_filter($job_style_id, $city, $district, $min_age, $max_age, $exp, $salary_type, $salary1, $salary2, $salary_time, $work_schedule, $work_type_id);
		$total_page = ceil(count($list_employee_full) / $row_per_page);
		$list_employee = [];
		$skip = $row_per_page * ($page - 1);
		$limit = $skip + $row_per_page;
		if ($limit > count($list_employee_full)) {
			$limit = count($list_employee_full);
		}
		for ($i = $skip; $i < $limit; $i++) {
			$list_employee[] = $list_employee_full[$i];
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
		$employee_dom = [];
		$dayms = 60 * 60 * 24;
		$timenow = strtotime(date('Y-m-d'));
		foreach ($list_employee as $employee) {
			$html = '';
			$html = '<div class="job_item">';
			$datediff = floor(($employee['update_at'] - $timenow) / $dayms);
			if (abs($datediff) < 3) {
				$html .= '<div class="sticker"><img src="/images/new_sticker.svg" alt="sticker"></div>';
			}

			if (!isset($_SESSION["user"]) || $_SESSION["user"]["user_type"] != 1) {
				$html .= '<button class="btn_like btn_like_' . $employee["id"] . '" type="button" onclick="action_popup_login()">
						<img src="/images/like_star.svg" alt="them vao yeu thich">
					</button>';
			} else {
				if ($_SESSION["user"]["user_type"] == 1) {
					if (!in_array($employee["id"], $list_user_save)) {
						$html .= '<button class="btn_like btn_like_' . $employee["id"] . '" type="button" onclick="action_save(' . $employee["id"] . ')">
								<img src="/images/like_star.svg" alt="them vao yeu thich">
							</button>';
					} else {
						$html .= '<button class="btn_like liked btn_like_' . $employee["id"] . '" type="button" onclick="action_save(' . $employee["id"] . ')">
								<img src="/images/like_star_full.svg" alt="them vao yeu thich">
							</button>';
					}
				}
			}
			$html .= '<div class="box_profile">
					<div class="box_left">
						<a href="' . rewrite_employee_link($employee["alias"], $employee["id"]) . '">
							<div class="avt">';
			if ($employee["image"]) {

				$html .= '<img src="' . rewirte_user_img_href($employee["id"], $employee["image"]) . '" alt="anh dai dien">';
			} else {
				$html .= '<img src="/images/employee_ava.png" alt="anh dai dien">';
			}
			$html .= '</div>
						</a>
						<div class="rate_star">
							<span class="score">
								<div class="score-wrap">
									<span class="stars-active" style="width:80%">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="stars-inactive">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
								</div>
							</span>
						</div>
					</div>
					<div class="box_right">
						<a href="' . rewrite_employee_link($employee["alias"], $employee["id"]) . '" class="name">' . $employee["name"];
						if($employee['worker_point_status']==1) $html.= '<span class="view_status">Đã mở</span>';
						elseif($employee['worker_view_status']==1) $html.= '<span class="view_status">Đã xem</span>';
						$html.='</a>
						<div class="info">
							<div class="row_info">
								<div class="icon icon_location">
									<img src="/images/location_icon.svg" alt="dia chi">
								</div>
								<div class="text">
									<p class="location">' . $employee["cit_name"] . '</p>
								</div>
							</div>
							<div class="row_info">
								<div class="icon icon_salary">
									<img src="/images/salary_icon.svg" alt="luong">
								</div>
								<div class="text">
									<p class="salary">';
			if ($employee["salary_type"] == 0) $html .= number_format($employee["salary1"], 0, "", ".") . "vnđ";
			else $html .= (number_format($employee["salary1"], 0, "", ".") . " - " . number_format($employee["salary2"], 0, "", ".") . "vnđ");
			switch ($employee["salary_time"]) {
				case "1":
					$html .= "/Tháng";
					break;
				case "2":
					$html .= "/Tuần";
					break;
				case "3":
					$html .= "/Giờ";
					break;
				default:
					break;
			}

			$html .= '</p>
								</div>
							</div>
							<div class="row_info">
								<div class="icon icon_exp">
									<img src="/images/exp_icon.svg" alt="kinh nghiem">
								</div>
								<div class="text">
									<p class="exp"><span class="grey">Kinh
											nghiệm:</span>';
			switch ($employee["exp"]) {
				case "0":
					$html .= "Chưa có";
					break;
				case "1":
					$html .= "Dưới 1 năm";
					break;
				case "2":
					$html .= "1-2 năm";
					break;
				case "3":
					$html .= "3-5 năm";
					break;
				case "4":
					$html .= "6-9 năm";
					break;
				case "5":
					$html .= "Trên 10 năm";
					break;
				default:
					break;
			}
			$html .= '</p>
								</div>
							</div>
							<div class="row_info">
								<div class="icon
																icon_job_location">
									<img src="/images/job_location_icon.svg" alt="noi o">
								</div>
								<div class="text">
									<p class="job_location">' . $employee["work_name"] . '</p>
								</div>
								<div class="icon icon_birthday">
									<img src="/images/birthday_icon.svg" alt="tuoi">
								</div>
								<div class="text">
									<p class="age">' . (date("Y") - date("Y", $employee["birth"])) . ' <span class="grey">tuổi</span></p>
								</div>
							</div>
							<div class="row_info">
								<div class="schedule">
									<div class="';
			if ($employee["t2_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T2</div>
									<div class="';
			if ($employee["t3_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T3</div>
									<div class="';
			if ($employee["t4_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T4</div>
									<div class="';
			if ($employee["t5_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T5</div>
									<div class="';
			if ($employee["t6_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T6</div>
									<div class="';
			if ($employee["t7_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">T7</div>
									<div class="';
			if ($employee["t8_ca1_bd"]) $html .= "active";
			else $html .= "non_active";
			$html .= '">CN</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="list_tag">';
			$list_employee_job_style = explode(",", $employee["job_style_id"]);
			foreach ($list_employee_job_style as $employee_job_style) {
				foreach ($list_job_style as $job_style) {
					if ($employee_job_style == $job_style["id"]) {


						$html .= '<div class="tag_item">
									<span>' . $job_style["content"] . '</span>
								</div>';
					}
				}
			}
			$html .= '</div>
				<div class="box_detail">
					<p class="content">' . $employee["intro"] . '</p>
				</div>
			</div>';
			$employee_dom[] = $html;
		}
		$output = [
			'page' => $page,
			'total_page' => $total_page,
			'employee_dom' => $employee_dom
		];
		// var_dump($list_employee);
		die(json_encode($output));
	}

	public function apply_filter_new()
	{
		$row_per_page = 10;
		if (!$this->input->post('page') || $this->input->post('page') < 1) {
			$page = 1;
		} else {
			$page = $this->input->post('page');
		}
		$job_style_id = $this->input->post('job_style_id');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$min_age = $this->input->post('min_age');
		$max_age = $this->input->post('max_age');
		$exp = $this->input->post('exp');
		$salary_type = $this->input->post('salary_type');
		$salary1 = $this->input->post('salary1');
		$salary2 = $this->input->post('salary2');
		$salary_time = $this->input->post('salary_time');
		$work_schedule = $this->input->post('work_schedule');
		$work_type_id = $this->input->post('work_type_id');
		$list_new_full = $this->News_model->get_filter($job_style_id, $city, $district, $min_age, $max_age, $exp, $salary_type, $salary1, $salary2, $salary_time, $work_schedule, $work_type_id);
		$total_page = ceil(count($list_new_full) / $row_per_page);
		$list_new = [];
		$skip = $row_per_page * ($page - 1);
		$limit = $skip + $row_per_page;
		if ($limit > count($list_new_full)) {
			$limit = count($list_new_full);
		}
		for ($i = $skip; $i < $limit; $i++) {
			$list_new[] = $list_new_full[$i];
		}
		$list_new_save = '';
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0) {
			$list_new_save = $this->Save_news_model->get_list_save_new($_SESSION['user']['id']);
			for ($i = 0; $i < count($list_new_save); $i++) {
				$list_new_save[$i] = $list_new_save[$i]['new_id'];
			}
		}
		$dayms = 60 * 60 * 24;
		$timenow = strtotime(date('Y-m-d'));
		$new_dom = [];

		foreach ($list_new as $new) {
			$html = '<div class="item_parent">';
			$datediff = floor(($new['update_at'] - $timenow) / $dayms);
			if (abs($datediff) < 3) {
				$html .= '<div class="new_job">
                            <img src="/images/job_list/New.svg" alt="LogoVieclam123">
                        </div>';
			}
			if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 0) {
				$html .= '<button class="star_prominent btn_like_' . $new['new_id'] . '" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>';
			} else {
				if ($_SESSION['user']['user_type'] == 0) {
					if (!in_array($new['new_id'], $list_new_save)) {
						$html .= '<button class="star_prominent btn_like_' . $new['new_id'] . '" type="button" onclick="action_save(' . $new['new_id'] . ')">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>';
					} else {
						$html .= '<button class="star_prominent liked btn_like_' . $new['new_id'] . '" type="button" onclick="action_save(' . $new['new_id'] . ')">
    											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    										</button>';
					}
				}
			}
			$html .= '<div class="info flex">
                            <div class="image">
                                <div class="border_radius">';
			if ($new['image']) {
				$html .= '<img src="' . rewirte_company_img_href($new['company_id'], $new['image']) . '" alt="anh dai dien">';
			} else {
				$html .= '<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">';
			}
			$html .= '</div>
                            </div>
                            <div class="info_detail">
                                <p class="info_title">
                                    <a href="' . rewrite_new_detail_link($new['new_alias'], $new['new_id']) . '">' . $new['title'] . '</a>
                                </p>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex address">
                                        <span class="icon icon_location"><img src="/images/job_list/address.svg" alt="Địa chỉ"></span>
                                        <span class="span_add">' . $new['cit_name'] . '</span>
                                    </div>
                                </div>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex job">
                                        <span class="icon icon_job_style"><img src="/images/job_list/job.svg" alt="Công việc"></span>
                                        <span class="span_job">' . $new['job_style'] . '</span>
                                    </div>
                                    <div class="item-child-2 money">
                                        <span class="icon icon_salary"><img src="/images/job_list/money.svg" alt="Lương"></span>
                                        <span class="span_money">';
			if ($new['salary_type'] == 0) $html .= number_format($new['salary1'], 0, '', '.') . 'vnđ';
			else $html .= (number_format($new['salary1'], 0, '', '.') . ' - ' . number_format($new['salary2'], 0, '', '.') . 'vnđ');
			switch ($new['salary_time']) {
				case '1':
					$html .= '/Tháng';
					break;
				case '2':
					$html .= '/Tuần';
					break;
				case '3':
					$html .= '/Giờ';
					break;
				default:
					break;
			}
			$html .= '</span>
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class=" item-child-1 flex exp">
                                        <span class="icon icon_exp"><img src="/images/job_list/exp.svg" alt="Kinh nghiệm"></span>
                                        <span class="span_exp">Kinh nghiệm: <strong>';
			switch ($new['exp']) {
				case '0':
					$html .= 'Không yêu cầu';
					break;
				case '1':
					$html .= 'Dưới 1 năm';
					break;
				case '2':
					$html .= '1-2 năm';
					break;
				case '3':
					$html .= '3-5 năm';
					break;
				case '4':
					$html .= '6-9 năm';
					break;
				case '5':
					$html .= 'Trên 10 năm';
					break;
				default:
					break;
			}
			$html .= '</strong></span>
                                    </div>
                                    <div class="age">
                                        <span class="icon icon_birthday"><img src="/images/job_list/age.svg" alt="Độ tuổi"></span>
                                        <span class="span_age"><strong>' . $new['age_from'] . ' - ' . $new['age_to'] . ' </strong>tuổi</span>
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class="item-child-1 flex star">
                                        <span class="icon icon_job_location"><img src="/images/job_list/start.svg" alt="Địa chỉ làm việc"></span>
                                        <span class="span_star">' . $new['work_name'] . '</span>
                                    </div>

                                </div>
                                <div class="calendar flex">
                                    <div class="radius ';
			if ($new['t2_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T2</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t3_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T3</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t4_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T4</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t5_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T5</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t6_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T6</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t7_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">T7</span>
                                    </div>
                                    <div class="radius ';
			if ($new['t8_ca1_bd']) $html .= 'active';
			else $html .= 'non_active';
			$html .= '">
                                        <span class="">CN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <p>' . $new['description'] . '</p>
                        </div>
                    </div>';
			$new_dom[] = $html;
		}
		$output = [
			'page' => $page,
			'total_page' => $total_page,
			'new_dom' => $new_dom
		];
		// var_dump($list_new);
		die(json_encode($output));
	}

	function send_mail_notify(){
		$employee_id=$this->input->post('employee_id');
		$employee = $this->User_model->get_one($employee_id);
		$potential_new=$this->News_model->get_list_potential($employee['job_style_id'],$employee['city_id']);
		$html='';
		foreach($potential_new as $new){
			$html.='<tr>
			<td bgcolor="#1976D2" style="font-size: 0; line-height: 0;height: 3px;">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td style="font-family: Roboto;
			font-style: normal;
			font-size: 12px;
			line-height: 14px;">
				<a style="color: #1976D2; font-weight: 500;">
					'.$new['title'].'
				</a>
			</td>
		</tr>
		<tr>
			<td style="font-family: Roboto;
			font-style: normal;
			font-size: 12px;
			line-height: 14px;">
				<a style="color: #1976D2; font-weight: 500;">'.$new['company_name'].'</a>
			</td>
		</tr>
		<tr>
			<td style="font-family: Roboto;
			font-style: normal;
			font-size: 12px;
			line-height: 14px;">
				<a>Công việc</a>
			</td>
		</tr>
		<tr>
			<td style="font-family: Roboto;
			font-style: normal;
			font-size: 12px;
			line-height: 14px;">
				<a>Mức lương: <a style="color: red;">';
				if($new['salary_type']==0){
					$html.=$new['salary1'].'/';
				}
				else{
					$html.=$new['salary1'].' - '.$new['salary2'].'/';
				}
				switch($new['salary_time']){
					case '1':
						$html.="Tháng";
						break;
					case '2':
						$html.="Tuần";
						break;
					case '3':
						$html.="Giờ";
						break;
				}
				$html.='</a></a>
			</td>
		</tr>
		<tr>
			<td style="font-family: Roboto;
			font-style: normal;
			font-size: 12px;
			line-height: 14px;">
				'.$new['cit_name'].'
			</td>
		</tr>';
		}
		if(isset($_SESSION['user'])&&$_SESSION['user']['user_type']==1){
			$body = file_get_contents('email/view_notify.html');
			$body = str_replace("<%employee_name%>", $employee['name'], $body);
			$body = str_replace("<%company_name%>", $_SESSION['user']['name'], $body);
			$body = str_replace("<%potential_new%>", $html, $body);
			$title = "Nhà tuyển dụng xem hồ sơ";
			$send_status = SendMail123($title, $employee['name'], $employee['email'], $body);
			var_dump($send_status);
		}
	}
}
