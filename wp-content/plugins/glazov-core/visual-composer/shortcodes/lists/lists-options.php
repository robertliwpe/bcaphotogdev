<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'glazov_list_vc_map' );
if ( ! function_exists( 'glazov_list_vc_map' ) ) {
  function glazov_list_vc_map() {
    vc_map( array(
      "name" => __( "List", 'glazov-core'),
      "base" => "glzv_list",
      "description" => __( "List Styles", 'glazov-core'),
      "icon" => "fa fa-list color-red",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'List Style', 'glazov-core' ),
          'value' => array(
            __( 'Style One (Image or Icon)', 'glazov-core' ) => 'glzv-list-one',
            __( 'Style Two (Simple Circle)', 'glazov-core' ) => 'glzv-list-two',
            __( 'Style Three (Contact Section)', 'glazov-core' ) => 'glzv-list-three',
            __( 'Style Four (Person Details)', 'glazov-core' ) => 'glzv-list-four',
          ),
          'admin_label' => true,
          'param_name' => 'list_style',
          'description' => __( 'Select your list style.', 'glazov-core' ),
        ),

        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'glazov-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Icon', 'glazov-core' ) => 'list_icon',
                __( 'Image', 'glazov-core' ) => 'list_image',
              ),
              'heading' => __( 'Icon or Image', 'glazov-core' ),
              'param_name' => 'icon_image',
            ),
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'glazov-core' ),
              'param_name' => 'select_icon',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_icon',
              ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload Icon Image', 'glazov-core' ),
              'param_name' => 'select_image',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_image',
              ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'glazov-core' ),
              'param_name' => 'list_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'glazov-core' ),
              'param_name' => 'list_text',
            ),

          )
        ),
        GlazovLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'glazov-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'glazov-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Bullet/Icon Color', 'glazov-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'glazov-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'glazov-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'glazov-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Bullet/Icon Size', 'glazov-core' ),
          'param_name' => 'icon_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'glazov-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'glazov-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'glazov-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'glazov-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'glazov-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'glazov-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in list style type one.', 'glazov-core' ),
        ),

      )
    ) );
  }
}
