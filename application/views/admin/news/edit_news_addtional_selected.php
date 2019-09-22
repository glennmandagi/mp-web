<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
		<?php foreach($q_news_additional2->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit News</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/news/news_addtional_edit_do" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-inputs">
						<label>Content : </label>
						<textarea class="ckeditor frm_txt_area" cols="80" id="editor1" name="content" rows="10"><?php echo $row->news_add_content?></textarea>
						<div class="clear space_1"></div><br><br>
					</div>
					<input type="hidden" name="news_add_news_id" value="<?php echo $row->news_add_news_id?>" id="name" />
					<input type="hidden" name="news_add_id" value="<?php echo $row->news_add_id?>" id="name" />

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
		<?php endforeach?>
	</div>
</div> 	