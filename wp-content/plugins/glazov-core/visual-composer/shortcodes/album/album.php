<?php
/* ==========================================================
  Album
=========================================================== */
add_image_size('albumthumbnail', 180, 120, true );
if ( !function_exists('glazov_album_function')) {
  function glazov_album_function( $atts, $content = NULL ) {
    extract(shortcode_atts(array(
      'album_style'  => '',
      'album_limit'  => '',
      'album_column'  => '',
      'client_album_column' => '',
      // Listing
      'album_order'  => '',
      'album_orderby'  => '',
      'album_show_post'  => '',
      'class'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'album_title_size'  => '',
      'album_title_color'  => '',
    ), $atts));
    // Turn output buffer on
    ob_start();

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    //inline styles
    // album hover overlay
    if (  $image_overlay_color ) {
      $inline_style .= '.glazov-album-'. $e_uniqid .' .gallery-item.glzv-hover .gallery-info{';
      $inline_style .= ( $image_overlay_color ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // title size
    if (  $album_title_size || $album_title_color ) {
      $inline_style .= '.glazov-album-'. $e_uniqid .' .gallery-info h4 {';
      $inline_style .= ( $album_title_color ) ? 'color:'. $album_title_color .';' : '';
      $inline_style .= ( $album_title_size ) ? 'font-size:'. glazov_core_check_px($album_title_size) .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glazov-album-'. $e_uniqid;

    // Style
    $album_column = $album_column ? $album_column : 'col-item-4';
    $album_style = $album_style ? $album_style : 'grid';

    if($album_show_post){
      $album_show_post = explode(',', $album_show_post);
    } else {
      $album_show_post = '';
    }
    $album_limit = $album_limit ? $album_limit : -1;
    $args = array(
      // other query params here,
      'post_type' => 'gallery',
      'posts_per_page' => (int) $album_limit,
      'post__in' => $album_show_post,
      'orderby' => $album_orderby,
      'order' => $album_order
    );
      $glazov_albm = new WP_Query( $args );
?>
<!-- glazov masonry (col item 4, dark gallery overlay) -->
<div class="mid-wrap-inner inner-space-eleven">
  <div class="glzv-gallery glzv-lightgallery glzv-panr <?php echo esc_attr($album_column); ?>">
  <?php if($album_style == 'client'){
    $album_col = $client_album_column ? $client_album_column : '5';
    echo '<div class="glzv-masonry" data-item="'.esc_attr($album_col).'" data-space="25">';
  }

     global $post;
     // Album Filter
      if ($glazov_albm->have_posts()) : while ($glazov_albm->have_posts()) : $glazov_albm->the_post();
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        if ($album_style == 'grid'){
          if ( !empty($large_image) ) {
            $large_image = $large_image[0];
            if(class_exists('Aq_Resize')) {
              $large_image = aq_resize( $large_image, '442', '350', true );
            } else {$large_image = $large_image;}
            $large_image = $large_image ? $large_image : GLAZOV_IMAGES.'/grid-placeholder.jpg';
          } else {
            $large_image = GLAZOV_PLUGIN_IMGS.'/1000x850.jpg';
          }
        } elseif ($album_style == 'client'){
          if ( !empty($large_image) ) {
            $large_image = $large_image[0];
            if(class_exists('Aq_Resize')) {
              $large_image = aq_resize( $large_image, '349', '277', true );
            } else {$large_image = $large_image;}
            $large_image = $large_image ? $large_image : GLAZOV_IMAGES.'/grid-placeholder.jpg';
          } else {
            $large_image = GLAZOV_PLUGIN_IMGS.'/1000x850.jpg';
          }
        } else {
          if ( !empty($large_image) ) {
            $large_image = $large_image[0];
            $large_image = $large_image;
          } else {
            $large_image = GLAZOV_PLUGIN_IMGS.'/1000x850.jpg';
          }
        }
        $glazov_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $img_title = get_the_title();
        $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
    ?>
    <?php if($album_style == 'masonry' || $album_style == 'grid' ){ ?>
      <div class="masonry-item nature-item <?php echo esc_attr($styled_class); ?>" data-category="nature-item">
        <div class="gallery-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></div>
          <div class="gallery-info">
            <div class="glzv-table-wrap">
              <div class="glzv-align-wrap">
                <h4 class="gallery-title"><?php echo esc_attr($img_title); ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } elseif($album_style == 'client'){
        // Metabox
        $glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
        $glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
        $glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
        $glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
        $glazov_c_gallery_metabox  = get_post_meta( $glazov_id, 'gallery_single_metabox', true );

        if ($glazov_c_gallery_metabox) {
          if ($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
            $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
          } else {
            $gallery_imagess = array();
          }
        }else{
          $gallery_imagess = array();
        }
        $count_value = count($gallery_imagess);?>
      <div class="masonry-item <?php echo esc_attr($styled_class); ?>" data-category="nature-item">
        <div class="archive-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
            <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($glazov_alt); ?>">
            <?php if($post->post_password){ ?>
            <div class="protected-archive">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <a href="<?php echo esc_url(the_permalink());?>" class="protected-lock"><i class="fa fa-lock" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="archive-info">
            <h4 class="archive-title"><a href="<?php echo esc_url(the_permalink());?>"><?php echo esc_attr($img_title); ?></a></h4>
            <div class="archive-total-images"><?php echo esc_attr($count_value);?> Pic</div>
          </div>
        </div>
      </div>
      <?php } else {
        // Metabox
        $glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
        $glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
        $glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
        $glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
        $glazov_c_gallery_metabox  = get_post_meta( $glazov_id, 'gallery_single_metabox', true );
        if ($glazov_c_gallery_metabox) {
          if ($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
            $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
          } else {
            $gallery_imagess = array();
          }
        } else {
          $gallery_imagess = array();
        } ?>
        <div class="gallery-row">
          <h5 class="gallery-row-title"><?php the_title(); ?></h5>
            <div class="horizontal-scroll">
            <?php
            foreach ($gallery_imagess as $key => $image) {
              $imagess = wp_get_attachment_image_src( $image, 'full' );
              $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
              if (!empty( $imagess )) {
                if(class_exists('Aq_Resize')) {
                  $images = aq_resize( $imagess[0], '180', '120', true );
                } else {$images = $imagess[0];}
                $images = $images ? $images : GLAZOV_IMAGES.'/438x347.png';
              } else {
                $images = GLAZOV_IMAGES.'/grid-placeholder.jpg';
              }
              $image_id = glazov_get_image_id($imagess[0]);
              $attachment = get_post( $image_id );
              $image_title = $attachment->post_title;
              $image_media_info = get_post_meta($image, 'image_media_info', true);
              $image_media_cat = get_post_meta($image, 'image_media_cat', true);
              $image_media_class = get_post_meta($image, 'image_media_class', true);
              $image_media_link = get_post_meta($image, '_image_media_link', true);
              if ( $image_media_link ) {
                $largeimage = $image_media_link;
              } else {
                $largeimage = $imagess[0];
              }
            ?>

              <div class="gallery-item">
                <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
                  <a href="<?php echo esc_url( $largeimage ); ?>" data-rel="lightGallery"><img src="<?php echo esc_url( $images ); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></a>
                </div>
              </div>
          <?php } ?>
          </div>
        </div>
    <?php  }
      endwhile;
      endif;
      wp_reset_postdata();
    if($album_style == 'client'){
      echo '</div>';
    } ?>
  </div>
</div> <!-- end wrapper -->
<?php
  // Return outbut buffer
  return ob_get_clean();
  }
}
add_shortcode( 'glazov_album', 'glazov_album_function' );
