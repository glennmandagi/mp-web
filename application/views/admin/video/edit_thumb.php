
<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
			
            <h5>Edit Video Thumbnail</h5>
            <p class="subheader">
				
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
              	<form action="<?php echo base_url()?>admin/video/edit_thumb_do/<?php echo $s4?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					
					<input type="hidden" name="video_id" value="<?php echo $this->uri->segment(4)?>" />

					<div id="contact-input">
						<label>Upload Foto : </label>
						<input type="file" name="video_image" class="upload" />
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