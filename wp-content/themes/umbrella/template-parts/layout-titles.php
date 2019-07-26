<?php
// get current post type. Ex: page, post, blog, archive, 404...
$post_type = umbrella_post_type_is();
$pre = $post_type;
$id = umbrella_post_id_is();

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$title_show = nk_get_option( $pre . '_layout_content_title_custom', false, true, $id );

if ( $post_type === '404' ) {
    $title_show = 'custom';
}

$title = '';
if ( $title_show === 'custom' ) {
    $title = nk_get_option( $pre . '_layout_content_title', '', nk_get_metabox( $pre . '_layout_content_title_custom', $id ) !== 'default', $id );
} else {
    // title for archive
    if ( $pre === 'archive' ) {
        $title = get_the_archive_title( '', '' );
    } else {
        $title = get_the_title( $id );
    }
}

$sub_title = nk_get_option( $pre . '_layout_content_subtitle', '', nk_get_metabox( $pre . '_layout_content_subtitle_custom', $id ) !== 'default', $id );

$tagline = nk_get_option( $pre . '_layout_content_tagline', '', nk_get_metabox( $pre . '_layout_content_tagline_custom', $id ) !== 'default', $id );

// posts archive
if ( $post_type === 'archive' || $post_type === 'page_archive' ) {
    $sub_title = get_the_archive_description( '', '' );
    $sub_title = '';
}

// search
if ( is_search() ) {
    $title = esc_html__( 'Search.', 'umbrella' );
}

?>

<!-- Titles -->
<div class="nk-layout-content-tagline"><strong><?php echo esc_html( $tagline ); ?></strong></div>
<h3 class="nk-layout-content-title"><?php echo wp_kses_post( $title ); ?></h3>
<h3 class="nk-layout-content-subtitle"><?php echo esc_html( $sub_title ); ?></h3>
