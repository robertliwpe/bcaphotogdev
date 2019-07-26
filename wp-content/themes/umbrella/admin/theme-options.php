<?php

// helper function that works with Customizer options and ACF fields
if ( ! function_exists( 'nk_get_option' ) ) :
    function nk_get_option( $name = null, $default_value = null, $use_acf = null, $postId = null, $acf_name = null ) {
        if ( $name == null ) {
            return $default_value ? $default_value : null;
        }
        $value = null;

        // try get value from meta box
        if ( $use_acf && function_exists( 'nk_get_metabox' ) ) {
            $value = nk_get_metabox( $acf_name ? $acf_name : $name, $postId );
        }

        // get value from options
        if ( $value == null || $value === 'default' ) {
            if ( class_exists( 'Kirki' ) ) {
                $value = Kirki::get_option( $name );
            } else {
                $value = get_theme_mod( $name, null );
            }
        }

        // set default value
        if ( $value == null && $default_value != null ) {
            $value = $default_value;
        }

        return $value;
    }
endif;


// add Helvetica font
if ( ! function_exists( 'umbrella_custom_font_kirki' ) ) :
    function umbrella_custom_font_kirki( $fonts ) {
        $fonts['helvetica'] = array(
            'label' => 'Helvetica',
            'stack' => '"Helvetica", -apple-system, BlinkMacSystemFont, "Roboto", "Arial", sans-serif',
        );
        return $fonts;
    }
endif;
add_filter( 'kirki/fonts/standard_fonts', 'umbrella_custom_font_kirki' );


// remove some default customizer fields
if ( ! function_exists( 'umbrella_customize_register' ) ) :
    function umbrella_customize_register( $wp_customize ) {
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        $wp_customize->get_control( 'site_icon' )->priority = 10;

        $wp_customize->remove_control( 'display_header_text' );

        $wp_customize->get_section( 'title_tagline' )->priority = 1;

        $wp_customize->remove_section( 'colors' );
        $wp_customize->remove_section( 'header_image' );
        $wp_customize->remove_section( 'background_image' );
    }
endif;
add_action( 'customize_register', 'umbrella_customize_register' );


