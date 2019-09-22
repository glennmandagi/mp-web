<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class M extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
	}
	
	public function index()
	{
	    $this->db->cache_on();
		$data['q_hl']=$this->content_model->hl_get(5);
		
		$data['q_news_nas']=$this->content_model->news_getlist_home(1);
		$data['q_news_inter']=$this->content_model->news_getlist_home(2);
		$data['q_news_tekno']=$this->content_model->news_getlist_home(3);
		$data['q_news_ola']=$this->content_model->news_getlist_home(4);
		$data['q_news_mus']=$this->content_model->news_getlist_home(5);
		$data['q_news_oto']=$this->content_model->news_getlist_home(10);
		$data['q_news_pol']=$this->content_model->news_getlist_home(7);
		$data['q_news_sel']=$this->content_model->news_getlist_home(8);
		$data['q_news_djak']=$this->content_model->news_getlist_home(9);
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		
		
		$data['q_news_online']=$this->content_model->news_unique_get(5,34);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		
		
			
		$data['q_news_pia']=$this->content_model->news_getlist_home_c(32, 5);
		$data['q_news_ekb']=$this->content_model->news_getlist_home(14, 5);
		$data['q_news_opi']=$this->content_model->news_getlist_home(17, 5);
		$data['q_news_pol']=$this->content_model->news_getlist_home(15, 5);
		$data['q_news_ter']=$this->content_model->news_getlist_home(16, 5);
		$data['q_news_kum']=$this->content_model->news_getlist_home(18, 5);
		$data['q_news_pub']=$this->content_model->news_getlist_home(19, 5);
		$data['q_news_kaw']=$this->content_model->news_getlist_home_c(20, 5);
		$data['q_news_min']=$this->content_model->news_getlist_home_c(21, 5);
		$data['q_news_nus']=$this->content_model->news_getlist_home_c(22, 5);
		$data['q_news_bol']=$this->content_model->news_getlist_home_c(23, 5);
		$data['q_news_sum']=$this->content_model->news_getlist_home_c(25, 5);
		$data['q_news_x']=$this->content_model->news_getlist_home_c(26, 5);
		$data['q_news_hea']=$this->content_model->news_getlist_home_c(27, 5);
		$data['q_news_tou']=$this->content_model->news_getlist_home_c(28, 5);
		$data['q_news_oto']=$this->content_model->news_getlist_home_c(29, 5);
		$data['q_news_sho']=$this->content_model->news_getlist_home_c(30, 5);
		$data['q_news_vil']=$this->content_model->news_getlist_home_c(31, 5);
		$data['q_news_nas']=$this->content_model->news_getlist_home(1, 5);
		$data['q_news_inter']=$this->content_model->news_getlist_home(2, 5);
		$data['q_news_ola']=$this->content_model->news_getlist_home_c(24);
		
		
		
		$data['title']='Manado Post';
		$data['description']='Manado Post adalah situs media informasi indonesia. Manado Post memberikan informasi dan berita terkini';
		$data['keyword']='Berita, News, Informasi, Indonesia, Bisnis, Sport, 
		Olahraga, Bola, Sepakbola, Digital, Teknologi, Komunitas, Nasional, Jakarta, Politik, Pemilu, DPR, KPK,
		Korupsi, Dunia, Ekonomi, Ekonomi Dunia, Auto, Otomotif, Film, Musik, Music, Selebriti, Analisis, 
		Forum, Streaming, TV, Video, Foto';		
		$data['content']='m/home/home';
		
		$this->load->view('m/layout/template2', $data);
	}
	
	public function berita()
	{
	    $this->db->cache_on();
		$news_url=$this->uri->segment(3);
		$data['q_news']=$q_news=$this->content_model->news_get_detil($news_url);	
		foreach($q_news->result() as $row):
			$web_desc=$row->news_content;
			$news_title=$row->news_title;
			$news_cat_id=$row->news_cat_id;
			$news_id=$row->news_id;
			$subcat=$row->news_subcat_name;
			$cat_url=$row->news_cat_url;
			$subcat_url=$row->news_subcat_url;
			$news_cat_title=$row->news_cat_title;
			$news_date_launch=$row->news_date_launch;
			break;
		endforeach;
		
		//Additional News
		$news_add_index=$this->uri->segment(5);
		if($news_add_index>1):
			$data['news_add']=true;
			$data['q_news_add']=$q_news_add=$this->content_model->news_add_get_detil($news_id, $news_add_index);	
			//echo $this->db->last_query();
		endif;
		$data['q_news_add_num']=$q_news_add_num=$this->content_model->news_add_get_num($news_id);
		
		if(!isset($subcat)){		
			$subcat='Berita';
			$news_cat_url='berita';
			$subcat_url='nasional';
		}
		$data['subcat']=$subcat;
		
		$news_date = date('Y-m-d', strtotime($news_date_launch));
		$cur_date=date('Y-m-d');
		if (strtotime($news_date) >= strtotime($cur_date)):		
			$this->content_model->news_statistic_add($news_id);
		endif;
		
			
		$data['category']=$cat_url;	
		$data['subcat_url']=$subcat_url;
		
		
		$data['q_comment']=$this->content_model->comment_get_read($news_id, 5);

		//echo $this->db->last_query();
		
		
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['q_news_related']=$this->content_model->news_get_related($news_cat_id, $news_id);
		$data['q_related']=$this->content_model->get_related($news_title, $news_cat_id, $news_id, 4);
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['q_popular']=$this->content_model->trending_news_get(7);
		$data['q_latest']=$this->content_model->news_latest_get(7);
		$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title . ' - Manado Post';
		$data['content']='m/news/detil';
		
		$this->load->view('m/layout/template2', $data);
	}
	
	function berita_all() {	
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
		
		$config['base_url'] = base_url() . 'm/berita_all/';
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

		
		$data['content']='m/news/category';
		$this->load->view('m/layout/template2', $data);
		
	}
	
	public function detil()
	{
		$this->db->cache_on();
		$news_url=$this->uri->segment(3);
		$data['q_news']=$q_news=$this->content_model->news_get_detil($news_url);	
		foreach($q_news->result() as $row):
			$web_desc=$row->news_content;
			$news_title=$row->news_title;
			$news_cat_id=$row->news_cat_id;
			$news_date_launch=$row->news_date_launch;
			$news_id=$row->news_id;
			break;
		endforeach;
		
		
		$news_date = date('Y-m-d', strtotime($news_date_launch));
		$cur_date=date('Y-m-d');
		if (strtotime($news_date) >= strtotime($cur_date)):		
			$this->content_model->news_statistic_add($news_id);
		endif;
		
		$data['q_news_related']=$this->content_model->news_get_related($news_cat_id, $news_id);
		
		$data['keyword']=$this->custom->get_keyword($news_title, $web_desc);
		$data['description']=$this->custom->get_description2($web_desc);
		$data['title']= $news_title . ' - Manado Post';
		$data['content']='m/read/index';
		
		$this->load->view('m/layout/template', $data);
	}
	
	public function rubrik()
	{
		$this->db->cache_on();
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_tags_popular']=$this->content_model->tags_popular(60, 10);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		
		//pagination
		$this->load->library('pagination');
		$offset=$unit_id = $this->uri->segment(4, 0);
		$list_num=$this->content_model->news_getlist_num($this->uri->segment(3));		
		if($list_num==0):
			$list_num=$this->content_model->news_getlist_num_subcat($this->uri->segment(3));
		endif;
		//echo $this->db->last_query();
		$param=$this->uri->segment(3);
		$q_news=$this->content_model->news_getlist($param, 20, $offset);
		
		//for category
		foreach($q_news->result() as $row):
			$cat=$row->news_cat_title;
			$news_cat_url=$row->news_cat_url;
			break;
		endforeach;		
		if(!isset($cat)):
			$cat=$this->uri->segment(3);
		endif;
		
		//for subcategory
		if($q_news->num_rows()==0):
			$q_news=$this->content_model->news_getlist_sub($param, 10, $offset);
			foreach($q_news->result() as $row):
				$cat=$row->news_cat_title;
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
		
		$config['base_url'] = base_url() . 'm/rubrik/' . $this->uri->segment(3);
		$config['total_rows'] = $list_num;
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);	
		$data['pagination']=$this->pagination->create_links();
		
		$data['q_news_unique']=$this->content_model->news_getlist_unique(6);
		$data['page']=$news_cat_url;
		$data['category']=$cat;
		$data['description']= 'Berita ' . $cat;
		$data['keyword']=$cat . ', Berita, News, Informasi';
		$data['title']= 'Berita ' . $cat ;
		$data['content']='m/news/category';
		$this->load->view('m/layout/template2', $data);

	}
}