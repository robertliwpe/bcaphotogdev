<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'glazov_vt_shortcodes' ) ) {
  function glazov_vt_shortcodes( $options ) {

    $options       = array();

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'glazov'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'glazov'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Download Button
        array(
          'name'          => 'vt_download_btn',
          'title'         => __('Download Button', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'glazov'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'glazov'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'glazov'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'glazov'),
              'on_text'     => __('Yes', 'glazov'),
              'off_text'     => __('No', 'glazov'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'glazov'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'glazov')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'glazov')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'glazov'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'glazov')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'glazov'),
              'attributes' => array(
                'placeholder'     => 'Eg: 18px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
        ),
        // Download Button

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'glazov'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'glazov'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'glazov'),
              'on_text'     => __('Yes', 'glazov'),
              'off_text'     => __('No', 'glazov'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'glazov'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'glazov')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'glazov')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'glazov')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'glazov'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => __('Blockquote Style', 'glazov'),
              'options'        => array(
                '' => __('Select Blockquote Style', 'glazov'),
                'style-one' => __('Style One', 'glazov'),
                'style-two' => __('Style Two', 'glazov'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'glazov'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'glazov'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'glazov'),
            ),
            array(
              'id'        => 'author_color',
              'type'      => 'color_picker',
              'title'     => __('Author Color', 'glazov'),
            ),
            array(
              'id'        => 'author_size',
              'type'      => 'text',
              'title'     => __('Author Text Size', 'glazov'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'glazov'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'glazov'),
            ),
            // Content
            array(
              'id'        => 'blockquote_content',
              'type'      => 'textarea',
              'title'     => __('Content', 'glazov'),
            ),
            array(
              'id'        => 'author',
              'type'      => 'text',
              'title'     => __('Author', 'glazov'),
            ),

          ),

        ),
        // Blockquotes

        // List Styles
        array(
          'name'          => 'vt_address_lists',
          'title'         => __('Address Lists', 'glazov'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_list',
          'clone_title'   => __('Add New', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'glazov'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'glazov')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'glazov'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_icon',
              'type'      => 'upload',
              'title'     => __('List Icon', 'glazov')
            ),
            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Title', 'glazov')
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'glazov'),
              'desc'       => esc_html__('Type multiple text by separting "|"', 'glazov'),
            ),
            array(
              'id'        => 'list_text_link',
              'type'      => 'textarea',
              'title'     => __('Text Link', 'glazov'),
              'desc'       => esc_html__('Type multiple text url by separting "|" (Make equality of text and url)', 'glazov'),
            ),
            array(
              'id'        => 'list_column',
              'type'      => 'select',
              'options'   => array(
                'col-md-12 col-sm-12' => __('Column One', 'glazov'),
                'col-md-6 col-sm-6' => __('Column Two', 'glazov'),
                'col-md-4 col-sm-6' => __('Column Three', 'glazov'),
                'col-md-3 col-sm-6' => __('Column Four', 'glazov'),
              ),
              'title'     => __('List Column', 'glazov'),
            ),

          ),

        ),
        // List Styles

      ),
    );

    /* Project Info's */
    $options[]     = array(
      'title'      => esc_html__('Information Shortcode', 'glazov'),
      'shortcodes' => array(
        // Footer Menus
        array(
          'name'          => 'glazov_project_infos',
          'title'         => esc_html__('Information', 'glazov'),
          'view'          => 'clone',
          'clone_id'      => 'glazov_project_info',
          'clone_title'   => esc_html__('Add New', 'glazov'),
          'fields'        => array(
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'glazov'),
            ),
          ),
          'clone_fields'  => array(
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => esc_html__('Info Text', 'glazov'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'url',
              'type'      => 'text',
              'title'     => esc_html__('Info URL', 'glazov'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'wrap_class' => 'column_half',
            ),
          ),
        ),
        // Footer Menus
        array(
          'name'          => 'glazov_portfolio_share',
          'title'         => esc_html__('Portfolio Share', 'glazov'),
          'fields'        => array(
            array(
              'id'        => 'share_txt',
              'type'      => 'text',
              'title'     => esc_html__('Share Text', 'glazov'),
            ),
            array(
              'id'        => 'facebook',
              'type'      => 'switcher',
              'title'     => esc_html__('Hide Facebook?', 'glazov'),
            ),
            array(
              'id'        => 'twitter',
              'type'      => 'switcher',
              'title'     => esc_html__('Hide Twitter?', 'glazov'),
            ),
            array(
              'id'        => 'linkedin',
              'type'      => 'switcher',
              'title'     => esc_html__('Hide Linkedin?', 'glazov'),
            ),
          ),
        ),

      ),
    );
    /* Project Info's */

    /* Project Category */
    $options[]     = array(
      'title'      => esc_html__('Project Category Shortcode', 'glazov'),
      'shortcodes' => array(
        // Footer Menus
        array(
          'name'          => 'glazov_project_categories',
          'title'         => esc_html__('Project Category', 'glazov'),
          'view'          => 'clone',
          'clone_id'      => 'glazov_project_category',
          'clone_title'   => esc_html__('Add New', 'glazov'),
          'fields'        => array(
            array(
              'id'        => 'slide',
              'type'      => 'switcher',
              'title'     => esc_html__('Wrap slide class', 'glazov'),
            ),
          ),
          'clone_fields'  => array(
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => esc_html__('Category Text', 'glazov'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'url',
              'type'      => 'text',
              'title'     => esc_html__('Category URL', 'glazov'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'wrap_class' => 'column_half',
            ),
          ),
        ),

      ),
    );
    /* Project Category */

    //Footer Social Text
     $options[]     = array(
      'title'      => esc_html__('Footer Social Shortcode', 'glazov'),
      'shortcodes' => array(
        array(
          'name'          => 'glazov_social_texts',
          'title'         => __('Footer Social Text', 'glazov'),
          'view'          => 'clone',
          'clone_id'      => 'glazov_social_text',
          'clone_title'   => __('Add New', 'glazov'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'glazov'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_text',
              'type'      => 'text',
              'title'     => __('Social Text', 'glazov')
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => __('Social Text link', 'glazov')
            ),

          ),
            ),
        ),
    );
    //Footer Social Text

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'glazov_vt_shortcodes' );
}
