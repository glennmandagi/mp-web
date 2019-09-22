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
			
            <h5>Tambah Video</h5>
            <p class="subheader">
				Mengupload Video (Langkah 2)
			</p>
            <hr>
			
			<?php 
				$s4=$this->uri->segment(4);
				if($s4!=''):	
			?>

			<div class="clear"></div><br/><p/>
			<?php endif?>
			
			
            <!-- Contact page -->
            <div id="contact">
                <div id="message"></div>
              	<form action="<?php echo base_url()?>admin/video/add_thumb_do/<?php echo $s4?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					
					<input type="hidden" name="video_id" value="<?php echo $this->uri->segment(4)?>" />
					<div id="contact-inputs">
						<label>Isi Berita : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10">	</textarea>
						<div class="clear space_1"></div>
					</div>
					<br><br>
					
					
					<div id="contact-input">
						<label>Upload Foto : </label>
						<input type="file" name="video_image" class="upload" />
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