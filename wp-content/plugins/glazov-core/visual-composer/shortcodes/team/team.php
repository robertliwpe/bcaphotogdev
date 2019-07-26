<?php
/* Team */
if ( !function_exists('glazov_team_function')) {
  function glazov_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'team_section_title' => '',
      'team_section_sub_title' => '',
      'team_column'  => '',
      'class'  => '',
      // Listing
      'team_limit'  => '',
      'team_id'  => '',
      'team_order'  => '',
      'team_orderby'  => '',
      'team_pagination'  => '',
      'team_social_icon' => '',
      // Color & Style
      'name_color'  => '',
      'profession_color'  => '',
      'content_color'  => '',
      'overlay_color'  => '',
      'overlay_cnt_color' => '',
      'name_size'  => '',
      'profession_size'  => '',
      'content_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.glzv-team-'. $e_uniqid .' .mate-primary-wrap .mate-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. glazov_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    // Overlay color
    if ( $overlay_color || $overlay_cnt_color) {
      $inline_style .= '.glzv-team-'. $e_uniqid .' .team-mate .glzv-image .mate-info {';
      $inline_style .= ( $overlay_color ) ? 'background-color:'. $overlay_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.glzv-team-'. $e_uniqid .' .team-mate .glzv-image .mate-designation, .glzv-team-'. $e_uniqid .' .team-mate .glzv-image a {';
      $inline_style .= ( $overlay_cnt_color ) ? 'color:'. $overlay_cnt_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.glzv-team-'. $e_uniqid .' .mate-primary-wrap .mate-designation {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. glazov_core_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    glazov_add_inline_style( $inline_style );
    $styled_class  = ' glzv-team-'. $e_uniqid;

    // Team Column
    $team_column = $team_column ? $team_column : 'col-md-4 col-sm-6';

    // Turn output buffer on
    ob_start();

    // Show ID
    if ($team_id) {
      $team_id = explode(',',$team_id);
    } else {
      $team_id = '';
    }

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
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
      'post__in' => $team_id,
    );

    $glazov_team_qury = new WP_Query( $args );

    if ($glazov_team_qury->have_posts()) :
      $section_title = $team_section_title ? '<h3 class="section-title">'.$team_section_title.'</h3>' : '';
      $section_sub_title = $team_section_sub_title ? '<p>'.$team_section_sub_title.'</p>' : '';
    ?>

<div class="glzv-team <?php echo $styled_class .' '. $class; ?>">
  <div class="container">
    <div class="glzv-section-title">
        <?php echo $section_title; ?>
        <?php echo $section_sub_title; ?>
      </div>
      <div class="row">

    <?php
    while ($glazov_team_qury->have_posts()) : $glazov_team_qury->the_post();

    // Link
    $team_options = get_post_meta( get_the_ID(), 'team_options', true );
    $team_socials = $team_options['social_icons'];
    $team_pro = $team_options['team_job_position'];
    $team_pro = $team_pro ? '<h5 class="mate-designation">'.$team_pro.'</h5>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
    $abt_title = get_the_title();
    $actual_image = '<img src="'. $large_image .'" alt="'.$abt_title.'">';
    ?>
      <div class="<?php echo $team_column; ?>">
        <div class="team-mate">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
           <?php echo $actual_image; ?>
            <div class="mate-info">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <h4 class="mate-name"><a href="<?php the_permalink(); ?>"><?php echo $abt_title; ?></a></h4>
                  <?php echo $team_pro; ?>
                </div>
              </div>
            </div>
          </div>
        <div class="mate-info">
          <div class="mate-primary-wrap">
            <h4 class="mate-name"><?php echo $abt_title; ?></h4>
            <?php echo $team_pro; ?>
          </div>
          <?php
          if($team_social_icon) { ?>
            <div class="glzv-social">
              <div class="glzv-table-wrap">
                <div class="glzv-align-wrap">
                  <?php
                    if ( ! empty( $team_socials ) ) {
                    foreach ( $team_socials as $social ) {
                      if(isset($social['social_open_link'])) {
                        $target = 'target="_blank"';
                      } else {
                        $target = '';
                      }
                  ?>
                    <a href="<?php echo $social['icon_link']; ?>" <?php echo esc_attr($target); ?>><i class="<?php echo $social['icon']; ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

    </div>

    <?php endwhile; ?>

    </div>
  </div>

<?php
  endif;

  if ($team_pagination) {
      glazov_custom_paging_nav($glazov_team_qury->max_num_pages,"",$paged);
      wp_reset_postdata();  // avoid errors further down the page
  } ?>
</div> <!-- Team End -->
    <?php
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'glazov_team', 'glazov_team_function' ); ?>
