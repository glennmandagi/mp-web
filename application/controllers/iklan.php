<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//Created by arisaryd@gmail.com
	class Iklan extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('content_model');
			$this->load->model('admin_model');
		}
		
		public function index()
		{		
			$data['title']='Tentang Manado Post';
			$data['description']='Tentang Manado Post';
			$data['keyword']='tentang kami, about';	
			$data['page']='home';
			$data['q_video']=$this->content_model->video_last_get(1);
			$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);	
			//$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
			$data['q_popular']=$this->content_model->trending_news_get(5);
			$data['q_latest']=$this->content_model->news_latest_get(5);
			$data['content']='iklan/index';
			$this->load->view('layout/template2', $data);
		}
		
		
	}	