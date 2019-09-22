<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Tabel User</h5>
			<hr>		
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/user/add">Tambah User</a>
		
			<?php if($q_user->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1?>
					<?php foreach($q_user->result() as $row):?>
					<tr>
						<td><?php echo $i?></td>
						<td>
							<a href="<?php echo base_url()?>admin/user/edit_selected/<?php echo $row->id?>">
								<?php echo $row->username?>
							</a>
						</td>
						<td>
							<a href="<?php echo base_url()?>admin/user/edit_selected/<?php echo $row->id?>">
								Edit 
							</a>
							<?php if($row->id!=1):?>
							<a href="<?php echo base_url()?>admin/user/delete/<?php echo $row->id?>"  onClick="return confirm('Apakah Anda yakin?');">
								Delete
							</a>
							<?php endif;?>
						</td>
					</tr>
					<?php $i++?>
					<?php endforeach;?>	
					
				</tbody>
			</table>
			<?php else:?>
			Maaf, Data Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/user/add"> Tambah Data</a>
			
			<?php endif?>
			
		</div>
	</div>
</div>
