<?
class Job_style_model extends CI_Model {
	protected $table = 'tbl_job_style';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function search($id,$limit,$skip){
		if($id){
		$this->db->where('id',$id);
		}
		if($limit){
		$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}
	public function get_list_limit($limit,$skip){
		if($limit){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

}
?>
