<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'team_vc_map' );
if ( ! function_exists( 'team_vc_map' ) ) {
  function team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'glazov-core'),
    "base" => "glazov_team",
    "description" => __( "Team Style", 'glazov-core'),
    "icon" => "fa fa-user color-red",
    "category" => GlazovLib::glazov_cat_name(),
    "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Section Title', 'glazov-core'),
          "param_name"  => "team_section_title",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter team section title.", 'glazov-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Section Sub-Title', 'glazov-core'),
          "param_name"  => "team_section_sub_title",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter team section sub-title.", 'glazov-core'),
        ),

        array(
          "type" => "dropdown",
          "heading" => __( "Team Column", 'glazov-core' ),
          "param_name" => "team_column",
          "value" => array(
            __('Select Column', 'glazov-core') => '',
            __('Column Three', 'glazov-core') => 'col-md-4 col-sm-6',
            __('Column Four', 'glazov-core') => 'col-md-3 col-sm-6',
          ),
          "admin_label" => true,
          "description" => __( "Select team column.", 'glazov-core'),
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
          "param_name"  => "team_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'glazov-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Specific ID', 'glazov-core'),
          "param_name"  => "team_id",
          "value"       => "",
          "description" => __( "Enter your team members ID, to show them only by your choice.", 'glazov-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'glazov-core' ),
          'value' => array(
            __( 'Select Team Order', 'glazov-core' ) => '',
            __('Asending', 'glazov-core') => 'ASC',
            __('Desending', 'glazov-core') => 'DESC',
          ),
          'param_name' => 'team_order',
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
          'param_name' => 'team_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'glazov-core'),
          "param_name"  => "team_pagination",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need pagination, turn this to On.", 'glazov-core'),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Social Icons', 'glazov-core'),
          "param_name"  => "team_social_icon",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need social icon, turn this to On.", 'glazov-core'),
        ),
        GlazovLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Color', 'glazov-core'),
          "param_name"  => "name_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Profession Color', 'glazov-core'),
          "param_name"  => "profession_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),
        // Size
        array(
          "type"        =>'textfield',
          "heading"     =>__('Name Size', 'glazov-core'),
          "param_name"  => "name_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession Size', 'glazov-core'),
          "param_name"  => "profession_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Overlay Color', 'glazov-core'),
          "param_name"  => "overlay_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Overlay Content Color', 'glazov-core'),
          "param_name"  => "overlay_cnt_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'glazov-core'),
        ),

      ), // Params
    ) );
  }
}