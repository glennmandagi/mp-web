<!doctype html>
<html>
	<head>
		<!-- Page title -->
		<title>
			<?php if(isset($title)): echo $title . " | Admin Page"; else: echo "Admin Page"; endif?>
		</title>
		<!-- Meta description -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
		<meta name="author" content="medianesia.com" />
		<!-- Stylesheet -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/custom.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/layout.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/awesome.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/lightbox.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/grid.css"/>
		<link id="themecolor" rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/red.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/backgrounds.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/fonts.css"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico"/>
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo base_url()?>assets/images/icon/apple-touch-icon-57x57.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/images/icon/apple-touch-icon-72x72.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/images/icon/apple-touch-icon-114x114.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/images/icon/apple-touch-icon-144x144.png"/>
		<script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
	
	<style>
		
		ul{
			list-style: none;
		}
		</style>
	
	</head>
	<!-- Body -->
	<body>
		<!-- Demo changer -->

		<!-- Header -->
		<div id="header">
			<!-- Logo -->
			<div id="logo"><a href="<?php echo base_url()?>"></a></div>
			<!-- Navigation -->
			<div class="menu-wrap"> <a class="click-to-open-menu"><i class="icon-reorder"></i></a>
				<?php
					$is_logged_in=$this->session->userdata('is_logged_in');
					if($is_logged_in!=''):
				?>
				<ul class="primary-navigation">
					<li><a href="<?php echo base_url()?>admin" class="current">Home</a> </li>
					<li><a href="<?php echo base_url()?>admin/news/edit">Berita</a>
						<ul>
							<li><a href="<?php echo base_url()?>admin/news/add">Add</a></li>
						</ul>
					</li>
					<?php if($this->custom->ifsuper()):?>
					<li><a href="<?php echo base_url()?>admin/rubrik">Rubrik</a>						
						<ul>
							<li><a href="<?php echo base_url()?>admin/rubrik/add">Add</a></li>
						</ul>					
					</li>
					<li><a href="<?php echo base_url()?>admin/subrubrik">Subrubrik</a>
						
						<ul>
							<li><a href="<?php echo base_url()?>admin/subrubrik/add">Add</a></li>
						</ul>		
						
					</li>
					<li><a href="<?php echo base_url()?>admin/video">Video</a></li>
					<li><a href="<?php echo base_url()?>admin/poling">Poling</a></li>
					<!--<li><a href="<?php echo base_url()?>admin/gallery">Gallery</a></li>-->
					<li><a href="<?php echo base_url()?>admin/user">User</a></li>
					<?php endif;?>
					<!--<li><a href="<?php echo base_url()?>admin/note">Notes</a></li>-->
					<li><a href="<?php echo base_url()?>admin/home/logout">Logout</a></li>
					<li><a href="<?php echo base_url()?>" target="_blank">Manado Post >></a></li>
				</ul>
				<?php
					endif;	
				?>
			</div>
			<!-- Search bar 
			<form id="search-box">
				<input type="text" class="search-field" placeholder="Search..."/>
				<a href="#"><i class="icon-search"></i></a>
			</form>
			-->
		</div>
		