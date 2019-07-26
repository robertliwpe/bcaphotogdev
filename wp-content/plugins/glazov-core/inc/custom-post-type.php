<?php

/**
 * Initialize Custom Post Type - Glazov Theme
 */

function glazov_custom_post_type() {

	$portfolio_cpt = (glazov_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$portfolio_slug = (glazov_framework_active()) ? cs_get_option('theme_portfolio_slug') : '';
	$portfolio_cpt_slug = (glazov_framework_active()) ? cs_get_option('theme_portfolio_cat_slug') : '';

	$base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$base_slug = (isset($portfolio_slug) && $portfolio_slug !== '') ? sanitize_title_with_dashes($portfolio_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

	// Register custom post type - Portfolio
	register_post_type('portfolio',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'glazov-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'glazov-core' ), $label),
				'add_new' => esc_html__('Add New', 'glazov-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'glazov-core' ), $label),
				'edit' => esc_html__('Edit', 'glazov-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'glazov-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'glazov-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'glazov-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'glazov-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'glazov-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'glazov-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'glazov-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Category', 'glazov-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'glazov-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'glazov-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'glazov-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'glazov-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'glazov-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'glazov-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'glazov-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'glazov-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// gallery post type
	// $gallery_cpt = (glazov_framework_active()) ? cs_get_option('theme_gallery_name') : '';
	// $gallery_slug = (glazov_framework_active()) ? cs_get_option('theme_gallery_slug') : '';
	// $gallery_cpt_slug = (glazov_framework_active()) ? cs_get_option('theme_gallery_cat_slug') : '';

	$gal_base = 'gallery';
	$gal_base_slug = 'gallery';
	$gallery = 'Gallery';

	// Register custom post type - Portfolio
	register_post_type('gallery',
		array(
			'labels' => array(
				'name' => $gallery,
				'singular_name' => sprintf(esc_html__('%s Post', 'glazov-core' ), $gallery),
				'all_items' => sprintf(esc_html__('All %s', 'glazov-core' ), $gallery),
				'add_new' => esc_html__('Add New', 'glazov-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'glazov-core' ), $gallery),
				'edit' => esc_html__('Edit', 'glazov-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'glazov-core' ), $gallery),
				'new_item' => sprintf(esc_html__('New %s', 'glazov-core' ), $gallery),
				'view_item' => sprintf(esc_html__('View %s', 'glazov-core' ), $gallery),
				'search_items' => sprintf(esc_html__('Search %s', 'glazov-core' ), $gallery),
				'not_found' => esc_html__('Nothing found in the Database.', 'glazov-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'glazov-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite' => array(
				'slug' => $gal_base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Portfolio
	register_taxonomy(
		'gallery_category',
		'gallery',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'glazov-core' ), $gallery),
				'singular_name' => sprintf(esc_html__('%s Category', 'glazov-core'), $gallery),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'glazov-core'), $gallery),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'glazov-core'), $gallery),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'glazov-core'), $gallery),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'glazov-core'), $gallery),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'glazov-core'), $gallery),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'glazov-core'), $gallery),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'glazov-core'), $gallery),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'glazov-core'), $gallery)
			),
			'rewrite' => array( 'slug' => $gal_base . '_cat' ),
		)
	);

	// Testimonials - Start
	$testimonial_slug = 'testimonial';
	$testimonials = __('Testimonials', 'glazov-core');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testimonials,
				'singular_name' => sprintf(esc_html__('%s Post', 'glazov-core' ), $testimonials),
				'all_items' => sprintf(esc_html__('%s', 'glazov-core' ), $testimonials),
				'add_new' => esc_html__('Add New', 'glazov-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'glazov-core' ), $testimonials),
				'edit' => esc_html__('Edit', 'glazov-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'glazov-core' ), $testimonials),
				'new_item' => sprintf(esc_html__('New %s', 'glazov-core' ), $testimonials),
				'view_item' => sprintf(esc_html__('View %s', 'glazov-core' ), $testimonials),
				'search_items' => sprintf(esc_html__('Search %s', 'glazov-core' ), $testimonials),
				'not_found' => esc_html__('Nothing found in the Database.', 'glazov-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'glazov-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'glazov_post_type',
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array(
				'slug' => $testimonial_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
			)
		)
	);
	// Testimonials - End

	// Team - Start
	$team_slug = 'team';
	$teams = __('Teams', 'glazov-core');

	// Register custom post type - Team
	register_post_type('team',
		array(
			'labels' => array(
				'name' => $teams,
				'singular_name' => sprintf(esc_html__('%s Post', 'glazov-core' ), $teams),
				'all_items' => sprintf(esc_html__('%s', 'glazov-core' ), $teams),
				'add_new' => esc_html__('Add New', 'glazov-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'glazov-core' ), $teams),
				'edit' => esc_html__('Edit', 'glazov-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'glazov-core' ), $teams),
				'new_item' => sprintf(esc_html__('New %s', 'glazov-core' ), $teams),
				'view_item' => sprintf(esc_html__('View %s', 'glazov-core' ), $teams),
				'search_items' => sprintf(esc_html__('Search %s', 'glazov-core' ), $teams),
				'not_found' => esc_html__('Nothing found in the Database.', 'glazov-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'glazov-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'glazov_post_type',
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $team_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Team - End

}

// Post Type - Menu
if( ! function_exists( 'glazov_post_type_menu' ) ) {
  function glazov_post_type_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {
			add_menu_page( __('Company', 'glazov-core'), __('Company', 'glazov-core'), 'edit_theme_options', 'glazov_post_type', 'vt_welcome_page', 'dashicons-groups', 10 );
    }
  }
}
add_action( 'admin_menu', 'glazov_post_type_menu' );

// Portfolio Slug
function glazov_custom_portfolio_slug() {
	$portfolio_cpt = (glazov_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$portfolio_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
}
add_action( 'cs_validate_save_after','glazov_custom_portfolio_slug' );

// After Theme Setup
function glazov_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	glazov_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'glazov_custom_flush_rules');
add_action('init', 'glazov_custom_post_type');

// Avoid portfolio post type as 404 page while it change
function vt_cpt_avoid_error_portfolio() {
	$portfolio_cpt = (glazov_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
	$set = get_option('post_type_rules_flased_' . $portfolio_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $portfolio_cpt,true);
	}
}
add_action('init', 'vt_cpt_avoid_error_portfolio');

// Add Filter by Category in Portfolio Type
add_action('restrict_manage_posts', 'glazov_filter_portfolio_categories');
function glazov_filter_portfolio_categories() {
	global $typenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'glazov-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Portfolio Search => ID to Term
add_filter('parse_query', 'glazov_portfolio_id_term_search');
function glazov_portfolio_id_term_search($query) {
	global $pagenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* ---------------------------------------------------------------------------
 * Custom columns - Portfolio
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-portfolio_columns", "glazov_portfolio_edit_columns");
function glazov_portfolio_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'glazov-core' );
  $new_columns['thumbnail'] = __('Image', 'glazov-core' );
  $new_columns['portfolio_category'] = __('Categories', 'glazov-core' );
  $new_columns['portfolio_order'] = __('Order', 'glazov-core' );
  $new_columns['date'] = __('Date', 'glazov-core' );

  return $new_columns;
}
add_action('manage_portfolio_posts_custom_column', 'glazov_manage_portfolio_columns', 10, 2);
function glazov_manage_portfolio_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Categories' column. */
    case 'portfolio_category' :

      $terms = get_the_terms( $post->ID, 'portfolio_category' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio_category' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_category', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "portfolio_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "glazov_testimonial_edit_columns");
function glazov_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'glazov-core' );
  $new_columns['thumbnail'] = __('Image', 'glazov-core' );
  $new_columns['name'] = __('Client Name', 'glazov-core' );
  $new_columns['date'] = __('Date', 'glazov-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'glazov_manage_testimonial_columns', 10, 2);
function glazov_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-team_columns", "glazov_team_edit_columns");
function glazov_team_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'glazov-core' );
  $new_columns['thumbnail'] = __('Image', 'glazov-core' );
  $new_columns['name'] = __('Job Position', 'glazov-core' );
  $new_columns['date'] = __('Date', 'glazov-core' );

  return $new_columns;
}

add_action('manage_team_posts_custom_column', 'glazov_manage_team_columns', 10, 2);
function glazov_manage_team_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
      echo $team_options['team_job_position'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
