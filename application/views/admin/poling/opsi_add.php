<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
        <div class="blank-page-container">		
			<h5>Tambah Opsi Poling</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/poling/opsi_add_do" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Opsi : </label>
						<?php 
							$data = array(
							'name'      => 'vote_name',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', ''),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<input type="hidden" name="vote_vote_group_id" value="<?php echo $this->uri->segment(4)?>">
					
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