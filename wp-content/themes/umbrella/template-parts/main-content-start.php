<?php
// get current post type. Ex: page, post, blog, archive, 404...
$post_type = umbrella_post_type_is();
$pre = $post_type;
$id = umbrella_post_id_is();

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$show = nk_get_option( $pre . '_show_content', true, true, $id );
$show = $show !== 'false' && $show;
if ( $post_type === 'archive' || $post_type === 'page_archive' || $post_type === '404' ) {
    $show = false;
}

$vertical_align = nk_get_option( $pre . '_content_vertical_align', 'top', true, $id );

$under_title = nk_get_option( $pre . '_content_under_title', false, true, $id );
$under_title = $under_title !== 'false' && $under_title;

$transition_in = nk_get_option( $pre . '_content_transition_in', 'right', true, $id );
$transition_out = nk_get_option( $pre . '_content_transition_out', 'right', true, $id );

$transition_speed = nk_get_option( $pre . '_content_transition_speed', 500, nk_get_metabox( $pre . '_content_transition_speed_custom', $id ), $id );

$text_color = nk_get_option( $pre . '_content_text_color', '#212121', nk_get_metabox( $pre . '_content_text_color_custom', $id ), $id );
?>

<!-- START: Main Page Content -->
<div class="nk-main <?php echo esc_attr( ( $show ? 'active' : '' ) . ( $under_title ? ' nk-main-lower-title' : '' ) ); ?>" data-transition-in="<?php echo esc_attr( $transition_in ); ?>" data-transition-out="<?php echo esc_attr( $transition_out ); ?>" data-transition-speed="<?php echo esc_attr( $transition_speed ); ?>" data-color="<?php echo esc_attr( $text_color ); ?>">
    <div class="nano">
        <div class="nano-content">
            <div class="nk-vertical-<?php echo esc_attr( $vertical_align ); ?>">
                <div>
