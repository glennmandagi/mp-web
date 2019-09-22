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