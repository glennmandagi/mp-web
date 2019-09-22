<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Created by arisaryd@gmail.com
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->agent->is_mobile())
		{
			redirect('m');
		}
		$this->db->cache_on();
		$data['q_hl']=$this->content_model->hl_get(5);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_news_online']=$this->content_model->news_unique_get(5,34);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);
		$data['q_news_spo']=$this->content_model->news_getlist_home_sub(51, 5);
		$data['q_news_ekb']=$this->content_model->news_getlist_home(14, 5);
		$data['q_news_opi']=$this->content_model->news_getlist_home_c(17, 5);
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
		$data['q_news_tou']=$this->content_model->news_getlist_home_c(37, 12);
		$data['q_news_oto']=$this->content_model->news_getlist_home_c(29, 5);
		$data['q_news_sho']=$this->content_model->news_getlist_home_c(30, 5);
		$data['q_news_vil']=$this->content_model->news_getlist_home_c(31, 5);
		$data['q_news_nas']=$this->content_model->news_getlist_home(1, 5);
		$data['q_news_inter']=$this->content_model->news_getlist_home(2, 5);
		$data['q_news_ola']=$this->content_model->news_getlist_home_c(24);

		$data['q_pol']=$this->content_model->pol_get_home();

		$data['q_vid']=$this->content_model->video_last_get(1);

		//echo $this->db->last_query();
		$is_logged_in=$this->session->userdata('is_logged_in');
		if($is_logged_in!=''):
			$data['stat_vis']=$this->content_model->get_stat_vis();
			$data['stat_news']=$this->content_model->get_stat_news();
			$data['stat_newsv']=$this->content_model->get_stat_newsv();
			$data['stat_visit7']=$this->content_model->get_stat_visit7();
			$data['stat_visit1']=$this->content_model->get_stat_visit1();
		endif;

		$data['title']='Portal Berita Online Manado';
		$data['description']=' Manado Post adalah situs media informasi berita indonesia, memberikan informasi dan berita terkini';
		$data['keyword']='Berita, Manado, bitung, minahasa, minahasa selatan, minsel, minahasa utara, minut, minahasa tenggara, mitra, tomohon, bolaang mongondow, bolmong, Manado Post, Manado Post Online, Terkini, Update, News, Informasi, Indonesia, Bisnis, Sport,
		Olahraga, Bola, Sepakbola, Digital, Teknologi, Komunitas, Nasional, Jakarta, Politik, Pemilu, DPR, KPK,
		Korupsi, Dunia, Ekonomi, Ekonomi Dunia, Auto, Otomotif, Film, Musik, Music, Selebriti,
		Forum, Streaming, TV, Video, Foto';
		$data['page']='home';
		$data['content']='home/home';
		$this->load->view('layout/template2', $data);
		//echo "tes";
	}

	function pol()
	{
		$this->content_model->pol_add();
		//echo $this->db->last_query();

		$data['title']='Portal Berita Online Manado';
		$data['description']=' Manado Post adalah situs media informasi berita indonesia, memberikan informasi dan berita terkini';
		$data['keyword']='Berita, Manado, News, Informasi, Indonesia, Bisnis, Sport,
		Olahraga, Bola, Sepakbola, Digital, Teknologi, Komunitas, Nasional, Jakarta, Politik, Pemilu, DPR, KPK,
		Korupsi, Dunia, Ekonomi, Ekonomi Dunia, Auto, Otomotif, Film, Musik, Music, Selebriti,
		Forum, Streaming, TV, Video, Foto';

		$data['q_hl']=$this->content_model->hl_get(5);
		$data['q_popular']=$this->content_model->trending_news_get(5);
		$data['q_latest']=$this->content_model->news_latest_get(5);
		$data['q_news_online']=$this->content_model->news_unique_get(5,34);
		$data['q_news_lipsus']=$this->content_model->news_unique_get(2,33);

		$data['q_video']=$this->content_model->video_last_get(1);

		$data['page']='home';
		$data['content']='home/pol';
		$this->load->view('layout/template2', $data);
	}
	
	function clearx(){
		//$this->output->delete_cache();
		$this->db->cache_delete_all();
		echo 'cleared';
	}


}
