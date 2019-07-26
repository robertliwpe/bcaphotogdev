<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.0.2
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* Color Settings */
function creative_lab_theme_options_color_fields($options, $tab) {
	$defaults = creative_lab_color_schemes_defaults();
	
	
	if ($tab != 'header' && $tab != 'navigation' && $tab != 'header_top') {
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => 'creative-lab' . '_' . $tab . '_secondary', 
			'title' => esc_html__('Secondary Color', 'creative-lab'), 
			'desc' => esc_html__('Secondary color for some elements', 'creative-lab'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['secondary'] : $defaults['default']['secondary'] 
		);
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_color_fields_filter', 'creative_lab_theme_options_color_fields', 10, 2);

