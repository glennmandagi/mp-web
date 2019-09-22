<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Note extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		
		
		public function index()
		{					
			
			$data['page']='berita';
			$data['content']='admin/page/note';
			$this->load->view('admin/layout/template', $data);
		}
		
	
		
		
		
		
		
	}					