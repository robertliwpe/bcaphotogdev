<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.1.1
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('creative_lab_settings_general_defaults')) {

function creative_lab_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'creative-lab' . '_theme_layout' => 		'liquid', 
			'creative-lab' . '_logo_type' => 			'image', 
			'creative-lab' . '_logo_url' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'creative-lab' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'creative-lab' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Creative Lab', 
			'creative-lab' . '_logo_subtitle' => 		'', 
			'creative-lab' . '_logo_custom_color' => 	0, 
			'creative-lab' . '_logo_title_color' => 	'', 
			'creative-lab' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'creative-lab' . '_bg_col' => 			'#f1f1f1', 
			'creative-lab' . '_bg_img_enable' => 	0, 
			'creative-lab' . '_bg_img' => 			'', 
			'creative-lab' . '_bg_rep' => 			'no-repeat', 
			'creative-lab' . '_bg_pos' => 			'top center', 
			'creative-lab' . '_bg_att' => 			'scroll', 
			'creative-lab' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'creative-lab' . '_fixed_header' => 				1, 
			'creative-lab' . '_header_overlaps' => 				1, 
			'creative-lab' . '_header_top_line' => 				0, 
			'creative-lab' . '_header_top_height' => 			'40', 
			'creative-lab' . '_header_top_line_short_info' => 	'', 
			'creative-lab' . '_header_top_line_add_cont' => 	'nav', 
			'creative-lab' . '_header_styles' => 				'default', 
			'creative-lab' . '_header_mid_height' => 			'71', 
			'creative-lab' . '_header_bot_height' => 			'52', 
			'creative-lab' . '_header_search' => 				1, 
			'creative-lab' . '_header_add_cont' => 				'social', 
			'creative-lab' . '_header_add_cont_cust_html' => 	'', 
			'creative-lab' . '_woocommerce_cart_dropdown' => 	0
		), 
		'content' => array( 
			'creative-lab' . '_layout' => 					'r_sidebar', 
			'creative-lab' . '_archives_layout' => 			'r_sidebar', 
			'creative-lab' . '_search_layout' => 			'r_sidebar', 
			'creative-lab' . '_other_layout' => 			'r_sidebar', 
			'creative-lab' . '_heading_alignment' => 		'center', 
			'creative-lab' . '_heading_scheme' => 			'default', 
			'creative-lab' . '_heading_bg_image_enable' => 	1, 
			'creative-lab' . '_heading_bg_image' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/heading_bg.jpg', 
			'creative-lab' . '_heading_bg_repeat' => 		'no-repeat', 
			'creative-lab' . '_heading_bg_attachment' => 	'scroll', 
			'creative-lab' . '_heading_bg_size' => 			'cover', 
			'creative-lab' . '_heading_bg_color' => 		'', 
			'creative-lab' . '_heading_height' => 			'420', 
			'creative-lab' . '_breadcrumbs' => 				1, 
			'creative-lab' . '_bottom_scheme' => 			'footer', 
			'creative-lab' . '_bottom_sidebar' => 			0, 
			'creative-lab' . '_bottom_sidebar_layout' => 	'14141414' 
		), 
		'footer' => array( 
			'creative-lab' . '_footer_scheme' => 				'footer', 
			'creative-lab' . '_footer_type' => 					'default', 
			'creative-lab' . '_footer_additional_content' => 	'nav', 
			'creative-lab' . '_footer_logo' => 					1, 
			'creative-lab' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'creative-lab' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'creative-lab' . '_footer_nav' => 					0, 
			'creative-lab' . '_footer_social' => 				0, 
			'creative-lab' . '_footer_html' => 					'', 
			'creative-lab' . '_footer_copyright' => 			'Creative Lab' . ' &copy; ' . date('Y') . ' / ' . esc_html__('All Rights Reserved', 'creative-lab') 
		) 
	);
	
	
	$settings = apply_filters('creative_lab_settings_general_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Theme Settings Fonts Default Values */
if (!function_exists('creative_lab_settings_font_defaults')) {

function creative_lab_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'creative-lab' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'creative-lab' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'creative-lab' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'creative-lab' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'18', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			) 
		), 
		'heading' => array( 
			'creative-lab' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'48', 
				'line_height' => 		'58', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'32', 
				'line_height' => 		'40', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'26', 
				'line_height' => 		'32', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'24', 
				'line_height' => 		'30', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'20', 
				'line_height' => 		'26', 
				'font_weight' => 		'500', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'creative-lab' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'creative-lab' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'42', 
				'font_weight' => 		'700', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'creative-lab' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'creative-lab' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'creative-lab' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Fjord+One:400', 
				'font_size' => 			'24', 
				'line_height' => 		'40', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		),
		'google' => array( 
			'creative-lab' . '_google_web_fonts' => array( 
				'Fjord+One:400|Fjord One',
				'Fira+Sans:300,300italic,400,400italic,500,500italic,700,700italic|Fira Sans',
				'Playfair+Display:400,400i,700,700i,900,900i|Playfair Display',
				'Roboto:300,300italic,400,400italic,500,500italic,700,700italic|Roboto', 
				'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
				'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
				'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
				'Droid+Sans:400,700|Droid Sans', 
				'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
				'PT+Sans:400,400italic,700,700italic|PT Sans', 
				'PT+Sans+Caption:400,700|PT Sans Caption', 
				'PT+Sans+Narrow:400,700|PT Sans Narrow', 
				'PT+Serif:400,400italic,700,700italic|PT Serif', 
				'Ubuntu:400,400italic,700,700italic|Ubuntu', 
				'Ubuntu+Condensed|Ubuntu Condensed', 
				'Headland+One|Headland One', 
				'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
				'Lato:400,400italic,700,700italic|Lato', 
				'Cuprum:400,400italic,700,700italic|Cuprum', 
				'Oswald:300,400,700|Oswald', 
				'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
				'Lobster|Lobster', 
				'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
				'Questrial|Questrial', 
				'Raleway:300,400,500,600,700|Raleway', 
				'Dosis:300,400,500,700|Dosis', 
				'Cutive+Mono|Cutive Mono', 
				'Quicksand:300,400,700|Quicksand', 
				'Montserrat:400,700|Montserrat', 
				'Cookie|Cookie' 
			) 
		)  
	);
	
	
	$settings = apply_filters('creative_lab_settings_font_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#706d76', 
		'#8384e3', 
		'#a8a6aa', 
		'#413d49', 
		'#f1f1f1', 
		'#fafafa', 
		'#dbdbdb', 
		'#ffffff' 
	);
	
	
	return apply_filters('cmsmasters_color_picker_palettes_filter', $palettes);
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('creative_lab_color_schemes_defaults')) {

function creative_lab_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#706d76', 
			'link' => 		'#8384e3', 
			'hover' => 		'#a8a6aa', 
			'heading' => 	'#413d49', 
			'bg' => 		'#f1f1f1', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#dbdbdb', 
			'secondary' => 	'#ffffff' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#ffffff', 
			'mid_link' => 		'#ffffff', 
			'mid_hover' => 		'#ffffff', 
			'mid_bg' => 		'rgba(255,255,255,0)', 
			'mid_bg_scroll' => 	'rgba(45,45,45,0.9)', 
			'mid_border' => 	'rgba(255,255,255,0.1)', 
			'bot_color' => 		'#ffffff', 
			'bot_link' => 		'#ffffff', 
			'bot_hover' => 		'#ffffff', 
			'bot_bg' => 		'rgba(255,255,255,0)', 
			'bot_bg_scroll' => 	'rgba(45,45,45,0.9)', 
			'bot_border' => 	'rgba(255,255,255,0.1)', 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#ffffff', 
			'title_link_hover' => 		'rgba(255,255,255,0.7)', 
			'title_link_current' => 	'#ffffff', 
			'title_link_subtitle' => 	'rgba(255,255,255,0.8)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'#818181', 
			'dropdown_bg' => 			'#2d2d2d', 
			'dropdown_border' => 		'#2d2d2d', 
			'dropdown_link' => 			'#818181', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_subtitle' => '#666666', 
			'dropdown_link_highlight' => '#75b9f6', 
			'dropdown_link_border' => 	'rgba(255,255,255,0.05)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#ffffff', 
			'link' => 					'#ffffff', 
			'hover' => 					'rgba(255,255,255,0.7)', 
			'bg' => 					'rgba(255,255,255,0)', 
			'border' => 				'rgba(255,255,255,0.1)', 
			'title_link' => 			'#ffffff', 
			'title_link_hover' => 		'rgba(255,255,255,0.7)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_bg' => 			'#2d2d2d', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'#818181', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'#706d76', 
			'link' => 		'#413d49', 
			'hover' => 		'#a8a6aa', 
			'heading' => 	'#413d49', 
			'bg' => 		'#f1f1f1', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#dbdbdb', 
			'secondary' => 	'#ffffff' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#706d76', 
			'link' => 		'#8384e3', 
			'hover' => 		'#a8a6aa', 
			'heading' => 	'#787aa0', 
			'bg' => 		'#f1f1f1', 
			'alternate' => 	'#fafafa', 
			'border' => 	'#dbdbdb', 
			'secondary' => 	'#ffffff' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#ffffff', 
			'link' => 		'#ffffff', 
			'hover' => 		'#a8a6aa', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#f1f1f1', 
			'alternate' => 	'#fafafa', 
			'border' => 	'rgba(255,255,255,0.2)', 
			'secondary' => 	'#ffffff' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#878787', 
			'link' => 		'#ff6c2f', 
			'hover' => 		'#3b3b3b', 
			'heading' => 	'#292929', 
			'bg' => 		'#fbfbfb', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#e4e4e4', 
			'secondary' => 	'#ffffff' 
		) 
	);
	
	
	$settings = apply_filters('creative_lab_color_schemes_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('creative_lab_settings_element_defaults')) {

function creative_lab_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'creative-lab' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'creative-lab' . '_social_icons' => array( 
				'cmsmasters-icon-linkedin|#|' . esc_html__('Linkedin', 'creative-lab') . '|true||', 
				'cmsmasters-icon-facebook|#|' . esc_html__('Facebook', 'creative-lab') . '|true||', 
				'cmsmasters-icon-google|#|' . esc_html__('Google', 'creative-lab') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'creative-lab') . '|true||', 
				'cmsmasters-icon-skype|#|' . esc_html__('Skype', 'creative-lab') . '|true||' 
			) 
		), 
		'lightbox' => array( 
			'creative-lab' . '_ilightbox_skin' => 					'dark', 
			'creative-lab' . '_ilightbox_path' => 					'vertical', 
			'creative-lab' . '_ilightbox_infinite' => 				0, 
			'creative-lab' . '_ilightbox_aspect_ratio' => 			1, 
			'creative-lab' . '_ilightbox_mobile_optimizer' => 		1, 
			'creative-lab' . '_ilightbox_max_scale' => 				1, 
			'creative-lab' . '_ilightbox_min_scale' => 				0.2, 
			'creative-lab' . '_ilightbox_inner_toolbar' => 			0, 
			'creative-lab' . '_ilightbox_smart_recognition' => 		0, 
			'creative-lab' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'creative-lab' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'creative-lab' . '_ilightbox_controls_toolbar' => 		1, 
			'creative-lab' . '_ilightbox_controls_arrows' => 		0, 
			'creative-lab' . '_ilightbox_controls_fullscreen' => 	1, 
			'creative-lab' . '_ilightbox_controls_thumbnail' => 	1, 
			'creative-lab' . '_ilightbox_controls_keyboard' => 		1, 
			'creative-lab' . '_ilightbox_controls_mousewheel' => 	1, 
			'creative-lab' . '_ilightbox_controls_swipe' => 		1, 
			'creative-lab' . '_ilightbox_controls_slideshow' => 	0 
		), 
		'sitemap' => array( 
			'creative-lab' . '_sitemap_nav' => 			1, 
			'creative-lab' . '_sitemap_categs' => 		1, 
			'creative-lab' . '_sitemap_tags' => 		1, 
			'creative-lab' . '_sitemap_month' => 		1, 
			'creative-lab' . '_sitemap_pj_categs' => 	1, 
			'creative-lab' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'creative-lab' . '_error_color' => 				'#ffffff', 
			'creative-lab' . '_error_bg_color' => 			'#413d49', 
			'creative-lab' . '_error_bg_img_enable' => 		1, 
			'creative-lab' . '_error_bg_image' => 			'|' . get_template_directory_uri() . '/theme-vars/theme-style' . CMSMASTERS_THEME_STYLE . '/img/error_bg.jpg', 
			'creative-lab' . '_error_bg_rep' => 			'no-repeat', 
			'creative-lab' . '_error_bg_pos' => 			'top center', 
			'creative-lab' . '_error_bg_att' => 			'scroll', 
			'creative-lab' . '_error_bg_size' => 			'cover', 
			'creative-lab' . '_error_search' => 			1, 
			'creative-lab' . '_error_sitemap_button' => 	1, 
			'creative-lab' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'creative-lab' . '_custom_css' => 			'', 
			'creative-lab' . '_custom_js' => 			'', 
			'creative-lab' . '_gmap_api_key' => 		'', 
			'creative-lab' . '_api_key' => 				'', 
			'creative-lab' . '_api_secret' => 			'', 
			'creative-lab' . '_access_token' => 		'', 
			'creative-lab' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'creative-lab' . '_recaptcha_public_key' => 	'', 
			'creative-lab' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	$settings = apply_filters('creative_lab_settings_element_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('creative_lab_settings_single_defaults')) {

function creative_lab_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'creative-lab' . '_blog_post_layout' => 		'r_sidebar', 
			'creative-lab' . '_blog_post_title' => 			1, 
			'creative-lab' . '_blog_post_date' => 			1, 
			'creative-lab' . '_blog_post_cat' => 			1, 
			'creative-lab' . '_blog_post_author' => 		1, 
			'creative-lab' . '_blog_post_comment' => 		1, 
			'creative-lab' . '_blog_post_tag' => 			1, 
			'creative-lab' . '_blog_post_like' => 			1, 
			'creative-lab' . '_blog_post_nav_box' => 		1, 
			'creative-lab' . '_blog_post_nav_order_cat' => 	0, 
			'creative-lab' . '_blog_post_share_box' => 		1, 
			'creative-lab' . '_blog_post_author_box' => 	1, 
			'creative-lab' . '_blog_more_posts_box' => 		'popular', 
			'creative-lab' . '_blog_more_posts_count' => 	'3', 
			'creative-lab' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'creative-lab' . '_portfolio_project_title' => 			1, 
			'creative-lab' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'creative-lab'), 
			'creative-lab' . '_portfolio_project_date' => 			1, 
			'creative-lab' . '_portfolio_project_cat' => 			1, 
			'creative-lab' . '_portfolio_project_author' => 		1, 
			'creative-lab' . '_portfolio_project_comment' => 		0, 
			'creative-lab' . '_portfolio_project_tag' => 			0, 
			'creative-lab' . '_portfolio_project_like' => 			1, 
			'creative-lab' . '_portfolio_project_link' => 			0, 
			'creative-lab' . '_portfolio_project_share_box' => 		1, 
			'creative-lab' . '_portfolio_project_nav_box' => 		1, 
			'creative-lab' . '_portfolio_project_nav_order_cat' => 	0, 
			'creative-lab' . '_portfolio_project_author_box' => 	1, 
			'creative-lab' . '_portfolio_more_projects_box' => 		'popular', 
			'creative-lab' . '_portfolio_more_projects_count' => 	'4', 
			'creative-lab' . '_portfolio_more_projects_pause' => 	'5', 
			'creative-lab' . '_portfolio_project_slug' => 			'project', 
			'creative-lab' . '_portfolio_pj_categs_slug' => 		'pj-categs', 
			'creative-lab' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'creative-lab' . '_profile_post_title' => 			1, 
			'creative-lab' . '_profile_post_details_title' => 	esc_html__('Profile details', 'creative-lab'), 
			'creative-lab' . '_profile_post_cat' => 			1, 
			'creative-lab' . '_profile_post_comment' => 		1, 
			'creative-lab' . '_profile_post_like' => 			1, 
			'creative-lab' . '_profile_post_nav_box' => 		1, 
			'creative-lab' . '_profile_post_nav_order_cat' => 	0, 
			'creative-lab' . '_profile_post_share_box' => 		1, 
			'creative-lab' . '_profile_post_slug' => 			'profile', 
			'creative-lab' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	$settings = apply_filters('creative_lab_settings_single_defaults_filter', $settings);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('creative_lab_project_puzzle_proportion')) {

function creative_lab_project_puzzle_proportion() {
	return 1;
}

}


