<?
class Admin_model extends CI_Model {
	protected $table = 'tbl_admin';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}
	public function module($admin_id)
	{
		$this->db->where('id',$admin_id);
		$admin=$this->db->get('tbl_admin')->row_array();
		$this->db->reset_query();
		$this->db->order_by('mod_order','asc');
		if($admin['is_admin']==1){
			return $this->db->get('modules')->result_array();
		}
		else{
			$this->db->join('modules','adu_admin_module_id=mod_id');
			$this->db->where('adu_admin_id',$admin_id);
			return $this->db->get('admin_user_right')->result_array();
		}
	}

	public function get_role($id){
		$this->db->where('adu_admin_id',$id);
		$this->db->join('modules','adu_admin_module_id=mod_id');
		return $this->db->get('admin_user_right')->result_array();
	}

	public function get_role_arr($id){
		$list_role=$this->get_role($id);
		$role_arr=[];
		foreach($list_role as $role){
			$role_arr[]=$role['mod_id'];
		}
		return $role_arr;
	}

	public function get_list_account(){
		$this->db->where('is_admin',0);
		return $this->db->get('tbl_admin')->result_array();
	}
	public function get_list_account_limit($limit,$skip){
		$this->db->where('is_admin',0);
		$this->db->limit($limit,$skip);
		return $this->db->get('tbl_admin')->result_array();
	}

}
?>
