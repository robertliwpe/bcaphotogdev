<?php
/**
 * Umbrella Plugins Activation
 *
 * @package Umbrella
 */
require nk_admin()->admin_path . '/lib/class-tgm-plugin-activation.php';


/**
 * Register Required Plugins
 */
add_action( 'tgmpa_register', 'umbrella_register_required_plugins' );
if ( ! function_exists( 'umbrella_register_required_plugins' ) ) :
    function umbrella_register_required_plugins() {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // Umbrella Core
            array(
                'name'       => 'Umbrella Core',
                'slug'       => 'umbrella-core',
                'source'     => 'https://a.nkdev.info/wp-plugins/umbrella-core.zip',
                'required'   => true,
            ),

            // nK Themes Helper
            array(
                'name'       => 'nK Themes Helper',
                'slug'       => 'nk-themes-helper',
                'source'     => 'https://a.nkdev.info/wp-plugins/nk-themes-helper.zip',
                'required'   => true,
            ),

            // King Composer
            array(
                'name'       => 'KingComposer',
                'slug'       => 'kingcomposer',
                'required'   => true,
            ),

            // ACF PRO
            array(
                'name'       => 'Advanced Custom Fields PRO',
                'slug'       => 'advanced-custom-fields-pro',
                'required'   => true,
                'source'    => 'https://a.nkdev.info/wp-plugins/advanced-custom-fields-pro.zip',
            ),

            // Kirki
            array(
                'name'       => 'Kirki',
                'slug'       => 'kirki',
                'required'   => true,
            ),

            // Contact Form 7
            array(
                'name'       => 'Contact Form 7',
                'slug'       => 'contact-form-7',
                'required'   => false,
            ),

        );

        $config = array(
            'domain'           => 'umbrella',
            'default_path'     => '',
            'has_notices'      => true,
            'message'          => '',
        );

        tgmpa( $plugins, $config );
    }
endif;
