<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
        <div class="blank-page-container">		
			<h5>Add Rubrik</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/rubrik/add_do" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Rubrik : </label>
						<?php 
							$data = array(
							'name'      => 'news_cat_title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', ''),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
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