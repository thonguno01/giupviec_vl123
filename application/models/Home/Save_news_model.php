
<?
class Save_news_model extends CI_Model
{
	protected $table = 'tbl_save_news';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}


	public function get_list_save_new($user_id)
	{
		$this->db->select('
							tbl_save_news.id as id, 
							tbl_news.id as new_id,
							tbl_news.alias,
							tbl_companys.alias as company_alias,
							tbl_news.title as title, 
							tbl_job_style.content as job_style, 
							tbl_work_type.work_name,
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
							tbl_news.address as address
							');
		$this->db->join('tbl_news','tbl_save_news.new_id=tbl_news.id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_companys','tbl_news.company_id=tbl_companys.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_save_news.create_at','desc');
		return $this->db->get('tbl_save_news')->result_array();
	}

	public function get_list_save_new_limit($user_id,$limit,$skip)
	{
		$this->db->select('
							tbl_save_news.id as id, 
							tbl_news.id as new_id,
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
							tbl_news.address as address
							');
		$this->db->join('tbl_news','tbl_save_news.new_id=tbl_news.id');
		$this->db->join('tbl_companys','tbl_news.company_id=tbl_companys.id');
		$this->db->join('tbl_work_type','tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->order_by('tbl_save_news.create_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_save_news')->result_array();
	}
}
?>

