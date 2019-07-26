<?php
/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Portfolio Share */
function glazov_portfolio_share_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "share_txt" => '',
    "facebook" => '',
    "twitter" => '',
    "linkedin" => '',
  ), $atts));
ob_start();
  $share_text = $share_txt ? $share_txt : '';
  global $post;
    $page_url = get_permalink($post->ID);
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
    $media_url = $thumb_url_array[0];
    $title = $post->post_title;
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );
    $hide_share_icons = (array) cs_get_option('hide_share_icons');
    ?>
    <div class="share-portfolio">
      <div class="share-label">
      <span><?php echo esc_attr($share_text); ?></span>
        <a href="#0">
          <img src="<?php echo esc_url(GLAZOV_IMAGES); ?>/icons/icon13@1x.png" alt="Share" width="15">
        </a>
      </div>
      <div class="portfolio-share-links">
        <?php if( !$facebook ) { ?>
        <a href="//www.facebook.com/share.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-facebook"></i></span></span></a>
        <?php } if(!$twitter) { ?>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-twitter"></i></span></span></a>
        <?php } if(!$linkedin) {  ?>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>"  target="_blank"><span class="sewl-table-container"><span class="sewl-align-container"><i class="fa fa-linkedin"></i></span></span></a>
        <?php } ?>
      </div>
    </div>
<?php
return ob_get_clean();

}
add_shortcode("glazov_portfolio_share", "glazov_portfolio_share_function");

/* Download Button */
function vt_download_btn_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "icon_color" => '',
    "bg_color" => '',
    // Hover
    "text_hover_color" => '',
    "icon_hover_color" => '',
    "bg_hover_color" => '',
    // Size
    "text_size" => '',
    "icon_size" => '',
  ), $atts));

  // Atts
  $link_icon = $link_icon ? '<i class="'. $link_icon .'"></i>' : '';
  $target_tab = $target_tab ? 'target="_blank"' : '';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size || $bg_color ) {
    $inline_style .= '.glzv-dwnd-btn-'. $e_uniqid .'.glzv-download-btn {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color || $bg_hover_color ) {
    $inline_style .= '.glzv-dwnd-btn-'. $e_uniqid .'.glzv-download-btn:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.glzv-dwnd-btn-'. $e_uniqid .'.glzv-download-btn i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. glazov_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.glzv-dwnd-btn-'. $e_uniqid .'.glzv-download-btn:hover i {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  glazov_add_inline_style( $inline_style );
  $styled_class  = ' glzv-dwnd-btn-'. $e_uniqid;

  $result = '<div class="email-me"><a href="'. $link .'" '. $target_tab .' class="glzv-btn glzv-btn-medium '. $custom_class . $styled_class .'">'. $link_icon . $link_text .'</a></div>';
  return $result;

}
add_shortcode("vt_download_btn", "vt_download_btn_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    // Hover
    "text_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.glzv-simple-link-'. $e_uniqid .' {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.glzv-simple-link-'. $e_uniqid .':hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  glazov_add_inline_style( $inline_style );
  $styled_class  = ' glzv-simple-link-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="glzv-'. $custom_class . $styled_class .'">'. $link_text . '</a>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "blockquote_style" => '',
    "text_size" => '',
    "custom_class" => '',
    "content_color" => '',
    "author_color" => '',
    "author_size" => '',
    "border_color" => '',
    "bg_color" => '',
    "blockquote_content" => '',
    "author" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $border_color || $bg_color ) {
    $inline_style .= '.glzv-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_size || $content_color) {
    $inline_style .= '.glzv-blockquote-'. $e_uniqid .' p {';
    $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .' !important;' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .' !important;' : '';
    $inline_style .= '}';
  }
  if ( $author_size || $author_color) {
    $inline_style .= '.glzv-blockquote-'. $e_uniqid .' cite {';
    $inline_style .= ( $author_size ) ? 'font-size:'. glazov_core_check_px($author_size) .' !important;' : '';
    $inline_style .= ( $author_color ) ? 'color:'. $author_color .' !important;' : '';
    $inline_style .= '}';
  }

  // add inline style
  glazov_add_inline_style( $inline_style );
  $styled_class  = ' glzv-blockquote-'. $e_uniqid;

  // Style
  $blockquote_style = ($blockquote_style === 'style-two') ? 'blockquote-two ' : '';

  $result = '<blockquote class="'. $blockquote_style . $custom_class . $styled_class .'"><p>'. $blockquote_content .'</p><cite>'.$author.'</cite></blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

function vt_home_infos_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "title" => '',
  ), $atts));

  $result = '  <li>
    <span class="project-info-title">'.$title.'</span>
    '.do_shortcode( $content ).'
  </li>';

  return $result;
}
add_shortcode("glazov_project_infos", "vt_home_infos_function");

