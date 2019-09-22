<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
	}

	public function index()
	{	
		$this->db->cache_on();
		$data['q_video']=$this->content_model->video_last_get(1);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		
		//pagination
		$limit=29;
		$this->load->library('pagination');
		$offset=$unit_id = $this->uri->segment(3, 0);
		$list_num=$this->content_model->news_getlist_num($this->uri->segment(2));		
		if($list_num==0):
			$list_num=$this->content_model->news_getlist_num_subcat($this->uri->segment(2));
		endif;
		//echo $this->db->last_query();
		$param=$this->uri->segment(2);
		$q_news=$this->content_model->news_getlist($param, $limit, $offset);
		
		//for category
		foreach($q_news->result() as $row):
			$cat=$row->news_cat_title;
			$news_cat_url=$row->news_cat_url;
			break;
		endforeach;		
		if(!isset($cat)):
			$cat=$this->uri->segment(2);
		endif;
		
		//for subcategory
		if($q_news->num_rows()==0):
			$q_news=$this->content_model->news_getlist_sub($param, $limit, $offset);
			foreach($q_news->result() as $row):
				$cat=$row->news_cat_title;
				$news_image=$row->news_image;
				$data['news_image']=$news_image;
				$subcat=$row->news_subcat_name;
				$subcat_url=$row->news_subcat_url;
				$news_cat_url=$row->news_cat_url;
				break;
			endforeach;
			//jika kosong
			if(!isset($subcat)){		
				$subcat='Berita';
				$news_cat_url='berita';
				$subcat_url='nasional';
			}
			$data['subcat']=$subcat;
			$data['subcat_url']=$subcat_url;
		endif;

		$data['q_news']=$q_news;
		
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
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);	
		$data['pagination']=$this->pagination->create_links();
		
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['page']=$news_cat_url;
		$data['category']=$cat;
		$data['description']= 'Berita ' . $cat;
		$data['keyword']=$cat . ', Berita, News, Informasi';
		$data['title']= 'Berita ' . $cat ;
		$data['content']='news/category';
		$this->load->view('layout/template2', $data);
	}


	function all() {	
		$this->db->cache_on();
		$data['q_video']=$this->content_model->video_last_get(1);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		
		//pagination
		$limit=29;
		$this->load->library('pagination');
		$offset=$unit_id = $this->uri->segment(3, 0);
		$list_num=$this->content_model->news_getlist_all_num();
		$q_news=$this->content_model->news_getlist_all($limit, $offset);
		//echo $this->db->last_query();
		$data['q_news']=$q_news;
		
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
		
		$config['base_url'] = base_url() . 'berita/all/';
		$config['total_rows'] = $list_num;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);	
		$data['pagination']=$this->pagination->create_links();
		

		$data['page']='berita/all';
		$data['category']='Index Berita';
		$data['description']= 'Index Berita ManadoPos Online';
		$data['keyword']='Index , Berita, News, Informasi';
		$data['title']= 'Index Berita' ;
		$data['content']='news/category';
		$this->load->view('layout/template2', $data);
		
	}


}
