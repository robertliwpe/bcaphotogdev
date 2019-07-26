<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package umbrella
 */

get_header();

get_template_part( 'template-parts/main-content-start' );

    the_archive_title( '<h1 class="page-title sr-only">', '</h1>' );

get_template_part( 'template-parts/main-content-end' );

get_template_part( 'template-parts/main-blog-start' );

    /* Start the Loop */
while ( have_posts() ) :
    the_post(); ?>
        <div class="nk-blog-item">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        </div>
    <?php
    endwhile;

?>
    <div class="screen-reader-text">
        <?php the_posts_navigation(); ?>
    </div>
    <?php

    get_template_part( 'template-parts/main-blog-end' );

    get_footer();
