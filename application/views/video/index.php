<!-- Content -->
<section id="content">
	<div class="container">
		<!-- Main Content -->
		
		<div align="center" style="margin: 0 0 10px 0">
			<img src="<?php echo base_url()?>assets2/img/iklan/A1.jpg">
		</div>
		
		<div class="breadcrumbs column">
			<p>
				<a href="<?=base_url()?>">Home</a>   /
				
				<a href="<?=base_url()?>video" title="video">Video</a>  /  
				<a href="<?=current_url(); ?>"><?=$title?></a>
			</p>
		</div>
		
		<div class="main-content">
			
			<!-- Popular video -->
			<div class="column-two-third">
				
				<div class="outerwide">
					<ul class="block2">
						<?foreach($q_vid->result() as $row ):?>
						<li>
							<a href="<?php echo base_url() .'video/watch/' . $row->video_id?>">
								<img class="imgWidthFix" src="<?php echo base_url() . 'assets/video/thumb/' . $row->video_image?>" alt="MyPassion" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->nicetime($row->video_date,2)?></span>
								<a href="<?php echo $this->custom->time_url_v($row->video_date, $row->video_url, $row->video_id)?>">
									<?php echo $row->video_title?>
								</a>
							</p>
							
						</li>
						<?php endforeach?>
						
						
					</ul>
				</div>
				
				<div class="pager">
					<?php echo $pagination?>
				</div>
				
			</div>
			<!-- /Popular video -->
			
		</div>
		<!-- /Main Content -->
		
		<?php $this->load->view('widget/sidebar2')?>
		
	</div>    
</section>
<!-- / Content -->			