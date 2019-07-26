<?php
/**
 * Init Admin Theme Pages
 */

if ( ! function_exists( 'nk_theme' ) ) {
    return;
}

if ( ! function_exists( 'umbrella_get_demo_data' ) ) {
    function umbrella_get_demo_data( $demo_name ) {
        $demo_path = nk_admin()->admin_path . '/demos/' . $demo_name;
        return array(
            'blog_options' => array(
                'permalink' => '/%postname%/',
                'page_on_front_title' => 'Main',
                'posts_per_page' => 6,
            ),
            'demo_data_file' => $demo_path . '/content.xml',
            'customizer_file' => $demo_path . '/customizer.dat',
        );
    }
}

nk_theme()->theme_dashboard(
    array(
        'theme_title'        => 'Umbrella',
        'theme_id'           => '18068692',
        'theme_uri'          => 'https://themeforest.net/item/umbrella-photography-wordpress-theme/18068692?ref=_nK',
        'ask_for_review'     => true,
        'is_envato_elements' => true,
        'demos' => array(
            'main' => array(
                'title'      => esc_html__( 'Main', 'umbrella' ),
                'preview'    => 'https://wp.nkdev.info/umbrella/',
                'thumbnail'  => get_template_directory_uri() . '/admin/demos/main/screenshot.jpg',
                'demo_data'  => array_merge(
                    array(
                        'navigations' => array(
                            'Primary' => 'primary',
                            'Top Left' => 'top_left',
                            'Bottom Left' => 'bottom_left',
                            'Bottom Left Blog' => 'bottom_left_blog',
                            'Bottom Center' => 'bottom_center',
                        ),
                    ),
                    umbrella_get_demo_data( 'main' )
                ),
            ),
            'light' => array(
                'title'      => esc_html__( 'Light', 'umbrella' ),
                'preview'    => 'https://wp.nkdev.info/umbrella/demo-light/',
                'thumbnail'  => get_template_directory_uri() . '/admin/demos/light/screenshot.jpg',
                'demo_data'  => array_merge(
                    array(
                        'navigations' => array(
                            'Primary' => 'primary',
                            'Bottom Left' => 'bottom_left',
                            'Bottom Left Blog' => 'bottom_left_blog',
                            'Bottom Center' => 'bottom_center',
                        ),
                    ),
                    umbrella_get_demo_data( 'light' )
                ),
            ),
            'video' => array(
                'title'      => esc_html__( 'Video', 'umbrella' ),
                'preview'    => 'https://wp.nkdev.info/umbrella/demo-video/',
                'thumbnail'  => get_template_directory_uri() . '/admin/demos/video/screenshot.jpg',
                'demo_data'  => umbrella_get_demo_data( 'video' ),
            ),
        ),
        'is_envato_elements' => true,
    )
);
