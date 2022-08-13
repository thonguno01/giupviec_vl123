
<?
class City_model extends CI_Model
{
	protected $table = 'city';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function get_city_top_employee(){
		$this->db->order_by('count_worker','desc');
		$this->db->where('cit_parent =','0');
		$this->db->limit(10);
		return $this->db->get($this->table)->result_array();
	}
	public function get_district_top_employee(){
		$this->db->order_by('count_worker','desc');
		$this->db->where('cit_parent !=','0');
		$this->db->limit(13);
		return $this->db->get($this->table)->result_array();
	}

	public function get_city_top_job(){
		$this->db->order_by('count_job','desc');
		$this->db->where('cit_parent =','0');
		$this->db->limit(10);
		return $this->db->get($this->table)->result_array();
	}
	public function get_district_top_job(){
		$this->db->order_by('count_job','desc');
		$this->db->where('cit_parent !=','0');
		$this->db->limit(13);
		return $this->db->get($this->table)->result_array();

	}

	public function get_hot_district_by_city($cit_id){
		$this->db->order_by('count_job','desc');
		$this->db->where('cit_parent',$cit_id);
		$this->db->where('count_job !=',0);
		$this->db->limit(6);
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_district(){
		$this->db->where('cit_parent !=',0);
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_district_by_city_key($city_key){

		if($city_key!=''){
			$this->db->where('cit_parent',0);
			$city_arr=explode(' ',$city_key);
			foreach($city_arr as $city){
			$this->db->like('cit_name',$city);
			}
			$list_city=$this->db->get('city')->result_array();
			$list_city_id=[];
			for($i=0;$i<count($list_city);$i++){
				$list_city_id[]=$list_city[$i]['cit_id'];
			}
			$this->db->reset_query();
		}
		$this->db->where('cit_parent !=',0);
		$this->db->where_in('cit_parent',$list_city_id);
		return $this->db->get($this->table)->result_array();
	}

	public function update_count_worker($district_id){
		$this->db->where('cit_id',$district_id);
		
		$district=$this->db->get($this->table)->row_array();
		// return $this->db->get($this->table)->row_array();
		$this->db->reset_query();
		$this->db->where('city_id',$district['cit_parent']);
		$city_worker=$this->db->get('tbl_users')->result_array();
		$city_worker_count=count($city_worker);
		$this->db->reset_query();
		$this->db->where('district_id',$district['cit_id']);
		$district_worker=$this->db->get('tbl_users')->result_array();
		$district_worker_count=count($district_worker);
		$this->db->reset_query();
		$this->db->where('cit_id',$district['cit_parent']);
		$this->db->update('city',['count_worker'=>$city_worker_count]);
		$this->db->reset_query();
		$this->db->where('cit_id',$district['cit_id']);
		$this->db->update('city',['count_worker'=>$district_worker_count]);
		return true;
	}

	public function update_count_job($district_id){
		$this->db->where('cit_id',$district_id);
		$district=$this->db->get($this->table)->row_array();
		$this->db->reset_query();
		$this->db->where('city_id',$district['cit_parent']);
		$city_job=$this->db->get('tbl_news')->result_array();
		$city_job_count=count($city_job);
		$this->db->reset_query();
		$this->db->where('district_id',$district['cit_id']);
		$district_job=$this->db->get('tbl_news')->result_array();
		$district_job_count=count($district_job);
		$this->db->reset_query();
		$this->db->where('cit_id',$district['cit_parent']);
		$this->db->update('city',['count_job'=>$city_job_count]);
		$this->db->reset_query();
		$this->db->where('cit_id',$district['cit_id']);
		$this->db->update('city',['count_job'=>$district_job_count]);
		return true;
	}
}
?>

