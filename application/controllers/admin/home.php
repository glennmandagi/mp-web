<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->user_model->session_check();
	}
	
	public function index()
	{			
		$data['page']='home';
		$data['content']='admin/home/index';
		//$this->load->view('admin/layout/template', $data);
		redirect('admin/news/edit');
	}
	
	function logout()
	{
		//del session
		$this->session->sess_destroy();
		redirect('admin/login');	
	}
	
	
	
}