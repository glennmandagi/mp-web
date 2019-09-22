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
		<?php $news_id=$this->uri->segment(4);?>
		<?php foreach($q_news->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit News</h5>
            <p class="subheader">
				
				<a href="<?php  echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>" target="_blank">Lihat Berita >></a>
			</p>
            <hr>

			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/news/edit_do/<?php echo $news_id?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Title : </label>
						<?php 
							$data = array(
							'name'      => 'title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->news_title),
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
							'value'		=> set_value('subtitle', $row->news_subtitle),
							);
							echo form_input($data);
							echo form_error('subtitle', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-inputs">
						<label>Content : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10"><?php echo $row->news_content?></textarea>
						<div class="clear space_1"></div><br><br>
					</div>
					
					<div id="contact-inputs">
					<?php
					foreach($q_news_additional_num->result() as $row2):
						echo '<a href="'. base_url() .'admin/news/news_addtional_edit/'. $row2->news_add_id .'"> Edit Halaman '.$row2->news_add_index.'</a>';
						echo '<a href="'. base_url() .'admin/news/news_addtional_delete/'. $row2->news_add_id .'"> Delete</a> <br>';
					endforeach;
						$num = $q_news_additional_num->num_rows();
						$num = $num + 2;
						echo '<a href="'. base_url() .'admin/news/news_addtional_add/'. $row->news_id .'/' . $num . '"> Tambah Halaman </a>';
					?>
					</div>
					
					<div id="contact-input">						
						<label>Upload File : </label>
						<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>"><br><br>
						<input type="file" name="userfile" class="upload" value="<?php echo $row->news_image?>" />
					</div>
					<input type="hidden" name="old_image" value="<?php echo $row->news_image?>" id="name" />

					<div id="contact-input">
						<label>Caption Foto : </label>
						<?php 
							$data = array(
							'name'      => 'news_caption',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right txt_area',
							'style'		=>	'width: 100%',
							'value'		=> set_value('news_caption', $row->news_caption),
							);
							echo form_textarea($data);
							echo form_error('caption', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-input">
						<label>Rubrik Berita : </label>
						<?php 
							$arrz=array();
							foreach($q_post_category->result() as $rowz):
								$arrz[$rowz->news_cat_id]=$rowz->news_cat_title;
							endforeach;
							echo form_dropdown('post_category_id',$arrz, $row->news_cat_id);
						?>
						<div class="clear"></div>
					</div>
					
					<div id="contact-input">
						<label>Sub Rubrik :</label>
						<?php 
							$arr=array();
							foreach($q_post_subcategory->result() as $rowx):
							$arr[$rowx->news_subcat_id]=$rowx->news_subcat_name;
							endforeach;
							echo form_dropdown('post_subcategory_id', $arr, $row->news_subcat_id);
						?>
						<div class="clear"></div>
					</div>
					
					
					<div id="contact-input">						
						<label>Kata Kunci : </label>	
						<input name="tags" id="allowSpacesTags" value="<?php echo $row->news_keyword?>">					
					</div>
					
					
					
					<div id="contact-input">
						<?php $news_hl_r=$row->news_hl_r;?>
						<label>Headline Rubrik: </label>
						<select name="news_hl_r" class="">
							<option value="0"  <?php if($news_hl_r==0):?> selected="selected" <?php endif?> >Biasa</option>
							<option value="1"  <?php if($news_hl_r==1):?> selected="selected" <?php endif?> >Headline</option>
						</select>
					</div>
					
					<div id="contact-input">
						<label>Waktu Tayang : </label>
						<link href="<?php echo base_url()?>assets/css/bootstrap_combined.min.css" rel="stylesheet">
						<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/css/bootstrap_datetimepicker.min.css">
						
						<div id="datetimepicker" class="input-append date">
							<?php $news_date_launch=$row->news_date_launch;?>
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
					<input type="hidden" name="name" value="<?php echo $row->news_id?>" id="name" />

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
		<?php endforeach?>
	</div>
</div> 	