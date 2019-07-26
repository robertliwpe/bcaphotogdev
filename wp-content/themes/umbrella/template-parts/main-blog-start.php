<?php
// get current post type. Ex: page, post, blog, archive, 404...
$pre = umbrella_post_type_is();

$show = $pre === 'archive' || $pre === 'page_archive';

// info for ajax loading
global $wp_query;
$max = $wp_query->max_num_pages;
$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
$next_post = next_posts( $max, false );
?>

<!-- START: Blog -->
<div class="nk-blog <?php echo esc_attr( $show ? 'active' : '' ); ?>" id="nk-blog">
    <div class="nk-blog-ajax-info" data-max-pages="<?php echo esc_attr( $max ); ?>" data-start-page="<?php echo esc_attr( $paged ); ?>" data-next-post="<?php echo esc_attr( $next_post ); ?>"></div>
