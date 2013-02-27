<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>open4scrum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri() ?>/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri() ?>/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <span class="icon32 icon-black icon-sent"></span><span class="logotext">open4scrum</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="login.html">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>
