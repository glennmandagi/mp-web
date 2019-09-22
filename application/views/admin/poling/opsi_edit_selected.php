<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
		<?php $vote_id=$this->uri->segment(4);?>
		<?php foreach($q_poling->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit Opsi Poling</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/poling/opsi_edit_do/<?php echo $vote_id?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Poling : </label>
						<?php 
							$data = array(
							'name'      => 'vote_name',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->vote_name),
							);
							echo form_input($data);
							echo form_error('news_subcat_title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>		
					<input type="hidden" name="vote_id" value="<?php echo $row->vote_id?>" id="name" />	
					<input type="hidden" name="vote_vote_group_id" value="<?php echo $row->vote_vote_group_id?>" id="name" />	
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