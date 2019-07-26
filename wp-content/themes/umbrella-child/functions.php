<?php
/**
 * Umbrella Child functions and definitions
 *
 * @package umbrella-child
 */

add_action( 'wp_enqueue_scripts', 'umbrella_child_enqueue_styles', 15 );
if ( ! function_exists( 'umbrella_child_enqueue_styles' ) ) :
    /**
     * Enqueue child theme styles
     */
    function umbrella_child_enqueue_styles() {
        wp_enqueue_style( 'umbrella-child', get_stylesheet_directory_uri() . '/style.css' );
        wp_enqueue_script( 'umbrella-child', get_stylesheet_directory_uri() . '/script.js', array( 'jquery' ) );
    }
endif;
