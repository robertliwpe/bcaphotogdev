<?php
/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.1.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function creative_lab_theme_fonts() {
	$cmsmasters_option = creative_lab_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version 	1.0.9
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body,
	#wp-calendar th,
	#wp-calendar td,
	.cmsmasters_profile_horizontal.style_1 .cmsmasters_profile_content {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_content_font_google_font']) . $cmsmasters_option['creative-lab' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_quotes_slider .cmsmasters_quote_content > * {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_font_size'] + 9). "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_line_height'] + 16) . "px;
	}
	
	.cmsmasters_twitter_wrap .cmsmasters_twitter_item_content,
	.post_nav > span > span.sub {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_font_size'] + 1). "px;
	}
	
	table tbody th,
	table tbody th a,
	table tbody td,
	table tbody td a,
	form label,
	.cmsmasters_open_project .project_details_item_title,
	.cmsmasters_open_project .project_features_item_title,
	.cmsmasters_open_project .project_details_item_desc,
	.cmsmasters_open_project .project_features_item_desc,
	.cmsmasters_archive_type .cmsmasters_archive_item_type > span:not([class]),
	.widget_custom_contact_info_entries span,
	.widget_custom_contact_info_entries a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_font_size'] - 1). "px;
	}
	
	#wp-calendar th,
	.widget_recent_entries .post-date {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_font_size'] - 2). "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_line_height'] - 2) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_font_size'] - 3). "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_content_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_dropcap {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_content_font_google_font']) . $cmsmasters_option['creative-lab' . '_content_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['creative-lab' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:36px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:20px; /* static */
	}
	/* Finish Content Font */


	/* Start Link Font */
	a,
	.subpage_nav > strong,
	.subpage_nav > span,
	.subpage_nav > a,
	.subpage_nav > span:not([class]),
	.footer .footer_nav_wrap li a,
	.footer.cmsmasters_footer_small .footer_nav_wrap li a,
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner *,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_link_font_google_font']) . $cmsmasters_option['creative-lab' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_link_font_text_decoration'] . ";
	}
	
	.cmsmasters_sitemap_wrap li > a,
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner *,
	.footer.cmsmasters_footer_small .footer_nav_wrap li a,
	.cmsmasters_post_default .cmsmasters_post_cont_info,
	.cmsmasters_post_default .cmsmasters_post_cont_info a,
	.cmsmasters_post_default .cmsmasters_post_read_more,
	.cmsmasters_post_masonry .cmsmasters_post_cont_info,
	.cmsmasters_post_masonry .cmsmasters_post_cont_info a,
	.cmsmasters_post_masonry .cmsmasters_post_read_more,
	.cmsmasters_post_timeline .cmsmasters_post_cont_info,
	.cmsmasters_post_timeline .cmsmasters_post_cont_info a,
	.cmsmasters_post_timeline .cmsmasters_post_read_more,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_cont_info,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_cont_info a,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_read_more,
	.cmsmasters_open_post .cmsmasters_post_cont_info,
	.cmsmasters_open_post .cmsmasters_post_cont_info a,
	.cmsmasters_open_post .cmsmasters_post_read_more,
	.about_author .about_author_url,
	.cmsmasters_single_slider .cmsmasters_post_category,
	.cmsmasters_single_slider .cmsmasters_post_category a,
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info,
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a,
	.cmsmasters_slider_post .cmsmasters_slider_post_read_more,
	.cmsmasters_project_grid .cmsmasters_project_cont_info,
	.cmsmasters_project_grid .cmsmasters_project_cont_info a,
	.cmsmasters_archive_type .cmsmasters_archive_item_user_name a,
	.widget_pages ul li > a,
	.widget_categories ul li > a,
	.widget_archive ul li > a,
	.widget_meta ul li > a,
	.widget_recent_comments ul li > a,
	.widget_recent_entries ul li > a,
	.widget_nav_menu ul li a,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_cont_info,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_cont_info a,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_cont_info,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_cont_info a,
	.widget_recent_comments ul li a:not([class]),
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a:not(.comment_author) {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_link_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_comment_item .comment-edit-link,
	.widget_recent_comments ul li,
	.widget_recent_comments ul li a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li .comment_author,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li .published {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_link_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_link_font_line_height'] - 2) . "px;
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['creative-lab' . '_link_hover_decoration'] . ";
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.navigation > li > a,
	.footer_nav > li > a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_nav_title_font_google_font']) . $cmsmasters_option['creative-lab' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_nav_title_font_text_transform'] . ";
	}
	
	@media only screen and (min-width: 1025px) and (max-width: 1240px) {
		.navigation > li > a {
			font-size:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_font_size'] - 1) . "px;
		}
	}
	
	.top_line_nav > li > a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_nav_title_font_google_font']) . $cmsmasters_option['creative-lab' . '_nav_title_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_line_height'] - 2) . "px;
		font-style:" . $cmsmasters_option['creative-lab' . '_nav_title_font_font_style'] . ";
		font-weight:normal;
		text-transform:none;
	}
	
	.header_top .meta_wrap * {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_nav_title_font_google_font']) . $cmsmasters_option['creative-lab' . '_nav_title_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_line_height'] - 2) . "px;
	}
	
	ul.navigation > li > a .nav_tag,
	ul.navigation > li > a .nav_subtitle {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_nav_title_font_google_font']) . $cmsmasters_option['creative-lab' . '_nav_title_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_nav_title_font_line_height'] - 2) . "px;
		text-transform:none;
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation ul li a,
	.top_line_nav ul li a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.top_line_nav ul li a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_nav_dropdown_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_nav_dropdown_font_line_height'] - 2) . "px;
	}
	
	.mid_nav > li li > a .nav_item_wrap > span.nav_subtitle,
	.mid_nav > li li > a .nav_item_wrap > span.nav_tag {
		text-transform:none;
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap,
	.cmsmasters_pricing_table .cmsmasters_price_wrap > span:not(.cmsmasters_period) {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h1_font_google_font']) . $cmsmasters_option['creative-lab' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h1_font_google_font']) . $cmsmasters_option['creative-lab' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['creative-lab' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_pricing_table .cmsmasters_price_wrap > span.cmsmasters_price,
	.cmsmasters_pricing_table .cmsmasters_price_wrap > span.cmsmasters_coins {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] + 2) . "px;
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] + 8) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] + 18) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] + 15) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] - 6) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_price_wrap > span.cmsmasters_currency {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] - 23) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] - 24) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap .cmsmasters_stat_units {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] - 30) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] - 22) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] + 22) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['creative-lab' . '_h1_font_line_height'] + 15) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.cmsmasters_sitemap_wrap h1 {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h2_font_google_font']) . $cmsmasters_option['creative-lab' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a,
	.logo .title,
	.logo .title_text,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h3_font_google_font']) . $cmsmasters_option['creative-lab' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h3_font_text_decoration'] . ";
	}
	
	.logo .title {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h3_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h3_font_line_height'] + 2) . "px;
	}
	
	.logo .title_text {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h3_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h3_font_line_height'] - 10) . "px;
	}
	
	.cmsmasters_profile_vertical .profile_social_icons_list a {
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h3_font_line_height'] + 2) . "px;
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h4_font_google_font']) . $cmsmasters_option['creative-lab' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a,
	table tr th,
	table tfoot td,
	.cmsmastersLike,
	.cmsmastersLike a,
	.cmsmasters_comments,
	.cmsmasters_comments a,
	.footer .footer_copyright,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title,
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.cmsmasters_pricing_table .pricing_title,
	.cmsmasters_quotes_slider .cmsmasters_quote_title,
	.cmsmasters_quotes_slider .cmsmasters_quote_subtitle_wrap *,
	.cmsmasters_quotes_grid .cmsmasters_quote_title,
	.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap *,
	.cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.cmsmasters_toggles .cmsmasters_toggle_title a,
	.cmsmasters_twitter_wrap .published,
	.share_posts a,
	.post_nav > span a,
	.cmsmasters_post_default .cmsmasters_post_date,
	.cmsmasters_post_masonry .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_timeline .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_date,
	.cmsmasters_open_post .cmsmasters_post_date,
	.cmsmasters_open_post .cmsmasters_post_tags,
	.cmsmasters_open_post .cmsmasters_post_tags a,
	.cmsmasters_single_slider .cmsmasters_post_date,
	.comment-respond .comment-reply-title,
	.comments_nav > span > a,
	.cmsmasters_comment_item .cmsmasters_comment_item_date,
	.cmsmasters_comment_item .comment-reply-link,
	.comment-respond .comment-reply-title small a,
	.cmsmasters_slider_post .cmsmasters_slider_post_date,
	.cmsmasters_wrap_pagination ul li .page-numbers,
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap,
	.about_author .about_author_cont_title,
	.widget .widgettitle,
	#wp-calendar caption,
	#wp-calendar tfoot a,
	.post_comments .post_comments_title,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h5_font_google_font']) . $cmsmasters_option['creative-lab' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h5_font_text_decoration'] . ";
	}
	
	.cmsmasters_open_profile .profile_social_icons_list a {
		line-height:" . $cmsmasters_option['creative-lab' . '_h5_font_line_height'] . "px;
	}
	
	.cmsmasters_project_puzzle .cmsmasters_project_header .cmsmasters_project_title,
	.cmsmasters_project_puzzle .cmsmasters_project_header .cmsmasters_project_title a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] + 4) . "px;
	}
	
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_title,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_title a,
	.about_author .about_author_title,
	.cmsmasters_single_slider .cmsmasters_single_slider_title,
	.comment-respond .comment-reply-title,
	.post_comments .post_comments_title {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] + 2) . "px;
	}
	
	table tr th,
	table tfoot td,
	.cmsmasters_tabs .cmsmasters_tabs_list_item a,
	.about_author .about_author_cont_title,
	.cmsmasters_open_project .project_sidebar .project_details_title,
	.cmsmasters_open_project .project_sidebar .project_features_title,
	.cmsmasters_open_project .project_sidebar .share_posts_title,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title,
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title,
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_title,
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap,
	.cmsmasters_quotes_grid .cmsmasters_quote_title,
	.cmsmasters_toggles .cmsmasters_toggle_title a,
	.cmsmasters_comment_item .cmsmasters_comment_item_title,
	.cmsmasters_comment_item .cmsmasters_comment_item_title a,
	.comment-respond .comment-reply-title small a,
	.cmsmasters_wrap_pagination ul li .page-numbers,
	#bottom .widget .widgettitle {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_twitter_wrap .published,
	.share_posts a,
	.cmsmasters_post_default .cmsmasters_post_date,
	.cmsmasters_post_masonry .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_timeline .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_date,
	.cmsmasters_open_post .cmsmasters_post_date,
	.cmsmasters_open_post .share_posts a,
	.cmsmasters_open_post .cmsmasters_post_tags,
	.cmsmasters_open_post .cmsmasters_post_tags a,
	.comments_nav > span > a,
	.cmsmasters_comment_item .comment-reply-link,
	.cmsmasters_slider_post .cmsmasters_slider_post_date,
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap,
	#wp-calendar caption,
	#wp-calendar tfoot a,
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 6) . "px;
	}
	
	.cmsmasters_single_slider .cmsmasters_post_date {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 7) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 7) . "px;
	}
	
	.cmsmasters_likes,
	.cmsmasters_likes a,
	.cmsmasters_comments,
	.cmsmasters_comments a,
	.footer .footer_copyright,
	.cmsmasters_quotes_slider .cmsmasters_quote_subtitle_wrap *,
	.cmsmasters_comment_item .cmsmasters_comment_item_date {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 8) . "px;
	}
	
	.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap * {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 10) . "px;
		text-transform:uppercase;
	}
	
	.footer.cmsmasters_footer_small .footer_copyright {
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h5_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_likes,
	.cmsmasters_likes a,
	.cmsmasters_comments,
	.cmsmasters_comments a,
	.footer .footer_copyright,
	.cmsmasters_quotes_slider .cmsmasters_quote_subtitle_wrap * {
		text-transform:uppercase;
	}
	
	.cmsmasters_post_default .cmsmasters_post_date,
	.cmsmasters_post_masonry .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_timeline .cmsmasters_post_footer .cmsmasters_post_date,
	.cmsmasters_post_puzzle .puzzle_post_content_wrapper .cmsmasters_post_date,
	.cmsmasters_open_post .cmsmasters_post_date,
	.cmsmasters_open_post .share_posts a,
	.cmsmasters_open_post .cmsmasters_post_tags,
	.cmsmasters_open_post .cmsmasters_post_tags a,
	.cmsmasters_single_slider .cmsmasters_post_date,
	.cmsmasters_comment_item .cmsmasters_comment_item_date,
	.cmsmasters_comment_item .comment-reply-link,
	.cmsmasters_slider_post .cmsmasters_slider_post_date,
	.cmsmasters_open_project .share_posts a,
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap {
		font-weight:normal;
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a,
	.cmsmasters_pricing_table .cmsmasters_price_wrap > span.cmsmasters_period,
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title,
	.cmsmasters_open_profile .profile_details_item_title,
	.cmsmasters_open_profile .profile_features_item_title,
	.cmsmasters_open_profile .profile_details_item_desc,
	.cmsmasters_open_profile .profile_details_item_desc a,
	.cmsmasters_open_profile .profile_features_item_desc,
	.cmsmasters_open_profile .profile_features_item_desc a,
	.post_nav > span.cmsmasters_next_post > span.sub,
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a,
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_h6_font_google_font']) . $cmsmasters_option['creative-lab' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['creative-lab' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h6_font_font_size'] + 2). "px;
		line-height:" . ((int) $cmsmasters_option['creative-lab' . '_h6_font_line_height'] + 6) . "px;
	}
	
	.cmsmasters_profile_horizontal .cmsmasters_profile_header .cmsmasters_profile_subtitle,
	.cmsmasters_profile_vertical .cmsmasters_profile_header .cmsmasters_profile_subtitle,
	.cmsmasters_open_profile .cmsmasters_profile_header .cmsmasters_profile_subtitle {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h6_font_font_size'] - 1). "px;
	}
	
	.cmsmasters_open_profile .profile_details_item_title,
	.cmsmasters_open_profile .profile_features_item_title,
	.cmsmasters_open_profile .profile_details_item_desc,
	.cmsmasters_open_profile .profile_details_item_desc a,
	.cmsmasters_open_profile .profile_features_item_desc,
	.cmsmasters_open_profile .profile_features_item_desc a {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h6_font_font_size'] - 2). "px;
	}
	
	.cmsmasters_open_profile .cmsmastersLike:before {
		font-size:" . ((int) $cmsmasters_option['creative-lab' . '_h6_font_font_size'] - 3). "px;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button,
	.button,
	input[type=submit],
	input[type=button],
	button {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_button_font_google_font']) . $cmsmasters_option['creative-lab' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_button_font_text_transform'] . ";
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['creative-lab' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['creative-lab' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['creative-lab' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small, 
	form .formError .formErrorContent {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_small_font_google_font']) . $cmsmasters_option['creative-lab' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['creative-lab' . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_small_font_google_font']) . $cmsmasters_option['creative-lab' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['creative-lab' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['creative-lab' . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	textarea,
	select,
	option {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_input_font_google_font']) . $cmsmasters_option['creative-lab' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['creative-lab' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_quote_font_google_font']) . $cmsmasters_option['creative-lab' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['creative-lab' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['creative-lab' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['creative-lab' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_quote_font_font_style'] . ";
	}
	
	q {
		font-family:" . creative_lab_get_google_font($cmsmasters_option['creative-lab' . '_quote_font_google_font']) . $cmsmasters_option['creative-lab' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['creative-lab' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['creative-lab' . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";
	
	
	return apply_filters('creative_lab_theme_fonts_filter', $custom_css);
}

