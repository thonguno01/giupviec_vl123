<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		$this->load->helper('url');
		$this->load->library('session');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function register_company()
	{
		$email_check = [
			'email' => $this->input->post('email')
		];
		$data_email_check = $this->Generals_model->get_where('tbl_companys', $email_check);
		$name_check = [
			'alias' => create_slug($this->input->post('name'))
		];
		$data_name_check = $this->Generals_model->get_where('tbl_companys', $name_check);
		if (empty($data_email_check) && empty($data_name_check)) {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$birth = strtotime($this->input->post('birth'));
			$city = $this->input->post('city');
			$district = $this->input->post('district');
			$address = $this->input->post('address');
			if (isset($_FILES['file'])) {
				$image = $_FILES['file']['name'];
			} else {
				$image = '';
			}
			$token = random_string(50);
			$company = [
				'name' => $name,
				'phone' => $phone,
				'email' => $email,
				'password' => $password,
				'alias' => create_slug($name),
				'active' => 0,
<<<<<<< HEAD
				'point_free' => 5,
=======
				'point_free'=>5,
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				'birth' => $birth,
				'city_id' => $city,
				'district_id' => $district,
				'address' => $address,
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'time_mail' => strtotime(date("Y-m-d H:i:s")),
				'email_verify_token' => $token,
				'image' => $image

			];


			//upload ảnh đại diện
			$last_id = $this->Generals_model->insert('tbl_companys', $company);
			$path = "upload/companys/company_" . $last_id;
			mkdir($path, 0777);
			if (isset($_FILES['file'])) {
				$full_path = $path . '/' . basename($_FILES["file"]["name"]);
				move_uploaded_file($_FILES['file']['tmp_name'], $full_path);
			}
			//hết upload ảnh đại diện

			//xoa ung vien dang ky loi
			$data_user_not_complete = [
				'user_email' => $email
			];
			$this->Generals_model->delete('companys_not_complete_profile', $data_user_not_complete);
			//het xoa ung vien dang ky loi

<<<<<<< HEAD
			$link = $this->getCurUrl() . '/company-verify-success/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/company-verify-success-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/verify_company.html');
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $email, $body);
			$title = "Xác thực tài khoản nhà tuyển dụng";
			$register = SendMail123($title, $name, $email, $body);
			if (session_id() === '') session_start();
			$_SESSION['company_email_verify_token'] = $token;
<<<<<<< HEAD
			$user = $this->Generals_model->get_one_where('tbl_companys', ['id' => $last_id]);
			$user['user_type'] = 1;
=======
			$user=$this->Generals_model->get_where('tbl_companys', ['id'=>$last_id]);
			$user['user_type']=1;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$this->session->set_userdata(['user' => $user]);
		} else {
			if (!empty($data_email_check)) {
				$register = [
					'result' => 'FALSE',
					'message' => 'Email đã tồn tại!'
				];
			}
			elseif (!empty($data_name_check)) {
				$this->not_complete_company();
				$register = [
					'result' => 'FALSE',
					'message' => 'Tên nhà tuyển dụng đã tồn tại!'
				];
			}
		}
		die(json_encode($register));
	}

	public function not_complete_company()
	{
		$data_user_not_complete = [
			'user_email' => $this->input->post('email')
		];
		$data_user = [
			'email' => $this->input->post('email')
		];
		$data_user_not_complete_check = $this->Generals_model->get_where('companys_not_complete_profile', $data_user_not_complete);
		$data_user_check = $this->Generals_model->get_where('tbl_companys', $data_user);
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$birth = strtotime($this->input->post('birth'));
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$address = $this->input->post('address');
		$company = [
			'user_name' => $name,
			'user_phone' => $phone,
			'user_email' => $email,
			'user_birthday' => $birth,
			'user_city_id' => $city,
			'user_district_id' => $district,
			'user_address' => $address,
			'create_at' => strtotime(date("Y-m-d H:i:s")),
			'update_at' => strtotime(date("Y-m-d H:i:s")),
		];
		if (empty($data_user_not_complete_check) && empty($data_user_check)) {
			$this->Generals_model->insert('companys_not_complete_profile', $company);
		} else {
			if (!empty($data_user_not_complete_check)) {
				$company = [
					'user_name' => $name,
					'user_phone' => $phone,
					'user_birthday' => $birth,
					'user_city_id' => $city,
					'user_district_id' => $district,
					'user_address' => $address,
					'update_at' => strtotime(date("Y-m-d H:i:s")),
				];
				$this->Generals_model->update('companys_not_complete_profile', ['user_email' => $email], $company);
			}
		}
	}
