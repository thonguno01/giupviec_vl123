<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/User_model','Admin/Users_not_complete_profile_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}


	public function index()
	{
			$list_city=$this->Generals_model->get_list_city();
			$list_employee_full=$this->User_model->get_list();

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_employee_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_employee=$this->User_model->get_list_limit($row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_employee); $i++) {
				$list_employee[$i]['full_address'] = '';
				if ($list_employee[$i]['address'] != '') {
					$list_employee[$i]['full_address'] .= $list_employee[$i]['address'] . ', ';
				}
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['district_id']) . ', ';
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['city_id']);
			}
			$data = [
				'page_name' => 'admin/list_employee',
				'js'=>array('/scripts/admin/list_employee.js'),
				'list_city'=>$list_city,
				'list_employee'=>$list_employee,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
		
	}

	public function just_update_profile()
	{
			$list_city=$this->Generals_model->get_list_city();
			$list_employee=$this->User_model->get_list_just_update();
			for ($i = 0; $i < count($list_employee); $i++) {
				$list_employee[$i]['full_address'] = '';
				if ($list_employee[$i]['address'] != '') {
					$list_employee[$i]['full_address'] .= $list_employee[$i]['address'] . ', ';
				}
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['district_id']) . ', ';
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['city_id']);
			}
			$data = [
				'page_name' => 'admin/list_employee',
				'js'=>array('/scripts/admin/list_employee.js'),
				'list_city'=>$list_city,
				'list_employee'=>$list_employee,
				'links'=>''
			];
			$this->load->view('/admin/index', $data);
		
	}
	public function add(){
		$list_city=$this->Generals_model->get_list_city();
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
		$data = [
			'page_name' => 'admin/add_employee',
			'list_city'=>$list_city,
			'list_work_type'=>$list_work_type,
			'list_job_style'=>$list_job_style,
			'style'=>array('/css/admin/add_employee.css'),
			'js'=>array('/scripts/admin/add_employee.js'),
			'links'=>''
		];
		$this->load->view('/admin/index', $data);
	}

	public function update($id){
		$user = $this->Generals_model->get_one_where('tbl_users', ['id' => $id]);
		$user_schedule = $this->Generals_model->get_one_where('user_calendar', ['user_id' => $user['id']]);
		$list_city=$this->Generals_model->get_list_city();
		$list_district = $this->Generals_model->get_list_district($user['city_id']);
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
		$data = [
			'page_name' => 'admin/update_employee',
			'style'=>array('/css/admin/add_employee.css'),
			'js'=>array('/scripts/admin/update_employee.js'),
			'links'=>'',
			'user' => $user,
			'user_schedule' => $user_schedule,
			'list_city' => $list_city,
			'list_district' => $list_district,
			'list_work_type' => $list_work_type,
			'list_job_style' => $list_job_style
		];
		$this->load->view('/admin/index', $data);
	}

	public function not_complete_employee(){
		$list_city=$this->Generals_model->get_list_city();
		$list_employee_full=$this->Generals_model->get_list('users_not_complete_profile');

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_employee_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_employee=$this->Users_not_complete_profile_model->get_list_limit($row_per_page,$row_per_page*($page-1));

		$data = [
			'page_name' => 'admin/users_not_complete_profile',
			'js'=>array('/scripts/admin/list_employee.js'),
			'list_city'=>$list_city,
			'list_employee'=>$list_employee,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}

	public function register_for_profile($profile_id){
		$list_city=$this->Generals_model->get_list_city();
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
		$profile=$this->Generals_model->get_one_where('users_not_complete_profile',['profile_id'=>$profile_id]);
		$profile_schedule=$this->Generals_model->get_one_where('user_calendar',['user_not_complete_id'=>$profile_id]);
		if($profile['user_city_id']){
		$list_district = $this->Generals_model->get_list_district($profile['user_city_id']);
		}else{
			$list_district=[];
		}
		$data = [
			'page_name' => 'admin/register_for_employee',
			'list_city'=>$list_city,
			'list_work_type'=>$list_work_type,
			'list_job_style'=>$list_job_style,
			'profile'=>$profile,
			'list_district'=>$list_district,
			'profile_schedule'=>$profile_schedule,
			'style'=>array('/css/admin/add_employee.css'),
			'js'=>array('/scripts/admin/add_employee.js'),
		];
		$this->load->view('/admin/index', $data);
	}

	public function search_employee(){
			$list_city=$this->Generals_model->get_list_city();
			$id=$this->input->get('id');
			$email=$this->input->get('email');
			$name=$this->input->get('name');
			$phone=$this->input->get('phone');
			$city_id=$this->input->get('city');
			$address=$this->input->get('address');
			$ngaybd=$this->input->get('ngaybd');
			$ngaykt=$this->input->get('ngaykt');
			$register_source=$this->input->get('nguon_dk');
			
			$list_employee_full=$this->User_model->get_list_search($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path().'?id='.$id.'&email='.$email.'&name='.$name.'&phone='.$phone.'&city='.$city_id.'&address='.$address.'&ngaybd='.$ngaybd.'&ngaykt='.$ngaykt.'&nguon_dk='.$register_source;
			$total_rows=count($list_employee_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();
			// var_dump($list_employee_full);

			$list_employee=$this->User_model->get_list_search($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,$row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_employee); $i++) {
				$list_employee[$i]['full_address'] = '';
				if ($list_employee[$i]['address'] != '') {
					$list_employee[$i]['full_address'] .= $list_employee[$i]['address'] . ', ';
				}
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['district_id']) . ', ';
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['city_id']);
			}
			$data = [
				'page_name' => 'admin/list_employee',
				'js'=>array('/scripts/admin/list_employee.js'),
				'list_city'=>$list_city,
				'list_employee'=>$list_employee,
				'links'=>$link,
				'id'=>$id,
				'email'=>$email,
				'name'=>$name,
				'phone'=>$phone,
				'city_id'=>$city_id,
				'address'=>$address,
				'ngaybd'=>$ngaybd,
				'ngaykt'=>$ngaykt,
				'register_source'=>$register_source
			];
			$this->load->view('/admin/index', $data);
	}

	public function search_employee_not_complete_profile(){
		$email=$this->input->get('email');
		$name=$this->input->get('name');
		$phone=$this->input->get('phone');
		$address=$this->input->get('address');
		$ngaybd=$this->input->get('ngaybd');
		$ngaykt=$this->input->get('ngaykt');
		$list_city=$this->Generals_model->get_list_city();
		$list_employee_full=$this->Users_not_complete_profile_model->get_list_search($email,$name,$phone,$address,$ngaybd,$ngaykt,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path().'?email='.$email.'&name='.$name.'&phone='.$phone.'&address='.$address.'&ngaybd='.$ngaybd.'&ngaykt='.$ngaykt;
		$total_rows=count($list_employee_full);
		$row_per_page=1;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_employee=$this->Users_not_complete_profile_model->get_list_search($email,$name,$phone,$address,$ngaybd,$ngaykt,$row_per_page,$row_per_page*($page-1));
		// var_dump($list_employee);
		$data = [
			'page_name' => 'admin/users_not_complete_profile',
			'js'=>array('/scripts/admin/list_employee.js'),
			'list_city'=>$list_city,
			'list_employee'=>$list_employee,
			'links'=>$link,
			'email'=>$email,
			'name'=>$name,
			'phone'=>$phone,
			'address'=>$address,
			'ngaybd'=>$ngaybd,
			'ngaykt'=>$ngaykt,
		];
		$this->load->view('/admin/index', $data);
	}
}
