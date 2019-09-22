<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
		<?php $news_subcat_id=$this->uri->segment(4);?>
		<?php foreach($q_news->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit Subrubrik</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/subrubrik/edit_do/<?php echo $news_subcat_id?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Subrubrik : </label>
						<?php 
							$data = array(
							'name'      => 'news_subcat_title',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->news_subcat_name),
							);
							echo form_input($data);
							echo form_error('news_subcat_title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					<div id="contact-input">
						<label>Alamat URL : </label>
						<?php 
							$data = array(
							'name'      => 'news_subcat_url',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('news_subcat_url', $row->news_subcat_url),
							);
							echo form_input($data);
							echo form_error('news_subcat_url', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>
					
					
					<div id="contact-input">
						<label>Rubrik :</label>
						<?php 
							$arr=array();
							foreach($q_news_category->result() as $rowx):
								$arr[$rowx->news_cat_id]=$rowx->news_cat_title;
							endforeach;
							echo form_dropdown('news_subcat_news_cat_id', $arr, $row->news_subcat_news_cat_id);
						?>
						<div class="clear"></div>
					</div>
					
					
					
					<input type="hidden" name="news_subcat_id" value="<?php echo $row->news_subcat_id?>" id="name" />			
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