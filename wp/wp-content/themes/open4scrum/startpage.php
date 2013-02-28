<?php
/**
 * Template Name: StartPage
 */

$site_management = new open4scrum_site();

include('header.php');


?>

<div class="row-fluid">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'page' ); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<p>&nbsp;</p>

<div class="row-fluid">
    <div class="box span6">
        <div class="box-header well">
            <h2><i class="icon icon-darkgray icon-locked"></i> Login</h2>
        </div>
        <div class="box-content">
            <p>&nbsp;</p>
            <?php $site_management->display_login(); ?>
        </div>
    </div>
    <div class="box span6">
        <div class="box-header well">
            <h2><i class="icon-darkgray icon-plus"></i> Create new company area</h2>
        </div>
        <div class="box-content">
            <p>&nbsp;</p>
            <?php $site_management->display_create(); ?>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>