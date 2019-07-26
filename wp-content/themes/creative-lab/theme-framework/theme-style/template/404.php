<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.7
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = creative_lab_get_global_options();

?>

</div>

<!-- Start Content -->
<div class="entry">
	<div class="error">
		<div class="error_bg">
			<div class="error_inner">
				<h1 class="error_title"><?php echo esc_html__('404', 'creative-lab'); ?></h1>
				<div class="error_cont">
					<?php 
					if ($cmsmasters_option['creative-lab' . '_error_search']) { 
						get_search_form(); 
					}
					
					
					if ($cmsmasters_option['creative-lab' . '_error_sitemap_button'] && $cmsmasters_option['creative-lab' . '_error_sitemap_link'] != '') {
						echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['creative-lab' . '_error_sitemap_link']) . '" class="button">' . esc_html__('Sitemap', 'creative-lab') . '</a></div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content_wrap fullwidth">
<!-- Finish Content -->