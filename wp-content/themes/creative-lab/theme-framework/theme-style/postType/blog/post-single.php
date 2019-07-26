<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.0.9
 * 
 * Post Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = creative_lab_get_global_options();

$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);


list($cmsmasters_layout) = creative_lab_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'post-thumbnail';
}


$cmsmasters_post_format = get_post_format();


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);

?>
<!-- Start Post Single Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if ($cmsmasters_post_format == 'image') {
		$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
		
		creative_lab_post_type_image(get_the_ID(), $cmsmasters_post_image_link, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'gallery') {
		$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
		
		creative_lab_post_type_slider(get_the_ID(), $cmsmasters_post_images, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == 'video') {
		$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
		$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
		$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
		
		creative_lab_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links, $cmsmasters_image_thumb_size);
	} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
		$cmsmasters_post_image_show = get_post_meta(get_the_ID(), 'cmsmasters_post_image_show', true);
		
		if ($cmsmasters_post_image_show != 'true') {
			creative_lab_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'cmsmasters_open_post_img', false, false, false, true, false);
		}
	}
	?>
	<div class="cmsmasters_post_cont">
	<?php
		if (
			$cmsmasters_option['creative-lab' . '_blog_post_date'] || 
			$cmsmasters_post_sharing_box == 'true'
		) {
			echo '<div class="cmsmasters_post_date_sharing entry-meta">';
			
				creative_lab_get_post_date('post');
				
				creative_lab_sharing_box();
				
			echo '</div>';
		}
		
		
		if (
			$cmsmasters_option['creative-lab' . '_blog_post_cat'] || 
			$cmsmasters_option['creative-lab' . '_blog_post_author'] 
		) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
			
				creative_lab_get_post_category(get_the_ID(), 'category', 'post');
				
				creative_lab_get_post_author('post');
				
			echo '</div>';
		}
		
		
		if ($cmsmasters_post_title == 'true') {
			creative_lab_post_title_nolink(get_the_ID(), 'h3');
		}
		
		
		if ($cmsmasters_post_format == 'audio') {
			$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
			
			creative_lab_post_type_audio($cmsmasters_post_audio_links);
		}
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_post_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'creative-lab') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => '<span>', 
					'link_after' => '</span>' 
				));
				
			echo '</div>';
		}
		
		
		if (
			$cmsmasters_option['creative-lab' . '_blog_post_tag'] || 
			$cmsmasters_option['creative-lab' . '_blog_post_like'] || 
			$cmsmasters_option['creative-lab' . '_blog_post_comment'] 
		) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				creative_lab_get_post_tags();
				
				
				if (
					$cmsmasters_option['creative-lab' . '_blog_post_like'] || 
					$cmsmasters_option['creative-lab' . '_blog_post_comment'] 
				) {
					echo '<div class="cmsmasters_post_meta_info">';
						
						creative_lab_get_post_likes('post');
						
						creative_lab_get_post_comments('post');
						
					echo '</div>';
				}
				
			echo '</footer>';
		}
		?>
	</div>
</article>
<!-- Finish Post Single Article -->
<?php 

if ($cmsmasters_option['creative-lab' . '_blog_post_nav_box']) {
	$order_cat = (isset($cmsmasters_option['creative-lab' . '_blog_post_nav_order_cat']) ? $cmsmasters_option['creative-lab' . '_blog_post_nav_order_cat'] : false);
	
	creative_lab_prev_next_posts('Previous Post Link', 'Next Post Link', $order_cat, 'category');
}


if ($cmsmasters_post_author_box == 'true') {
	creative_lab_author_box(esc_html__('About author', 'creative-lab'), 'h5', 'h5');
}


if (get_the_tags()) {
	$tgsarray = array();
	
	foreach (get_the_tags() as $tagone) {
		$tgsarray[] = $tagone->term_id;
	}
} else {
	$tgsarray = '';
}


if ($cmsmasters_post_more_posts != 'hide') {
	creative_lab_related( 
		'h5', 
		esc_html__('More posts', 'creative-lab'), 
		esc_html__('No posts found', 'creative-lab'), 
		$cmsmasters_post_more_posts, 
		$tgsarray, 
		$cmsmasters_option['creative-lab' . '_blog_more_posts_count'], 
		$cmsmasters_option['creative-lab' . '_blog_more_posts_pause'], 
		'post' 
	);
}


echo creative_lab_get_pings(get_the_ID(), 'h5');


comments_template();

