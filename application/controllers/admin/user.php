<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		function index()
		{			
		
			$q_user=$this->admin_model->user_get();
			$data['q_user']=$q_user;					
			$data['page']='user';
			$data['content']='admin/user/index';
			$this->load->view('admin/layout/template', $data);
		}
	
		
		public function add()
		{					
			$data['page']='berita';
			$data['content']='admin/user/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add_do()
		{			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|xss_clean|callback_password_check');
			
			if ($this->form_validation->run() == FALSE):
				$this->add();
			else:
				$this->admin_model->user_add();
				redirect('admin/user');
			endif;
		}
		
		public function password_check($str)
		{
			if (!preg_match("#[0-9]+#", $str)):
				$this->form_validation->set_message('password_check', ' %s harus terdiri dari kombinasi angka dan huruf');
				return FALSE;			
			elseif (!preg_match("#[a-z]+#", $str)):
				$this->form_validation->set_message('password_check', ' %s harus terdiri dari kombinasi angka dan huruf');
				return FALSE;		
			else:
				return TRUE;
			endif;
		}
			
		function edit_selected($id)
		{		
			if($id==''):
			$id=$this->uri->segment(4);
			endif;
			$data['q_user']=$this->admin_model->user_edit_selected($id);					
			$data['page']='user';
			$data['content']='admin/user/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
				
		function edit_do()
		{			
			$id=$this->uri->segment(4);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			if($this->input->post('password')!=''):
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|xss_clean|callback_password_check');
			endif;
			if ($this->form_validation->run() == FALSE):
				$this->edit_selected($id);	
			else:
				//database
				$this->admin_model->user_edit_do();			
				redirect('admin/user');			
			endif;
		}
		
		public function delete()
		{						
			$id=$this->uri->segment(4);
			$this->admin_model->user_delete($id);	
			redirect('admin/user');
		}

		public function c_pass()
		{						
			$this->load->view('admin/user/c_pass');
		}

		
		
		
	}					