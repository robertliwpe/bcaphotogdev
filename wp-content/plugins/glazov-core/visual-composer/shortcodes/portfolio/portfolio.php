<?php
/* ==========================================================
  Portfolio
=========================================================== */
if ( !function_exists('glazov_portfolio_function')) {
  function glazov_portfolio_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'portfolio_style'  => '',
      'portfolio_limit'  => '',
      'portfolio_column'  => '',
      // Enable & Disable
      'portfolio_filter'  => '',
      'portfolio_pagination'  => '',
      'portfolio_no_space'  => '',
      'disable_size_limit'  => '',
      // Listing
      'portfolio_order'  => '',
      'portfolio_orderby'  => '',
      'portfolio_show_category'  => '',
      'class'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'portfolio_title_size'  => '',
      'portfolio_title_color'  => '',
      'portfolio_title_hover_color'  => '',
      'portfolio_cat_color'  => '',
      'portfolio_cat_hover_color'  => '',
      'portfolio_cat_size'  => '',
      'btn_text'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Overlay Color
    if ( $image_overlay_color ) {
      $inline_style .= '.glzv-portfolio-'. $e_uniqid .' .gallery-info {';
      $inline_style .= ( $image_overlay_color ) ? 'background-color:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $portfolio_title_size || $portfolio_title_color  || $portfolio_title_hover_color ) {
      $inline_style .= '.glzv-portfolio-'. $e_uniqid .' .gallery-title a {';
      $inline_style .= ( $portfolio_title_color ) ? 'color:'. $portfolio_title_color .';' : '';
      $inline_style .= ( $portfolio_title_size ) ? 'font-size:'. glazov_check_px($portfolio_title_size) .';' : '';
      $inline_style .= '}';
      $inline_style .= '.glzv-portfolio-'. $e_uniqid .' .gallery-title a:hover {';
      $inline_style .= ( $portfolio_title_hover_color ) ? 'color:'. $portfolio_title_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Category
    if ( $portfolio_cat_color || $portfolio_cat_size ) {
      $inline_style .= '.gallery-style-two.glzv-portfolio-'. $e_uniqid .' .gallery-info .project-categories a {';
      $inline_style .= ( $portfolio_cat_color ) ? 'color:'. $portfolio_cat_color .';' : '';
      $inline_style .= ( $portfolio_cat_size ) ? 'font-size:'. glazov_check_px($portfolio_cat_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $portfolio_cat_hover_color ) {
      $inline_style .= '.gallery-style-two.glzv-portfolio-'. $e_uniqid .' .gallery-info .project-categories a:hover {';
      $inline_style .= ( $portfolio_cat_hover_color ) ? 'color:'. $portfolio_cat_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-portfolio-'. $e_uniqid;

    // Style
    $portfolio_style_class = $portfolio_style === 'bpw-style-two' ? ' expand-hover' : ' gallery-style-two shifting-hover';
    $portfolio_column = $portfolio_column ? $portfolio_column : ' bpw-col-5';

    // View Details Button
    if (glazov_framework_active()) {
      $view_more_text = cs_get_option('view_more_text');
      if ($btn_text) {
        $btn_text = $btn_text;
      } elseif($view_more_text) {
        $btn_text = $view_more_text;
      } else {
        $btn_text = __('View Details', 'glazov-core');
      }
    } else {
      $btn_text = $btn_text ? $btn_text : __('View Details', 'glazov-core');
    }

    // Portfolio No Space
    $portfolio_no_space = $portfolio_no_space ? 'bpw-no-gutter' : '';

    // Turn output buffer on
    ob_start();?>

      <div class="glzv-gallery <?php echo esc_html($styled_class .$portfolio_style_class); ?>">
    <!-- Portfolio Filter -->
    <?php if ($portfolio_filter) {
    ?>
      <?php if ($portfolio_style != 'bpw-style-two') { ?>
        <div class="masonry-filters">
        <div class="filters-btn "><a href="javascript:void(0);">Filter <i class="fa fa-caret-down" aria-hidden="true"></i></a></div>
        <ul>
			<li><a href="javascript:void(0);" data-filter="*" class="active"><span>All</span></a></li>
      <?php
        if ($portfolio_show_category) {
          $cat_name = explode(',', $portfolio_show_category);
          $terms = $cat_name;
          $count = count($terms);
          if ($count > 0) {
            foreach ($terms as $term) {
              echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#0" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '"><span>' . str_replace('-', " ", strtolower($term)) . '</span></a></li>';
             }
          }
        } else {
          $terms = get_terms('portfolio_category');
          $count = count($terms);
          $i=0;
          $term_list = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '"><span>' . $term->name . '</span></a></li>';
              if ($count != $i) {
                $term_list .= '';
              } else {
                $term_list .= '';
              }
            }
            echo $term_list;
          }
        }
      ?>
		</ul>
    </div>
    <?php }
    }
    $portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';

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
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'portfolio_category' => esc_attr($portfolio_show_category),
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $glzv_port = new WP_Query( $args ); ?>

    <!-- Portfolio Start -->
    <div class="glzv-masonry <?php echo esc_attr($class .$portfolio_column); ?>" data-item="5" data-space="25">

      <?php
      if ($glzv_port->have_posts()) : while ($glzv_port->have_posts()) : $glzv_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = $term->slug.'-item';
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= $term->slug .'-item ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        if ($portfolio_style === 'bpw-style-two') {
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', true, '' );
          $large_image = $large_image[0];
          $portfolio_featurd_image = get_post_meta( get_the_ID(), 'portfolio_featurd_image', true );
          if ($portfolio_featurd_image){
            $masonry_img_size = $portfolio_featurd_image['masonry_img_size'];
            if($portfolio_featurd_image['featured_image_masonry']) {
              $portfolio_msnr_img = wp_get_attachment_image_url( $portfolio_featurd_image['featured_image_masonry'], 'fullsize', true );
            } else {
              $portfolio_msnr_img = $large_image;
            }
          } else {
            $masonry_img_size = '';
            $portfolio_msnr_img = $large_image;
          }

          $img_custom_cls = $portfolio_featurd_image['featured_image_masonry'] ? $portfolio_featurd_image['featured_image_masonry'] : get_post_thumbnail_id(get_the_ID());
          $image_media_class = get_post_meta($img_custom_cls, 'image_media_class', true);
          if ($masonry_img_size) {
            if ($masonry_img_size === '2x-height') {
              $img_size_class = 'double-height ';
              if(class_exists('Aq_Resize')) {
                $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '722', true );
              } else {$portfolio_img = $portfolio_msnr_img;}
              $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x722.jpg';
            } elseif ($masonry_img_size === '2x-width') {
              $img_size_class = 'double-width ';
              if(class_exists('Aq_Resize')) {
                $portfolio_img = aq_resize( $portfolio_msnr_img, '899', '346', true );
              } else {$portfolio_img = $portfolio_msnr_img;}
              $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/899x346.jpg';
            } elseif ($masonry_img_size === '2x-width-height') {
              $img_size_class = 'one-half-item ';
              if(class_exists('Aq_Resize')) {
                $portfolio_img = aq_resize( $portfolio_msnr_img, '904', '722', true );
              } else {$portfolio_img = $portfolio_msnr_img;}
              $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/904x722.jpg';
            } else {
              $img_size_class = '';
              if(class_exists('Aq_Resize')) {
                $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '346', true );
              } else {$portfolio_img = $portfolio_msnr_img;}
              $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
            }
          } else {
            $img_size_class = '';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '346', true );
            } else {$portfolio_img = $portfolio_msnr_img;}
            $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
          }

          ?>
        <div class="masonry-item nature-item <?php echo esc_attr($img_size_class); ?>" data-category="nature-item">
          <div class="gallery-item">
            <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($portfolio_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
            <div class="gallery-info">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <h4 class="gallery-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        } else {
          // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        if (!$disable_size_limit) {
          if ($portfolio_column === 'bpw-col-3') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '598', '594', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/598x594.jpg';
          } elseif ($portfolio_column === 'bpw-col-4') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '442', '439', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/442x439.jpg';
          } else {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '349', '347', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/349x347.jpg';
          }
        } else {
          $featured_img = ( $large_image ) ? $large_image : '';
        }
          $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
      ?>
      <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="nature-item">
        <div class="gallery-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo $featured_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
          <div class="gallery-info">
            <div class="glzv-table-wrap">
              <div class="glzv-align-wrap">
                <h4 class="gallery-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
                <div class="project-categories">
                  <?php
                    $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                    $i=1;
                    foreach ($category_list as $term) {
                      $term_link = get_term_link( $term );
                      echo '<span><a href="'. esc_url($term_link) .'" class="category-name">'. $term->name .'</a></span> ';
                      if($i++==2) break;
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
        }
      endwhile;
      endif;
       ?>

    </div>
    <!-- Portfolio End -->

    <?php
    if ($portfolio_pagination) {
        glazov_custom_paging_nav($glzv_port->max_num_pages,"",$paged);
    }
        wp_reset_postdata();  // avoid errors further down the page
    ?>
    </div>
    <?php
    // Return outbut buffer
    return ob_get_clean();?>
<?php
  }
}
add_shortcode( 'glzv_portfolio', 'glazov_portfolio_function' );
