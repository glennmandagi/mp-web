<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class video extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
		
	}
	
	public function index()
	{
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_tags_popular']=$this->content_model->tags_popular(60, 10);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['q_video']=$this->content_model->video_last_get(1);
		//pagination
		$this->load->library('pagination');
		$offset=$unit_id = $this->uri->segment(3, 0);
		$list_num=$this->content_model->news_getlist_num($this->uri->segment(2));		
		if($list_num==0):
			$list_num=$this->content_model->news_getlist_num_subcat($this->uri->segment(2));
		endif;
		//echo $this->db->last_query();
		$q_vid=$this->content_model->video_getlist(20, $offset);
		
		

		$data['q_vid']=$q_vid;
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li class="last-page"> ';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li> ';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current"><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['base_url'] = base_url() . 'berita/' . $this->uri->segment(2);
		$config['total_rows'] = $list_num;
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);	
		$data['pagination']=$this->pagination->create_links();
		
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['description']= 'Berita Video' ;
		$data['keyword']='Video, Berita, News, Informasi';
		$data['title']= 'Berita Video' ;
		$data['content']='video/index';
		$this->load->view('layout/template2', $data);
		
	}

	public function watch()
	{ 	
		
		
		$video_id=$this->uri->segment(3);
		$data['q_vid']=$q_vid=$this->content_model->video_get_detil($video_id);
		
		if($q_vid->num_rows()<1):
			redirect('home');
		endif;
				
		$data['q_news_latest_get']=$this->content_model->news_latest_get(5);		
		foreach($q_vid->result() as $row):
			$web_desc=$row->video_content;
			$news_title=$row->video_title;
			$news_cat_id=$row->video_cat_id;
			$news_cat_url=$row->news_cat_url;
			$news_cat_title=$row->news_cat_title;
			$subcat=$row->news_subcat_name;
			$subcat_url=$row->news_subcat_url;
		endforeach;
		
		
		$data['q_video']=$this->content_model->video_last_get(1);
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,2);
		$data['q_popular']=$this->content_model->trending_news_get(7);
		$data['q_popular2']=$this->content_model->trending_news_get(6);
		$data['q_latest']=$this->content_model->news_latest_get(7);
		$data['q_tags_popular']=$this->content_model->tags_popular(5, 10);
		
		$data['category']=$news_cat_title;		
		
		
		
		
	
		//echo $this->db->last_query();
		$data['q_comment']=$this->content_model->comment_get_watch($video_id, 5);
		$data['q_related']=$this->content_model->get_related($news_title, $news_cat_id, $video_id, 4);
		//echo $this->db->last_query();
		$data['q_news_related']=$this->content_model->news_get_related($news_cat_id, $video_id, 9);
		
		
		$data['page']=$news_cat_url;
		$data['cat']=$news_cat_title;
		$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title;
		
	
		$data['content']='video/watch';

		
		$this->load->view('layout/template2', $data);
		
	}
	
	public function detil()
	{
		$news_id=$this->uri->segment(7);
		$news_url=$this->uri->segment(6);
		if($news_id!=''):	
			$data['q_news']=$q_news=$this->content_model->news_get_detil($news_id);
		else:
			$data['q_news']=$q_news=$this->content_model->news_get_detil_url($news_url);
		endif;
				
		$data['q_news_latest_get']=$this->content_model->news_latest_get(5);		
		foreach($q_news->result() as $row):
			$web_desc=$row->news_content;
			$news_title=$row->news_title;
			$news_cat_id=$row->news_cat_id;
			$news_cat_url=$row->news_cat_url;
			$news_cat_title=$row->news_cat_title;
			$subcat=$row->news_subcat_name;
			$news_id=$row->news_id;
			break;
		endforeach;
		
		
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_popular2']=$this->content_model->trending_news_get(6);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_tags_popular']=$this->content_model->tags_popular(5, 10);
		
		$data['category']=$news_cat_title;
		$data['subcat']=$subcat;
	
		//echo $this->db->last_query();
		$data['q_comment']=$this->content_model->comment_get_read($news_id, 5);
		$data['q_related']=$this->content_model->get_related($news_title, $news_cat_id, $news_id, 4);
		//echo $this->db->last_query();
		$data['q_news_related']=$this->content_model->news_get_related($news_cat_id, $news_id, 9);
		$data['q_keyword']=$this->content_model->keyword_get($news_id);
		
		$data['page']=$news_cat_url;
		$data['cat']=$news_cat_title;
		$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title;
		$data['content']='news/read';
		
		$this->load->view('layout/template2', $data);
	}	
}