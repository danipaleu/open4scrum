<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post -->
