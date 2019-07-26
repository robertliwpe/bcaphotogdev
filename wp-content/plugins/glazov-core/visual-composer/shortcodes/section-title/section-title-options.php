<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'glazov_section_title_vc_map' );
if ( ! function_exists( 'glazov_section_title_vc_map' ) ) {
  function glazov_section_title_vc_map() {
    vc_map( array(
      "name" => __( "Section Title", 'glazov-core'),
      "base" => "glazov_section_title",
      "description" => __( "Section Title Shortcodes", 'glazov-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'glazov-core'),
          "param_name" => "section_title",
          "value"      => "",
          "description" => __( "Enter your section title.", 'glazov-core'),
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Content', 'glazov-core'),
          "param_name" => "section_content",
          "value"      => "",
          "description" => __( "Enter your section title content.", 'glazov-core'),
        ),

        GlazovLib::vt_class_option(),

        // Style
        GlazovLib::vt_notice_field(__( "Title Styling", 'glazov-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Section Title Color', 'glazov-core'),
          "param_name" => "section_title_color",
          "value"      => "",
          "description" => __( "Pick your section title color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Section Title Size', 'glazov-core'),
          "param_name" => "section_title_size",
          "value"      => "",
          "description" => __( "Pick your section title size.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Section Content Color', 'glazov-core'),
          "param_name" => "section_content_color",
          "value"      => "",
          "description" => __( "Pick your section title content color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Section Content Size', 'glazov-core'),
          "param_name" => "section_content_size",
          "value"      => "",
          "description" => __( "Pick your section content size.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        
      )
    ) );
  }
}
