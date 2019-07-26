<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package umbrella
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="nk-comments">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) :
        ?>
        <h2 class="text-main h3">
            <?php echo esc_html__( 'Comments', 'umbrella' ); ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'umbrella' ); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'umbrella' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'umbrella' ) ); ?></div>

            </div><!-- .nav-links -->
        </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <?php
            wp_list_comments(
                array(
                    'style'      => 'div',
                    'walker'     => new Umbrella_Walker_comments(),
                    'short_ping' => true,
                    'avatar_size' => '120',
                    'reply_text' => esc_html__( 'Reply', 'umbrella' ),
                    'max_depth'  => 3,
                )
            );
        ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'umbrella' ); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'umbrella' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'umbrella' ) ); ?></div>

            </div><!-- .nav-links -->
        </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'umbrella' ); ?></p>
    <?php endif; ?>

</div><!-- #comments -->

<div class="nk-reply">
    <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $user_identity = wp_get_current_user();

        $fields = array(
            'author' =>
                '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" placeholder="' . esc_html__( 'Your Name', 'umbrella' ) . ( $req ? ' *' : '' ) . '" size="30"' . $aria_req . ' />',

            'email' =>
                '<input id="email" class="form-control" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .
                '" placeholder="' . esc_html__( 'Your Email', 'umbrella' ) . ( $req ? ' *' : '' ) . '" size="30"' . $aria_req . ' />',

            'url' =>
                '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" placeholder="' . esc_html__( 'Your Website', 'umbrella' ) . '" size="30" />',
        );

        comment_form(
            array(
                'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-main">',
                'title_reply_after'  => '</h3>',
                'label_submit'       => esc_html__( 'Reply', 'umbrella' ),
                'class_submit'       => 'nk-form-btn text-main',
                'cancel_reply_before' => '<small class="nk-cancel-reply text-dark">',
                'cancel_reply_after'  => '</small>',

                'must_log_in' => '<small class="must-log-in">' .
                            sprintf(
                                wp_kses(
                                    __( 'You must be <a href="%s">logged in</a> to post a comment.', 'umbrella' ), array(
                                        'a' => array(
                                            'href' => array(),
                                            'title' => array(),
                                        ),
                                    )
                                ),
                                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                            ) . '</small>',

                'logged_in_as' => '<small class="logged-in-as">' .
                            sprintf(
                                wp_kses(
                                    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'umbrella' ), array(
                                        'a' => array(
                                            'href' => array(),
                                            'title' => array(),
                                        ),
                                    )
                                ),
                                admin_url( 'profile.php' ),
                                $user_identity->display_name,
                                wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
                            ) . '</small>',

                'comment_notes_before' => '<small class="comment-notes">' .
                                          esc_html__( 'Your email address will not be published.', 'umbrella' ) . ( $req ? esc_html__( 'Required fields are marked *', 'umbrella' ) : '' ) .
                                          '</small>',

                'comment_notes_after' => '',

                'comment_field'      => '<textarea id="comment" class="form-control" name="comment" placeholder="' . esc_html__( 'Comment', 'umbrella' ) . '" rows="1" aria-required="true"></textarea>',
                'fields'             => apply_filters( 'comment_form_default_fields', $fields ),
            )
        );
        ?>
</div>
