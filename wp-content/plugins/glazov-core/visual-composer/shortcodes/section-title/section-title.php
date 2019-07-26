<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('glazov_section_title_function')) {
  function glazov_section_title_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'section_title'  => '',
      'section_content'  => '',
      'class'  => '',

      // Style
      'section_title_color'  => '',
      'section_title_size'  => '',
      'section_content_color'  => '',
      'section_content_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Color & Size
    if ( $section_title_color || $section_title_size) {
      $inline_style .= '.glzv-section-title-'. $e_uniqid .' .info-title {';
      $inline_style .= ( $section_title_color ) ? 'color:'. $section_title_color .';' : '';
      $inline_style .= ( $section_title_size ) ? 'font-size:'. glazov_core_check_px($section_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Content Color & Size
    if ( $section_content_color || $section_content_size) {
      $inline_style .= '.glzv-section-title-'. $e_uniqid .' p {';
      $inline_style .= ( $section_content_color ) ? 'color:'. $section_content_color .';' : '';
      $inline_style .= ( $section_content_size ) ? 'font-size:'. glazov_core_check_px($section_content_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-section-title-'. $e_uniqid;

    $title = $section_title ? '<h1 class="info-title">'.$section_title.'</h1>' : '';
    $content = $section_content ? '<p>'.$section_content.'</p>' : '';

    $output = '';

    $output .= '<div class="glzv-info-title '.$styled_class.'">'.$title.''.$content.'</div>';

    return $output;
  }
}
add_shortcode( 'glazov_section_title', 'glazov_section_title_function' );
