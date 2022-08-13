<?
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function update_post_worker()
	{
		$suggest_title=$this->input->post('suggest_title');
		$suggest_content=$this->input->post('suggest_content');
		$content=$this->input->post('content');
		$data=[
			'content'=>$content,
			'title_suggest'=>$suggest_title,
			'content_suggest'=>$suggest_content
		];
		$result=$this->Generals_model->update('new_posts',['new_type'=>1],$data);
		if($result){
			$message="Cập nhật bài viết thành công!";
		}
		else{
			$message="Đã có lỗi xảy ra!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}

	public function update_post_job()
	{
		$suggest_title=$this->input->post('suggest_title');
		$suggest_content=$this->input->post('suggest_content');
		$content=$this->input->post('content');
		$data=[
			'content'=>$content,
			'title_suggest'=>$suggest_title,
			'content_suggest'=>$suggest_content
		];
		$result=$this->Generals_model->update('new_posts',['new_type'=>2],$data);
		if($result){
			$message="Cập nhật bài viết thành công!";
		}
		else{
			$message="Đã có lỗi xảy ra!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}
	public function update_post_tag()
	{
		$new_id=$this->input->post('new_id');
		$suggest_title=$this->input->post('suggest_title');
		$suggest_content=$this->input->post('suggest_content');
		$content=$this->input->post('content');
		$data=[
			'content'=>$content,
			'title_suggest'=>$suggest_title,
			'content_suggest'=>$suggest_content
		];
		$result=$this->Generals_model->update('new_tags',['new_id'=>$new_id],$data);
		if($result){
			$message="Cập nhật bài viết thành công!";
		}
		else{
			$message="Đã có lỗi xảy ra!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}
}
