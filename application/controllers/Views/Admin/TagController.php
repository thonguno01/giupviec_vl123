<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TagController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/Job_style_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}


	public function index()
	{
			$list_tag_full=$this->Job_style_model->get_list_limit(0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_tag_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_tag=$this->Job_style_model->get_list_limit($row_per_page,$row_per_page*($page-1));
			$data = [
				'page_name' => 'admin/list_tag',
				'js'=>array('/scripts/admin/list_tag.js'),
				'list_tag'=>$list_tag,
				'list_tag_full'=>$list_tag_full,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
		
	}

	public function search_tag(){
			$id=$this->input->get('tags');
			$list_tag_full=$this->Generals_model->get_list('tbl_job_style');
			$list_tag_search_full=$this->Job_style_model->search($id,0,0);

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_tag_search_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_tag=$this->Job_style_model->search($id,$row_per_page,$row_per_page*($page-1));
			$data = [
				'page_name' => 'admin/list_tag',
				'js'=>array('/scripts/admin/list_tag.js'),
				'list_tag'=>$list_tag,
				'list_tag_full'=>$list_tag_full,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
	}

	public function add(){
		$data = [
			'page_name' => 'admin/add_tag',
			'js'=>array('/scripts/admin/add_tag.js'),
		];
		$this->load->view('/admin/index', $data);
	}
	public function edit($tag_id){
		$tag=$this->Generals_model->get_one_where('tbl_job_style',['id'=>$tag_id]);
		$data = [
			'page_name' => 'admin/edit_tag',
			'js'=>array('/scripts/admin/edit_tag.js'),
			'tag'=>$tag
		];
		$this->load->view('/admin/index', $data);
	}
}
