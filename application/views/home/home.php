<!-- Content -->
<style>
	.outertight img {
    height: 170px;
    width: 300px;
	}
	*{margin: 0; padding: 0}

@keyframes autopopup {
    from {opacity: 0;margin-top:-200px;}
    to {opacity: 1;}
}
#close {
    background-color: rgba(64, 68, 65, 0.7);
    position: fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    animation:autopopup 3.5s;
}
#close:target {
    -webkit-transition:all 1s;
    -moz-transition:all 1s;
    transition:all 1s;
    opacity: 0;
    visibility: hidden;
}

@media (min-width: 768px){
    .container-popup {
        width:30%;
    }
}
@media (max-width: 767px){
    .container-popup {
        width:30%;
    }
}
.container-popup {
    position: relative;
    margin: 5% auto;
    padding: 4px 3px;
    background-color: gray;
    color: #333;
    border-radius: 8px;
}
.container-popup img {
    width: 100%;

	height:100%;
}

.close {
    position: absolute;
    top:3px;
    right:3px;
    background-color:transparent;
    padding:7px 10px;
    font-size: 15px;
    text-decoration: none;
    line-height: 1;
    color:#111;
}



.slider {
     width: 300px;
     height: 300px;
     position: relative;
     overflow: hidden;
}

.slider ul {
     list-style: none;
}
@-webkit-keyframes anim_slider {
     0% {
             opacity: 0;
     }
     6% {
             opacity: 1;
     }
     24% {
             opacity: 1;
     }
     30% {
             opacity: 0;
     }
     100% {
             opacity: 0;
     }
}

@-moz-keyframes anim_slider {
     0% {
             opacity: 0;
     }
     6% {
             opacity: 1;
     }
     24% {
             opacity: 1;
     }
     30% {
             opacity: 0;
     }
     100% {
             opacity: 0;
     }
}

.slider ul li {
     position: absolute;
     opacity: 0;
     top: 0;

     -webkit-animation-name: anim_slider;
     -webkit-animation-duration: 26.0s;
     -webkit-animation-timing-function: linear;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: normal;
     -webkit-animation-delay: 0;
     -webkit-animation-play-state: running;
     -webkit-animation-fill-mode: forwards;

     -moz-animation-name: anim_slider;
     -moz-animation-duration: 26.0s;
     -moz-animation-timing-function: linear;
     -moz-animation-iteration-count: infinite;
     -moz-animation-direction: normal;
     -moz-animation-delay: 0;
     -moz-animation-play-state: running;
     -moz-animation-fill-mode: forwards;
}

.slider ul li:nth-child(2), .slider ul li:nth-child(2) div {
     -webkit-animation-delay: 6.0s;
     -moz-animation-delay: 6.0s;
}
.slider ul li:nth-child(3), .slider ul li:nth-child(3) div {
     -webkit-animation-delay: 12.0s;
     -moz-animation-delay: 12.0s;
}
.slider ul li:nth-child(4), .slider ul li:nth-child(4) div {
     -webkit-animation-delay: 18.0s;
     -moz-animation-delay: 18.0s;
}

.slider ul li a {
     text-decoration: none;
     color: #fff;
}

.slider ul li p {
     color: #fff;
     font-size: 12px;
     margin-top: -5px;
     padding: 10px 15px;
     filter: alpha(opacity=80);
     -moz-opacity: 0.8;
     -khtml-opacity: 0.8;
     opacity: 0.8;
} .slider ul li img a {
     display: block;
     float: left;
     width: 100%;
}

@-webkit-keyframes captions {
     0% {
             top: 100%;
             opacity: 0;
     }
     5% {
             top: 80%;
             opacity: 1;
     }
     20% {
             top: 80%;
             opacity: 1;
     }
     25% {
             top: 100%;
             opacity: 0;
     }
     100% {
             top: 100%;
             opacity: 0;
     }
}

@-moz-keyframes captions {
     0% {
             top: 100%;
             opacity: 0;
     }
     5% {
             top: 80%;
             opacity: 1;
     }
     20% {
             top: 80%;
             opacity: 1;
     }
     25% {
             top: 100%;
             opacity: 0;
     }
     100% {
             top: 100%;
             opacity: 0;
     }
}




