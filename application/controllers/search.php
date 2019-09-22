<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
	}

	function index()
	{
		$keyword=$this->input->post('keyword');
		if($this->uri->segment(2)!=''):
			$keyword=$this->uri->segment(2);
		endif;
		
		//$keyword = rawurlencode($keyword);
		$keyword = str_replace("%20", "+", $keyword);
		$keyword = urldecode($keyword);
		$data['q_video']=$this->content_model->video_last_get(1);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['cur_keyword']=$keyword;
		$data['search']=$search=$this->content_model->search($keyword, 100);
		//echo $this->db->last_query(); 
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_tags']=$this->content_model->tags_get($keyword);
		$data['keyword']='Search medianesia, Cari, Hasil Pencarian Berita';
		$data['description']='Hasil Pencarian Medianesia.com';
		$data['title']= 'Cari Berita Tentang ' . $keyword . ' di Manado Post';
		$data['content']='news/search';
		
		$this->load->view('layout/template2', $data);
	}
}