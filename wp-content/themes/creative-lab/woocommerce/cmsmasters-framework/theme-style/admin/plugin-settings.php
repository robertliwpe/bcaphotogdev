<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.1
 *
 * CMSMasters WooCommerce Admin Settings
 * Created by CMSMasters
 *
 */


/* Single Settings */
function creative_lab_woocommerce_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		$options[] = array(
			'section' => 'header_section',
			'id' => 'creative-lab' . '_woocommerce_cart_dropdown',
			'title' => esc_html__('Disable WooCommerce Cart', 'creative-lab'),
			'desc' => '',
			'type' => 'checkbox',
			'std' => 0
		);
	}

	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'creative_lab_woocommerce_options_general_fields', 10, 2);


