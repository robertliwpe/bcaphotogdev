<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('glazov_story_function')) {
  function glazov_story_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'story_image'  => '',
      'story_title'  => '',
      'story_sub_title'  => '',
      'story_caption'  => '',
      'read_more_link'  => '',
      'read_more_title'  => '',
      'open_link'  => '',
      'class'  => '',

      // Style
      'bg_color'  => '',
      'title_color'  => '',
      'title_size'  => '',
      'sub_title_color'  => '',
      'sub_title_size'  => '',
      'title_caption_color'  => '',
      'title_caption_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'btn_bg_color'  => '',
      'btn_txt_color'  => '',
      'btn_border_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_txt_hover_color'  => '',
      'btn_border_hover_color'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // BG Color
    if ( $bg_color ) {
      $inline_style .= '.glzv-story-'. $e_uniqid .'.glzv-story {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }

    // Title Color & Size
    if ( $title_color || $title_size) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. glazov_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Sub-Title Color & Size
    if ( $sub_title_color || $sub_title_size) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-subtitle {';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. glazov_core_check_px($sub_title_size) .';' : '';
      $inline_style .= '}';
    }
    // Caption Color & Size
    if ( $title_caption_color || $title_caption_size) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-tageline {';
      $inline_style .= ( $title_caption_color ) ? 'color:'. $title_caption_color .';' : '';
      $inline_style .= ( $title_caption_size ) ? 'font-size:'. glazov_core_check_px($title_caption_size) .';' : '';
      $inline_style .= '}';
    }
    // Content Color & Size
    if ( $content_color || $content_size) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-wrap p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. glazov_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }

    // Button
    if ( $btn_bg_color || $btn_txt_color || $btn_border_color) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-wrap .glzv-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_txt_color ) ? 'color:'. $btn_txt_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $btn_bg_hover_color || $btn_txt_hover_color || $btn_border_hover_color) {
      $inline_style .= '.glzv-story-'. $e_uniqid .' .story-wrap .glzv-btn:hover {';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
      $inline_style .= ( $btn_txt_hover_color ) ? 'color:'. $btn_txt_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-story-'. $e_uniqid;

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $read_more_link = $read_more_link ? '<a href="'. $read_more_link .'" class="glzv-btn glzv-btn-medium glzv-btn-gray glzv-btn-single-border" '. $open_link .'>'. $read_more_title .'</a>' : '';

    // Story Image
    $image_url = wp_get_attachment_url( $story_image );
    $glazov_alt = get_post_meta( $story_image, '_wp_attachment_image_alt', true );
    $image_media_class = get_post_meta($story_image, 'image_media_class', true);
    $story_image_main = $story_image ? '<img src="'. $image_url .'" alt="'.$glazov_alt.'">' : '';

    // Content area
    $title = $story_title ? '<h3 class="story-title">'.$story_title.'</h3>' : '';
    $sub_title = $story_sub_title ? '<h5 class="story-subtitle">'.$story_sub_title.'</h5>' : '';
    $caption = $story_caption ? '<h4 class="story-tageline">'.$story_caption.'</h4>' : '';

    $output = '';

    $output .= '<div class="glzv-story '. $class .' '.$styled_class.'"><div class="glzv-background glzv-parallax '.esc_attr($image_media_class).'" data-parallax-background-ratio=".9" style="background-image: url('.esc_url($image_url).');"></div><div class="story-wrap">'.$sub_title.''.$title.''.$caption.''.$content.'<div class="more-link">'.$read_more_link.'</div></div></div>';

    return $output;
  }
}
add_shortcode( 'glazov_story', 'glazov_story_function' );

