<!-- Container -->
<div class="container">
  	<!-- Primary left -->
    <div id="primary-left">
    	<!-- Blank page -->
        <div class="blank-page-container">
    
            <h1>Contact us</h1>
            <p class="subheader">Kontak kami untuk memperoleh informasi tentang konten kami atau pemasangan iklan.</p>
            <hr>
            <!-- Contact page -->
            <div id="contact">
                <div id="message"></div>
                <form method="post" action="<?=base_url()?>contact/contact_do" name="contactform" id="contactform">
                    <div id="contact-input">
                        <div>
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" value="">
                        </div>    
                        <div>
                        <label for="email">Email</label>
                        <input name="email" type="text" id="email" value="">
                        </div>
                    </div>    
                    <div id="contact-message">
                        <label for="comments">Message</label>
                        <textarea name="comments" type="text" id="comments" value=""></textarea>
                    </div>    
                    <div id="contact-submit">
                        <input type="submit" class="submit" id="submit" value="Kirim">
                    </div>
                </form>
            </div>
        </div>
	</div>
  	<!-- Sidebar -->
  	<div id="sidebar">
	<!-- Text widget -->
    <div class="widget">
        <h3 class="widget-title"><a href="<?=base_url()?>about" target="_blank">About medianesia</a></h3>
        <div class="widget-text">
            <p>Medianesia adalah situs berita independen yang menyediakan informasi berkualitas, teraktual, dan terkini.</p>
        </div>
    </div>
    </div>
</div>