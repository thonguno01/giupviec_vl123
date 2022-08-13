<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyController extends CI_Controller
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
			$company = [
				'name' => $name,
				'phone' => $phone,
				'email' => $email,
				'password' => $password,
				'alias' => create_slug($name),
				'active' => 1,
				'point_free' => 5,
				'birth' => $birth,
				'city_id' => $city,
				'district_id' => $district,
				'address' => $address,
				'create_at' => strtotime(date("Y-m-d H:i:s")),
				'update_at' => strtotime(date("Y-m-d H:i:s")),
				'time_mail' => strtotime(date("Y-m-d H:i:s")),
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
			if($last_id){
				$register = [
					'result' => 'TRUE',
					'message' => 'Thêm nhà tuyển dụng thành công!'
				];
			}
			else{
				$register = [
					'result' => 'FALSE',
					'message' => 'Đã có lỗi xảy ra!'
				];
			}
		} else {
			if (!empty($data_email_check)) {
				$register = [
					'result' => 'FALSE',
					'message' => 'Email đã tồn tại!'
				];
			}
			elseif (!empty($data_name_check)) {
				$register = [
					'result' => 'FALSE',
					'message' => 'Tên nhà tuyển dụng đã tồn tại!'
				];
			}
		}
		die(json_encode($register));
	}

	public function change_company_turn(){
		$id=$this->input->post('id');
		$turn=$this->input->post('turn');
		$result=$this->Generals_model->update('tbl_companys',['id'=>$id],['turn'=>$turn,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		$output=[
			'result'=>$result,
			'message'=>$id
		];
		die(json_encode($output));
	}

	public function change_company_active(){
		$id=$this->input->post('id');
		$active=$this->input->post('active');
		echo $id;
		if($active==0){
			$token=random_string(50);
			$result=$this->Generals_model->update('tbl_companys',['id'=>$id],['active'=>$active,'email_verify_token'=>$token,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		else{
			$result=$this->Generals_model->update('tbl_companys',['id'=>$id],['active'=>$active,'email_verify_token'=>'','update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		}
		$output=[
			'result'=>$result,
			'message'=>$id
		];
		die(json_encode($output));
	}

	public function edit(){
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$company = $this->Generals_model->get_one_where('tbl_companys', ['email' => $email,'phone'=>$phone]);
		if (empty($company)) {
			$output['result'] = false;
			$output['message'] = 'Cập nhật thông tin không thành công!';
			die(json_encode($output));
		}
		if (!empty($company)) {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$birth = strtotime($this->input->post('birth'));
			$city = $this->input->post('city');
			$district = $this->input->post('district');
			$address = $this->input->post('address');
			$check_name=$this->Generals_model->get_where('tbl_companys',['name'=>$name,'id !='=>$company['id']]);
			if(!empty($check_name)){
				$output['result'] = false;
				$output['message'] = 'Tên nhà tuyển dụng đã tồn tại!';
			} else{
			$data = [
				'name' => $name,
				'phone' => $phone,
				'email' => $email,
				'birth' => $birth,
				'city_id' => $city,
				'district_id' => $district,
				'address' => $address,
				'update_at' => strtotime(date("Y-m-d H:i:s")),

			];
			if(isset($_FILES['file'])){
				$image = $_FILES['file'];
				$image_path = 'upload/companys/company_' . $company['id'];
				if (!empty($company['image'])) {
					$image_full_path = $image_path . '/' . $company['image'];
					unlink($image_full_path);
				}
				$image_full_path = $image_path . '/' . basename($image["name"]);
				if (move_uploaded_file($image['tmp_name'], $image_full_path)) {
					$data['image']=$_FILES['file']['name'];
				}
			}
			$this->Generals_model->update('tbl_companys',['id'=>$company['id']],$data);
			$output['result'] = true;
			$output['message'] = 'Cập nhật thông tin thành công!';
		}
		} else {
			$output['result'] = false;
			$output['message'] = 'Cập nhật thông tin không thành công!';
		}
		die(json_encode($output));
	}
	public function add_point_company(){
		$point_add=$this->input->post('point_add');
		$company_id=$this->input->post('company_id');
		$company = $this->Generals_model->get_one_where('tbl_companys', ['id' => $company_id]);
		$new_point=$point_add+$company['point_pay'];
		$result=$this->Generals_model->update('tbl_companys',['id'=>$company['id']],['point_pay'=>$new_point,'update_at'=>strtotime(date('Y-m-d H:i:s'))]);
		die(json_encode($result));
	}
}
