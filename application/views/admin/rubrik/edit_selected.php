<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
		<?php $news_cat_id=$this->uri->segment(4);?>
		<?php foreach($q_news->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit Rubrik</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/rubrik/edit_do/<?php echo $news_cat_id?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Rubrik : </label>
						<?php 
							$data = array(
							'name'      => 'news_cat_title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->news_cat_title),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-input">
						<label>Alamat URL : </label>
						<?php 
							$data = array(
							'name'      => 'news_cat_url',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->news_cat_url),
							);
							echo form_input($data);
							echo form_error('title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<input type="hidden" name="news_cat_id" value="<?php echo $row->news_cat_id?>" id="name" />			
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