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
		$this->db->select('id,name,price,discount,code_product,create_date,update_date,status');
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row_object(); // array_object
	}

	public function get_list()
	{
		// SELECT * FROM table WHERE ... JOIN tbl ON dk_join ORDER BY ... LIMIT ...
		$this->db->select('id,name,price,discount,code_product,create_date,update_date,status');
		return $this->db->get($this->table)->result_array(); // array_object
	}
}
?>
