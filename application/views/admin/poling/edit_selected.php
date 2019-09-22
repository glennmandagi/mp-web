<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		<!-- Blank page -->
		<?php $vote_group_id=$this->uri->segment(4);?>
		<?php foreach($q_poling->result() as $row):?>
        <div class="blank-page-container">		
			<h5>Edit Poling</h5>
            <hr>
			<!-- Contact page -->
			<div id="contact">
				<div id="message"></div>
				<form action="<?php echo base_url()?>admin/poling/edit_do/<?php echo $vote_group_id?>" method="post"  enctype="multipart/form-data" accept-charset="utf-8" class="form-elements">	
					<div id="contact-input">
						<label>Judul Poling : </label>
						<?php 
							$data = array(
							'name'      => 'vote_group_name',
							'id'        => 'title',
							'class'		=> 'frm_txt_box3 fl_right',
							'value'		=> set_value('title', $row->vote_group_name),
							);
							echo form_input($data);
							echo form_error('news_subcat_title', '<div class="error-reg-form">', '</div>'); 
						?>
					</div>

					<input type="hidden" name="vote_group_id" value="<?php echo $row->vote_group_id?>" id="name" />			
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
		
		
		
		<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Tabel Opsi</h5>
			<hr>
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/poling/opsi_add/<?php echo $row->vote_group_id?>">Tambah Opsi</a>
			<?php if($q_pol->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>Opsi</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1?>
					<?php foreach($q_pol->result() as $row):?>
					<tr>
						<td><?php echo $i?></td>
						<td>
							<a href="<?php echo base_url()?>admin/poling/opsi_edit_selected/<?php echo $row->vote_id?>">
								<?php echo $row->vote_name?>
							</a>
						</td>
						
						<td>
							<a href="<?php echo base_url()?>admin/poling/opsi_edit_selected/<?php echo $row->vote_id?>">
								Edit 
							</a>
							<a href="<?php echo base_url()?>admin/poling/opsi_delete/<?php echo $row->vote_id?>"  onClick="return confirm('Apakah Anda yakin?');">
								Delete
							</a>
						</td>
					</tr>
					<?php $i++?>
					<?php endforeach;?>	
					
				</tbody>
			</table>
			
			<?php else:?>
				Maaf, Data Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/poling/opsi_add/<?php echo $row->vote_group_id?>"> Tambah opsi</a>	
			<?php endif?>
			
		</div>
		
		
	</div>
</div> 	