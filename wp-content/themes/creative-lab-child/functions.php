<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab Child
 * @version		1.0.0
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function creative_lab_child_enqueue_styles() {
    wp_enqueue_style('creative-lab-child-style', get_stylesheet_uri(), array('creative-lab-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'creative_lab_child_enqueue_styles', 11);
?>