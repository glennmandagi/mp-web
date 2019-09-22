<div class="container">
  	<!-- Primary left -->
    <div id="primary-fullwidth">
    	<!-- Blank page -->
        <div class="blank-page-container">
			<h5>Berita</h5>
			<hr>
			<a class="button small color" id="button" href="<?php echo base_url()?>admin/news/add">Tambah Berita</a>
			<?php if($q_news->num_rows()>0):?>
			<table>
				<thead>
					<tr>
						<th>No.</th>
						<th>Judul</th>
						<th>Tanggal Input</th>
						<th>Tanggal Tayang</th>						
						<th>Rubrik</th>
						<th>SubRubrik</th>
						<th>HL Rubrik</th>
						<th>View</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=$offset?>
					<?php foreach($q_news->result() as $row):?>
						<tr>
							<td><?php echo $i?></td>
							<td>
								<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $row->news_id?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</td>
							<td>
								<?php	
									echo '<div style="color:black">' . $this->custom->date_changer($row->news_date,1) . '</div>';
								?>									
							</td>
							<td>
								<?php
								if($row->news_date_launch>date('Y-m-d H:i:s')):
									echo '<div style="color:red">' . $this->custom->date_changer($row->news_date_launch,1) . '</div>';
								else:
									echo '<div style="color:black">' . $this->custom->date_changer($row->news_date_launch,1) . '</div>';
								endif;
								?>
									
							</td>												
							<td><?php echo $row->news_cat_title?></td>
							<td><?php echo $row->news_subcat_name?></td>
							<td><?php echo $this->custom->get_hlr($row->news_hl_r)?></td>
							<td><?php echo $row->news_visit?></td>
							<td>
								<?php if($this->custom->ifsuper()):?>
								<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $row->news_id?>">
									Edit 
								</a>
								<a href="<?php echo base_url()?>admin/news/delete/<?php echo $row->news_id?>" onClick="return confirm('Apakah Anda yakin?');">
									Delete
								</a>
								<?php endif?>
							</td>
						</tr>
						<?php $i++;?>
					<?php endforeach;?>		
				</tbody>
			</table>
			<div class="pagination"><ul><?php echo $pagination?></ul></div>
			<?php else:?>
				Maaf, Berita Anda Masih Kosong, Silahkan <a href="<?php echo base_url()?>admin/news/add"> Tambah Berita</a>			
			<?php endif?>	
		</div>
	</div>
</div>
