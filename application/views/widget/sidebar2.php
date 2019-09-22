<!-- Left Sidebar -->
		<div class="column-one-third">	
			<div class="sidebar">
				<h5 class="line"><span>Liputan Khusus</span></h5>
				<ul class="ads125">
					<?php foreach($q_news_lipsus->result() as $row):?>
					<li>
						<a href="#">
							<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="MyPassion" />												
						</a>
						<a class="subTitleS" href="<?php  echo $this->custom->time_url($row->news_date_launch, $row->news_url, $row->news_id)?>">
							<?php echo $row->news_subtitle?>
						</a>
						<a class="title" href="<?php  echo $this->custom->time_url($row->news_date_launch, $row->news_url, $row->news_id)?>">
							<?php echo $row->news_title?>
						</a>
					</li>										
					<?php endforeach?>
				</ul>
			</div>
			
			<div class="sidebar">
				<div id="tabs">
					<ul>
						<li><a href="#tabs1">TERPOPULER</a></li>
						<li><a href="#tabs2">TERBARU</a></li>
					</ul>
					<div id="tabs1">
						<ul>
							<?php foreach($q_popular->result() as $row):?>
							<li>
								<a class="title" href="<?php  echo $this->custom->time_url($row->news_date_launch, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
								</a>
								<span class="meta"><?php echo $this->custom->date_changer($row->news_date_launch,1)?></span>                                     
							</li>
							<?php endforeach?>
						</ul>
					</div>
					<div id="tabs2">
						<ul>
							<?php foreach($q_latest->result() as $row):?>
							<li>
								<a class="title" href="<?php  echo $this->custom->time_url($row->news_date_launch, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
								</a>
								<span class="meta"><?php echo $this->custom->nicetime($row->news_date_launch)?></span>                                     
							</li>
							<?php endforeach?>
						</ul>
					</div>									
				</div>
			</div>
			
			<div class="sidebar">
				<h5 class="line"><span>ePaper Manado Post</span></h5>
			
                             	<a href="http://manadopostdigital.com/" target="_blank"><img src="https://manadopostonline.com/iklan/logo_manadopost.jpg" width="300px" height="300px" alt="ePaper Manado Post" /></a> <br><br>

                              
                            
			</div>
			<!--
			<div class="sidebar">
				<h5 class="line"><span><a href="<?php echo base_url()?>video">Video</a></span></h5>
				<?php foreach($q_video->result() as $row):?>																			
					<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="400" height="315">
						<param name="movie" value="<?php echo base_url()?>assets2/plugin/video/player-licensed.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="allowscriptaccess" value="always" />
						<param name="flashvars" value="file=<?php echo base_url()?>assets/video/<?php echo $row->video_video?>&image=<?php echo base_url()?>assets/video/thumb/<?php echo $row->video_image?>" />
						<embed
						type="application/x-shockwave-flash"
						id="player2"
						name="player2"
						src="<?php echo base_url()?>assets2/plugin/video/player-licensed.swf" 
						width="300" 	
						allowscriptaccess="always" 
						allowfullscreen="true"
						flashvars="file=<?php echo base_url()?>assets/video/<?php echo $row->video_video?>&image=<?php echo base_url()?>assets/video/thumb/<?php echo $row->video_image?>" 
						/>
					</object>
					<span class="meta"><?php echo $this->custom->date_changer($row->video_date,1)?></span> 
					<h6>
					<a href="<?php echo base_url() .'video/watch/'.$row->video_id?>">
						<?php echo $row->video_title?>
					</a>
					</h6>
				<?php endforeach?>
			</div>
			-->
	
			
			


			<!-- END OF THE PLAYER EMBEDDING -->

			
			
			<div class="sidebar">
				<h5 class="line"><span>Ads Spot.</span></h5>
				<!-- IKLAN A6-->
				<a href="#">
					<img src="<?php echo base_url()?>assets2/img/iklan/A6.jpg">
				</a>
			</div>	
					
			
			<div class="sidebar">  
				
				<!-- IKLAN A5-->
				<a href="#">
					<img src="<?php echo base_url()?>assets2/img/iklan/A5.jpg">
				</a>			
			</div>
						
		</div>
		<!-- /Left Sidebar -->
		
	