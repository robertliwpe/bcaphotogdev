<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'glazov_blog_vc_map' );
if ( ! function_exists( 'glazov_blog_vc_map' ) ) {
  function glazov_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'glazov-core'),
      "base" => "glzv_blog",
      "description" => __( "Blog Styles", 'glazov-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'glazov-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'glazov-core'),
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Meta's to Hide", 'glazov-core' ),
    			"param_name"  => 'mts_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        => 'switcher',
          "heading"     => __('Category', 'glazov-core'),
          "param_name"  => "blog_category",
          "value"       => "",
          "std"         => false,
          'edit_field_class' => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'glazov-core'),
          "param_name"  => "blog_date",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'glazov-core'),
          "param_name"  => "blog_author",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Likes', 'glazov-core'),
          "param_name"  => "blog_likes",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
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
            __( 'Select Blog Order', 'glazov-core' ) => '',
            __('Asending', 'glazov-core') => 'ASC',
            __('Desending', 'glazov-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
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
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'glazov-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'glazov-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Short Content (Excerpt Length)', 'glazov-core'),
          "param_name"  => "short_content",
          "value"       => "",
          "description" => __( "Enter the numeric value of, how many words you want in short content paragraph.", 'glazov-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'glazov-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Button Text', 'glazov-core'),
          "param_name"  => "read_more_txt",
          "value"       => "",
          "description" => __( "Enter read more button text.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        GlazovLib::vt_class_option(),

      )
    ) );
  }
}
