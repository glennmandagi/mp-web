<div class="container clearfix">
    <div class="sixteen columns">
		<h1 class="page-title"><a href="<?=base_url()?>admin/gallery/add_h">Add Gallery</a></h1>
	</div>
    <!-- Page Title -->
    
    <div class="shortcodes"> 
		<div class="sixteen columns bottom-2">
			<?foreach($q_gal->result() as $row):?>
			<div style="float:left;height:50px">
				<a href="<?=base_url()?>admin/gallery/index_2/<?=$row->gallery_h_id?>">
				<img style="height:50px" src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>">
				</a>
				
			</div>
			
			<?endforeach?>
			
			<br>
			<div class="clearfix"></div>
			
		</div>
	</div>
</div>