<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.2
 * 
 * WooCommerce Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function creative_lab_woocommerce_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('creative-lab-woocommerce-extend', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-plugin-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('creative-lab-woocommerce-extend', 'cmsmasters_woocommerce_shortcodes', array( 
			'product_ids' => 								creative_lab_woocommerce_product_ids(), 
			'products_title' =>								esc_html__('Products', 'creative-lab'), 
			'products_shortcode_title' =>					esc_html__('WooCommerce Shortcode', 'creative-lab'), 
			'products_shortcode_descr' =>					esc_html__('Choose a WooCommerce shortcode to use', 'creative-lab'), 
			'choice_recent_products' =>						esc_html__('Recent Products', 'creative-lab'), 
			'choice_featured_products' =>					esc_html__('Featured Products', 'creative-lab'), 
			'choice_product_categories' =>					esc_html__('Product Categories', 'creative-lab'), 
			'choice_sale_products' =>						esc_html__('Sale Products', 'creative-lab'), 
			'choice_best_selling_products' =>				esc_html__('Best Selling Products', 'creative-lab'), 
			'choice_top_rated_products' =>					esc_html__('Top Rated Products', 'creative-lab'), 
			'products_field_orderby_descr' =>				esc_html__("Choose your products 'order by' parameter", 'creative-lab'), 
			'products_field_orderby_descr_note' =>			esc_html__("Sorting will not be applied for", 'creative-lab'), 
			'products_field_prod_number_title' =>			esc_html__('Number of Products', 'creative-lab'), 
			'products_field_prod_number_descr' =>			esc_html__('Enter the number of products for showing per page', 'creative-lab'), 
			'products_field_col_count_descr' =>				esc_html__('Choose number of products per row', 'creative-lab'), 
			'selected_products_title' =>					esc_html__('Selected Products', 'creative-lab'), 
			'selected_products_field_ids' => 				esc_html__('Products', 'creative-lab'), 
			'selected_products_field_ids_descr' => 			esc_html__('Choose products to be shown', 'creative-lab'), 
			'selected_products_field_ids_descr_note' => 	esc_html__('All products will be shown if empty', 'creative-lab') 
		));
	}
}

add_action('admin_enqueue_scripts', 'creative_lab_woocommerce_register_c_c_scripts');



/* Product IDs */
function creative_lab_woocommerce_product_ids() {
	$product_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'product'
	));
	
	
	$out = array();
	
	
	if (!empty($product_ids)) {
		foreach ($product_ids as $product_id) {
			$out[$product_id->ID] = esc_html($product_id->post_title);
		}
	}
	
	
	return $out;
}

