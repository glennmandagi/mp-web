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
		</div>
<center>
<!-- tempat banner -->
<!-- taru di sini -->
</center>
		<div class="breadcrumbs column">
			<p>
				<a href="<?php echo base_url()?>">Home</a>   /
				<?php if($category!=''):?>
				<a href="<?php echo base_url()?>berita/<?php echo $category_url?>" title="<?php echo $category?>"><?php echo $category?></a>  /
				<?php endif?>
				<?php if($subcat!='-'):?>
				<a href="<?php echo base_url()?>berita/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  /
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
					<?php
					if($row->news_date_launch>date('Y-m-d H:i:s')):
						echo '<div style="color:red">(Berita ini belum tayang. tgl tayang: ' .  $this->custom->date_changer($row->news_date_launch) .')</div>';
					endif;
					?>
					<?php if($row->news_subtitle!=''):?>
					<h5 class="subtitle"><?php echo $row->news_subtitle?></h5>
					<?php endif?>
					<h1 class="title"><?php echo $row->news_title?></h1>
					<img src="<?php echo base_url()?>assets/images/news/<?php echo $row->news_image?>" alt="MyPassion" class="readNewsImg" width="620px"/>
					<?php if($row->news_caption!=''):?>
						<div class="newsCaption"><?php echo $row->news_caption?></div>
					<?php endif?>
					<?php $newsid=$row->news_id?>

					<div style="text-align:justify">
						<p><?php
							//Additional News
							if(isset($news_add)):
								foreach($q_news_add->result() as $row2):
									echo $row2->news_add_content;
								endforeach;
							else:
								echo $row->news_content;
							endif;
							?>
						</p>
					</div>

					<div align="center">
						<?php
							//Additional News
							if($q_news_add_num > 0):?>


							<div class="newsPagination">
							<?php
								$stat=false;
								$news_add_index=$this->uri->segment(7);
								for($i=0;$i<=$q_news_add_num;$i++){
									$n=$i+1;
									if($news_add_index==$n || $news_add_index==''):
										if($stat==false):
											echo '<a class="newsPaginationCurrent" href="'. $this->custom->time_url($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
											$stat=true;
										else:
											echo '<a href="'. $this->custom->time_url($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
										endif;
									else:
										echo '<a href="'. $this->custom->time_url($row->news_date, $row->news_url, $row->news_id) .'/'. $n .'">'.$n.'</a>';
									endif;
								}
							?>
							</div>



							<?php
							endif;
						?>
					</div>


				<?php endforeach;?>




				<?php
				//$is_logged_in=$this->session->userdata('is_logged_in');
				if($this->custom->ifsuper()):?>
				<div style="margin:10px 0; padding: 10px 0;">
					<a href="<?php echo base_url()?>admin/news/edit_selected/<?php echo $newsid?>" class="send">
						Edit Berita
					</a><br><br>
				</div>
				<?php endif?>

				<div>

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
				</div>
				
				<div class="clear"></div>
				<div class="clearfix"></div>
				<div class="clearx"></div>
				<div style="margin: 20px 0 0 0;">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
				</div>

				<?php if($q_related->num_rows >0):?>
				<div class="relatednews">
					<h5 class="line"><span>Berita Terkait</span></h5>
					<ul>
						<?php foreach($q_related->result() as $row):?>
						<li>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="MyPassion" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date)?></span>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
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
					<h5 class="line"><span>Kirim Komentar</span></h5>
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

				<!--<script type="text/javascript" src="<?php echo base_url()?>jquery.min.js"></script> disable-->
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
		<?php $this->load->view('widget/sidebar2')?>
		<!-- /Left Sidebar -->

	</div>
</section>
<!-- / Content -->
