<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetDistrictController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Generals_model');
		$this->load->helper('function');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	
	public function get_list_district()
	{
		$cit_id = $this->input->get('cit_id');
		$list_district = $this->Generals_model->get_list_district($cit_id);
		echo json_encode($list_district);
	}
}
