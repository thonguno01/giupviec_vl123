<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/User_model','Admin/Admin_model','Admin/News_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}


	public function index()
	{
			$list_city=$this->Generals_model->get_list_city();
			$list_news_full=$this->News_model->get_list(0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_news_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_news=$this->News_model->get_list($row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_news); $i++) {
				$list_news[$i]['full_address'] = '';
				if ($list_news[$i]['address'] != '') {
					$list_news[$i]['full_address'] .= $list_news[$i]['address'] . ', ';
				}
				$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['district_id']) . ', ';
				$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['city_id']);
			}
			$data = [
				'page_name' => 'admin/list_news',
				'js'=>array('/scripts/admin/list_news.js'),
				'list_city'=>$list_city,
				'list_news'=>$list_news,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
		
	}

	public function search_news(){
		$id=$this->input->get('id');
		$title=$this->input->get('title');
		$name=$this->input->get('name');
		$city_id=$this->input->get('city_id');
		$address=$this->input->get('address');
		$ngaybd=$this->input->get('ngaybd');
		$ngaykt=$this->input->get('ngaykt');
		$new_status=$this->input->get('new_status');
		$list_city=$this->Generals_model->get_list_city();
		$list_news_full=$this->News_model->get_list_search($id,$title,$name,$city_id,$address,$ngaybd,$ngaykt,$new_status,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($list_news_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_news=$this->News_model->get_list_search($id,$title,$name,$city_id,$address,$ngaybd,$ngaykt,$new_status,$row_per_page,$row_per_page*($page-1));
		for ($i = 0; $i < count($list_news); $i++) {
			$list_news[$i]['full_address'] = '';
			if ($list_news[$i]['address'] != '') {
				$list_news[$i]['full_address'] .= $list_news[$i]['address'] . ', ';
			}
			$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['district_id']) . ', ';
			$list_news[$i]['full_address'] .= $this->Generals_model->get_city_name($list_news[$i]['city_id']);
		}
		$data = [
			'page_name' => 'admin/list_news',
			'js'=>array('/scripts/admin/list_news.js'),
			'list_city'=>$list_city,
			'list_news'=>$list_news,
			'links'=>$link,
			'id'=>$id,
			'title'=>$title,
			'name'=>$name,
			'city_id'=>$city_id,
			'address'=>$address,
			'ngaybd'=>$ngaybd,
			'ngaykt'=>$ngaykt,
			'new_status'=>$new_status,
		];
		$this->load->view('/admin/index', $data);
	}

	public function add(){
		$list_city=$this->Generals_model->get_list_city();
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
		$list_company=$this->Generals_model->get_list('tbl_companys');
		$data = [
			'page_name' => 'admin/add_news',
			'list_city'=>$list_city,
			'list_work_type'=>$list_work_type,
			'list_job_style'=>$list_job_style,
			'list_company'=>$list_company,
			'style'=>array('/css/admin/add_news.css'),
			'js'=>array('/scripts/admin/add_news.js'),
			'links'=>''
		];
		$this->load->view('/admin/index', $data);
	}
	public function edit($new_id){
		$list_city=$this->Generals_model->get_list_city();
		$list_work_type=$this->Generals_model->get_list('tbl_work_type');
		$list_job_style=$this->Generals_model->get_list('tbl_job_style');
		$list_company=$this->Generals_model->get_list('tbl_companys');
		$news= $this->Generals_model->get_one_where('tbl_news', ['id' => $new_id]);
		$work_schedule = $this->Generals_model->get_one_where('new_calendar', ['new_id' => $new_id]);
		$list_district = $this->Generals_model->get_list_district($news['city_id']);
		$data = [
			'page_name' => 'admin/edit_news',
			'list_city'=>$list_city,
			'list_district'=>$list_district,
			'list_work_type'=>$list_work_type,
			'list_job_style'=>$list_job_style,
			'list_company'=>$list_company,
			'news' => $news,
			'work_schedule'=>$work_schedule,
			'style'=>array('/css/admin/add_news.css'),
			'js'=>array('/scripts/admin/edit_news.js'),
			'links'=>''
		];
		$this->load->view('/admin/index', $data);
	}
}
