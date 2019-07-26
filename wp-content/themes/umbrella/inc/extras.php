<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package umbrella
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'umbrella_body_classes' ) ) :
    function umbrella_body_classes( $classes ) {
        // Adds a class of group-blog to blogs with more than 1 published author.
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }

        // Adds a class of hfeed to non-singular pages.
        if ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }

        return $classes;
    }
endif;
add_filter( 'body_class', 'umbrella_body_classes' );


// return current page post type. If post type NOT blog - return page
if ( ! function_exists( 'umbrella_post_type_is' ) ) :
    function umbrella_post_type_is() {
        $result = 'page';

        // if (is_search()) {
        // $result = 'search';
        // }
        if ( is_404() ) {
            $result = '404';
        } else if ( is_home() || is_archive() || is_category() || is_tag() || is_date() ) {
            $result = 'archive';
        }

        // if blog on custom page
        if ( $result === 'archive' && get_option( 'page_for_posts' ) ) {
            $result = 'page_archive';
        }

        return $result;
    }
endif;


// return current page post id
if ( ! function_exists( 'umbrella_post_id_is' ) ) :
    function umbrella_post_id_is() {
        $result = get_the_ID();

        // if blog on custom page
        if ( umbrella_post_type_is() === 'page_archive' ) {
            $result = get_option( 'page_for_posts' );
        }

        return $result;
    }
endif;


// list with slider effects
if ( ! function_exists( 'umbrella_get_slider_effects' ) ) :
    function umbrella_get_slider_effects( $prepend = array(), $append = array() ) {
        $result = array(
            'fade'    => esc_html__( 'Fade', 'umbrella' ),
            'divide'  => esc_html__( 'Divide', 'umbrella' ),
            'top'     => esc_html__( 'Slide Top', 'umbrella' ),
            'left'    => esc_html__( 'Slide Left', 'umbrella' ),
            'right'   => esc_html__( 'Slide Right', 'umbrella' ),
            'bottom'  => esc_html__( 'Slide Bottom', 'umbrella' ),
        );

        return array_merge( $prepend, $result, $append );
    }
endif;


/**
 * Responsive video embed
 */
add_filter( 'embed_oembed_html', 'nk_oembed_filter', 10, 4 );
if ( ! function_exists( 'nk_oembed_filter' ) ) :
    function nk_oembed_filter( $html, $url, $attr, $post_ID ) {
        $classes = '';
        if ( strpos( $url, 'youtube' ) > 0 || strpos( $url, 'youtu.be' ) > 0 ) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-youtube';
        } else if ( strpos( $url, 'vimeo' ) > 0 ) {
            $classes .= ' responsive-embed responsive-embed-16x9 embed-vimeo';
        } else if ( strpos( $url, 'twitter' ) > 0 ) {
            $classes .= ' embed-twitter';
        }

        $return = '<div class="' . esc_attr( $classes ) . '">' . $html . '</div>';
        return $return;
    }
endif;


// list with slider navigation styles
if ( ! function_exists( 'umbrella_get_slider_nav_styles' ) ) :
    function umbrella_get_slider_nav_styles( $prepend = array(), $append = array() ) {
        $result = array(
            'full'  => esc_html__( 'Full', 'umbrella' ),
            'slim'  => esc_html__( 'Slim', 'umbrella' ),
        );

        return array_merge( $prepend, $result, $append );
    }
endif;


if ( ! function_exists( 'nk_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function nk_posted_on( $get = false, $showDate = true ) {

        $time_string = get_the_time( esc_html__( 'F j, Y ', 'umbrella' ) );
        $posted_on = $time_string;

        if ( $get ) {
            return ( $showDate ? $posted_on : '' );
        } else {
            echo( $showDate ? $posted_on : '' );
        }
    }
endif;


/**
 * Get images with all available information
 */
if ( ! function_exists( 'nk_get_attachment' ) ) :
    function nk_get_attachment( $attachment_id, $attachment_size = false ) {
        // is url
        if ( filter_var( $attachment_id, FILTER_VALIDATE_URL ) ) {
            $path_to_image = $attachment_id;
            $attachment_id = attachment_url_to_postid( $attachment_id );
            if ( is_numeric( $attachment_id ) && $attachment_id == 0 ) {
                return array(
                    'alt' => null,
                    'caption' => null,
                    'description' => null,
                    'href' => null,
                    'src' => $path_to_image,
                    'title' => null,
                    'width' => null,
                    'height' => null,
                );
            }
        }

        // is numeric
        if ( is_numeric( $attachment_id ) && $attachment_id !== 0 ) {
            $attachment = get_post( $attachment_id );
            $attachment_src = array();
            if ( isset( $attachment_size ) ) {
                $attachment_src = wp_get_attachment_image_src( $attachment_id, $attachment_size );
            }
            return array(
                'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
                'caption' => $attachment->post_excerpt,
                'description' => $attachment->post_content,
                'href' => get_permalink( $attachment->ID ),
                'src' => isset( $attachment_src[0] ) ? $attachment_src[0] : $attachment->guid,
                'title' => $attachment->post_title,
                'width' => isset( $attachment_src[1] ) ? $attachment_src[1] : false,
                'height' => isset( $attachment_src[2] ) ? $attachment_src[2] : false,
            );
        }
        return false;
    }
endif;
