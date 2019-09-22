




<div class="main-slider column-two-third" style="position: relative">
	
	
	<!-- Place somewhere in the <body> of your page -->
	<div id="slider_2" class="flexslider">
		<ul class="slides">
			
			<?php foreach($q_hl->result() as $row):?>
			<li>
				<img src="<?php echo base_url()?>assets/images/news/<?php echo $row->news_image?>" />
				<p class="flex-caption"><a href="#"><?php echo $row->news_title?></a> 
					<?php echo $this->custom->trim($row->news_content, 21)?>
				</p>
			</li>
			<?endforeach?>
			
			<!-- items mirrored twice, total of 12 -->
		</ul>
	</div>
	<div id="carousel_1" class="flexsliderx">
		<ul class="slides">
			<?php foreach($q_hl->result() as $row):?>
			<li>
				<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" />
			</li>
			<?endforeach?>
			<!-- items mirrored twice, total of 12 -->
		</ul>
	</div>
	
	
	
</div>