.slider ul li div {
     text-align: center;
     color: #fff;
     background-color: rgba(45, 44, 44, 0.7);
     background: rgba(45, 44, 44, 0.7);
     margin: 0;
     padding: 0;
     position: absolute;
     bottom: 0;
     width: 300px;
     z-index :999;

     -webkit-animation-name: captions;
     -webkit-animation-duration: 26.0s;
     -webkit-animation-timing-function: linear;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: normal;
     -webkit-animation-delay: 0;
     -webkit-animation-play-state: running;
     -webkit-animation-fill-mode: forwards;

     -moz-animation-name: captions;
     -moz-animation-duration: 26.0s;
     -moz-animation-timing-function: linear;
     -moz-animation-iteration-count: infinite;
     -moz-animation-direction: normal;
     -moz-animation-delay: 0;
     -moz-animation-play-state: running;
     -moz-animation-fill-mode: forwards;
}

</style>



<section id="content">

<div class="column" style="margin:0 0 10px 10px">
		<img src="https://manadopostonline.com/iklan/ban.jpg" width ="100%" style="margin-left:10px" alt="" /> 	</div>


 <div class="container">
		<div class="column" style="margin:0 0 10px 6px">

<!-- </a>
		</div>

	</div>
	<div class="container">

		<div class="column" style="margin:0 0 10px 6px">
			<!-- IKLAN A1-->