<<<<<<< HEAD

	
	// check Company dang nhap 
=======
	// check Company dang nhap 

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	public function login_company()
	{
		$output = [];
		$email = $this->input->post('email');
		$password = $this->input->post('password');
<<<<<<< HEAD
		$user_employee = [
=======
		$user_employee = [ 
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			'email' => $email,
			'password' => md5($password)
		];
		$user =  $this->Generals_model->get_one_where('tbl_companys', $user_employee);
		if (!empty($user)) {
			if ($user['turn'] == 0) {
				$output['result'] = false;
<<<<<<< HEAD
				$output['message'] = 'Tài khoản đã bị khóa!';
			} else {
				$last_time_login = date('Y-m-d', $user['login_at']);
				if ($last_time_login != date('Y-m-d')) {
					$this->Generals_model->update('tbl_companys', ['id' => $user['id']], ['point_free' => 5]);
				}
				$user['user_type'] = 1;
				$this->session->set_userdata(['user' => $user]);
				$this->Generals_model->update('tbl_companys', ['id' => $user['id']], ['login_at' => strtotime(date('Y-m-d H:i:s'))]);
				$output['result'] = true;
				$output['message'] = 'Đăng nhập thành công!';
=======
				$output = 'Tài khoản đã bị khóa!';
			} else {
					$user['user_type']=1;
					$this->session->set_userdata(['user' => $user]);
					$output['result'] = true;
					$output['message'] = 'Đăng nhập thành công!';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			}
		} else {
			$output['result'] = false;
			$output['message'] = 'Email hoặc mật khẩu chưa chính xác!';
		}
		echo json_encode($output);
	}

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

	public function register_company_success($token)
	{
		$company = $this->Generals_model->get_one_where('tbl_companys', ['email_verify_token' => $token]);
		if (!empty($company) && $company['active'] == '0') {
			$this->Generals_model->active_user('tbl_companys', $token);
<<<<<<< HEAD
			$this->Generals_model->update('tbl_companys', ['email_verify_token' => $token], ['email_verify_token' => '']);
			$company['user_type'] = 1;
=======
			$this->Generals_model->update('tbl_companys',['email_verify_token'=>$token],['email_verify_token'=>'']);
			$company['user_type']=1;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$this->session->set_userdata(['user' => $company]);
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/register_company_success',
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
		if (isset($_SESSION['company_email_verify_token'])) {
			$token = $_SESSION['company_email_verify_token'];
			$company = $this->Generals_model->get_one_where('tbl_companys', ['email_verify_token' => $token]);
		}
		if (!empty($company) && $company['active'] == '0') {
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/company-verify-success/' . $token . '.html';
=======
			$link = $this->getCurUrl() . '/company-verify-success-' . $token . '.html';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = file_get_contents('email/verify_company.html');
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $company['email'], $body);
			$title = "Xác thực tài khoản nhà tuyển dụng";
			$send_status = SendMail123($title, $company['name'], $company['email'], $body);
		} else {
			if (empty($user)) {
				$send_status = [
					'result' => 'false',
					'message' => "Gửi email không thành công!"
				];
			}
			if ($company['active'] != '0') {
				$send_status = [
					'result' => 'false',
					'message' => "Tài khoản đã được xác thực"
				];
			}
		}
		die(json_encode($send_status));
	}
	function check_email_company()
	{
		$data_user = [
			'email' => $this->input->post('email')
		];
		$data_user_check = $this->Generals_model->get_where('tbl_companys', $data_user);
		if (empty($data_user_check)) {
			$output = false;
		} else {
			$output = true;
		}
		echo json_encode($output);
	}

	//dat lai mat khau
	public function forgot_password()
	{
		$email = $this->input->post('email');
		$checkEmail = [
			'email' => $email,
		];
		$company = $this->Generals_model->get_one_where('tbl_companys', $checkEmail);
		if (empty($company)) {
			$output['result'] = 'FALSE';
			$output['message'] = 'Email không tồn tại!';
		} else {
			$token = random_string(50);
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/company-reset-password/' . $token . '.html';
			$body = file_get_contents('email/reset_password.html');
			$account_type = "Nhà tuyển dụng";
=======
			$link = $this->getCurUrl() . '/company-reset-password-token-' . $token . '.html';
			$body = file_get_contents('email/reset_password.html');
			$account_type="Nhà tuyển dụng";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = str_replace("<%account_type%>", $account_type, $body);
			$body = str_replace("<%name%>", $company['name'], $body);
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $email, $body);
			$title = "Đặt lại mật khẩu tài khoản người tuyển dụng";
			$send_status = SendMail123($title, $company['name'], $email, $body);
			if ($send_status == true) {
				$output = $send_status;
			}
			$this->Generals_model->update('tbl_companys', ['email' => $email], ['reset_password_token' => $token]);
			$_SESSION['company_reset_password_token'] = $token;
		}
		echo json_encode($output);
	}
	public function resend_email_forgot()
	{
		if (isset($_SESSION['company_reset_password_token'])) {
			$token = $_SESSION['company_reset_password_token'];
			$company = $this->Generals_model->get_one_where('tbl_companys', ['reset_password_token' => $token]);
		}
		if (!empty($company)) {
<<<<<<< HEAD
			$link = $this->getCurUrl() . '/company-reset-password/' . $token . '.html';
			$body = file_get_contents('email/reset_password.html');
			$account_type = "Nhà tuyển dụng";
=======
			$link = $this->getCurUrl() . '/company-reset-password-token-' . $token . '.html';
			$body = file_get_contents('email/reset_password.html');
			$account_type="Nhà tuyển dụng";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$body = str_replace("<%account_type%>", $account_type, $body);
			$body = str_replace("<%name%>", $company['name'], $body);
			$body = str_replace("<%link%>", $link, $body);
			$body = str_replace("<%email%>", $company['email'], $body);
			$title = "Đặt lại mật khẩu tài khoản người giúp việc";
			$send_status = SendMail123($title, $company['name'], $company['email'], $body);
		} else {
			if (empty($company)) {
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
		$company = $this->Generals_model->get_one_where('tbl_companys', ['reset_password_token' => $token]);
		if (!empty($company)) {
			$_SESSION['company_reset_password_token'] = $token;
			$data = [
				'header' => 'header',
				'footer' => 'footer',
				'page_name' => 'home/user/reset_password',
				'style' => ['/css/user/user.css', '/css/user/reset_password.css'],
				'js' => ['/scripts/home/user/reset_password_company.js'],
			];
			$this->load->view('home/index', $data);
		} else {
<<<<<<< HEAD
			redirect($this->getCurURL() . '/user/error');
		}
	}

	public function handle_reset_password()
	{
		$token = $_SESSION['company_reset_password_token'];
		$password = md5($this->input->post('password'));
		$user = $this->Generals_model->get_one_where('tbl_companys', ['reset_password_token' => $token]);
		if (!empty($user)) {
			$this->Generals_model->update('tbl_companys', ['reset_password_token' => $token], ['password' => $password, 'reset_password_token' => '','update_at'=>strtotime(date('Y-m-d H:i:s'))]);
			$output['result'] = true;
		} else {
			$output['result'] = false;
		}
		echo json_encode($output);
	}
=======
			redirect($this->getCurURL() . '/user/error'); 
		}
	}

	public function handle_reset_password(){
		$token=$_SESSION['company_reset_password_token'];
		$password=md5($this->input->post('password'));
		$user = $this->Generals_model->get_one_where('tbl_companys', ['reset_password_token' => $token]);
		if(!empty($user)){
			$this->Generals_model->update('tbl_companys',['reset_password_token' => $token],['password'=>$password,'reset_password_token' => '']);
			$output['result']=true;
		}
		else{
			$output['result']=false;
		}
		echo json_encode($output);
	}

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
}
