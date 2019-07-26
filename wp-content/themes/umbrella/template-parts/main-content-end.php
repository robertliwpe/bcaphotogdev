<?php
// get current post type. Ex: page, post, blog, archive, 404...
$post_type = umbrella_post_type_is();
$pre = $post_type;
$id = umbrella_post_id_is();

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$text_bottom_right = nk_get_option( $pre . '_content_text_bottom_right', '', true, $id );

$background_color = nk_get_option( $pre . '_content_background_color', '#FFFFFF', nk_get_metabox( $pre . '_content_background_color_custom', $id ), $id );
$background_opacity = nk_get_option( $pre . '_content_background_opacity', 100, nk_get_metabox( $pre . '_content_background_color_custom', $id ), $id );

$background_color_mobile = nk_get_option( $pre . '_content_background_color_mobile', '#FFFFFF', nk_get_metabox( $pre . '_content_background_color_custom', $id ), $id );
$background_opacity_mobile = nk_get_option( $pre . '_content_background_opacity_mobile', 100, nk_get_metabox( $pre . '_content_background_color_custom', $id ), $id );

// add opacity to color
if ( $background_color ) {
    $background_color = hex2rgb( $background_color );
    $background_color = 'rgba(' . implode( ',', $background_color ) . ', ' . (float) ( $background_opacity / 100 ) . ')';
} else {
    $background_color = '';
}

if ( $background_color_mobile ) {
    $background_color_mobile = hex2rgb( $background_color_mobile );
    $background_color_mobile = 'rgba(' . implode( ',', $background_color_mobile ) . ', ' . (float) ( $background_opacity_mobile / 100 ) . ')';
} else {
    $background_color_mobile = '';
}


?>

                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Right Info -->
    <div class="nk-layout">
        <div class="nk-layout-bottom-right-rotated">
            <strong class="text-main">
                <?php echo esc_html( $text_bottom_right ); ?>
            </strong>
        </div>
    </div>
</div>
<div class="nk-main-bg" data-bg="<?php echo esc_attr( $background_color ); ?>" data-bg-mobile="<?php echo esc_attr( $background_color_mobile ); ?>"></div>
<!-- END: Main Page Content -->
