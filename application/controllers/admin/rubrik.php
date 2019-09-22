<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Rubrik extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		public function indexxx()
		{				
			$data['page']='berita';
			$data['content']='admin/rubrik/index';
			$this->load->view('admin/layout/template', $data);
		}
		
		function index()
		{			
			// initialize pagination
			$this->load->library('pagination');	
			$limit=20;
			$offset= $this->uri->segment(4, 0);
			$news_num=$this->admin_model->cat_num();	
			
			$config['base_url'] = site_url() . 'admin/rubrik/index';
			$config['total_rows'] = $news_num;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			// End. initialize pagination
					
			$q_news=$this->admin_model->cat_get($limit, $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['q_news']=$q_news;		
			$data['offset']=$offset+1;//prevent zero 
			
			$data['page']='berita';
			$data['content']='admin/rubrik/index';
			$this->load->view('admin/layout/template', $data);
		}
	
		
		public function add()
		{					
			$data['page']='berita';
			$data['content']='admin/rubrik/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add_do()
		{						
			$this->admin_model->cat_add();
			
			redirect('admin/rubrik');
		}
		
		public function delete()
		{						
			$news_cat_id=$this->uri->segment(4);
			$this->admin_model->cat_delete($news_cat_id);	
			redirect('admin/rubrik');
		}
		
		function edit_selected()
		{		
			$news_cat_id=$this->uri->segment(4);		
			$data['q_news']=$this->admin_model->cat_edit_selected();					
			$data['page']='berita';
			$data['content']='admin/rubrik/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
				
		function edit_do()
		{			
			//database
			$this->admin_model->cat_edit_do();			
			redirect('admin/rubrik');
		}
		
		
		
		
		
	}					