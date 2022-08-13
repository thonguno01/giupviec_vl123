<?
class Company_model extends CI_Model {
	protected $table = 'tbl_companys';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function get_list(){
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}
	public function get_list_search($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,$limit,$skip){
		if($id!=''){
			$this->db->where('id',$id);
		}
		if($email!=''){
			$this->db->like('email',$email);
		}
		if($name!=''){
			$name_arr=explode(' ',$name);
			foreach($name_arr as $item){
				$this->db->like('name',$item);
			}
		}
		if($phone!=''){
			$this->db->like('phone',$phone);
		}
		if($city_id!=0){
			$this->db->where('city_id',$city_id);
		}
		if($address!=''){
			$address_arr=explode(' ',$address);
			foreach($address_arr as $item){
				$this->db->like('address',$item);
			}
		}
		if($ngaybd!=''){
			$time=strtotime($ngaybd);
			$this->db->where('create_at>=',$time);
		}
		if($ngaykt!=''){
			$time=strtotime($ngaykt);
			$this->db->where('create_at<=',$time+86399);
		}
		if($register_source!=0){
			$this->db->where('register_source',$register_source);
		}
		if($limit!=0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_no_post($limit,$skip){
		$this->db->where('not_post',0);
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_list_search_no_post($id,$email,$name,$phone,$city_id,$address,$ngaybd,$ngaykt,$register_source,$limit,$skip){
		$this->db->where('not_post',0);
		if($id!=''){
			$this->db->where('id',$id);
		}
		if($email!=''){
			$this->db->like('email',$email);
		}
		if($name!=''){
			$name_arr=explode(' ',$name);
			foreach($name_arr as $item){
				$this->db->like('name',$item);
			}
		}
		if($phone!=''){
			$this->db->like('phone',$phone);
		}
		if($city_id>0){
			$this->db->where('city_id',$city_id);
		}
		if($address!=''){
			$address_arr=explode(' ',$address);
			foreach($address_arr as $item){
				$this->db->like('address',$item);
			}
		}
		if($ngaybd!=''){
			$time=strtotime($ngaybd);
			$this->db->where('create_at>=',$time);
		}
		if($ngaykt!=''){
			$time=strtotime($ngaykt);
			$this->db->where('create_at<=',$time+86399);
		}
		if($register_source!=0){
			$this->db->where('register_source',$register_source);
		}
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('update_at','desc');
		return $this->db->get($this->table)->result_array();
	}

	public function get_history_point($company_id,$limit,$skip){
		$this->db->where('company_id',$company_id);
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('create_at','desc');
		return $this->db->get('tbl_history_point')->result_array();
	}

	public function get_list_search_history_point($company_id,$ngaybd,$ngaykt,$limit,$skip){
		$this->db->where('company_id',$company_id);
		if($ngaybd!=''){
			$time=strtotime($ngaybd);
			$this->db->where('create_at>=',$time);
		}
		if($ngaykt!=''){
			$time=strtotime($ngaykt);
			$this->db->where('create_at<=',$time+86399);
		}
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('create_at','desc');
		return $this->db->get('tbl_history_point')->result_array();
	}

}
?>
