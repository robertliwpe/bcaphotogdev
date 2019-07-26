<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package umbrella
 */

if ( ! function_exists( 'umbrella_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function umbrella_entry_footer() {
        edit_post_link(
            sprintf(
                /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'umbrella' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );

        // Show tags in posts
        if ( 'post' === get_post_type() ) {
            echo get_the_tag_list( '<ul class="nk-article-tags"><li>', '</li><li>', '</li></ul>' );
        }
    }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'umbrella_categorized_blog' ) ) :
    function umbrella_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'umbrella_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(
                array(
                    'fields' => 'ids',
                    'hide_empty' => 1,
                    // We only need to know if there is more than one category.
                    'number' => 2,
                )
            );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'umbrella_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 ) {
            // This blog has more than 1 category so umbrella_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so umbrella_categorized_blog should return false.
            return false;
        }
    }
endif;
/**
 * Flush out the transients used in umbrella_categorized_blog.
 */
if ( ! function_exists( 'umbrella_category_transient_flusher' ) ) :
    function umbrella_category_transient_flusher() {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        // Like, beat it. Dig?
        delete_transient( 'umbrella_categories' );
    }
endif;
add_action( 'edit_category', 'umbrella_category_transient_flusher' );
add_action( 'save_post', 'umbrella_category_transient_flusher' );