function vt_home_info_function($atts, $content = null) {
  extract(shortcode_atts(array(
    "text" => '',
    "url" => '',
  ), $atts));

  if($url){
    $before = '<a href="'.$url.'">';
    $after = '</a>';
  }else{
    $before = '<span>';
    $after = '</span>';
  }
  $result = ''.$before.$text.$after.'';
  return $result;
}
add_shortcode("glazov_project_info", "vt_home_info_function");

// Project Category
function glazov_project_categories_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "slide" => '',
  ), $atts));

  $slide_before = $slide ? '<div class="categories-wrap">' : '';
  $slide_after = $slide ? '</div>' : '';

  $result = '<div class="project-categories"><div class="categories-wrap">
    '.$slide_before.''.do_shortcode( $content ).''.$slide_after.'
  </div></div>';

  return $result;
}
add_shortcode("glazov_project_categories", "glazov_project_categories_function");

function glazov_project_category_function($atts, $content = null) {
  extract(shortcode_atts(array(
    "text" => '',
    "url" => '',
  ), $atts));

  if($url){
    $before = '<a href="'.$url.'">';
    $after = '</a>';
  }else{
    $before = '';
    $after = '';
  }
  $result = '<span>'.$before.$text.$after.'</span>';
  return $result;
}
add_shortcode("glazov_project_category", "glazov_project_category_function");
// Project Category End

/* List Styles Lists */
function vt_address_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "text_color" => '',
    "text_hover_color" => '',
    "title_color" => '',
    // Size
    "text_size" => '',
    "title_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.glzv-list-'. $e_uniqid .' .contact-info p, .glzv-list-'. $e_uniqid .' .contact-info p a {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. glazov_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.glzv-list-'. $e_uniqid .' .contact-info p a:hover{';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $title_size || $title_color ) {
    $inline_style .= '.glzv-list-'. $e_uniqid .' .contact-info h5 {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. glazov_core_check_px($title_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  glazov_add_inline_style( $inline_style );
  $styled_class  = ' glzv-list-'. $e_uniqid;

  // Output
  $output = '';

  $output .= '<div class="glzv-contact-links '. $custom_class . $styled_class .'"><div class="row">';
  $output .= do_shortcode($content);
  $output .= '</div></div>';

  return $output;

}
add_shortcode("vt_address_lists", "vt_address_lists_function");

/* List Styles List */
function vt_address_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_icon" => '',
    "list_title" => '',
    "list_text" => '',
    "list_text_link" => '',
    "list_column" => '',
  ), $atts));

  $glazov_alt = get_post_meta($list_icon, '_wp_attachment_image_alt', true);
  $column = $list_column ? $list_column : 'col-md-3 col-sm-6';

  $result = '<div class="'.esc_attr($column).'"><div class="contact-link"><div class="glzv-table-wrap"><div class="glzv-align-wrap"><div class="contact-link-wrap"><div class="glzv-image"><img src="'.$list_icon.'" alt="'.esc_attr($glazov_alt).'" width="33"></div><div class="contact-info">';
        $meta_info = explode('|', nl2br($list_text, false));
        $meta_url = explode('|', nl2br($list_text_link, false));

        if(!empty($list_text_link)) {
          $meta_i = count($meta_info);
          $meta_u = count($meta_url);
          if ($meta_i > $meta_u) {
            $meta_info = array_slice($meta_info, 0, count($meta_url));
          } elseif($meta_u > $meta_i) {
            $meta_url = array_slice($meta_url, 0, count($meta_info));
          } else {
            $meta_info = $meta_info;
            $meta_url = $meta_url;
          }
          $totlal_info = array_combine($meta_info, $meta_url);

          $result .= '<h5 class="contact-link-title">'.$list_title.'</h5><p>';
            foreach ($totlal_info as $info => $url) {
              $result .= '<a href="'.trim($url).'">'.$info.'</a>';
             }
          $result .= '</p>';
        } else {
          $result .= '<h5 class="contact-link-title">'.$list_title.'</h5><p>';
            foreach ($meta_info as $key => $info) {
              $result .= ''.trim($info).'';
             }
          $result .= '</p>';
        }

  $result .='</div></div></div></div></div></div>';
  return $result;

}
add_shortcode("vt_address_list", "vt_address_list_function");

/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}

//Footer Social Text
function glazov_social_texts_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',

  ), $atts));

  // Output
  $output = '';

  $output .= ' <ul>' .do_shortcode($content). '</ul>';
  return $output;

}
add_shortcode("glazov_social_texts", "glazov_social_texts_function");

 //Footer Social Text
function glazov_social_text_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "social_text" =>'',
    "social_link" =>'',
  ), $atts));

  // Atts
   $text_link = $social_link ? '<a href="'. $social_link .'" target="_blank">'. $social_text .'</a> ' : '<span>'. $social_text .'</span>';

  $output = '<li>'.$text_link.'</li>';

  $result = $output;
  return $result;

}
add_shortcode("glazov_social_text", "glazov_social_text_function");