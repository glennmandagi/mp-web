<!-- Container -->
<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
		
		<h1>Berita dengan Tag "<i><?=$cur_keyword?></i>"</h1>
		
		<div class="breadcrumb clearfix">		
			<p><a href="<?=base_url()?>">Home</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;
				<a href="<?=base_url()?>tag" title="cari">Tag</a>
				<?if(isset($subcat)):?>
				&nbsp;&nbsp;&rarr;&nbsp;&nbsp;
				<a href="<?=base_url()?>berita/<?=$subcat_url?>" title="<?=$subcat?>"><?=$subcat?></a>
				<?endif?>			
			</p>
		</div>
		<form name="form-search" method="post" action="<?=base_url()?>tag">
				<input type="text" name="keyword" value="<?=$cur_keyword?>" />
				<input type="submit" name="submit" value="Cari Tag" />
			</form>
			
		<p class="search-info">Displaying results 1-<?=$q_tags->num_rows()?> of <i><?=$q_tags->num_rows()?></i></p>	
			
		<!-- Article standard -->
		<?foreach($q_tags->result() as $row ):?>
        <div class="article-standard">
            <div class="post-image">
                <img src="<?= base_url() . 'assets/images/news/thumb/' . $row->news_image?>" alt="<?=$row->news_title?>"/>
                <ol class="social-links">
                    <li><a href="<?=$cur_news_url=$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>"><i class="icon-link"></i></a></li>
                    <li><a href="<?= base_url() . 'assets/images/news/' . $row->news_image?>" rel="lightbox"><i class="icon-search"></i></a></li>
				</ol>
			</div>
            <div class="entry-content">
                <h3 class="entry-title">
					<a href="<?=$cur_news_url=$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>" title="<?=$row->news_title?>">
					<?=$row->news_title?></a>	
					
				</h3>
                <div class="entry-meta">
                    <div class="review-stars">
                        <span class="star-full"></span>
                        <span class="star-full"></span>
                        <span class="star-full"></span>
                        <span class="star-full"></span>
                        <span class="star-full"></span>
					</div>
                    <div class="description-em">
                        <span class="by-view-number"><?=$row->news_visit?></span>
                        <span class="by-date"><?=$this->custom->nicetime($row->news_date,2)?></span>
					</div>
				</div>
                <p><?=$this->custom->trim_content($row->news_content, 32)?></p>
                <a href="<?=$cur_news_url=$this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>" class="read-more">
				Baca Selengkapnya</a>
                <span class="format-post"><i class="icon-file-text-alt"></i></span>
			</div>
		</div>
		<?endforeach?>
        <!-- Clear floating div -->
        <div class="clear"></div>  
		
	</div>
    
	<!-- Sidebar -->
  	
</div>