/* Project Puzzle Proportion */
if (!function_exists('creative_lab_project_puzzle_large_gar_parameters')) {

function creative_lab_project_puzzle_large_gar_parameters() {
	$parameter = array ( 
		'container_width' 		=> 1160, 
		'bottomStaticPadding' 	=> 3.4 
	);
	
	
	return $parameter;
}

}


/* Theme Image Thumbnails Size */
if (!function_exists('creative_lab_get_image_thumbnail_list')) {

function creative_lab_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		60, 
			'height' => 	60, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		500, 
			'height' => 	500, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'creative-lab') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	380, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'creative-lab') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	440, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'creative-lab') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'creative-lab') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	570, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'creative-lab') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'creative-lab') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'creative-lab') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	650, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'creative-lab') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'creative-lab') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('creative_lab_project_labels')) {

function creative_lab_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'creative-lab'), 
		'singular_name' => 			esc_html__('Project', 'creative-lab'), 
		'menu_name' => 				esc_html__('Projects', 'creative-lab'), 
		'all_items' => 				esc_html__('All Projects', 'creative-lab'), 
		'add_new' => 				esc_html__('Add New', 'creative-lab'), 
		'add_new_item' => 			esc_html__('Add New Project', 'creative-lab'), 
		'edit_item' => 				esc_html__('Edit Project', 'creative-lab'), 
		'new_item' => 				esc_html__('New Project', 'creative-lab'), 
		'view_item' => 				esc_html__('View Project', 'creative-lab'), 
		'search_items' => 			esc_html__('Search Projects', 'creative-lab'), 
		'not_found' => 				esc_html__('No projects found', 'creative-lab'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'creative-lab') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'creative_lab_project_labels');


