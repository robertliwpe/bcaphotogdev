<?php
// get current post type. Ex: page, post, blog, archive, 404...
$post_type = umbrella_post_type_is();
$pre = $post_type;
$id = umbrella_post_id_is();

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$active_slide = nk_get_option( $pre . '_slider_active_slide', '', true, $id );
if ( ! $active_slide && function_exists( 'nk_theme' ) ) {
    // get first slide
    $active_slide = key( nk_theme()->portfolio()->get_portfolio_items( 'compact' ) );
}

$active_category = nk_get_option( $pre . '_slider_active_category', '', true, $id );
if ( ! $active_category && function_exists( 'nk_theme' ) ) {
    // get first category
    $active_category = key( nk_theme()->portfolio()->get_categories( 'compact' ) );
}
$active_category = get_term( $active_category );
if ( $active_category && isset( $active_category->name ) ) {
    $active_category = $active_category->name;
} else {
    $active_category = '';
}

$show_categories = true;

$transition_effect = nk_get_option( $pre . '_slider_transition_effect', 'fade', true, $id );
$transition_speed = nk_get_option( $pre . '_slider_transition_speed', 500, nk_get_metabox( $pre . '_slider_transition_speed_show', $id ), $id );

$category_transition_effect = nk_get_option( $pre . '_slider_category_transition_effect', 'top', true, $id );
$category_transition_speed = nk_get_option( $pre . '_slider_category_transition_speed', 500, nk_get_metabox( $pre . '_slider_category_transition_speed_show', $id ), $id );

$autoplay = nk_get_option( $pre . '_slider_autoplay', false, true, $id );
$autoplay_timer = 'false';
if ( $autoplay && $autoplay != 'false' ) {
    $autoplay_timer = nk_get_option( $pre . '_slider_autoplay_timer', 3000, nk_get_metabox( $pre . '_slider_autoplay', $id ) !== 'default', $id );
}
$force_reload = nk_get_option( $pre . '_slider_force_reload', '', true, $id );
if ( ! $force_reload ) {
    $force_reload = 'false';
}

$hide_titles = nk_get_metabox( 'page_slider_hide_titles', $id );

$use_custom_slides = nk_get_option( $pre . '_slider_enable_custom_set_of_slides', false, true, $id );
$custom_slides = false;
if ( $use_custom_slides == true || $use_custom_slides == 'true' ) {
    $custom_slides = nk_get_option( $pre . '_slider_custom_set_of_slides', array(), nk_get_metabox( $pre . '_slider_enable_custom_set_of_slides', $id ) !== 'default', $id );
}

$navigation_style = nk_get_option( $pre . '_slider_navigation_style', 'full', true, $id );

// archive page
if ( $post_type === 'archive' || $post_type === 'page_archive' ) {
    $navigation_style = 'slim';
    $show_categories = false;
}
?>

