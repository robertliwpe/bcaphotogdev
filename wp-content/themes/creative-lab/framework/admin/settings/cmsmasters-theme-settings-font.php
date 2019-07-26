<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.1.0
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function creative_lab_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'creative-lab');
	$tabs['link'] = esc_attr__('Links', 'creative-lab');
	$tabs['nav'] = esc_attr__('Navigation', 'creative-lab');
	$tabs['heading'] = esc_attr__('Heading', 'creative-lab');
	$tabs['other'] = esc_attr__('Other', 'creative-lab');
	$tabs['google'] = esc_attr__('Google Fonts', 'creative-lab');
	
	return apply_filters('cmsmasters_options_font_tabs_filter', $tabs);
}


function creative_lab_options_font_sections() {
	$tab = creative_lab_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'creative-lab');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'creative-lab');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'creative-lab');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'creative-lab');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'creative-lab');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'creative-lab');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_sections_filter', $sections, $tab);
} 


function creative_lab_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = creative_lab_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = creative_lab_settings_font_defaults();
	
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_content_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'creative-lab' . '_link_font', 
			'title' => esc_html__('Links Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_link_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'creative-lab' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['creative-lab' . '_link_hover_decoration'], 
			'choices' => creative_lab_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'creative-lab' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_nav_title_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'creative-lab' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_nav_dropdown_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h1_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h2_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h3_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h4_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h5_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'creative-lab' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_h6_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'creative-lab' . '_button_font', 
			'title' => esc_html__('Button Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_button_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'creative-lab' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_small_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'creative-lab' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_input_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'creative-lab' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'creative-lab'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => $defaults[$tab]['creative-lab' . '_quote_font'], 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'creative-lab' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'creative-lab'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => $defaults[$tab]['creative-lab' . '_google_web_fonts'] 
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'creative-lab' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'creative-lab') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'creative-lab') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'creative-lab') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'creative-lab') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'creative-lab') . '|' . 'greek', 
				esc_html__('Greek Extended', 'creative-lab') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'creative-lab') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'creative-lab') . '|' . 'japanese', 
				esc_html__('Korean', 'creative-lab') . '|' . 'korean', 
				esc_html__('Thai', 'creative-lab') . '|' . 'thai', 
				esc_html__('Bengali', 'creative-lab') . '|' . 'bengali', 
				esc_html__('Devanagari', 'creative-lab') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'creative-lab') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'creative-lab') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'creative-lab') . '|' . 'hebrew', 
				esc_html__('Kannada', 'creative-lab') . '|' . 'kannada', 
				esc_html__('Khmer', 'creative-lab') . '|' . 'khmer', 
				esc_html__('Malayalam', 'creative-lab') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'creative-lab') . '|' . 'myanmar', 
				esc_html__('Oriya', 'creative-lab') . '|' . 'oriya', 
				esc_html__('Sinhala', 'creative-lab') . '|' . 'sinhala', 
				esc_html__('Tamil', 'creative-lab') . '|' . 'tamil', 
				esc_html__('Telugu', 'creative-lab') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_font_fields_filter', $options, $tab);	
}

