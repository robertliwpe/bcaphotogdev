<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.8
 * 
 * Theme Vars Functions
 * Created by CMSMasters
 * 
 */


/* Register CSS Styles */
function creative_lab_vars_register_css_styles() {
	wp_enqueue_style('creative-lab-theme-vars-style', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/vars-style.css', array('creative-lab-retina'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'creative_lab_vars_register_css_styles');

