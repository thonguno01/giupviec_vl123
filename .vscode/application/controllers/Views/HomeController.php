<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function lists()
    {
        $data = [
            'page_name' => 'home/last-search',
            'style' => 'css/search',
            'js' => 'scripts/script'
        ];
        $this->load->view('home/index',$data);
    }
    public function products()
    {
        $data = [
            'page_name' => 'home/evaluate',
            'style' => 'css/evaluate',
            'js' => 'scripts/evaluate',
            'js_2' => 'scripts/app'
        ];
        $this->load->view('home/index',$data);
    }
    public function cart_details()
    {
        $data = [
            'page_name' => 'home/cart-details',
            'style' => 'css/cart-details',
            'js' => 'scripts/cart-details',
            'js_2' => 'scripts/app'
        ];
        $this->load->view('home/index',$data);
    }
    public function bill_information()
    {
        $data = [
            'page_name' => 'home/bill_information',
            'style' => 'css/bill_information',
            'js' => 'scripts/bill_information',
            'js_2' => ''
        ];
        $this->load->view('home/index',$data);
    }
}
