<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.1
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function creative_lab_options_general_tabs() {
	$cmsmasters_option = creative_lab_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'creative-lab');
	
	if ($cmsmasters_option['creative-lab' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'creative-lab');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'creative-lab');
	}
	
	$tabs['header'] = esc_attr__('Header', 'creative-lab');
	$tabs['content'] = esc_attr__('Content', 'creative-lab');
	$tabs['footer'] = esc_attr__('Footer', 'creative-lab');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function creative_lab_options_general_sections() {
	$tab = creative_lab_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'creative-lab');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'creative-lab');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'creative-lab');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'creative-lab');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'creative-lab');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'creative-lab');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function creative_lab_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = creative_lab_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = creative_lab_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'creative-lab') . '|liquid', 
				esc_html__('Boxed', 'creative-lab') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'creative-lab') . '|image', 
				esc_html__('Text', 'creative-lab') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'creative-lab'), 
			'desc' => esc_html__('Choose your website logo image.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'creative-lab'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'creative-lab'), 
			'desc' => esc_html__('enable', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'creative-lab'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'creative-lab' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'creative-lab'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['creative-lab' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_col', 
			'title' => esc_html__('Background Color', 'creative-lab'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_img', 
			'title' => esc_html__('Background Image', 'creative-lab'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'creative-lab') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'creative-lab') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'creative-lab') . '|repeat-y', 
				esc_html__('Repeat', 'creative-lab') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'creative-lab') . '|top left', 
				esc_html__('Top Center', 'creative-lab') . '|top center', 
				esc_html__('Top Right', 'creative-lab') . '|top right', 
				esc_html__('Center Left', 'creative-lab') . '|center left', 
				esc_html__('Center Center', 'creative-lab') . '|center center', 
				esc_html__('Center Right', 'creative-lab') . '|center right', 
				esc_html__('Bottom Left', 'creative-lab') . '|bottom left', 
				esc_html__('Bottom Center', 'creative-lab') . '|bottom center', 
				esc_html__('Bottom Right', 'creative-lab') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'creative-lab') . '|scroll', 
				esc_html__('Fixed', 'creative-lab') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'creative-lab' . '_bg_size', 
			'title' => esc_html__('Background Size', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'creative-lab') . '|auto', 
				esc_html__('Cover', 'creative-lab') . '|cover', 
				esc_html__('Contain', 'creative-lab') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'creative-lab' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => creative_lab_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'creative-lab'), 
			'desc' => esc_html__('enable', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'creative-lab'), 
			'desc' => esc_html__('enable', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'creative-lab'), 
			'desc' => esc_html__('pixels', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'creative-lab'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'creative-lab') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['creative-lab' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'creative-lab') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'creative-lab') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'creative-lab') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'creative-lab') . '|default', 
				esc_html__('Compact Style Left Navigation', 'creative-lab') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'creative-lab') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'creative-lab') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'creative-lab'), 
			'desc' => esc_html__('pixels', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'creative-lab'), 
			'desc' => esc_html__('pixels', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_search', 
			'title' => esc_html__('Header Search', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'creative-lab') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'creative-lab') . '|social', 
				esc_html__('Header Custom HTML', 'creative-lab') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'creative-lab' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'creative-lab'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'creative-lab') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['creative-lab' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'creative-lab'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'creative-lab'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['creative-lab' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'creative-lab'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'creative-lab'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['creative-lab' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'creative-lab'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'creative-lab'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['creative-lab' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'creative-lab'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'creative-lab'), 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['creative-lab' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'creative-lab') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'creative-lab') . '|left', 
				esc_html__('Right', 'creative-lab') . '|right', 
				esc_html__('Center', 'creative-lab') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'creative-lab'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'creative-lab') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'creative-lab') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'creative-lab') . '|repeat-y', 
				esc_html__('Repeat', 'creative-lab') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'creative-lab') . '|scroll', 
				esc_html__('Fixed', 'creative-lab') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'creative-lab') . '|auto', 
				esc_html__('Cover', 'creative-lab') . '|cover', 
				esc_html__('Contain', 'creative-lab') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'creative-lab'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'creative-lab'), 
			'desc' => esc_html__('pixels', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['creative-lab' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'creative-lab' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['creative-lab' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'creative-lab') . '|default', 
				esc_html__('Small', 'creative-lab') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'creative-lab') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'creative-lab') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'creative-lab') . '|social', 
				esc_html__('Custom HTML', 'creative-lab') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'creative-lab'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'creative-lab'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'creative-lab'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'creative-lab') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'creative-lab' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);
}

