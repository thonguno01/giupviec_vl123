<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManufacturerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(['form_validation', 'session']);
		$this->load->database();
		$this->load->model('Admin/Manufacturer_model');
	}


	public function index()
	{

		$lists = $this->Manufacturer_model->get_list();
		$data = [
			'page_name' => 'admin/manufacturer',
			'style' => '',
			'js' => '',
			'lists' => $lists
		];
		$this->load->view('admin/index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('manufacturer_name', 'manufacturer Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data_page = [
				'page_name' => 'admin/add_manufacturer',
				'style' => '',
				'js' => '',
				'lists' => ''
			];
			$this->load->view('admin/index', $data_page);
		} else {
			if (!$this->Manufacturer_model->validate($this->input->post('manufacturer_name'))) {
				$this->session->set_flashdata('insert_status', 'insert fail. manufacturer name already exist', 300);
				$data_page = [
					'page_name' => 'admin/add_manufacturer',
					'style' => '',
					'js' => '',
					'lists' => ''
				];
				$this->load->view('admin/index', $data_page);
			} else {
				$data = [
					'name' => $this->input->post('manufacturer_name'),
					'status' => $this->input->post('status')
				];
				$this->Manufacturer_model->insert($data);
				$this->session->set_flashdata('insert_status', 'insert success', 300);
				$data_page = [
					'page_name' => 'admin/add_manufacturer',
					'style' => '',
					'js' => '',
					'lists' => ''
				];
				$this->load->view('admin/index', $data_page);
			}
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('manufacturer_name', 'manufacturer Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$object = $this->Manufacturer_model->get_one($this->input->get('id'));
			$data = [
				'page_name' => 'admin/update_manufacturer',
				'style' => '',
				'js' => '',
				'object' => $object
			];
			$this->load->view('admin/index', $data);
		}
		else{
			$data = [
				'name' => $this->input->post('manufacturer_name'),
				'status' => $this->input->post('status')
			];
			$this->Manufacturer_model->update($this->input->get('id'),$data);
			redirect('/admin/manufacturer');
		}
	}
}
