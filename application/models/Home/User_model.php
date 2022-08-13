
<?
class User_model extends CI_Model
{
	protected $table = 'tbl_users';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}


<<<<<<< HEAD
	public function get_one($id){
		$this->db->select('
							tbl_users.id,
							tbl_users.city_id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.email,
							tbl_users.phone,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.work_process,
							tbl_users.job_skill,
							tbl_users.star_rating,
							tbl_users.alias,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id = user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id = city.cit_id');
		$this->db->where('tbl_users.id', $id);
		return $this->db->get('tbl_users')->row_array();
	}

	public function get_list(){
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.email,
							tbl_users.phone,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.work_process,
							tbl_users.job_skill,
							tbl_users.star_rating,
							tbl_users.alias,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.update_at', 'desc');
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_limit($limit,$skip){
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.email,
							tbl_users.phone,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.work_process,
							tbl_users.job_skill,
							tbl_users.star_rating,
							tbl_users.alias,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->limit($limit,$skip);
		$this->db->order_by('tbl_users.update_at', 'desc');
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_rate()
	{
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.star_rating', 'desc');
		$this->db->order_by('tbl_users.update_at', 'desc');
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_exp()
	{
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.exp', 'desc');
		$this->db->order_by('tbl_users.update_at', 'desc');
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_rate_limit($limit, $skip)
	{
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.star_rating', 'desc');
		$this->db->order_by('tbl_users.update_at', 'desc');
		$this->db->limit($limit, $skip);
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_exp_limit($limit, $skip)
	{
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.exp', 'desc');
		$this->db->order_by('tbl_users.update_at', 'desc');
		$this->db->limit($limit, $skip);
		return $this->db->get('tbl_users')->result_array();
	}

	public function get_list_search($search_key, $job_style_id, $city_id, $district_id)
	{
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							user_calendar.t2_ca2_bd,
							user_calendar.t3_ca2_bd,
							user_calendar.t4_ca2_bd,
							user_calendar.t5_ca2_bd,
							user_calendar.t6_ca2_bd,
							user_calendar.t7_ca2_bd,
							user_calendar.t8_ca2_bd,
							user_calendar.t2_ca1_kt,
							user_calendar.t3_ca1_kt,
							user_calendar.t4_ca1_kt,
							user_calendar.t5_ca1_kt,
							user_calendar.t6_ca1_kt,
							user_calendar.t7_ca1_kt,
							user_calendar.t8_ca1_kt,
							user_calendar.t2_ca2_kt,
							user_calendar.t3_ca2_kt,
							user_calendar.t4_ca2_kt,
							user_calendar.t5_ca2_kt,
							user_calendar.t6_ca2_kt,
							user_calendar.t7_ca2_kt,
							user_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.update_at', 'desc');
		$where = [];
		if ($search_key) {
		}
		if ($city_id > 0) {
			$where['tbl_users.city_id'] = $city_id;
		}
		if ($district_id > 0) {
			unset($where['tbl_users.city_id']);
			$where['tbl_users.district_id'] = $district_id;
		}
		if (!empty($where)) {
			$this->db->where($where);
		}
		$result_1 = $this->db->get('tbl_users')->result_array();
		$result = [];
		if ($job_style_id > 0) {
			for ($i = 0; $i < count($result_1); $i++) {
				$list_job_style_id = explode(',', $result_1[$i]['job_style_id']);

				if (in_array($job_style_id, $list_job_style_id)) {
					$result[] = $result_1[$i];
				}
			}
		} else {
			$result = $result_1;
		}
		$this->db->reset_query();
		if ($search_key != '') {
			$search_key_array=explode(' ',$search_key);
			foreach($search_key_array as $search_key_item){
				$this->db->like('content', '' .$search_key_item . ' ');
			}
			$result=[];
			$list_id=[];
			$list_job_style_search = $this->db->get('tbl_job_style')->result_array();
			for ($i = 0; $i < count($list_job_style_search); $i++) {
				$list_id[$i] = $list_job_style_search[$i]['id'];
			}
			for ($i = 0; $i < count($result_1); $i++) {
				$list_job_style_id = explode(',', $result_1[$i]['job_style_id']);
				if (count(array_intersect($list_job_style_id, $list_id)) > 0) {
					$result[] = $result_1[$i];
				}
			}
		}
		return $result;
	}

	public function get_list_by_tag($tag){
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users.update_at', 'desc');
		$result_1 = $this->db->get('tbl_users')->result_array();
		if ($tag != '') {
			$result=[];
			$list_job_style_search = explode(',',$tag);
			for ($i = 0; $i < count($result_1); $i++) {
				$list_job_style_id = explode(',', $result_1[$i]['job_style_id']);
				if (count(array_intersect($list_job_style_id, $list_job_style_search)) > 0) {
					$result[] = $result_1[$i];
				}
			}
		}
		return $result_1;
	}


	public function get_filter($job_style_id,$city,$district,$min_age,$max_age,$exp,$salary_type,$salary1,$salary2,$salary_time,$work_schedule,$work_type_id){
		//lấy danh sách tỉnh thành theo từ khóa
		if($city){
			$this->db->where('cit_parent',0);
			$city_arr=explode(' ',$city);
			foreach($city_arr as $city_key){
			$this->db->like('cit_name',$city_key);
			}
			$list_city=$this->db->get('city')->result_array();
			$list_city_id=[];
			for($i=0;$i<count($list_city);$i++){
				$list_city_id[]=$list_city[$i]['cit_id'];
			}
			$this->db->reset_query();
		}
		//lấy danh sách quận huyện theo từ khóa
		if($district){
			$this->db->where('cit_parent !=',0);
			$district_arr=explode(' ',$district);
			foreach($district_arr as $district_key){
			$this->db->like('cit_name',$district_key);
			}
			$list_district=$this->db->get('city')->result_array();
			$list_district_id=[];
			for($i=0;$i<count($list_district);$i++){
				$list_district_id[]=$list_district[$i]['cit_id'];
			}
			$this->db->reset_query();
		}
		$this->db->reset_query();
		$this->db->select('
							tbl_users.id,
							tbl_users.alias,
							tbl_users.name,
							tbl_users.image,
							tbl_users.salary1,
							tbl_users.salary2,
							tbl_users.salary_type,
							tbl_users.salary_time,
							tbl_users.exp,
							tbl_users.birth,
							tbl_users.city_id,
							tbl_users.district_id,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_users.job_style_id,
							tbl_users.intro,
							tbl_users.star_rating,
							tbl_users.update_at,
							user_calendar.t2_ca1_bd,
							user_calendar.t3_ca1_bd,
							user_calendar.t4_ca1_bd,
							user_calendar.t5_ca1_bd,
							user_calendar.t6_ca1_bd,
							user_calendar.t7_ca1_bd,
							user_calendar.t8_ca1_bd,
							
		');
		$this->db->join('tbl_work_type', 'tbl_users.work_type_id=tbl_work_type.id');
		$this->db->join('user_calendar', 'tbl_users.id=user_calendar.user_id');
		$this->db->join('city', 'tbl_users.city_id=city.cit_id');
		$this->db->order_by('tbl_users.update_at', 'desc');
		$where = [];

		//lọc theo lương
		if($salary_type!=null){
			$where['tbl_users.salary_time']=$salary_time;
			$where['tbl_users.salary_type']=$salary_type;
			if($salary_type==0){
				$where['tbl_users.salary1 <=']=(int)$salary1;
			}
			else{
				$where['tbl_users.salary1 >=']=(int)$salary1;
				$where['tbl_users.salary2 <=']=(int)$salary2;
			}
		}

		//lọc theo nơi làm việc(ở lại nhà chủ...)
		if($work_type_id){
			$where['tbl_users.work_type_id']=$work_type_id;
		}

		//lọc theo kinh nghiệm
		if($exp){
			$where['tbl_users.exp']=$exp;
		}

		//lọc lịch làm việc
		if(!empty($work_schedule)){
			for ($i = 0; $i < count($work_schedule); $i++) {
				switch($work_schedule[$i]){
					case 't2':
						$where['user_calendar.t2_ca1_bd !=']='';
						break;
					case 't3':
						$where['user_calendar.t3_ca1_bd !=']='';
						break;
					case 't4':
						$where['user_calendar.t4_ca1_bd !=']='';
						break;
					case 't5':
						$where['user_calendar.t5_ca1_bd !=']='';
						break;
					case 't6':
						$where['user_calendar.t6_ca1_bd !=']='';
						break;
					case 't7':
						$where['user_calendar.t7_ca1_bd !=']='';
						break;
					case 't8':
						$where['user_calendar.t8_ca1_bd !=']='';
						break;
				}
			}
		}
		// return $where;


		//lọc theo danh sách tỉnh thành
		if(!empty($city) && !empty($list_city_id)){
			$this->db->where_in('city_id',$list_city_id);
		}
		elseif(!empty($city) && empty($list_city_id)){
			return [];
		}
		
		//lọc theo danh sách quận huyện
		if(!empty($district) && !empty($list_district_id)){
			$this->db->where_in('district_id',$list_district_id);
		}
		elseif(!empty($district) && empty($list_district_id)){
			return [];
		}


		if(!empty($where)){
			 $this->db->where($where);
		}
		$result=$this->db->get('tbl_users')->result_array();

		//lọc tuổi
		if($min_age && $max_age){
		$year_now=date('Y');
		$result_1=[];
		for($i=0;$i<count($result);$i++){
			$result[$i]['age']=abs(date('Y',$result[$i]['birth'])-$year_now);
			if($min_age<=$result[$i]['age'] && $max_age>=$result[$i]['age']){
				$result_1[]=$result[$i];
			}
		}
		$result=$result_1;
		}

		//lọc nghành nghề
		if ($job_style_id != '') {
			$result_1=[]; 
			for ($i = 0; $i < count($result); $i++) {
				$list_job_style_id = explode(',', $result[$i]['job_style_id']);
				if (in_array($job_style_id,$list_job_style_id)) {
					$result_1[] = $result[$i];
				}
			}
			$result=$result_1;
		}
		return $result;
=======
	public function get_list_save_new($user_id)
	{
		$this->db->select('
							tbl_save_news.id as id, 
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		return $this->db->get('tbl_save_news')->result_array();
	}

	public function get_list_save_new_limit($user_id,$limit,$skip)
	{
		$this->db->select('
							tbl_save_news.id as id, 
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_save_news')->result_array();
	}

	public function get_list_apply($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_apply_limit($user_id,$limit,$skip)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_news.status'=>1]);
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
	}

	public function get_list_apply_waiting($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>0,'tbl_news.status'=>1]);
		return $this->db->get('tbl_apply')->result_array();
	}
	public function get_list_accept($user_id)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		return $this->db->get('tbl_apply')->result_array();
	}
	public function get_list_accept_limit($user_id,$limit,$skip)
	{
		$this->db->select('
							tbl_apply.id as id, 
							tbl_apply.new_id,
							tbl_news.title as title, 
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
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->where(['user_id'=>$user_id,'tbl_apply.status'=>1,'tbl_news.status'=>1]);
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_apply')->result_array();
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
}
?>

