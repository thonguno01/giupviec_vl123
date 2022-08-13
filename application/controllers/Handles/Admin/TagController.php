<?
defined('BASEPATH') or exit('No direct script access allowed');

class TagController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function add()
	{
		$content=$this->input->post('content');
		$description=$this->input->post('description');
		if(isset($_FILES['image'])){
			$image=$_FILES['image']['name'];
		}
		else{
			$image="";
		}
		$check_tag=$this->Generals_model->get_where('tbl_job_style',['content'=>$content]);
		if(empty($check_tag)){
			$data=[
				'alias'=>create_slug($content),
				'content'=>$content,
				'description'=>$description,
				'image'=>$image,
				'create_at'=>strtotime(date('Y-m-d H:i:s')),
				'update_at'=>strtotime(date('Y-m-d H:i:s'))
			];
			$insert_id=$this->Generals_model->insert('tbl_job_style',$data);
			$new_tag_worker=[
				'tag_id'=>$insert_id,
				'new_type'=>1
			];
			$check_new_tag_worker=$this->Generals_model->get_where('new_tags',$new_tag_worker);
			$new_tag_job=[
				'tag_id'=>$insert_id,
				'new_type'=>2
			];
			$check_new_tag_job=$this->Generals_model->get_where('new_tags',$new_tag_job);
			if(empty($check_new_tag_worker)){
			$this->Generals_model->insert('new_tags',$new_tag_worker);
			}
			if(empty($check_new_tag_job)){
			$this->Generals_model->insert('new_tags',$new_tag_job);
			}
			$image_path = 'upload/job_style/job_style_' . $insert_id;
			mkdir($image_path, 0777);
			if($insert_id){
				if(isset($_FILES['image'])){
					$image = $_FILES['image'];
					$image_full_path = $image_path . '/' . basename($image["name"]);
					move_uploaded_file($image['tmp_name'], $image_full_path);
				}
				$result=true;
				$message="Thêm công việc thành công!";
			}
			else{
				$result=false;
				$message="Đã có lỗi xảy ra!";
			}
		}
		else{
			$result=false;
			$message="Công việc đã tồn tại!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}

	public function edit()
	{
		$tag_id=$this->input->post('tag_id');
		$content=$this->input->post('content');
		$description=$this->input->post('description');
		$check_tag=$this->Generals_model->get_where('tbl_job_style',['content'=>$content,'id!='=>$tag_id]);
		$tag=$this->Generals_model->get_one_where('tbl_job_style',['id'=>$tag_id]);
		if(empty($check_tag)){
			$data=[
				'content'=>$content,
				'description'=>$description,
				'update_at'=>strtotime(date('Y-m-d H:i:s'))
			];
				if(isset($_FILES['image'])){
					$data['image']=$_FILES['image']['name'];
					$image = $_FILES['image'];
					$image_path = 'upload/job_style/job_style_' . $tag_id;
					if($tag['image']){
						$image_full_path_exist = $image_path . '/' . $tag['image'];
						unlink($image_full_path_exist);
					}
					$image_full_path = $image_path . '/' . basename($image["name"]);
					move_uploaded_file($image['tmp_name'], $image_full_path);
				$result=true;
				$message="Thêm công việc thành công!";
		}
		$result=$this->Generals_model->update('tbl_job_style',['id'=>$tag_id],$data);
		$message="Sửa tag thành công!";
	}
		else{
			$result=false;
			$message="Công việc đã tồn tại!";
		}
	$output=[
		'result'=>$result,
		'message'=>$message
	];
	die(json_encode($output));
	}
}
