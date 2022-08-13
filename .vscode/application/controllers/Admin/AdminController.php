<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation','session']);
        $this->load->database();
		$this->load->model('admin/Admin_model');
	}


	public function index()
	{
		if($this->session->userdata('username')){
			$data = [
				'page_name' => 'admin/layout-static',
			];
			$this->load->view('admin/index', $data);
		}
		else {
			redirect('admin/login');
		}
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('/admin/login');
        } else {
 
            $username = $this->input->post('username');
            $password = $this->input->post('password');
 
            $member = $this->db->get_where('user_admin',['user_name' => $username])->row();
            
            if(!$member) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }
    
            if(md5($password)!=$member->password) {
                $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
                redirect(uri_string());
            }
 
             $data = array(
                    'username' => $member->user_name,
                    'email' => $member->email
                    );
 
                
            $this->session->set_userdata($data);
            redirect('/admin');
            
        }
	}
	public function logout(){
		$this->session->sess_destroy();  
		redirect('/admin');
	}
	public function layout()
    {
        $data = [
            'page_name' => 'admin/layout-static',
        ];
        $this->load->view('admin/index',$data);
    }
    public function category()
    {
        $data = [
            'page_name' => 'admin/category',
        ];
        $lists = $this->Category_model->get_list();
		$data = [
			'page_name' => 'admin/category',
            'style' => '',
            'js' => '',
			'lists' => $lists
		];
		$this->load->view('admin/index', $data);
    }

}
