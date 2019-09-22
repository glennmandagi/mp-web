<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
	
        <div class="blank-page-container">		
			<h5>Add News</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/news/news_addtional_add_do" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-inputs">
						<label>Content : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content<?php echo $this->uri->segment(5)?>" rows="10"></textarea>
						<div class="clear space_1"></div><br><br>
					</div>
					<input type="hidden" name="news_add_news_id" value="<?php echo $this->uri->segment(4)?>" id="name" />
					<input type="hidden" name="news_add_index" value="<?php echo $this->uri->segment(5)?>" id="name" />
					

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