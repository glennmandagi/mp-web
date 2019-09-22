<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
        <div class="blank-page-container">		
			<h5>Edit User</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				
				<div id="message">
					<?php echo validation_errors(); ?>		
				</div>
				
				<form action="<?php echo base_url()?>admin/user/edit_do/<?php echo $this->uri->segment(4) ?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<?php foreach($q_user->result() as $row):?>
					<div id="contact-input">
						<label>Username : </label>
						<?php 
							$data = array(
							'name'      => 'username',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title',   $row->username),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					<input type="hidden" name="id" value="<?php echo $row->id?>">
					
				<script type="text/javascript" src="<?php echo base_url()?>jquery.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						/* The following code is executed once the DOM is loaded */
						
						/* This flag will prevent multiple comment submits: */
						var working = false;
						
						/* Listening for the submit event of the form: */
						$('#c_pass').click(function(e){
							
							e.preventDefault();
							if(working) return false;
							working = true;

							/* Sending the form fileds to submit.php: */
							$.post('<?php echo base_url()?>admin/user/c_pass',$(this).serialize(),function(msg){							
								working = false;
								$('#show_c_pass').html(msg);	
								$('#c_pass').hide();
								$('#cancel_c_pass').show();
								$('#show_c_pass').show();
							});					
						});
						
						/* Listening for the submit event of the form: */
						$('#cancel_c_pass').click(function(e){
							$('#c_pass').show();
							$('#show_c_pass').hide();
							$('#cancel_c_pass').hide();
						});
					});
				</script>
					
					<div id="contact-input">
						<div id="c_pass"><a href="#">Ubah Password</a></div>
						<div id="cancel_c_pass" style="display:none"><a href="#">Batal</a></div>
						<div class="celar"></div>
						<div id="show_c_pass"></div>
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
					<?php endforeach;?>
				</form>		
			</div>		
		</div>
		
	</div>
</div> 	