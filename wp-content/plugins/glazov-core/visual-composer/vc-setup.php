<?php
/**
 * Visual Composer Related Functions
 */

// Init Visual Composer
if( ! function_exists( 'glazov_init_vc_shortcodes' ) ) {
  function glazov_init_vc_shortcodes() {
    if ( defined( 'WPB_VC_VERSION' ) ) {

      /* Visual Composer - Setup */
      require_once( GLAZOV_SHORTCODE_BASE_PATH . '/lib/lib.php' );
      require_once( GLAZOV_SHORTCODE_BASE_PATH . '/lib/add-params.php' );
      require_once( GLAZOV_SHORTCODE_BASE_PATH . '/pre_pages/pre-pages.php' );

      /* All Shortcodes */
      if (class_exists('WPBakeryVisualComposerAbstract')) {

        // Templates
        $dir = GLAZOV_SHORTCODE_BASE_PATH . '/vc_templates';
        vc_set_shortcodes_templates_dir( $dir );

        /* Set VC editor as default in following post types */
        $list = array(
          'post',
          'page',
          'portfolio',
          'team',
          'testimonial'
        );
        vc_set_default_editor_post_types( $list );

      } // class_exists

      // Add New Param - VC_Row
      $vc_row_attr = array(
        array(
          "type" => "switcher",
          "heading" => __( "Need Overlay Dotted Image?", 'glazov' ),
          "description" => __( "Enable it, if you want overlay dotted image.", 'glazov' ),
          "param_name" => "overlay_dotted",
          "on_text" => __( "Yes", 'glazov'),
          "off_text" => __( "No", 'glazov'),
          "group" => __( "Design Options", 'glazov'),
          "std" => false,
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Overlay Color", 'glazov' ),
          "description" => __( "Pick your overlay color, make sure you've controlled opacity.", 'glazov' ),
          "param_name" => "overlay_color",
          "group" => __( "Design Options", 'glazov'),
        ),
        array(
          'type' => 'dropdown',
          'value' => array(
            __( 'Select Width', 'glazov' ) => 'select',
            __( 'Width One (1520)', 'glazov' ) => 'width_one',
            __( 'Width Two (1390)', 'glazov' ) => 'width_two',
            __( 'Width Three (1240)', 'glazov' ) => 'width_three',
            __( 'Width Four (1013)', 'glazov' ) => 'width_four',
            __( 'Width Five (870)', 'glazov' ) => 'width_five',
            __( 'Width Six (830)', 'glazov' ) => 'width_six',
            __( 'Width Seven (750)', 'glazov' ) => 'width_seven',
            __( 'Width Eight (710)', 'glazov' ) => 'width_eight',

          ),
          'heading' => __( 'Inner Row Width', 'glazov' ),
          'param_name' => 'inner_row_width',
          "description"  => __('Inner Container Variation', 'glazov'),
        ),
      );
      vc_add_params( 'vc_row', $vc_row_attr );
      // Add New Param - VC_Column
      $vc_column_attr = array(
        array(
          'type' => 'dropdown',
          'value' => array(
            __( 'Default Alignment', 'glazov-core' ) => 'text-default',
            __( 'Text Left', 'glazov-core' ) => 'text-left',
            __( 'Text Right', 'glazov-core' ) => 'text-right',
            __( 'Text Center', 'glazov-core' ) => 'text-center',
          ),
          'heading' => __( 'Text Alignment', 'glazov-core' ),
          'param_name' => 'text_alignment',
        ),
      );
      vc_add_params( 'vc_column', $vc_column_attr );

    }
  }

  add_action( 'vc_before_init', 'glazov_init_vc_shortcodes' );
}

/* Remove VC Teaser metabox */
if ( is_admin() ) {
  if ( ! function_exists('glazov_vt_remove_vc_boxes') ) {
    function glazov_vt_remove_vc_boxes(){
      $post_types = get_post_types( '', 'names' );
      foreach ( $post_types as $post_type ) {
        remove_meta_box('vc_teaser',  $post_type, 'side');
      }
    } // End function
  } // End if
  add_action('do_meta_boxes', 'glazov_vt_remove_vc_boxes');
}