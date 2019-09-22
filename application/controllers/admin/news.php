<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class News extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		public function index()
		{				
			$data['page']='berita';
			$data['content']='admin/news/index';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add()
		{		
			if($this->uri->segment(4)!=''):
			$news_id=$this->uri->segment(4);
			$q=$this->admin_model->news_get_by_id($news_id);
			foreach($q->result() as $row):
			$news_date=$row->news_date;
			$news_url=$row->news_url;
			$news_id=$row->news_id;
			endforeach;
			$data['news_url']=$this->custom->time_url($news_date, $news_url, $news_id);
			endif;			
			$q_post_category=$this->admin_model->news_category_get();			
			$q_post_subcategory=$this->admin_model->news_subcategory_get();
			$data['q_post_category']=$q_post_category;
			$data['q_post_subcategory']=$q_post_subcategory;
			
			$data['page']='berita';
			$data['content']='admin/news/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		
		function comment_delete() {
			$this->user_model->ifsuper();
			$comment_id=$this->uri->segment(4);
			$this->admin_model->comment_delete($comment_id);	
			$this->load->library('user_agent');
			$this->db->cache_delete_all();
			redirect($this->agent->referrer());
		}
		
		public function delete()
		{				
			$this->user_model->ifsuper();
			$news_cat_id=$this->uri->segment(4);
			$this->admin_model->news_delete($news_cat_id);
			$this->db->cache_delete_all();			
			redirect('admin/news/edit');
		}
		
		
		public function add_do()
		{			
			//images
			if($_FILES['userfile']['size'] == 0 ):
				$news_image='no-image.gif';
			else:
				//$news_image=$this->upload_image('news');	
				
				$loc='news';
				$loc='./assets/images/' . $loc . '/';
				$config['upload_path'] = $loc;
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|png';
				$config['max_size']	= '999';
				$config['max_width']  = '9999';
				$config['max_height']  = '9999';
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload()):
					$error = array('error' => $this->upload->display_errors());
					echo 'failed to upload photo';			
				else:				
					$data = array('upload_data' => $this->upload->data());
					//rename
					$file = $data['upload_data']['file_name'];
					$file_no_ex=$data['upload_data']['raw_name'];
					$file_ex=$data['upload_data']['file_ext'];
					$image_width=$data['upload_data']['image_width'];
					$image_height=$data['upload_data']['image_height'];
					$new_name= $file_no_ex . '_' . date("dmys") . $file_ex;
					$new_name_path= $loc . $new_name;			
					rename($loc . $file, $new_name_path);
					//end.rename
					$data = $this->upload->data();
					$news_image=$new_name;	 
				endif;
				
				//if potrait make watermark style		
				$this->thumb_add($news_image, 'news');
				if($image_height>$image_width):
					$this->thumb_add2($news_image, 'news');
				endif;
				$this->resize($news_image, 'news');					
			endif;
			
			$title=$this->input->post('title');
			$news_url=url_title($title);
			
			$news_id=$this->admin_model->news_add($news_image);	

			//Additional News
			for($i=2;$i<4;$i++){
				$news_add_content=$this->input->post('content'.$i);
				if($news_add_content!=''):
					$this->admin_model->news_additional($news_id,$i);	
				endif;
			}
			
			//tweet	
			$title=$this->input->post('title');
			$news_url=url_title($title);
			//$shortlink=base_url() . 'read/detil/' . $news_url;
			$news_date=date('Y-m-d h:m:s');
			$link=$this->custom->time_url($news_date, $news_url, $news_id);
			$title=substr("$title", 0, 70);
			$text= $title . ' ' . $link;
			
			$cur=date('Y-m-d H:i:s');
			$news_date_launch=$this->input->post('news_date_launch');
			
			if($news_date_launch<$cur):
				$this->tweet($text);
			endif;
			
			//facebook
			/*
			$news_content=$this->input->post('content');
			$news_content=strip_tags($news_content);
			$news_content=substr("$news_content", 0, 250);
			$thumb='http://www.medianesia.com/assets/images/news/thumb/' . $news_image;		
			*/
			//echo $this->db->last_query();
			$this->db->cache_delete_all();
			redirect('admin/news/add/' . $news_id);
			
		}
		
		function sharefb()
		{
			$q_news=$this->admin_model->news_edit_selected();
			foreach($q_news->result() as $row):
			$title=$row->news_title;
			$news_content=$row->news_content;
			$thumb=$row->news_image;
			$news_url=$row->news_url;
			$news_id=$row->news_id;
			$news_date=$row->news_date;
			
			endforeach;
			$news_content=strip_tags($news_content);
			$news_content=substr("$news_content", 0, 250);
			$thumb='http://www.medianesia.com/assets/images/news/thumb/' . $thumb;
			$link=$this->custom->time_url($news_date, $news_url, $news_id);
			
			//echo $title . ' - ' . $title . ' - ' .  $news_content . ' - ' .  $thumb . ' - ' .  $link;
			//$this->facebook($title, $title, $news_content, $thumb, $link);
		}
		
		
		function facebook($userMessage, $news_title, $news_content, $thumb, $link)
		{
			include './assets/plugins/facebook/config.php' ;
			$userPageId 	= '363708496999462';
			
			//HTTP POST request to PAGE_ID/feed with the publish_stream
			$post_url = '/'.$userPageId.'/feed';
			
			//posts message on page statues 			
			$msg_body = array(
			'message' => $userMessage,
			'name' => $news_title,
			'picture' => $thumb,
			'caption' => "medianesia news",
			'link' => $link,
			'description' => $news_content,			
			);
			
			if ($fbuser) {
				try {
					$postResult = $facebook->api($post_url, 'post', $msg_body );
					} catch (FacebookApiException $e) {
					echo $e->getMessage();
				}
				}else{
				$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
				header('Location: ' . $loginUrl);
			}
			
			//Show sucess message
			if($postResult)
			{
				echo '<html><head><title>Message Posted</title><link href="style.css" rel="stylesheet" type="text/css" /></head><body>';
				echo '<div id="fbpageform" class="pageform" align="center">';
				echo '<h1>Your message is posted on your facebook wall.</h1>';
				echo '<a class="button" href="'.$homeurl.'">Back to Main Page</a> <a target="_blank" class="button" href="http://www.facebook.com/'.$userPageId.'">Visit Your Page</a>';
				echo '</div>';
				echo '</body></html>';
			}	
		}
		
		function tes(){
			echo "Start";
			$this->tweet("Manadopost");
			echo "Success";
		}
		
		function tweet($text)
		{
			require './tmhOAuth-master/tmhOAuth.php';
			require './tmhOAuth-master/tmhUtilities.php';
			$tmhOAuth = new tmhOAuth(array(
			'consumer_key' => 'NHLR2VBcwiVG0jRVpqyBM8pqT',
			'consumer_secret' => 'wpZm1qc54ibmQzppMZpC8JniOGWVDe2wzoG7O2H8BtEm8jtVcr',
			'user_token' => '2594853883-4aKIzewoHSmkSF0pEKeX1xWmTGJvDuszWo4ZIch',
			'user_secret' => 'ukwY8CsGNRI3d9gA1HIfDaIk7U2IiAF2bBVUklPHuJj2b',
			));
			
			$code = $tmhOAuth->request('POST', $tmhOAuth->url('1.1/statuses/update'), array(
			'status' => $text
			));
			/*
				if ($code == 200) {
				tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
				} else {
				tmhUtilities::pr($tmhOAuth->response['response']);
				}
			*/
		}
		
		function upload_image($loc)
		{
			$loc='./assets/images/' . $loc . '/';
			$config['upload_path'] = $loc;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|png';
			$config['max_size']	= '999';
			$config['max_width']  = '9999';
			$config['max_height']  = '9999';
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()):
			$error = array('error' => $this->upload->display_errors());
			echo 'failed to upload photo';			
			else:				
			$data = array('upload_data' => $this->upload->data());
			//rename
			$file = $data['upload_data']['file_name'];
			$file_no_ex=$data['upload_data']['raw_name'];
			$file_ex=$data['upload_data']['file_ext'];
			$new_name= $file_no_ex . '_' . date("dmys") . $file_ex;
			$new_name_path= $loc . $new_name;			
			rename($loc . $file, $new_name_path);
			//end.rename
			$data = $this->upload->data();
			//return $data['file_name'];  
			return $new_name;  
			endif;
		}
		
		function resize($new_name, $loc_ori)
		{
			$loc='./assets/images/' . $loc_ori . '/';
			$config['image_library'] = 'gd2';
			$config['source_image'] = $loc . $new_name;
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '70%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = $loc . '/' . $new_name;
			$config['thumb_marker'] ='';
			
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}	
		
		
		function thumb_add($new_name, $loc)
		{
			$loc='./assets/images/' . $loc . '/';
			$config['image_library'] = 'gd2';
			$config['source_image'] = $loc . $new_name;
			$config['create_thumb'] = TRUE;
			$config['quality'] = '70%';
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 200;
			$config['new_image'] = $loc . 'thumb/' . $new_name;
			$config['thumb_marker'] ='';
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
		
		function thumb_add2($new_name, $loc)
		{
			$loc='./assets/images/' . $loc . '/thumb/' . $new_name ;
			$config['source_image'] = './assets/images/thumb_bg.jpg';
            $config['wm_overlay_path'] = $loc;
            $config['wm_type'] = "overlay";
			// $config['wm_hor_offset']=round((100-300)/2);
            //$config['wm_vrt_offset']=round((100-200)/2);
            $config['wm_vrt_alignment'] = 'bottom';
			$config['wm_hor_alignment'] = 'center';
			$config['wm_opacity'] = 100;
            $config['new_image'] = $loc;
            $this->image_lib->initialize($config);
            if (!$this->image_lib->watermark())
            {
                print "watermark failed";
            } 
		}
		/*
			END ADD IMAGE
		*/
		
		function slide()
		{
			$q_slide=$this->admin_model->news_slide_get();
			$q_news=$this->admin_model->news_get();
			$data['q_slide']=$q_slide;
			$data['q_news']=$q_news;
			
			$data['page']='berita';
			$data['content']='admin/news/slide';
			$this->load->view('admin/layout/template', $data);
		}
		
		function slide_do()
		{
			$this->admin_model->slide_do();
			$this->db->cache_delete_all();
			redirect('admin/news/slide');
		}
		
		function img_upload()
		{		
			$data['page']='berita';
			$data['content']='admin/news/img_upload';
			$this->load->view('admin/layout/template', $data);
		}
		
		function img_upload_do()
		{
			$config['upload_path'] = './assets/images/slide/';
			$config['allowed_types'] = '*';
			$config['max_size']	= '999';
			$config['max_width']  = '9999';
			$config['max_height']  = '9999';
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()):
			$error = array('error' => $this->upload->display_errors());
			echo 'failed to upload photo';			
			else:				
			$data = array('upload_data' => $this->upload->data());
			$file = $data['upload_data']['file_name'];
			echo $file;  
			endif;			
		}
		
		function owner_check($news_id)
		{	
			$user_id=$this->session->userdata('user_id') ; 
			$result=$this->admin_model->news_get_by_id($news_id);
			foreach($result->result() as $row):
			$news_user_id=$row->news_user_id;
			endforeach;
			if($user_id==1):
			return true;
			elseif($user_id==$news_user_id):
			return true;
			else:
			return false;
			endif;			
		}
		
		function edit()
		{			
			// initialize pagination
			$this->load->library('pagination');	
			$limit=50;
			$offset= $this->uri->segment(4, 0);
			$news_num=$this->admin_model->news_edit_num();	
			
			$config['base_url'] = site_url() . 'admin/news/edit';
			$config['total_rows'] = $news_num;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			// End. initialize pagination
			
			$q_news=$this->admin_model->news_edit($limit, $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['q_news']=$q_news;		
			$data['offset']=$offset+1;//prevent zero 
			
			$data['page']='berita';
			$data['content']='admin/news/edit';
			$this->load->view('admin/layout/template', $data);
		}
		
		function edit_selected()
		{		
			$this->user_model->ifsuper();
			$news_id=$this->uri->segment(4);
				
			$q_post_category=$this->admin_model->news_category_get();
			$data['q_post_category']=$q_post_category;
			$q_news=$this->admin_model->news_edit_selected();
			$data['q_keyword']=$this->admin_model->keyword_get($news_id);
			$data['q_news']=$q_news;
			$data['cke_on']=true;
			$q_post_subcategory=$this->admin_model->news_subcategory_get();
			$data['q_post_subcategory']=$q_post_subcategory;
			
			foreach($q_news->result() as $row):
				$news_title=$row->news_title;
			endforeach;
			
			/*
			$data['q_news_additional2']=$q_news_additional2=$this->admin_model->news_additional_get($news_id,2);
			$data['q_news_additional3']=$q_news_additional3=$this->admin_model->news_additional_get($news_id,3);
			*/
			
			$data['q_news_additional_num']=$q_news_additional_num=$this->admin_model->news_additional_num_get($news_id);
					
			$data['page']='berita';
			$data['content']='admin/news/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
		
		
		function news_addtional_edit() 
		{
			$news_add_id=$this->uri->segment(4);
			$data['q_news_additional2']=$q_news_additional2=$this->admin_model->news_additional_get($news_add_id);		
			
			$data['page']='berita';
			$data['content']='admin/news/edit_news_addtional_selected';
			$this->load->view('admin/layout/template', $data);
		}
		
		function news_addtional_edit_do()
		{
			$this->user_model->ifsuper();
			$news_add_news_id=$this->input->post('news_add_news_id');
			$news_add_id=$this->input->post('news_add_id');
			$this->admin_model->news_addtional_edit_do($news_add_id);
			//echo $this->db->last_query();
			$this->db->cache_delete_all();
			redirect('admin/news/edit_selected/'.$news_add_news_id);	
		}
		
		function news_addtional_delete()
		{
			$news_add_id=$this->uri->segment(4);
			$q_news_additional2=$this->admin_model->news_additional_delete($news_add_id);		
			
			$url=$_SERVER['HTTP_REFERER'];
			$this->db->cache_delete_all();
			redirect($url);
			
		}
		
		function news_addtional_add()
		{
			$data['page']='berita';
			$data['content']='admin/news/news_additional_add';
			$this->load->view('admin/layout/template', $data);
		}	
		
		function news_addtional_add_do()
		{
			$this->user_model->ifsuper();
			$news_add_news_id=$this->input->post('news_add_news_id');
			$news_add_index=$this->input->post('news_add_index');
			$this->admin_model->news_additional($news_add_news_id,$news_add_index) ;
			$this->db->cache_delete_all();			
			redirect('admin/news/edit_selected/'.$news_add_news_id);						
		}
			
		function edit_selected2()
		{				
			$data['cke_osn']=true;
			$data['page']='berita';
			$data['content']='admin/news/edit_selected2';
			$this->load->view('admin/layout/template', $data);
		}
			
		function edit_do()
		{
			$this->user_model->ifsuper();
			if($_FILES['userfile']['error'] != 4):
				//delete old photo
				$old_image=$this->input->post('old_image');
				$filename = 'assets/images/news/' . $old_image;
				if (file_exists($filename) && $old_image!=''):
					unlink('assets/images/news/' . $old_image);
					unlink('assets/images/news/thumb/' . $old_image);
				endif;
					
				//upload main images
				//$news_image=$this->upload_image('news');
				$loc='news';
				$loc='./assets/images/' . $loc . '/';
				$config['upload_path'] = $loc;
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|png';
				$config['max_size']	= '999';
				$config['max_width']  = '9999';
				$config['max_height']  = '9999';
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload()):
					$error = array('error' => $this->upload->display_errors());
					echo 'failed to upload photo';			
				else:				
					$data = array('upload_data' => $this->upload->data());
					//rename
					$file = $data['upload_data']['file_name'];
					$file_no_ex=$data['upload_data']['raw_name'];
					$file_ex=$data['upload_data']['file_ext'];
					$image_width=$data['upload_data']['image_width'];
					$image_height=$data['upload_data']['image_height'];
					$new_name= $file_no_ex . '_' . date("dmys") . $file_ex;
					$new_name_path= $loc . $new_name;			
					rename($loc . $file, $new_name_path);
					//end.rename
					$data = $this->upload->data();
					$news_image=$new_name;
				 
				endif;
				
				//if potrait make watermark style		
				$this->thumb_add($news_image, 'news');
				if($image_height>$image_width):
					$this->thumb_add2($news_image, 'news');
				endif;
				
				$this->resize($news_image, 'news');
				
				//database
				$this->admin_model->news_edit_img_do($news_image);			
			else:
				//without image change
				$this->admin_model->news_edit_do();	
			endif;
			
			if ($this->input->post('ajax')) {			
				//echo 'berhasil';
				$this->load->view('admin/news/contact_submitted');	
				} else {
				//echo 'gagal';
			}	
			$url=$_SERVER['HTTP_REFERER'];
			$this->db->cache_delete_all();
			redirect($url);
		}
		
	}						