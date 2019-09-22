<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com	
	class Comment extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('content_model');
		}
		
		function index()
		{
			$this->content_model->comment_add();
			$data['q_comment']=$this->content_model->comment_get();			
			echo"Komentar Berhasil Diinput";
			//echo $this->db->last_query();
		}
		
		
		function update()
		{
			$data['q_comment']=$this->content_model->comment_get2();
			$this->load->view('news/comment_success',$data);
			//echo $this->db->last_query();
		}	
		
		
		function video()
		{
			$this->content_model->comment_addv();
			$data['q_comment']=$this->content_model->comment_getv();			
			echo"Komentar Berhasil Diinput";
			//echo $this->db->last_query();
		}
		
		
		function update_video()
		{
			$data['q_comment']=$this->content_model->comment_getv2();
			$this->load->view('news/comment_success',$data);
			//echo $this->db->last_query();
		}	
		
	}
