<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(array('Generals_model','Home/City_model'));
		$this->load->helper(['function', 'url']);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function register_employee()
	{
		$data_check = [
			'email' => $this->input->post('email')
		];
		$data_user_check = $this->Generals_model->get_where('tbl_users', $data_check);
		if (empty($data_user_check)) {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$birth = strtotime($this->input->post('birth'));
			$city = $this->input->post('city');
			$district = $this->input->post('district');
			$address = $this->input->post('address');
			$job_style = $this->input->post('job_style');
			$work_type = $this->input->post('work_type');
			$experience = $this->input->post('experience');
			$education = $this->input->post('education');
			$sal_type = $this->input->post('sal_type');
			$salary1 = $this->input->post('salary1');
			$salary2 = $this->input->post('salary2');
			$sal_time = $this->input->post('sal_time');
			if (isset($_FILES['file'])) {
				$image = $_FILES['file']['name'];
			} else {
				$image = '';
			}
			$token = random_string(50);
			$user = [
					'name' => $name,
					'phone' => $phone,
					'email' => $email,
					'password' => $password,
					'alias' => create_slug($name),
					'active' => 0,
					'birth' => $birth,
					'city_id' => $city,
					'district_id' => $district,
					'address' => $address,
					'job_style_id' =>  $job_style,
					'work_type_id' =>  $work_type,
					'exp' => $experience,
					'edu' => $education,
					'salary_type' => $sal_type,
					'salary1' => $salary1,
					'salary2' => $salary2,
<<<<<<< HEAD
					'salary_time' => $sal_time,
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					'create_at' => strtotime(date("Y-m-d H:i:s")),
					'update_at' => strtotime(date("Y-m-d H:i:s")),
					'time_mail' => strtotime(date("Y-m-d H:i:s")),
					'email_verify_token' => $token,
					'image' => $image

			];
			$user_calendar = [
				't2_ca1_bd' => $this->input->post('t2_ca1_bd'),
				't2_ca1_kt' => $this->input->post('t2_ca1_kt'),
				't3_ca1_bd' => $this->input->post('t3_ca1_bd'),
				't3_ca1_kt' => $this->input->post('t3_ca1_kt'),
				't4_ca1_bd' => $this->input->post('t4_ca1_bd'),
				't4_ca1_kt' => $this->input->post('t4_ca1_kt'),
				't5_ca1_bd' => $this->input->post('t5_ca1_bd'),
				't5_ca1_kt' => $this->input->post('t5_ca1_kt'),
				't6_ca1_bd' => $this->input->post('t6_ca1_bd'),
				't6_ca1_kt' => $this->input->post('t6_ca1_kt'),
				't7_ca1_bd' => $this->input->post('t7_ca1_bd'),
				't7_ca1_kt' => $this->input->post('t7_ca1_kt'),
				't8_ca1_bd' => $this->input->post('t8_ca1_bd'),
				't8_ca1_kt' => $this->input->post('t8_ca1_kt'),
				't2_ca2_bd' => $this->input->post('t2_ca2_bd'),
				't2_ca2_kt' => $this->input->post('t2_ca2_kt'),
				't3_ca2_bd' => $this->input->post('t3_ca2_bd'),
				't3_ca2_kt' => $this->input->post('t3_ca2_kt'),
				't4_ca2_bd' => $this->input->post('t4_ca2_bd'),
				't4_ca2_kt' => $this->input->post('t4_ca2_kt'),
				't5_ca2_bd' => $this->input->post('t5_ca2_bd'),
				't5_ca2_kt' => $this->input->post('t5_ca2_kt'),
				't6_ca2_bd' => $this->input->post('t6_ca2_bd'),
				't6_ca2_kt' => $this->input->post('t6_ca2_kt'),
				't7_ca2_bd' => $this->input->post('t7_ca2_bd'),
				't7_ca2_kt' => $this->input->post('t7_ca2_kt'),
				't8_ca2_bd' => $this->input->post('t8_ca2_bd'),
				't8_ca2_kt' => $this->input->post('t8_ca2_kt'),
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s"))
			];
			// var_dump($user_calender);
			// die();
			// // $this->Generals_model->insert('tbl_users', $user);

			//upload ảnh đại diện
			$last_id = $this->Generals_model->insert('tbl_users', $user);
			$this->City_model->update_count_worker($district);
			$path = "upload/users/user_" . $last_id;
			mkdir($path, 0777);
			if (isset($_FILES['file'])) {
				$full_path = $path . '/' . basename($_FILES["file"]["name"]);
				move_uploaded_file($_FILES['file']['tmp_name'], $full_path);
			}
			//hết upload ảnh đại diện

			//insert lich lam viec
			$user_calendar['user_id'] = $last_id;
			$this->Generals_model->insert('user_calendar', $user_calendar);
			//het insert lich lam viec

			//xoa ung vien dang ky loi
			$data_user_not_complete = [
				'user_email' => $email
			];
			$this->Generals_model->delete('users_not_complete_profile', $data_user_not_complete);
			//het xoa ung vien dang ky loi

<<<<<<< HEAD
			$link = $this->getCurUrl() . '/employee-verify-success/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/employee-verify-success-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/verify_employee.html');
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $email, $body);
			$title = "Xác thực tài khoản người giúp việc";
			$register = SendMail123($title, $name, $email, $body);
			if (session_id() === '') session_start();
			$_SESSION['user_email_verify_token'] = $token;
<<<<<<< HEAD
			$user=$this->Generals_model->get_one_where('tbl_users', ['id'=>$last_id]);
=======
			$user=$this->Generals_model->get_where('tbl_users', ['id'=>$last_id]);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$user['user_type']=0;
			$this->session->set_userdata(['user' => $user]);
		} else {
			$register = [
				'result' => 'FALSE',
				'message' => 'Email đã tồn tại!'
			];
		}
		die(json_encode($register));
	}

	public function not_complete_employee()
	{
		$data_user_not_complete = [
			'user_email' => $this->input->post('email')
		];
		$data_user = [
			'email' => $this->input->post('email')
		];
		$data_user_not_complete_check = $this->Generals_model->get_where('users_not_complete_profile', $data_user_not_complete);
		$data_user_check = $this->Generals_model->get_where('tbl_users', $data_user);
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$birth = strtotime($this->input->post('birth'));
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$address = $this->input->post('address');
		$job_style = $this->input->post('job_style');
		$work_type = $this->input->post('work_type');
		$experience = $this->input->post('experience');
		$education = $this->input->post('education');
		$sal_type = $this->input->post('sal_type');
		$salary1 = $this->input->post('salary1');
		$salary2 = $this->input->post('salary2');
		$sal_time = $this->input->post('sal_time');
		echo $sal_time;
		if (empty($data_user_check) && empty($data_user_not_complete_check)) {
			$user = [
				'user_name' => $name,
				'user_phone' => $phone,
				'user_email' => $email,
				'user_birthday' => $birth,
				'user_city_id' => $city,
				'user_district_id' => $district,
				'user_address' => $address,
				'user_job_style_id' =>  $job_style,
				'user_work_type_id' =>  $work_type,
				'user_exp' => $experience,
				'user_edu' => $education,
				'user_salary_type' => $sal_type,
				'user_salary_time' => $sal_time,
				'user_salary1' => $salary1,
				'user_salary2' => $salary2,
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s")),
			];
			$user_calendar = [
				't2_ca1_bd' => $this->input->post('t2_ca1_bd'),
				't2_ca1_kt' => $this->input->post('t2_ca1_kt'),
				't3_ca1_bd' => $this->input->post('t3_ca1_bd'),
				't3_ca1_kt' => $this->input->post('t3_ca1_kt'),
				't4_ca1_bd' => $this->input->post('t4_ca1_bd'),
				't4_ca1_kt' => $this->input->post('t4_ca1_kt'),
				't5_ca1_bd' => $this->input->post('t5_ca1_bd'),
				't5_ca1_kt' => $this->input->post('t5_ca1_kt'),
				't6_ca1_bd' => $this->input->post('t6_ca1_bd'),
				't6_ca1_kt' => $this->input->post('t6_ca1_kt'),
				't7_ca1_bd' => $this->input->post('t7_ca1_bd'),
				't7_ca1_kt' => $this->input->post('t7_ca1_kt'),
				't8_ca1_bd' => $this->input->post('t8_ca1_bd'),
				't8_ca1_kt' => $this->input->post('t8_ca1_kt'),
				't2_ca2_bd' => $this->input->post('t2_ca2_bd'),
				't2_ca2_kt' => $this->input->post('t2_ca2_kt'),
				't3_ca2_bd' => $this->input->post('t3_ca2_bd'),
				't3_ca2_kt' => $this->input->post('t3_ca2_kt'),
				't4_ca2_bd' => $this->input->post('t4_ca2_bd'),
				't4_ca2_kt' => $this->input->post('t4_ca2_kt'),
				't5_ca2_bd' => $this->input->post('t5_ca2_bd'),
				't5_ca2_kt' => $this->input->post('t5_ca2_kt'),
				't6_ca2_bd' => $this->input->post('t6_ca2_bd'),
				't6_ca2_kt' => $this->input->post('t6_ca2_kt'),
				't7_ca2_bd' => $this->input->post('t7_ca2_bd'),
				't7_ca2_kt' => $this->input->post('t7_ca2_kt'),
				't8_ca2_bd' => $this->input->post('t8_ca2_bd'),
				't8_ca2_kt' => $this->input->post('t8_ca2_kt'),
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s"))
			];
			// var_dump($user_calender);
			// die();
			// // $this->Generals_model->insert('tbl_users', $user);

			$last_id = $this->Generals_model->insert('users_not_complete_profile', $user);
			//insert lich lam viec
			$user_calendar['user_not_complete_id'] = $last_id;
			$this->Generals_model->insert('user_calendar', $user_calendar);
			//het insert lich lam viec
		} else {
			if (!empty($data_user_not_complete_check)) {
				$data_user_not_complete = $this->Generals_model->get_one_where('users_not_complete_profile', $data_user_not_complete);
				$user = [
					'user_name' => $name,
					'user_phone' => $phone,
					'user_birthday' => $birth,
					'user_city_id' => $city,
					'user_district_id' => $district,
					'user_address' => $address,
					'user_job_style_id' =>  $job_style,
					'user_work_type_id' =>  $work_type,
					'user_exp' => $experience,
					'user_edu' => $education,
					'user_salary_type' => $sal_type,
					'user_salary_time' => $sal_time,
					'user_salary1' => $salary1,
					'user_salary2' => $salary2,
					'update_at' => strtotime(date("Y-m-d H:i:s"))
				];
				$user_calendar = [
					't2_ca1_bd' => $this->input->post('t2_ca1_bd'),
					't2_ca1_kt' => $this->input->post('t2_ca1_kt'),
					't3_ca1_bd' => $this->input->post('t3_ca1_bd'),
					't3_ca1_kt' => $this->input->post('t3_ca1_kt'),
					't4_ca1_bd' => $this->input->post('t4_ca1_bd'),
					't4_ca1_kt' => $this->input->post('t4_ca1_kt'),
					't5_ca1_bd' => $this->input->post('t5_ca1_bd'),
					't5_ca1_kt' => $this->input->post('t5_ca1_kt'),
					't6_ca1_bd' => $this->input->post('t6_ca1_bd'),
					't6_ca1_kt' => $this->input->post('t6_ca1_kt'),
					't7_ca1_bd' => $this->input->post('t7_ca1_bd'),
					't7_ca1_kt' => $this->input->post('t7_ca1_kt'),
					't8_ca1_bd' => $this->input->post('t8_ca1_bd'),
					't8_ca1_kt' => $this->input->post('t8_ca1_kt'),
					't2_ca2_bd' => $this->input->post('t2_ca2_bd'),
					't2_ca2_kt' => $this->input->post('t2_ca2_kt'),
					't3_ca2_bd' => $this->input->post('t3_ca2_bd'),
					't3_ca2_kt' => $this->input->post('t3_ca2_kt'),
					't4_ca2_bd' => $this->input->post('t4_ca2_bd'),
					't4_ca2_kt' => $this->input->post('t4_ca2_kt'),
					't5_ca2_bd' => $this->input->post('t5_ca2_bd'),
					't5_ca2_kt' => $this->input->post('t5_ca2_kt'),
					't6_ca2_bd' => $this->input->post('t6_ca2_bd'),
					't6_ca2_kt' => $this->input->post('t6_ca2_kt'),
					't7_ca2_bd' => $this->input->post('t7_ca2_bd'),
					't7_ca2_kt' => $this->input->post('t7_ca2_kt'),
					't8_ca2_bd' => $this->input->post('t8_ca2_bd'),
					't8_ca2_kt' => $this->input->post('t8_ca2_kt'),
					'update_at' => strtotime(date("Y-m-d H:i:s"))
				];
				$this->Generals_model->update('users_not_complete_profile', ['user_email' => $email], $user);
				$this->Generals_model->update('user_calendar', ['user_not_complete_id' => $data_user_not_complete['profile_id']], $user_calendar);
			}
		}
	}

	// ============
	// Check user employee dang nhap 
	public function login_employee()
	{
		$output = [];
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user_employee = [ 
			'email' => $email,
			'password' => md5($password)
		];
		$user =  $this->Generals_model->get_one_where('tbl_users', $user_employee);
		if (!empty($user)) {
			if ($user['turn'] == 0) {
				$output['result'] = false;
<<<<<<< HEAD
				$output['message'] = 'Tài khoản đã bị khóa!';
			} else {
					$user['user_type']=0;
					$this->session->set_userdata(['user' => $user]);
					$this->Generals_model->update('tbl_users',['id'=>$user['id']],['update_at'=>strtotime(date("Y-m-d H:i:s"))]);
=======
				$output = 'Tài khoản đã bị khóa!';
			} else {
					$user['user_type']=0;
					$this->session->set_userdata(['user' => $user]);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					$output['result'] = true;
					$output['message'] = 'Đăng nhập thành công!';
			}
		} else {
			$output['result'] = false;
			$output['message'] = 'Email hoặc mật khẩu chưa chính xác!';
		}
		echo json_encode($output);
	}

	// ============================
	// check email lay lai mat khau 
	public function forgot_password()
	{
		$email = $this->input->post('email');
		$checkEmail = [
			'email' => $email,
		];
		$user = $this->Generals_model->get_one_where('tbl_users', $checkEmail);
		if (empty($user)) {
			$output['result'] = 'FALSE';
			$output['message'] = 'Email không tồn tại!';
		} else {
			$token = random_string(50);
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/employee-reset-password/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/employee-reset-password-token-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/reset_password.html');
			$account_type="Người giúp việc";
			$body = str_replace("<%account_type%>", $account_type, $body);
			$body = str_replace("<%name%>", $user['name'], $body);
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $email, $body);
			$title = "Đặt lại mật khẩu tài khoản người giúp việc";
			$send_status = SendMail123($title, $user['name'], $email, $body);
			if ($send_status == true) {
				$output = $send_status;
			}
			$this->Generals_model->update('tbl_users', ['email' => $email], ['reset_password_token' => $token]);
			$_SESSION['user_reset_password_token'] = $token;
		}
		echo json_encode($output);
	}

	public function resend_email_forgot()
	{
		if (isset($_SESSION['user_reset_password_token'])) {
			$token = $_SESSION['user_reset_password_token'];
			$user = $this->Generals_model->get_one_where('tbl_users', ['reset_password_token' => $token]);
		}
		if (!empty($user)) {
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/employee-reset-password/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/employee-reset-password-token-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/reset_password.html');
			$account_type="Người giúp việc";
			$body = str_replace("<%account_type%>", $account_type, $body);
			$body = str_replace("<%name%>", $user['name'], $body);
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $user['email'], $body);
			$title = "Đặt lại mật khẩu tài khoản người giúp việc";
			$send_status = SendMail123($title, $user['name'], $user['email'], $body);
		} else {
			if (empty($user)) {
				$send_status = [
					'result' => 'false',
					'message' => "Gửi email không thành công!"
				];
			}
		}
		die(json_encode($send_status));
	}
	public function reset_password($token)
	{
		$user = $this->Generals_model->get_one_where('tbl_users', ['reset_password_token' => $token]);
		if (!empty($user)) {
			$_SESSION['user_reset_password_token'] = $token;
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/reset_password',
				'style' => ['/css/user/user.css', '/css/user/reset_password.css'],
				'js' => ['/scripts/home/user/reset_password_employee.js'],
			];
			$this->load->view('home/index', $data);
		} else {
			redirect($this->getCurURL() . '/user/error'); 
		}
