<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.0.2
 * 
 * Theme Admin Options
 * Created by CMSMasters
 * 
 */


/* Filter for Options */
function creative_lab_theme_meta_fields($custom_all_meta_fields) {
	$cmsmasters_option = creative_lab_get_global_options();
	
	
	$cmsmasters_global_profile_post_color = (isset($cmsmasters_option['creative-lab' . '_profile_post_color']) && $cmsmasters_option['creative-lab' . '_profile_post_color'] !== '') ? $cmsmasters_option['creative-lab' . '_profile_post_color'] : '';
	
	
	$custom_all_meta_fields_new = array();
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'profile') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'profile') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'profile') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_profile_subtitle') {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
				
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Profile Color', 'creative-lab'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_profile_color', 
					'type'	=> 'rgba', 
					'hide'	=> '', 
					'std'	=> '' 
				);
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'project') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'project') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'project') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_project_title') {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
				
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Rollover Background Color', 'creative-lab'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_color', 
					'type'	=> 'rgba', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Project Title Color', 'creative-lab'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_title_color', 
					'type'	=> 'rgba', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Project Category Color', 'creative-lab'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_category_color', 
					'type'	=> 'rgba', 
					'hide'	=> '', 
					'std'	=> '' 
				);
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else {
		$custom_all_meta_fields_new = $custom_all_meta_fields;
	}
	
	
	return $custom_all_meta_fields_new;
}

add_filter('get_custom_all_meta_fields_filter', 'creative_lab_theme_meta_fields');

