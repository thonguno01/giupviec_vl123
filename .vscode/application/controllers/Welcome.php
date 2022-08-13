<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->database();  
        $this->load->model('Ab2dmin/Product_model');
	}
	public function index()
	{
		$data = array(
			'name' => 'My Name',
			'status' => 1
	);
	// $this->Product_model->insert($data);
	$lists = $this->Product_model->get_list();
		$data = [
			'page_name' => 'home/home_page',
            'style' => '',
            'js' => 'scripts/app',

			'lists' => $lists
		];
		$this->load->view('home/index', $data);
	}
}
