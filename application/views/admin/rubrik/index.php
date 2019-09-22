<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Tabel Rubrik</h5>
			<hr>
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/rubrik/add">Tambah Rubrik</a>
			
			<?php if($q_news->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>Rubrik</th>
						<th>Alamat URL</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1?>
					<?php foreach($q_news->result() as $row):?>
					<tr>
						<td><?php echo $i?></td>
						<td>
							<a href="<?php echo base_url()?>admin/rubrik/edit_selected/<?php echo $row->news_cat_id?>">
								<?php echo $row->news_cat_title?>
							</a>
						</td>
						<td><?php echo $row->news_cat_url?></td>
						<td>
							<a href="<?php echo base_url()?>admin/rubrik/edit_selected/<?php echo $row->news_cat_id?>">
								Edit 
							</a>
							<a href="<?php echo base_url()?>admin/rubrik/delete/<?php echo $row->news_cat_id?>"  onClick="return confirm('Apakah Anda yakin?');">
								Delete
							</a>
						</td>
					</tr>
					<?php $i++?>
					<?php endforeach;?>	
					
				</tbody>
			</table>
			<div class="pagination"><ul><?php echo $pagination?></ul></div>
			<?php else:?>
			Maaf, Data Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/rubrik/add"> Tambah Data</a>
			
			<?php endif?>
			
		</div>
	</div>
</div>
