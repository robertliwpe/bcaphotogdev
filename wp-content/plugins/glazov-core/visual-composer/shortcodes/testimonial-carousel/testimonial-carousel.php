<?php
/* Testimonial Carousel */
if ( !function_exists('glazov_testimonial_carousel_function')) {
  function glazov_testimonial_carousel_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'class'  => '',
      'testimonial_rounded'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',
      'testimonial_short_text' => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.glzv-testi-carousel-'. $e_uniqid .' .testimonial-heading, .glzv-testi-carousel-'. $e_uniqid .'.glzv-testimonials-two .testimonial-heading {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.glzv-testi-carousel-'. $e_uniqid .' .glzv-testimonial .testi-content p, .glzv-testi-carousel-'. $e_uniqid .'.glzv-testimonials-three .testi-content p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.glzv-testi-carousel-'. $e_uniqid .'.glzv-testimonials-two .testi-client-info .testi-name, .glzv-testi-carousel-'. $e_uniqid .' .testi-client-info .testi-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.glzv-testi-carousel-'. $e_uniqid .'.glzv-testimonials-two .testi-client-info .testi-pro, .glzv-testi-carousel-'. $e_uniqid .' .testi-client-info .testi-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-testi-carousel-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots ? 'data-dots="true"' : 'data-dots="false"';
    $carousel_nav = $carousel_nav ? 'data-nav="true"' : 'data-nav="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? 'data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag !== 'true' ? 'data-mouse-drag="true"' : 'data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    // Testimonial Style
    if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' glzv-testimonials-two glzv-tn-two ';
      $testimonial_rounded_class = $testimonial_rounded ? ' glzv-testimonials-round ' : ' ';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' glzv-testimonials-three glzv-tn-two ';
      $testimonial_rounded_class = ' ';
    } else {
      $testimonial_style_class = ' ';
      $testimonial_rounded_class = ' ';
    }

    $short_text = $testimonial_short_text ? $testimonial_short_text : esc_html__('Client Says', 'glazov-core');

    // Turn output buffer on
    ob_start();

    // Query Starts Here
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order
    );

    $glzv_testi = new WP_Query( $args );

    if ($glzv_testi->have_posts()) :
    ?>

    <div class="glzv-testimonial <?php echo $testimonial_style_class .' '. $testimonial_rounded_class .' '. $styled_class; ?>"> <!-- Testimonial Starts -->
    <div class="container">
      <h5 class="testimonial-title"><?php echo esc_html($short_text); ?></h5>
      <div class="owl-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>

    <?php
    while ($glzv_testi->have_posts()) : $glzv_testi->the_post();

    // Get Meta Box Options - glazov_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $client_pro = $testimonial_options['testi_pro'];

    // $name_link = $name_link ? 'href="'. $name_link .'" target="_blank"' : '';
    $client_name = $client_name ? '<span class="testi-name">'. $client_name .'</span>' : '';

    $client_pro = $client_pro ? $client_pro : '';

?>
      <div class="item">
        <?php the_content(); ?>
        <div class="testimonial-author"><?php echo $client_name . $client_pro; ?></div>
      </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
    </div>
    </div>
    </div> <!-- Testimonial End -->

<?php
  endif;

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'glzv_testimonial_carousel', 'glazov_testimonial_carousel_function' );
