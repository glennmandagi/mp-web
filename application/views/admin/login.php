<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">

            <h5>Login</h5>
            <p class="subheader">
				Login untuk mengupload berita
			</p>
            <hr>
				<div id="message">
					<?php echo validation_errors(); ?>		
				</div>
            <!-- Contact page -->
            <div id="contact">
                <div id="message"></div>
                <form  action="<?php echo base_url()?>admin/login/login_do" method="post" accept-charset="utf-8" >		
                    <div id="contact-input">
                      
                        <label for="name">Username</label>
                        <input type="text" value="" id="username" name="username" maxlength="80">
                   
                        <label for="email">Password</label>
                        <input type="password" value="" id="password" name="password" maxlength="80">
                      
                    </div>    
  
                    <div id="contact-submit">
                        <input type="submit" value="Submit" id="submit" class="submit">
                    </div>
                </form>
            </div>
        </div>
	</div>
  	
</div>