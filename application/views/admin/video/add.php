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
				Mengupload Video (Langkah 1)
			</p>
            <hr>
			
			<?php 
				$s4=$this->uri->segment(4);
				if($s4!=''):	
			?>
			<div class="sixteen columns bottom-2">
				<div class="alert alert-success">
					<h4>Success!</h4>
					Selamat Video Anda Berhasil tayang. <a target="_blank" href="<?php echo $video_url?>"> Lihat Video >> </a>
				</div>
			</div>
			<div class="clear"></div><br/><p/>
			<?php endif?>
			
			
            <!-- Contact page -->
            <div id="contact">
                <div id="message"></div>
              	<form action="<?php echo base_url()?>admin/video/add_do" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
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
					
				
					
					<div id="contact-input">
						<label>Upload Video : </label>
						<input type="file" name="video_video" class="upload" />
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
	</div>
  	
</div>