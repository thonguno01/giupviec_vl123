<?
class Admin_model extends CI_Model {
	protected $table = 'user_admin';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function get_one($user_name){
		$this->db->select('id,name,email,phone');
		$this->db->where(['user_name' => $user_name]);
		return $this->db->get($this->table)->row_object();
	}

	public function get_list()
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('id,name');
		$this->db->where(['id' => 1]);
		return $this->db->get($this->table)->result_array(); // array_object
		// return $this->db->get($this->table)->row_object(); // Object
	}
}

?>
