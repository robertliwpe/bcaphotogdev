<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.1.0
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function creative_lab_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'creative-lab');
	$tabs['export'] = esc_attr__('Export', 'creative-lab');
	
	
	return $tabs;
}


function creative_lab_options_demo_sections() {
	$tab = creative_lab_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'creative-lab');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'creative-lab');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function creative_lab_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = creative_lab_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'creative-lab' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'creative-lab'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'creative-lab') . (CMSMASTERS_THEME_STYLE_COMPATIBILITY ? '<span class="descr_note">' . esc_html__("Please note that when importing theme settings, these settings will be applied to the appropriate Theme Style (with the same name).", 'creative-lab') . '<br />' . esc_html__("To see these settings applied, please enable appropriate", 'creative-lab') . ' <a href="' . esc_url(admin_url('admin.php?page=cmsmasters-settings&tab=theme_style')) . '">' . esc_html__("Theme Style", 'creative-lab') . '</a>.</span>' : ''), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'creative-lab' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'creative-lab'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file.", 'creative-lab') . (CMSMASTERS_THEME_STYLE_COMPATIBILITY ? '<span class="descr_note">' . esc_html__("Please note, that when exporting theme settings, you will export settings for the currently active Theme Style.", 'creative-lab') . '<br />' . esc_html__("Theme Style can be set", 'creative-lab') . ' <a href="' . esc_url(admin_url('admin.php?page=cmsmasters-settings&tab=theme_style')) . '">' . esc_html__("here", 'creative-lab') . '</a>.</span>' : ''), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'creative-lab'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

