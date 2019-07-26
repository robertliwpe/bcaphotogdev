<?php
/**
 * nK Admin for nK Themes
 * http://themeforest.net/user/_nk/portfolio
 *
 * @package nK
 */
if ( ! class_exists( 'nK_Admin' ) ) :
    class nK_Admin {
        /**
         * The single class instance.
         *
         * @since 1.0.0
         * @access private
         *
         * @var object
         */
        private static $_instance = null;

        /**
         * Main Instance
         * Ensures only one instance of this class exists in memory at any one time.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
                self::$_instance->init_globals();
                self::$_instance->init_includes();
            }
            return self::$_instance;
        }

        private function __construct() {
            /* We do nothing here! */
        }

        /**
         * Init Global variables
         */
        private function init_globals() {
            $this->admin_path = get_template_directory() . '/admin';
            $this->admin_uri = get_template_directory_uri() . '/admin';
        }

        /**
         * Init Included Files
         */
        private function init_includes() {
            require $this->admin_path . '/theme-options.php';
            require $this->admin_path . '/theme-metaboxes.php';
            require $this->admin_path . '/menu/frontend-walker.php';

            if ( is_admin() ) {
                require $this->admin_path . '/plugins-activation.php';
                require $this->admin_path . '/admin-init.php';
            }
        }
    }
endif;
if ( ! function_exists( 'nk_admin' ) ) :
    function nk_admin() {
        return nK_Admin::instance();
    }
endif;

nk_admin();
