<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content(); ?>
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post -->
