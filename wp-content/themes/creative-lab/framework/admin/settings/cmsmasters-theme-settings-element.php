<?php 
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function creative_lab_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'creative-lab');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'creative-lab');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'creative-lab');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'creative-lab');
	$tabs['error'] = esc_attr__('404', 'creative-lab');
	$tabs['code'] = esc_attr__('Custom Codes', 'creative-lab');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'creative-lab');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function creative_lab_options_element_sections() {
	$tab = creative_lab_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'creative-lab');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'creative-lab');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'creative-lab');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'creative-lab');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'creative-lab');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'creative-lab');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'creative-lab');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function creative_lab_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = creative_lab_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = creative_lab_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'creative-lab' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'creative-lab'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['creative-lab' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'creative-lab' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'creative-lab'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['creative-lab' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'creative-lab') . '|dark', 
				esc_html__('Light', 'creative-lab') . '|light', 
				esc_html__('Mac', 'creative-lab') . '|mac', 
				esc_html__('Metro Black', 'creative-lab') . '|metro-black', 
				esc_html__('Metro White', 'creative-lab') . '|metro-white', 
				esc_html__('Parade', 'creative-lab') . '|parade', 
				esc_html__('Smooth', 'creative-lab') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'creative-lab'), 
			'desc' => esc_html__('Sets path for switching windows', 'creative-lab'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'creative-lab') . '|vertical', 
				esc_html__('Horizontal', 'creative-lab') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'creative-lab'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'creative-lab'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'creative-lab'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'creative-lab'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'creative-lab'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'creative-lab'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'creative-lab'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'creative-lab'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'creative-lab'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'creative-lab'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'creative-lab'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'creative-lab') . '|center', 
				esc_html__('Fit', 'creative-lab') . '|fit', 
				esc_html__('Fill', 'creative-lab') . '|fill', 
				esc_html__('Stretch', 'creative-lab') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets buttons be available or not', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'creative-lab'), 
			'desc' => esc_html__('Enable the arrow buttons', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets the fullscreen button', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'creative-lab'), 
			'desc' => esc_html__('Sets the swipe navigation', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'creative-lab' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'creative-lab'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'creative-lab' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_color', 
			'title' => esc_html__('Text Color', 'creative-lab'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['creative-lab' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'creative-lab'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'creative-lab'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'creative-lab'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'creative-lab') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'creative-lab') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'creative-lab') . '|repeat-y', 
				esc_html__('Repeat', 'creative-lab') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'creative-lab'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_pos'], 
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
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'creative-lab') . '|scroll', 
				esc_html__('Fixed', 'creative-lab') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'creative-lab'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['creative-lab' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'creative-lab') . '|auto', 
				esc_html__('Cover', 'creative-lab') . '|cover', 
				esc_html__('Contain', 'creative-lab') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_search', 
			'title' => esc_html__('Search Line', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'creative-lab'), 
			'desc' => esc_html__('show', 'creative-lab'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['creative-lab' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'creative-lab' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'creative-lab'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['creative-lab' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'creative-lab'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['creative-lab' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'creative-lab' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'creative-lab' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'creative-lab' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'creative-lab'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['creative-lab' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

