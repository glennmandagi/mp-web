<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->user_model->have_session_check();
	}
	
	public function index()
	{		
		$data['page']='home';
		$data['content']='admin/login';		
		$this->load->view('admin/layout/template', $data);
	}	
	
	public function login_do()
	{	
		$this->validate_input();
		$username=$this->input->post('username', TRUE);
		$password=$this->input->post('password', TRUE);
		$q=$this->user_model->user_check();
		$validLogin=$q->num_rows();
		foreach($q->result() as $row):
			$user_id=$row->id;	
			$user_type=$row->user_type;
		endforeach;

		if($validLogin>0):
			//set session
			$data = array(
				'username' => $username,
				'user_id' =>$user_id,
				'user_type' => $user_type,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/news/add');
		
		else:;
			redirect('admin/login');
		endif;
	}
	
	function validate_input()
	{	
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE):		
			redirect('admin/login');
		endif;
	}
	
	function register_do()
	{
		$this->validate_input_reg();
		$this->user_model->register();
		redirect('admin/login/index/registered');	
	}
	
	function validate_input_reg()
	{	
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		
		if($this->form_validation->run()==FALSE):		
			redirect('admin/login');
		endif;
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */