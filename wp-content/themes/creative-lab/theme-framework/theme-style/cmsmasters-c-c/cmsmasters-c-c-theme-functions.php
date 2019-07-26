<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.2
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function creative_lab_theme_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('creative-lab-composer-shortcodes-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('creative-lab-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
			/* Blog */
			'blog_field_layout_mode_puzzle' => 			esc_attr__('Puzzle', 'creative-lab'), 
			/* Counters */
			'counters_field_value_font_size' => 		esc_attr__('Value Font Size', 'creative-lab'), 
			'counters_field_value_line_height' => 		esc_attr__('Value Line Height', 'creative-lab'), 
			/* Profiles */
			'profiles_field_style' => 					esc_attr__('Style', 'creative-lab'), 
			'choice_style_1' => 						esc_attr__('Style 1', 'creative-lab'), 
			'choice_style_2' => 						esc_attr__('Style 2', 'creative-lab'), 
			/* Portfolio */
			'portfolio_field_style' => 					esc_attr__('Style', 'creative-lab'), 
			'choice_style_3' => 						esc_attr__('Style 3', 'creative-lab') 
		));
	}
}

add_action('admin_enqueue_scripts', 'creative_lab_theme_register_c_c_scripts');


// Counters Shortcode Attributes Filter
add_filter('cmsmasters_counters_atts_filter', 'cmsmasters_counters_atts');

function cmsmasters_counters_atts() {
	return array( 
		'shortcode_id' => 			'', 
		'type' => 					'horizontal', 
		'count' => 					'5', 
		'value_font_size' => 		'56', 
		'value_line_height' => 		'76', 
		'icon_size' => 				'42', 
		'icon_space' => 			'76', 
		'icon_border_width' => 		'2', 
		'icon_border_radius' => 	'50%', 
		'animation' => 				'', 
		'animation_delay' => 		'0', 
		'classes' => 				'' 
	);
}


// Profiles Shortcode Attributes Filter
add_filter('cmsmasters_profiles_atts_filter', 'cmsmasters_profiles_atts');

function cmsmasters_profiles_atts() {
	return array( 
		'shortcode_id' => 		'', 
		'orderby' => 			'', 
		'order' => 				'', 
		'count' => 				'', 
		'categories' => 		'', 
		'layout' => 			'', 
		'style' => 				'', 
		'columns' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Blog Shortcode Attributes Filter
add_filter('cmsmasters_blog_atts_filter', 'cmsmasters_blog_atts');

function cmsmasters_blog_atts() {
	return array( 
		'shortcode_id' => 		'', 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'standard', 
		'layout_mode' => 		'', 
		'columns' => 			'', 
		'metadata' => 			'', 
		'filter' => 			'', 
		'filter_cats_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	);
}


// Posts Slider Shortcode Attributes Filter
add_filter('cmsmasters_posts_slider_atts_filter', 'cmsmasters_posts_slider_atts');

function cmsmasters_posts_slider_atts() {
	return array( 
		'shortcode_id' => 			'', 
		'orderby' => 				'', 
		'order' => 					'', 
		'post_type' => 				'', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'', 
		'count' => 					'', 
		'pause' => 					'', 
		'blog_metadata' => 			'', 
		'portfolio_metadata' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}


// Portfolio Shortcode Attributes Filter
add_filter('cmsmasters_portfolio_atts_filter', 'cmsmasters_portfolio_atts');

function cmsmasters_portfolio_atts() {
	return array( 
		'shortcode_id' => 		'', 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'grid', 
		'puzzle_style' => 		'style_1', 
		'layout_mode' => 		'perfect', 
		'columns' => 			'4', 
		'metadata_grid' => 		'', 
		'metadata_puzzle' => 	'', 
		'gap' => 				'large', 
		'filter' => 			'', 
		'filter_cats_text' => 	'', 
		'sorting' => 			'', 
		'sorting_name_text' => 	'', 
		'sorting_date_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	);
}

