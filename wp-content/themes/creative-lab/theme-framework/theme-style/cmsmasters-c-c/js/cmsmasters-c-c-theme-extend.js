/**
 * @package 	WordPress
 * @subpackage 	Creative Lab
 * @version		1.0.2
 * 
 * Theme Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


/**
 * Blog Extend
 */
var cmsmasters_blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'filter_text') {
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = cmsmasters_theme_shortcodes.blog_field_layout_mode_puzzle;
		
		
		cmsmasters_blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		cmsmasters_blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = cmsmasters_blog_new_fields;



/**
 * Stats Extend
 */

var cmsmasters_stats_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_stats.fields) {
	if (id === 'type') {
		delete cmsmastersShortcodes.cmsmasters_stats.fields[id];
	} else if (id === 'count') {
		cmsmastersShortcodes.cmsmasters_stats.fields[id]['depend'] = 'mode:circles';
		
		
		cmsmasters_stats_new_fields[id] = cmsmastersShortcodes.cmsmasters_stats.fields[id];
	} else {
		cmsmasters_stats_new_fields[id] = cmsmastersShortcodes.cmsmasters_stats.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_stats.fields = cmsmasters_stats_new_fields;



/**
 * Counters Extend
 */

var cmsmasters_counters_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_counters.fields) {

	if (id === 'icon_size') {
		cmsmastersShortcodes.cmsmasters_counters.fields[id]['def'] = '42';
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else if (id === 'icon_space') {
		cmsmastersShortcodes.cmsmasters_counters.fields[id]['def'] = '76';
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else if (id === 'icon_border_width') {
		cmsmastersShortcodes.cmsmasters_counters.fields[id]['def'] = '2';
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else if (id === 'count') {
		cmsmasters_counters_new_fields['value_font_size'] = { 
			type : 		'input', 
			title : 	cmsmasters_theme_shortcodes.counters_field_value_font_size, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
			def : 		'56', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		};
		cmsmasters_counters_new_fields['value_line_height'] = { 
			type : 		'input', 
			title : 	cmsmasters_theme_shortcodes.counters_field_value_line_height, 
			descr : 	cmsmasters_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
			def : 		'76', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		};
		
		
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	} else {
		cmsmasters_counters_new_fields[id] = cmsmastersShortcodes.cmsmasters_counters.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_counters.fields = cmsmasters_counters_new_fields;



/**
 * Profiles Extend
 */

var cmsmasters_profiles_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_profiles.fields) {
	if (id === 'columns') {
		cmsmasters_profiles_new_fields['style'] = { 
			type : 		'radio', 
			title : 	cmsmasters_theme_shortcodes.profiles_field_style, 
			descr : 	'', 
			def : 		'style_1', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'style_1' : 	cmsmasters_theme_shortcodes.choice_style_1, 
						'style_2' : 	cmsmasters_theme_shortcodes.choice_style_2 
			}, 
			depend : 	'layout:horizontal' 
		};
		
		
		cmsmasters_profiles_new_fields[id] = cmsmastersShortcodes.cmsmasters_profiles.fields[id];
	} else {
		cmsmasters_profiles_new_fields[id] = cmsmastersShortcodes.cmsmasters_profiles.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_profiles.fields = cmsmasters_profiles_new_fields;



/**
 * Posts Slider Extend
 */

var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes 
		};
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;



/**
 * Portfolio Extend
 */

var cmsmasters_portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	if (id === 'layout_mode') {
		cmsmasters_portfolio_new_fields['puzzle_style'] = { 
			type : 		'radio', 
			title : 	cmsmasters_theme_shortcodes.portfolio_field_style, 
			descr : 	'', 
			def : 		'style_1', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'style_1' : 	cmsmasters_theme_shortcodes.choice_style_1, 
						'style_2' : 	cmsmasters_theme_shortcodes.choice_style_2, 
						'style_3' : 	cmsmasters_theme_shortcodes.choice_style_3 
			}, 
			depend : 	'layout:puzzle' 
		};
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'filter_text') {
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['rollover'];
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = cmsmasters_portfolio_new_fields;

