<?php

/** COMMENTS WALKER */
class Umbrella_Walker_comments extends Walker_Comment {

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array(
        'parent' => 'comment_parent',
        'id' => 'comment_ID',
    );

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>

        <?php
    }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;
        ?>

        <?php
    }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;
        ?>

        <?php
    }

    /** START_EL */
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? 'nk-comment' : ' nk-comment parent' );
        ?>

    <div <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="nk-comment-avatar">
            <?php
            if ( $args['avatar_size'] ) {
                echo get_avatar( $comment, $args['avatar_size'] );
            }
            ?>
        </div>
        <div class="nk-comment-meta">
            <div class="nk-comment-name"><?php echo get_comment_author_link(); ?></div>
            <div class="nk-comment-date"><?php comment_date( 'd F Y' ); ?></div>
            <div class="nk-comment-reply">
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args, array(
                                'add_below' => isset( $args['add_below'] ) ? $args['add_below'] : 'comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => $args['reply_text'],
                            )
                        ), $comment->comment_ID
                    );
                    ?>
            </div>
        </div>
        <div class="nk-comment-text">
                <?php if ( ! $comment->comment_approved ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'umbrella' ); ?></em>
                    <?php
            else :
                echo get_comment_text();
                endif;
            ?>

            <div><?php edit_comment_link( 'Edit' ); ?></div>
        </div>

        <?php
    }

    function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        ?>

    </div><!-- /#comment-' . get_comment_ID() . ' -->

        <?php
    }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() {
        ?>

        <?php
    }
}
