<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
<<<<<<< HEAD
		$this->load->model(['Generals_model','Home/City_model','Home/News_model']);
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function change_employee_status()
	{
		$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
		if ($user['status'] == 0) {
			$this->Generals_model->update('tbl_users', ['id' => $_SESSION['user']['id']], ['status' => 1]);
			$status = 1;
		} else {
			$this->Generals_model->update('tbl_users', ['id' => $_SESSION['user']['id']], ['status' => 0]);
			$status = 0;
=======
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function change_employee_status()
	{
		$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
		if($user['status']==0){
			$this->Generals_model->update('tbl_users',['id'=>$_SESSION['user']['id']],['status'=>1]);
			$status=1;
		}
		else{
			$this->Generals_model->update('tbl_users',['id'=>$_SESSION['user']['id']],['status'=>0]);
			$status=0;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		}
		// var_dump($_SESSION['user']=$user);
		echo $status;
	}

<<<<<<< HEAD
	public function renew_profile()
	{
		$data = [
			'update_at' => strtotime(date("Y-m-d H:i:s"))
		];
		// $user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
		if ($this->Generals_model->update('tbl_users', ['id' => $_SESSION['user']['id']], $data)) {
			$result = true;
		} else {
			$result = false;
		}
		die(json_encode($result));
	}

	public function renew_post()
	{
		$id=$this->input->post('id');
		$data = [
			'update_at' => strtotime(date("Y-m-d H:i:s"))
		];
		// $user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
		if ($this->Generals_model->update('tbl_news', ['id' => $id], $data)) {
			$result = true;
		} else {
			$result = false;
=======
	public function renew_profile(){
		$data=[
			'update_at' => strtotime(date("Y-m-d H:i:s"))
		];
		// $user=$this->Generals_model->get_one_where('tbl_users',['id'=>$_SESSION['user']['id']]);
		if($this->Generals_model->update('tbl_users',['id'=>$_SESSION['user']['id']],$data)){
			$result=1;
		}
		else{
			$result=$_SESSION['user']['id'];
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		}
		die(json_encode($result));
	}

<<<<<<< HEAD
	public function unsave_new()
	{
		$id = $this->input->post('id');
		$this->Generals_model->delete('tbl_save_news', ['id' => $id]);
	}

	public function unapply_new()
	{
		$id = $this->input->post('id');
		$this->Generals_model->delete('tbl_apply', ['id' => $id]);
		echo $id;
	}

	public function unsave_employee()
	{
		$id = $this->input->post('id');
		$this->Generals_model->delete('tbl_save_users', ['id' => $id]);
	}

	public function update_user_profile()
	{
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
		if ($user['email'] != $email || $user['phone'] != $phone) {
			$output['result'] = false;
			$output['message'] = 'Cập nhật thông tin không thành công!';
			die(json_encode($output));
		}
		if (!empty($user)) {
=======
	public function unsave_new(){
		$id=$this->input->post('id');
		$this->Generals_model->delete('tbl_save_news',['id'=>$id]);
	}

	public function unapply_new(){
		$id=$this->input->post('id');
		$this->Generals_model->delete('tbl_apply',['id'=>$id]);
		echo $id;
	}

	public function update_user_profile(){
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$user = $this->Generals_model->get_one_where('tbl_users', ['id'=>$_SESSION['user']['id']]);
		if($user['email']!=$email || $user['phone']!=$phone){
			$output['result']=false;
			$output['message']='Cập nhật thông tin không thành công!';
			die(json_encode($output));
		}
		if(!empty($user)){
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			$name = $this->input->post('name');
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
<<<<<<< HEAD
			$sal_time = $this->input->post('sal_time');
			$intro = $this->input->post('intro');
			$work_process = $this->input->post('work_process');
			$job_skill = $this->input->post('job_skill');
=======
			$intro=$this->input->post('intro');
			$work_process=$this->input->post('work_process');
			$job_skill=$this->input->post('job_skill');
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
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
<<<<<<< HEAD
			$data = [
=======
			$data=[
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				'name' => $name,
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
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'intro' => $intro,
				'work_process' => $work_process,
				'job_skill' => $job_skill
			];
			$this->Generals_model->update('tbl_users', ['email' => $user['email']], $data);
			$this->Generals_model->update('user_calendar', ['user_id' => $user['id']], $user_calendar);
			$this->City_model->update_count_worker($district);
			$this->City_model->update_count_worker($user['district_id']);
			$output['result'] = true;
			$output['message'] = 'Cập nhật thông tin thành công!';
		} else {
			$output['result'] = false;
			$output['message'] = 'Cập nhật thông tin không thành công!';
		}
		die(json_encode($output));
	}

	function update_company_profile(){
		if($_SESSION['user']['user_type']==1){
			$company_id=$_SESSION['user']['id'];
			$name=$this->input->post('name');
			$birth=$this->input->post('birth');
			$city_id=$this->input->post('city_id');
			$district_id=$this->input->post('district_id');
			$address=$this->input->post('address');
			$check_name=$this->Generals_model->get_where('tbl_companys',['name'=>$name,'id !='=>$company_id]);
			if(empty($check_name)){
			$data=[
				'name'=>$name,
				'birth'=>strtotime($birth),
				'city_id'=>$city_id,
				'district_id'=>$district_id,
				'address'=>$address,
				'update_at'=>date('Y-m-d H:i:s')
			];
			if($this->Generals_model->update('tbl_companys',['id'=>$company_id],$data)){
			$result=true;
			$message="Cập nhật thông tin thành công!";
			}
		}
			else{
				$result=false;
				$message="Tên nhà tuyển dụng đã tồn tại!";
			}
		}
		$output=[
			'result'=>$result,
			'message'=>$message
		];
		die(json_encode($output));
	}

	function update_image()
	{
		if($_SESSION['user']['user_type']==0){
		$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
		$image = $_FILES['image'];
		$image_path = 'upload/users/user_' . $user['id'];
		if (!empty($user['image'])) {
			$image_full_path = $image_path . '/' . $user['image'];
			unlink($image_full_path);
		}
		$image_full_path = $image_path . '/' . basename($image["name"]);
		if (move_uploaded_file($image['tmp_name'], $image_full_path)) {
			$this->Generals_model->update('tbl_users', ['id' => $user['id']], ['image' => $image['name'], 'update_at' => strtotime(date("Y-m-d H:i:s"))]);
		}
		}
		else{
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
		$image = $_FILES['image'];
		$image_path = 'upload/companys/company_' . $company['id'];
		if (!empty($company['image'])) {
			$image_full_path = $image_path . '/' . $company['image'];
			unlink($image_full_path);
		}
		$image_full_path = $image_path . '/' . basename($image["name"]);
		if (move_uploaded_file($image['tmp_name'], $image_full_path)) {
			$this->Generals_model->update('tbl_companys', ['id' => $company['id']], ['image' => $image['name'], 'update_at' => strtotime(date("Y-m-d H:i:s"))]);
		}
		}
	}

	function change_password()
	{
		if ($_SESSION['user']['user_type'] == 0) {
			$current_pass = md5($this->input->post('current_pass'));
			$new_pass = md5($this->input->post('new_pass'));
			$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $_SESSION['user']['id']]);
			if (!empty($user)) {
				if ($current_pass == $user['password']) {
					$this->Generals_model->update('tbl_users', ['id' => $user['id']], ['password' => $new_pass, 'update_at' => strtotime(date("Y-m-d H:i:s"))]);
					$output['result'] = true;
					$output['message'] = "Đổi mật khẩu thành công!";
				} else {
					$output['result'] = false;
					$output['invalid_pass'] = true;
					$output['message'] = "Mật khẩu hiện tại không đúng!";
				}
			} else {
				$output['result'] = false;
				$output['message'] = "Đổi mật khẩu không thành công!";
			}
			die(json_encode($output));
		}
		else{
			$current_pass = md5($this->input->post('current_pass'));
			$new_pass = md5($this->input->post('new_pass'));
			$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $_SESSION['user']['id']]);
			if (!empty($company)) {
				if ($current_pass == $company['password']) {
					$this->Generals_model->update('tbl_companys', ['id' => $company['id']], ['password' => $new_pass, 'update_at' => strtotime(date("Y-m-d H:i:s"))]);
					$output['result'] = true;
					$output['message'] = "Đổi mật khẩu thành công!";
				} else {
					$output['result'] = false;
					$output['invalid_pass'] = true;
					$output['message'] = "Mật khẩu hiện tại không đúng!";
				}
			} else {
				$output['result'] = false;
				$output['message'] = "Đổi mật khẩu không thành công!";
			}
			die(json_encode($output));
		}
	}

	function change_new_status()
	{
		$id = $this->input->post('id');
		$new_status = $this->input->post('new_status');
		$this->Generals_model->update('tbl_news', ['id' => $id], ['new_status' => $new_status,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
	}

	function submit_post()
	{
		//check thời gian đăng bài, số bài trong ngày
		$count_new_day=count($this->News_model->get_list_day_now($_SESSION['user']['id']));
		$time_last_news=$this->News_model->get_time_last_new($_SESSION['user']['id']);
		$time_now=strtotime(date('Y-m-d H:i:s'));
		$time_check=false;
		$number_new_check=false;
		if($time_last_news==0){
			$time_check=true;
		}
		else {
			if($time_last_news-$time_now>600){
				$time_check=true;
			}
		}
		if($count_new_day<24){
			$number_new_check=true;
		}

		$title = $this->input->post('title');
		$alias = create_slug($title);
		$job_style = $this->input->post('job_style');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$address = $this->input->post('address');
		$work_type_id = $this->input->post('work_type_id');
		$exp = $this->input->post('exp');
		$edu = $this->input->post('edu');
		$salary_type = $this->input->post('salary_type');
		$salary1 = $this->input->post('salary1');
		$salary2 = $this->input->post('salary2');
		$salary_time = $this->input->post('salary_time');
		$age_from = $this->input->post('age_from');
		$age_to = $this->input->post('age_to');
		$day_start = $this->input->post('day_start');
		$day_close = $this->input->post('day_close');
		$job_require = $this->input->post('job_require');
		$job_detail = $this->input->post('job_detail');
		$job_benefit = $this->input->post('job_benefit');
		$check_alias = $this->Generals_model->get_one_where('tbl_news', ['alias' => $alias]);
		$title_exist = false;
		if (!empty($check_alias)) {
			$title_exist = true;
		}
		$check_title = $this->Generals_model->get_one_where('tbl_news', ['title' => $title]);
		if (!empty($check_title)) {
			$title_exist = true;
		}
		$check_company_post_data = [
			'job_style_id' => $job_style,
			'city_id' => $city,
			'district_id' => $district,
			'company_id' => $_SESSION['user']['id']
		];
		$check_tag = $this->Generals_model->get_one_where('tbl_news', $check_company_post_data);
		$post_exist_id='';
		if (!empty($check_tag)) {
			$post_exist = true;
			$post_exist_id=$check_tag['id'];
		} else {
			$post_exist = false;
		}
		$result=false;
		if (!$title_exist && !$post_exist && $time_check && $number_new_check) {
			$post_data = [
				'company_id'=>$_SESSION['user']['id'],
				'alias' => create_slug($title),
				'title' => $title,
				'exp' => $exp,
				'edu' => $edu,
				'age_from' => $age_from,
				'age_to' => $age_to,
				'city_id' => $city,
				'district_id' => $district,
				'address' => $address,
				'salary1' => $salary1,
				'salary2' => $salary2,
				'salary_type' => $salary_type,
				'salary_time' => $salary_time,
				'new_status' => 1,
				'start_time' => strtotime($day_start),
				'close_time' => strtotime($day_close),
				'job_style_id' => $job_style,
				'work_type_id' => $work_type_id,
				'description' => $job_detail,
				'request' => $job_require,
				'interest' => $job_benefit,
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'status' => 1
			];
			$result=$this->Generals_model->insert('tbl_news',$post_data);
			$this->Generals_model->update('tbl_companys',['id'=>$_SESSION['user']['id']],['not_post'=>1]);
			$this->City_model->update_count_job($district);
			$work_calendar = [
				'new_id'=>$result,
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
			$this->Generals_model->insert('new_calendar',$work_calendar);
		}
		$output=[
			'title_exist'=>$title_exist,
			'post_exist'=>$post_exist,
			'result'=>$result,
			'post_exist_id'=>$post_exist_id,
			'time_check'=>$time_check,
			'number_new_check'=>$number_new_check
		];
		die(json_encode($output));
	}




	function update_post()
	{
		$new_id=$this->input->post('post_id');
		$title = $this->input->post('title');
		$job_style = $this->input->post('job_style');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$address = $this->input->post('address');
		$work_type_id = $this->input->post('work_type_id');
		$exp = $this->input->post('exp');
		$edu = $this->input->post('edu');
		$salary_type = $this->input->post('salary_type');
		$salary1 = $this->input->post('salary1');
		$salary2 = $this->input->post('salary2');
		$salary_time = $this->input->post('salary_time');
		$age_from = $this->input->post('age_from');
		$age_to = $this->input->post('age_to');
		$day_start = $this->input->post('day_start');
		$day_close = $this->input->post('day_close');
		$job_require = $this->input->post('job_require');
		$job_detail = $this->input->post('job_detail');
		$job_benefit = $this->input->post('job_benefit');
		$last_new=$this->Generals_model->get_one_where('tbl_news',['id'=>$new_id]);
		$title_exist = false;
		$check_title = $this->Generals_model->get_one_where('tbl_news', ['title' => $title,'id !='=>$new_id]);
		if (!empty($check_title)) {
			$title_exist = true;
		}
		$check_company_post_data = [
			'job_style_id' => $job_style,
			'city_id' => $city,
			'district_id' => $district,
			'company_id' => $_SESSION['user']['id']
		];
		$post_exist_id='';
		$post_exist = false;
		$check_tag = $this->Generals_model->get_where('tbl_news', $check_company_post_data);
		if (!empty($check_tag)) {
			foreach($check_tag as $post){
				if($post['id']!=$new_id){
					$post_exist = true;
					$post_exist_id=$post['id'];
				}
			}
		}
		$result=false;
		if (!$post_exist && !$title_exist) {
			$post_data = [
				'company_id'=>$_SESSION['user']['id'],
				'title' => $title,
				'exp' => $exp,
				'edu' => $edu,
				'age_from' => $age_from,
				'age_to' => $age_to,
				'city_id' => $city,
				'district_id' => $district,
				'address' => $address,
				'salary1' => $salary1,
				'salary2' => $salary2,
				'salary_type' => $salary_type,
				'salary_time' => $salary_time,
				'new_status' => 1,
				'start_time' => strtotime($day_start),
				'close_time' => strtotime($day_close),
				'job_style_id' => $job_style,
				'work_type_id' => $work_type_id,
				'description' => $job_detail,
				'request' => $job_require,
				'interest' => $job_benefit,
				'update_at' => strtotime(date("Y-m-d H:i:s")),
			];
			$result=$this->Generals_model->update('tbl_news',['id'=>$new_id,'company_id'=>$_SESSION['user']['id']],$post_data);
			$this->City_model->update_count_job($district);
			$this->City_model->update_count_job($last_new['district_id']);
			$work_calendar = [
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
			$this->Generals_model->update('new_calendar',['new_id'=>$new_id],$work_calendar);
		}
		$output=[
			'title_exist'=>$title_exist,
			'post_exist'=>$post_exist,
			'post_exist_id'=>$post_exist_id,
			'result'=>$result
		];
		die(json_encode($output));
	}

	function update_apply_status(){
		$status=$this->input->post('apply_status');
		$id=$this->input->post('apply_id');
		$apply=$this->Generals_model->get_one_where('tbl_apply',['id'=>$id]);
		$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$apply['user_id']]);
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$apply['company_id']]);
		$result=$this->Generals_model->update('tbl_apply',['id'=>$id],['status'=>$status,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		if($status==1){
			$noti=[
				'user_id'=>$user['id'],
				'company_id'=>$company['id'],
				'noti_type'=>2,
				'owner_type'=>0,
				'new_id'=>$apply['new_id'],
				'create_at'=>strtotime(date('Y-m-d H:i:s'))
			];
			$this->Generals_model->insert('tbl_notify',$noti);
		}
		elseif($status==2){
			$noti=[
				'user_id'=>$user['id'],
				'company_id'=>$company['id'],
				'noti_type'=>3,
				'owner_type'=>0,
				'new_id'=>$apply['new_id'],
				'create_at'=>strtotime(date('Y-m-d H:i:s'))
			];
			$this->Generals_model->insert('tbl_notify',$noti);
		}
		die(json_encode($result));
	}

	function change_work_status(){
		$apply_id=$this->input->post('id');
		$work_status=$this->input->post('work_status');
		$this->Generals_model->update('tbl_apply',['id'=>$apply_id],['work_status'=>$work_status,'star_rating'=>'','rate_content'=>'','rate_time'=>'','update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		$row_apply=$this->Generals_model->get_one_where('tbl_apply',['id'=>$apply_id]);
		$user_id=$row_apply['user_id'];
		$user_star=$this->Generals_model->get_star_avg($user_id);
		$this->Generals_model->update('tbl_users',['id'=>$user_id],['star_rating'=>$user_star]);
	}

	function submit_rate(){
		$id=$this->input->post('id');
		$rate_star=$this->input->post('rate_star');
		$rate_content=$this->input->post('rate_content');
		$this->Generals_model->update('tbl_apply',['id'=>$id],['star_rating'=>$rate_star,'rate_content'=>$rate_content,'rate_time'=>strtotime(date('Y-m-d H:i:s'))]);


		$apply=$this->Generals_model->get_one_where('tbl_apply',['id'=>$id]);
		$user=$this->Generals_model->get_one_where('tbl_users',['id'=>$apply['user_id']]);
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$apply['company_id']]);


		$row_apply=$this->Generals_model->get_one_where('tbl_apply',['id'=>$id]);
		$user_id=$row_apply['user_id'];
		$user_star=$this->Generals_model->get_star_avg($user_id);
		$this->Generals_model->update('tbl_users',['id'=>$user_id],['star_rating'=>$user_star]);
		$noti=[
			'user_id'=>$user['id'],
			'company_id'=>$company['id'],
			'noti_type'=>1,
			'owner_type'=>0,
			'create_at'=>strtotime(date('Y-m-d H:i:s'))
		];
		$this->Generals_model->insert('tbl_notify',$noti);
	}

	function update_note(){
		$id=$this->input->post('id');
		$note=$this->input->post('note');
		$this->Generals_model->update('tbl_worker_point',['id'=>$id],['note'=>$note,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
	}

	function change_worker_point_status(){
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->Generals_model->update('tbl_worker_point',['id'=>$id],['status'=>$status,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
=======
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'intro'=>$intro,
				'work_process'=>$work_process,
				'job_skill'=>$job_skill
			];
			$this->Generals_model->update('tbl_users',['email'=>$user['email']],$data);
			$this->Generals_model->update('user_calendar',['user_id'=>$user['id']],$user_calendar);
			$output['result']=true;
			$output['message']='Cập nhật thông tin thành công!';
		}
		else{
			$output['result']=false;
			$output['message']='Cập nhật thông tin không thành công!';
		}
		die(json_encode($output));
	}

	function update_user_image(){
		$user = $this->Generals_model->get_one_where('tbl_users', ['id'=>$_SESSION['user']['id']]);
		$image=$_FILES['image'];
		$image_path='upload/users/user_'.$user['id'];
		if(!empty($user['image'])){
			$image_full_path=$image_path.'/'.$user['image'];
			unlink($image_full_path);
		}
		$image_full_path = $image_path . '/' . basename($image["name"]);
		if(move_uploaded_file($image['tmp_name'], $image_full_path)){
			$this->Generals_model->update('tbl_users',['id'=>$user['id']],['image'=>$image['name'],'update_at' => strtotime(date("Y-m-d H:i:s"))]);
		}
	}

	function change_password(){
		if($_SESSION['user']['user_type']==0){
			$current_pass=md5($this->input->post('current_pass'));
			$new_pass=md5($this->input->post('new_pass'));
			$user=$user = $this->Generals_model->get_one_where('tbl_users', ['id'=>$_SESSION['user']['id']]);
			if(!empty($user)){
				if($current_pass==$user['password']){
					$this->Generals_model->update('tbl_users',['id'=>$user['id']],['password'=>$new_pass,'update_at' => strtotime(date("Y-m-d H:i:s"))]);
					$output['result']=true;
					$output['message']="Đổi mật khẩu thành công!";
				}
				else{
					$output['result']=false;
					$output['invalid_pass']=true;
					$output['message']="Mật khẩu hiện tại không đúng!";
				}
			}
			else{
				$output['result']=false;
				$output['message']="Đổi mật khẩu không thành công!";
			}
			die(json_encode($output));
		}
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
}
