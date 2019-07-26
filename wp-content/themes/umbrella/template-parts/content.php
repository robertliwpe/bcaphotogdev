<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package umbrella
 */
$post_type = umbrella_post_type_is();
$pre = $post_type;

if ( $pre === 'page_archive' ) {
    $pre = 'page';
}

$show_title = nk_get_option( $pre . '_content_show_default_title', true, true );
$show_title = $show_title && $show_title !== 'false';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( get_post_type() === 'post' ) : ?>
        <div class="nk-article-date nk-item-offset">
            <?php the_date( 'd F Y', '<strong>', '</strong>' ); ?>
        </div>
        <div class="nk-gap-3 mb-9"></div>
    <?php endif; ?>

    <?php
    if ( $show_title && $show_title !== 'false' ) :
        if ( is_single() ) :
            the_title( '<h1 class="nk-article-title h2">', '</h1>' );
        else :
            the_title( '<h2 class="nk-article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
    endif;
    ?>

    <div class="entry-content">
        <?php
            the_content(
                sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'umbrella' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                )
            );

            ?>

            <div class="clearfix"></div>

            <?php

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'umbrella' ),
                    'after'  => '</div>',
                )
            );
            ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php umbrella_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
