<?php
/* ==========================================================
    Contact
=========================================================== */
if ( !function_exists('glazov_contact_function')) {
  function glazov_contact_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'id'  => '',
      'box_style'  => '',
      'form_title'  => '',
      'form_sub_title'  => '',
      'class'  => '',
      // Style
      'submit_size'  => '',
      'submit_color'  => '',
      'submit_bg_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Own Styles
    if ( $submit_size || $submit_color || $submit_bg_color ) {
      $inline_style .= '.glzv-contact-'. $e_uniqid .' .wpcf7 input[type="submit"] {';
      $inline_style .= ( $submit_size ) ? 'font-size:'. glazov_core_check_px($submit_size) .';' : '';
      $inline_style .= ( $submit_color ) ? 'color:'. $submit_color .';' : '';
      $inline_style .= ( $submit_bg_color ) ? 'background-color:'. $submit_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-contact-'. $e_uniqid;

    // Atts If
    $id = ( $id ) ? $id : '';
    $box_style = ( $box_style ) ? ' '. $box_style : '';
    $form_title = ( $form_title ) ? '<h3 class="section-title">'. $form_title .'</h3>' : '';
    $form_sub_title = ( $form_sub_title ) ? '<p>' .$form_sub_title .'</p>' : '';
    $class = ( $class ) ? ' '. $class : '';

    // Starts
    $output  = '<div class="glzv-contact-form'. $styled_class . $box_style . $class .'">';
    $output .= '<div class="glzv-section-title">'.$form_title . $form_sub_title . '</div>';
    $output .= do_shortcode( '[contact-form-7 id="'. $id .'"]' );
    $output .= '</div>';

    return $output;

  }
}
add_shortcode( 'glzv_contact', 'glazov_contact_function' );
