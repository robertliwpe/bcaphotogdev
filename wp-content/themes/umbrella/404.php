<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package umbrella
 */

get_header();

get_template_part( 'template-parts/main-content-start' );
get_template_part( 'template-parts/main-content-end' );

get_template_part( 'template-parts/main-blog-start' );
get_template_part( 'template-parts/main-blog-end' );

get_footer();
