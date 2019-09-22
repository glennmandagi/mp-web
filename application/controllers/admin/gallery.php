<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	function __construct()	
	{
		parent::__construct();	
		$this->load->model('admin_model');	
		$this->load->model('user_model');		
		$this->user_model->session_check();
	}		
	
	public function index()	
	{
		$data['q_gal']=$this->admin_model->gallery_get();

		$data['page']='berita';
		$data['content']='admin/gallery/index';
		$this->load->view('admin/layout/template', $data);
	}
	
	public function index_2()	
	{
		$gallery_h_id=$this->uri->segment(4);
		$data['q_gal']=$this->admin_model->gallery_get_2($gallery_h_id);
		$data['gallery_h_id']=$gallery_h_id;
		$data['page']='berita';
		$data['content']='admin/gallery/index_2';
		$this->load->view('admin/layout/template', $data);
	}
	
	public function add_h()
	{					
		$data['cke_on']=true;

		$data['page']='berita';
		$data['content']='admin/gallery/add_h';
		$this->load->view('admin/layout/template', $data);
	}
	
	public function add_h_do()
	{
		//images
		if($_FILES['userfile']['size'] == 0 ):
			$gallery_image='no-image.gif';
		else:
			$gallery_image=$this->upload_image('gallery');	
			$this->thumb_add($gallery_image, 'gallery');
		endif;
		
		$this->admin_model->gallery_add_h($gallery_image);	
		redirect('admin/gallery');
	}
	
	
	public function add()
	{			
		$gallery_h_id=$this->uri->segment(4);
		$data['gallery_h_id']=$gallery_h_id;
		$data['cke_on']=true;

		$data['page']='berita';
		$data['content']='admin/gallery/add';
		$this->load->view('admin/layout/template', $data);
	}
	
	public function add_do()
	{
		//images
		if($_FILES['userfile']['size'] == 0 ):
			$gallery_image='no-image.gif';
		else:
			$gallery_image=$this->upload_image('gallery');	
			$this->thumb_add($gallery_image, 'gallery');
		endif;
		
		$this->admin_model->gallery_add($gallery_image);
		$gallery_h_id=$this->input->post('gallery_h_id');
		redirect('admin/gallery/add/' . $gallery_h_id);
	}
	

	public function edit()
	{
		$data['cke_on']=true;
		$q_gal=$this->admin_model->gallery_get_by_id();
		$data['q_gal']=$q_gal;
		
		$data['page']='berita';
		$data['content']='admin/gallery/edit_selected';
		$this->load->view('admin/layout/template', $data);
		
	}
	
	public function edit_do()	
	{	
		$old_image=$this->input->post('old_image');
		if($_FILES['userfile']['error'] != 4):
			//delete old photo			
			$filename = 'assets/images/gallery/' . $old_image;
			if (file_exists($filename) && $old_image!=''):
				unlink('assets/images/gallery/' . $old_image);
				unlink('assets/images/gallery/thumb/' . $old_image);
			endif;
			//add images
			
			$gallery_image=$this->upload_image('gallery');	
			$this->thumb_add($gallery_image, 'gallery');
			
			//database
			$this->admin_model->gallery_edit($gallery_image);	
		else:			
			$this->admin_model->gallery_edit($old_image);	
		endif;

		$url=$_SERVER['HTTP_REFERER'];
		redirect($url);
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
	
	function thumb_add($new_name, $loc)
	{
		$loc='./assets/images/' . $loc . '/';
		$config['image_library'] = 'gd2';
		$config['source_image'] = $loc . $new_name;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 300;
		$config['height'] = 200;
		$config['new_image'] = $loc . 'thumb/' . $new_name;
		$config['thumb_marker'] ='';
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

}