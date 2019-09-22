<!-- Content -->
<section id="content">
	<section id="content">	
<div class="container">					
		<div class="column" style="margin:0 0 10px 6px">	
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Manado Post Online -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9528794433985327"
     data-ad-slot="6662265491"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>	
</p>
<div class="container">
		
		
		<div class="breadcrumbs column">
			<p>
				<a href="<?php echo base_url()?>">Home</a>   /
				<?php if(isset($subcat)):?>
				<a href="<?php echo base_url()?>berita/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  /  
				<?php endif?>
				<a href="<?php echo current_url(); ?>"><?php echo $title?></a>
			</p>
		</div>
		
		<div class="main-content">
			<div class="column-two-third">			
				<h5 class="line">		
					<span><a href="<?php echo current_url(); ?>"><?php echo $title?></a></span>	
				</h5>	
				<div class="outerwide" >	
					<ul class="wnews" id="carousel2">	
						<?php foreach($q_news->result() as $row):?>
							<?php $hl_r=0?>
							<?php if($row->news_hl_r==1):?>
								<?php $hl_r=$row->news_id;?>
								<li>
									<img class="homeThumb2" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
									<h6 class="regular">	
										<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
											<?php echo $row->news_title?>	
										</a>	
									</h6>
									<p><?php echo $this->custom->trim($row->news_content, 35)?></p>	
								</li>
							<?php 
							break;
							endif;?>
						<?php endforeach?>
					</ul>
				</div>

				<div class="outerwide">
					<ul class="block2">					
						<?php foreach($q_news->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
								<li>	
									<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">		
									<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />	
									</a>	
									<p>	
										<span><?php echo $this->custom->date_changer($row->news_date_launch,1)?></span>		
										<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
											<?php echo $row->news_title?>
										</a>	
									</p>								
								</li>	
							<?php endif;?>
						<?php endforeach?>	
					</ul>		
				</div>
				
				<div class="pager">
					<?php echo $pagination?>
				</div>
			</div>	
			<!-- /World News -->
	
	
			
		</div>
		<!-- /Main Content -->
		
		<?php $this->load->view('widget/sidebar2')?>
		
	</div>    
</section>
<!-- / Content -->			