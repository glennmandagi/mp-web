<?php
	class admin_model extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
		}
		
		function category_get()
		{
			$this->db->select('*');	
			$this->db->from('news_cat');		
			$this->db->order_by("news_cat_id", "asc");
			$query = $this->db->get();	
			return $query;		
		}
		
		function humor_add($image_name)
		{
			//set _thumb name
			$ext = substr($image_name, -4, 4);
			$no_ext= substr_replace($image_name, "_thumb", -4);
			$image_name_thumb= $no_ext.$ext;
			
			$url=url_title($this->input->post('title'));
			$data=array(
			'humor_title'=>$this->input->post('title'),
			'humor_date'=>date('Y-m-d H:i:s'),
			'humor_content'=>$this->input->post('content'),
			'humor_img'=>$image_name,
			'humor_img_thumb'=>$image_name_thumb,
			'humor_url'=>$url
			);
			$this->db->insert('humor',$data);
		}
		
		function news_category_get()
		{
			$this->db->select('*');	
			$this->db->from('news_cat');		
			$this->db->order_by("news_cat_title", "asc");
			$query = $this->db->get();	
			return $query;		
		}
		
		function video_category_get()
		{
			$this->db->select('*');	
			$this->db->from('news_cat');		
			$this->db->order_by("news_cat_id", "asc");
			$query = $this->db->get();	
			return $query;		
		}
		
				
		function video_subcategory_get()
		{
			$this->db->select('*');	
			$this->db->from('news_subcat');		
			$this->db->order_by("news_subcat_id", "asc");
			$query = $this->db->get();	
			return $query;		
		}
		
		function news_subcategory_get()
		{
			$this->db->select('*');	
			$this->db->from('news_subcat');		
			$this->db->order_by("news_subcat_name", "asc");
			$query = $this->db->get();	
			return $query;		
		}
		
		function news_subcat_news_cat_id_get($news_subcat_id)
		{
			$this->db->select('*');	
			$this->db->from('news_subcat');		
			$this->db->where('news_subcat_id', $news_subcat_id);
			$query = $this->db->get();	
			foreach($query->result() as $row):
			return $row->news_subcat_news_cat_id;	
			endforeach;
		}
		
		function news_slide_get()
		{
			$this->db->select('*');	
			$this->db->from('slide');
			$this->db->order_by("id", "asc");		
			$query = $this->db->get();	
			return $query;		
		}
		
		function news_get()
		{
			$this->db->select('*');	
			$this->db->from('news');	
			$this->db->order_by("news_id", "desc");		
			$query = $this->db->get();	
			return $query;		
		}
		
		function news_get_by_id($news_id)
		{
			$this->db->select('*');	
			$this->db->from('news');	
			$this->db->where("news_id", $news_id);		
			$query = $this->db->get();	
			return $query;		
		}
		
		function video_get_by_id($video_id)
		{
			$this->db->select('*');	
			$this->db->from('video');	
			$this->db->where("video_id", $video_id);		
			$query = $this->db->get();	
			return $query;		
		}
		
		function news_add($news_image)
		{
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');
			$news_caption=$this->input->post('news_caption');
			$news_url=url_title($title);
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			$news_date_launch=$this->input->post('news_date_launch');
			//$news_date_launch=date("Y-d-m H:i:s",strtotime($news_date_launch));
					
			//$post_category_id=$this->news_subcat_news_cat_id_get($post_subcategory_id);
			$source=$this->input->post('source');
			$stat=$this->input->post('stat');
			$news_hl_r=$this->input->post('news_hl_r');
			$tags=$this->input->post('tags');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$news_unique=$this->input->post('unique');
			//$content_trim = strip_tags($content);
			//$product_desc_trim =strip_tags($content,'<div');
			
			$news_user_id=$this->session->userdata('user_id');
			
			$data = array(
			'news_date' => date('Y-m-d H:i:s') ,
			'news_date_launch' => $news_date_launch ,
			'news_title' => $title ,
			'news_subtitle' => $subtitle ,
			'news_content' => $content,
			'news_image' => $news_image,
			'news_keyword' => $tags,
			'news_url' => $news_url,
			'news_cat_id' => $post_category_id,
			'news_subcat_id' => $post_subcategory_id,
			'news_source' => $source,
			'news_user_id' => $news_user_id,
			'news_caption' => $news_caption,
			'news_hl' => $stat,
			'news_hl_r' => $news_hl_r,
			'news_unique' => $news_unique,
			'news_stat' => 1,
			'news_visit' => 0,
			'news_show' => 1,
			);
			$this->db->insert('news', $data); 
			
			$id=$this->db->insert_id();
			$keywords = explode(",",$keyword); // it will convert your string to an array
			foreach($keywords as $keyword) // iterate every element
			{
				//$sql = "INSERT INTO keyword (keyword_name, news_id) VALUES ('$keyword', '$id')"; // one keyword at a time
				//mysql_query($sql);
				$datakeyword = array(
					'keyword_name' => $keyword,
					'news_id' => $id,
				);
				$this->db->insert('keyword', $datakeyword);
			}	
			return $id;
		}
		
		function news_additional($news_add_news_id,$news_add_index) 
		{		
			$content=$this->input->post('content'.$news_add_index);				
			$data = array(
				'news_add_content' => $content,
				'news_add_index' => $news_add_index,
				'news_add_news_id' => $news_add_news_id	
			);
			$this->db->insert('news_add', $data); 
		}
		
		function news_additional_get($news_add_id)
		{
			$this->db->select('*');	
			$this->db->from('news_add');	
			$this->db->where('news_add_id', $news_add_id);
			$query = $this->db->get();	
			return $query;				
		}
		
		function news_additional_num_get($news_add_news_id)
		{
			$this->db->select('*');	
			$this->db->from('news_add');	
			$this->db->where('news_add_news_id', $news_add_news_id);
			$query = $this->db->get();	
			return $query;				
		}
		
		function news_addtional_edit_do($news_add_id){
			$content=$this->input->post('content');				
			$data = array(
				'news_add_content' => $content
			);
			$this->db->where('news_add_id', $news_add_id);
			$this->db->update('news_add', $data); 
		
		}
		
		function news_additional_delete($news_add_id) {		
			$this->db->where('news_add_id', $news_add_id);
			$this->db->delete('news_add');		
		}
				
		function video_add($video_video)
		{
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');		
			$video_url=url_title($title);
			$video_user_id=$this->session->userdata('user_id');
						
			$data = array(
				'video_date' => date('Y-m-d H:i:s') ,
				'video_title' => $title ,
				'video_subtitle' => $subtitle ,
				'video_video' => $video_video,
				'video_url' => $video_url,
				'video_user_id' => $video_user_id,
			);
			$this->db->insert('video', $data); 
			$id=$this->db->insert_id();			
			return $id;
		}
		
		
		function video_edit1($video_video)
		{
			$video_id=$this->uri->segment(4);
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');		
			$video_url=url_title($title);
			
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			$tags=$this->input->post('tags');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$video_user_id=$this->session->userdata('user_id');
						
			$data = array(
				'video_title' => $title,
				'video_subtitle' => $subtitle,
				'video_url' => $video_url,
				'video_user_id' => $video_user_id,
				'video_video' => $video_video,
				'video_content' => $content,
				'video_keyword' => $tags,
				'video_cat_id' => $post_category_id,
				'video_subcat_id' => $post_subcategory_id
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $data);
		}
		
		
		function video_edit2()
		{
			$video_id=$this->uri->segment(4);
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');		
			$video_url=url_title($title);
			
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			$tags=$this->input->post('tags');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$video_user_id=$this->session->userdata('user_id');
						
			$data = array(
				'video_title' => $title ,
				'video_subtitle' => $subtitle ,
				'video_url' => $video_url,
				'video_user_id' => $video_user_id,
				
				'video_content' => $content,
				'video_keyword' => $tags,
				'video_cat_id' => $post_category_id,
				'video_subcat_id' => $post_subcategory_id
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $data);
		}
		
		function video_thumb_add($video_id, $video_image)
		{
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			$tags=$this->input->post('tags');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$video_user_id=$this->session->userdata('user_id');
						
			$data = array(
				'video_content' => $content,
				'video_image' => $video_image,
				'video_keyword' => $tags,
				'video_cat_id' => $post_category_id,
				'video_subcat_id' => $post_subcategory_id
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $data);
		}
		
		function video_thumb_edit($video_id, $video_image)
		{					
			$data = array(
				'video_image' => $video_image
			);
			$this->db->where('video_id', $video_id);
			$this->db->update('video', $data);
		}

		function gallery_get()
		{
			$this->db->select('*');	
			$this->db->from('gallery_h');		
			$this->db->order_by("gallery_h_id", "desc");
			$query = $this->db->get();	
			return $query;	
		}

		function gallery_get_2($gallery_h_id)
		{
			$this->db->select('*');	
			$this->db->from('gallery');		
			$this->db->where('gallery_h_id', $gallery_h_id);
			$this->db->order_by("gallery_id", "desc");
			$query = $this->db->get();	
			return $query;	
		}
		
		function gallery_add($gallery_image)
		{
			$title=$this->input->post('title');
			$source=$this->input->post('source');
			$content=$this->input->post('content');
			$gallery_h_id=$this->input->post('gallery_h_id');
			
			
			$data = array(
			'gallery_date' => date('Y-m-d H:i:s') ,
			'gallery_name' => $title ,
			'gallery_desc' => $content,
			'gallery_image' => $gallery_image,
			'gallery_h_id' => $gallery_h_id,
			);
			
			$this->db->insert('gallery', $data); 		
		}
		
		function gallery_add_h($gallery_image)
		{
			$title=$this->input->post('title');
			$source=$this->input->post('source');
			$content=$this->input->post('content');
			$url=url_title($title);
			
			$data = array(
			'gallery_date' => date('Y-m-d H:i:s') ,
			'gallery_title' => $title ,
			'gallery_desc' => $content,
			'gallery_image' => $gallery_image,
			'gallery_h_url' => $url
			);
			
			$this->db->insert('gallery_h', $data); 		
		}
		
		function gallery_get_by_id()
		{
			$id=$this->uri->segment(4);
			$this->db->select('*');	
			$this->db->from('gallery');		
			$this->db->where("gallery_id", $id);
			$query = $this->db->get();	
			return $query;	
		}
		
		function slide_get_by_id()
		{
			$id=$this->uri->segment(4);
			$this->db->select('*');	
			$this->db->from('slide');		
			$this->db->where("id", $id);
			$query = $this->db->get();	
			return $query;	
		}
		
		function slide_edit()
		{
			$id=$this->uri->segment(4);
			$data = array(
			'slide_img' => $this->input->post('slide_img'),
			'slide_desc' => $this->input->post('slide_desc'),
			'news_id' => $this->input->post('news_id')
			);
			
			$this->db->where('id', $id);
			$this->db->update('slide', $data);
		}
		
		function gallery_edit($gallery_image)
		{
			
			$title=$this->input->post('title');
			$source=$this->input->post('source');
			$content=$this->input->post('content');
			
			$gallery_id=$this->uri->segment(4);
			$data = array(
			'gallery_name' => $title ,
			'gallery_desc' => $content,
			'gallery_image' => $gallery_image,
			'gallery_source' => $source
			);
			
			$this->db->where('gallery_id', $gallery_id);
			$this->db->update('gallery', $data);
		}
		
		function slide_do()
		{
			for($i=5; $i<11; $i++){
				$data2=array(
				'slide_img'=>$this->input->post('slide_img' . $i),
				'slide_desc'=>$this->input->post('slide_desc'. $i),
				'news_id'=>$this->input->post('news_id'. $i),
				);
				$this->db->where('id', $i);
				$this->db->update('slide', $data2);
			}
		}
		
		function news_edit($limit, $offset)
		{
			$user_id=$this->session->userdata('user_id') ;
			$this->db->select('news_id, news_date,news_date_launch,news_title,news_cat_title,news_subcat_name,news_hl_r,news_visit');	
			$this->db->from('news');	
			$this->db->join('news_cat', 'news.news_cat_id=news_cat.news_cat_id ', 'left');
			$this->db->join('news_subcat', 'news.news_subcat_id=news_subcat.news_subcat_id ', 'left');
			$this->db->order_by("news_date_launch", "desc");
			$this->db->limit($limit, $offset);
			$query = $this->db->get();	
			return $query;	
		}
		
		function news_edit_num()
		{
			return $this->db->count_all('news');
		}
		
		function video_edit_num()
		{		
			return $this->db->count_all('video');
		}
		
		function video_edit($limit, $offset)
		{
			$this->db->select('*');	
			$this->db->from('video');	
			$this->db->join('news_cat', 'video_cat_id=news_cat.news_cat_id ', 'left');
			$this->db->join('news_subcat', 'video_subcat_id=news_subcat.news_subcat_id ', 'left');
			$this->db->order_by("video_id", "desc");
			$this->db->limit($limit, $offset);
			$query = $this->db->get();	
			return $query;	
		}
		
		function cat_get($limit, $offset)
		{	
			$this->db->select('*');	
			$this->db->from('news_cat');		
			$this->db->order_by("news_cat_id", "desc");
			$this->db->limit($limit, $offset);
			$query = $this->db->get();	
			return $query;	
		}

		function user_get()
		{	
			$this->db->select('*');	
			$this->db->from('users');		
			$this->db->order_by("id", "desc");
			$query = $this->db->get();	
			return $query;	
		}
		
		function user_get_pass($id)
		{	
			$this->db->select('*');	
			$this->db->from('users');		
			$this->db->where('id', $id);
			$query = $this->db->get();	
			foreach($query->result() as $row):
				return $row->password;
			endforeach;	
		}
		
		function user_edit_selected($id)
		{	
			$this->db->select('*');	
			$this->db->from('users');		
			$this->db->where('id', $id);
			$query = $this->db->get();	
			return $query;
		}
		
		function user_delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('users');	
		}
		
		function user_add()
		{
			$username=$this->input->post('username', TRUE);
			$password=$this->input->post('password', TRUE);
			$user_type=$this->input->post('user_type', TRUE);
			
			$data = array(
			   'username' => $username,
			   'password' => md5($password),
			   'user_type' =>$user_type
			);
			$this->db->insert('users', $data); 		
		}
		
		function user_edit_do(){
			
			$id=$this->input->post('id');
			$password=$this->input->post('password', TRUE);
			$password_on_db=$this->user_get_pass($id);
			if($password==''):
				$data = array(
				'username' => $this->input->post('username'),
			);	
			elseif($password==$password_on_db):
				$data = array(
				'username' => $this->input->post('username'),
				);	
			else:
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($password)
				);		
			endif;
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}


		function cat_num()
		{
			$this->db->select('*');	
			$this->db->from('news_cat');
			$query = $this->db->get();
			return $news_num =$query->num_rows;
		}
		
		function cat_edit_selected()
		{
			$news_cat_id=$this->uri->segment(4);	
			$this->db->select('*');	
			$this->db->from('news_cat');		
			$this->db->where('news_cat_id', $news_cat_id);
			$query = $this->db->get();	
			return $query;
		}
		
		function cat_edit_do(){
			
			$news_cat_id=$this->input->post('news_cat_id');
			$data = array(
			'news_cat_title' => $this->input->post('news_cat_title'),
			'news_cat_url' => $this->input->post('news_cat_url')
			);		
			$this->db->where('news_cat_id', $news_cat_id);
			$this->db->update('news_cat', $data);
		}
		
		function cat_add()
		{
			$news_cat_title=$this->input->post('news_cat_title');
			$url=url_title($news_cat_title);
			
			$data = array(
			   'news_cat_title' => $news_cat_title ,
			   'news_cat_url' => $url
			);
			
			$this->db->insert('news_cat', $data); 		
		}
		
		function subcat_get($limit, $offset)
		{	
			$this->db->select('*');	
			$this->db->from('news_subcat');		
			$this->db->join('news_cat', 'news_subcat_news_cat_id = news_cat_id', 'left');		
			$this->db->order_by("news_subcat_id", "desc");
			$this->db->limit($limit, $offset);
			$query = $this->db->get();	
			return $query;	
		}
		
		function subcat_num()
		{
			$this->db->select('*');	
			$this->db->from('news_subcat');
			$query = $this->db->get();
			return $news_num =$query->num_rows;
		}
		
		function subcat_edit_selected()
		{
			$news_subcat_id=$this->uri->segment(4);	
			$this->db->select('*');	
			$this->db->from('news_subcat');		
			$this->db->join('news_cat', 'news_subcat_news_cat_id = news_cat_id', 'left');
			$this->db->where('news_subcat_id', $news_subcat_id);
			$query = $this->db->get();	
			return $query;
		}
		
		function subcat_edit_do(){
			
			$news_subcat_id=$this->input->post('news_subcat_id');
			$data = array(
			'news_subcat_name' => $this->input->post('news_subcat_title'),
			'news_subcat_news_cat_id' => $this->input->post('news_subcat_news_cat_id'),
			'news_subcat_url' => $this->input->post('news_subcat_url')
			);		
			$this->db->where('news_subcat_id', $news_subcat_id);
			$this->db->update('news_subcat', $data);
		}
		
		function subcat_add()
		{
			$news_subcat_title=$this->input->post('news_subcat_title');
			$url=url_title($news_subcat_title);
			
			$data = array(
			   'news_subcat_name' => $news_subcat_title ,
			   'news_subcat_url' => $url,
			   'news_subcat_news_cat_id' => $this->input->post('news_subcat_news_cat_id')
			);
			
			$this->db->insert('news_subcat', $data); 		
		}
		
		
		function subcat_delete($subcat_id)
		{
			$this->db->where('news_subcat_id', $subcat_id);
			$this->db->delete('news_subcat');	
		}
		
		function cat_delete($cat_id)
		{
			$this->db->where('news_cat_id', $cat_id);
			$this->db->delete('news_cat');	
		}
			
		function news_delete($news_id)
		{
			$this->db->where('news_id', $news_id);
			$this->db->delete('news');	
		}
		
		function comment_delete($comment_id)
		{
			$this->db->where('comment_id', $comment_id);
			$this->db->delete('news_comment');	
		}
			
		
		function news_edit_selected()
		{
			$news_id=$this->uri->segment(4);
			
			$this->db->select('*');	
			$this->db->from('news');		
			$this->db->where('news_id', $news_id);
			$query = $this->db->get();	
			return $query;
		}
		
		function video_edit_selected()
		{
			$video_id=$this->uri->segment(4);
			
			$this->db->select('*');	
			$this->db->from('video');		
			$this->db->where('video_id', $video_id);
			$query = $this->db->get();	
			return $query;
		}
		
		function video_delete($id)
		{
			$this->db->where('video_id', $id);
			$this->db->delete('video');	
		}
		
		function ajax_add()
		{
			$name = $this->input->post('name');
			
			$this->db->select('*');	
			$this->db->from('news');		
			$this->db->where('news_id', $name);
			$query = $this->db->get();	
			return $query;
		}
				
		function news_edit_img_do($news_image)
		{			
			$news_id = $this->input->post('name');	
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');
			$news_caption=$this->input->post('news_caption');
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			
			$news_url=url_title($title);
			$source=$this->input->post('source');
			$stat=$this->input->post('stat');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$news_hl_r=$this->input->post('news_hl_r');
			$tags=$this->input->post('tags');
			$news_unique=$this->input->post('unique');
			$news_date_launch=$this->input->post('news_date_launch');

			$data = array(
			'news_title' => $title ,
			'news_subtitle' => $subtitle ,
			'news_caption' => $news_caption,
			'news_content' => $content,
			'news_url' => $news_url,
			'news_cat_id' => $post_category_id,
			'news_subcat_id' => $post_subcategory_id,
			'news_source' => $source,
			'news_keyword' => $tags,
			'news_hl_r' => $news_hl_r,
			'news_date_launch' => $news_date_launch,
			'news_image' => $news_image
			);		
			$this->db->where('news_id', $news_id);
			$this->db->update('news', $data);
			
			//delete old tags
			$this->db->delete('keyword', array('news_id' => $news_id)); 
			//insert new tags
			$keywords = explode(",",$keyword); // it will convert your string to an array
			foreach($keywords as $keyword) // iterate every element
			{
				//$sql = "INSERT INTO keyword (keyword_name, news_id) VALUES ('$keyword', '$news_id')"; // one keyword at a time
				//mysql_query($sql);
				$datakeyword = array(
					'keyword_name' => $keyword,
					'news_id' => $news_id,
				);
				$this->db->insert('keyword', $datakeyword);
			}	
			return $news_id;	
		}
		
		function news_edit_do()
		{
			$news_id = $this->input->post('name');	
			$title=$this->input->post('title');
			$subtitle=$this->input->post('subtitle');
			$news_caption=$this->input->post('news_caption');
			$post_subcategory_id=$this->input->post('post_subcategory_id');
			$post_category_id=$this->input->post('post_category_id');
			
			$news_url=url_title($title);
			$source=$this->input->post('source');
			$stat=$this->input->post('stat');
			$content=$this->input->post('content');
			$keyword=$this->input->post('keyword');
			$news_hl_r=$this->input->post('news_hl_r');
			$tags=$this->input->post('tags');
			$news_unique=$this->input->post('unique');
			$news_date_launch=$this->input->post('news_date_launch');
			//$news_date_launch=date("Y-d-m H:i:s",strtotime($news_date_launch));			
			//$post_category_id=$this->news_subcat_news_cat_id_get($post_subcategory_id);
			
			$data = array(
			'news_title' => $title ,
			'news_subtitle' => $subtitle ,
			'news_caption' => $news_caption,
			'news_content' => $content,
			'news_url' => $news_url,
			'news_cat_id' => $post_category_id,
			'news_subcat_id' => $post_subcategory_id,
			'news_source' => $source,
			'news_hl' => $stat,
			'news_keyword' => $tags,
			'news_hl_r' => $news_hl_r,
			'news_unique' => $news_unique,
			'news_date_launch' => $news_date_launch
			);		
			$this->db->where('news_id', $news_id);
			$this->db->update('news', $data);
			
			//delete old tags
			$this->db->delete('keyword', array('news_id' => $news_id)); 
			//insert new tags
			if($keyword!=''){
				$keywords = explode(",",$keyword); // it will convert your string to an array
				foreach($keywords as $keyword) // iterate every element
				{
					//$sql = "INSERT INTO keyword (keyword_name, news_id) VALUES ('$keyword', '$news_id')"; 
					// one keyword at a time
					//mysql_query($sql);
					$datakeyword = array(
						'keyword_name' => $keyword,
						'news_id' => $news_id,
					);
					$this->db->insert('keyword', $datakeyword); 
				}
			}	
			return $news_id;	
		}
		
		function news_edit_do2()
		{
			$news_id = $this->input->post('name');
			
			$title=$this->input->post('title');
			$news_url=url_title($title);
			$post_category_id=$this->input->post('post_category_id');
			$source=$this->input->post('source');
			$stat=$this->input->post('stat');
			$content=$this->input->post('content');
		}
		
		function keyword_get($news_id)
		{
			$this->db->select('keyword_name');
			$this->db->from('keyword');
			$this->db->where('news_id', $news_id);
			return  $this->db->get();	
		}
		
		
		function poling_group_get()
		{
			$this->db->select('*');
			$this->db->from('vote_group');
			return  $this->db->get();		
		}
		
		function pol_group_add()
		{			
			$data = array(
			   'vote_group_name' => $this->input->post('vote_group_name')
			);
			$this->db->insert('vote_group', $data); 		
		}
		
		function pol_delete($vote_group_id) {
			$this->db->where('vote_group_id', $vote_group_id);
			$this->db->delete('vote_group');	
			
			$this->db->where('vote_vote_group_id', $vote_group_id);
			$this->db->delete('vote');
		}
		
		function poling_group_get_by($vote_group_id){			
			$this->db->select('*');
			$this->db->from('vote_group');
			$this->db->where('vote_group_id', $vote_group_id);
			return  $this->db->get();	
		}
		
		function pol_group_edit_do()
		{
			$vote_group_id=$this->input->post('vote_group_id');
			$data = array(
			   'vote_group_name' => $this->input->post('vote_group_name')
			);
			$this->db->where('vote_group_id', $vote_group_id);
			$this->db->update('vote_group', $data); 
		}
		
		function poling_get_by($vote_group_id)
		{
			$this->db->select('*');
			$this->db->from('vote');
			$this->db->where('vote_vote_group_id', $vote_group_id);
			return  $this->db->get();	
		}
		
		function pol_add()
		{			
			$data = array(
			   'vote_name' => $this->input->post('vote_name'),
			   'vote_vote_group_id' => $this->input->post('vote_vote_group_id')
			);
			$this->db->insert('vote', $data); 		
		}
		
		function pol_get_by($vote_id)
		{
			$this->db->select('*');
			$this->db->from('vote');
			$this->db->where('vote_id', $vote_id);
			return  $this->db->get();	
		}
		
		
		function pol_edit_do()
		{
			$vote_id=$this->input->post('vote_id');
			$data = array(
			   'vote_name' => $this->input->post('vote_name')
			);
			$this->db->where('vote_id', $vote_id);
			$this->db->update('vote', $data); 
		}
		
		
		function opsi_pol_delete($vote_id) {
			$this->db->where('vote_id', $vote_id);
			$this->db->delete('vote');	
		}
	
	
	}	