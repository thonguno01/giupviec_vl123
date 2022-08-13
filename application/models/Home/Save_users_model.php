
<?
class Save_users_model extends CI_Model
{
	protected $table = 'tbl_companys';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function get_list_saved($company_id){
		$this->db->select('user_id');
		$this->db->where('company_id',$company_id);
		return $this->db->get('tbl_save_users')->result_array();
	}

	public function get_list_save_user($company_id)
	{
		$this->db->select('
							tbl_save_users.id as save_id, 
							tbl_users.id as user_id,
							tbl_users.name, 
							tbl_users.alias, 
							tbl_users.image, 
							tbl_users.job_style_id,
							tbl_users.salary_type as salary_type, 
							tbl_users.salary1 as salary1, 
							tbl_users.salary2 as salary2, 
							tbl_users.salary_time,
							tbl_users.birth,
							tbl_users.exp as exp,
							tbl_work_type.work_name,
							tbl_users.city_id,
							city.cit_name,
							tbl_users.district_id,
							tbl_users.address as address,
							tbl_users.star_rating,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_users','tbl_save_users.user_id=tbl_users.id');
		$this->db->join('tbl_work_type','tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar','tbl_users.id=user_calendar.user_id');
		$this->db->join('city','city.cit_id=tbl_users.city_id');
		$this->db->where(['company_id'=>$company_id,'tbl_users.status'=>1]);
		$this->db->order_by('tbl_save_users.create_at','desc');
		return $this->db->get('tbl_save_users')->result_array();
	}

	public function get_list_save_user_limit($company_id,$limit,$skip)
	{
		$this->db->select('
							tbl_save_users.id as save_id, 
							tbl_users.id as user_id,
							tbl_users.name, 
							tbl_users.alias, 
							tbl_users.image, 
							tbl_users.job_style_id,
							tbl_users.salary_type as salary_type, 
							tbl_users.salary1 as salary1, 
							tbl_users.salary2 as salary2, 
							tbl_users.salary_time,
							tbl_users.birth,
							tbl_users.exp as exp,
							tbl_work_type.work_name,
							tbl_users.city_id,
							city.cit_name,
							tbl_users.district_id,
							tbl_users.address as address,
							tbl_users.star_rating,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_users','tbl_save_users.user_id=tbl_users.id');
		$this->db->join('tbl_work_type','tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar','tbl_users.id=user_calendar.user_id');
		$this->db->join('city','city.cit_id=tbl_users.city_id');
		$this->db->where(['company_id'=>$company_id,'tbl_users.status'=>1]);
		$this->db->order_by('tbl_save_users.create_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_save_users')->result_array();
	}

}
?>

