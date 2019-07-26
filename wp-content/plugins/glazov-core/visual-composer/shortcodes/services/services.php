<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('glazov_services_function')) {
  function glazov_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_style'  => '',
      'service_author_image'  => '',
      'author_content'  => '',
      'service_author_sign'  => '',
      'services_one_items'  => '',
      'view_more_btn_txt' => '',
      'view_more_btn_link' => '',
      'services_two_items' => '',
      'open_link' => '',
      'class'  => '',

      // Style
      'author_content_color'  => '',
      'author_content_size'  => '',
      'title_color'  => '',
      'title_size'  => '',
      'services_content_color'  => '',
      'services_content_size'  => '',
      'btn_bg_color'  => '',
      'btn_txt_color'  => '',
      'btn_border_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_txt_hover_color'  => '',
      'btn_border_hover_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    if($service_style === 'glzv-service-two') {
      // Content Color & Size
      if ( $services_content_color || $services_content_size) {
        $inline_style .= '.glzv-services-'. $e_uniqid .'.services-style-two .service-info p {';
        $inline_style .= ( $services_content_color ) ? 'color:'. $services_content_color .';' : '';
        $inline_style .= ( $services_content_size ) ? 'font-size:'. glazov_core_check_px($services_content_size) .';' : '';
        $inline_style .= '}';
      }
    } else {
      // Author Content Color & Size
      if ( $author_content_color || $author_content_size) {
        $inline_style .= '.glzv-services-'. $e_uniqid .' .services-author p {';
        $inline_style .= ( $author_content_color ) ? 'color:'. $author_content_color .';' : '';
        $inline_style .= ( $author_content_size ) ? 'font-size:'. glazov_core_check_px($author_content_size) .';' : '';
        $inline_style .= '}';
      }
      // Button
      if ( $btn_bg_color || $btn_txt_color || $btn_border_color) {
        $inline_style .= '.glzv-services-'. $e_uniqid .' .more-link .glzv-btn {';
        $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
        $inline_style .= ( $btn_txt_color ) ? 'color:'. $btn_txt_color .';' : '';
        $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
        $inline_style .= '}';
      }
      if ( $btn_bg_hover_color || $btn_txt_hover_color || $btn_border_hover_color) {
        $inline_style .= '.glzv-services-'. $e_uniqid .' .more-link .glzv-btn:hover {';
        $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
        $inline_style .= ( $btn_txt_hover_color ) ? 'color:'. $btn_txt_hover_color .';' : '';
        $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
        $inline_style .= '}';
      }
    }

    // Title Color & Size
    if ( $title_color || $title_size) {
      $inline_style .= '.glzv-services-'. $e_uniqid .' .service-title, .glzv-services-'. $e_uniqid .' .services-style-two .service-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. glazov_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-services-'. $e_uniqid;

    // Group Field Services Style One
    $services_one_items = (array) vc_param_group_parse_atts( $services_one_items );
    $get_each_list = array();
    foreach ( $services_one_items as $services_one_item ) {
      $each_list = $services_one_item;
      $each_list['service_icon'] = isset( $services_one_item['service_icon'] ) ? $services_one_item['service_icon'] : '';
      $each_list['service_title'] = isset( $services_one_item['service_title'] ) ? $services_one_item['service_title'] : '';
      $get_each_list[] = $each_list;
    }
    // Group Field Services Style Two
    $services_two_items = (array) vc_param_group_parse_atts( $services_two_items );
    $get_each_list_two = array();
    foreach ( $services_two_items as $services_two_item ) {
      $each_list_two = $services_two_item;
      $each_list_two['service_two_icon'] = isset( $services_two_item['service_two_icon'] ) ? $services_two_item['service_two_icon'] : '';
      $each_list_two['service_two_title'] = isset( $services_two_item['service_two_title'] ) ? $services_two_item['service_two_title'] : '';
      $each_list_two['service_two_content'] = isset( $services_two_item['service_two_content'] ) ? $services_two_item['service_two_content'] : '';
      $get_each_list_two[] = $each_list_two;
    }

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $view_more_btn_link = $view_more_btn_link ? '<a href="'. $view_more_btn_link .'" class="glzv-btn glzv-btn-medium glzv-btn-gray glzv-btn-single-border" '. $open_link .'>'. $view_more_btn_txt .'</a>' : '';

    // Author Section
    $author_image_url = wp_get_attachment_url( $service_author_image );
    $glazov_alt = get_post_meta( $service_author_image, '_wp_attachment_image_alt', true );
    $service_author_image = $service_author_image ? '<div class="glzv-image"><img src="'.esc_url($author_image_url).'" alt="'.esc_attr($glazov_alt).'" width="118"></div>' : '';
    $author_content = $author_content ? '<p>'.$author_content.'</p>' : '';

    $output = '';

    if($service_style === 'glzv-service-two') {
      $output .= '<div class="glzv-services services-style-two '.esc_attr($styled_class).'"><div class="row">';
        // Group Param Output
        foreach ( $get_each_list_two as $each_list_two ) {
          $image_url = wp_get_attachment_url( $each_list_two['service_two_icon'] );
          $image_media_class = get_post_meta($each_list_two['service_two_icon'], 'image_media_class', true);
          $glazov_alt_txt = get_post_meta( $each_list_two['service_two_icon'], '_wp_attachment_image_alt', true );
          $output .= '<div class="col-md-3 col-sm-6"><div class="service-item"><div class="service-primary-wrap"><div class="glzv-table-wrap"><div class="glzv-align-wrap"><div class="glzv-icon '.esc_attr($image_media_class).'"><img src="'.esc_url($image_url).'" alt="'.esc_attr($glazov_alt_txt).'" width="38"></div><h5 class="service-title">'.$each_list_two['service_two_title'].'</h5></div></div></div><div class="service-info"><div class="glzv-table-wrap"><div class="glzv-align-wrap"><p>'.$each_list_two['service_two_content'].'</p></div></div></div></div></div>';
        }
      $output .='</div></div>';

    } else {

      $output .= '<div class="glzv-services '.esc_attr($styled_class).'"><div class="container"><div class="services-author">'.$service_author_image.''.$author_content.'<div class="author-signature">'.$service_author_sign.'</div></div><div class="services-wrap">';
        // Group Param Output
        foreach ( $get_each_list as $each_list ) {
          $image_url = wp_get_attachment_url( $each_list['service_icon'] );
          $image_media_class = get_post_meta($each_list['service_icon'], 'image_media_class', true);
          $glazov_alt_txt = get_post_meta( $each_list['service_icon'], '_wp_attachment_image_alt', true );
          $output .= '<div class="service-item"><div class="glzv-image '.esc_attr($image_media_class).'"><img src="'.esc_url($image_url).'" alt="'.esc_attr($glazov_alt_txt).'" width="61"></div><h5 class="service-title">'.$each_list['service_title'].'</h5></div>';
        }
      $output .='</div><div class="more-link">'.$view_more_btn_link.'</div></div></div>';

    }

    return $output;
  }
}
add_shortcode( 'glazov_services', 'glazov_services_function' );
