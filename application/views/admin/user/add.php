<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
        <div class="blank-page-container">		
			<h5>Tambah User</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
			
				<?php if(validation_errors()!=''): ?>
				<div id="message">
					<?php echo validation_errors(); ?>		
				</div>
				<?php endif;?>
				
				<form action="<?php echo base_url()?>admin/user/add_do" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Username : </label>
						<?php 
							$data = array(
							'name'      => 'username',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('username', ''),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					<div id="contact-input">
					<label>Password : </label>
						<?php 
							$data = array(
							'name'      => 'password',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'style'		=> 'width:100%',
							'value'		=> set_value('password', ''),
							);
							echo form_password($data);
							echo form_error('password', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-input">
						<label>Tipe Admin: </label>
						<select name="user_type" class="">
							<option value="1">Admin</option>
							<option value="2">Editor</option>
						</select>
					</div>
					
					<br>
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