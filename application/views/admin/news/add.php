<!-- Tagit -->
<link href="<?php echo base_url()?>assets2/js/tagit/css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets2/js/tagit/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets2/js/tagit/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<!--// Tagit -->

<script>
	$(function(){
		var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];
		
		//-------------------------------
		// Allow spaces without quotes.
		//-------------------------------
		$('#allowSpacesTags').tagit({
			availableTags: sampleTags,
			allowSpaces: true
		});
	});
</script>

<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
			
            <h5>Add News</h5>
            <p class="subheader">
				Mengupload Berita
			</p>
            <hr>
			
			<?php 
				$s4=$this->uri->segment(4);
				if($s4!=''):	
			?>
			<div class="sixteen columns bottom-2">
				<div class="alert alert-success">
					<h4>Success!</h4>
					Selamat Artikel Anda Berhasil tayang. <a target="_blank" href="<?php echo $news_url?>"> Lihat Artikel >> </a>
				</div>
			</div>
			<div class="clear"></div><br/><p/>
			<?php endif?>
			
			
            <!-- Contact page -->
            <div id="contact">
                <div id="message"></div>
              	<form action="<?php echo base_url()?>admin/news/add_do" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul : </label>
						<?php 
							$data = array(
							'name'      => 'title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', ''),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-input">
						<label>Sub Judul : </label>
						<?php 
							$data = array(
							'name'      => 'subtitle',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('subtitle', ''),
							);
							echo form_input($data);
							echo form_error('subtitle', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-inputs">
						<label>Isi Berita : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10">	</textarea>
						<div class="clear space_1"></div>
						<label>Isi Berita 2: </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content2" rows="10">	</textarea>
						<div class="clear space_1"></div>
						<label>Isi Berita 3: </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content3" rows="10">	</textarea>
						<div class="clear space_1"></div>
					</div>
					<br><br>
					
					<div id="contact-input">
						<label>Upload Foto : </label>
						<input type="file" name="userfile" class="upload" />
					</div>
					
					<div id="contact-input">
						<label>Caption Foto : </label>
						<?php 
							$data = array(
							'name'      => 'news_caption',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right txt_area',
							'style'		=>	'width: 100%',
							'value'		=> set_value('news_caption', ''),
							);
							echo form_textarea($data);
							echo form_error('caption', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>

					<div id="contact-input">						
						<label>Kata Kunci : </label>	
						<input name="tags" id="allowSpacesTags">					
					</div>				
										
					<div id="contact-input">
						<label>Rubrik Berita : </label>
						<?php 
							$arr=array();
							foreach($q_post_category->result() as $row):
								$arr[$row->news_cat_id]=$row->news_cat_title;
							endforeach;
							echo form_dropdown('post_category_id',$arr);
						?>
						<div class="clear"></div>
					</div>
					
					<div id="contact-input">
						<label>SubRubrik Berita : </label>
						<?php 
							$arr=array();
				
							foreach($q_post_subcategory->result() as $row):
							$arr[$row->news_subcat_id]=$row->news_subcat_name;
							endforeach;
							echo form_dropdown('post_subcategory_id',$arr);
						?>
						<div class="clear"></div>
					</div>
										
							
					<div id="contact-input">
						<label>Headline Rubrik: </label>
						<select name="news_hl_r" class="">
							<option value="0">Biasa</option>
							<option value="1">Headline</option>
						</select>
					</div>
										
					<div id="contact-input">
						<label>Waktu Tayang : </label>
						<link href="<?php echo base_url()?>assets/css/bootstrap_combined.min.css" rel="stylesheet">
						<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/css/bootstrap_datetimepicker.min.css">
						
						<div id="datetimepicker" class="input-append date">
							<?php $news_date_launch=date('Y-m-d H:i:s');?>
							<input data-format="yyyy-MM-dd HH:mm:ss PP" type="text" name="news_date_launch" value="<?php echo $news_date_launch?>"/>
							<span class="add-on">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
						
						<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
						<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap_datetimepicker.min.js"></script>
						<script type="text/javascript">
							$('#datetimepicker').datetimepicker({
								format: 'yyyy-MM-dd HH:mm:ss',
								 pick12HourFormat: true,
								 language: 'en'
							});
						</script>
					</div>
					
					<div id="contact-input">
						<input type="hidden" name="unique" value="0">
					</div>
										
					<div class="clear"></div>
					<?php 
						$data = array(
						'name'      => 'submit',
						'id'        => 'button',
						'class'		=> 'button small color',
						'value'		=> 'Submit',
						);
						echo form_submit($data); 
					?>	
				</form>

			</div>
		</div>
	</div>
  	
</div>