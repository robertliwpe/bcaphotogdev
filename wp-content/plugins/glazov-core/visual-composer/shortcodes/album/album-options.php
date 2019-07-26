<?php
/**
 * Album - Shortcode Options
 */
add_action( 'init', 'glazov_album_vc_map' );
if ( ! function_exists( 'glazov_album_vc_map' ) ) {
  function glazov_album_vc_map() {
  $args = array(
            'post_type' => 'gallery',
            'posts_per_page' => -1,
        );
  $pages = get_posts($args);
  $album_post = array();
  if ( $pages ) {
    foreach ( $pages as $page ) {
      $album_post[ $page->post_title ] = $page->ID;
    }
  } else {
    $album_post[ esc_html__( 'No Galleries found', 'sewell' ) ] = 0;
  }
    vc_map( array(
      "name" => esc_html__( "Album", 'sewell-core'),
      "base" => "glazov_album",
      "description" => esc_html__( "Album Styles", 'sewell-core'),
      "icon" => "fa fa-briefcase color-green",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Album Style', 'sewell-core' ),
          'value' => array(
            esc_html__( 'Grid', 'sewell-core' ) => 'grid',
            esc_html__( 'Masonry', 'sewell-core' ) => 'masonry',
            esc_html__( 'Thumbnail', 'sewell-core' ) => 'thumbnail',
            esc_html__( 'Client', 'sewell-core' ) => 'client',
          ),
          'admin_label' => true,
          'param_name' => 'album_style',
          'description' => esc_html__( 'Select your album style.', 'sewell-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>esc_html__('Limit', 'sewell-core'),
          "param_name"  => "album_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => esc_html__( "Enter the number of items to show.", 'sewell-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Columns', 'sewell-core' ),
          'value' => array(
            esc_html__( 'Select Album Columns', 'sewell-core' ) => '',
            esc_html__( 'Column Three', 'sewell-core' ) => 'col-item-3',
            esc_html__( 'Column Four', 'sewell-core' ) => 'col-item-4',
          ),
          'admin_label' => true,
          'param_name' => 'album_column',
          'description' => esc_html__( 'Select your album column.', 'sewell-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "dependency" => array(
            "element" => "album_style",
            "value" => array('grid', 'masonry'),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Columns', 'sewell-core' ),
          'value' => array(
            esc_html__( 'Select Album Columns', 'sewell-core' ) => '',
            esc_html__( 'Column Three', 'sewell-core' ) => '3',
            esc_html__( 'Column Four', 'sewell-core' ) => '4',
            esc_html__( 'Column Five', 'sewell-core' ) => '5',
          ),
          'admin_label' => true,
          'param_name' => 'client_album_column',
          'description' => esc_html__( 'Select your album column.', 'sewell-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "dependency" => array(
            "element" => "album_style",
            "value" => array('client'),
          ),
        ),
        array(
    			"type"        => "notice",
    			"heading"     => esc_html__( "Listing", 'sewell-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Order', 'sewell-core' ),
          'value' => array(
            esc_html__( 'Select Album Order', 'sewell-core' ) => '',
            esc_html__('Asending', 'sewell-core') => 'ASC',
            esc_html__('Desending', 'sewell-core') => 'DESC',
          ),
          'param_name' => 'album_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Order By', 'sewell-core' ),
          'value' => array(
            esc_html__('None', 'sewell-core') => 'none',
            esc_html__('ID', 'sewell-core') => 'ID',
            esc_html__('Author', 'sewell-core') => 'author',
            esc_html__('Title', 'sewell-core') => 'title',
            esc_html__('Date', 'sewell-core') => 'date',
          ),
          'param_name' => 'album_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'checkbox',
          "heading"     => esc_html__('Show Posts', 'sewell-core'),
          "param_name"  => "album_show_post",
          "value"       => $album_post,
          "description" => esc_html__( "Check the posts you want to display.", 'sewell-core')
        ),
        GlazovLib::vt_class_option(),
        // Size
        array(
    			"type"        => "notice",
    			"heading"     => esc_html__( "Item Style", 'sewell-core' ),
    			"param_name"  => 'itm_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => esc_html__('Style', 'sewell-core'),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => esc_html__('Image Overlay Color', 'sewell-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "rgba(0, 0, 0, 0.6)",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "dependency" => array(
            "element" => "album_style",
            "value" => array('grid', 'masonry'),
          ),
          "group"       => esc_html__('Style', 'sewell-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => esc_html__('Title Color', 'sewell-core'),
          "param_name"  => "album_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "dependency" => array(
            "element" => "album_style",
            "value" => array('grid', 'masonry'),
          ),
          "group"       => esc_html__('Style', 'sewell-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => esc_html__('Title Size', 'sewell-core'),
          "param_name"  => "album_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "dependency" => array(
            "element" => "album_style",
            "value" => array('grid', 'masonry'),
          ),
          "group"       => esc_html__('Style', 'sewell-core'),
        ),

      )
    ) );
  }
}
