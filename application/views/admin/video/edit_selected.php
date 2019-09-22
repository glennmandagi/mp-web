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
		<?php foreach($q_video->result() as $row):?>
        <div class="blank-page-container">
			
            <h5>Edit Video</h5>
            <p class="subheader">
				<a href="<?php  echo base_url() .'video/watch/' . $row->video_id?>" target="_blank">Lihat Video >></a>
			</p>
            <hr>
			
			<?php 
				$video_id=$s4=$this->uri->segment(4);	
			?>

            <!-- Contact page -->
			
            <div id="contact">
                <div id="message"></div>
              	<form action="<?php echo base_url()?>admin/video/edit_do2/<?php echo $video_id?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul : </label>
						<?php 
							$data = array(
							'name'      => 'title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->video_title),
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
							'value'		=> set_value('subtitle', $row->video_subtitle),
							);
							echo form_input($data);
							echo form_error('subtitle', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>

					<div id="contact-input">
						<label>Upload Video : </label><br>
						<input type="file" name="video_video" class="upload" />
					</div>
					
					<div id="contact-input">						
						<label>Ganti Thumbnail : </label><br>
						<a href="<?php echo base_url() .'admin/video/edit_thumb/' . $video_id?>" target="_blank">
						<img width="150px;" src="<?php echo base_url()?>assets/video/thumb/<?php echo $row->video_image?>">
						</a>
						<br>					
					</div>

					
					
					<input type="hidden" name="video_id" value="<?php echo $this->uri->segment(4)?>" />
					
					<div id="contact-inputs">
						<label>Isi Berita : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10">	
						<?php echo $row->video_content?>	
						</textarea>
						<div class="clear space_1"></div>
					</div>
					<br><br>				
				

					<div id="contact-input">						
						<label>Kata Kunci : </label>	
						<input name="tags" id="allowSpacesTags" value="<?php echo $row->video_keyword?>">					
					</div>				
										
					<div id="contact-input">
						<label>Rubrik Berita : </label>
						<?php 
							$arr=array();
							foreach($q_post_category->result() as $rowz):
								$arr[$rowz->news_cat_id]=$rowz->news_cat_title;
							endforeach;
							echo form_dropdown('post_category_id',$arr, $row->video_cat_id);
						?>
						<div class="clear"></div>
					</div>
					
					<div id="contact-input">
						<label>SubRubrik Berita : </label>
						<?php 
							$arr=array();
							foreach($q_post_subcategory->result() as $rowx):
							$arr[$rowx->news_subcat_id]=$rowx->news_subcat_name;
							endforeach;
							echo form_dropdown('post_subcategory_id',$arr, $row->video_subcat_id);
						?>
						<div class="clear"></div>
					</div>
		
					<div class="clear"></div>
					<?php 
						$data = array(
						'name'      => 'submit',
						'id'        => 'button',
						'class'		=> 'button small color',
						'value'		=> 'Next',
						);
						echo form_submit($data); 
					?>	
				</form>

			</div>
		</div>
		<?php endforeach?>
	</div>
</div>