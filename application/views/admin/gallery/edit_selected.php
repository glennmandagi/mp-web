<div class="container clearfix">
    <div class="sixteen columns">
		<h1 class="page-title">Edit Gallery</h1>
    </div>
    <!-- Page Title -->
    <?$gallery_id=$this->uri->segment(4);?>
	<?foreach($q_gal->result() as $row):?>
    <div class="shortcodes"> 
		<div class="sixteen columns bottom-2">
			<form action="<?=base_url()?>admin/gallery/edit_do/<?=$gallery_id?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-elements">	
				<fieldset>
					<label>Title : </label>
					<?
					$data = array(
						'name'      => 'title',
						'id'        => 'title',
						'class'		=> 'frm_txt_box3 fl_right',
						'value'		=> set_value('title', $row->gallery_name),
					);
					echo form_input($data);
					echo form_error('title', '<div class="error-reg-form">', '</div>'); 
					?>
				</fieldset>
				
				<fieldset>
					<label>Content : </label><br><br>
					<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10"><?=$row->gallery_desc?></textarea>
				</fieldset>
				
				<fieldset>
				<label>Upload File : </label><br><br>
				<img src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>"><br><br>
				<input type="file" name="userfile" class="upload" value="<?=$row->gallery_image?>" />
				</fieldset>
				<input type="hidden" name="old_image" value="<?=$row->gallery_image?>" id="name" />
	
				
				<fieldset>
					<label>Source : </label>
					<?
					$data = array(
						'name'      => 'source',
						'id'        => 'username',
						'class'		=> 'frm_txt_box3',
						'value'		=> set_value('username', $row->gallery_source),
					);
					echo form_input($data);
					echo form_error('username', '<div class="error-reg-form">', '</div>'); 
					?>
				</fieldset>
					
	

				<input type="hidden" name="name" value="<?=$row->gallery_id?>" id="name" />
				
				<div class="clear"></div>
				<?
					$data = array(
					'name'      => 'submit',
					'id'        => 'submit',
					'class'		=> 'submit button small color',
					'value'		=> 'Submit',
					);
					echo form_submit($data); 
				?>			
			</form>
		</div>
    </div>
	<?endforeach?>
    <!-- End shortcodes -->    
</div>