if (!function_exists('creative_lab_pj_categs_labels')) {

function creative_lab_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'creative-lab'), 
		'singular_name' => 			esc_html__('Project Category', 'creative-lab') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'creative_lab_pj_categs_labels');


if (!function_exists('creative_lab_pj_tags_labels')) {

function creative_lab_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'creative-lab'), 
		'singular_name' => 			esc_html__('Project Tag', 'creative-lab') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'creative_lab_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('creative_lab_profile_labels')) {

function creative_lab_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'creative-lab'), 
		'singular_name' => 			esc_html__('Profiles', 'creative-lab'), 
		'menu_name' => 				esc_html__('Profiles', 'creative-lab'), 
		'all_items' => 				esc_html__('All Profiles', 'creative-lab'), 
		'add_new' => 				esc_html__('Add New', 'creative-lab'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'creative-lab'), 
		'edit_item' => 				esc_html__('Edit Profile', 'creative-lab'), 
		'new_item' => 				esc_html__('New Profile', 'creative-lab'), 
		'view_item' => 				esc_html__('View Profile', 'creative-lab'), 
		'search_items' => 			esc_html__('Search Profiles', 'creative-lab'), 
		'not_found' => 				esc_html__('No Profiles found', 'creative-lab'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'creative-lab') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'creative_lab_profile_labels');


if (!function_exists('creative_lab_pl_categs_labels')) {

function creative_lab_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'creative-lab'), 
		'singular_name' => 			esc_html__('Profile Category', 'creative-lab') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'creative_lab_pl_categs_labels');

