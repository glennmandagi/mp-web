<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class Read extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');		
	}

	public function index()
	{ 
		
	
		$s2=$this->uri->segment(2);
		$s3=$this->uri->segment(3);
		$news_id=$this->uri->segment(6);
		$news_url=$this->uri->segment(5);
	
		if ($this->agent->is_mobile())
		{
			redirect('m/berita/'.$news_id.'/'.$news_url);
		}
		
		if(is_numeric($s2)&&$s3=='' ){
			$data['q_news']=$q_news=$this->content_model->news_get_detil($s2);
		}

		else if($news_id!=''):	
			$data['q_news']=$q_news=$this->content_model->news_get_detil($news_id);
		else:
			$data['q_news']=$q_news=$this->content_model->news_get_detil_url($news_url);
		endif;
		
		$this->db->cache_on();
		
		//echo $this->db->last_query();	
		$data['q_video']=$this->content_model->video_last_get(1);
		
		//if news not found
		if($q_news->num_rows()<1):
			redirect('home');
		endif;
				
			
		$data['q_news_latest_get']=$this->content_model->news_latest_get(5);		
		foreach($q_news->result() as $row):
			$web_desc=$row->news_content;
			$news_title=$row->news_title;
			$news_cat_id=$row->news_cat_id;
			$news_cat_url=$row->news_cat_url;
			$news_image=$row->news_image;
			$data['news_image']=$news_image;
			$news_cat_title=$row->news_cat_title;
			$subcat=$row->news_subcat_name;
			$subcat_url=$row->news_subcat_url;
			$news_id=$row->news_id;
			$news_date_launch=$row->news_date_launch;
			$news_keyword=$row->news_keyword;
			break;
		endforeach;
		
		//add statistic		
		 $news_date = date('Y-m-d', strtotime($news_date_launch));
		$cur_date=date('Y-m-d');
		if (strtotime($news_date) >= strtotime($cur_date)):	
			$this->content_model->news_statistic_add($news_id);
			//echo $this->db->last_query();
		endif;
		
		//Additional News
		$news_add_index=$this->uri->segment(7);
		if($news_add_index>1):
			$data['news_add']=true;
			$data['q_news_add']=$q_news_add=$this->content_model->news_add_get_detil($news_id, $news_add_index);	
			//echo $this->db->last_query();
		endif;
		 $data['q_news_add_num']=$q_news_add_num=$this->content_model->news_add_get_num($news_id);
		
		//if news not launched yet	
		$is_logged_in=$this->session->userdata('is_logged_in');
		if($is_logged_in==''&& $news_date_launch>date('Y-m-d H:i:s')):
			redirect('home');
		endif;
				
		
		$data['q_keyword']=$q_keyword=$this->content_model->keyword_get($news_id);
		foreach($q_keyword->result() as $row2):
			$keyword_name=$row2->keyword_name;		
			//check custom page
			if(isset($keyword_name)):			
				$q=$this->content_model->page_get($keyword_name);
				if($q->num_rows()>0):
					$data['q_page']=$page=$q;
				endif;
			endif;		
		endforeach;

		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['q_popular']=$this->content_model->trending_news_get(7);
		$data['q_popular2']=$this->content_model->trending_news_get(6);
		$data['q_latest']=$this->content_model->news_latest_get(7);
		$data['q_tags_popular']=$this->content_model->tags_popular(5, 10);
		
		$data['category']=$news_cat_title;
		$data['category_url']=$news_cat_url;
		
		
		if(!isset($subcat)){		
			$subcat='Berita';
			$news_cat_url='berita';
			$subcat_url='nasional';
		}
		$data['subcat']=$subcat;
		$data['subcat_url']=$subcat_url;
		
	
		
		$data['q_comment']=$this->content_model->comment_get_read($news_id, 5);
		$data['q_related']=$this->content_model->get_related($news_title, $news_cat_id, $news_id, 4);
		
		$data['q_news_related']=$this->content_model->news_get_related($news_cat_id, $news_id, 9);
		
		
		$data['page']=$news_cat_url;
		$data['cat']=$news_cat_title;
		//$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['keyword']=$news_keyword;
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title;
		
		if(!isset($page)):
			$data['content']='news/read';
		elseif($page->num_rows()>0):
			$data['content']='news/read';
		else:
			$data['content']='news/read';
		endif;
		
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
				
		$this->db->cache_on();		
				
		$data['q_news_latest_get']=$this->content_model->news_latest_get(5);		
		foreach($q_news->result() as $row):
			$web_desc=$row->news_content;
			$news_title=$row->news_title;
			$news_cat_id=$row->news_cat_id;
			$news_cat_url=$row->news_cat_url;
			$news_image=$row->news_image;
			$data['news_image']=$news_image;
			$news_cat_title=$row->news_cat_title;
			$subcat=$row->news_subcat_name;
			$news_id=$row->news_id;
			$news_keyword=$row->news_keyword;
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
		//$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['keyword']=$news_keyword;
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title;
		$data['content']='news/read';
		
		$this->load->view('layout/template2', $data);
	}	
}