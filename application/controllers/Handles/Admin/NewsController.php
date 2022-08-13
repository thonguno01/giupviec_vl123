<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsController extends CI_Controller
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
		$company_id = $this->input->post('company_id');
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
		$check_title = $this->Generals_model->get_one_where('tbl_news', ['alias' => $alias]);
		if (!empty($check_title)) {
			$title_exist = true;
		} else {
			$title_exist = false;
		}
		$check_company_post_data = [
			'job_style_id' => $job_style,
			'city_id' => $city,
			'district_id' => $district,
			'company_id' => $company_id
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
		if (!$title_exist && !$post_exist) {
			$post_data = [
				'company_id'=>$company_id,
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
			$this->Generals_model->update('tbl_companys',['id'=>$company_id],['not_post'=>1]);
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
		];
		die(json_encode($output));
	}

	public function change_new_status(){
		$id=$this->input->post('id');
		$new_status=$this->input->post('new_status');
		$result=$this->Generals_model->update('tbl_news',['id'=>$id],['new_status'=>$new_status,'update_at'=>strtotime(date('Y-m-d'))]);
		$output=[
			'result'=>$result,
			'message'=>$id
		];
		die(json_encode($output));
	}

	public function change_new_index(){
		$id=$this->input->post('id');
		$new_index=$this->input->post('new_index');
		$result=$this->Generals_model->update('tbl_news',['id'=>$id],['new_index'=>$new_index,'update_at'=>strtotime(date('Y-m-d'))]);
		$output=[
			'result'=>$result,
			'message'=>$id
		];
		die(json_encode($output));
	}


	public function edit(){
		$company_id = $this->input->post('company_id');
		$news_id = $this->input->post('news_id');
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
		$last_new=$this->Generals_model->get_one_where('tbl_news',['id'=>$news_id]);
		$title_exist=false;
		$check_title = $this->Generals_model->get_one_where('tbl_news', ['title' => $title,'id !='=>$news_id]);
		if (!empty($check_title)) {
			$title_exist = true;
		}
		$check_company_post_data = [
			'job_style_id' => $job_style,
			'city_id' => $city,
			'district_id' => $district,
			'company_id' => $company_id,
			'id !='=>$news_id
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
		if (!$post_exist && !$title_exist) {
			$post_data = [
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
				'update_at' => strtotime(date("Y-m-d H:i:s"))
			];
			$result=$this->Generals_model->update('tbl_news',['id'=>$news_id],$post_data);
			$this->Generals_model->update('tbl_companys',['id'=>$company_id],['not_post'=>1]);
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
			$this->Generals_model->update('new_calendar',['new_id'=>$news_id],$work_calendar);
		}
		$output=[
			'title_exist'=>$title_exist,
			'post_exist'=>$post_exist,
			'result'=>$result,
			'post_exist_id'=>$post_exist_id,
		];
		die(json_encode($output));
	}
}
