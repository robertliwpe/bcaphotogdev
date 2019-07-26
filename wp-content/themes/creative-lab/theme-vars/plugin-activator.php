<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.0
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


require_once(get_template_directory() . '/framework/class/class-tgm-plugin-activation.php');


if (!function_exists('creative_lab_register_theme_plugins')) {

function creative_lab_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Contact Form Builder', 'creative-lab'), 
			'slug'					=> 'cmsmasters-contact-form-builder', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-contact-form-builder.zip', 
			'required'				=> false, 
			'version'				=> '1.4.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'creative-lab'), 
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '2.3.8', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'creative-lab'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.9', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Importer', 'creative-lab'), 
			'slug'					=> 'cmsmasters-importer', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-importer.zip', 
			'required'				=> true, 
			'version'				=> '1.0.5', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Custom Fonts', 'creative-lab'), 
			'slug'					=> 'cmsmasters-custom-fonts', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/cmsmasters-custom-fonts.zip', 
			'required'				=> true, 
			'version'				=> '1.0.1', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'creative-lab'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '6.8.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'creative-lab'), 
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory() . '/theme-vars/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '5.4.8.3', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('Envato Market', 'creative-lab'), 
			'slug'					=> 'envato-market', 
			'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('GDPR Cookie Consent', 'creative-lab'), 
			'slug'					=> 'cookie-law-info', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WooCommerce', 'creative-lab'), 
			'slug' 					=> 'woocommerce', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('Instagram Feed', 'creative-lab'), 
			'slug'					=> 'instagram-feed', 
			'required'				=> false 
 		), 
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'creative-lab'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WordPress SEO by Yoast', 'creative-lab'), 
			'slug' 					=> 'wordpress-seo', 
			'required' 				=> false 
		) 
	);
	
	
	$config = array( 
		'id' => 			'creative-lab', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'creative-lab'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'creative-lab'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'creative-lab') 
		) 
	);
	
	
	tgmpa($plugins, $config);
}

}

add_action('tgmpa_register', 'creative_lab_register_theme_plugins');

