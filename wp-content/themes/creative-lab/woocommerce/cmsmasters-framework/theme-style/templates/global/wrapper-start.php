<?php
/**
 * @cmsmasters_package 	Creative Lab
 * @cmsmasters_version 	1.0.7
 */


list($cmsmasters_layout) = creative_lab_theme_page_layout_scheme();


echo '<!-- Start Content -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}
