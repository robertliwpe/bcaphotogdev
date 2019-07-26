<?php
/* ==========================================================
  Lists
=========================================================== */
if ( !function_exists('glazov_list_function')) {
  function glazov_list_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'list_style'  => '',
      'list_items'  => '',
      'class'  => '',
      // Style
      'text_color'  => '',
      'icon_color'  => '',
      'text_size'  => '',
      'icon_size'  => '',
      'title_color'  => '',
      'title_size'  => '',
    ), $atts));

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $list_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['icon_image'] = isset( $list_item['icon_image'] ) ? $list_item['icon_image'] : '';
      $each_list['select_icon'] = isset( $list_item['select_icon'] ) ? $list_item['select_icon'] : '';
      $each_list['select_image'] = isset( $list_item['select_image'] ) ? $list_item['select_image'] : '';
      $each_list['list_title'] = isset( $list_item['list_title'] ) ? $list_item['list_title'] : '';
      $each_list['list_text'] = isset( $list_item['list_text'] ) ? $list_item['list_text'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $text_color || $text_size ) {
      $inline_style .= '.glzv-list-'. $e_uniqid .' li, .glzv-list-'. $e_uniqid .' li p, .glzv-list-'. $e_uniqid .' li a {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color ) {
      $inline_style .= '.glzv-list-'. $e_uniqid .' h5, .glzv-list-'. $e_uniqid .'.glzv-list-three li strong, .glzv-list-'. $e_uniqid .'.glzv-list-four strong {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. glazov_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      if ($list_style === 'glzv-list-two') {
        $inline_style .= '.glzv-list-'. $e_uniqid .' li:before{';
        $inline_style .= ( $icon_color ) ? 'background-color:'. $icon_color .';' : '';
        $inline_style .= ( $icon_size ) ? 'width:'. glazov_core_check_px($icon_size) .';height:'. glazov_core_check_px($icon_size) .';' : '';
      } else {
        $inline_style .= '.glzv-list-'. $e_uniqid .' li i {';
        $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
        $inline_style .= ( $icon_size ) ? 'font-size:'. glazov_core_check_px($icon_size) .';' : '';
      }
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-list-'. $e_uniqid;

    if ($list_style === 'glzv-list-two') {
      $output = '<ul class="list-one '. $class . $styled_class .'">';
    } elseif ($list_style === 'glzv-list-three') {
      $output = '<ul class="glzv-list-three '. $class . $styled_class .'">';
    } elseif ($list_style === 'glzv-list-four') {
      $output = '<ul class="glzv-list-four '. $class . $styled_class .'">';
    } else {
      $output = '<ul class="glzv-list-icon '. $class . $styled_class .'">';
    }

    // Group Param Output
    if ($list_style === 'glzv-list-two') {
      foreach ( $get_each_list as $each_list ) {
        $output .= '<li>'. $each_list['list_text'] .'</li>';
      }
    } elseif ($list_style === 'glzv-list-three' || $list_style === 'glzv-list-four') {
      foreach ( $get_each_list as $each_list ) {
        $list_title = $each_list['list_title'] ? '<strong>'. $each_list['list_title'] .' :</strong> ' : '';

        $output .= '<li>';
        if ($each_list['icon_image'] === 'list_image' && $each_list['select_image']) {
          $image_url = wp_get_attachment_url( $each_list['select_image'] );
          $output .= '<img src="'. $image_url .'" alt="">';
        } elseif($each_list['icon_image'] === 'list_icon' && $each_list['select_icon']) {
          $output .= '<i class="'. $each_list['select_icon'] .'"></i>';
        }
        $output .= $list_title . $each_list['list_text'] .'</li>';
      }
    } else {
      foreach ( $get_each_list as $each_list ) {
        $list_title = $each_list['list_title'] ? '<h5>'. $each_list['list_title'] .'</h5>' : '';
        $list_text = $each_list['list_text'] ? '<p>'. $each_list['list_text'] .'</p>' : '';
        if ($each_list['icon_image'] === 'list_image') {
          $image_url = wp_get_attachment_url( $each_list['select_image'] );
          $output .= '<li><img src="'. $image_url .'" alt="">'. $list_title . $list_text .'</li>';
        } else {
          $output .= '<li><i class="'. $each_list['select_icon'] .'"></i>'. $list_title . $list_text .'</li>';
        }
      }
    }

    $output .= '</ul>';

    return $output;
  }
}
add_shortcode( 'glzv_list', 'glazov_list_function' );
