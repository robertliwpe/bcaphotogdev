<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('glazov_button_function')) {
  function glazov_button_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      "button_size"  => '',
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'class'  => '',
      // Styling
      'text_color'  => '',
      'text_hover_color'  => '',
      'bg_hover_color'  => '',
      'border_color' => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      // Icon
      'icon_alignment'  => '',
      'select_icon'  => '',
      'icon_size'  => '',
      'icon_color'  => '',
      'icon_hover_color'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Button Text Color
    if ( $text_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .' .btn-text {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .':hover .btn-text, .glzv-btn-'. $e_uniqid .':focus .btn-text, .glzv-btn-'. $e_uniqid .':active .btn-text {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Text Size
    if ( $text_size ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .' {';
      $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $border_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .' {';
      $inline_style .= ( $border_color ) ? 'border-color: '. $border_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Button Hover Color
    if ( $bg_hover_color || $border_hover_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .':hover, .glzv-btn-'. $e_uniqid .':focus, .glzv-btn-'. $e_uniqid .':active {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .' !important;' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Icon
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .' .fa {';
      $inline_style .= ( $icon_size ) ? 'font-size:'. glazov_core_check_px($icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.glzv-btn-'. $e_uniqid .':hover .fa {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-btn-'. $e_uniqid;

    // Styling
    $button_size = $button_size ? ' '. $button_size : ' btn-small';
    $button_text = $button_text ? '<span class="btn-text">'. $button_text .'</span>' : '';
    $button_link = $button_link ? 'href="'. $button_link .'"' : '';
    $open_link = $open_link ? ' target="_blank"' : '';
    $icon_alignment = $icon_alignment ? ' '. $icon_alignment : ' btn-icon-left';
    $select_icon = $select_icon ? '<i class="'. $select_icon .'"></i>' : '';

    $output = '<a class="glzv-btn btn-secondary '. $custom_css . $button_size . $styled_class . $icon_alignment .' rounded-three '. $class .'" '. $button_link . $open_link .'>'. $select_icon . $button_text .'</a>';

    return $output;

  }
}
add_shortcode( 'glzv_button', 'glazov_button_function' );
