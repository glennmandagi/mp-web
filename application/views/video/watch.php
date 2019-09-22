<!-- Content -->
<section id="content">
	<div class="container">
		<div align="center" style="margin: 0 0 10px 0">
			<img src="<?php echo base_url()?>assets2/img/iklan/A1.jpg">
		</div>
		<div class="breadcrumbs column">
			<p>
				<a href="<?=base_url()?>">Home</a>   /
				<a href="<?=base_url()?>video" title="video">video</a>  /
				<a href="<?=current_url(); ?>"><?=$title?></a>
			</p>
		</div>
		
		<!-- Main Content -->
		<div class="main-content">
			
			<!-- Single -->
			<div class="column-two-third single">
				<?php foreach($q_vid->result() as $row):?>
				<span class="meta"><?php echo $this->custom->date_changer($row->video_date)?></span>
				<?php if($row->video_subtitle!=''):?>
				<h5 class="subtitle"><?php echo $row->video_subtitle?></h5>
				<?php endif?>
				<h1 class="title"><?php echo $row->video_title?></h1>				
				
				
				<?php $video_id=$row->video_id?>
				<?php if($row->video_caption!=''):?>
				<div class="newsCaption"><?php echo $row->video_caption?></div>
				<?php endif?>
				
				<div style="text-align:justify">					
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
						width="600" 
						height="360"
						
						allowscriptaccess="always" 
						allowfullscreen="true"
						flashvars="file=<?php echo base_url()?>assets/video/<?php echo $row->video_video?>&image=<?php echo base_url()?>assets/video/thumb/<?php echo $row->video_image?>" 
						/>
					</object>		
					
					
					<p><?php echo $row->video_content?></p>
				</div>
				
				<div style="margin: 20px 0;">					
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-539c14b15819327a"></script>
					<div class="addthis_native_toolbox"></div>
				</div>
				
				<?php endforeach?>
				
				
				<?php
					$is_logged_in=$this->session->userdata('is_logged_in');
				if($is_logged_in!=''):?>
				<div style="margin:10px 0">
					<a href="<?php echo base_url()?>admin/video/edit_selected/<?php echo $video_id?>"><h6>Edit Video >></h6></a>
				</div>
				<?php endif?>
				
				
				<div>
					<a href="#"><img src="<?php echo base_url()?>assets2/img/iklan/A4.jpg" alt="MyPassion" /></a>	
				</div>
				
				
				
				
				<div id="main_contentx">
					<?php $this->load->view('news/comment_success');?>
				</div>
				
				<div class="comment-form">
					<h5 class="line"><span>Komentar</span></h5>
					<div class="loading" style="display:none"></div>
					<form action="" method="post" id="addCommentForm">
						<input type="hidden" name="video_id" class="name" id="newsid" value="<?php echo $video_id?>"/>
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
							$.post('<?php echo base_url()?>comment/video',$(this).serialize(),function(msg){
								
								working = false;
								$('#submit').val('Post Komentar');
								$('#voting_result').html(msg);
								//clear
								$('#name').val('');
								$('#email').val('');
								$('#comment').val('');
								//update
								$.post("<?php echo base_url()?>comment/update_video/<?php echo $video_id?>", {
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
		<?php $this->load->view('widget/sidebar2')?>
		<!-- /Left Sidebar -->
		
	</div>    
</section>
<!-- / Content -->				