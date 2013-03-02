<?php
/*
 * Template Name: Dashboard
 */

get_header();

$site_management = new open4scrum_site();

?>

<div class="row-fluid">

	<h1><?php echo get_bloginfo('title'); ?> Dashboard</h1>

	<p>This is your company startpage...</p>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
	<?php endwhile; // end of the loop. ?>

	<p>&nbsp;</p>

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well">
				<h2><i class="icon icon-darkgray icon-locked"></i> Members</h2>
			</div>
			<div class="box-content">
				<p>&nbsp;</p>
				<?php $site_management->member_display(); ?>
			</div>
		</div>
	</div>

</div>

<?php

get_footer();

?>