</div>

		<!-- Main Content -->
		<div class="main-content">
			<div class="column-two-third ">
				<div class="mpW">
					<h5 class="line"><span style="color: #FFF"><a href="<?php echo base_url()?>berita/all">MANADO POST UPDATE</a></span></h5>
					<ul class="footnav">
						<?php foreach(array_slice($q_latest->result(), 0, 5) as $row):?>
						<li>
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<i class="icon-right-open"></i>
							<span class="meta2">
								<?php echo $this->custom->date_changer($row->news_date_launch,4)?>
							</span>
							<?php echo $row->news_title?>
							</a>
						</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>

			<div class="main-slider column-two-third" style="position: relative">
				<div class="badg">
					<p><a href="<?php echo base_url()?>berita/HEADLINE">BERITA UTAMA</a></p>
				</div>
				<div class="flexslider">
					<ul class="slides">
						<?php foreach($q_hl->result() as $row):?>
						<li>
							<img src="<?php echo base_url()?>assets/images/news/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" />
							<p class="flex-caption">
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $row->news_title?>
								</a>
							</p>
						</li>
						<?php break;?>
						<?php endforeach?>
					</ul>
					<div class="clear"></div>
					<ul class="block" style="margin-top: 10px;">
						<?php foreach(array_slice($q_hl->result(), 1, 5) as $row):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $row->news_title?>
								</a>
							</p>
						</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>

			<!-- Popular News -->
			<div class="column-one-third">
				<h5 class="line"><span>Nasional</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_nas->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<li>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
								<h6>
									<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</h6>

							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_nas->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 42)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Popular News -->

			<!-- Hot News -->
			<div class="column-one-third">
				<h5 class="line"><span>Internasional</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_inter->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<li>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
								<h6>
									<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</h6>

							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_inter->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 42)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Hot News -->
			<div class="clearx"></div>

			<!-- Popular News -->
			<div class="column-one-third">
				<h5 class="line"><span>EkBis</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_ekb->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<li>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
								<h6>
									<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</h6>

							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_ekb->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 42)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Popular News -->

			<!-- Hot News -->
			<div class="column-one-third">
				<h5 class="line"><span>Olahraga</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_ola->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<li>							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<p>
								<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
								<h6>
									<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</h6>

							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_ola->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 42)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Hot News -->

			<!-- IKLAN A4-->
			<div style="margin: 0px 0 5px 10px">
				<a href="#" target="_blank">



				</a>
			</div>

			<!-- Popular News -->
			<div class="column-one-third">
				<h5 class="line"><span>Politika</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_pol->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<li>
							<?php $hl_r=$row->news_id;?>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_pol->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Popular News -->

			<!-- Popular News -->
			<div class="column-one-third">
				<h5 class="line"><span>Kumkrim</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_kum->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<li>
							<?php $hl_r=$row->news_id;?>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_kum->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Popular News -->
			<div class="clear"></div>

			<!-- Hot News -->
			<div class="column-one-third">
				<h5 class="line"><span>Publika</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_pub->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<li>
							<?php $hl_r=$row->news_id;?>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_pub->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /Hot News -->

			<!-- Hot News -->
			<div class="column-one-third">
				<h5 class="line"><span>Teropong</span></h5>
				<div class="outertight m-r-no">
					<ul class="block">
						<?php foreach($q_news_ter->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<li>
							<?php $hl_r=$row->news_id;?>
							<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<img class="homeThumb" src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" class="alignleft" />
							</a>
							<span><?php echo $this->custom->date_changer($row->news_date,1)?></span>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php
							break;
						endif;?>
						<?php endforeach ?>

						<?php foreach($q_news_ter->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>


	<!--

	<img src="https://manadopostonline.com/iklan/ADV SMA 9.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/erwinkontu.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/MARSEL.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/BP2RD.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/DPK.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/DPMD.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/MAR.jpg" width ="300px" alt="" />

	<img src="https://manadopostonline.com/iklan/PDIP.jpg" width ="300px" alt="" />
						<img src="https://manadopostonline.com/iklan/bara.jpg" width ="300px" alt="" />
					<img src="https://manadopostonline.com/iklan/bawaslu.jpg" width ="300px" alt="" />


	<img src="https://manadopostonline.com/iklan/JEMMY.jpg" width ="300px" alt="" />
		
					<img src="https://manadopostonline.com/iklan/ucapan.jpg" width ="300px" alt="" />

		

					<img src="https://manadopostonline.com/iklan/kapoldabarurefix.jpg" width ="300px" alt="" />

		
					<img src="https://manadopostonline.com/iklan/ucapankapoldabaru2.jpeg" width ="300px" alt="" />

		
					<img src="https://manadopostonline.com/iklan/kapoldasulut.jpeg" width ="300px" alt="" /> -->

		</div>

		<!-- /Main Content -->

		<!-- Left Sidebar -->
				<div class="column-one-third"  margin="right">
				<div class="sidebar">
					<img 
src="https://manadopostonline.com/iklan/Jual-Rumah.jpg" width ="300px" alt="" /></div>
<div class="sidebar">
					<img 
src="https://manadopostonline.com/iklan/MSM.jpg" width ="300px" alt="" /></div>
<div class="sidebar">
					<img 
src="https://manadopostonline.com/iklan/brie.jpg" width ="300px" alt="" /></div>

<div class="sidebar">
					<img 
src="https://manadopostonline.com/iklan/UT.jpg" width ="300px" alt="" /></div>

<div class="sidebar">		
					<img 
src="https://manadopostonline.com/iklan/holyland.jpg" width ="300px" alt="" />

		</div>
 <div class="sidebar">	
		</div>
<!-- <div class="sidebar">	
					
					<img src="https://manadopostonline.com/iklan/df0.jpg" width ="300px" alt="" />

		</div>
<div class="sidebar">
					<img src="https://manadopostonline.com/iklan/GRACE.jpg" width ="300px" alt="" />

		</div>
<div class="sidebar">
					<img src="https://manadopostonline.com/iklan/arthur.jpg" width ="300px" alt="" />

		</div>
			
<div class="sidebar">
					<img src="https://manadopostonline.com/iklan/rhs.jpg" width ="300px" alt="" />


			 </div>
			 <div class="sidebar">
					<img src="https://manadopostonline.com/iklan/FLORENS.jpg" width ="300px" alt="" />


			 </div>
			 <div class="sidebar">
					<img src="https://manadopostonline.com/iklan/IDP.jpg" width ="300px" alt="" />


			 </div>




				 

				<div class="slider">
					<ul>

						 <li>
							 <img alt="" src="https://manadopostonline.com/iklan/left2.jpg" width ="280px"/>

						 </li>

						 <li>
							 <img alt="" src="https://manadopostonline.com/iklan/left1.jpg" width ="280px"/>

						 </li>

						 <li>
							 <img alt="" src="https://manadopostonline.com/iklan/right1.jpg" width ="280px"/>

						 </li>
						 <li>
							 <img alt="" src="https://manadopostonline.com/iklan/right2.jpg" width ="280px" />

						 </li>
					</ul>
				</div>

				<div class="sidebar">
					<img src="https://manadopostonline.com/iklan/inspektorat.jpg" width ="300px" alt="inspektorat" />

				</div>	-->


			<!-- <div class="sidebar">

					<h5 class="line"><span>Liputan Khusus</span></h5>

				<ul class="ads125">

					<?php foreach($q_news_lipsus->result() as $row):?>

					<li>

						<a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

						<img src="<?php echo base_url()?>assets/images/news/thumb/<?php echo $row->news_image?>" alt="<?php echo $row->news_title ?>" />

						</a>

						<a class="subTitleS" href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

						<?php echo $row->news_subtitle?>

						</a>

						<a class="title" href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

						<?php echo $row->news_title?>

						</a>

					</li>

					<?php endforeach?>

				</ul>

			</div>






-->


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

								<a class="title" href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

								<?php echo$row->news_title?>

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

								<a class="title" href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

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
					<!--
			       <a href="https://manadopostonline.com/iklan/griyamaleosan.jpg">
                   <img src="https://manadopostonline.com/iklan/griyamaleosank.jpg"></a>
                   <br><br>-->
				<h5 class="line"><span>ePaper Manado Post</span></h5>

				<a href="http://manadopostdigital.com/" target="_blank"><img src="https://manadopostonline.com/iklan/logo_manadopost.jpg" width ="300px" height ="300px"alt="ePaper Manado Post" /></a>
				<br><br>

                   <!-- <a href="https://manadopostonline.com/iklan/luwak/">
                   <!-- <img src="https://manadopostonline.com/iklan/luwak/luwak001.jpg"></a>
                   <!--          <br><br>

				   <!--        <a href="https://manadopostonline.com/iklan/axa/ttf.jpg" target="_blank"><img src="https://manadopostonline.com/iklan/axa/ttf.gif" alt="Festifal Tomohon" /></a>-->

			</div>

			<!--<div class="sidebar">

				<h5 class="line"><span>Video</span></h5>

				


				<?php foreach($q_vid->result() as $rowvid):?>
				<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="400" height="315">

					<param name="movie" value="<?php echo base_url()?>assets2/plugin/video/player-licensed.swf" />

					<param name="allowfullscreen" value="true" />

					<param name="allowscriptaccess" value="always" />

					<param name="flashvars" value="file=<?php echo base_url()?>assets/video/<?php echo $rowvid->video_video?>&image=<?php echo base_url()?>assets/video/thumb/<?php echo $rowvid->video_image?>" />

					<embed

					type="application/x-shockwave-flash"

					id="player2"

					name="player2"

					src="<?php echo base_url()?>assets2/plugin/video/player-licensed.swf"

					width="300"

					allowscriptaccess="always"

					allowfullscreen="true"

					flashvars="file=<?php echo base_url()?>assets/video/<?php echo $rowvid->video_video?>&image=<?php echo base_url()?>assets/video/thumb/<?php echo $rowvid->video_image?>"

					/>

				</object>

				<div style="font-size:14px">
					<b><a href="<?php echo base_url()?>video/watch/<?php echo $rowvid->video_id?>"><?php echo $rowvid->video_title?></a><b>
				</div>
				<?php endforeach;?>
			
			</div>-->

			<div class="sidebar">
				<!-- IKLAN A6-->
				<a href="#" target="_blank">

				</a>
			</div>

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

			</div>


            <a class="twitter-timeline" data-width="300" data-height="550" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/ManadoPostGroup?ref_src=twsrc%5Etfw">Tweets by ManadoPostGroup</a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
<div class="sidebar">
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
<!-- <img src="https://manadopostonline.com/iklan/event/banner_wurangian.jpg"> --->
		<!-- /Left Sidebar -->
<!-- <div class="column">
	<img src="https://manadopostonline.com/iklan/Kadis ESDM.jpg " width="300px">
	<img src="https://manadopostonline.com/iklan/Kadis Lingkungan Hidup.jpg" width="300px">
	<img src="https://manadopostonline.com/iklan/kadis satu pintu.jpg" width="300px">
	<img src="https://manadopostonline.com/iklan/karo ekonomi.jpg" width="300px">
	<img src="https://manadopostonline.com/iklan/Kemenag.jpg" width="300px">
	<img src="https://manadopostonline.com/iklan/mona ucapan hut.jpg" width="300px">
</div> -->

<div class="column">

			<!-- IKLAN A7 -->

			<div class="column-two-fourth" style="float: left; margin: 0px 4px 0px 0px;">

				<a href="https://manadopostonline.com/iklan/viral/" target="_blank">

				<img src="<?php echo base_url()?>assets2/img/iklan/iklanbaris.gif">

				</a>


			</div>



			<!-- IKLAN A8 -->

			<div class="column-two-fourth">

				<a href="https://manadopostonline.com/iklan/viral/" target="_blank">

				<img src="<?php echo base_url()?>assets2/img/iklan/lowongan.gif">

				</a>

			</div>

		</div>

		<div class="main-content">

			<!-- Popular News -->


			<div class="column">

				<div class="outertight">
					<h5 class="line"><span>Minahasa</span></h5>
					<div class="outertight m-r-no">
						<?php foreach($q_news_min->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
								</li>
							</ul>
						</div>
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 39)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>
					</div>

					<ul class="block">
						<?php foreach($q_news_min->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach?>
					</ul>
				</div>



				<div class="outertight">
					<h5 class="line"><span>Nusa Utara</span></h5>
					<div class="outertight m-r-no">
						<?php foreach($q_news_nus->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
								</li>
							</ul>
						</div>
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 39)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>
					</div>

					<ul class="block">
						<?php foreach($q_news_nus->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach?>
					</ul>
				</div>


				<div class="outertight m-r-no">
					<h5 class="line"><span>Bolmong Raya</span></h5>
					<div class="outertight m-r-no">
						<?php foreach($q_news_bol->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
								</li>
							</ul>
						</div>
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 39)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>
					</div>

					<ul class="block">
						<?php foreach($q_news_bol->result() as $row):?>
						<?php if($row->news_id!=$hl_r):?>
						<li>
							<p>
								<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
								<?php echo $this->custom->cut($row->news_title, 45)?>
								</a>
							</p>
						</li>
						<?php endif;?>
						<?php endforeach?>
					</ul>
				</div>


				<!-- /Popular News -->

			</div>



			<div class="column">

				<!-- IKLAN A9 -->

				<div align="center" style="text-align:center">

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

					</a>

				</div>

			</div>



			<div class="main-content">

				<!-- List News -->

				<div class="column">



					<div class="outertight">
						<h5 class="line"><span>Kawanuapolis</span></h5>
						<?php foreach($q_news_kaw->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_kaw->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>

					<div class="outertight">
						<h5 class="line"><span>Otomotif</span></h5>
						<?php foreach($q_news_oto->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_oto->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>





					<div class="outertight m-r-no">
						<h5 class="line"><span>Sumikolah</span></h5>
						<?php foreach($q_news_sum->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_sum->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>
					<div class="clear"></div>



					<div class="outertight">
						<h5 class="line"><span>Zetizen</span></h5>
						<?php foreach($q_news_x->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_x->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>



					<div class="outertight">
						<h5 class="line"><span>Lifestyle</span></h5>
						<?php foreach($q_news_hea->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_hea->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>

					<div class="outertight m-r-no">
						<h5 class="line"><span>Sportainment</span></h5>
						<?php foreach($q_news_spo->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_spo->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>

				</div>



				<div class="container">
					<div class="column-one-third">
						<h5 class="line"><span>Show & Celebrities</span></h5>
						<?php foreach($q_news_sho->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" class="imgWidth" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_sho->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>

					<div class="column-one-third">
						<h5 class="line"><span>Opini</span></h5>
						<?php foreach($q_news_opi->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" class="imgWidth" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_opi->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>

					<div class="column-one-third">
						<h5 class="line"><span>Teknologi</span></h5>
						<?php foreach($q_news_vil->result() as $row):?>
						<?php if($row->news_hl_r==1):?>
						<?php $hl_r=$row->news_id;?>
						<img src="<?php echo base_url().'assets/images/news/thumb/'.$row->news_image?>" alt="<?php echo $row->news_title ?>" class="imgWidth" />
						<h6 class="regular">
							<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
							<?php echo $this->custom->cut($row->news_title, 45)?>
							</a>
						</h6>
						<p><?php echo $this->custom->trim($row->news_content, 20)?></p>
						<?php
							break;
						endif;?>
						<?php endforeach?>

						<ul class="block">
							<?php foreach($q_news_vil->result() as $row):?>
							<?php if($row->news_id!=$hl_r):?>
							<li>
								<p>
									<a href="<?php echo$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">
									<?php echo $this->custom->cut($row->news_title, 45)?>
									</a>
								</p>
							</li>
							<?php endif;?>
							<?php endforeach?>
						</ul>
					</div>




				</div>



			</div>

			<!-- <div id="close">
        <div class="container-popup">
            <form action="#" method="post" class="popup-form">
                <img src="https://manadopostonline.com/iklan/iklanmpdigital.jpg" alt="">
            </form>
            <a class="close" href="#close">close</a>
        </div>
    </div> -->

		</div>
	</div>



</section>
<!-- / Content -->
