
<?
class Apply_model extends CI_Model
{
	protected $table = 'tbl_apply';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function get_list_apply($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
							tbl_work_type.work_name,
							tbl_job_style.content as job_style, 
							tbl_news.alias,
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.start_time,
							tbl_apply.status
							');
		$this->db->join('tbl_news','tbl_news.id=tbl_apply.new_id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.create_at','desc');
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_apply_limit($user_id,$limit,$skip) 
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.company_id,
							tbl_news.alias,
							tbl_companys.alias as company_alias,
							tbl_companys.image,
							tbl_news.title as title, 
							tbl_work_type.work_name,
							tbl_job_style.content as job_style, 
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.start_time,
							tbl_apply.status
							');
		$this->db->join('tbl_news','tbl_news.id=tbl_apply.new_id');
		$this->db->join('tbl_companys','tbl_news.company_id=tbl_companys.id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.create_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_apply_waiting($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title,
							tbl_work_type.work_name, 
							tbl_job_style.content as job_style, 
							tbl_news.salary_type as salary_type,  
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.start_time,
							tbl_apply.status
							');
		$this->db->join('tbl_news','tbl_news.id=tbl_apply.new_id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>0,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.create_at','desc');
		return $this->db->get('tbl_apply')->result_array();
	}
	public function get_list_accept($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
							tbl_work_type.work_name,
							tbl_job_style.content as job_style, 
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.start_time,
							tbl_apply.status,
							tbl_apply.work_status
							');
		$this->db->join('tbl_news','tbl_news.id=tbl_apply.new_id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.update_at','desc');
		return $this->db->get('tbl_apply')->result_array();
	}
	public function get_list_accept_limit($user_id,$limit,$skip)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.alias,
							tbl_news.title as title, 
							tbl_work_type.work_name,
							tbl_job_style.content as job_style, 
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.start_time,
							tbl_apply.status,
							tbl_apply.work_status
							');
		$this->db->join('tbl_news','tbl_news.id=tbl_apply.new_id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.update_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_user_apply($company_id){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_users.id as user_id,
							tbl_news.alias as new_alias,
							tbl_users.alias as user_alias,
							tbl_apply.id as apply_id,
							tbl_users.name,
							tbl_news.title,
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.start_time,
							tbl_apply.status
		');
		$this->db->join('tbl_users','tbl_apply.user_id=tbl_users.id');
		$this->db->join('tbl_news','tbl_apply.new_id=tbl_news.id');
		$this->db->where(['tbl_apply.company_id'=>$company_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.create_at','desc');
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_user_apply_limit($company_id,$limit,$skip){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_users.id as user_id,
							tbl_news.alias as new_alias,
							tbl_users.alias as user_alias,
							tbl_apply.id as apply_id,
							tbl_users.name,
							tbl_news.title,
							tbl_users.salary_type as salary_type, 
							tbl_users.salary1 as salary1, 
							tbl_users.salary2 as salary2, 
							tbl_users.salary_time,
							tbl_news.start_time,
							tbl_apply.status');
		$this->db->join('tbl_users','tbl_apply.user_id=tbl_users.id');
		$this->db->join('tbl_news','tbl_apply.new_id=tbl_news.id');
		$this->db->where(['tbl_apply.company_id'=>$company_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.create_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_user_accept($company_id){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_users.id as user_id,
							tbl_news.alias as new_alias,
							tbl_users.alias as user_alias,
							tbl_apply.id as apply_id,
							tbl_users.name,
							tbl_news.title,
							tbl_users.salary_type as salary_type, 
							tbl_users.salary1 as salary1, 
							tbl_users.salary2 as salary2, 
							tbl_users.salary_time,
							tbl_news.start_time,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address,
							tbl_apply.work_status,
							tbl_apply.star_rating
		');
		$this->db->join('tbl_users','tbl_apply.user_id=tbl_users.id');
		$this->db->join('tbl_news','tbl_apply.new_id=tbl_news.id');
		$this->db->where(['tbl_apply.company_id'=>$company_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.update_at','desc');
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_user_accept_limit($company_id,$limit,$skip){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_users.id as user_id,
							tbl_news.alias as new_alias,
							tbl_users.alias as user_alias,
							tbl_apply.id as apply_id,
							tbl_users.name,
							tbl_news.title,
							tbl_users.salary_type as salary_type, 
							tbl_users.salary1 as salary1, 
							tbl_users.salary2 as salary2, 
							tbl_users.salary_time,
							tbl_news.start_time,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address,
							tbl_apply.work_status,
							tbl_apply.star_rating
		');
		$this->db->join('tbl_users','tbl_apply.user_id=tbl_users.id');
		$this->db->join('tbl_news','tbl_apply.new_id=tbl_news.id');
		$this->db->where(['tbl_apply.company_id'=>$company_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_apply.update_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_rate($user_id){
		$this->db->select('
							tbl_companys.id,
							tbl_companys.name,
							tbl_companys.image,
							tbl_apply.rate_content,
							tbl_apply.rate_time
		');
		$this->db->join('tbl_companys','tbl_apply.company_id=tbl_companys.id');
		$this->db->where(['tbl_apply.user_id'=>$user_id,'star_rating !='=>0,'rate_content !='=>'']);
		return $this->db->get('tbl_apply')->result_array();
	}
}
?>

