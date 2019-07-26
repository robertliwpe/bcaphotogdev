<?php
global $post;
?>
<?php while (have_posts()) : the_post(); ?>    

    <article <?php post_class('blog-item-holder animate'); ?> >        
        <div class="entry-holder animate">
            <div class="entry-info">                
                <div class="entry-date published"><?php echo get_the_date(); ?></div>                                                             
            </div>                        
            <h2 class="entry-title"><a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a></h2>             
        </div>
        <?php if (has_post_thumbnail($post->ID) || get_post_meta($post->ID, "post_blog_featured_image", true) !== '') : ?>        
            <div class="post-thumbnail">
                <?php
                if (get_post_meta($post->ID, "post_blog_featured_image", true) !== ''):
                    echo '<div class="blog-featured-image-holder" style="background-image: url(' . esc_url(get_post_meta($post->ID, "post_blog_featured_image", true)) . ');"></div>';
                else:
                    echo '<div class="blog-featured-image-holder" style="background-image: url(' . get_the_post_thumbnail_url($post->ID) . ');"></div>';
                endif;
                ?>
            </div>
        <?php endif; ?>        
    </article>   

<?php endwhile; ?>

