<!-- Content -->
<section id="content">
	<div class="container">
		<!-- Main Content -->
		
		<div align="center" style="margin: 0 0 10px 0">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-9528794433985327", enable_page_level_ads: true }); </script>		</div>
		
		<div class="breadcrumbs column">
			<p>
				<a href="<?php echo base_url()?>m">Home</a>   /
				<?php if(isset($subcat)):?>
				<a href="<?php echo base_url()?>berita/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  /  
				<?php endif?>
				<a href="<?php echo current_url(); ?>"><?php echo $title?></a>
			</p>
		</div>
		
		<div class="main-content">
			
			<!-- Popular News -->
			<div class="column-two-third">
				
				<div class="outerwide">
					<ul class="block2">
						<?php foreach($q_news->result() as $row ):?>
						<li>
							<a href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
								<img class="imgWidthFix" src="<?php echo  base_url() . 'assets/images/news/thumb/' . $row->news_image?>" alt="MyPassion" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->nicetime($row->news_date_launch,2)?></span>
								<a href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
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
			<!-- /Popular News -->
			
		</div>
		<!-- /Main Content -->
		
		<?php $this->load->view('m/widget/sidebar')?>
		
	</div>    
</section>
<!-- / Content -->			