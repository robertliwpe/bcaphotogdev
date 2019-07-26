<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package umbrella
 */

get_header();

// show in Umbrella style
$show_style = nk_get_metabox( 'page_show_style' );
if ( ! isset( $show_style ) || $show_style === 'umbrella' ) {
    get_template_part( 'template-parts/main-content-start' );
}
?>

    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', 'page' );
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile; // End of the loop.
    ?>

<?php
if ( ! isset( $show_style ) || $show_style === 'umbrella' ) {
    get_template_part( 'template-parts/main-content-end' );

    get_template_part( 'template-parts/main-blog-start' );
    get_template_part( 'template-parts/main-blog-end' );
}

get_footer();
