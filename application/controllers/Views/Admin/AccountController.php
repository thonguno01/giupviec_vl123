<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper(array('url','function'));
        $this->load->library(['form_validation','session','pagination']);
        $this->load->database();
		$this->load->model(array('Generals_model','Admin/User_model','Admin/Admin_model'));
		if(!$this->session->userdata('admin')){
			redirect('/admin/login');
		}
	}

	public function list_account(){
		$list_account_full=$this->Admin_model->get_list_account();

		if(!$this->input->get('page')||$this->input->get('page')<0){
			$page=1;
		}
		else{
			$page=$this->input->get('page');
		}
		$total_rows=count($list_account_full);
		$row_per_page=10;
		$url=full_path();
		$pagination=ci_pagination($url,$total_rows,$row_per_page);
		$this->pagination->initialize($pagination);
		$link=$this->pagination->create_links();

		$list_account=$this->Admin_model->get_list_account_limit($row_per_page,$row_per_page*($page-1));
		$data = [
			'page_name' => 'admin/list_account',
			'list_account'=>$list_account,
			'links'=>$link
		];
		$this->load->view('/admin/index', $data);
	}

	public function add_account(){
		$admin_module=$this->Generals_model->get_list('modules');
		$data = [
			'style'=>array('/admincssjs/dist/css/custom_style.css'),
			'js'=>array('/scripts/admin/add_account.js'),
			'page_name' => 'admin/add_account',
			'admin_module'=>$admin_module
		];
		$this->load->view('/admin/index', $data);
	}

	public function edit_account($admin_id){
		$info_admin=$this->Generals_model->get_one_where('tbl_admin',['id'=>$admin_id]);
		$role_arr=$this->Admin_model->get_role_arr($admin_id);
		$admin_module=$this->Generals_model->get_list('modules');
		$data = [
			'style'=>array('/admincssjs/dist/css/custom_style.css'),
			'js'=>array('/scripts/admin/edit_account.js'),
			'page_name' => 'admin/edit_account',
			'admin_module'=>$admin_module,
			'info_admin'=>$info_admin,
			'role_arr'=>$role_arr
		];
		$this->load->view('/admin/index', $data);
	}

}
