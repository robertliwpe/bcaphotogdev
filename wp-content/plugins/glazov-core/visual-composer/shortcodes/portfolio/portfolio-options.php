<?php
/**
 * Portfolio - Shortcode Options
 */
add_action( 'init', 'glazov_portfolio_vc_map' );
if ( ! function_exists( 'glazov_portfolio_vc_map' ) ) {
  function glazov_portfolio_vc_map() {
    vc_map( array(
      "name" => __( "Portfolio", 'glazov-core'),
      "base" => "glzv_portfolio",
      "description" => __( "Portfolio Styles", 'glazov-core'),
      "icon" => "fa fa-briefcase color-green",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Portfolio Style', 'glazov-core' ),
          'value' => array(
            __( 'Style One', 'glazov-core' ) => 'bpw-style-one',
            __( 'Style Two', 'glazov-core' ) => 'bpw-style-two',
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_style',
          'description' => __( 'Select your portfolio style.', 'glazov-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'glazov-core'),
          "param_name"  => "portfolio_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'glazov-core' ),
          'value' => array(
            __( 'Select Portfolio Columns', 'glazov-core' ) => '',
            __( 'Column Five', 'glazov-core' ) => 'bpw-col-5',
            __( 'Column Four', 'glazov-core' ) => 'bpw-col-4',
            __( 'Column Three', 'glazov-core' ) => 'bpw-col-3',
          ),
          'admin_label' => true,
          'param_name' => 'portfolio_column',
          'description' => __( 'Select your portfolio column.', 'glazov-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Enable & Disable", 'glazov-core' ),
    			"param_name"  => 'ends_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Filter', 'glazov-core'),
          "param_name"  => "portfolio_filter",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'glazov-core'),
          "param_name"  => "portfolio_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('No Space', 'glazov-core'),
          "param_name"  => "portfolio_no_space",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => 'switcher',
          "heading"     => __('Disable Featured Image Size Limit', 'glazov-core'),
          "param_name"  => "disable_size_limit",
          "value"       => "",
          "std"         => false,
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'glazov-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'glazov-core' ),
          'value' => array(
            __( 'Select Portfolio Order', 'glazov-core' ) => '',
            __('Asending', 'glazov-core') => 'ASC',
            __('Desending', 'glazov-core') => 'DESC',
          ),
          'param_name' => 'portfolio_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'glazov-core' ),
          'value' => array(
            __('None', 'glazov-core') => 'none',
            __('ID', 'glazov-core') => 'ID',
            __('Author', 'glazov-core') => 'author',
            __('Title', 'glazov-core') => 'title',
            __('Date', 'glazov-core') => 'date',
          ),
          'param_name' => 'portfolio_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'glazov-core'),
          "param_name"  => "portfolio_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'glazov-core')
        ),
        GlazovLib::vt_class_option(),

        // Stylings
        // Size
        array(
    			"type"        => "notice",
    			"heading"     => __( "Item Style", 'glazov-core' ),
    			"param_name"  => 'itm_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
          "group"       => __('Style', 'glazov-core'),
    		),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Image Overlay Color', 'glazov-core'),
          "param_name"  => "image_overlay_color",
          "value"       => "rgba(0,41,82,0.9)",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'glazov-core'),
          "param_name"  => "portfolio_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'glazov-core'),
          "param_name"  => "portfolio_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Hover Color', 'glazov-core'),
          "param_name"  => "portfolio_title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Categroy Color', 'glazov-core'),
          "param_name"  => "portfolio_cat_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Category Hover Color', 'glazov-core'),
          "param_name"  => "portfolio_cat_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Category Size', 'glazov-core'),
          "param_name"  => "portfolio_cat_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'glazov-core'),
          'dependency' => array(
            'element' => 'portfolio_style',
            'value' => 'bpw-style-one',
          ),
        ),

      )
    ) );
  }
}
