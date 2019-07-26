<?php
/*
Plugin Name: Glazov Core
Plugin URI: http://themeforest.net/user/VictorThemes
Description: Plugin to contain shortcodes and custom post types of the glazov theme.
Author: VictorThemes
Author URI: http://themeforest.net/user/VictorThemes/portfolio
Version: 1.4
Text Domain: glazov-core
*/

if( ! function_exists( 'glazov_block_direct_access' ) ) {
	function glazov_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'GLAZOV_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'GLAZOV_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'GLAZOV_PLUGIN_ASTS', GLAZOV_PLUGIN_URL . 'assets' );
define( 'GLAZOV_PLUGIN_IMGS', GLAZOV_PLUGIN_ASTS . '/images' );
define( 'GLAZOV_PLUGIN_INC', GLAZOV_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Glazov Shortcode Path
define( 'GLAZOV_SHORTCODE_BASE_PATH', GLAZOV_PLUGIN_PATH . 'visual-composer/' );
define( 'GLAZOV_SHORTCODE_PATH', GLAZOV_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function glazov_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Glazov');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('glazov-core/glazov-core.php')) {

	// Custom Post Type
	require_once( GLAZOV_PLUGIN_INC . '/custom-post-type.php' );

  // Shortcodes
  require_once( GLAZOV_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  require_once( GLAZOV_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( GLAZOV_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( GLAZOV_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( GLAZOV_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( GLAZOV_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

}

/**
 * Plugin language
 */
function glazov_plugin_language_setup() {
  load_plugin_textdomain( 'glazov-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'glazov_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'glazov_set_wpautop' ) ) {
  function glazov_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Custom WordPress admin login logo */
if( ! function_exists( 'glazov_theme_login_logo' ) ) {
  function glazov_theme_login_logo() {
    $login_logo = cs_get_option('brand_logo_wp');
    if($login_logo) {
      $login_logo_url = wp_get_attachment_url($login_logo);
    } else {
      $login_logo_url = GLAZOV_IMAGES . '/logo.png';
    }
    if($login_logo) {
    echo "
      <style>
        body.login #login h1 a {
        background: url('$login_logo_url') no-repeat scroll center bottom transparent;
        height: 100px;
        width: 100%;
        margin-bottom:0px;
        }
      </style>";
    }
  }
  add_action('login_head', 'glazov_theme_login_logo');
}

/* Share Options */
if ( ! function_exists( 'glazov_wp_share_option' ) ) {
  function glazov_wp_share_option() {

  global $post;
  $page_url = get_permalink($post->ID );
  $title = $post->post_title;
  $share_text = cs_get_option('share_text');
  $share_text = $share_text ? $share_text : esc_html__( 'Share', 'glazov' );
  $share_on_text = cs_get_option('share_on_text');
  $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );
  ?>
  <div class="glzv-blog-meta">
    <div class="glzv-blog-share">
      <div class="glzv-social rounded">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'glazov'); ?>" target="_blank"><i class="fa fa-facebook"></i><?php echo esc_html__( 'Facebook', 'glazov' ); ?></a>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'glazov'); ?>" target="_blank"><i class="fa fa-twitter"></i><?php echo esc_html__( 'Twitter', 'glazov' ); ?></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'glazov'); ?>" target="_blank"><i class="fa fa-linkedin"></i><?php echo esc_html__( 'Linkedin', 'glazov' ); ?></a>
        <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'glazov'); ?>" target="_blank"><i class="fa fa-google-plus"></i><?php echo esc_html__( 'Google+', 'glazov' ); ?></a>
      </div>
    </div>
  </div>
<?php
  }
}

/* Product Share Options */
if ( ! function_exists( 'glazov_product_share_option' ) ) {
  function glazov_product_share_option() {

  global $post;
  $page_url = get_permalink($post->ID );
  $title = $post->post_title;
  $share_text = cs_get_option('share_text');
  $share_text = $share_text ? $share_text : esc_html__( 'Share', 'glazov' );
  $share_on_text = cs_get_option('share_on_text');
  $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );
  $hide_share_icons = (array) cs_get_option('hide_share_icons');
  ?>
    <div class="glzv-social">
    <?php echo esc_html__( 'Share this Product:', 'glazov' ); ?>
    <?php  if(!in_array('twitter', $hide_share_icons)) { ?>
      <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'glazov'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      <?php } if( !in_array('facebook', $hide_share_icons) ) { ?>
      <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'glazov'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      <?php } if(!in_array('linkedin', $hide_share_icons)) {  ?>
      <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'glazov'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
      <?php } if(!in_array('googlel_plus', $hide_share_icons)) {  ?>
      <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'glazov'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
      <?php } ?>
    </div>
<?php
  }
}

/* Footer Share Options */
if ( ! function_exists( 'glazov_footer_share_option' ) ) {
  function glazov_footer_share_option() {

  global $post;
  if(!is_404()){
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
  } else {
    $page_url = home_url( '/' );
    $title = '';
  }
  $share_text = cs_get_option('share_text');
  $share_text = $share_text ? $share_text : esc_html__( 'Share', 'glazov' );
  $share_on_text = cs_get_option('share_on_text');
  $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );
  ?>
    <ul>
      <li><a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" target="_blank"><?php echo esc_html__( 'Twitter', 'glazov' ); ?></a></li>
      <li><a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" target="_blank"><?php echo esc_html__( 'Facebook', 'glazov' ); ?></a></li>
      <li><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" target="_blank"><?php echo esc_html__( 'Linkedin', 'glazov' ); ?></a></li>
      <li><a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" target="_blank"><?php echo esc_html__( 'Google+', 'glazov' ); ?></a></li>
  </ul>
<?php
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function glazov_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['google_plus']  = 'Google Plus';
  $contactmethods['linkedin']   = 'Linkedin';
  return $contactmethods;
}
add_filter('user_contactmethods','glazov_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function glazov_import_files() {
  return array(
    array(
      'import_file_name'           => 'Glazov',
      'import_file_url'            => trailingslashit( GLAZOV_PLUGIN_URL ) . 'inc/import/content.xml',
      'import_widget_file_url'     => trailingslashit( GLAZOV_PLUGIN_URL ) . 'inc/import/widget.wie',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( GLAZOV_PLUGIN_URL ) . 'inc/import/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'glazov-core' ),
      'preview_url'                => 'http://victorthemes.com/themes/glazov',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'glazov_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [glazov_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function glazov_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home Kenburns' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'glazov_after_import_setup' );

// Install Demos Menu - Menu Edited
function glazov_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'glazov-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'glazov-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'glazov_core_one_click_page' );

// Model Popup - Width Increased
function glazov_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'glazov_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
  $auto_install = admin_url('themes.php?page=install_demos');
  $manual_install = admin_url('themes.php?page=install_demos&import-mode=manual');
  $default_text .= '<h1>Install Demos</h1>
  <div class="glazov-core_intro-text vtdemo-one-click">
  <div id="poststuff">

    <div class="postbox important-notes">
      <h3><span>Important notes:</span></h3>
      <div class="inside">
        <ol>
          <li>Please note, this import process will take time. So, please be patient.</li>
          <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
          <li>All images are demo purposes only. So, images may repeat in your site content.</li>
        </ol>
      </div>
    </div>

    <div class="postbox vt-support-box vt-error-box">
      <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
      <div class="inside">
        <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
        <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
      </div>
    </div>

    <div class="postbox vt-support-box">
      <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=t1utksWzQhA" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
      <div class="inside">
        <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
        <a href="http://victorthemes.com/docs/glazov" class="button-primary" target="_blank">Docs</a>
        <a href="https://victorthemes.com/my-account/support/" class="button-primary" target="_blank">Support</a>
        <a href="https://themeforest.net/item/glazov-photography-wordpress-theme/20937441?ref=VictorThemes" class="button-primary" target="_blank">Item Page</a>
      </div>
    </div>
    <div class="nav-tab-wrapper vt-nav-tab">
      <a href="'. $auto_install .'" class="nav-tab vt-mode-switch vt-auto-mode nav-tab-active">Auto Import</a>
      <a href="'. $manual_install .'" class="nav-tab vt-mode-switch vt-manual-mode">Manual Import</a>
    </div>

  </div>
  </div>';

  return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );
