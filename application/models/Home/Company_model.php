
<?
class Company_model extends CI_Model
{
	protected $table = 'tbl_companys';
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}

	public function add_view($id){
		$this->db->where('id',$id);
		$company=$this->db->get($this->table)->row_array();
		$this->db->reset_query();
		$this->db->where('id',$id);
		$data=[
			'view_count'=>$company['view_count']+1
		];
		return $this->db->update($this->table,$data);
	}
}
?>

