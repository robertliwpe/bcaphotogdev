<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'glazov_button_vc_map' );
if ( ! function_exists( 'glazov_button_vc_map' ) ) {
  function glazov_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'glazov-core'),
      "base" => "glzv_button",
      "description" => __( "Button Styles", 'glazov-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Size', 'glazov-core' ),
          'value' => array(
            __( 'Select Button Size', 'glazov-core' ) => '',
            __( 'Small', 'glazov-core' ) => 'glzv-btn-small',
            __( 'Medium', 'glazov-core' ) => 'glzv-btn-medium',
          ),
          'admin_label' => true,
          'param_name' => 'button_size',
          'description' => __( 'Select button size', 'glazov-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'glazov-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'glazov-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'glazov-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'glazov-core' ),
          "off_text" => __( "No", 'glazov-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        GlazovLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'glazov-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'glazov-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'glazov-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'glazov-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'glazov-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'glazov-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'glazov-core'),
          "group" => __( "Styling", 'glazov-core'),
        ),

        // Icon
        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Alignment', 'glazov-core' ),
          'value' => array(
            __( 'Select Icon Alignment', 'glazov-core' ) => '',
            __( 'Left', 'glazov-core' ) => 'btn-icon-left',
            __( 'Right', 'glazov-core' ) => 'btn-icon-right',
          ),
          'param_name' => 'icon_alignment',
          'description' => __( 'Select icon alignment in this button.', 'glazov-core' ),
          "group" => __( "Icon", 'glazov-core'),
        ),
        array(
          "type" => "vt_icon",
          "heading" => __( "Select Icon", 'glazov-core' ),
          "param_name" => "select_icon",
          'value' => '',
          "description" => __( "Select icon if you want.", 'glazov-core'),
          "group" => __( "Icon", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'glazov-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter icon size in px.", 'glazov-core'),
          "group" => __( "Icon", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'glazov-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "description" => __( "Pick your icon color.", 'glazov-core'),
          "group" => __( "Icon", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'glazov-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "description" => __( "Pick your icon hover color.", 'glazov-core'),
          "group" => __( "Icon", 'glazov-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'glazov-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'glazov-core'),
        ),

      )
    ) );
  }
}
