<div class="container clearfix">
    <div class="sixteen columns">
		<h1 class="page-title">Add Gallery Head</h1>
    </div>
    <!-- Page Title -->
    
    <div class="shortcodes"> 
		<div class="sixteen columns bottom-2">
			<form action="<?=base_url()?>admin/gallery/add_h_do" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
				<fieldset>
					<label>Tittle : </label>
					<?
					$data = array(
						'name'      => 'title',
						'id'        => 'title',
						'class'		=> 'frm_txt_box3 fl_right',
						'value'		=> set_value('title', ''),
					);
					echo form_input($data);
					echo form_error('title', '<div class="error-reg-form">', '</div>'); 
					?>
				</fieldset>
				
				<fieldset>
					<label>Content : </label><br><br>
					<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10">	</textarea>
					<div class="clear space_1"></div>
				</fieldset>
				
				<fieldset>
					<label>Upload File : </label>
					<input type="file" name="userfile" class="upload" />
				</fieldset>
				
				<fieldset>
					<label>Source : </label>
					<?
					$data = array(
						'name'      => 'source',
						'id'        => 'username',
						'class'		=> 'frm_txt_box3',
						'value'		=> set_value('username', ''),
					);
					echo form_input($data);
					echo form_error('username', '<div class="error-reg-form">', '</div>'); 
					?>
				</fieldset>								
				<div class="clear"></div>
				
				<?
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
    <!-- End shortcodes -->    
	
</div>



