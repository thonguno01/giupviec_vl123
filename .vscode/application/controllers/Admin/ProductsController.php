<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(['form_validation', 'session']);
		$this->load->database();
		$this->load->model('Admin/Product_model');
	}


	public function index()
	{
		$data = [
			'page_name' => 'admin/products',
		];
		$lists = $this->Product_model->get_list();
		$data = [
			'page_name' => 'admin/products',
			'style' => '',
			'js' => '',
			'lists' => $lists
		];
		$this->load->view('admin/index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data_page = [
				'page_name' => 'admin/add_product',
				'style' => '',
				'js' => '',
				'lists' => ''
			];
			$this->load->view('admin/index', $data_page);
		} else {
			if (!$this->Product_model->validate($this->input->post('product_name'))) {
				$this->session->set_flashdata('insert_status', 'insert fail. Product name already exist', 300);
				$data_page = [
					'page_name' => 'admin/add_product',
					'style' => '',
					'js' => '',
					'lists' => ''
				];
				$this->load->view('admin/index', $data_page);
			} else {
				$data = [
					'name' => $this->input->post('product_name'),
					'status' => $this->input->post('status')
				];
				$this->Product_model->insert($data);
				$this->session->set_flashdata('insert_status', 'insert success', 300);
				$data_page = [
					'page_name' => 'admin/add_product',
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
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$object = $this->Product_model->get_one($this->input->get('id'));
			$data = [
				'page_name' => 'admin/update_product',
				'style' => '',
				'js' => '',
				'object' => $object
			];
			$this->load->view('admin/index', $data);
		}
		else{
			$data = [
				'name' => $this->input->post('product_name'),
				'status' => $this->input->post('status')
			];
			$this->Product_model->update($this->input->get('id'),$data);
			redirect('/admin/products');
		}
	}
}
