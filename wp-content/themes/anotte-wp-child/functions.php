<?php


function anotte_wp_child_enqueue_styles() {  
    wp_enqueue_style( 'anotte-main-theme-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'anotte-child-main-theme-style',get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'anotte_wp_child_enqueue_styles', 11);

function anotte_child_lang_setup() {
    load_child_theme_textdomain( 'anotte-wp', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'anotte_child_lang_setup' );

?>