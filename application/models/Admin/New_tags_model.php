<?
class New_tags_model extends CI_Model {
	protected $table = 'new_tags';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function get_list_tag_worker($limit,$skip){
		$this->db->where('new_type',1);
		$this->db->join('tbl_job_style','tag_id=id');
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_tag_job($limit,$skip){
		$this->db->where('new_type',2);
		$this->db->join('tbl_job_style','tag_id=id');
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}

	public function search_tag_worker($id,$limit,$skip){
		if($id){
		$this->db->where('tag_id',$id);
		}
		$this->db->where('new_type',1);
		$this->db->join('tbl_job_style','tag_id=id');
		if($limit){
		$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}
	public function search_tag_job($id,$limit,$skip){
		if($id){
		$this->db->where('tag_id',$id);
		}
		$this->db->where('new_type',1);
		$this->db->join('tbl_job_style','tag_id=id');
		if($limit){
		$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}

}
?>
