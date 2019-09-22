       <!-- Content -->

        <section id="content">

            <div class="container">

            	<!-- Main Content -->

                

                <div class="breadcrumbs column">

                	<p>

						<a href="<?php echo base_url()?>">Home</a>   \\   

						<?php if(isset($subcat)):?>

						<a href="<?php echo base_url()?>berita/<?php echo $subcat_url?>" title="<?php echo $subcat?>"><?php echo $subcat?></a>  \\  

						<?php endif?>

						<a href="<?php echo current_url(); ?>"><?php echo $title?></a>

					</p>

                </div>

                

                <div class="main-content">

                	

                    <!-- Popular News -->

                	<div class="column-two-third">

                    	

                        

                        <div class="outerwide">

                        	<ul class="block2">

								<?php foreach($search->result() as $row ):?>

                                <li>

                          

                                    <p>

                                        <span><?php echo $this->custom->nicetime($row->news_date,2)?></span>

                                        <a href="<?php echo $this->custom->time_url($row->news_date, $row->news_url, $row->news_id)?>">

											<?php echo $row->news_title?>

										</a>

                                    </p>

                                

                                </li>

								<?php endforeach?>

                                



                            </ul>

                        </div>

                        

                 

                    	

                    </div>

                    <!-- /Popular News -->

                    

                </div>

                <!-- /Main Content -->

                

           <?php $this->load->view('widget/sidebar2')?>

                

            </div>    

        </section>

        <!-- / Content -->