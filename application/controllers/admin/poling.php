<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Poling extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		
		function index()
		{					
			$data['q_pol']=$this->admin_model->poling_group_get();
			$data['content']='admin/poling/index';
			$this->load->view('admin/layout/template', $data);
		}
	
		
		public function add()
		{					
			$data['content']='admin/poling/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add_do()
		{						
			$this->admin_model->pol_group_add();	
			redirect('admin/poling');
		}
		
		public function delete()
		{						
			$vote_group_id=$this->uri->segment(4);
			$this->admin_model->pol_delete($vote_group_id);	
			redirect('admin/poling');
		}
		
		function edit_selected()
		{		
			$vote_group_id=$this->uri->segment(4);		
			$data['q_poling']=$this->admin_model->poling_group_get_by($vote_group_id);
			$data['q_pol']=$this->admin_model->poling_get_by($vote_group_id);
			$data['content']='admin/poling/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
				
		function edit_do()
		{			
			//database
			$this->admin_model->pol_group_edit_do();			
			//echo $this->db->last_query();
			redirect('admin/poling');
		}
		
		public function opsi_add()
		{					
			$data['content']='admin/poling/opsi_add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function opsi_add_do()
		{						
			$this->admin_model->pol_add();	
			$vote_vote_group_id=$this->input->post('vote_vote_group_id');
			redirect('admin/poling/edit_selected/'.$vote_vote_group_id);
		}
		
		
		function opsi_edit_selected()
		{		
			$vote_id=$this->uri->segment(4);		
			$data['q_poling']=$this->admin_model->pol_get_by($vote_id);
			$data['content']='admin/poling/opsi_edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
				
		function opsi_edit_do()
		{			
			$vote_vote_group_id=$this->input->post('vote_vote_group_id');	
			//database
			$this->admin_model->pol_edit_do();			
			//echo $this->db->last_query();
			redirect('admin/poling/edit_selected/'.$vote_vote_group_id);
		}
		
				
		public function opsi_delete()
		{						
			$vote_id=$this->uri->segment(4);
			$q_poling=$this->admin_model->pol_get_by($vote_id);
			foreach($q_poling->result() as $row):
				$vote_vote_group_id=$row->vote_vote_group_id;
			endforeach;
			$this->admin_model->opsi_pol_delete($vote_id);	
			redirect('admin/poling/edit_selected/'.$vote_vote_group_id);
		}
		
		
		
	}					