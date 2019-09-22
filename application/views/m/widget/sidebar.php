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
						<a class="subTitleS" href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $row->news_subtitle?>
						</a>
						<a class="title" href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
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
								<a class="title" href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
								</a>
								<span class="meta"><?php echo $this->custom->date_changer($row->news_date,1)?></span>                                     
							</li>
							<?php endforeach?>
						</ul>
					</div>
					<div id="tabs2">
						<ul>
							<?php foreach($q_latest->result() as $row):?>
							<li>
								<a class="title" href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
								</a>
								<span class="meta"><?php echo $this->custom->nicetime($row->news_date)?></span>                                     
							</li>
							<?php endforeach?>
						</ul>
					</div>									
				</div>
			</div>
			
			<div class="sidebar">
				<h5 class="line"><span>ePaper Manado Post</span></h5>
				<a href="http://manadopostdigital.com/" target="_blank"><img src="https://manadopostonline.com/iklan/logo_manadopost.jpg" width ="300px" height ="300px" alt="ePaper Manado Post" /></a>     
			</div>
	
			<div class="sidebar">			
				<script src="http://jwpsrv.com/library/G5dywGqKEeKqoCIACp8kUw.js"></script>		
				<div id='my-video'></div>	
				<script type='text/javascript'>				
					jwplayer('my-video').setup({
						file: '<?php echo base_url()?>assets2/video/video.mp4',
						image: '<?php echo base_url()?>assets2/video/thumb/video.jpg',
						width: '300',
						height: '250'
					});
				</script>						
			</div>
				
			<div class="sidebar">
				<h5 class="line"><span>Ads Spot.</span></h5>
				<!-- IKLAN A6-->
				<div id="smt-130483089" style="padding: 0px"></div>
				<script type="text/javascript" src="https://soma-assets.smaato.net/js/smaatoAdTag.js"></script>
				<script>
					function callBackForSmaato(status){
						if(status == "SUCCESS"){
							console.log("callBack is being called with status : " + status);
						} else if (status == "ERROR"){
							console.log("callBack is being called with status : " + status);
						}
					}; 
					SomaJS.loadAd({
						  "adDivId": "smt-130483089",
						  "publisherId": 1100040873,
						  "adSpaceId": 130483089,
						  "format": "all",
						  "formatstrict": true,
						  "dimension": "medrect",
						  "width": 300,
						  "height": 250,
						  "sync": false
				},callBackForSmaato);
				</script>
				
			</div>	
			
			<div class="sidebar">  			
				<!-- IKLAN A5-->
				
			</div>
			
		</div>
		<!-- /Left Sidebar -->
	