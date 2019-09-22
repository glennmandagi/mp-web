<div class="container clearfix">
    <div class="sixteen columns">
		<h1 class="page-title">Edit Photos</h1>
		<h2 class="page-title"><a href="<?=base_url()?>admin/gallery/add/<?=$gallery_h_id?>">Add Photos</a></h2>
	</div>
    <!-- Page Title -->
    
    <div class="shortcodes"> 
		<div class="sixteen columns bottom-2">
			
			
			
			<?foreach($q_gal->result() as $row):?>
			<div style="float:left;">
				<a href="<?=base_url()?>admin/gallery/edit/<?=$row->gallery_id?>">
				<img style="height:150px" src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>">
				</a>
				
			</div>
			
			<?endforeach?>
			
			<br>
			<div class="clearfix"></div>
			<p></p>
			<br>
			<div class="clearfix"></div>
			
		</div>
	</div>
</div>