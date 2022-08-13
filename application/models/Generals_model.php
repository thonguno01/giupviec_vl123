
<?
class Generals_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}


	public function get_where($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	public function get_one_where($table, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->get($table)->row_array();
	}

	public function get_list($table)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		return $this->db->get($table)->result_array(); // array_object
	}

<<<<<<< HEAD
	public function get_list_update_limit($table,$limit,$skip)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		if($limit>0){
		$this->db->limit($limit,$skip);
		}
		$this->db->order_by('update_at','desc');
		return $this->db->get($table)->result_array(); // array_object
	}

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	public function get_list_limit($table,$limit,$skip)
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		$this->db->limit($limit,$skip);
		return $this->db->get($table)->result_array(); // array_object
	}

	public function get_list_city()
	{
		$this->db->select('*');
		$this->db->where('cit_parent', 0);
		return $this->db->get('city')->result_array();
	}

	public function get_list_district($cit_id)
	{
		$this->db->select('*');
		$this->db->where('cit_parent', $cit_id);
		return $this->db->get('city')->result_array();
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	public function active_user($table, $token)
	{
		$this->db->where('email_verify_token', $token);
		return $this->db->update($table, ['active' => 1,'update_at'=>strtotime(date("Y-m-d H:i:s"))]);
	}
	public function update($table,$key,$data){
		$this->db->where($key);
		return $this->db->update($table,$data);
	}

	public function delete($table,$key){
		$this->db->where($key);
		return $this->db->delete($table);
	}
<<<<<<< HEAD
	
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	public function get_city_name($city_id){
		$this->db->select('cit_name');
		$this->db->where('cit_id',$city_id);
		$city=$this->db->get('city')->row_array();
		return $city['cit_name'];
<<<<<<< HEAD
	}

	public function get_star_avg($user_id){
		$select_query='sum(star_rating)/count(id) as star_avg';
		$this->db->select($select_query,FALSE);
		$this->db->group_by('user_id');
		$this->db->where(['user_id'=>$user_id,'star_rating !='=>0]);
		$output=$this->db->get('tbl_apply')->row_array();
		return $output['star_avg'];
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	}
}
?>