<<<<<<< HEAD
	}

	public function handle_reset_password(){
		$token=$_SESSION['user_reset_password_token'];
		$password=md5($this->input->post('password'));
		$user = $this->Generals_model->get_one_where('tbl_users', ['reset_password_token' => $token]);
		if(!empty($user)){
			$this->Generals_model->update('tbl_users',['reset_password_token' => $token],['password'=>$password,'reset_password_token' => '','update_at'=>strtotime(date('Y-m-d H:i:s'))]);
			$output['result']=true;
		}
		else{
			$output['result']=false;
		}
		echo json_encode($output);
	}

=======
	}

	public function handle_reset_password(){
		$token=$_SESSION['user_reset_password_token'];
		$password=md5($this->input->post('password'));
		$user = $this->Generals_model->get_one_where('tbl_users', ['reset_password_token' => $token]);
		if(!empty($user)){
			$this->Generals_model->update('tbl_users',['reset_password_token' => $token],['password'=>$password,'reset_password_token' => '']);
			$output['result']=true;
		}
		else{
			$output['result']=false;
		}
		echo json_encode($output);
	}

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	public function get_list_district()
	{
		$cit_id = $this->input->get('cit_id');
		$list_district = $this->Generals_model->get_list_district($cit_id);
		echo json_encode($list_district);
	}

	function getCurURL()
	{
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
			$pageURL = "https://";
		} else {
			$pageURL = 'http://';
		}
		if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"];
		}
		return $pageURL;
	}

	public function register_employee_success($token)
	{
		$user = $this->Generals_model->get_one_where('tbl_users', ['email_verify_token' => $token]);
		if (!empty($user) && $user['active'] == '0') {
			$this->Generals_model->active_user('tbl_users', $token);
			$this->Generals_model->update('tbl_users',['email_verify_token'=>$token],['email_verify_token'=>'']);
			$user['user_type']=0;
			$this->session->unset_userdata('user');
			$this->session->set_userdata(['user' => $user]);
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/register_employee_success',
				'style' => ['/css/select2.min.css', '/css/user/user.css', '/css/user/register_success.css'],
				'js' => [],
			];
			$this->load->view('home/index', $data);
		} else {
			redirect($this->getCurURL() . '/user/error');
		}
	}

	public function resend_email()
	{
		if (isset($_SESSION['user_email_verify_token'])) {
			$token = $_SESSION['user_email_verify_token'];
			$user = $this->Generals_model->get_one_where('tbl_users', ['email_verify_token' => $token]);
		}
		if (!empty($user) && $user['active'] == '0') {
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/employee-verify-success/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/employee-verify-success-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/verify_employee.html');
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $user['email'], $body);
			$title = "Xác thực tài khoản người giúp việc";
			$send_status = SendMail123($title, $user['name'], $user['email'], $body);
		} else {
			if (empty($user)) {
				$send_status = [
					'result' => 'false',
					'message' => "Gửi email không thành công!"
				];
			} else if ($user['active'] != '0') {
				$send_status = [
					'result' => 'false',
					'message' => "Tài khoản đã được xác thực"
				];
			}
		}
		die(json_encode($send_status));
	}

	function check_email_employee()
	{
		$data_user = [
			'email' => $this->input->post('email')
		];
		$data_user_check = $this->Generals_model->get_where('tbl_users', $data_user);
		if (empty($data_user_check)) {
			$output = false;
		} else {
			$output = true;
		}
		echo json_encode($output);
	}

	function logout(){
		$this->session->unset_userdata('user');
	}
}
