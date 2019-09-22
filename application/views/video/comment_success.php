<?php if($q_comment->num_rows >0):?>
<div class="comments">
	<h5 class="line"><span>Komentar</span></h5>
	<ul>
		<?php foreach($q_comment->result() as $row):?>
		<li>
			<div>
				<div class="comment-avatar"><img src="<?php echo base_url()?>assets2/img/avatar.png" alt="MyPassion" /></div>
				<div class="commment-text-wrap">
					<div class="comment-data">
						<p><a href="#" class="url"><?php echo $row->comment_name?></a> <br /> <span><?php echo $row->comment_date?> </span></p>
					</div>
					<div class="comment-text">
						<?php echo $row->comment_content?>
					</div>
				</div>				
			</div>			
		</li>
		<?php endforeach?>
	</ul>
</div>
<?php endif;?>