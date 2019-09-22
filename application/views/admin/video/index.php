<div class="container">
  	<!-- Primary left -->
    <div id="primary-fullwidth">
    	<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Video</h5>
			<hr>
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/video/add">Tambah Video</a>
			<?php if($q_video->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>Judul</th>
						<th>Tanggal</th>						
						<th>Rubrik</th>
						<th>SubRubrik</th>

						<th>View</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($q_video->result() as $row):?>
					<tr>
						<td>
							<a href="<?php echo base_url()?>admin/video/edit_selected/<?php echo $row->video_id?>">
								<?php echo $row->video_title?>
							</a>
						</td>
						<td><?php echo $row->video_date?></td>												
						<td><?php echo $row->news_cat_title?></td>
						<td><?php echo $row->news_subcat_name?></td>
	
						<td><?php echo $row->video_visit?></td>
						<td>
							<a href="<?php echo base_url()?>admin/video/edit_selected/<?php echo $row->video_id?>">
								Edit 
							</a>
							<a href="<?php echo base_url()?>admin/video/delete/<?php echo $row->video_id?>" onClick="return confirm('Apakah Anda yakin?');">
								Delete
							</a>
						</td>
					</tr>
					<?php endforeach;?>		
				</tbody>
			</table>
			<div class="pagination"><ul><?php echo $pagination?></ul></div>
			<?php else:?>
			Maaf, Berita Anda Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/video/add"> Tambah Berita</a>
			
			<?php endif?>
			
		</div>
	</div>
</div>
