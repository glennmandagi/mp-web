<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
	}

	public function index()
	{			
		//pagination
		$this->load->library('pagination');
		$offset=$unit_id = $this->uri->segment(3, 0);
		$list_num=$this->content_model->gallery_getlist_num();		
	
		$data['q_gal']=$q_news=$this->content_model->gallery_getlist(9, $offset);
		//echo $this->db->last_query();

		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['base_url'] = base_url() . 'gallery/' . $this->uri->segment(2);
		$config['total_rows'] = $list_num;
		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);	
		$data['pagination']=$this->pagination->create_links();
		
		$data['q_hl']=$this->content_model->hl_get(5);
	
		$data['category']='Gallery';
		$data['subcat']='Gallery';
		$data['subcat_url']='gallery';
		
		$data['page']='gallery';
		$data['description']= 'Gallery';
		$data['keyword']='Gallery, Berita, News, Informasi';
		$data['title']= 'Gallery - Medianesia.com';
		$data['content']='gallery/gallery2';
		$this->load->view('layout/template2', $data);
	}
	
	public function detil()
	{			
	
		$gallery_id=$this->uri->segment(3);
		$data['q_gal']=$q_gal=$this->content_model->gallery_getlist_detil($gallery_id);
		//echo $this->db->last_query();
				
		$data['category']='Gallery';
		$data['subcat']='Gallery';
		$data['subcat_url']='gallery';
		
		foreach($q_gal->result() as $row):	
		 $gallery_title=$row->gallery_title;
		endforeach;
		
		$data['page']='gallery';
		$data['description']= 'Gallery';
		$data['keyword']='Gallery, Berita, News, Informasi';
		$data['title']= $gallery_title;
		$data['content']='gallery/detil';
		$this->load->view('layout/template', $data);
	}
}