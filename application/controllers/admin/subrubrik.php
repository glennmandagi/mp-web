<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Subrubrik extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		
		function index()
		{			
			// initialize pagination
			$this->load->library('pagination');	
			$limit=20;
			$offset= $this->uri->segment(4, 0);
			$news_num=$this->admin_model->subcat_num();	
			
			$config['base_url'] = site_url() . 'admin/subrubrik/index';
			$config['total_rows'] = $news_num;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			// End. initialize pagination
					
			$q_news=$this->admin_model->subcat_get($limit, $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['q_news']=$q_news;		
			$data['offset']=$offset+1;//prevent zero 
			
			$data['page']='berita';
			$data['content']='admin/subrubrik/index';
			$this->load->view('admin/layout/template', $data);
		}
	
		
		public function add()
		{					
			$q_post_subcategory=$this->admin_model->news_category_get();
			$data['q_post_subcategory']=$q_post_subcategory;
						$q_news_category=$this->admin_model->news_category_get();
			$data['q_news_category']=$q_news_category;
			$data['page']='berita';
			$data['content']='admin/subrubrik/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add_do()
		{						
			$this->admin_model->subcat_add();	
			redirect('admin/subrubrik');
		}
		
		public function delete()
		{						
			$news_subcat_id=$this->uri->segment(4);
			$this->admin_model->subcat_delete($news_subcat_id);	
			redirect('admin/subrubrik');
		}
		
		function edit_selected()
		{		
			$news_subcat_id=$this->uri->segment(4);		
			$q_news_category=$this->admin_model->news_category_get();
			$data['q_news_category']=$q_news_category;
			
			$data['q_news']=$this->admin_model->subcat_edit_selected();					
			$data['page']='berita';
			$data['content']='admin/subrubrik/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
				
		function edit_do()
		{			
			//database
			$this->admin_model->subcat_edit_do();			
			redirect('admin/subrubrik');
		}
		
		
		
		
		
	}					