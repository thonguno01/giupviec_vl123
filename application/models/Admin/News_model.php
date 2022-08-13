<?
class News_model extends CI_Model {
	protected $table = 'tbl_news';
	public function __construct()
	{
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
	}

	public function get_list($limit,$skip){
		$this->db->select('
			tbl_news.id as id,
			tbl_news.alias as alias,
			tbl_news.title as title,
			tbl_news.address as address,
			tbl_news.create_at as create_at,
			tbl_news.salary_type,
			tbl_news.salary1,
			tbl_news.salary2,
			tbl_news.salary_time,
			tbl_news.city_id,
			tbl_news.district_id,
			tbl_news.new_status,
			tbl_news.new_index,
			tbl_news.close_time,
			tbl_companys.id as company_id,
			tbl_companys.name,
			tbl_companys.alias as alias_company
		');
		$this->db->join('tbl_companys','tbl_news.company_id = tbl_companys.id');
		if($limit>0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('tbl_news.update_at','desc');
		return $this->db->get($this->table)->result_array();
	}
	public function get_list_search($id,$title,$name,$city_id,$address,$ngaybd,$ngaykt,$new_status,$limit,$skip){
		$this->db->select('
			tbl_news.id as id,
			tbl_news.alias as alias,
			tbl_news.title as title,
			tbl_news.address as address,
			tbl_news.create_at as create_at,
			tbl_news.salary_type,
			tbl_news.salary1,
			tbl_news.salary2,
			tbl_news.salary_time,
			tbl_news.city_id,
			tbl_news.district_id,
			tbl_news.new_status,
			tbl_news.new_index,
			tbl_news.close_time,
			tbl_companys.id as company_id,
			tbl_companys.name,
			tbl_companys.alias as alias_company
		');
		$this->db->join('tbl_companys','tbl_news.company_id = tbl_companys.id');
		if($id!=''){
			$this->db->where('tbl_news.id',$id);
		}
		if($title!=''){
			$title_arr=explode(' ',$title);
			foreach($title_arr as $item){
				$this->db->like('tbl_news.title',$item);
			}
		}
		if($name!=''){
			$name_arr=explode(' ',$name);
			foreach($name_arr as $item){
				$this->db->like('tbl_companys.name',$item);
			}
		}
		if($city_id>0){
			$this->db->where('tbl_news.city_id',$city_id);
		}
		if($address!=''){
			$address_arr=explode(' ',$address);
			foreach($address_arr as $item){
				$this->db->like('tbl_news.address',$item);
			}
		}
		if($ngaybd!=''){
			$time=strtotime($ngaybd);
			$this->db->where('tbl_news.create_at>=',$time);
		}
		if($ngaykt!=''){
			$time=strtotime($ngaykt);
			$this->db->where('tbl_news.create_at<=',$time+86399);
		}
		if($new_status!=''){
			if($new_status==0){
				$time_now=strtotime(date('Y-m-d'));
				$this->db->where('close_time<',$time_now);
			}
			$this->db->or_where('new_status',$new_status);
		}
		if($limit!=0){
			$this->db->limit($limit,$skip);
		}
		$this->db->order_by('tbl_news.update_at','desc');
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
