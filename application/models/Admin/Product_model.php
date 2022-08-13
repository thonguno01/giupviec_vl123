<?
class Product_model extends CI_Model {
	protected $table = 'product';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function validate($name){
		$this->db->select('*');
		$this->db->where(['name' => $name]);
		if($this->db->get($this->table)->row_object()){
			return false;
		}
		else{
			return true;
		}
	}
	public function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	public function get_one($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row_object();
	}

	public function get_by_name($name){
		$this->db->select('id');
		$this->db->where('name', $name);
		return $this->db->get($this->table)->row_object();
	}


	public function get_list()
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('*');
		return $this->db->get($this->table)->result_array(); // array_object
	}
	
	public function select_data($select, $table, $join, $condition, $oder_by, $start, $perpage){
        $this->db->select($select);
        $this->db->from($table);
        if (count($join) > 0){
            foreach ($join as $value){
                $this->db->join($value['table'],$value['on']);
            }
        }
        if ($condition != ''){
            $this->db->where($condition);
        }
        if ($start >=0 && $perpage >0){
            $this->db->limit($perpage,$start);
        }
        if ($oder_by != ''){
            $this->db->order_by($oder_by);
        }
    
        return $this->db->get()->result();
    }
}
?>
