<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Tabel Poling</h5>
			<hr>
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/poling/add">Tambah Poling</a>
			<?php if($q_pol->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>Poling</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1?>
					<?php foreach($q_pol->result() as $row):?>
					<tr>
						<td><?php echo $i?></td>
						<td>
							<a href="<?php echo base_url()?>admin/poling/edit_selected/<?php echo $row->vote_group_id?>">
								<?php echo $row->vote_group_name?>
							</a>
						</td>
						
						<td>
							<a href="<?php echo base_url()?>admin/poling/edit_selected/<?php echo $row->vote_group_id?>">
								Edit 
							</a>
							<a href="<?php echo base_url()?>admin/poling/delete/<?php echo $row->vote_group_id?>"  onClick="return confirm('Apakah Anda yakin?');">
								Delete
							</a>
						</td>
					</tr>
					<?php $i++?>
					<?php endforeach;?>	
					
				</tbody>
			</table>
			
			<?php else:?>
				Maaf, Data Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/poling/add"> Tambah Poling</a>	
			<?php endif?>
			
		</div>
	</div>
</div>
