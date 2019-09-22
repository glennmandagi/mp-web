<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Video extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('user_model');
			$this->user_model->session_check();
		}
		
		function index()
		{			
			// initialize pagination
			$this->load->library('pagination');	
			$limit=20;
			$offset= $this->uri->segment(4, 0);
			$video_num=$this->admin_model->video_edit_num();	
			
			$config['base_url'] = site_url() . 'admin/video/edit';
			$config['total_rows'] = $video_num;
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			// End. initialize pagination
			
			$q_video=$this->admin_model->video_edit($limit, $offset);
			$data['pagination'] = $this->pagination->create_links();
			$data['q_video']=$q_video;		
			$data['offset']=$offset+1;//prevent zero 
			
			$data['page']='berita';
			$data['content']='admin/video/index';
			$this->load->view('admin/layout/template', $data);
			
		}
		
		public function add()
		{					
			$q_post_category=$this->admin_model->video_category_get();			
			$q_post_subcategory=$this->admin_model->video_subcategory_get();
			$data['q_post_category']=$q_post_category;
			$data['q_post_subcategory']=$q_post_subcategory;
			
			$data['page']='berita';
			$data['content']='admin/video/add';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function delete()
		{						
			$video_id=$this->uri->segment(4);
			$q=$this->admin_model->video_get_by_id($video_id);
			foreach($q->result() as $row):
				$video_video=$row->video_video;
				$video_image=$row->video_image;
			endforeach;
			unlink('assets/video/' . $video_video);
			unlink('assets/video/thumb/' . $video_image);
			
			$this->admin_model->video_delete($video_id);	
			redirect('admin/video/index');
		}
		
		public function add_do()
		{			
			$loc='./assets/video/';
			$field_name = "video_video";
			$config['upload_path'] = $loc;
			$config['allowed_types'] =  'mp4';
			$config['max_size']	= '999999';
			$config['max_width']  = '99999';
			$config['max_height']  = '99999';
			$this->load->library('upload', $config);	

			if ($this->upload->do_upload($field_name)) {	
				$data = array('upload_data' => $this->upload->data());
				//rename
				$file = $data['upload_data']['file_name'];
				$file_no_ex=$data['upload_data']['raw_name'];
				$file_ex=$data['upload_data']['file_ext'];
				$new_name= date("dmys") . $file_ex;
				$new_name_path= $loc . $new_name;			
				rename($loc . $file, $new_name_path);
				$video_id=$this->admin_model->video_add($new_name);
				
				redirect('admin/video/add_thumb/' . $video_id);
			} else {
				echo "Upload failed!";
			}		
		}
		
		public function edit_do2()
		{			
			$video_id=$this->uri->segment(4);
			if($_FILES['video_video']['error'] != 4):	
				$loc='./assets/video/';
				$field_name = "video_video";
				$config['upload_path'] = $loc;
				$config['allowed_types'] =  'mp4';
				$config['max_size']	= '999999';
				$config['max_width']  = '99999';
				$config['max_height']  = '99999';
				$this->load->library('upload', $config);	

				if ($this->upload->do_upload($field_name)) {	
					$data = array('upload_data' => $this->upload->data());
					//rename
					$file = $data['upload_data']['file_name'];
					$file_no_ex=$data['upload_data']['raw_name'];
					$file_ex=$data['upload_data']['file_ext'];
					$new_name= date("dmys") . $file_ex;
					$new_name_path= $loc . $new_name;			
					rename($loc . $file, $new_name_path);
					
					//delete old video
					$q=$this->admin_model->video_get_by_id($video_id);
					foreach($q->result() as $row):
						$video_video=$row->video_video;
					endforeach;
					unlink('assets/video/' . $video_video);
					
					$video_id=$this->admin_model->video_edit1($new_name);			
						redirect('admin/video');
				} else {
					echo "Upload failed!";
				}	
				
			else:
				$this->admin_model->video_edit2();			
				redirect('admin/video');
			endif;
		
		}
					
		public function add_thumb()
		{					
			$q_post_category=$this->admin_model->video_category_get();			
			$q_post_subcategory=$this->admin_model->video_subcategory_get();
			$data['q_post_category']=$q_post_category;
			$data['q_post_subcategory']=$q_post_subcategory;
			
			$data['page']='berita';
			$data['content']='admin/video/add_thumb';
			$this->load->view('admin/layout/template', $data);
		}
		
		public function add_thumb_do()
		{			
			$video_id=$this->uri->segment(4);
			$loc='./assets/video/thumb/';
			$field_name = "video_image";
			$config['upload_path'] = $loc;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|png';
			$config['max_size']	= '999999';
			$config['max_width']  = '99999';
			$config['max_height']  = '99999';
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload($field_name)):
				$error = array('error' => $this->upload->display_errors());
				echo 'failed to upload photo';			
			else:				
				$data = array('upload_data' => $this->upload->data());
				//rename
				$file = $data['upload_data']['file_name'];
				$file_no_ex=$data['upload_data']['raw_name'];
				$file_ex=$data['upload_data']['file_ext'];
				$new_name= date("dmys") . $file_ex;
				$new_name_path= $loc . $new_name;			
				rename($loc . $file, $new_name_path);
				//end.rename
				$data = $this->upload->data();
				//return $data['file_name'];  
				
				$this->admin_model->video_thumb_add($video_id, $new_name);
			endif; 
			//echo $this->db->last_query();
			redirect('admin/video/');
		}
		
		
		
		
		public function edit_thumb_do()
		{			
			$video_id=$this->uri->segment(4);
			$loc='./assets/video/thumb/';
			$field_name = "video_image";
			$config['upload_path'] = $loc;
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|png';
			$config['max_size']	= '999999';
			$config['max_width']  = '99999';
			$config['max_height']  = '99999';
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload($field_name)):
				$error = array('error' => $this->upload->display_errors());
				echo 'failed to upload photo';			
			else:				
				$data = array('upload_data' => $this->upload->data());
				//rename
				$file = $data['upload_data']['file_name'];
				$file_no_ex=$data['upload_data']['raw_name'];
				$file_ex=$data['upload_data']['file_ext'];
				$new_name= date("dmys") . $file_ex;
				$new_name_path= $loc . $new_name;			
				rename($loc . $file, $new_name_path);
				//end.rename
				$data = $this->upload->data();
				//return $data['file_name']; 
				
				//delete old image
				$q=$this->admin_model->video_get_by_id($video_id);
				foreach($q->result() as $row):
					$video_image=$row->video_image;
				endforeach;
				unlink('assets/video/thumb/' . $video_image);
				
				$this->admin_model->video_thumb_edit($video_id, $new_name);
			endif; 
			//echo $this->db->last_query();
			redirect('admin/video/');
		}
		
		
		

		function sharefb()
		{
			$q_video=$this->admin_model->video_edit_selected();
			foreach($q_video->result() as $row):
			$title=$row->video_title;
			$video_content=$row->video_content;
			$thumb=$row->video_image;
			$video_url=$row->video_url;
			$video_id=$row->video_id;
			$video_date=$row->video_date;
			
			endforeach;
			$video_content=strip_tags($video_content);
			$video_content=substr("$video_content", 0, 250);
			$thumb='http://www.medianesia.com/assets/images/video/thumb/' . $thumb;
			$link=$this->custom->time_url($video_date, $video_url, $video_id);
			
			//echo $title . ' - ' . $title . ' - ' .  $video_content . ' - ' .  $thumb . ' - ' .  $link;
			//$this->facebook($title, $title, $video_content, $thumb, $link);
		}
		
		
		function facebook($userMessage, $video_title, $video_content, $thumb, $link)
		{
			include './assets/plugins/facebook/config.php' ;
			$userPageId 	= '363708496999462';
			
			//HTTP POST request to PAGE_ID/feed with the publish_stream
			$post_url = '/'.$userPageId.'/feed';
			
			//posts message on page statues 			
			$msg_body = array(
			'message' => $userMessage,
			'name' => $video_title,
			'picture' => $thumb,
			'caption' => "medianesia video",
			'link' => $link,
			'description' => $video_content,			
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
		
		
		function tweet($text)
		{
			require './tmhOAuth-master/tmhOAuth.php';
			require './tmhOAuth-master/tmhUtilities.php';
			$tmhOAuth = new tmhOAuth(array(
			'consumer_key' => 'nNpilaWoffGNI0YRGOFJw',
			'consumer_secret' => 'RJpaI9YJ3gwbFmCIvuEvsTGdbKMeVgF1o0qPMrya50',
			'user_token' => '1017691908-yOgi9t0XnXq3yk8AAC4bLrghYX6bCMMCkn1DNEo',
			'user_secret' => '4vh7FvLKBf8pTso8yQfroLnb5VBm0crkuN8UXi7t4O8',
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
		
		/*
			END ADD IMAGE
		*/
		
		
		function img_upload()
		{		
			$data['page']='berita';
			$data['content']='admin/video/img_upload';
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
		
		function owner_check($video_id)
		{	
			$user_id=$this->session->userdata('user_id') ; 
			$result=$this->admin_model->video_get_by_id($video_id);
			foreach($result->result() as $row):
			$video_user_id=$row->video_user_id;
			endforeach;
			if($user_id==1):
			return true;
			elseif($user_id==$video_user_id):
			return true;
			else:
			return false;
			endif;			
		}
		
		
		
		function edit_selected()
		{					
			$q_post_category=$this->admin_model->video_category_get();
			$data['q_post_category']=$q_post_category;
			$q_post_subcategory=$this->admin_model->video_subcategory_get();
			$data['q_post_subcategory']=$q_post_subcategory;
			
			$q_video=$this->admin_model->video_edit_selected();
			$data['q_video']=$q_video;
			$data['cke_on']=true;

			
			$data['page']='berita';
			$data['content']='admin/video/edit_selected';
			$this->load->view('admin/layout/template', $data);
		}
		
		
		function edit_thumb()
		{								
			$q_video=$this->admin_model->video_edit_selected();
			$data['q_video']=$q_video;
				
			$data['page']='berita';
			$data['content']='admin/video/edit_thumb';
			$this->load->view('admin/layout/template', $data);
		}
		
		function edit_selected2()
		{		
			
			$data['cke_osn']=true;
			$data['page']='berita';
			$data['content']='admin/video/edit_selected2';
			$this->load->view('admin/layout/template', $data);
		}
		
		
		function edit_do()
		{
			if($_FILES['userfile']['error'] != 4):
			//delete old photo
			$old_image=$this->input->post('old_image');
			$filename = 'assets/images/video/' . $old_image;
			if (file_exists($filename) && $old_image!=''):
			unlink('assets/images/video/' . $old_image);
			unlink('assets/images/video/thumb/' . $old_image);
			endif;
			//add images
			$video_image=$this->upload_image('video');
			$this->thumb_add($video_image, 'video');
			$this->resize($video_image, 'video');
			//database
			$this->admin_model->video_edit_img_do($video_image);			
			else:
			$this->admin_model->video_edit_do();	
			endif;
			
			if ($this->input->post('ajax')) {			
				//echo 'berhasil';
				$this->load->view('admin/video/contact_submitted');	
				} else {
				//echo 'gagal';
			}	
			$url=$_SERVER['HTTP_REFERER'];
			redirect($url);
		}
		
	}						