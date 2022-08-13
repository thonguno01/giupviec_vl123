<?
defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function add_account()
	{
		$user_name=$this->input->post('user_name');
		$full_name=$this->input->post('full_name');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		$modules=$this->input->post('modules');
		$check_user_name=$this->Generals_model->get_where('tbl_admin',['name'=>$user_name]);
		if(empty($check_user_name)){
		$admin_data=[
			'name'=>$user_name,
			'fullname'=>$full_name,
			'email'=>$email,
			'phone'=>$phone,
			'password'=>$password,
			'create_at'=>strtotime(date('Y-m-d H:i:s')),
		];
		$admin_id=$this->Generals_model->insert('tbl_admin',$admin_data);
		foreach($modules as $module){
			$data=[
				'adu_admin_id'=>$admin_id,
				'adu_admin_module_id'=>$module
			];
			$this->Generals_model->insert('admin_user_right',$data);
		}
		if($admin_id){
		$result=true;
		$message="Thêm tài khoản admin thành công!";
		}
		else{
			$result=false;
			$message="Đã có lỗi xảy ra!";
		}
	}
	else{
		$result=false;
		$message="Tên đăng nhập đã tồn tại!";
	}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}

	public function edit_account()
	{
		$id=$this->input->post('id');
		$user_name=$this->input->post('user_name');
		$full_name=$this->input->post('full_name');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		$modules=$this->input->post('modules');
		$admin_data=[
			'fullname'=>$full_name,
			'email'=>$email,
			'phone'=>$phone,
			'password'=>$password,
			'update_at'=>strtotime(date('Y-m-d H:i:s')),
		];
		$result=$this->Generals_model->update('tbl_admin',['name'=>$user_name,'id'=>$id],$admin_data);
		if($result){
		$this->Generals_model->delete('admin_user_right',['adu_admin_id'=>$id]);
		foreach($modules as $module){
			$data=[
				'adu_admin_id'=>$id,
				'adu_admin_module_id'=>$module
			];
			$this->Generals_model->insert('admin_user_right',$data);
		}

		$result=true;
		$message="Sửa tài khoản admin thành công!";
		}
		else{
			$result=false;
			$message="Đã có lỗi xảy ra!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}
}
