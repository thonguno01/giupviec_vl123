<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CompanyController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/User_model','Admin/Admin_model','Admin/Company_model','Admin/Companys_not_complete_profile_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}


	public function index()
	{
			$list_city=$this->Generals_model->get_list_city();
			$list_company_full=$this->Generals_model->get_list_update_limit('tbl_companys',0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_company_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_company=$this->Generals_model->get_list_update_limit('tbl_companys',$row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_company); $i++) {
				$list_company[$i]['full_address'] = '';
				if ($list_company[$i]['address'] != '') {
					$list_company[$i]['full_address'] .= $list_company[$i]['address'] . ', ';
				}
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['district_id']) . ', ';
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['city_id']);
			}
			// var_dump($list_company_full);
			$data = [
				'page_name' => 'admin/list_company',
				'js'=>array('/scripts/admin/list_company.js'),
				'list_city'=>$list_city,
				'list_company'=>$list_company,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
		
	}

	public function search_company(){
			$id=$this->input->get('id');
			$email=$this->input->get('email');
			$name=$this->input->get('name');
			$phone=$this->input->get('phone');
			$city_id=$this->input->get('city');
			$address=$this->input->get('address');
			$ngaybd=$this->input->get('ngaybd');
			$ngaykt=$this->input->get('ngaykt');
			$register_source=$this->input->get('nguon_dk');
			$list_city=$this->Generals_model->get_list_city();
			$list_company_full=$this->Company_model->get_list_search($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path().'?id='.$id.'&email='.$email.'&name='.$name.'&phone='.$phone.'&city='.$city_id.'&address='.$address.'&ngaybd='.$ngaybd.'&ngaykt='.$ngaykt.'&nguon_dk='.$register_source;
			$total_rows=count($list_company_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_company=$this->Company_model->get_list_search($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,$row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_company); $i++) {
				$list_company[$i]['full_address'] = '';
				if ($list_company[$i]['address'] != '') {
					$list_company[$i]['full_address'] .= $list_company[$i]['address'] . ', ';
				}
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['district_id']) . ', ';
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['city_id']);
			}
			// var_dump($list_company_full);
			$data = [
				'page_name' => 'admin/list_company',
				'list_city'=>$list_city,
				'list_company'=>$list_company,
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

	public function add(){
		$list_city=$this->Generals_model->get_list_city();
		
		$data = [
			'page_name' => 'admin/add_company',
			'list_city'=>$list_city,
			'style'=>array('/css/admin/add_company.css'),
			'js'=>array('/scripts/admin/add_company.js')
		];
		$this->load->view('/admin/index', $data);
	}

	public function edit($id){
		$list_city=$this->Generals_model->get_list_city();
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$id]);
		$list_district = $this->Generals_model->get_list_district($company['city_id']);
		$data = [
			'page_name' => 'admin/edit_company',
			'list_city'=>$list_city,
			'list_district'=>$list_district,
			'style'=>array('/css/admin/add_company.css'),
			'js'=>array('/scripts/admin/edit_company.js'),
			'company'=>$company
		];
		$this->load->view('/admin/index', $data);
	}

	public function not_complete_company(){
			$list_city=$this->Generals_model->get_list_city();
			$list_company_full=$this->Companys_not_complete_profile_model->get_list_limit(0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_company_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_company=$this->Companys_not_complete_profile_model->get_list_limit($row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_company); $i++) {
				$list_company[$i]['full_address'] = '';
				if ($list_company[$i]['user_address'] != '') {
					$list_company[$i]['full_address'] .= $list_company[$i]['user_address'] . ', ';
				}
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['user_district_id']) . ', ';
				$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['user_city_id']);
			}
			// var_dump($list_company_full);
			$data = [
				'page_name' => 'admin/companys_not_complete_profile',
				'list_city'=>$list_city,
				'list_company'=>$list_company,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
	}

	public function search_company_not_complete_profile(){
		$email=$this->input->get('email');
		$name=$this->input->get('name');
		$phone=$this->input->get('phone');
		$address=$this->input->get('address');
		$ngaybd=$this->input->get('ngaybd');
		$ngaykt=$this->input->get('ngaykt');
		$list_city=$this->Generals_model->get_list_city();
		$list_company_full=$this->Companys_not_complete_profile_model->get_list_search($email,$name,$phone,$address,$ngaybd,$ngaykt,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_company_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_company=$this->Companys_not_complete_profile_model->get_list_search($email,$name,$phone,$address,$ngaybd,$ngaykt,$row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_company); $i++) {
			$list_company[$i]['full_address'] = '';
			if ($list_company[$i]['user_address'] != '') {
				$list_company[$i]['full_address'] .= $list_company[$i]['user_address'] . ', ';
			}
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['user_district_id']) . ', ';
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['user_city_id']);
		}
		// var_dump($list_company_full);
		$data = [
			'page_name' => 'admin/companys_not_complete_profile',
			'list_city'=>$list_city,
			'list_company'=>$list_company,
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

	public function register_for_company($profile_id){
		$list_city=$this->Generals_model->get_list_city();
		$company=$this->Generals_model->get_one_where('companys_not_complete_profile',['profile_id'=>$profile_id]);
		$list_district = $this->Generals_model->get_list_district($company['user_city_id']);
		$data = [
			'page_name' => 'admin/register_for_company',
			'list_city'=>$list_city,
			'list_district'=>$list_district,
			'company'=>$company,
			'style'=>array('/css/admin/add_company.css'),
			'js'=>array('/scripts/admin/add_company.js')
		];
		$this->load->view('/admin/index', $data);
	}

	public function no_post_company(){
		$list_city=$this->Generals_model->get_list_city();
		$list_company_full=$this->Company_model->get_list_no_post(0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_company_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_company=$this->Company_model->get_list_no_post($row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_company); $i++) {
			$list_company[$i]['full_address'] = '';
			if ($list_company[$i]['address'] != '') {
				$list_company[$i]['full_address'] .= $list_company[$i]['address'] . ', ';
			}
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['district_id']) . ', ';
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['city_id']);
		}
		// var_dump($list_company_full);
		$data = [
			'page_name' => 'admin/list_company_no_post',
			'js'=>array('/scripts/admin/list_company.js'),
			'list_city'=>$list_city,
			'list_company'=>$list_company,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}

	public function search_no_post_company(){
		$id=$this->input->get('id');
		$email=$this->input->get('email');
		$name=$this->input->get('name');
		$phone=$this->input->get('phone');
		$city_id=$this->input->get('city');
		$address=$this->input->get('address');
		$ngaybd=$this->input->get('ngaybd');
		$ngaykt=$this->input->get('ngaykt');
		$register_source=$this->input->get('nguon_dk');
		$list_city=$this->Generals_model->get_list_city();
		$list_company_full=$this->Company_model->get_list_search_no_post($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path().'?id='.$id.'&email='.$email.'&name='.$name.'&phone='.$phone.'&city='.$city_id.'&address='.$address.'&ngaybd='.$ngaybd.'&ngaykt='.$ngaykt.'&nguon_dk='.$register_source;
		$total_rows=count($list_company_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_company=$this->Generals_model->Company_model->get_list_search_no_post($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,$row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_company); $i++) {
			$list_company[$i]['full_address'] = '';
			if ($list_company[$i]['address'] != '') {
				$list_company[$i]['full_address'] .= $list_company[$i]['address'] . ', ';
			}
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['district_id']) . ', ';
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['city_id']);
		}
		// var_dump($list_company_full);
		$data = [
			'page_name' => 'admin/list_company_no_post',
			'list_city'=>$list_city,
			'list_company'=>$list_company,
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
	public function manage_point_company()
	{
		$list_company_full=$this->Generals_model->get_list('tbl_companys');

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_company_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_company=$this->Generals_model->get_list_limit('tbl_companys',$row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_company); $i++) {
			$list_company[$i]['full_address'] = '';
			if ($list_company[$i]['address'] != '') {
				$list_company[$i]['full_address'] .= $list_company[$i]['address'] . ', ';
			}
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['district_id']) . ', ';
			$list_company[$i]['full_address'] .= $this->Generals_model->get_city_name($list_company[$i]['city_id']);
		}
		$data = [
			'page_name' => 'admin/manage_point_company',
			'list_company'=>$list_company,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
		
	}
	public function history_point($company_id){
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$company_id]);
		$list_history_full=$this->Company_model->get_history_point($company_id,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_history_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_history=$this->Company_model->get_history_point($company_id,$row_per_page,$row_per_page*($page-1));
		$data = [
			'page_name' => 'admin/history_point_company',
			'list_history'=>$list_history,
			'company'=>$company,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}
	public function search_history_point(){
		$company_id=$this->input->get('company_id');
		$ngaybd=$this->input->get('ngaybd');
		$ngaykt=$this->input->get('ngaykt');
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$company_id]);
		$list_history_full=$this->Company_model->get_list_search_history_point($company_id,$ngaybd,$ngaykt,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_history_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_history=$this->Company_model->get_list_search_history_point($company_id,$ngaybd,$ngaykt,$row_per_page,$row_per_page*($page-1));
		$data = [
			'page_name' => 'admin/history_point_company',
			'list_history'=>$list_history,
			'company'=>$company,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}

	public function add_point_company($company_id){
		$company=$this->Generals_model->get_one_where('tbl_companys',['id'=>$company_id]);
		$data = [
			'page_name' => 'admin/add_point_company',
			'js'=>array('/scripts/admin/add_point_company.js'),
			'company'=>$company,
		];
		$this->load->view('/admin/index', $data);
	}
}
