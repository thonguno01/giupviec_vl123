<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/User_model','Admin/Admin_model'));
		// if(!$this->session->userdata('admin')){
		// 	redirect('/admin/login');
		// }
	}


	public function index()
	{
		if($this->session->userdata('admin')){
			$list_city=$this->Generals_model->get_list_city();
			$list_employee_full=$this->User_model->get_list();

			if(!$this->input->get('page')||$this->input->get('page')<0){
				$page=1;
			}
			else{
				$page=$this->input->get('page');
			}

			$url = full_path();
			$total_rows=count($list_employee_full);
			$row_per_page=10;
			$pagination=ci_pagination($url,$total_rows,$row_per_page);
			$this->pagination->initialize($pagination);
			$link=$this->pagination->create_links();

			$list_employee=$this->User_model->get_list_limit($row_per_page,$row_per_page*($page-1));
			for ($i = 0; $i < count($list_employee); $i++) {
				$list_employee[$i]['full_address'] = '';
				if ($list_employee[$i]['address'] != '') {
					$list_employee[$i]['full_address'] .= $list_employee[$i]['address'] . ', ';
				}
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['district_id']) . ', ';
				$list_employee[$i]['full_address'] .= $this->Generals_model->get_city_name($list_employee[$i]['city_id']);
			}
			$data = [
				'page_name' => 'admin/list_employee',
				'js'=>array('/scripts/admin/list_employee.js'),
				'list_city'=>$list_city,
				'list_employee'=>$list_employee,
				'links'=>$link
			];
			$this->load->view('/admin/index', $data);
		} else{
			redirect('/admin/login');
		}
		
	}
	public function login(){
		$this->load->view('/admin/login');
	}

	public function logout(){
		$this->session->unset_userdata('admin');
		redirect('/admin/login');
	}

}
