<?php
// get current post type. Ex: page, post, blog, archive, 404...
$post_type = umbrella_post_type_is();
$pre = $post_type;
$id = umbrella_post_id_is();

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$show_top_left = nk_get_option( $pre . '_top_left_navigation_show', true, true, $id );
$show_top_left = $show_top_left !== 'false' && $show_top_left != false;

$show_bottom_center = nk_get_option( $pre . '_bottom_center_navigation_show', true, true, $id );
$show_bottom_center = $show_bottom_center !== 'false' && $show_bottom_center != false;

$show_bottom_left = nk_get_option( $pre . '_bottom_left_navigation_show', true, true, $id );
$show_bottom_left = $show_bottom_left !== 'false' && $show_bottom_left != false;
$show_bottom_left_blog = $show_bottom_left;

if ( ( $post_type === 'archive' || $post_type === 'page_archive' ) && $show_bottom_left ) {
    $show_bottom_left = false;
} else {
    $show_bottom_left_blog = false;
}

?>

<!-- Top Left -->
<div class="nk-layout-top-left">
    <?php

    $logo = nk_get_attachment( nk_get_option( 'logo', get_template_directory_uri() . '/assets/images/logo.png' ) );
    $logo_black = nk_get_attachment( nk_get_option( 'logo_black', get_template_directory_uri() . '/assets/images/logo-dark.png' ) );

    if ( $logo ) :
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-nav-logo">
            <img src="<?php echo esc_url( $logo['src'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" width="<?php echo nk_get_option( 'logo_width', 120 ); ?>" data-logo-dark="<?php echo esc_url( $logo_black['src'] ); ?>">
        </a>
    <?php endif; ?>

    <!-- There will be inserted loading spinner when ajax -->
    <div class="nk-loading-spinner-place"></div>

    <!-- Top Left Rotated -->
    <div class="nk-layout-top-left-rotated">
        <nav class="nk-nav<?php echo esc_attr( $show_top_left ? '' : ' nk-nav-hide' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top_left',
                    'container' => '',
                    'menu_class' => '',
                    'walker' => new nk_walker(),
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            );
            ?>
        </nav>
    </div>
</div>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <!-- Top Right -->
    <div class="nk-layout-top-right">
        <span class="nk-nav-toggle">
            <span class="nk-icon-burger">
                <span class="nk-t-1"></span>
                <span class="nk-t-2"></span>
                <span class="nk-t-3"></span>
            </span>
        </span>
    </div>
<?php endif; ?>

<!-- Bottom Left -->
<div class="nk-layout-bottom-left">
    <nav class="nk-nav<?php echo esc_attr( $show_bottom_left ? '' : ' nk-nav-hide' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'bottom_left',
                'container' => '',
                'menu_class' => '',
                'walker' => new nk_walker(),
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
        ?>
    </nav>
</div>

<!-- Bottom Left Blog -->
<div class="nk-layout-bottom-left-blog">
    <nav class="nk-nav<?php echo esc_attr( $show_bottom_left_blog ? '' : ' nk-nav-hide' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'bottom_left_blog',
                'container' => '',
                'menu_class' => '',
                'walker' => new nk_walker(),
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
        ?>
    </nav>
</div>

<!-- Bottom Center -->
<div class="nk-layout-bottom-center">
    <nav class="nk-nav<?php echo esc_attr( $show_bottom_center ? '' : ' nk-nav-hide' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'bottom_center',
                'container' => '',
                'menu_class' => '',
                'walker' => new nk_walker(),
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
        ?>
    </nav>
</div>
