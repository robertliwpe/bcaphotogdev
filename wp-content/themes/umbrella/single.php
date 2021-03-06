<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package umbrella
 */

get_header();

get_template_part( 'template-parts/main-content-start' );

while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', get_post_format() );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile; // End of the loop.

get_template_part( 'template-parts/main-content-end' );

get_template_part( 'template-parts/main-blog-start' );
get_template_part( 'template-parts/main-blog-end' );

get_footer();
