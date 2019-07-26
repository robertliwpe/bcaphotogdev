<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.0
 * 
 * Admin Panel Main Functions
 * Created by CMSMasters
 * 
 */


add_action('admin_menu', 'creative_lab_add_menu');
add_action('admin_init', 'creative_lab_register_settings');


require_once(CMSMASTERS_SETTINGS . '/inc/cmsmasters-helper-functions.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-general.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-font.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-color.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-element.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-single.php');
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings-demo.php');


function creative_lab_get_settings() {
	$output = array();
	
	
	$page = creative_lab_get_admin_page();
	
	$tab = creative_lab_get_the_tab();
	
	
	switch ($page) {
	case 'cmsmasters-settings':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE;
		$cmsmasters_settings_page_title = esc_html__('Theme General Settings', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_general_sections();
		$cmsmasters_page_fields = creative_lab_options_general_fields();
		$cmsmasters_page_tabs = creative_lab_options_general_tabs();
		
		switch ($tab) {
		case 'general':
			$cmsmasters_option_name = $cmsmasters_option_name . '_general';
			
			break;
		case 'bg':
			$cmsmasters_option_name = $cmsmasters_option_name . '_bg';
			
			break;
		case 'theme_style':
			$cmsmasters_option_name = $cmsmasters_option_name . '_theme_style';
			
			break;
		case 'header':
			$cmsmasters_option_name = $cmsmasters_option_name . '_header';
			
			break;
		case 'content':
			$cmsmasters_option_name = $cmsmasters_option_name . '_content';
			
			break;
		case 'footer':
			$cmsmasters_option_name = $cmsmasters_option_name . '_footer';
			
			break;
		}
		
		break;
	case 'cmsmasters-settings' . '-font':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font';
		$cmsmasters_settings_page_title = esc_html__('Theme Fonts Settings', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_font_sections();
		$cmsmasters_page_fields = creative_lab_options_font_fields();
		$cmsmasters_page_tabs = creative_lab_options_font_tabs();
		
		switch ($tab) {
		case 'content':
			$cmsmasters_option_name = $cmsmasters_option_name . '_content';
			
			break;
		case 'link':
			$cmsmasters_option_name = $cmsmasters_option_name . '_link';
			
			break;
		case 'nav':
			$cmsmasters_option_name = $cmsmasters_option_name . '_nav';
			
			break;
		case 'heading':
			$cmsmasters_option_name = $cmsmasters_option_name . '_heading';
			
			break;
		case 'other':
			$cmsmasters_option_name = $cmsmasters_option_name . '_other';
			
			break;
		case 'google':
			$cmsmasters_option_name = $cmsmasters_option_name . '_google';
			
			break;
		}
		
		break;
	case 'cmsmasters-settings' . '-color':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_color';
		$cmsmasters_settings_page_title = esc_html__('Theme Color Schemes', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_color_sections();
		$cmsmasters_page_fields = creative_lab_options_color_fields();
		$cmsmasters_page_tabs = creative_lab_options_color_tabs();
		
		
		$cmsmasters_option_name = $cmsmasters_option_name . '_' . $tab;
		
		
		break;
	case 'cmsmasters-settings' . '-element':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element';
		$cmsmasters_settings_page_title = esc_html__('Theme Elements Settings', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_element_sections();
		$cmsmasters_page_fields = creative_lab_options_element_fields();
		$cmsmasters_page_tabs = creative_lab_options_element_tabs();
		
		switch ($tab) {
		case 'sidebar':
			$cmsmasters_option_name = $cmsmasters_option_name . '_sidebar';
			
			break;
		case 'icon':
			$cmsmasters_option_name = $cmsmasters_option_name . '_icon';
			
			break;
		case 'lightbox':
			$cmsmasters_option_name = $cmsmasters_option_name . '_lightbox';
			
			break;
		case 'sitemap':
			$cmsmasters_option_name = $cmsmasters_option_name . '_sitemap';
			
			break;
		case 'error':
			$cmsmasters_option_name = $cmsmasters_option_name . '_error';
			
			break;
		case 'code':
			$cmsmasters_option_name = $cmsmasters_option_name . '_code';
			
			break;
		case 'recaptcha':
			$cmsmasters_option_name = $cmsmasters_option_name . '_recaptcha';
			
			break;
		}
		
		break;
	case 'cmsmasters-settings' . '-single':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single';
		$cmsmasters_settings_page_title = esc_html__('Theme Single Posts Settings', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_single_sections();
		$cmsmasters_page_fields = creative_lab_options_single_fields();
		$cmsmasters_page_tabs = creative_lab_options_single_tabs();
		
		switch ($tab) {
		case 'post':
			$cmsmasters_option_name = $cmsmasters_option_name . '_post';
			
			break;
		case 'project':
			$cmsmasters_option_name = $cmsmasters_option_name . '_project';
			
			break;
		case 'profile':
			$cmsmasters_option_name = $cmsmasters_option_name . '_profile';
			
			break;
		}
		
		break;
	case 'cmsmasters-settings' . '-demo':
		$cmsmasters_option_name = 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_demo';
		$cmsmasters_settings_page_title = esc_html__('Theme Settings Import/Export', 'creative-lab');
		$cmsmasters_page_sections = creative_lab_options_demo_sections();
		$cmsmasters_page_fields = creative_lab_options_demo_fields();
		$cmsmasters_page_tabs = creative_lab_options_demo_tabs();
		
		switch ($tab) {
		case 'import':
			$cmsmasters_option_name = $cmsmasters_option_name . '_import';
			
			break;
		case 'export':
			$cmsmasters_option_name = $cmsmasters_option_name . '_export';
			
			break;
		}
		
		break;
	default:
		$cmsmasters_option_name = '';
		$cmsmasters_settings_page_title = '';
		$cmsmasters_page_tabs = '';
		$cmsmasters_page_sections = '';
		$cmsmasters_page_fields = '';
		
		break;
	}
	
	
	$output['cmsmasters_option_name'] = apply_filters('cmsmasters_option_name_filter', $cmsmasters_option_name, $tab);
	$output['cmsmasters_page_title'] = $cmsmasters_settings_page_title;
	$output['cmsmasters_page_tabs'] = $cmsmasters_page_tabs;
	$output['cmsmasters_page_sections'] = $cmsmasters_page_sections;
	$output['cmsmasters_page_fields'] = $cmsmasters_page_fields;
	
	
	return $output;
}


function creative_lab_create_settings_field($args = array()) {
	$defaults = array( 
		'id' => 		'default_field', 
		'title' => 		esc_html__('Default Field', 'creative-lab'), 
		'desc' => 		esc_html__('This is a default description.', 'creative-lab'), 
		'std' => 		'', 
		'type' => 		'text', 
		'section' => 	'main_section', 
		'choices' => 	array(), 
		'class' => 		'', 
		'min' => 		'', 
		'max' => 		'', 
		'step' => 		'', 
		'frame' => 		'select', 
		'multiple' => 	false 
	);
	
	extract(wp_parse_args($args, $defaults));
	
	$field_args = array( 
		'type' => 		esc_attr($type), 
		'id' => 		esc_attr($id), 
		'desc' => 		$desc, 
		'std' => 		$std, 
		'choices' => 	$choices, 
		'label_for' => 	esc_attr($id), 
		'class' => 		esc_attr($class), 
		'min' => 		esc_attr($min), 
		'max' => 		esc_attr($max), 
		'step' => 		esc_attr($step), 
		'frame' => 		esc_attr($frame), 
		'multiple' => 	esc_attr($multiple) 
	);
	
	add_settings_field( 
		esc_attr($id), 
		esc_html($title), 
		'creative_lab_form_field_fn', 
		__FILE__, 
		$section, 
		$field_args 
	);
}


function creative_lab_register_settings() {
	$settings_output = creative_lab_get_settings();
	
	
	$cmsmasters_option_name = $settings_output['cmsmasters_option_name'];
	
	
	$current_page = (isset($_GET['page'])) ? trim($_GET['page']) : '';
	
	$page_updated = (isset($_GET['settings-updated'])) ? trim($_GET['settings-updated']) : '';
	
	
	register_setting($cmsmasters_option_name, $cmsmasters_option_name, 'creative_lab_validate_options');
	
	
	if (!empty($settings_output['cmsmasters_page_sections'])) {
		foreach ($settings_output['cmsmasters_page_sections'] as $id => $title) {
			add_settings_section($id, $title, 'creative_lab_section_fn', __FILE__);
		}
	}
	
	
	if (!empty($settings_output['cmsmasters_page_fields'])) {
		foreach ($settings_output['cmsmasters_page_fields'] as $option) {
			creative_lab_create_settings_field($option);
		}
	}
	
	
	if (($current_page === 'cmsmasters-settings-color' || $current_page === 'cmsmasters-settings-font') && $page_updated) {
		creative_lab_regenerate_styles();
	}
}


function creative_lab_settings_scripts() {
	wp_enqueue_style('wp-jquery-ui-dialog');
	
	
	wp_enqueue_style('creative-lab-settings-css', get_template_directory_uri() . '/framework/admin/settings/css/cmsmasters-theme-settings.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('creative-lab-settings-css-rtl', get_template_directory_uri() . '/framework/admin/settings/css/cmsmasters-theme-settings-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('jquery-ui-sortable');
	
	
	wp_enqueue_script('creative-lab-settings-js', get_template_directory_uri() . '/framework/admin/settings/js/cmsmasters-theme-settings.js', array('jquery', 'farbtastic'), '1.0.0', true);
	
	
	$theme_style_name = '';
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		foreach (creative_lab_all_theme_styles() as $theme_style) {
			$theme_style = explode('|', $theme_style);
			
			
			if (CMSMASTERS_THEME_STYLE == $theme_style[1]) {
				$theme_style_name = '-' . strtolower(str_replace(' ', '-', $theme_style[0]));
			}
		}
	}
	
	
	wp_localize_script('creative-lab-settings-js', 'cmsmasters_setting', array( 
		'palettes' => 						implode(',', cmsmasters_color_picker_palettes()), 
		'remove' => 						esc_attr__('Remove', 'creative-lab'), 
		'remove_sidebar' => 				esc_html__('Do you really want to remove this sidebar?', 'creative-lab'), 
		'remove_google_web_font' => 		esc_html__('Do you really want to remove this google web font?', 'creative-lab'), 
		'find' => 							esc_attr__('Find icons', 'creative-lab'), 
		'remove_icon' => 					esc_html__('Do you really want to remove this social icon?', 'creative-lab'), 
		'theme_uri' => 						get_template_directory_uri(), 
		'shortname' => 						'creative-lab', 
		'theme_style_name' => 				$theme_style_name, 
		'done' => 							esc_html__('All theme settings were imported successfully.', 'creative-lab'), 
		'fail' => 							esc_html__("Error on page!!!\nPlease reload page and try again.", 'creative-lab'), 
		'done_reset_settings' => 			esc_html__('Theme style settings were reset to default.', 'creative-lab'), 
		'nonce_ajax_apply_theme_style' => 	wp_create_nonce('cmsmasters_ajax_apply_theme_style-nonce'), 
		'nonce_ajax_reset_settings' => 		wp_create_nonce('cmsmasters_ajax_reset_settings-nonce'), 
		'nonce_ajax_import_settings' => 	wp_create_nonce('cmsmasters_ajax_import_settings-nonce'), 
		'nonce_ajax_export_settings' => 	wp_create_nonce('cmsmasters_ajax_export_settings-nonce') 
	));
	
	
	wp_enqueue_script('creative-lab-settings-js-toggle', get_template_directory_uri() . '/framework/admin/settings/js/cmsmasters-theme-settings-toggle.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('creative-lab-settings-js-toggle', 'cmsmasters_settings', array( 
		'shortname' => 	'creative-lab' 
	));
	
	
	wp_enqueue_media();
}


function creative_lab_add_menu() {
	$settings_output = creative_lab_get_settings();
	
	
	$add_menu = 'add_menu_';
	
	$add_menu_p = $add_menu . 'page';
	
	
	$add_menu_p( 
		esc_attr__('Theme Settings', 'creative-lab'), 
		esc_attr__('Theme Settings', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings', 
		'creative_lab_settings_page_fn', 
		'' 
	);
	
	
	$add_submenu = 'add_submenu_';
	
	$add_submenu_p = $add_submenu . 'page';
	
	
	$cmsmasters_settings_general = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme General Settings', 'creative-lab'), 
		esc_attr__('General', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_general, 'creative_lab_settings_scripts');
	
	
	$cmsmasters_settings_font = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme Fonts Settings', 'creative-lab'), 
		esc_attr__('Fonts', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings' . '-font', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_font, 'creative_lab_settings_scripts');
	
	
	$cmsmasters_settings_color = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme Color Schemes', 'creative-lab'), 
		esc_attr__('Colors', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings' . '-color', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_color, 'creative_lab_settings_scripts');
	
	
	$cmsmasters_settings_element = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme Elements Settings', 'creative-lab'), 
		esc_attr__('Elements', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings' . '-element', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_element, 'creative_lab_settings_scripts');
	
	
	$cmsmasters_settings_single = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme Single Posts Settings', 'creative-lab'), 
		esc_attr__('Single Posts', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings' . '-single', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_single, 'creative_lab_settings_scripts');
	
	
	$cmsmasters_settings_demo = $add_submenu_p( 
		'cmsmasters-settings', 
		esc_attr__('Theme Settings Import/Export', 'creative-lab'), 
		esc_attr__('Import/Export', 'creative-lab'), 
		'manage_options', 
		'cmsmasters-settings' . '-demo', 
		'creative_lab_settings_page_fn' 
	);
	
	add_action('load-' . $cmsmasters_settings_demo, 'creative_lab_settings_scripts');
}


function creative_lab_section_fn($desc) {
	$tab = creative_lab_get_the_tab();
	
	switch ($tab) {
	case 'general':
		echo '';
		
		break;
	case 'google':
		echo '<div class="cmsmasters_google_web_fonts_instruction">' . 
			sprintf(wp_kses(__('<p>To add new Google Font proceed to <a href="%1$s" target="_blank">fonts.google.com</a>, find needed Google Font and click on the + to select it: <a href="%2$s" target="_blank">screenshot</a>.<br />Choose the font style in the Customize tab: <a href="%3$s" target="_blank">screenshot</a>.<br />Copy the highlighted code and the font family: <a href="%4$s" target="_blank">screenshot</a>, click on the Add Font button: <a href="%5$s" target="_blank">screenshot</a>, and past Font Family and Font Style to the appropriate fields: <a href="%6$s" target="_blank">screenshot</a>.<br />To add a specific subset choose the needed one from the Google Fonts Subset list.  To select multiple subsets hold down the Ctrl key and click on the subsets you need to add: <a href="%7$s" target="_blank">screenshot</a>.<br /><strong>Don\'t forget to Save Changes.</strong><br />Then new Google Font will appear in the Google Fonts list: <a href="%8$s" target="_blank">screenshot</a></p>', 'creative-lab'), array('a' => array('href' => array(), 'target' => array()), 'br' => array(), 'p' => array(), 'h4' => array(), 'strong' => array())), esc_url('https://fonts.google.com/'), esc_url('https://www.screencast.com/t/hxfumLXyU'), esc_url('https://www.screencast.com/t/FGrrt7UpEP'), esc_url('https://www.screencast.com/t/10smv1xX8Zd3'), esc_url('https://www.screencast.com/t/Fikm4IipwXpt'), esc_url('https://www.screencast.com/t/QEoz8sRx'), esc_url('https://www.screencast.com/t/9OO9lbtB'), esc_url('https://www.screencast.com/t/j9CX3ZEF6Tt')) . 
		'</div>';
		
		break;
	default:
		break;
	}
}


function creative_lab_settings_page_fn() {
	$settings_output = creative_lab_get_settings();
	$current_tab = creative_lab_get_the_tab();
	
	echo '<div class="wrap">';
	
	creative_lab_settings_page_header();
	
	if ($current_tab != 'wpml') {
		echo '<form action="options.php" method="post" class="cmsmasters_admin_page' . (($current_tab == 'recaptcha') ? ' cmsmasters_admin_page_recaptcha' : '') . '">' . 
			'<p class="submit-top">' . 
				(($current_tab != 'import' && $current_tab != 'export' && $current_tab != 'theme_style') ? '<input name="submit-top" type="submit" class="button button-primary button-large" value="' . esc_attr__('Save Changes', 'creative-lab') . '" />' : '') . 
			'</p>';
			
			settings_fields($settings_output['cmsmasters_option_name']);
			
			do_settings_sections(__FILE__);
			
			echo '<p class="submit">';
				
				if ($current_tab != 'import' && $current_tab != 'export' && $current_tab != 'theme_style') {
					echo '<input name="submit" type="submit" class="button button-primary button-large" value="' . esc_attr__('Save Changes', 'creative-lab') . '" />';
				} elseif ($current_tab == 'import') {
					echo '<input name="import" type="button" class="button button-primary button-large cmsmasters-demo-import" value="' . esc_attr__('Import Settings', 'creative-lab') . '" />';
				} elseif ($current_tab == 'theme_style') {
					echo '<input name="apply-theme-style" type="submit" class="button button-primary button-large cmsmasters-apply-theme-style" value="' . esc_attr__('Apply This Style', 'creative-lab') . '" />';
					echo '<input name="reset-settings" type="button" class="button button-large cmsmasters-reset-settings" value="' . esc_attr__('Reset Theme Style Settings to Default', 'creative-lab') . '" />';
				}
				
			echo '</p>' . 
		'</form>';
	} else {
		do_settings_sections(__FILE__);
	}
	
	echo '</div>';
}


function creative_lab_form_field_fn($args = array()) {
	extract($args);
	
	$settings_output = creative_lab_get_settings();
	
	$cmsmasters_option_name = esc_attr($settings_output['cmsmasters_option_name']);
	
	$options = get_option($cmsmasters_option_name);
	
	if (!isset($options[$id])) {
		$options[$id] = $std;
	}
	
	$field_class = ($class != '') ? ' ' . esc_attr($class) : '';
	
	$id = (isset($id) ? esc_attr($id) : '');
	$min = (isset($min) ? esc_attr($min) : '');
	$max = (isset($max) ? esc_attr($max) : '');
	$step = (isset($step) ? esc_attr($step) : '');
	
	
	switch ($type) {
	case 'text':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $options[$id] . '" />' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'multi-text':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			if (!empty($options[$id])) {
				foreach ($options[$id] as $option_key => $option_val) {
					if ($item[1] == $option_key) {
						$value = $option_val;
					}
				}
			} else {
				$value = '';
			}
			
			echo '<span>' . $item[0] . ':</span> ' . 
			'<input class="' . $field_class . '" type="text" id="' . $id . '|' . $item[1] . '" name="' . $cmsmasters_option_name . '[' . $id . '|' . $item[1] . ']" value="' . $value . '" />' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'textarea':
		$options[$id] = stripslashes($options[$id]);
		
		echo '<textarea class="textarea' . $field_class . '" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" rows="5" cols="30">' . $options[$id] . '</textarea>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select':
		echo '<select id="' . $id . '" class="select' . $field_class . '" name="' . $cmsmasters_option_name . '[' . $id . ']">';
		
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			$selected = ($options[$id] == $item[1]) ? ' selected="selected"' : '';
			
			echo '<option value="' . $item[1] . '"' . $selected . '>' . $item[0] . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select_multiple':
		echo '<select id="' . $id . '" class="select' . $field_class . '" name="' . $cmsmasters_option_name . '[' . $id . '][]" multiple="multiple" size="5">';
		
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			$selected = (is_array($options[$id]) && in_array($item[1], $options[$id]) ? ' selected="selected"' : '');
			
			echo '<option value="' . $item[1] . '"' . $selected . '>' . $item[0] . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select_theme_style':
		$theme_style_option = get_option('cmsmasters_creative-lab_theme_style');
		
		echo '<select id="' . $id . '" class="select' . $field_class . '" name="cmsmasters_creative-lab_theme_style">';
		
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			$selected = ($theme_style_option == $item[1]) ? ' selected="selected"' : '';
			
			echo '<option value="' . $item[1] . '"' . $selected . '>' . $item[0] . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'select_scheme':
		echo '<select id="' . $id . '" class="select_scheme' . $field_class . '" name="' . $cmsmasters_option_name . '[' . $id . ']">';
		
		foreach ($choices as $key => $value) {
			$selected = ($options[$id] == $key) ? ' selected="selected"' : '';
			
			echo '<option value="' . esc_attr($key) . '"' . $selected . '>' . esc_html($value) . '</option>';
		}
		
		echo '</select>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'checkbox':
		echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="1" ' . checked($options[$id], 1, false) . ' /> &nbsp;' . 
		(($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'multi-checkbox':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			$checked = '';
			
			if (isset($options[$id][$item[1]]) && $options[$id][$item[1]] == 'true') {
				$checked = ' checked="checked"';
			}
			
			echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '|' . $item[1] . '" name="' . $cmsmasters_option_name . '[' . $id . '|' . $item[1] . ']" value="1"' . $checked . ' /> &nbsp;' . 
			'<label for="' . $id . '|' . $item[1] . '">' . $item[0] . '</label>' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'number':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		echo '<input class="small-text' . $field_class . '" type="number" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $options[$id] . '"' . (($min != '') ? ' min="' . $min . '"' : '') . (($max != '') ? ' max="' . $max . '"' : '') . (($step != '') ? ' step="' . $step . '"' : '') . ' />' . 
		(($desc != '') ? ' &nbsp; ' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'radio':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			echo '<input class="radio' . $field_class . '" type="radio" id="' . $id . '|' . $item[1] . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $item[1] . '" ' . checked($options[$id], $item[1], false) . ' /> &nbsp;' . 
			'<label for="' . $id . '|' . $item[1] . '">' . $item[0] . '</label>' . 
			'<br />';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'radio_img':
		foreach ($choices as $item) {
			$item = explode('|', $item);
			$item[0] = esc_html($item[0]);
			
			echo '<div class="cmsmasters_settings_item_radio_img">' . 
				'<input class="radio' . $field_class . '" type="radio" id="' . $id . '|' . $item[2] . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $item[2] . '" ' . checked($options[$id], $item[2], false) . ' />' . 
				'<br />' . 
				'<label for="' . $id . '|' . $item[2] . '">' . 
					'<img src="' . esc_url($item[1]) . '" alt="' . esc_attr($item[0]) . '" title="' . esc_attr($item[0]) . '" />' . 
					'<br />' . 
					$item[0] . 
				'</label>' . 
			'</div>';
		}
		
		echo (($desc != '') ? '<div class="cl"></div>' . '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'button':
		echo '<input type="button" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $std . '" class="button button-primary button-large ' . $class . '" />' . 
		'<br /><br />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'color':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		
		echo '<input type="text" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $options[$id] . '" class="cmsmasters-color-field" data-default-color="' . $std . '" />' . 
		'<br />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'rgba':
		$options[$id] = esc_attr(stripslashes($options[$id]));
		
		
		echo '<input type="text" id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" value="' . $options[$id] . '" class="cmsmasters-color-field" data-default-color="' . $std . '" data-alpha="true" data-reset-alpha="true" />' . 
		'<br />' . 
		'<span class="description">' . 
			(($desc != '') ? $desc . '<br />' : '') . 
		'</span>';
		
		
		break;
	case 'upload':
		$image_array = explode('|', $std);
		
		
		$id_array = explode('|', $options[$id]);
		
		
		$image = (isset($image_array[1]) && $image_array[1] != '') ? $image_array[1] : '';
		
		
		if ( 
			$options[$id] != $std && 
			isset($id_array[1]) && 
			$id_array[1] != '' 
		) {
			$image = $id_array[1];
		}
		
		
		echo '<div class="cmsmasters_upload_parent cmsmasters_select_parent">' . 
			'<input type="button" id="cmsmasters_upload_' . $id . '_button" class="cmsmasters_upload_button button button-large" value="' . esc_attr__('Choose Image', 'creative-lab') . '" data-title="' . esc_attr__('Choose Image', 'creative-lab') . '" data-button="' . esc_attr__('Insert Image', 'creative-lab') . '" data-id="cmsmasters-media-select-frame-' . $id . '" data-classes="media-frame cmsmasters-media-select-frame' . ((!isset($description)) ? ' cmsmasters-frame-no-description' : '') . ((!isset($caption)) ? ' cmsmasters-frame-no-caption' : '') . ((!isset($align)) ? ' cmsmasters-frame-no-align' : '') . ((!isset($link)) ? ' cmsmasters-frame-no-link' : '') . ((!isset($size)) ? ' cmsmasters-frame-no-size' : '') . '" data-library="image" data-type="' . $frame . '"' . (($frame == 'post') ? ' data-state="insert"' : '') . ' data-multiple="' . $multiple . '" />' . 
			'<div class="cmsmasters_upload' . (($image != '') ? ' cmsmasters_db' : '') . '">' . 
				'<img src="' . (($image != '') ? $image : '') . '" class="cmsmasters_preview_image" />' . 
				'<a href="#" class="cmsmasters_upload_cancel admin-icon-remove" title="' . esc_attr__('Remove', 'creative-lab') . '"></a>' . 
			'</div>' . 
			'<input id="' . $id . '" name="' . $cmsmasters_option_name . '[' . $id . ']" type="hidden" class="cmsmasters_upload_image" value="' . (($options[$id] == '') ? $std : $options[$id]) . '" />' . 
		'</div>' . 
		'<div class="cl"></div>' . 
		(($desc != '') ? '<br />' . '<span class="description">' . $desc . '</span>' : '');
		
		
		break;
	case 'typorgaphy':
		$system_font = (in_array('system_font', $choices)) ? true : false;
		$google_font = (in_array('google_font', $choices)) ? true : false;
		$font_size = (in_array('font_size', $choices)) ? true : false;
		$line_height = (in_array('line_height', $choices)) ? true : false;
		$font_weight = (in_array('font_weight', $choices)) ? true : false;
		$font_style = (in_array('font_style', $choices)) ? true : false;
		$text_transform = (in_array('text_transform', $choices)) ? true : false;
		$text_decoration = (in_array('text_decoration', $choices)) ? true : false;
		
		if ($system_font) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_system_font" name="' . $cmsmasters_option_name . '[' . $id . '_system_font]">';
				
				foreach (creative_lab_system_fonts_list() as $key => $value) {
					echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_system_font'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_system_font">' . esc_html__('System Font', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		if ($google_font) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_google_font" name="' . $cmsmasters_option_name . '[' . $id . '_google_font]">';
					$cmsmasters_fonts_list = cmsmasters_fonts_list();
					
					$font_none = array_shift($cmsmasters_fonts_list);
					
					echo '<option value=""' . (($options[$id . '_google_font'] == '') ? ' selected="selected"' : '') . '>' . esc_html($font_none) .'</option>';
					
					
					if (!empty($cmsmasters_fonts_list['local'])) {
						echo '<optgroup label="' . esc_attr__('Local Fonts', 'creative-lab') . '">';
							
							foreach ($cmsmasters_fonts_list['local'] as $key => $value) {
								echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_google_font'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
							}
							
						echo '</optgroup>';
					}
					
					
					if (!empty($cmsmasters_fonts_list['web'])) {
						echo '<optgroup label="' . esc_attr__('Google Web Fonts', 'creative-lab') . '">';
							
							foreach ($cmsmasters_fonts_list['web'] as $key => $value) {
								echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_google_font'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
							}
							
						echo '</optgroup>';
					}
					
					
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_google_font">' . esc_html__('Google Font', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		if ($font_size) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<input class="small-text" type="number" id="' . $id . '_font_size_number" name="' . $cmsmasters_option_name . '[' . $id . '_font_size]" value="' . $options[$id . '_font_size'] . '" min="0" step="1" /> ' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_size_number">' . esc_html__('Font Size', 'creative-lab') . ' <em>(' . esc_html__('in pixels', 'creative-lab') . ')</em></label>' . 
			'</div>';
		}
		
		if ($line_height) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<input class="small-text" type="number" id="' . $id . '_line_height_number" name="' . $cmsmasters_option_name . '[' . $id . '_line_height]" value="' . $options[$id . '_line_height'] . '" min="0" step="1" /> ' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_line_height_number">' . esc_html__('Line Height', 'creative-lab') . ' <em>(' . esc_html__('in pixels', 'creative-lab') . ')</em></label>' . 
			'</div>';
		}
		
		if ($font_weight) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_font_weight" name="' . $cmsmasters_option_name . '[' . $id . '_font_weight]">';
				
				foreach (cmsmasters_font_weight_list() as $key => $value) {
					if ($key != 'default') {
						echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_font_weight'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
					}
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_weight">' . esc_html__('Font Weight', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		if ($font_style) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_font_style" name="' . $cmsmasters_option_name . '[' . $id . '_font_style]">';
				
				foreach (cmsmasters_font_style_list() as $key => $value) {
					if ($key != 'default') {
						echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_font_style'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
					}
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_font_style">' . esc_html__('Font Style', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		if ($text_transform) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_text_transform" name="' . $cmsmasters_option_name . '[' . $id . '_text_transform]">';
				
				foreach (cmsmasters_text_transform_list() as $key => $value) {
					echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_text_transform'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_text_transform">' . esc_html__('Text Transform', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		if ($text_decoration) {
			echo '<div class="cmsmasters_admin_block">' . 
				'<select class="select" id="' . $id . '_text_decoration" name="' . $cmsmasters_option_name . '[' . $id . '_text_decoration]">';
				
				foreach (creative_lab_text_decoration_list() as $key => $value) {
					echo '<option value="' . esc_attr($key) . '"' . (($options[$id . '_text_decoration'] == $key) ? ' selected="selected"' : '') . '>' . esc_html($value) .'</option>';
				}
				
				echo '</select>' . 
				' &nbsp; ' . 
				'<label for="' . $id . '_text_decoration">' . esc_html__('Text Decoration', 'creative-lab') . '</label>' . 
			'</div>';
		}
		
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' : '');
		
		break;
	case 'sidebar':
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' . '<br />' . '<br />': '') . 
		'<div class="sidebar_management">' . 
			'<p>' . 
				'<input class="all-options" type="text" id="new_sidebar_name" />' . 
				'<input class="button" type="button" id="add_sidebar" value="' . esc_attr__('Add Sidebar', 'creative-lab') . '" />' . 
			'</p>' . 
			'<div></div>' . 
			'<ul>';
			
			if (isset($options[$id]) && is_array($options[$id])) {
				$i = 0;
				
				foreach($options[$id] as $sidebar) {
					$i++;
					
					echo '<li>' . 
						'<a href="#" class="sidebar_del admin-icon-remove"></a> ' . 
						esc_html($sidebar) . 
						'<input type="hidden" name="' . $cmsmasters_option_name . '[' . $id . '_-_' . $i . ']" value="' . esc_attr($sidebar) . '" />' . 
					'</li>';
				}
			}
			
			echo '</ul>' . 
			'<input id="custom_sidebars_number" type="hidden" name="' . $cmsmasters_option_name . '[' . $id . '_number]" value="' . ((isset($options[$id]) && is_array($options[$id])) ? $i : 0) . '" />' . 
		'</div>';
		
		break;
	case 'google_web_fonts':
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' . '<br />' . '<br />': '') . 
		'<div class="google_web_fonts_manager">' . 
			'<div class="google_web_fonts_manager_items">';
				
				
				if (isset($options[$id]) && is_array($options[$id])) {
					$i = 0;
					
					foreach($options[$id] as $font) {
						$i += 1;
						
						$font = explode('|', $font);
						
						echo '<div class="google_web_fonts_manager_item">' . 
							'<input class="all-options" type="text" id="google_web_font_family" placeholder="' . esc_attr__('Font Family (for example: Roboto Slab)', 'creative-lab') . '" name="' . $cmsmasters_option_name . '[' . $id . '_-_' . $i . '_family]" value="' . esc_attr($font[1]) . '" />' . 
							'<input class="regular-text" type="text" id="google_web_font_style" placeholder="' . esc_attr__('Font Style (for example: Roboto+Slab:100,300,400,700)', 'creative-lab') . '" name="' . $cmsmasters_option_name . '[' . $id . '_-_' . $i . '_style]" value="' . esc_attr($font[0]) . '" />' . 
							'<span class="remove_google_web_font dashicons-trash"></span>' . 
						'</div>';
					}
				}
				
				
			echo '</div>' . 
			'<input id="google_web_fonts_number" type="hidden" name="' . $cmsmasters_option_name . '[' . $id . '_number]" value="' . ((isset($options[$id]) && is_array($options[$id])) ? $i : 0) . '" />' . 
			'<input class="button" type="button" id="add_google_web_font" value="' . esc_attr__('Add Font', 'creative-lab') . '" data-font-family-label="' . esc_attr__('Font Family (for example: Roboto Slab)', 'creative-lab') . '" data-font-style-label="' . esc_attr__('Font Style (for example: Roboto+Slab:100,300,400,700)', 'creative-lab') . '" data-option-name="' . $cmsmasters_option_name . '[' . $id . '_-_" />' . 
		'</div>';
		
		break;
	case 'social':
		echo (($desc != '') ? '<span class="description">' . $desc . '</span>' . '<br />' . '<br />': '') . 
		'<div class="icon_management">' . 
			'<p>' . 
				'<input class="icon_upload_image all-options" type="hidden" id="' . $id . '" value="" />' . 
				'<span id="' . $id . '_icon" data-class="cmsmasters_new_icon_img"></span>' . 
				'<input id="' . $id . '_button" class="cmsmasters_icon_choose_button button" type="button" value="' . esc_attr__('Choose icon', 'creative-lab') . '" />' . 
				'<a href="#" class="cmsmasters_remove_icon admin-icon-remove" title="' . esc_attr__('Cancel changes', 'creative-lab') . '"></a>' . 
			'</p>' . 
			'<span class="cl"><br /></span>' . 
			'<span class="icon_upload_link cmsmasters_dn">' . 
				'<label for="new_icon_color">' . 
					'<span class="cmsmasters_col_label">' . esc_html__('Icon Color', 'creative-lab') . '</span>' . 
					'<div>' . 
						'<input class="cmsmasters-color-field" type="text" id="new_icon_color" value="" data-default-color="" data-alpha="true" data-reset-alpha="true" /> ' . 
					'</div>' . 
				'</label>' . 
				'<label for="new_icon_hover">' . 
					'<span class="cmsmasters_col_label">' . esc_html__('Icon Hover Color', 'creative-lab') . '<br /><em>' . esc_html__('if not selected - Icon Color will be used', 'creative-lab') . '</em></span>' . 
					'<div>' . 
						'<input class="cmsmasters-color-field" type="text" id="new_icon_hover" value="" data-default-color="" data-alpha="true" data-reset-alpha="true" /> ' . 
					'</div>' . 
				'</label>' . 
				'<label for="new_icon_link">' . 
					'<input class="all-options" type="text" id="new_icon_link" /> ' . 
					esc_html__('Icon Link', 'creative-lab') . 
				'</label>' . 
				'<label for="new_icon_title">' . 
					'<input class="all-options" type="text" id="new_icon_title" /> ' . 
					esc_html__('Icon Title', 'creative-lab') . 
				'</label>' . 
				'<label for="new_icon_target">' . 
					'<input type="checkbox" id="new_icon_target" value="true" /> ' . 
					esc_html__('Open link in a new tab/window?', 'creative-lab') . 
				'</label>' . 
			'</span>' . 
			'<span class="cl"></span>' . 
			'<input class="button button-primary" type="button" id="add_icon" value="' . esc_attr__('Add Icon', 'creative-lab') . '" />' . 
			'<input class="button button-primary" type="button" id="edit_icon" value="' . esc_attr__('Save Icon', 'creative-lab') . '" />' . 
			'<ul>';
			
			
			$i = 0;
			
			
			if (isset($options[$id]) && is_array($options[$id])) {
				foreach($options[$id] as $icon) {
					$i++;
					
					
					$icon_attrs = explode('|', $icon);
					
					
					echo '<li>' . 
						'<div class="' . $icon_attrs[0] . '">' . 
							'<input type="hidden" id="' . $cmsmasters_option_name . '_' . $id . '_-_' . $i . '" name="' . $cmsmasters_option_name . '[' . $id . '_-_' . $i . ']" value="' . esc_attr($icon) . '" />' . 
						'</div>' . 
						'<a href="#" class="icon_del admin-icon-remove" title="' . esc_attr__('Remove', 'creative-lab') . '"></a> ' . 
						'<span class="icon_move admin-icon-move"></span> ' . 
					'</li>';
				}
			}
			
			
			echo '</ul>' . 
			'<input id="custom_icons_number" type="hidden" name="' . $cmsmasters_option_name . '[' . $id . '_number]" value="' . $i . '" />' . 
		'</div>';
		
		
		break;
	}
}


function creative_lab_validate_options($input) {
	$valid_input = array();
	
	$settings_output = creative_lab_get_settings();
	$options = $settings_output['cmsmasters_page_fields'];
	
	foreach ($options as $option) {
		switch ($option['type']) {
		case 'text':
			switch ($option['class']) {
			case 'numeric':
				$input[$option['id']] = trim($input[$option['id']]);
				
				$valid_input[$option['id']] = (is_numeric($input[$option['id']])) ? $input[$option['id']] : esc_html__('Expecting a Numeric value!', 'creative-lab');
				
				if (is_numeric($input[$option['id']]) == false) {
					add_settings_error(
						$option['id'],
						'creative-lab' . '_txt_numeric_error',
						esc_html__('Expecting a Numeric value! Please fix.', 'creative-lab'),
						'error'
					);
				}
				
				break;
			case 'multinumeric':
				$input[$option['id']] = trim($input[$option['id']]);
				
				if ($input[$option['id']] != '') {
					$valid_input[$option['id']] = (preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) == 1) ? $input[$option['id']] : esc_html__('Expecting comma separated numeric values', 'creative-lab');
				} else {
					$valid_input[$option['id']] = $input[$option['id']];
				}
				
				if ($input[$option['id']] != '' && preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input[$option['id']]) != 1) {
					add_settings_error(
						$option['id'],
						'creative-lab' . '_txt_multinumeric_error',
						esc_html__('Expecting comma separated numeric values! Please fix.','creative-lab'),
						'error'
					);
				}
				
				break;
			case 'nohtml':
				$input[$option['id']] = sanitize_text_field($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			case 'url':
				$input[$option['id']] = trim($input[$option['id']]);
				
				$valid_input[$option['id']] = esc_url_raw($input[$option['id']]);
				
				break;
			case 'email':
				$input[$option['id']] = trim($input[$option['id']]);
				
				if ($input[$option['id']] != '') {
					$valid_input[$option['id']] = (is_email($input[$option['id']]) !== false) ? $input[$option['id']] : esc_html__('Invalid email! Please re-enter!', 'creative-lab');
				} elseif ($input[$option['id']] == '') {
					$valid_input[$option['id']] = esc_html__('This setting field cannot be empty! Please enter a valid email address.', 'creative-lab');
				}
				
				if (is_email($input[$option['id']]) == false || $input[$option['id']] == '') {
					add_settings_error(
						$option['id'],
						'creative-lab' . '_txt_email_error',
						esc_html__('Please enter a valid email address.', 'creative-lab'),
						'error'
					);
				}
				
				break;
			default:
				$allowed_html = array( 
					'a' => array( 
						'href' => array(), 
						'title' => array(), 
						'class' => array(), 
						'target' => array() 
					), 
					'b' => array(), 
					'em' => array(), 
					'i' => array(), 
					'strong' => array() 
				);
				
				$valid_input[$option['id']] = addslashes(wp_kses(force_balance_tags(trim($input[$option['id']])), $allowed_html));
				
				break;
			}
			
			break;
		case 'multi-text':
			$textarray = array();
			$text_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$text_values[] = $pieces[1];
			}
			
			foreach ($text_values as $v) {
				if (!empty($input[$option['id'] . '|' . $v])) {
					switch ($option['class']) {
						case 'numeric':
							$input[$option['id'] . '|' . $v] = trim($input[$option['id'] . '|' . $v]);
							
							$input[$option['id'] . '|' . $v] = (is_numeric($input[$option['id'] . '|' . $v])) ? $input[$option['id'] . '|' . $v] : '';
						break;
						
						default:
							$input[$option['id'] . '|' . $v] = sanitize_text_field($input[$option['id'] . '|' . $v]);
							$input[$option['id'] . '|' . $v] = addslashes($input[$option['id'] . '|' . $v]);
						break;
					}
					
					$textarray[$v] = $input[$option['id'] . '|' . $v];
				} else {
					$textarray[$v] = '';
				}
			}
			
			if (!empty($textarray)) {
				$valid_input[$option['id']] = $textarray;
			}
			
			break;
		case 'textarea':
			switch ($option['class']) {
			case 'inlinehtml':
				$valid_input[$option['id']] = wp_filter_kses(addslashes(force_balance_tags(trim($input[$option['id']]))));
				
				break;
			case 'nohtml':
				$input[$option['id']] = sanitize_text_field($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			case 'allowlinebreaks':
				$input[$option['id']] = wp_strip_all_tags($input[$option['id']]);
				
				$valid_input[$option['id']] = addslashes($input[$option['id']]);
				
				break;
			default:
				$allowed_html = array( 
					'script' => array( 
						'type' => array() 
					), 
					'style' => array( 
						'type' => array(), 
						'media' => array() 
					), 
					'a' => array( 
						'class' => array(), 
						'href' => array(), 
						'title' => array(), 
						'target' => array() 
					), 
					'b' => array(), 
					'blockquote' => array( 
						'cite' => array() 
					), 
					'br' => array(), 
					'dd' => array(), 
					'dl' => array(), 
					'dt' => array(), 
					'em' => array(), 
					'i' => array(), 
					'li' => array(), 
					'ol' => array(), 
					'p' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'span' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'abbr' => array( 
						'class' => array(), 
						'title' => array(), 
						'style' => array() 
					), 
					'div' => array( 
						'class' => array(), 
						'style' => array() 
					), 
					'img' => array( 
						'src' => array(),
						'width' => array(),
						'height' => array(), 
						'class' => array(),
						'alt' => array() 
					), 
					'q' => array( 
						'cite' => array() 
					), 
					'strong' => array(), 
					'ul' => array(), 
					'h1' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h2' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h3' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h4' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h5' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					), 
					'h6' => array( 
						'align' => array(), 
						'class' => array(), 
						'id' => array(), 
						'style' => array() 
					) 
				);
				
				$valid_input[$option['id']] = addslashes(wp_kses(force_balance_tags(trim($input[$option['id']])), $allowed_html));
				
				break;
			}
			
			break;
		case 'select':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[1];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'select_multiple':
			$select_values = array();
			$select_array = array();
			
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[1];
			}
			
			if (isset($input[$option['id']]) && is_array($input[$option['id']])) {
				foreach ($select_values as $v) {
					if (in_array($v, $input[$option['id']])) {
						$select_array[] = $v;
					}
				}
			}
			
			
			$valid_input[$option['id']] = $select_array;
			
			break;
		case 'select_theme_style':
			$valid_input[$option['id']] = 'true';
			
			break;
		case 'select_scheme':
			$select_values = array();
			
			
			foreach ($option['choices'] as $k => $v) {
				$select_values[] = $k;
			}
			
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			
			break;
		case 'checkbox':
			if (!isset($input[$option['id']])) {
				$input[$option['id']] = null;
			}
			
			$valid_input[$option['id']] = (($input[$option['id']] == 1) ? 1 : 0);
			
			break;
		case 'multi-checkbox':
			$checkboxarray = array();
			$check_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$check_values[] = $pieces[1];
			}
			
			foreach ($check_values as $v) {
				if (!empty($input[$option['id'] . '|' . $v])) {
					$checkboxarray[$v] = 'true';
				} else {
					$checkboxarray[$v] = 'false';
				}
			}
			
			if (!empty($checkboxarray)) {
				$valid_input[$option['id']] = $checkboxarray;
			}
			
			break;
		case 'number':
			$input[$option['id']] = trim($input[$option['id']]);
			$valid_input[$option['id']] = (is_numeric($input[$option['id']])) ? $input[$option['id']] : esc_html__('Number!', 'creative-lab');
			
			if (is_numeric($input[$option['id']]) == false) {
				add_settings_error(
					$option['id'],
					'creative-lab' . '_txt_numeric_error',
					esc_html__('Expecting a Numeric value! Please fix.', 'creative-lab'),
					'error'
				);
			}
			
			break;
		case 'radio':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[1];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'radio_img':
			$select_values = array();
			
			foreach ($option['choices'] as $k => $v) {
				$pieces = explode('|', $v);
				
				$select_values[] = $pieces[2];
			}
			
			$valid_input[$option['id']] = (in_array($input[$option['id']], $select_values) ? $input[$option['id']] : '');
			
			break;
		case 'typorgaphy':
			foreach ($option['choices'] as $v) {
				if (!empty($input[$option['id'] . '_' . $v])) {
					$valid_input[$option['id'] . '_' . $v] = $input[$option['id'] . '_' . $v];
				} else {
					$valid_input[$option['id'] . '_' . $v] = '';
				}
			}
			
			break;
		case 'sidebar':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		case 'google_web_fonts':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$font_family = (isset($input[$option['id'] . '_-_' . $n . '_family']) ? $input[$option['id'] . '_-_' . $n . '_family'] : '');
				$font_style = (isset($input[$option['id'] . '_-_' . $n . '_style']) ? $input[$option['id'] . '_-_' . $n . '_style'] : '');
				
				
				if ($font_style != '' && $font_family != '') {
					$valid_vals[] = $font_style . '|' . $font_family;
				}
			}
			
			$valid_input[$option['id']] = $valid_vals;
			
			break;
		case 'heading':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		case 'social':
			$valid_vals = array();
			
			for ($n = 1, $i = $input[$option['id'] . '_number']; $n <= $i; $n++) {
				$valid_vals[] = $input[$option['id'] . '_-_' . $n];
			}
			
			if (!empty($valid_vals)) {
				$valid_input[$option['id']] = $valid_vals;
			}
			
			break;
		default:
			$valid_input[$option['id']] = $input[$option['id']];
			
			break;
		}
	}
	
	return $valid_input;
}


function creative_lab_show_msg($message, $msgclass = 'info') {
	echo '<div id="message" class="' . $msgclass . '">' . $message . '</div>';
}


function creative_lab_admin_msgs() {
	global $pagenow;
	
	$cmsmasters_settings_pg = (isset($_GET['page'])) ? strpos($_GET['page'], 'cmsmasters-settings') : '';
	
	$set_errors = get_settings_errors(); 
	
	if ($pagenow == 'admin.php' && current_user_can('manage_options') && $cmsmasters_settings_pg !== false && !empty($set_errors)) {
		if ($set_errors[0]['code'] == 'settings_updated' && isset($_GET['settings-updated'])) {
			creative_lab_show_msg('<p><strong>' . $set_errors[0]['message'] . '</strong></p>', 'updated');
		} else {
			foreach ($set_errors as $set_error) {
				creative_lab_show_msg('<p class="setting-error-message" title="' . esc_attr($set_error['setting']) . '">' . $set_error['message'] . '</p>', 'error');
			}
		}
	}
}

add_action('admin_notices', 'creative_lab_admin_msgs');


function creative_lab_add_global_options($reset = false) {
	$cmsmasters_option_names = array( 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_general', 
			creative_lab_options_general_fields('general') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_bg', 
			creative_lab_options_general_fields('bg') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_header', 
			creative_lab_options_general_fields('header') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_content', 
			creative_lab_options_general_fields('content') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_footer', 
			creative_lab_options_general_fields('footer') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_content', 
			creative_lab_options_font_fields('content') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_link', 
			creative_lab_options_font_fields('link') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_nav', 
			creative_lab_options_font_fields('nav') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_heading', 
			creative_lab_options_font_fields('heading') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_other', 
			creative_lab_options_font_fields('other') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_google', 
			creative_lab_options_font_fields('google') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_sidebar', 
			creative_lab_options_element_fields('sidebar') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_icon', 
			creative_lab_options_element_fields('icon') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_lightbox', 
			creative_lab_options_element_fields('lightbox') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_sitemap', 
			creative_lab_options_element_fields('sitemap') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_error', 
			creative_lab_options_element_fields('error') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_code', 
			creative_lab_options_element_fields('code') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_recaptcha', 
			'' 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_post', 
			creative_lab_options_single_fields('post') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_project', 
			creative_lab_options_single_fields('project') 
		), 
		array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_profile', 
			creative_lab_options_single_fields('profile') 
		) 
	);
	
	
	foreach (creative_lab_all_color_schemes_list() as $key => $value) {
		array_push($cmsmasters_option_names, array( 
			'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_color_' . $key, 
			creative_lab_options_color_fields($key) 
		));
	}
	
	
	$cmsmasters_option_names = apply_filters('cmsmasters_add_global_options_filter', $cmsmasters_option_names);
	
	
	foreach ($cmsmasters_option_names as $cmsmasters_option_name) {
		$start_options = array();
		
		if ($cmsmasters_option_name[1] !== '') {
			foreach ($cmsmasters_option_name[1] as $selected_option) {
				if ( 
					is_array($selected_option['std']) && 
					$selected_option['id'] !== 'creative-lab' . '_social_icons' && 
					$selected_option['id'] !== 'creative-lab' . '_google_web_fonts' 
				) {
					foreach ($selected_option['std'] as $key => $value) {
						$start_options[$selected_option['id'] . '_' . $key] = $value;
					}
				} else {
					$start_options[$selected_option['id']] = $selected_option['std'];
				}
			}
			
			if (count($start_options) == 1) {
				foreach ($start_options as $key => $val) {
					if (empty($val)) {
						$start_options_val = '';
					} else {
						$start_options_val = $start_options;
					}
				}
			} else {
				$start_options_val = $start_options;
			}
		} else {
			$start_options_val = '';
		}
		
		if (get_option($cmsmasters_option_name[0]) == false) {
			add_option($cmsmasters_option_name[0], $start_options_val, '', 'yes');
		}
		
		if ($reset) {
			update_option($cmsmasters_option_name[0], $start_options_val);
		}
	}
}


function creative_lab_get_global_options() {
	$cmsmasters_option = array();
	
	$cmsmasters_option_names = array( 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_general', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_bg', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_header', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_content', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_footer', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_content', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_link', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_nav', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_heading', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_other', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_font_google', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_sidebar', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_icon', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_lightbox', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_sitemap', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_error', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_code', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_element_recaptcha', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_post', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_project', 
		'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_single_profile' 
	);
	
	
	foreach (creative_lab_all_color_schemes_list() as $key => $value) {
		array_push($cmsmasters_option_names, 'cmsmasters_options_' . 'creative-lab' . CMSMASTERS_THEME_STYLE . '_color_' . $key);
	}
	
	
	$cmsmasters_option_names = apply_filters('cmsmasters_get_global_options_filter', $cmsmasters_option_names);
	
	
	foreach ($cmsmasters_option_names as $cmsmasters_option_name) {
		if (get_option($cmsmasters_option_name) != false) {
			$option = get_option($cmsmasters_option_name);
			
			$cmsmasters_option = array_merge($cmsmasters_option, $option);
		}
	}
	
	return $cmsmasters_option;
}

