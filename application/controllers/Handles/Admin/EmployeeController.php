<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(array('Generals_model','Admin/City_model'));
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function add()
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
			$user = [
					'name' => $name,
					'phone' => $phone,
					'email' => $email,
					'password' => $password,
					'alias' => create_slug($name),
					'active' => 1,
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
					'salary_time' => $sal_time,
					'create_at' => strtotime(date("Y-m-d H:i:s")),
					'update_at' => strtotime(date("Y-m-d H:i:s")),
					'time_mail' => strtotime(date("Y-m-d H:i:s")),
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
			$register = [
				'result' => 'TRUE',
				'message' => 'Thêm người giúp việc thành công!'
			];
		} else {
			$register = [
				'result' => 'FALSE',
				'message' => 'Email đã tồn tại!'
			];
		}
		// var_dump($this->input->post('sal_time'));
		die(json_encode($register));
	}

	public function change_employee_turn(){
		$id=$this->input->post('id');
		$employee=$this->Generals_model->get_one_where('tbl_users',['id'=>$id]);
		if($employee['turn']==0){
			$result=$this->Generals_model->update('tbl_users',['id'=>$id],['turn'=>1,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		else{
			$result=$this->Generals_model->update('tbl_users',['id'=>$id],['turn'=>0,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		$output=[
			'result'=>$result,
			'message'=>$employee['id']
		];
		die(json_encode($output));
	}

	public function change_employee_active(){
		$id=$this->input->post('id');
		$employee=$this->Generals_model->get_one_where('tbl_users',['id'=>$id]);
		if($employee['active']==0){
			$result=$this->Generals_model->update('tbl_users',['id'=>$id],['active'=>1,'email_verify_token'=>'','update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		else{
			$token=random_string(50);
			$result=$this->Generals_model->update('tbl_users',['id'=>$id],['active'=>0,'email_verify_token'=>$token,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		$output=[
			'result'=>$result,
			'message'=>$employee['id']
		];
		die(json_encode($output));
	}

	public function update(){
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$user = $this->Generals_model->get_one_where('tbl_users', ['email' => $email,'phone'=>$phone]);
		if ($user['email'] != $email || $user['phone'] != $phone) {
			$output['result'] = false;
			$output['message'] = 'Cập nhật thông tin không thành công!';
			die(json_encode($output));
		}
		if (!empty($user)) {
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
			$sal_time = $this->input->post('sal_time');
			$intro = $this->input->post('intro');
			$work_process = $this->input->post('work_process');
			$job_skill = $this->input->post('job_skill');
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
			$data = [
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
				'salary_time' => $sal_time,
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'intro' => $intro,
				'work_process' => $work_process,
				'job_skill' => $job_skill
			];
			if(isset($_FILES['file'])){
				$data['image']=$_FILES['file']['name'];
				$image = $_FILES['file'];
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
}
