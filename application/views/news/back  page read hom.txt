<!-- Container -->
<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
				
		<div class="breadcrumb clearfix">		
			<p><a href="<?=base_url()?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;
				<a href="<?=base_url()?>berita/<?=$page?>" title="<?=$category?>"><?=$category?></a>
				<?if(isset($subcat)):?>
				&nbsp;&nbsp;&rarr;&nbsp;&nbsp;
				<a href="<?=base_url()?>berita/<?=$subcat_url?>" title="<?=$subcat?>"><?=$subcat?></a>
				<?endif?>	
				&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?=current_url(); ?>"><?=$title?></a>
			</p>
		</div>
	
		<!-- Single post -->
		<div class="single-post-container">
				
			<?foreach($q_news->result() as $row):?>
            <!-- Image -->
            <div class="post-image"><a href="<?=base_url()?>assets/images/news/<?=$row->news_image?>" rel="lightbox"> 
				<img src="<?=base_url()?>assets/images/news/<?=$row->news_image?>" alt="<?=$row->news_title?>"/></a>
			</div>            
            <!-- Entry content -->
            <div class="entry-content">
                <h1 class="entry-title"><a href="<?=current_url(); ?>"><?=$row->news_title?></a></h1>
                <div class="entry-meta">
                    <div class="description-em">
                        <span class="by-view-number"><?=$row->news_visit?></span>
                        <span class="by-category"><a href="<?=base_url()?>category/<?=$page?>" title="<?=$cat?>"><?=$cat?></a></span>
                        <span class="by-date"><?=$this->custom->nicetime($row->news_date,2)?></span>
                        <span class="by-author"><a href="#"></a></span>
                        <span class="by-comments"><a href="#"><?=$q_comment->num_rows()?></a></span>
					</div>
				</div>
				<?=$row->news_content?>
			</div>
            <?endforeach?>
            <!-- Share this article -->
            <div id="share-this-article">
                <div class="share-text">Share berita ini: </div>
                <ul class="social-icons">
                    <li class="facebook">
						<a href="#" 
						onclick="
						window.open(
						'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
						'facebook-share-dialog', 
						'width=626,height=436'); 
						return false;">
						<i class="icon-facebook"></i>
						</a>		
					</li>
                    <li class="twitter">
                    	<a href="#"><i class="icon-twitter"></i></a>
                    	
					</li>                    
				</ul>
			</div>
            
            <!-- Post controls -->
            <div id="post-controls">
			
			
				<?$i=1?>
				<?foreach(array_slice($q_news_related->result(),0,2) as $rowxx):?>
				
				<?if($i==1):?>
				<a href="<? echo $this->custom->time_url($rowxx->news_date, $rowxx->news_url,$rowxx->news_id)?>" class="prev">
				<span>Previous</span>
				<?else:?>
				<a href="<? echo $this->custom->time_url($rowxx->news_date, $rowxx->news_url,$rowxx->news_id)?>" class="next">
				<span>Next</span>
				<?endif?>
				<p ><?=$news_title=$rowxx->news_title;?></p>
				</a>
				<?$i++?>
				<?endforeach?>
				
		
			
			

			</div>            
		</div>
        
		
        
		
	</div>
	<!-- Sidebar -->
  	<?$this->load->view('widget/sidebar')?>
</div>