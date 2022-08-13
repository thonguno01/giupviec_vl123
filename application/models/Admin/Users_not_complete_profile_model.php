<?
class Users_not_complete_profile_model extends CI_Model {
	protected $table = 'users_not_complete_profile';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function get_list_limit($limit,$skip){
		$this->db->limit($limit,$skip);
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_search($email,$name,$phone,$address,$ngaybd,$ngaykt,$limit,$skip)
	{
		$this->db->order_by('update_at','desc');
		if($email!=''){
			$this->db->like('user_email',$email);
		}
		if($name!=''){
			$name_arr=explode(' ',$name);
			foreach($name_arr as $item){
				$this->db->like('user_name',$item);
			}
		}
		if($phone!=''){
			$this->db->like('user_phone',$phone);
		}
		if($address!=''){
			$address_arr=explode(' ',$address);
			foreach($address_arr as $item){
				$this->db->like('user_address',$item);
			}
		}
		if($ngaybd!=''){
			$time=strtotime($ngaybd);
			$this->db->where('update_at>=',$time);
		}
		if($ngaykt!=''){
			$time=strtotime($ngaykt);
			$this->db->where('update_at<=',$time+86399);
		}
		if($limit!=0){
			$this->db->limit($limit,$skip);
		}
		return $this->db->get($this->table)->result_array();
	}
}
?>
