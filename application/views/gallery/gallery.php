<div class="row-fluid">
	<div id="main" class="portofolio">
		
		<div class="breadcrumb clearfix">
			<span class="base">You are here</span>
			<p>
				<a href="<?=base_url()?>">Home</a>
				&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?=current_url(); ?>"><?=$title?></a>
			</p>
		</div> <!-- End Breadcrumb -->
		
		<div class="row-fluid margin-top40">

			
			<div class="portofolio-items">
				<?foreach($q_gal->result() as $row):?>	
					<div class="span3 item web-design wordpress"> <!-- One -->
						<figure class="figure-overlay">
							<a href="<?=base_url()?>gallery/detil/<?=$row->gallery_h_id?>/<?=$row->gallery_h_url?>" class="" title="View more detail about this project"> 
						
							<img src="<?=base_url()?>assets/images/gallery/thumb/<?=$row->gallery_image?>" alt=""  />
							<div><p><?=$row->gallery_title?> <i>Galeri Foto</i></p></div>
							</a>
						</figure>
						<p>
						<a href="<?=base_url()?>gallery/detil/<?=$row->gallery_h_id?>/<?=$row->gallery_h_url?>" class=""><?=$row->gallery_title?></a>
						<i>Web Design, Wordpress</i></p>
					</div>			
				<?endforeach?>			
								
			</div> <!-- End Portofolio-Items -->
			
				<nav class="nav-pagination">
			<?=$pagination?>
			
			</nav> <!-- End Nav-Pagination -->
			
			
		</div> <!-- End Row-Fluid -->
	</div> <!-- End Main -->
	
</div> <!-- End Row-Fluid -->

