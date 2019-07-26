<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'glazov_services_vc_map' );
if ( ! function_exists( 'glazov_services_vc_map' ) ) {
  function glazov_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'glazov-core'),
      "base" => "glazov_services",
      "description" => __( "Service Shortcodes", 'glazov-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Services Style', 'glazov-core' ),
          'value' => array(
            __( 'Style One', 'glazov-core' ) => 'glzv-service-one',
            __( 'Style Two', 'glazov-core' ) => 'glzv-service-two',
          ),
          'admin_label' => true,
          'param_name' => 'service_style',
          'description' => __( 'Select your service style.', 'glazov-core' ),
        ),
        
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Author Image', 'glazov-core'),
          "param_name" => "service_author_image",
          "value"      => "",
          "description" => __( "Set your service author image.", 'glazov-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Author Content', 'glazov-core'),
          "param_name" => "author_content",
          "value"      => "",
          "description" => __( "Enter your service author content.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Enter Author Name', 'glazov-core'),
          "param_name" => "service_author_sign",
          "value"      => "",
          "description" => __( "Set your service author signature.", 'glazov-core'),
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
        ),

        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Services Icons', 'livesay-core' ),
          'param_name' => 'services_one_items',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Service Icon', 'glazov-core'),
              "param_name" => "service_icon",
              "value"      => "",
              "description" => __( "Set your service author image.", 'glazov-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Service Title', 'glazov-core'),
              "param_name" => "service_title",
              "value"      => "",
              "description" => __( "Enter your service title.", 'glazov-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),

          )
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('View More Button Text', 'glazov-core'),
          "param_name" => "view_more_btn_txt",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Enter your view more button text.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('View More Button Link', 'glazov-core'),
          "param_name" => "view_more_btn_link",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Enter your view more button link.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        GlazovLib::vt_open_link_tab(),

        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Services Icons', 'livesay-core' ),
          'param_name' => 'services_two_items',
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-two',
          ),
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Service Icon', 'glazov-core'),
              "param_name" => "service_two_icon",
              "value"      => "",
              "description" => __( "Set your service author image.", 'glazov-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Service Title', 'glazov-core'),
              "param_name" => "service_two_title",
              "value"      => "",
              "description" => __( "Enter your service title.", 'glazov-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textarea',
              "heading"   => __('Service Content', 'glazov-core'),
              "param_name" => "service_two_content",
              "value"      => "",
              "description" => __( "Enter your service content.", 'glazov-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),

          )
        ),

        GlazovLib::vt_class_option(),

        // Style
        GlazovLib::vt_notice_field(__( "Title Styling", 'glazov-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Author Content Color', 'glazov-core'),
          "param_name" => "author_content_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your author content color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Author Content Size', 'glazov-core'),
          "param_name" => "author_content_size",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your author content size.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"      => 'colorpicker',
          "heading"   => __('Services Title Color', 'glazov-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your services title color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'glazov-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Services Content Color', 'glazov-core'),
          "param_name" => "services_content_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-two',
          ),
          "description" => __( "Pick your services content color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Services Content Size', 'glazov-core'),
          "param_name" => "services_content_size",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-two',
          ),
          "description" => __( "Enter the numeric value for services content size in px.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Bg Color', 'glazov-core'),
          "param_name" => "btn_bg_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button background color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Color', 'glazov-core'),
          "param_name" => "btn_txt_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button text color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Border Color', 'glazov-core'),
          "param_name" => "btn_border_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button border color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Bg Hover Color', 'glazov-core'),
          "param_name" => "btn_bg_hover_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button background hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Hover Color', 'glazov-core'),
          "param_name" => "btn_txt_hover_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button text hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Border Hover Color', 'glazov-core'),
          "param_name" => "btn_border_hover_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'service_style',
            'value' => 'glzv-service-one',
          ),
          "description" => __( "Pick your button border hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
