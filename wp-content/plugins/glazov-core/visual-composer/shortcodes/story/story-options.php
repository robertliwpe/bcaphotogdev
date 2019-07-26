<?php
/**
 * Story - Shortcode Options
 */
add_action( 'init', 'glazov_story_vc_map' );
if ( ! function_exists( 'glazov_story_vc_map' ) ) {
  function glazov_story_vc_map() {
    vc_map( array(
      "name" => __( "Story", 'glazov-core'),
      "base" => "glazov_story",
      "description" => __( "Story Shortcodes", 'glazov-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Story Image', 'glazov-core'),
          "param_name" => "story_image",
          "value"      => "",
          "description" => __( "Set your story image.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        GlazovLib::vt_notice_field(__( "Content Area", 'glazov-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Story Title', 'glazov-core'),
          "param_name" => "story_title",
          "value"      => "",
          "description" => __( "Enter your story title.", 'glazov-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Story Sub-Title', 'glazov-core'),
          "param_name" => "story_sub_title",
          "value"      => "",
          "description" => __( "Enter your story sub-title.", 'glazov-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Story Caption', 'glazov-core'),
          "param_name" => "story_caption",
          "value"      => "",
          "description" => __( "Enter your story caption.", 'glazov-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'glazov-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your story content here.", 'glazov-core')
        ),

        // Read More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Read More Link", 'glazov-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"      => 'href',
          "heading"   => __('Link', 'glazov-core'),
          "param_name" => "read_more_link",
          "value"      => "",
          "description" => __( "Set your link for read more.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'story_style',
            'value' => 'glzv-story-one',
          ),
        ),
        GlazovLib::vt_open_link_tab(),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'glazov-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'story_style',
            'value' => 'glzv-story-one',
          ),
        ),
        GlazovLib::vt_class_option(),

        // Style
        GlazovLib::vt_notice_field(__( "Title Styling", 'glazov-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Section Background Color', 'glazov-core'),
          "param_name" => "bg_color",
          "value"      => "",
          "description" => __( "Pick your content section bg color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'glazov-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'glazov-core'),
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
          "heading"   => __('Sub-Title Color', 'glazov-core'),
          "param_name" => "sub_title_color",
          "value"      => "",
          "description" => __( "Pick your sub-title color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Sub-Title Size', 'glazov-core'),
          "param_name" => "sub_title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for sub-title size in px.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Caption Color', 'glazov-core'),
          "param_name" => "title_caption_color",
          "value"      => "",
          "description" => __( "Pick your title caption color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Caption Size', 'glazov-core'),
          "param_name" => "title_caption_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title caption size in px.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'glazov-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'glazov-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Bg Color', 'glazov-core'),
          "param_name" => "btn_bg_color",
          "value"      => "",
          "description" => __( "Pick your button background color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Color', 'glazov-core'),
          "param_name" => "btn_txt_color",
          "value"      => "",
          "description" => __( "Pick your button text color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Border Color', 'glazov-core'),
          "param_name" => "btn_border_color",
          "value"      => "",
          "description" => __( "Pick your button border color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Bg Hover Color', 'glazov-core'),
          "param_name" => "btn_bg_hover_color",
          "value"      => "",
          "description" => __( "Pick your button background hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Hover Color', 'glazov-core'),
          "param_name" => "btn_txt_hover_color",
          "value"      => "",
          "description" => __( "Pick your button text hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Border Hover Color', 'glazov-core'),
          "param_name" => "btn_border_hover_color",
          "value"      => "",
          "description" => __( "Pick your button border hover color.", 'glazov-core'),
          "group" => __( "Style", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
