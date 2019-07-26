<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package umbrella
 */

get_header();

get_template_part( 'template-parts/main-content-start' );

if ( have_posts() ) :
    if ( is_home() && ! is_front_page() ) : ?>
            <h1 class="page-title sr-only"><?php single_post_title(); ?></h1>
        <?php
        endif;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;

    get_template_part( 'template-parts/main-content-end' );

    get_template_part( 'template-parts/main-blog-start' );
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            ?>
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

    endif;
    get_template_part( 'template-parts/main-blog-end' );

    get_footer();
