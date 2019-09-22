<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller {
	
	function __construct()	
	{
		parent::__construct();	
		$this->load->model('admin_model');	
		$this->load->model('user_model');		
		$this->user_model->session_check();
	}		
	
	public function index()	
	{
		$data['q_slide']=$this->admin_model->slide_get();
			
		$this->template->set('title', 'admin - medianesia.com');		
		$this->template->set('nav', 'Slide');		
		$this->template->load('admin', 'admin/slide/index', $data);	
	}

	public function edit()
	{
		$q_slide=$this->admin_model->slide_get_by_id();
		$data['q_slide']=$q_slide;
		
		$this->breadcrumb->add('Slide','admin/slide')
			->add('Edit','');
		
		$this->template->set('title', 'admin - medianesia.com');		
		$this->template->set('nav', 'Slide');		
		$this->template->load('admin', 'admin/slide/edit', $data);	
	}
	
	public function edit_do()	
	{
		$this->admin_model->slide_edit();
		redirect('admin/slide');
	}

}