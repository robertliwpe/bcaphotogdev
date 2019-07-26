<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.0.7
 * 
 * Post Puzzle Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = !is_home() ? explode(',', $cmsmasters_metadata) : array();


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}


$cmsmasters_post_format = get_post_format();

?>
<!-- Start Post Puzzle Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_puzzle'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
		<?php
		if ($cmsmasters_post_format == 'image') {
			$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
			
			creative_lab_post_type_image(get_the_ID(), $cmsmasters_post_image_link, 'cmsmasters-square-thumb');
		} elseif ($cmsmasters_post_format == 'gallery') {
			$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
			
			creative_lab_post_type_slider(get_the_ID(), $cmsmasters_post_images, 'cmsmasters-square-thumb');
		} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
			creative_lab_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, true, false, true, true, false);
		} else {
			creative_lab_post_format_icon_placeholder(get_the_ID(), 'image');
		}
		
		
		echo '<div class="puzzle_post_content_wrapper">' . 
			'<div class="puzzle_post_content_wrap">';
				
				
				if ($likes || $comments) {
					echo '<footer class="cmsmasters_post_footer entry-meta">';
						
						$likes ? creative_lab_get_post_likes('page') : '';
						
						$comments ? creative_lab_get_post_comments('page') : '';
						
					echo '</footer>';
				}
				
				
				if ($author || $categories) {
					echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
						$categories ? creative_lab_get_post_category(get_the_ID(), 'category', 'page') : '';
						
						$author ? creative_lab_get_post_author('page') : '';
						
					echo '</div>';
				}
				
				
				creative_lab_post_heading(get_the_ID(), 'h5');
				
				
				if ($cmsmasters_post_format == 'audio') {
					$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
					
					creative_lab_post_type_audio($cmsmasters_post_audio_links);
				}
				
				
				$more ? creative_lab_post_more(get_the_ID()) : '';
				
				$date ? creative_lab_get_post_date('page', 'puzzle') : '';
				
				
			echo '</div>' . 
		'</div>';
		?>
	</div>
</article>
<!-- Finish Post Puzzle Article -->

