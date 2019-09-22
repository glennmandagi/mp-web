<?php
class content_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function hl_get($limit)
	{
		$this->db->select('*');	
		$this->db->from('news');		
		$this->db->order_by("news_id", "desc");
		$this->db->where('news_cat_id', 36);
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_home($news_cat_id, $limit=6)
	{
		$this->db->select('news_id, news_title, news_url, news_date, news_date_launch, news_image, news_hl_r');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news.news_cat_id', $news_cat_id);
		$this->db->where('news_hl !=', 1);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_home_c($news_cat_id, $limit=6)
	{
		$this->db->select('news_id, news_title, news_content, news_url, news_date, news_image, news_hl_r,news_date_launch');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news.news_cat_id', $news_cat_id);
		$this->db->where('news_hl !=', 1);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_home_sub($news_subcat_id, $limit=6)
	{
		$this->db->select('news_id, news_title, news_content, news_url, news_date, news_image, news_hl_r, news_date_launch');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news.news_subcat_id', $news_subcat_id);
		$this->db->where('news_hl !=', 1);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function video_get_detil($video_id)
	{
		$this->db->select('*');	
		$this->db->from('video');		
		$this->db->join('news_cat', 'video.video_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->join('news_subcat', 'video.video_subcat_id=news_subcat.news_subcat_id ', 'left');
		$this->db->where('video_id', $video_id);
		//$this->db->where('video_date_launch <', date('Y-m-d h:m:s'));
		$query = $this->db->get();	
		return $query;	
	}
	
	function video_last_get($limit)
	{
		$this->db->select('*');	
		$this->db->from('video');				
		$this->db->limit($limit);
		//$this->db->where('video_date_launch <', date('Y-m-d h:m:s'));
		$this->db->order_by('video_date','desc');
		$query = $this->db->get();	
		return $query;	
	}
	
	
	function news_getlist_unique($limit=6)
	{
		$this->db->select('news_id, news_subtitle, news_title, news_content, news_url, news_date, news_cat_title, news_image, news_date_launch, news_visit, news_hl_r');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news_unique', 1);
		$this->db->order_by("news_date_launch", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_unique_get($limit=6, $id)
	{
		$this->db->select('news_id, news_subtitle, news_title, news_url, news_date, news_date_launch, news_cat_title, news_image, news_visit');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news.news_cat_id', $id);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_date_launch", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	

	
	
	function news_getlist_subcat_home($news_subcat_id, $limit=5)
	{
		$this->db->select('news_id, news_title, news_url, news_date, news_content, news_visit, news_image, news_hl_r');	
		$this->db->from('news');	
	
		$this->db->where('news.news_subcat_id', $news_subcat_id);
		//$this->db->where('news_hl !=', 1);
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	/*
	function news_getlist($news_cat_url, $limit=5)
	{
		$this->db->select('news_title, news_content, news_url, news_date, news_cat_title, news_cat_url');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news_cat_url', $news_cat_url);
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}*/
	
	function news_getlist($news_cat_url, $limit=5, $offset=0)
	{
		$this->db->select('*');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->where('news_cat_url', $news_cat_url);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_date_launch", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}

	
	function news_getlist_all($limit=5, $offset=0)
	{
		$this->db->select('*');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_date_launch", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_all_num()
	{
		$this->db->select('count(news_id) as numrows');
		$this->db->from('news');		
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$q = $this->db->get();	
		foreach($q->result() as $row):
			$numrows=$row->numrows;
		endforeach;
		return $numrows;	
	}
	

	
	function news_getlist_sub($news_subcat_url, $limit=5, $offset=0)
	{
		$this->db->select('*');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id ', 'left');
		$this->db->where('news_subcat_url', $news_subcat_url);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_h($news_cat_url, $limit=5, $offset=0)
	{
		$this->db->select('news_title, news_content, news_url, news_date, news_cat_title, news_cat_url, news_image, news_hl_r');	
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
		//$this->db->where('news_cat_url', $news_cat_url);
		$this->db->where('news_hl !=', 0);
		$this->db->order_by("news_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_num($news_cat_url)
	{		
		$this->db->from('news');		
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');		
		$query = $this->db->where('news_cat_url', $news_cat_url);
		$query =$this->db->get();
		$count= $query->num_rows();  
		return $count;	
	}
	

	
	function video_getlist_num($video_id)
	{		
		$this->db->from('video');		
		$this->db->join('news_cat', 'video.video_cat_id=news_cat.news_cat_id ', 'left');		
		$query = $this->db->where('video_id', $video_id);
		$query =$this->db->get();
		$count= $query->num_rows();  
		return $count;	
	}
	
	
	function video_getlist($limit=5, $offset=0)
	{
		$this->db->select('*');	
		$this->db->from('video');		
		$this->db->join('news_cat', 'video.video_cat_id=news_cat.news_cat_id ', 'left');
		$this->db->order_by("video_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_getlist_num_subcat($news_subcat_url)
	{		
		$this->db->from('news');		
		$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id ', 'left');
		$query = $this->db->where('news_subcat_url', $news_subcat_url);
		$query =$this->db->get();
		$count= $query->num_rows();  
		return $count;	
	}
	
	function gallery_getlist_num()
	{		
		$this->db->from('gallery_h');		
		$query =$this->db->get();
		$count= $query->num_rows();  
		return $count;	
	}
	
	function gallery_getlist($limit=5, $offset=0)
	{
		
		$this->db->from('gallery_h');		
		$this->db->order_by("gallery_h_id", "desc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	
	function gallery_getlist_num_detil($gallery_h_id)
	{		
		$this->db->from('gallery');	
		$this->db->join('gallery_h', 'gallery_h.gallery_h_id=gallery.gallery_h_id', 'left');
		$this->db->where('gallery_h.gallery_h_id',$gallery_h_id);
		$query =$this->db->get();
		$count= $query->num_rows();  
		return $count;	
	}
	
	function gallery_getlist_detil($gallery_h_id,$limit=5, $offset=0)
	{
		$this->db->select('gallery_title, gallery_h.gallery_desc, gallery.gallery_id, gallery.gallery_date, gallery.gallery_name, gallery.gallery_image, gallery.gallery_h_id,');
		//$this->db->select('*');
		$this->db->from('gallery');		
		$this->db->join('gallery_h', 'gallery.gallery_h_id=gallery_h.gallery_h_id', 'left');
		$this->db->where('gallery.gallery_h_id',$gallery_h_id);
		//$this->db->group_by('gallery.gallery_h_id');
		$this->db->order_by("gallery_id", "desc");
		//$this->db->limit($limit, $offset);
		$query = $this->db->get();	
		return $query;	
	}
	
	
	function trending_news_get($limit)
	{
		$period=Date('Y-m-d H:i:s', strtotime("-7 days"));		
		$this->db->select('news_id, news_date, news_date_launch, news_title, news_url');	
		$this->db->from('news');		
		$this->db->where('news.news_date >', $period);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news.news_visit", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_feed_get($limit)
	{
		//$period=Date('Y-m-d h:m:s', strtotime("-5 days"));
		//$period=Date('Y-m-d h:m:s', strtotime("-14 days"));		
		$this->db->select('news_id, news_date, news_content, news_title, news_url, news_image, news_visit');	
		$this->db->from('news');		
		//$this->db->order_by("news.news_date_launch", "desc");
		//$this->db->where('news.news_date >', $period);
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	
	function news_get_detil($news_id)
	{
		$this->db->select('*');	
		$this->db->from('news');	
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');	
		$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id ', 'left');
		$this->db->where('news_id', $news_id);
		$query = $this->db->get();	
		return $query;				
	}
	
	function news_add_get_detil($news_add_id, $news_add_index)
	{
		$this->db->select('*');	
		$this->db->from('news_add');	
		$this->db->where('news_add_news_id', $news_add_id);
		$this->db->where('news_add_index', $news_add_index);
		$query = $this->db->get();	
		return $query;				
	}
	
	function news_add_get_num($news_add_news_id)
	{
		$this->db->select('*');	
		$this->db->from('news_add');	
		$this->db->where('news_add_news_id', $news_add_news_id);
		$query = $this->db->get();	
		return $query->num_rows();				
	}
		
	function news_get_detil_url($news_url, $limit=30)
	{
		$this->db->select('*');	
		$this->db->from('news');	
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');	
		$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id ', 'left');
		$this->db->where('news_url', $news_url);
		$this->db->limit($limit);
		//$this->db->order_by('news_date_launch', 'desc');
		$query = $this->db->get();	
		return $query;				
	}
	
	function news_latest_get($limit=10)
	{
		$this->db->select('news_id, news_date, news_date_launch, news_title, news_url');	
		$this->db->from('news');	
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->order_by("news.news_date_launch", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_get_related($news_cat_id, $cur_news_id, $limit=5)
	{
		$this->db->select('news_id, news_date, news_date_launch, news_title, news_url');	
		$this->db->from('news');		
		$this->db->order_by("news.news_date_launch", "desc");
		$this->db->group_by('news.news_id');
		$this->db->where('news_cat_id', $news_cat_id);
		//$this->db->where('news_date_launch <', date('Y-m-d H:i:s'));
		$this->db->where('news.news_id !=', $cur_news_id);
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function news_statistic_add($cur_news_id)
	{	
		//admin tidak dihitung
		$username=$this->session->userdata('username') ;  
		if($username==''):	
			$user_agent = $this->agent->agent_string();
			$platform = $this->agent->platform();
			$referrer = $this->agent->referrer();
			$is_mobile = $this->agent->is_mobile();
			$this->db->set('news_visit', 'news_visit + 1', FALSE);
			$this->db->where('news_id', $cur_news_id);
			$this->db->update('news');
			
			//insert
			/*
			$userip = $_SERVER['REMOTE_ADDR'];
			$data = array(
			   'news_date' => date('Y-m-d H:i:s') ,
			   'user_ip' => $userip,
			   'news_id' => $cur_news_id,
			   'referral' => $referrer,
			   'platform' => $platform,
			   'user_agent' => $user_agent,
			   'is_mobile' => $is_mobile,
			);
			$this->db->insert('statistic', $data);
			*/
		endif;
	}
	
	function get_stat_vis()
	{	
		$sql='SELECT count(*) as totalvis FROM statistic WHERE date(news_date) = DATE(NOW())';
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_stat_news()
	{	
		$sql='SELECT count(*) as totalvis FROM news WHERE date(news_date) = DATE(NOW())';
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_stat_newsv()
	{	
		$sql='SELECT news_title, news_visit FROM news WHERE date( news_date ) = DATE( NOW( ) ) ORDER BY news_visit DESC LIMIT 0 , 30';
		$query = $this->db->query($sql);
		return $query->result();
	}
		
	function get_stat_visit7()
	{	
		$sql='
			SELECT news_title, news.news_id, news.news_date, COUNT( * ) AS visits
			FROM statistic
			LEFT JOIN news ON statistic.news_id = news.news_id
			WHERE date( statistic.news_date )
			BETWEEN DATE( NOW( ) ) - INTERVAL 7
			DAY AND DATE( NOW( ) )
			GROUP BY statistic.news_id
			ORDER BY visits DESC
			LIMIT 10 
		';
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_stat_visit1()
	{	
		$sql='
			SELECT news_title, news.news_id, news.news_date, COUNT( * ) AS visits
			FROM statistic
			LEFT JOIN news ON statistic.news_id = news.news_id
			WHERE date( statistic.news_date ) = DATE( NOW( ) ) 
			GROUP BY statistic.news_id
			ORDER BY visits DESC
			LIMIT 10 
		';
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function comment_add()
	{
		$news_id = $this->input->post('newsid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message=$this->input->post('comment');	
		$userip = $_SERVER['REMOTE_ADDR'];		
		$data = array(
		   'comment_news_id ' => $news_id,
		   'comment_name' => $name,
		   'comment_content' => $message,
		   'comment_email' => $email,
		   'comment_date' => date('Y-m-d H:i:s'),
		   'comment_ip' => $userip

		);		
		$this->db->insert('news_comment',$data);
	}
	
	
	function comment_addv()
	{
		$video_id = $this->input->post('video_id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message=$this->input->post('comment');	
		$userip = $_SERVER['REMOTE_ADDR'];		
		$data = array(
		   'comment_video_id ' => $video_id,
		   'comment_name' => $name,
		   'comment_content' => $message,
		   'comment_email' => $email,
		   'comment_date' => date('Y-m-d H:i:s'),
		   'comment_ip' => $userip

		);		
		$this->db->insert('video_comment',$data);
	}
	
	function comment_get()
	{
		$news_id = $this->input->post('newsid');
		$this->db->select('*');	
		$this->db->from('news_comment');		
		$this->db->where('comment_news_id', $news_id);
		$this->db->order_by('comment_id','desc');
		$query = $this->db->get();	
		return $query;	
	}
	
	function comment_get2()
	{
		$news_id = $this->uri->segment(3);
		$this->db->select('*');	
		$this->db->from('news_comment');		
		$this->db->where('comment_news_id', $news_id);
		$this->db->order_by('comment_id','desc');
		$query = $this->db->get();	
		return $query;	
	}
	
	function comment_getv()
	{
		$video_id = $this->input->post('video_id');
		$this->db->select('*');	
		$this->db->from('video_comment');		
		$this->db->where('comment_video_id', $video_id);
		$this->db->order_by('comment_id','desc');
		$query = $this->db->get();	
		return $query;	
	}
	
	function comment_getv2()
	{
		$video_id = $this->uri->segment(3);
		$this->db->select('*');	
		$this->db->from('video_comment');		
		$this->db->where('comment_video_id', $video_id);
		$this->db->order_by('comment_id','desc');
		$query = $this->db->get();	
		return $query;	
	}
	
	function comment_get_read($news_id, $limit=0)
	{	
		$this->db->select('*');	
		$this->db->from('news_comment');		
		$this->db->where('comment_news_id', $news_id);
		$this->db->order_by('comment_id','desc');
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	function comment_get_watch($video_id, $limit=0)
	{	
		$this->db->select('*');	
		$this->db->from('video_comment');		
		$this->db->where('comment_video_id', $video_id);
		$this->db->order_by('comment_id','desc');
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;	
	}
	
	
	function get_related($search, $news_cat_id, $cur_news_id, $limit)
	{
		$cur=date('Y-m-d H:i:s');
		$search=$this->query_like($search);
		$period=Date('Y-m-d H:i:s', strtotime("-1000 days"));
		if($news_cat_id==0):
			$sql="SELECT * FROM news WHERE news_date>'$period' AND news_id!=$cur_news_id AND ($search) ORDER BY news_date_launch DESC LIMIT $limit ";
		else:	
			$sql="SELECT * FROM news WHERE news_date>'$period' AND news_cat_id = $news_cat_id AND news_id!=$cur_news_id AND ($search) AND news_date_launch < '$cur' ORDER BY news_date_launch DESC LIMIT $limit ";
		endif;
		return $query = $this->db->query($sql);
		//AND news_date_launch < '$cur'
	}
	
	function search($search, $limit)
	{
		
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id', 'left');	
		$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id', 'left');	
		$this->db->like('news_title', $search);
		$this->db->order_by('news_date_launch', 'desc');
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;
		
	}
	
	function query_like($search)
	{
		$search = explode(' ', $search);
		$search= "news_title LIKE '%" . join("%' OR news_title LIKE '%", $search) . "%'";
		return $search;
	}
	
	function tags_get($keyword)
	{
	
		$this->db->select('keyword_name, news.*');
		$this->db->from('keyword');
		$this->db->join('news', 'news.news_id=keyword.news_id', 'left');	
		$this->db->like('keyword_name', $keyword);
		$this->db->order_by('news_date_launch', 'desc');
		$query = $this->db->get();	
		return $query;	
		
	}
	
	function tags_popular($days=14, $limit=10)
	{
		$days='-' . $days . ' days';
		$period=Date('Y-m-d H:i:s', strtotime($days));				
		
		$sql="SELECT keyword_name, news.*  FROM keyword LEFT JOIN news ON news.news_id=keyword.news_id 
		WHERE news.news_date > '$period' AND keyword_name!=''  ORDER BY news_visit DESC LIMIT $limit ";
		return $query = $this->db->query($sql);
	}
	
	
	function gallery_ran()
	{
		$sql="SELECT * FROM gallery LEFT JOIN gallery_h on gallery.gallery_h_id=gallery_h.gallery_h_id ORDER BY RAND() LIMIT 1";
		return $query = $this->db->query($sql);
	}
	
	function keyword_get($news_id)
	{
		$this->db->select('keyword_name');
		$this->db->from('keyword');
		$this->db->where('news_id', $news_id);
		return  $this->db->get();	
	}

	function page_get($keyword_name)
	{
		$this->db->select('*');	
		$this->db->from('page');		
		$this->db->where('page_tag', $keyword_name);
		$query = $this->db->get();	
		return $query;	
	}
	
	function biografi_get_detil($biografi_url)
	{
		$this->db->select('*');	
		$this->db->from('biografi');	
		$this->db->where('biografi_url', $biografi_url);
		$query = $this->db->get();	
		return $query;				
	}
	
	function biografi_get_all($limit)
	{
		$this->db->select('*');	
		$this->db->from('biografi');	
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;				
	}
	
	function shop_get_detil($shop_url)
	{
		$this->db->select('*');	
		$this->db->from('shop');	
		$this->db->where('shop_url', $shop_url);
		$query = $this->db->get();	
		return $query;				
	}
	
	function shop_get_all($limit)
	{
		$this->db->select('*');	
		$this->db->from('shop');	
		$this->db->limit($limit);
		$query = $this->db->get();	
		return $query;				
	}
	
	function pol_get_home()
	{	
		$this->db->select('*');	
		$this->db->from('vote');
		$this->db->join('vote_group', 'vote_vote_group_id=vote_group_id', 'left');	
		$this->db->group_by('vote_id');
		$this->db->order_by('vote_group_id', 'asc');
		$this->db->order_by('vote_num', 'desc');
		$query = $this->db->get();	
		return $query;		
	}
	
	
	function pol_add()
	{
		$vote_id=$this->input->post('vote_id');		
		$this->db->set('vote_num', 'vote_num + 1', FALSE);
		$this->db->where('vote_id', $vote_id);
		$this->db->update('vote'); 
	}
}