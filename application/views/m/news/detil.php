<!-- Content -->
<section id="content">
	<div class="container">
		<div align="center" style="margin: 0 0 10px 0">
		
<div class="sidebar">
				
				
				</div>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-9528794433985327", enable_page_level_ads: true }); </script></sidebar">

<div class="breadcrumbs column">
			<p>
				<a href="<?php echo base_url()?>m">Home</a>   /
				<?php if($category!=''):?>
				<a href="<?php echo base_url()?>m/rubrik/<?php echo $category?>" title="<?php echo $category?>"><?php echo $category?></a>  /
				<?php endif?>
				<?php if($subcat!='-'):?>
				<a href="<?php echo base_url()?>m/subrubrik/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  /
				<?php endif?>
				<a href="<?php echo current_url(); ?>"><?php echo $title?></a>
			</p>
		</div>
		
		<!-- Main Content -->
		<div class="main-content">
			
			<!-- Single -->
			<div class="column-two-third single">
				<?php foreach($q_news->result() as $row):?>
				<span class="meta"><?php echo $this->custom->date_changer($row->news_date_launch)?></span>
				<?php if($row->news_subtitle!=''):?>
				<h5 class="subtitle"><?php echo $row->news_subtitle?></h5>
				<?php endif?>
				<h1 class="title"><?php echo $row->news_title?></h1>				
				<img style="width: 100%;" src="<?php echo base_url()?>assets/images/news/<?php echo $row->news_image?>" alt="" />
				<?php if($row->news_caption!=''):?>
				<div class="newsCaption"><?php echo $row->news_caption?></div>
				<?php endif?>
				<?php $newsid=$row->news_id?>
				
				<div style="text-align:justify">
					<?php 
						//Additional News
						if(isset($news_add)):
							foreach($q_news_add->result() as $row2):
								echo $row2->news_add_content;
							endforeach;
						else:
							echo $row->news_content;
						endif;
					?>
				</div>
				
				<div align="center">
					<?php
						//Additional News
						if($q_news_add_num>0):
						?>
						<div class="newsPagination">
						<?php
							$stat=false;
							$news_add_index=$this->uri->segment(5);
							for($i=0;$i<=$q_news_add_num;$i++){
								$n=$i+1;
								if($news_add_index==$n || $news_add_index==''):
									if($stat==false):
										echo '<a class="newsPaginationCurrent" href="'. $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
										$stat=true;
									else:
										echo '<a href="'. $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
									endif;					
								else:
									echo '<a href="'. $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
								endif;
							}
						?>
						</div>
						<?php
						endif;
					?>
				</div>
				
				<div class="clear"></div>
				<div class="clearfix"></div>
				<div class="clearx"></div>
				<div style="margin: 20px 0 0 0;">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_inline_share_toolbox"></div>
				</div>
				<div class="clear"></div>
				<div class="clearfix"></div>
				<div class="clearx"></div>
				
			
				
				<?php endforeach?>
				
				
				<?php
				$is_logged_in=$this->session->userdata('is_logged_in');
				if($is_logged_in!=''):?>
				<div style="margin:10px 0">
					<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $newsid?>"><h6>Edit Berita >></h6></a>
				</div>
				<?php endif?>

				<div>
					<div class="sidebar">								
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.4";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						
						
						<div class="fb-page" data-href="https://www.facebook.com/Manado-Post-935657596500598/?ref=bookmarks" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Manado-Post-935657596500598/?ref=bookmarks"><a href="https://www.facebook.com/Manado Post">Manado Post</a></blockquote></div></div>		
						<br><br>
					</div>	
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<script>
						 (adsbygoogle = window.adsbygoogle || []).push({
							  google_ad_client: "ca-pub-9528794433985327",
							  enable_page_level_ads: true
						 });
					</script>				
				</div>
				<br><br><br><br>
				
				
				<div id="smt-130483088" style="padding: 0px"></div>
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
						  "adDivId": "smt-130483088",
						  "publisherId": 1100040873,
						  "adSpaceId": 130483088,
						  "format": "all",
						  "formatstrict": true,
						  "dimension": "xxlarge",
						  "width": 320,
						  "height": 50,
						  "sync": false
				},callBackForSmaato);
				</script>
								
				<br><br><br><br>
				<?php if($q_comment->num_rows >0):?>
				<div class="relatednews">
					<h5 class="line"><span>Berita Terkait</span></h5>
					<ul>
						<?php foreach($q_related->result() as $row):?>
						<li>
							<a href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
								<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date)?></span>
								<a href="<?php echo $this->custom->time_url_m($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $row->news_title?>
								</a>
							</p>
						</li>
						<?php endforeach?>
					</ul>
				</div>
				<?php endif;?>
				
				<div id="main_contentx">
					<?php $this->load->view('news/comment_success');?>
				</div>
				
				<div class="comment-form">
					<h5 class="line"><span>Komentar</span></h5>
					<div class="loading" style="display:none"></div>
					<form action="" method="post" id="addCommentForm">
						<input type="hidden" name="newsid" class="name" id="newsid" value="<?php echo $newsid?>"/>
						<div class="form">
							<label>Nama</label>
							<div class="input">
								<input type="text" name="name" class="name" id="name" />
							</div>
						</div>
						<div class="form">
							<label>Email</label>
							<div class="input">
								<input type="text" name="email" class="name" id="email" />
							</div>
						</div>
						<div class="form">
							<label>Komentar</label>
							<textarea rows="10" cols="20" name="comment" id="comment"></textarea>
						</div>	
						<div class="form">
							<div id="voting_result"></div>
						</div>
						<input type="submit" class="post-comment" id="submit" value="Post Komentar" />
						
					</form>
				</div>
				
				<script type="text/javascript" src="<?php echo base_url()?>jquery.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						/* The following code is executed once the DOM is loaded */
						
						/* This flag will prevent multiple comment submits: */
						var working = false;
						
						/* Listening for the submit event of the form: */
						$('#addCommentForm').submit(function(e){
							
							e.preventDefault();
							if(working) return false;
							
							working = true;
							$('#submit').val('Working..');
							$('span.error').remove();
							
							/* Sending the form fileds to submit.php: */
							$.post('<?php echo base_url()?>comment',$(this).serialize(),function(msg){
								
								working = false;
								$('#submit').val('Post Komentar');
								$('#voting_result').html(msg);
								//clear
								$('#name').val('');
								$('#email').val('');
								$('#comment').val('');
								//update
								$.post("<?php echo base_url()?>comment/update/<?php echo $newsid?>", {
									}, function(update){
									$('#main_contentx').html(unescape(update));				
								});				
							});
							
						});
						
					});
				</script>
				
			</div>
			<!-- /Single -->
			
		</div>
		<!-- /Main Content -->
		
		<!-- Left Sidebar -->
		<?php $this->load->view('m/widget/sidebar')?>
		<!-- /Left Sidebar -->
		
	</div>    
</section>
<!-- / Content -->				