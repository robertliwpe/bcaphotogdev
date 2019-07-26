<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'glazov-core'),
    "base" => "glzv_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'glazov-core'),
    "icon" => "fa fa-comments color-green",
    "category" => GlazovLib::glazov_cat_name(),
    "params" => array(

      array(
        "type"        =>'textfield',
        "heading"     =>__('Testimonial Title', 'glazov-core'),
        "param_name"  => "testimonial_short_text",
        "value"       => "",
        "description" => __( "Enter the short text that shows above testimonial.", 'glazov-core'),
      ),
      array(
        "type"        => "notice",
        "heading"     => __( "Listing", 'glazov-core' ),
        "param_name"  => 'lsng_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Limit', 'glazov-core'),
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'glazov-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'glazov-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'glazov-core' ) => '',
          __('Asending', 'glazov-core') => 'ASC',
          __('Desending', 'glazov-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
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
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      
      GlazovLib::vt_class_option(),

      // Carousel
      GlazovLib::vt_notice_field(__( "Basic Options", 'glazov-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
      GlazovLib::vt_carousel_loop(), // Loop
      GlazovLib::vt_carousel_items(), // Items
      GlazovLib::vt_carousel_margin(), // Margin
      GlazovLib::vt_carousel_dots(), // Dots
      GlazovLib::vt_carousel_nav(), // Nav
      GlazovLib::vt_notice_field(__( "Auto Play & Interaction", 'glazov-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
      GlazovLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
      GlazovLib::vt_carousel_autoplay(), // Autoplay
      GlazovLib::vt_carousel_animateout(), // Animate Out
      GlazovLib::vt_carousel_mousedrag(), // Mouse Drag
      GlazovLib::vt_notice_field(__( "Width & Height", 'glazov-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
      GlazovLib::vt_carousel_autowidth(), // Auto Width
      GlazovLib::vt_carousel_autoheight(), // Auto Height
      GlazovLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
      GlazovLib::vt_carousel_tablet(), // Tablet
      GlazovLib::vt_carousel_mobile(), // Mobile
      GlazovLib::vt_carousel_small_mobile(), // Small Mobile

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'glazov-core'),
        "param_name"  => "title_color",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'glazov-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'glazov-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Color', 'glazov-core'),
        "param_name"  => "profession_color",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'glazov-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'glazov-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'glazov-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Profession Size', 'glazov-core'),
        "param_name"  => "profession_size",
        "value"       => "",
        "group"       => __('Style', 'glazov-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}