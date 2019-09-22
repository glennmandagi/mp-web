<!-- /Hot News -->

			<!-- World News -->			
			<div class="column-two-third">			
				<h5 class="line">					
					<span>Berita Foto</span>					
					<div class="navbar">					
						<a id="next2" class="next" href="#"><span></span></a>							
						<a id="prev2" class="prev" href="#"><span></span></a>						
					</div>					
				</h5>

				<div class="outerwide" >					
					<ul class="wnews" id="carousel2">						
						<?php foreach(array_slice($q_news_tou->result(), 0, 4) as $row):?>							
						<li>							
							<img class="homeThumb2" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							
							<h6 class="regular">
								
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								
								<?php echo $row->news_title?>
								
								</a>
								
							</h6>
							
							<p><?php echo $this->custom->trim($row->news_content, 35)?></p>
							
						</li>
						
						<?php endforeach?>
						
					</ul>
					
				</div>
				
				
				
				<div class="outerwide">
					
					<ul class="block2">					
						
						<?php foreach(array_slice($q_news_tou->result(), 4, 4) as $row):?>					
						
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
						
						<?php endforeach?>
						
					</ul>
					
				</div>
				
			</div>			
			<!-- /World News -->