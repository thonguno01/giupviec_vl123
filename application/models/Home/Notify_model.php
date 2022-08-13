
<?
class Notify_model extends CI_Model
{
	protected $table = 'tbl_notify';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}


	public function get_by_user($user_id){
		$this->db->select('
			tbl_notify.id,
			tbl_companys.name,
			tbl_notify.owner_type,
			tbl_notify.noti_type,
			tbl_companys.alias as company_alias,
			tbl_companys.image,
			tbl_notify.company_id,
			tbl_news.id as new_id,
			tbl_news.alias as new_alias,
			tbl_news.title as new_title,
			tbl_notify.create_at,
			');
		$this->db->join('tbl_companys','tbl_companys.id=tbl_notify.company_id');
		$this->db->join('tbl_users','tbl_users.id=tbl_notify.user_id');
		$this->db->join('tbl_news', 'tbl_notify.new_id = tbl_news.id', 'left');
		$this->db->where(['tbl_notify.user_id'=>$user_id,'owner_type'=>0]);
		$this->db->order_by('create_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_by_user_not_seen($user_id){
		$this->db->where(['tbl_notify.user_id'=>$user_id,'owner_type'=>0]);
		$this->db->where('seen',0);
		return $this->db->get($this->table)->result_array();
	}

	public function get_by_company($company_id){
		$this->db->select('
			tbl_notify.id,
			tbl_notify.owner_type,
			tbl_notify.noti_type,
			tbl_users.name,
			tbl_companys.alias as company_alias,
			tbl_users.image,
			tbl_notify.user_id,
			tbl_news.id as new_id,
			tbl_news.alias as new_alias,
			tbl_news.title as new_title,
			tbl_notify.create_at,
			');
		$this->db->join('tbl_companys','tbl_companys.id=tbl_notify.company_id');
		$this->db->join('tbl_users','tbl_users.id=tbl_notify.user_id');
		$this->db->join('tbl_news', 'tbl_notify.new_id = tbl_news.id', 'left');
		$this->db->where(['tbl_notify.company_id'=>$company_id,'owner_type'=>1]);
		$this->db->order_by('create_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_by_company_not_seen($company_id){
		$this->db->where(['tbl_notify.company_id'=>$company_id,'owner_type'=>1]);
		$this->db->where('company_id',$company_id);
		$this->db->where('seen',0);
		return $this->db->get($this->table)->result_array();
	}
}
?>

