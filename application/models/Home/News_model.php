
<?
class News_model extends CI_Model
{
	protected $table = 'tbl_news';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function get_list_manager($company_id){
		$this->db->select('
							tbl_news.id, 
							tbl_news.alias as new_alias,
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
							city.cit_name,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.new_status,
							tbl_work_type.work_name,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->where(['company_id'=>$company_id]);
		$this->db->order_by('tbl_news.update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_manager_limit($company_id,$limit,$skip){
		$this->db->select('
							tbl_news.id, 
							tbl_news.alias as new_alias,
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
							city.cit_name,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.new_status,
							tbl_work_type.work_name,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->where(['company_id'=>$company_id]);
		$this->db->order_by('tbl_news.update_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get($this->table)->result_array();
	}

	public function get_list($company_id){
		$this->db->select('
							tbl_news.id, 
							tbl_news.alias as new_alias,
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
							city.cit_name,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.new_status,
							tbl_work_type.work_name,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->where(['company_id'=>$company_id,'tbl_news.status'=>1,'tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))]);
		$this->db->order_by('tbl_news.update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_limit($company_id,$limit,$skip){
		$this->db->select('
							tbl_news.id, 
							tbl_news.alias as new_alias,
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
							city.cit_name,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.new_status,
							tbl_work_type.work_name,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->where(['company_id'=>$company_id,'tbl_news.status'=>1,'tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))]);
		$this->db->order_by('tbl_news.update_at','desc');
		$this->db->limit($limit,$skip);
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_by_tag($tag){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_news.alias as new_alias,
							tbl_companys.id as company_id,
							tbl_companys.alias as company_alias,
							tbl_companys.image,
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
							tbl_news.new_status,
							tbl_news.update_at,
							');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->where(['tbl_news.job_style_id'=>$tag,'tbl_news.status'=>1,'tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))]);
		$this->db->order_by('tbl_news.update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_potential($tag,$city){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_news.alias as new_alias,
							tbl_companys.id as company_id,
							tbl_companys.alias as company_alias,
							tbl_companys.image,
							tbl_companys.name as company_name,
							tbl_news.title as title, 
							tbl_job_style.content as job_style, 
							tbl_news.salary_type as salary_type, 
							tbl_news.salary1 as salary1, 
							tbl_news.salary2 as salary2, 
							tbl_news.salary_time,
							tbl_news.age_from as age_from, 
							tbl_news.age_to as age_to, 
							tbl_news.exp as exp,
							tbl_news.job_style_id,
							tbl_news.work_type_id as work_type,
							tbl_news.city_id,
							tbl_news.district_id,
							tbl_news.address as address,
							tbl_news.new_status,
							tbl_news.update_at,
							city.cit_name
							');
		$this->db->join('tbl_job_style','tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city','tbl_news.city_id=city.cit_id');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->where(['tbl_news.city_id'=>$city,'tbl_news.status'=>1,'tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))]);
		$this->db->order_by('tbl_news.update_at','desc');
		$list_new=$this->db->get($this->table)->result_array();
		$tag_arr=explode(',',$tag);
		$result=[];
		foreach($list_new as $new){
			if(in_array($new['job_style_id'],$tag_arr)){
				$result[]=$new;
			}
		}
		return $result;
	}


	public function get_list_search($search_key, $job_style_id, $city_id, $district_id)
	{
		$this->db->select('
							tbl_news.id as new_id,
							tbl_news.alias as new_alias,
							tbl_news.title,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.salary1,
							tbl_news.salary2,
							tbl_news.salary_type,
							tbl_news.salary_time,
							tbl_news.age_from,
							tbl_news.age_to,
							tbl_news.exp,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_news.job_style_id,
							tbl_job_style.content as job_style,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							new_calendar.t2_ca2_bd,
							new_calendar.t3_ca2_bd,
							new_calendar.t4_ca2_bd,
							new_calendar.t5_ca2_bd,
							new_calendar.t6_ca2_bd,
							new_calendar.t7_ca2_bd,
							new_calendar.t8_ca2_bd,
							new_calendar.t2_ca1_kt,
							new_calendar.t3_ca1_kt,
							new_calendar.t4_ca1_kt,
							new_calendar.t5_ca1_kt,
							new_calendar.t6_ca1_kt,
							new_calendar.t7_ca1_kt,
							new_calendar.t8_ca1_kt,
							new_calendar.t2_ca2_kt,
							new_calendar.t3_ca2_kt,
							new_calendar.t4_ca2_kt,
							new_calendar.t5_ca2_kt,
							new_calendar.t6_ca2_kt,
							new_calendar.t7_ca2_kt,
							new_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->order_by('tbl_news.update_at', 'desc');
		$where = ['tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))];
		if ($job_style_id > 0) {
			$where['tbl_news.job_style_id'] = $job_style_id;
		}
		if ($search_key) {
			$search_key_array=explode(' ',$search_key);
			foreach($search_key_array as $search_key_item){
				// $this->db->like('tbl_job_style.content', '' .$search_key_item . ' ');
				$this->db->like('tbl_news.title', $search_key_item);
			}
		}
		if ($city_id > 0) {
			$where['tbl_news.city_id'] = $city_id;
		}
		if ($district_id > 0) {
			unset($where['tbl_users.city_id']);
			$where['tbl_news.district_id'] = $district_id;
		}
		if (!empty($where)) {
			$this->db->where($where);
		}
		$result = $this->db->get('tbl_news')->result_array();
		return $result;
	}

	function get_detail($id){
		$this->db->select('
							tbl_news.id as new_id,
							tbl_news.alias as new_alias,
							tbl_news.title,
							tbl_news.address,
							tbl_news.district_id,
							tbl_news.city_id,
							tbl_news.start_time,
							tbl_news.close_time,
							tbl_companys.image,
							tbl_companys.name as company_name,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.salary1,
							tbl_news.salary2,
							tbl_news.salary_type,
							tbl_news.salary_time,
							tbl_news.age_from,
							tbl_news.age_to,
							tbl_news.exp,
							tbl_news.edu,
							tbl_news.work_type_id,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_news.job_style_id,
							tbl_job_style.content as job_style,
							tbl_news.description,
							tbl_news.request,
							tbl_news.interest,
							tbl_news.update_at,
							tbl_news.new_index,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							new_calendar.t2_ca2_bd,
							new_calendar.t3_ca2_bd,
							new_calendar.t4_ca2_bd,
							new_calendar.t5_ca2_bd,
							new_calendar.t6_ca2_bd,
							new_calendar.t7_ca2_bd,
							new_calendar.t8_ca2_bd,
							new_calendar.t2_ca1_kt,
							new_calendar.t3_ca1_kt,
							new_calendar.t4_ca1_kt,
							new_calendar.t5_ca1_kt,
							new_calendar.t6_ca1_kt,
							new_calendar.t7_ca1_kt,
							new_calendar.t8_ca1_kt,
							new_calendar.t2_ca2_kt,
							new_calendar.t3_ca2_kt,
							new_calendar.t4_ca2_kt,
							new_calendar.t5_ca2_kt,
							new_calendar.t6_ca2_kt,
							new_calendar.t7_ca2_kt,
							new_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->order_by('tbl_news.update_at', 'desc');
		$this->db->where('tbl_news.id',$id);
		return $this->db->get('tbl_news')->row_array();
	}

	function get_filter($job_style_id,$city,$district,$min_age,$max_age,$exp,$salary_type,$salary1,$salary2,$salary_time,$work_schedule,$work_type_id){
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
							tbl_news.id as new_id,
							tbl_news.alias as new_alias,
							tbl_news.title,
							tbl_companys.image,
							tbl_companys.alias as company_alias,
							tbl_companys.id as company_id,
							tbl_news.salary1,
							tbl_news.salary2,
							tbl_news.salary_type,
							tbl_news.salary_time,
							tbl_news.age_from,
							tbl_news.age_to,
							tbl_news.exp,
							city.cit_name,
							tbl_work_type.work_name,
							tbl_news.job_style_id,
							tbl_job_style.content as job_style,
							tbl_news.description,
							tbl_news.update_at,
							new_calendar.t2_ca1_bd,
							new_calendar.t3_ca1_bd,
							new_calendar.t4_ca1_bd,
							new_calendar.t5_ca1_bd,
							new_calendar.t6_ca1_bd,
							new_calendar.t7_ca1_bd,
							new_calendar.t8_ca1_bd,
							new_calendar.t2_ca2_bd,
							new_calendar.t3_ca2_bd,
							new_calendar.t4_ca2_bd,
							new_calendar.t5_ca2_bd,
							new_calendar.t6_ca2_bd,
							new_calendar.t7_ca2_bd,
							new_calendar.t8_ca2_bd,
							new_calendar.t2_ca1_kt,
							new_calendar.t3_ca1_kt,
							new_calendar.t4_ca1_kt,
							new_calendar.t5_ca1_kt,
							new_calendar.t6_ca1_kt,
							new_calendar.t7_ca1_kt,
							new_calendar.t8_ca1_kt,
							new_calendar.t2_ca2_kt,
							new_calendar.t3_ca2_kt,
							new_calendar.t4_ca2_kt,
							new_calendar.t5_ca2_kt,
							new_calendar.t6_ca2_kt,
							new_calendar.t7_ca2_kt,
							new_calendar.t8_ca2_kt,
		');
		$this->db->join('tbl_companys', 'tbl_companys.id=tbl_news.company_id');
		$this->db->join('tbl_work_type', 'tbl_news.work_type_id=tbl_work_type.id');
		$this->db->join('new_calendar', 'tbl_news.id=new_calendar.new_id');
		$this->db->join('tbl_job_style', 'tbl_news.job_style_id=tbl_job_style.id');
		$this->db->join('city', 'tbl_news.city_id=city.cit_id');
		$this->db->order_by('tbl_news.update_at', 'desc');
		$where = ['tbl_news.new_status'=>1,'tbl_news.close_time >='=>strtotime(date('Y-m-d'))];
		//lọc theo lương
		if($salary_type!=null){
			$where['tbl_news.salary_time']=$salary_time;
			$where['tbl_news.salary_type']=$salary_type;
			if($salary_type==0){
				$where['tbl_news.salary1 <=']=(int)$salary1;
			}
			else{
				$where['tbl_news.salary1 >=']=(int)$salary1;
				$where['tbl_news.salary2 <=']=(int)$salary2;
			}
		}

		//lọc theo nơi làm việc(ở lại nhà chủ...)
		if($work_type_id){
			$where['tbl_news.work_type_id']=$work_type_id;
		}

		//lọc theo ngành nghề
		if($job_style_id){
			$where['tbl_news.job_style_id']=$job_style_id;
		}

		//lọc theo kinh nghiệm
		if($exp){
			$where['tbl_news.exp']=$exp;
		}

		//lọc theo danh sách tỉnh thành
		if(!empty($city) && !empty($list_city_id)){
			$this->db->where_in('tbl_news.city_id',$list_city_id);
		}
		elseif(!empty($city) && empty($list_city_id)){
			return [];
		}
		
		//lọc theo danh sách quận huyện
		if(!empty($district) && !empty($list_district_id)){
			$this->db->where_in('tbl_news.district_id',$list_district_id);
		}
		elseif(!empty($district) && empty($list_district_id)){
			return [];
		}

		//lọc theo lịch làm việc
		if(!empty($work_schedule)){
			for ($i = 0; $i < count($work_schedule); $i++) {
				switch($work_schedule[$i]){
					case 't2':
						$where['new_calendar.t2_ca1_bd !=']='';
						break;
					case 't3':
						$where['new_calendar.t3_ca1_bd !=']='';
						break;
					case 't4':
						$where['new_calendar.t4_ca1_bd !=']='';
						break;
					case 't5':
						$where['new_calendar.t5_ca1_bd !=']='';
						break;
					case 't6':
						$where['new_calendar.t6_ca1_bd !=']='';
						break;
					case 't7':
						$where['new_calendar.t7_ca1_bd !=']='';
						break;
					case 't8':
						$where['new_calendar.t8_ca1_bd !=']='';
						break;
				}
			}
		}
		if(!empty($where)){
			$this->db->where($where);
	   }
	   $result=$this->db->get('tbl_news')->result_array();

	   //lọc tuổi
		if($min_age && $max_age){
			$year_now=date('Y');
			$result_1=[];
			for($i=0;$i<count($result);$i++){
				if($min_age<=$result[$i]['age_from'] && $max_age>=$result[$i]['age_to']){
					$result_1[]=$result[$i];
				}
			}
			$result=$result_1;
			}
		return $result;
	}

	function get_list_day_now($company_id){
		$this->db->where('company_id',$company_id);
		$time_now=strtotime(date('Y-m-d'));
		$time_next_day=$time_now+86400;
		$this->db->where('create_at >',$time_now);
		$this->db->where('create_at <',$time_next_day);
		$this->db->order_by('create_at','desc');
		return $this->db->get($this->table)->result_array();
	}
	function get_time_last_new($company_id){
		$this->db->where('company_id',$company_id);
		$time_now=strtotime(date('Y-m-d'));
		$time_next_day=$time_now+86400;
		$this->db->where('create_at >',$time_now);
		$this->db->where('create_at <',$time_next_day);
		$this->db->order_by('create_at','desc');
		$last_new=$this->db->get($this->table)->row_array();
		if(!empty($last_new)){
			$last_time=$last_new['create_at'];
		}
		else{
			$last_time=0;
		}
		return $last_time;

	}
 

}
?>

