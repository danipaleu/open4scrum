<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>open4scrum</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="open4scrum an open visual scrumboard">
	<meta name="author" content="EkAndreas">

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico">

	<?php wp_head(); ?>

	<style type="text/css">
		body {
			padding-bottom: 40px;
		}

		.sidebar-nav {
			padding: 9px 0;
		}
	</style>

</head>

<body>

<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-10747578-7']);
	_gaq.push(['_trackPageview']);

	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();

</script>

<?php if ( ! isset( $no_visible_elements ) || ! $no_visible_elements ) { ?>
<!-- topbar starts -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a href="/"><img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/img/logo_small.png" alt="logo" /></a>

			<?php
			if ( is_user_logged_in() ){
				?>
				<!-- user dropdown starts -->
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo wp_get_current_user()->user_email; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo open4scrum_site::get_blogurl( wp_get_current_user()->ID ); ?>">Dashboard</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo wp_logout_url('/'); ?>">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				<?php
			}
			?>

		</div>
	</div>
</div>
<!-- topbar ends -->
	<?php } ?>
<div class="container-fluid">
	<div class="row-fluid">
		<?php if ( ! isset( $no_visible_elements ) || ! $no_visible_elements ) { ?>

		<!-- left menu starts -->
		<div class="span2 main-menu-span">
			<div class="well nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
					<li class="nav-header hidden-tablet">Main</li>
					<li><a class="ajax-link" href="<?php get_bloginfo('url'); ?>"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
				</ul>
			</div>
			<!--/.well -->
		</div><!--/span-->
		<!-- left menu ends -->

		<noscript>
			<div class="alert alert-block span10">
				<h4 class="alert-heading">Warning!</h4>

				<p>You need to have
					<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
			</div>
		</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
		<?php } ?>
