<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.8
 * 
 * Admin Panel Scripts & Styles
 * Created by CMSMasters
 * 
 */


function creative_lab_admin_register($hook) {
	global $pagenow;
	
	$screen = get_current_screen();
	
	
	wp_enqueue_style('wp-color-picker');
	
	wp_enqueue_script('wp-color-picker');
	
	wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/framework/admin/inc/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.1.0', true);
	
	
	wp_enqueue_style('creative-lab-admin-icons-font', get_template_directory_uri() . '/framework/admin/inc/css/admin-icons-font.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('creative-lab-lightbox', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('creative-lab-lightbox-rtl', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('creative-lab-uploader-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersUploader.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('creative-lab-uploader-js', 'cmsmasters_admin_uploader', array( 
		'choose' => 				esc_attr__('Choose image', 'creative-lab'), 
		'insert' => 				esc_attr__('Insert image', 'creative-lab'), 
		'remove' => 				esc_attr__('Remove', 'creative-lab'), 
		'edit_gallery' => 			esc_attr__('Edit gallery', 'creative-lab') 
	));
	
	
	wp_enqueue_script('creative-lab-lightbox-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersLightbox.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('creative-lab-lightbox-js', 'cmsmasters_admin_lightbox', array( 
		'cancel' => 				esc_attr__('Cancel', 'creative-lab'), 
		'insert' => 				esc_attr__('Insert', 'creative-lab'), 
		'deselect' => 				esc_attr__('Deselect', 'creative-lab'), 
		'choose_icon' => 			esc_attr__('Choose Icon', 'creative-lab'), 
		'find_icons' => 			esc_attr__('Find icons', 'creative-lab'), 
		'min_length' => 			esc_attr__('min 2 symbols', 'creative-lab'), 
		'choose_font' => 			esc_attr__('Choose icons font', 'creative-lab'), 
		'error_on_page' => 			esc_attr__("Error on page!\nReload page and try again.", 'creative-lab') 
	));
	
	
	if ( 
		$hook == 'post.php' || 
		$hook == 'post-new.php' || 
		$hook == 'widgets.php' || 
		$hook == 'term.php' || 
		$hook == 'edit-tags.php' || 
		$hook == 'nav-menus.php' || 
		str_replace('cmsmasters-settings-element', '', $screen->id) != $screen->id 
	) {
		wp_enqueue_style('creative-lab-icons', get_template_directory_uri() . '/css/fontello.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_style('creative-lab-icons-custom', get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/css/fontello-custom.css', array(), '1.0.0', 'screen');
	}
	
	
	if ( 
		$hook == 'widgets.php' || 
		$hook == 'nav-menus.php' 
	) {
		wp_enqueue_media();
	}
	
	
	wp_enqueue_style('creative-lab-admin-styles', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('creative-lab-admin-styles-rtl', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('creative-lab-admin-scripts', get_template_directory_uri() . '/framework/admin/inc/js/admin-theme-scripts.js', array('jquery'), '1.0.0', true);
	
	
	if ($hook == 'widgets.php') {
		wp_enqueue_style('creative-lab-widgets-styles', get_template_directory_uri() . '/framework/admin/inc/css/widgets-styles.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_script('creative-lab-widgets-scripts', get_template_directory_uri() . '/framework/admin/inc/js/widgets-scripts.js', array('jquery'), '1.0.0', true);
	}
}

add_action('admin_enqueue_scripts', 'creative_lab_admin_register');

add_action('admin_enqueue_scripts', 'cmsmasters_composer_icons');

