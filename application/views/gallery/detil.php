<div class="row-fluid">
	<div id="main" class="portofolio">
		
		<div class="breadcrumb clearfix">
			<span class="base">You are here</span>
			
			<p>
				<a href="<?=base_url()?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;
				<a href="<?=base_url()?><?=$page?>" title="<?=$category?>"><?=$category?></a> 
				
				&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?=current_url(); ?>"><?=$title?></a>
			</p>
			
		</div> <!-- End Breadcrumb -->
		
		<div class="row-fluid margin-top40">
			
			
			
	
			
			
			
			<div class="portofolio-items">
				
				
				
				
				<?foreach($q_gal->result() as $row):?>	
				<div class="span3 item web-design wordpress"> <!-- One -->
					<figure class="figure-overlay">
						
						
						<a href="<?=base_url()?>assets/images/gallery/<?=$row->gallery_image?>" data-rel="prettyPhoto[sliderGallery]"><img src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>" alt="Screenshoot 1" /></a>
						<!--
						<a href="<?=base_url()?>assets/images/gallery/<?=$row->gallery_image?>" class="" title="View more detail about this project"> 
						
						<img src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>" alt=""  />
						<div><p><?=$row->gallery_name?> <i>Galeri Foto</i></p></div>
						</a>-->
					</figure>
					<p>
						<a href="<?=base_url()?>assets/images/gallery/<?=$row->gallery_image?>" class=""><?=$row->gallery_name?></a>
					<i>Web Design, Wordpress</i></p>
				</div>			
				<?endforeach?>			
				
				
				
			</div> <!-- End Portofolio-Items -->
			
		</div> <!-- End Row-Fluid -->
	</div> <!-- End Main -->
	
</div> <!-- End Row-Fluid -->

