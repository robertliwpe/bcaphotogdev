<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('glazov_blog_function')) {
  function glazov_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_limit'  => '',
      // Enable & Disable
      'blog_category'  => '',
      'blog_date'  => '',
      'blog_author'  => '',
      'blog_likes'  => '',
      'blog_pagination'  => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'short_content'  => '',
      'class'  => '',
      // Read More Text
      'read_more_txt'  => '',
    ), $atts));

    // Excerpt
    if (glazov_framework_active()) {
      $excerpt_length = cs_get_option('theme_blog_excerpt');
      $excerpt_length = $excerpt_length ? $excerpt_length : '55';
      if ($short_content) {
        $short_content = $short_content;
      } else {
        $short_content = $excerpt_length;
      }
    } else {
      $short_content = '55';
    }

    // Read More Text
    if (glazov_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_txt) {
        $read_more_txt = $read_more_txt;
      } elseif($read_more_to) {
        $read_more_txt = $read_more_to;
      } else {
        $read_more_txt = esc_html__( 'Read More', 'glazov-core' );
      }
    } else {
      $read_more_txt = $read_more_txt ? $read_more_txt : esc_html__( 'Read More', 'glazov-core' );
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-post-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

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
    $blog_limit = $blog_limit ? $blog_limit : '-1';

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $glzv_post = new WP_Query( $args ); ?>

    <!-- Blog Start -->
    <div class="<?php echo esc_attr($styled_class .' '. $class); ?>">

      <?php
      if ($glzv_post->have_posts()) : while ($glzv_post->have_posts()) : $glzv_post->the_post();

        $glazov_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $glazov_large_image = $glazov_large_image[0];
        $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
        $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
      ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
        <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
          <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($glazov_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
        </div>
        <div class="blog-info">
          <h3 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
          <h6 class="blog-meta">
            <?php
            if (!$blog_date) { // Date Hide
            ?>
              <span class="meta-type"><?php echo get_the_date('M d, Y'); ?></span>
            <?php } // Date Hides
            if (!$blog_author) { // Author Hide
            ?>
              <?php
              printf(
                '<span class="meta-type">'. esc_html__('by','glazov') .' <a href="%1$s" rel="author">%2$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()
              );
              ?>
            <?php }
            if (!$blog_category) { // Category Hide
                $category_list = get_the_category_list( ' ' );
                if ( $category_list ) {
                  echo '<span class="meta-type">'. $category_list .' </span>';
                }
            } // Category Hides

             ?>
          </h6>
          <p><?php
            $blog_excerpt = cs_get_option('theme_blog_excerpt');
            if ($blog_excerpt) {
              $blog_excerpt = $blog_excerpt;
            } else {
              $blog_excerpt = '55';
            }
            glazov_excerpt($blog_excerpt);
            echo glazov_wp_link_pages();
            ?></p>
          <div class="blog-action-link">
            <div class="pull-left">
              <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php echo esc_attr($read_more_txt); ?>
              </a>
            </div>
            <?php if (!$blog_likes) { ?>
              <div class="pull-right">
                <div class="blog-like"><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div><!-- #post-## -->

      <?php
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div>
    <!-- Blog End -->

    <?php
    if ($blog_pagination) {
      glazov_custom_paging_nav($glzv_post->max_num_pages,"",$paged);
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'glzv_blog', 'glazov_blog_function' );