// add new fields in Customizer
if ( ! function_exists( 'initial_kirki_options' ) ) {
    function initial_kirki_options() {
        if ( ! class_exists( 'Kirki' ) ) {
            return;
        }

        Kirki::add_config(
            'umbrella', array(
                'capability' => 'edit_theme_options',
                'option_type' => 'theme_mod',
            )
        );

        /**
         * Add Sections
         */

        // Navigation
        Kirki::add_section(
            'navigation', array(
                'title'       => esc_html__( 'Navigation', 'umbrella' ),
                'priority'    => 2,
            )
        );

        // Typography
        Kirki::add_section(
            'typography', array(
                'title'       => esc_html__( 'Typography', 'umbrella' ),
                'priority'    => 3,
            )
        );

        // Custom Style
        Kirki::add_section(
            'style', array(
                'title'       => esc_html__( 'Style', 'umbrella' ),
                'priority'    => 4,
            )
        );

        // Single Page / Post
        Kirki::add_panel(
            'page', array(
                'title'       => esc_html__( 'Single Page / Post', 'umbrella' ),
                'priority'    => 5,
            )
        );
            Kirki::add_section(
                'page_slider', array(
                    'title'       => esc_html__( 'Slider', 'umbrella' ),
                    'panel'       => 'page',
                    'priority'    => 1,
                )
            );
            Kirki::add_section(
                'page_titles', array(
                    'title'       => esc_html__( 'Titles', 'umbrella' ),
                    'panel'       => 'page',
                    'priority'    => 2,
                )
            );
            Kirki::add_section(
                'page_navigations', array(
                    'title'       => esc_html__( 'Navigations', 'umbrella' ),
                    'panel'       => 'page',
                    'priority'    => 3,
                )
            );
            Kirki::add_section(
                'page_content', array(
                    'title'       => esc_html__( 'Content', 'umbrella' ),
                    'panel'       => 'page',
                    'priority'    => 4,
                )
            );

        // Archive (Posts List)
        Kirki::add_panel(
            'archive', array(
                'title'       => esc_html__( 'Archive (Posts List)', 'umbrella' ),
                'priority'    => 6,
            )
        );
            Kirki::add_section(
                'archive_slider', array(
                    'title'       => esc_html__( 'Slider', 'umbrella' ),
                    'panel'       => 'archive',
                    'priority'    => 1,
                )
            );
            Kirki::add_section(
                'archive_navigations', array(
                    'title'       => esc_html__( 'Navigations', 'umbrella' ),
                    'panel'       => 'archive',
                    'priority'    => 2,
                )
            );

        // 404
        Kirki::add_panel(
            '404', array(
                'title'       => esc_html__( '404', 'umbrella' ),
                'priority'    => 7,
            )
        );
            Kirki::add_section(
                '404_slider', array(
                    'title'       => esc_html__( 'Slider', 'umbrella' ),
                    'panel'       => '404',
                    'priority'    => 1,
                )
            );
            Kirki::add_section(
                '404_titles', array(
                    'title'       => esc_html__( 'Titles', 'umbrella' ),
                    'panel'       => '404',
                    'priority'    => 2,
                )
            );
            Kirki::add_section(
                '404_navigations', array(
                    'title'       => esc_html__( 'Navigations', 'umbrella' ),
                    'panel'       => '404',
                    'priority'    => 3,
                )
            );

        /*
         * Site Identity
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'image',
                'settings'    => 'logo',
                'label'       => esc_html__( 'Logo Image', 'umbrella' ),
                'section'     => 'title_tagline',
                'default'     => get_template_directory_uri() . '/assets/images/logo.png',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'image',
                'settings'    => 'logo_black',
                'label'       => esc_html__( 'Black Logo Image', 'umbrella' ),
                'description' => esc_html__( 'Used when slider image or background color have light color', 'umbrella' ),
                'section'     => 'title_tagline',
                'default'     => get_template_directory_uri() . '/assets/images/logo-dark.png',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting' => 'logo',
                        'operator' => '!=',
                        'value' => '',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'logo_width',
                'label'   => esc_html__( 'Logo Width', 'umbrella' ),
                'section' => 'title_tagline',
                'default' => 120,
                'choices' => array(
                    'min' => '30',
                    'max' => '250',
                    'step' => '1',
                ),
                'active_callback' => array(
                    array(
                        'setting' => 'logo',
                        'operator' => '!=',
                        'value' => '',
                    ),
                ),
            )
        );

        /*
        Main Navigation Panel
        */
        Kirki::add_field(
            'umbrella', array(
                'type' => 'image',
                'settings' => 'main_navigation_background_image',
                'label' => esc_html__( 'Background Image', 'umbrella' ),
                'section' => 'navigation',
                'default' => '',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar-image',
                        'property' => 'background-image',
                        'media_query' => '@media (min-width: 992px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'image',
                'settings' => 'main_navigation_background_image_mobile',
                'label' => esc_html__( 'Background Image on Mobile', 'umbrella' ),
                'section' => 'navigation',
                'default' => '',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar-image',
                        'property' => 'background-image',
                        'media_query' => '@media (max-width: 991px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'color',
                'settings' => 'main_navigation_background_color',
                'label' => esc_html__( 'Background Color', 'umbrella' ),
                'section' => 'navigation',
                'default' => '#212121',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar + .nk-navbar-bg',
                        'property' => 'background-color',
                        'media_query' => '@media (min-width: 992px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'color',
                'settings' => 'main_navigation_background_color_mobile',
                'label' => esc_html__( 'Background Color on Mobile', 'umbrella' ),
                'section' => 'navigation',
                'default' => '#212121',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar + .nk-navbar-bg',
                        'property' => 'background-color',
                        'media_query' => '@media (max-width: 991px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'color',
                'settings' => 'main_navigation_text_color',
                'label' => esc_html__( 'Text Color', 'umbrella' ),
                'section' => 'navigation',
                'default' => '#FFFFFF',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar',
                        'property' => 'color',
                        'media_query' => '@media (min-width: 992px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'color',
                'settings' => 'main_navigation_text_color_mobile',
                'label' => esc_html__( 'Text Color on Mobile', 'umbrella' ),
                'section' => 'navigation',
                'default' => '#FFFFFF',
                'priority' => 10,
                'output' => array(
                    array(
                        'element'  => '.nk-navbar',
                        'property' => 'color',
                        'media_query' => '@media (max-width: 991px)',
                    ),
                ),
            )
        );

        /**
         * Typography
         */
        Kirki::add_field(
            'umbrella', array(
                'type' => 'typography',
                'settings' => 'typography_main_body',
                'label' => esc_html__( 'Body', 'umbrella' ),
                'section' => 'typography',
                'default' => array(
                    'font-family' => '"Helvetica", -apple-system, BlinkMacSystemFont, "Roboto", "Arial", sans-serif',
                    'line-height' => 2.287,
                    'letter-spacing' => '0rem',
                ),
                'priority' => 10,
                'output' => array(
                    array(
                        'element' => 'body',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'typography',
                'settings' => 'typography_html',
                'label' => esc_html__( 'HTML', 'umbrella' ),
                'section' => 'typography',
                'default' => array(
                    'font-size' => '14px',
                ),
                'priority' => 10,
                'output' => array(
                    array(
                        'element' => 'html',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'typography',
                'settings' => 'typography_titles',
                'label' => esc_html__( 'Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => array(
                    'font-family' => '"Helvetica", -apple-system, BlinkMacSystemFont, "Roboto", "Arial", sans-serif',
                ),
                'priority' => 10,
                'output' => array(
                    array(
                        'element' => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .display-1, .display-2, .display-3, .display-4, .nk-sub-title, .nk-social-links',
                    ),
                ),
                'transport' => 'auto',
            )
        );

        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h1',
                'label' => esc_html__( 'H1 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 30,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h1, .h1',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h2',
                'label' => esc_html__( 'H2 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 25,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h2, .h2',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h3',
                'label' => esc_html__( 'H3 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 22,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h3, .h3',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h4',
                'label' => esc_html__( 'H4 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 20,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h4, .h4',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h5',
                'label' => esc_html__( 'H5 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 18,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h5, .h5',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h6',
                'label' => esc_html__( 'H6 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 16,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h6, .h6',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display1',
                'label' => esc_html__( 'Display 1 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 55,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-1',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display2',
                'label' => esc_html__( 'Display 2 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 45,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-2',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display3',
                'label' => esc_html__( 'Display 3 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 40,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-3',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display4',
                'label' => esc_html__( 'Display 4 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 35,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-4',
                        'property' => 'font-size',
                        'units' => 'px',
                    ),
                ),
                'transport' => 'auto',
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_navbar_items',
                'label' => esc_html__( 'Navbar Items', 'umbrella' ),
                'section' => 'typography',
                'default' => 55,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.nk-navbar .nk-nav li',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (min-width: 991px)',
                    ),
                ),
            )
        );

        Kirki::add_field(
            'umbrella', array(
                'type'        => 'custom',
                'settings'    => 'typography_titles_mobile_description',
                'label'       => esc_html__( 'Mobile Settings', 'umbrella' ),
                'description' => esc_html__( 'Options below will be used for mobile devices. Headings for screen size <= 1199px and Navbar for screen size <= 991px', 'umbrella' ),
                'section'     => 'typography',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h1_mobile',
                'label' => esc_html__( 'H1 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 28,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h1, .h1',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h2_mobile',
                'label' => esc_html__( 'H2 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 23,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h2, .h2',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h3_mobile',
                'label' => esc_html__( 'H3 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 20,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h3, .h3',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h4_mobile',
                'label' => esc_html__( 'H4 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 18,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h4, .h4',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h5_mobile',
                'label' => esc_html__( 'H5 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 16,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h5, .h5',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_h6_mobile',
                'label' => esc_html__( 'H6 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 14,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => 'h6, .h6',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display1_mobile',
                'label' => esc_html__( 'Display 1 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 45,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-1',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display2_mobile',
                'label' => esc_html__( 'Display 2 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 38,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-2',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display3_mobile',
                'label' => esc_html__( 'Display 3 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 34,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-3',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_titles_display4_mobile',
                'label' => esc_html__( 'Display 4 Titles', 'umbrella' ),
                'section' => 'typography',
                'default' => 30,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.display-4',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 1199px)',
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type' => 'slider',
                'settings' => 'typography_navbar_items_mobile',
                'label' => esc_html__( 'Navbar Items Mobile', 'umbrella' ),
                'section' => 'typography',
                'default' => 30,
                'priority' => 10,
                'choices' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
                'output' => array(
                    array(
                        'element' => '.nk-navbar .nk-nav li',
                        'property' => 'font-size',
                        'units' => 'px',
                        'media_query' => '@media (max-width: 991px)',
                    ),
                ),
            )
        );

        /**
         * Style
         */
        $custom_style = function_exists( 'nk_theme' );
        if ( ! $custom_style ) {
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'custom',
                    'settings'    => 'style_message_without_nk_themes_helper',
                    'label'       => esc_html__( 'Required Plugin', 'umbrella' ),
                    'description' => esc_html__( 'To generate custom styles you should install nK Themes Helper Plugin', 'umbrella' ),
                    'section'     => 'style',
                    'priority'    => 10,
                )
            );
        } else {
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => 'style_custom',
                    'label'       => esc_html__( 'Enable Custom Styles', 'umbrella' ),
                    'section'     => 'style',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );

            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'color',
                    'settings'    => 'style_color_main',
                    'label'       => esc_html__( 'Main Color', 'umbrella' ),
                    'section'     => 'style',
                    'default'     => '#F44336',
                    'priority'    => 10,
                    'required'    => array(
                        array(
                            'setting'  => 'style_custom',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                )
            );

            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'color',
                    'settings'    => 'style_color_dark',
                    'label'       => esc_html__( 'Dark Color', 'umbrella' ),
                    'section'     => 'style',
                    'default'     => '#212121',
                    'priority'    => 10,
                    'required'    => array(
                        array(
                            'setting'  => 'style_custom',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                )
            );

            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'color',
                    'settings'    => 'style_color_text',
                    'label'       => esc_html__( 'Text Color', 'umbrella' ),
                    'section'     => 'style',
                    'default'     => '#FFFFFF',
                    'priority'    => 10,
                    'required'    => array(
                        array(
                            'setting'  => 'style_custom',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                )
            );

            add_action( 'customize_preview_init', 'umbrella_compile_colors' );
            add_action( 'customize_save_after', 'umbrella_compile_colors' );
            if ( ! function_exists( 'umbrella_compile_colors' ) ) :
                function umbrella_compile_colors() {
                    if ( ! nk_get_option( 'style_custom' ) ) {
                        return;
                    }

                    $file_scss = get_template_directory() . '/assets/scss/';

                    $variables_scss = '
                        @import "_variables.scss";

                        // version: 2.1.0

                        $color_main:' . nk_get_option( 'style_color_main', '#F44336' ) . ';
                        $color_back:' . nk_get_option( 'style_color_back', '#212121' ) . ';
                        $color_text:' . nk_get_option( 'style_color_text', '#FFFFFF' ) . ';

                        // main colors list
                        $colors: (
                            "main"  : $color_main,
                            "primary" : $color_primary,
                            "success" : $color_success,
                            "info"    : $color_info,
                            "warning" : $color_warning,
                            "danger"  : $color_danger,
                            "white"   : $color_text,
                            "black"   : #000,
                            "dark"  : $color_dark
                        );

                        @import "_includes.scss"';

                    // compile styles
                    nk_theme()->scss( 'umbrella-custom.min.css', $file_scss, $variables_scss );
                }
            endif;
        }

        /**
         * Single Page. Slider
         */
        if ( function_exists( 'nk_theme' ) ) :
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_active_slide',
                    'label'       => esc_html__( 'Active Slide', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slider. Make sure to active slide that placed in active category.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => key( nk_theme()->portfolio()->get_portfolio_items( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_active_category',
                    'label'       => esc_html__( 'Active Category', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slide.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => key( nk_theme()->portfolio()->get_categories( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_categories( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_transition_effect',
                    'label'       => esc_html__( 'Transition Effect', 'umbrella' ),
                    'description' => esc_html__( 'Transition effect between slides.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 'fade',
                    'choices'     => umbrella_get_slider_effects(),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => 'page_slider_transition_speed',
                    'label'       => esc_html__( 'Transition Speed', 'umbrella' ),
                    'description' => esc_html__( 'Transition speed for effect.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 500,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 20000,
                        'step'      => 1,
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_category_transition_effect',
                    'label'       => esc_html__( 'Category Transition Effect', 'umbrella' ),
                    'description' => esc_html__( 'Transition effect between categories.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 'top',
                    'choices'     => umbrella_get_slider_effects(),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => 'page_slider_category_transition_speed',
                    'label'       => esc_html__( 'Category Transition Speed', 'umbrella' ),
                    'description' => esc_html__( 'Transition speed for category effect.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 500,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 20000,
                        'step'      => 1,
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => 'page_slider_autoplay',
                    'label'       => esc_html__( 'Autoplay', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => 'page_slider_autoplay_timer',
                    'label'       => esc_html__( 'Autoplay Timer', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 3000,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 40000,
                        'step'      => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'page_slider_autoplay',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                    'priority' => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_force_reload',
                    'label'       => esc_html__( 'Force Reload Slider', 'umbrella' ),
                    'description' => esc_html__( 'Force reload the whole slider (slides, active slide and active category) when ajax page loaded.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => false,
                    'choices'     => umbrella_get_slider_effects(
                        array(
                            false      => esc_html__( 'Disable', 'umbrella' ),
                        )
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => 'page_slider_enable_custom_set_of_slides',
                    'label'       => esc_html__( 'Custom Set of Slides', 'umbrella' ),
                    'description' => esc_html__( 'If you don\'t want to use default set of slides, you can set your own.', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_custom_set_of_slides',
                    'label'       => esc_html__( 'Slides', 'umbrella' ),
                    'section'     => 'page_slider',
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'multiple'    => 999,
                    'active_callback' => array(
                        array(
                            'setting'  => 'page_slider_enable_custom_set_of_slides',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                    'priority' => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'page_slider_navigation_style',
                    'label'       => esc_html__( 'Navigation Style', 'umbrella' ),
                    'section'     => 'page_slider',
                    'default'     => 'full',
                    'choices'     => umbrella_get_slider_nav_styles(),
                    'priority'    => 10,
                )
            );
        endif;

        /**
         * Single Page. Titles
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'select',
                'settings'    => 'page_layout_content_title_custom',
                'label'       => esc_html__( 'Title', 'umbrella' ),
                'description' => esc_html__( 'Big text in center of screen with main text color.', 'umbrella' ),
                'section'     => 'page_titles',
                'default'     => '',
                'choices'     => array(
                    'the_title'  => esc_html__( 'Page Title', 'umbrella' ),
                    'custom'     => esc_html__( 'Custom', 'umbrella' ),
                ),
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => 'page_layout_content_title',
                'label'       => esc_html__( 'Type Title', 'umbrella' ),
                'section'     => 'page_titles',
                'default'     => 'Start Cheering.',
                'active_callback' => array(
                    array(
                        'setting'  => 'page_layout_content_title_custom',
                        'operator' => '==',
                        'value'    => 'custom',
                    ),
                ),
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => 'page_layout_content_subtitle',
                'label'       => esc_html__( 'Subtitle', 'umbrella' ),
                'section'     => 'page_titles',
                'default'     => 'The Supermodels Always Bring Their Flawless Festival Style to Rio',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => 'page_layout_content_tagline',
                'label'       => esc_html__( 'Tagline', 'umbrella' ),
                'section'     => 'page_titles',
                'default'     => '12 Years of Experience',
                'priority'    => 10,
            )
        );

        /**
         * Single Page. Navigations
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_top_left_navigation_show',
                'label'       => esc_html__( 'Show Top Left Navigation', 'umbrella' ),
                'section'     => 'page_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_bottom_left_navigation_show',
                'label'       => esc_html__( 'Show Bottom Left Navigation', 'umbrella' ),
                'section'     => 'page_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_bottom_center_navigation_show',
                'label'       => esc_html__( 'Show Bottom Center Navigation', 'umbrella' ),
                'section'     => 'page_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );

        /**
         * Single Page. Content
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_show_content',
                'label'       => esc_html__( 'Show Content', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_content_show_default_title',
                'label'       => esc_html__( 'Show Default Title', 'umbrella' ),
                'description' => esc_html__( 'Show current page title. Disable it If you want to add custom title in content.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'on',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'select',
                'settings'    => 'page_content_vertical_align',
                'label'       => esc_html__( 'Vertical Align', 'umbrella' ),
                'description' => esc_html__( 'Vertical position for content.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'top',
                'choices'     => array(
                    'top'        => esc_html__( 'Top', 'umbrella' ),
                    'center'     => esc_html__( 'Center', 'umbrella' ),
                    'bottom'     => esc_html__( 'Bottom', 'umbrella' ),
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'page_content_under_title',
                'label'       => esc_html__( 'Under Title', 'umbrella' ),
                'description' => esc_html__( 'Big title in center of screen will be above background of content and under content text.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'off',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'select',
                'settings'    => 'page_content_transition_in',
                'label'       => esc_html__( 'Transition In', 'umbrella' ),
                'description' => esc_html__( 'Show animation for content block.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'bottom',
                'choices'     => array(
                    'top'        => esc_html__( 'Top', 'umbrella' ),
                    'bottom'     => esc_html__( 'Bottom', 'umbrella' ),
                    'right'      => esc_html__( 'Right', 'umbrella' ),
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'select',
                'settings'    => 'page_content_transition_out',
                'label'       => esc_html__( 'Transition Out', 'umbrella' ),
                'description' => esc_html__( 'Hide animation for content block.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 'right',
                'choices'     => array(
                    'top'        => esc_html__( 'Top', 'umbrella' ),
                    'bottom'     => esc_html__( 'Bottom', 'umbrella' ),
                    'right'      => esc_html__( 'Right', 'umbrella' ),
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'slider',
                'settings'    => 'page_content_transition_speed',
                'label'       => esc_html__( 'Transition Speed [ms]', 'umbrella' ),
                'description' => esc_html__( 'Speed for In and Out animations.', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 500,
                'choices'     => array(
                    'min'       => 0,
                    'max'       => 10000,
                    'step'      => 1,
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'color',
                'settings'    => 'page_content_background_color',
                'label'       => esc_html__( 'Background Color', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => '#FFFFFF',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'slider',
                'settings'    => 'page_content_background_opacity',
                'label'       => esc_html__( 'Background Opacity', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 100,
                'choices'     => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1,
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'color',
                'settings'    => 'page_content_background_color_mobile',
                'label'       => esc_html__( 'Background Color Mobile', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => '#FFFFFF',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'slider',
                'settings'    => 'page_content_background_opacity_mobile',
                'label'       => esc_html__( 'Background Opacity Mobile', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => 100,
                'choices'     => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1,
                ),
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'color',
                'settings'    => 'page_content_text_color',
                'label'       => esc_html__( 'Text Color', 'umbrella' ),
                'section'     => 'page_content',
                'default'     => '#212121',
                'priority'    => 10,
                'active_callback' => array(
                    array(
                        'setting'  => 'page_show_content',
                        'operator' => '==',
                        'value'    => 1,
                    ),
                ),
            )
        );

        /**
         * Archive. Slider
         */
        if ( function_exists( 'nk_theme' ) ) :
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'archive_slider_active_slide',
                    'label'       => esc_html__( 'Active Slide', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slider. Make sure to active slide that placed in active category.', 'umbrella' ),
                    'section'     => 'archive_slider',
                    'default'     => key( nk_theme()->portfolio()->get_portfolio_items( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'archive_slider_active_category',
                    'label'       => esc_html__( 'Active Category', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slide.', 'umbrella' ),
                    'section'     => 'archive_slider',
                    'default'     => key( nk_theme()->portfolio()->get_categories( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_categories( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'archive_slider_force_reload',
                    'label'       => esc_html__( 'Force Reload Slider', 'umbrella' ),
                    'description' => esc_html__( 'Force reload the whole slider (slides, active slide and active category) when ajax page loaded.', 'umbrella' ),
                    'section'     => 'archive_slider',
                    'default'     => false,
                    'choices'     => umbrella_get_slider_effects(
                        array(
                            false      => esc_html__( 'Disable', 'umbrella' ),
                        )
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => 'archive_slider_enable_custom_set_of_slides',
                    'label'       => esc_html__( 'Custom Set of Slides', 'umbrella' ),
                    'description' => esc_html__( 'If you don\'t want to use default set of slides, you can set your own.', 'umbrella' ),
                    'section'     => 'archive_slider',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => 'archive_slider_custom_set_of_slides',
                    'label'       => esc_html__( 'Slides', 'umbrella' ),
                    'section'     => 'archive_slider',
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'multiple'    => 999,
                    'active_callback' => array(
                        array(
                            'setting'  => 'archive_slider_enable_custom_set_of_slides',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                    'priority' => 10,
                )
            );
        endif;

        /**
         * Archive. Navigations
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'archive_top_left_navigation_show',
                'label'       => esc_html__( 'Show Top Left Navigation', 'umbrella' ),
                'section'     => 'archive_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'archive_bottom_left_navigation_show',
                'label'       => esc_html__( 'Show Bottom Left Navigation', 'umbrella' ),
                'section'     => 'archive_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => 'archive_bottom_center_navigation_show',
                'label'       => esc_html__( 'Show Bottom Center Navigation', 'umbrella' ),
                'section'     => 'archive_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );

        /**
         * 404. Slider
         */
        if ( function_exists( 'nk_theme' ) ) :
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_active_slide',
                    'label'       => esc_html__( 'Active Slide', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slider. Make sure to active slide that placed in active category.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => key( nk_theme()->portfolio()->get_portfolio_items( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_active_category',
                    'label'       => esc_html__( 'Active Category', 'umbrella' ),
                    'description' => esc_html__( 'Select active category for slide.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => key( nk_theme()->portfolio()->get_categories( 'compact' ) ),
                    'choices'     => nk_theme()->portfolio()->get_categories( 'compact' ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_transition_effect',
                    'label'       => esc_html__( 'Transition Effect', 'umbrella' ),
                    'description' => esc_html__( 'Transition effect between slides.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 'fade',
                    'choices'     => umbrella_get_slider_effects(),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => '404_slider_transition_speed',
                    'label'       => esc_html__( 'Transition Speed', 'umbrella' ),
                    'description' => esc_html__( 'Transition speed for effect.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 500,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 20000,
                        'step'      => 1,
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_category_transition_effect',
                    'label'       => esc_html__( 'Category Transition Effect', 'umbrella' ),
                    'description' => esc_html__( 'Transition effect between categories.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 'top',
                    'choices'     => umbrella_get_slider_effects(),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => '404_slider_category_transition_speed',
                    'label'       => esc_html__( 'Category Transition Speed', 'umbrella' ),
                    'description' => esc_html__( 'Transition speed for category effect.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 500,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 20000,
                        'step'      => 1,
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => '404_slider_autoplay',
                    'label'       => esc_html__( 'Autoplay', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'slider',
                    'settings'    => '404_slider_autoplay_timer',
                    'label'       => esc_html__( 'Autoplay Timer', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 3000,
                    'choices'     => array(
                        'min'       => 100,
                        'max'       => 40000,
                        'step'      => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => '404_slider_autoplay',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                    'priority' => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_force_reload',
                    'label'       => esc_html__( 'Force Reload Slider', 'umbrella' ),
                    'description' => esc_html__( 'Force reload the whole slider (slides, active slide and active category) when ajax page loaded.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => false,
                    'choices'     => umbrella_get_slider_effects(
                        array(
                            false      => esc_html__( 'Disable', 'umbrella' ),
                        )
                    ),
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'toggle',
                    'settings'    => '404_slider_enable_custom_set_of_slides',
                    'label'       => esc_html__( 'Custom Set of Slides', 'umbrella' ),
                    'description' => esc_html__( 'If you don\'t want to use default set of slides, you can set your own.', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 'off',
                    'priority'    => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_custom_set_of_slides',
                    'label'       => esc_html__( 'Slides', 'umbrella' ),
                    'section'     => '404_slider',
                    'choices'     => nk_theme()->portfolio()->get_portfolio_items( 'compact' ),
                    'multiple'    => 999,
                    'active_callback' => array(
                        array(
                            'setting'  => '404_slider_enable_custom_set_of_slides',
                            'operator' => '==',
                            'value'    => 1,
                        ),
                    ),
                    'priority' => 10,
                )
            );
            Kirki::add_field(
                'umbrella', array(
                    'type'        => 'select',
                    'settings'    => '404_slider_navigation_style',
                    'label'       => esc_html__( 'Navigation Style', 'umbrella' ),
                    'section'     => '404_slider',
                    'default'     => 'full',
                    'choices'     => umbrella_get_slider_nav_styles(),
                    'priority'    => 10,
                )
            );
        endif;

        /**
         * 404. Titles
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => '404_layout_content_title',
                'label'       => esc_html__( 'Type Title', 'umbrella' ),
                'section'     => '404_titles',
                'default'     => '404.',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => '404_layout_content_subtitle',
                'label'       => esc_html__( 'Subtitle', 'umbrella' ),
                'section'     => '404_titles',
                'default'     => 'Oops! That page can\'t be found.',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'text',
                'settings'    => '404_layout_content_tagline',
                'label'       => esc_html__( 'Tagline', 'umbrella' ),
                'section'     => '404_titles',
                'default'     => '',
                'priority'    => 10,
            )
        );

        /**
         * 404. Navigations
         */
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => '404_top_left_navigation_show',
                'label'       => esc_html__( 'Show Top Left Navigation', 'umbrella' ),
                'section'     => '404_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => '404_bottom_left_navigation_show',
                'label'       => esc_html__( 'Show Bottom Left Navigation', 'umbrella' ),
                'section'     => '404_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
        Kirki::add_field(
            'umbrella', array(
                'type'        => 'toggle',
                'settings'    => '404_bottom_center_navigation_show',
                'label'       => esc_html__( 'Show Bottom Center Navigation', 'umbrella' ),
                'section'     => '404_navigations',
                'default'     => 'on',
                'priority'    => 10,
            )
        );
    }
}
add_action( 'init', 'initial_kirki_options' );
