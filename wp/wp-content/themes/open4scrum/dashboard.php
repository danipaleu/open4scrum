<?php
/*
 * Template Name: Dashboard
 */

get_header();

?>

<div class="row-fluid">

	<h1>Dashboard</h1>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
	<?php endwhile; // end of the loop. ?>

</div>

<?php

get_footer();

?>
