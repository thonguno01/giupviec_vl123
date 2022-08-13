<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/New_tags_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}


	public function post_worker()
	{
			$post=$this->Generals_model->get_one_where('new_posts',['new_type'=>1]);
			$data = [
				'page_name' => 'admin/post_worker',
				'js'=>array('/scripts/admin/post_worker.js'),
				'post'=>$post
			];
			$this->load->view('/admin/index', $data);
		
	}

	public function post_job(){
		$post=$this->Generals_model->get_one_where('new_posts',['new_type'=>2]);
			$data = [
				'page_name' => 'admin/post_job',
				'js'=>array('/scripts/admin/post_job.js'),
				'post'=>$post
			];
			$this->load->view('/admin/index', $data);
	}

	public function list_post_tag_worker(){
		$list_tag=$this->Generals_model->get_list('tbl_job_style');
		$post_full=$this->New_tags_model->get_list_tag_worker(0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($post_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_post=$this->New_tags_model->get_list_tag_worker($row_per_page,$row_per_page*($page-1));

		$data = [
			'page_name' => 'admin/list_post_tag_worker',
			'list_post'=>$list_post,
			'list_tag'=>$list_tag,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}
	public function search_tag_worker(){
		$tag_id=$this->input->get('gvtags');
		$list_tag=$this->Generals_model->get_list('tbl_job_style');
		$post_full=$this->New_tags_model->search_tag_worker($tag_id,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($post_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_post=$this->New_tags_model->search_tag_worker($tag_id,$row_per_page,$row_per_page*($page-1));

		$data = [
			'page_name' => 'admin/list_post_tag_worker',
			'list_post'=>$list_post,
			'list_tag'=>$list_tag,
			'tag_search'=>$tag_id,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}
	public function list_post_tag_job(){
		$list_tag=$this->Generals_model->get_list('tbl_job_style');
		$post_full=$this->New_tags_model->get_list_tag_job(0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($post_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_post=$this->New_tags_model->get_list_tag_job($row_per_page,$row_per_page*($page-1));

		$data = [
			'page_name' => 'admin/list_post_tag_job',
			'list_post'=>$list_post,
			'list_tag'=>$list_tag,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}
	public function search_tag_job(){
		$tag_id=$this->input->get('gvtags');
		$list_tag=$this->Generals_model->get_list('tbl_job_style');
		$post_full=$this->New_tags_model->search_tag_job($tag_id,0,0);

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}

		$url = full_path();
		$total_rows=count($post_full);
		$row_per_page=10;
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();
		$list_post=$this->New_tags_model->search_tag_job($tag_id,$row_per_page,$row_per_page*($page-1));

		$data = [
			'page_name' => 'admin/list_post_tag_job',
			'list_post'=>$list_post,
			'list_tag'=>$list_tag,
			'tag_search'=>$tag_id,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}
	public function edit_post_tag($new_id){
		$post=$this->Generals_model->get_one_where('new_tags',['new_id'=>$new_id]);
		$data = [
			'page_name' => 'admin/edit_post_tag',
			'js'=>array('/scripts/admin/edit_post_tag.js'),
			'post'=>$post
		];
		$this->load->view('/admin/index', $data);
	}
}
