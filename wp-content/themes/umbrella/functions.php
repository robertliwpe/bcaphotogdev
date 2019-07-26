<?php
/**
 * umbrella functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package umbrella
 */

if ( ! function_exists( 'umbrella_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function umbrella_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on umbrella, use a find and replace
         * to change 'umbrella' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'umbrella', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary', 'umbrella' ),
                'top_left' => esc_html__( 'Top Left', 'umbrella' ),
                'bottom_left' => esc_html__( 'Bottom Left', 'umbrella' ),
                'bottom_left_blog' => esc_html__( 'Bottom Left for Blog', 'umbrella' ),
                'bottom_center' => esc_html__( 'Bottom Center', 'umbrella' ),
            )
        );

        // Add default image sizes
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'nk_150x150_crop', 150, 150, true );
        add_image_size( 'nk_150x150', 150 );
        add_image_size( 'nk_300x300_crop', 300, 300, true );
        add_image_size( 'nk_300x300', 300 );
        add_image_size( 'nk_500x500_crop', 500, 500, true );
        add_image_size( 'nk_500x500', 500 );
        add_image_size( 'nk_800x600_crop', 800, 600, true );
        add_image_size( 'nk_800x600', 800 );
        add_image_size( 'nk_1280x720_crop', 1280, 720, true );
        add_image_size( 'nk_1280x720', 1280 );
        add_image_size( 'nk_1440x900_crop', 1440, 900, true );
        add_image_size( 'nk_1440x900', 1440 );
        add_image_size( 'nk_1920x1080_crop', 1920, 1080, true );
        add_image_size( 'nk_1920x1080', 1920 );

        // Register the three useful image sizes for use in Add Media modal
        add_filter( 'image_size_names_choose', 'umbrella_custom_sizes' );
        if ( ! function_exists( 'umbrella_custom_sizes' ) ) :
            function umbrella_custom_sizes( $sizes ) {
                return array_merge(
                    $sizes, array(
                        'nk_150x150_crop' => '150x150 crop',
                        'nk_150x150' => '150x150',
                        'nk_300x300_crop' => '300x300 crop',
                        'nk_300x300' => '300x300',
                        'nk_500x500_crop' => '500x500 crop',
                        'nk_500x500' => '500x500',
                        'nk_800x600_crop' => '800x600 crop',
                        'nk_800x600' => '800x600',
                        'nk_1280x720_crop' => '1280x720 crop',
                        'nk_1280x720' => '1280x720',
                        'nk_1440x900_crop' => '1440x900 crop',
                        'nk_1440x900' => '1440x900',
                        'nk_1920x1080_crop' => '1920x1080 crop',
                        'nk_1920x1080' => '1920x1080',
                    )
                );
            }
        endif;

        // add editor style control
        add_editor_style();
    }
endif;
add_action( 'after_setup_theme', 'umbrella_setup' );


/**
 * Content Width Define
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1920;
}

/*
 * add portfolio support
 */
if ( function_exists( 'nk_theme' ) ) {
    nk_theme()->portfolio(
        array(
            'tags' => false,
        )
    );

    // portfolio parameters
    if ( ! function_exists( 'nk_portfolio_params' ) ) {
        function nk_portfolio_params( $params = array() ) {
            $params['supports'] = array(
                'title',
                'thumbnail',
                'revisions',
            );
            $params['public'] = false;
            $params['show_ui'] = true;
            return $params;
        }
    }
    add_filter( 'nk_portfolio_params', 'nk_portfolio_params' );

    // portfolio category parameters
    if ( ! function_exists( 'nk_portfolio_categories_params' ) ) {
        function nk_portfolio_categories_params( $params = array() ) {
            $params['public'] = false;
            $params['show_ui'] = true;
            $params['show_tagcloud'] = false;
            $params['show_in_nav_menus'] = false;
            $params['hierarchical'] = false;
            $params['query_var'] = false;
            return $params;
        }
    }
    add_filter( 'nk_portfolio_categories_params', 'nk_portfolio_categories_params' );
}


/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'umbrella_scripts' ) ) :
    function umbrella_scripts() {
        // custom styles
        $umbrella_url = get_template_directory_uri() . '/assets/scss/umbrella.min.css';
        $umbrella_version = '2.1.0';
        if ( nk_get_option( 'style_custom' ) && function_exists( 'nk_theme' ) && nk_theme()->get_compiled_css_url( 'umbrella-custom.min.css' ) ) {
            $umbrella_url = nk_theme()->get_compiled_css_url( 'umbrella-custom.min.css' );
            $umbrella_version = nk_theme()->get_compiled_css_version( 'umbrella-custom.min.css' );
        }

        // fix for King Composer and AJAX
        if ( class_exists( 'KingComposer' ) ) {
            wp_enqueue_script( 'prettyPhoto' );
            wp_enqueue_style( 'prettyPhoto' );
            wp_enqueue_script( 'kc-video-play' );
        }

        // styles
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'umbrella', $umbrella_url, '', $umbrella_version );
        wp_enqueue_style( 'umbrella-style', get_template_directory_uri() . '/style.css' );

        // scripts
        wp_enqueue_script( 'umbrella-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
        wp_enqueue_script( 'umbrella-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

        wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/vendor/gsap/src/minified/TweenMax.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'gsap-scroll-to-plugin', get_template_directory_uri() . '/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'history', get_template_directory_uri() . '/assets/vendor/history.js/jquery.history.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/vendor/popper.js/dist/umd/popper.min.js', array(), '', true );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'jquery-validation', get_template_directory_uri() . '/assets/vendor/jquery-validation/dist/jquery.validate.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'hammer', get_template_directory_uri() . '/assets/vendor/hammerjs/hammer.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'nanoscroller', get_template_directory_uri() . '/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'background-check', get_template_directory_uri() . '/assets/vendor/background-check/background-check.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'jarallax-video', get_template_directory_uri() . '/assets/vendor/jarallax/dist/jarallax-video.min.js', '', '1.10.7', true );
        wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/assets/vendor/lazysizes/lazysizes.js', '', '', true );
        wp_enqueue_script( 'object-fit-images', get_template_directory_uri() . '/assets/vendor/object-fit-images/dist/ofi.min.js', '', '', true );

        // Umbrella
        wp_enqueue_script( 'umbrella', get_template_directory_uri() . '/assets/js/umbrella.min.js', array( 'jquery', 'tween-max', 'gsap-scroll-to-plugin', 'history', 'popper', 'bootstrap', 'jquery-validation', 'hammer', 'nanoscroller', 'background-check', 'jarallax-video', 'lazysizes', 'object-fit-images' ), '1.1.5', true );

        wp_enqueue_script( 'umbrella-init', get_template_directory_uri() . '/assets/js/umbrella-init.js', array( 'umbrella' ), '', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'umbrella_scripts' );


/* Disable html top margin */
add_action( 'get_header', 'remove_admin_login_header' );
function remove_admin_login_header() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Functions to manipulate with colors
 */
require get_template_directory() . '/inc/colors.php';

/**
 * Admin References
 */
require get_template_directory() . '/admin/admin.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Comments Walker
 */
require get_template_directory() . '/inc/comments-walker.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
