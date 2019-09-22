<!-- Content -->
<section id="content">
	<div class="container">
		
		<div class="breadcrumbs column">
			<p>
				<a href="<?php echo base_url()?>">Home</a>   \\   
				<?php if(isset($subcat)):?>
				<a href="<?php echo base_url()?>berita/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  \\  
				<?php endif?>
				<a href="<?php echo current_url(); ?>"><?php echo $title?></a>
			</p>
		</div>
		
		<!-- Main Content -->
		<div class="main-content">
			
			<!-- Single -->
			<div class="column-two-third single">
				
				<div class="outerwide">
					<h5 class="line"><span>Divisi Iklan Manado Post</span></h5>
					
					
					<p> Untuk Informasi pemasangan iklan silakan menghubungi divisi Iklan Manado Post :</p>
		
					<div class="contact-info">
						<p class="man"><i class="icon-location"></i>Gedung Graha Pena<br />Jl. Babe Palar No. 62 <br />Wanea, Manado.</p>
						<p class="phone"><i class="icon-phone"></i> Phone:  (0431) 855-558 <br />(0431) 855-559</p>
						<p class="envelop"><i class="icon-mail"></i>Email: <a href="mailto:editor@mdopost.com">editor@manadopostonline.com</a> <br /> Web: <a href="http://www.manadopostonline.com">www.manadopostonline.com</a></p> 
					</div>
					
					
					<h5 class="line"><span>Space Iklan</span></h5>
					<div id="mapx">
						
					<img src="<?php echo  base_url()?>assets2/img/info_iklan1.jpg">	
					</div>
					
				</div>
				
			</div>
			<!-- /Single -->
			
		</div>
		<!-- /Main Content -->
		
		<?php $this->load->view('widget/sidebar2')?>
		
	</div>    
</section>
<!-- / Content -->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