<!-- Slider -->
<div class="nk-slider <?php echo $hide_titles ? esc_attr( 'nk-slider-hide-titles' ) : ''; ?>" data-active-category="<?php echo esc_attr( $active_category ); ?>" data-transition-speed="<?php echo esc_attr( $transition_speed ); ?>" data-transition-effect="<?php echo esc_attr( $transition_effect ); ?>" data-category-transition-speed="<?php echo esc_attr( $category_transition_speed ); ?>" data-category-transition-effect="<?php echo esc_attr( $category_transition_effect ); ?>" data-autoplay="<?php echo esc_attr( $autoplay_timer ); ?>" data-force-reload="<?php echo esc_attr( $force_reload ); ?>">
    <?php

    if ( function_exists( 'nk_theme' ) ) {
        $args = array();
        if ( $use_custom_slides ) {
            $args = array( 'post__in' => $custom_slides );
        }

        $portfolio_items = nk_theme()->portfolio()->get_portfolio_items( 'full', $args );

        foreach ( $portfolio_items as $item ) {
            $image = nk_get_attachment( $item['thumbnail'], 'nk_1920x1080' );
            $image_small = nk_get_attachment( $item['thumbnail'], 'nk_300x300' );

            if ( $image || $image_small ) {
                $active_class = $active_slide == $item['id'] ? 'active' : '';
                $position_x = nk_get_option( 'background_x_position', 50, true, $item['id'] );
                $position_y = nk_get_option( 'background_y_position', 50, true, $item['id'] );
                $position = (int) $position_x . '% ' . (int) $position_y . '%';

                // prepare video
                $video_type = nk_get_option( 'video_type', 'disable', true, $item['id'] );
                $video_url = '';
                $video_size = nk_get_option( 'video_size', '', true, $item['id'] );
                if ( $video_type === 'local' ) {
                    $mp4 = nk_get_option( 'video_mp4', '', true, $item['id'] );
                    $webm = nk_get_option( 'video_webm', '', true, $item['id'] );
                    $ogv = nk_get_option( 'video_ogv', '', true, $item['id'] );

                    if ( $mp4 && is_array( $mp4 ) ) {
                        $video_url .= 'mp4:' . esc_url( $mp4['url'] );
                    }
                    if ( $webm && is_array( $webm ) ) {
                        $video_url .= ( strlen( $video_url ) ? ',' : '' ) . 'webm:' . esc_url( $webm['url'] );
                    }
                    if ( $ogv && is_array( $ogv ) ) {
                        $video_url .= ( strlen( $video_url ) ? ',' : '' ) . 'ogv:' . esc_url( $ogv['url'] );
                    }
                } else if ( $video_type === 'yt_vm' ) {
                    $video_url = nk_get_option( 'video_url', '', true, $item['id'] );
                }

                $categories = '';
                if ( $item['categories'] && count( $item['categories'] ) > 0 ) {
                    foreach ( $item['categories'] as $k => $cat ) {
                        $categories .= ( $k > 0 ? '|' : '' ) . $cat->name;
                    }
                }

                $srcset = wp_get_attachment_image_srcset( $item['thumbnail'], 'nk_1920x1080' );

                ?>
                <div class="nk-slider-item <?php echo esc_attr( $active_class ); ?>" data-categories="<?php echo esc_attr( $categories ); ?>" data-background-position="<?php echo esc_attr( $position ); ?>">
                    <?php
                    echo '<img
                        src="' . esc_url( $image['src'] ) . '"
                        srcset="' . esc_attr( $image_small ? $image_small['src'] : $image['src'] ) . '"
                        data-srcset="' . esc_attr( $srcset ) . '"
                        data-sizes="auto"
                        alt="' . esc_attr( $item['title'] ) . '"
                        class="lazyload"
                        style="object-position: ' . esc_attr( $position ) . ';"
                    >';

                    if ( $video_url ) {
                        echo '<div data-bg-video="' . esc_attr( $video_url ) . '" data-bg-video-size="' . esc_attr( $video_size ? $video_size : '16x9' ) . '"></div>';
                    }
                    ?>
                </div>
                <?php
            }
        }
    }
    ?>
</div>

<!-- Top Center -->
<div class="nk-layout-top-center">
    <nav class="nk-nav<?php echo esc_attr( $show_categories ? '' : ' nk-nav-hide' ); ?>">
        <ul class="nk-slider-categories">
            <!-- Here will be inserted available slider categories -->
        </ul>
    </nav>
</div>

<!-- Bottom Right -->
<div class="nk-layout-bottom-right">
    <!--
        START: Slider Navigation

        Additional Classes:
            .nk-slider-nav-slim
    -->
    <div class="nk-slider-nav <?php echo esc_attr( 'nk-slider-nav-' . $navigation_style ); ?>">
        <ul>
            <!-- Here will be inserted slider bullets -->
        </ul>
        <div>
            <div class="nk-slider-nav-prev">
                <span class="nk-icon-arrow-up"></span>
            </div>
            <div class="nk-slider-nav-next">
                <span class="nk-icon-arrow-down"></span>
            </div>
        </div>
    </div>
    <!-- END: Slider Navigation -->
</div>
