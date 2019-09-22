<?php
class user_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function session_check()
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if($is_logged_in==''):
			redirect('admin/login');
		endif;		
	}
	
	function ifsuper()
	{
		$user_type=$this->session->userdata('user_type');
		if($user_type!='1'):
			redirect('admin/news/edit');
		endif;		
	}
	
	function have_session_check()
	{
		$is_logged_in=$this->session->userdata('is_logged_in');
		if($is_logged_in!=''):
			redirect('admin/home');
		endif;		
	}

	
	function user_check()
	{		
		$user_email=$this->input->post('username', True);
		$user_password=$this->input->post('password', True);
		$user_password=md5($user_password);
		$this->db->select('*');	
		$this->db->from('users');		
		$this->db->where('username', $user_email);
		$this->db->where('password', $user_password);
		$query = $this->db->get();	
		return $query;
	}
	
	function register()
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'user_type'=>2,
			'email'=>$this->input->post('email')
		);
		$this->db->insert('users',$data);
		$id=$this->db->insert_id();
		$data=array(
			
			'user_id'=>$id,
			'user_data_register'=>date('Y-m-d h:m:s') ,
			'user_data_level'=>1,
			'user_data_point'=>1
		);
		$this->db->insert('user_data',$data);
	}
	
}