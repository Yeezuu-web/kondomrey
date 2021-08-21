<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_home_seven( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Home seven', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_home_seven';

	ob_start();
	?>[vc_row css=".vc_custom_1499246191633{padding-top: 65px !important;background-color: #f4f4f4 !important;}"][vc_column el_class="sidebar-sticky" offset="vc_col-md-8"][tt_news_slider exclude="479"][vc_row_inner css=".vc_custom_1500908070021{margin-bottom: 20px !important;padding-top: 65px !important;}"][vc_column_inner][vc_custom_heading text="Popular News" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_popular_news post_options="all-time-popular" total_item="4" grid_column="6"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="Lifestyle" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_single_category_news post_style="style-three" categories="6" cat_bg_color="yellow-bg"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Technology" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_single_category_news post_style="style-three" categories="7" cat_bg_color="electric-purple-bg"][/vc_column_inner][/vc_row_inner][vc_single_image image="571" img_size="full" css=".vc_custom_1500825240096{padding-top: 10px !important;padding-right: 10px !important;padding-bottom: 10px !important;padding-left: 10px !important;background-color: #ffffff !important;}"][vc_custom_heading text="Entertainment" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_single_category_news post_layout="layout-one" categories="8" total_item="4"][/vc_column][vc_column el_class="sidebar-sticky" offset="vc_col-md-4"][vc_widget_sidebar sidebar_id="trendymag-home-sidebar"][/vc_column][/vc_row][vc_row css=".vc_custom_1499248706306{padding-top: 25px !important;padding-bottom: 60px !important;background-color: #f4f4f4 !important;}"][vc_column width="2/3" sticky_column="true" offset="vc_col-md-8"][vc_custom_heading text="Recent News" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_recent_news_loadmore total_item="6" grid_column="6"][/vc_column][vc_column width="1/3" sticky_column="true" offset="vc_col-md-4"][vc_custom_heading text="Food" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_single_category_news post_style="style-three" categories="5" total_item="8"][/vc_column][/vc_row][vc_row css=".vc_custom_1491124344039{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #252525 !important;}"][vc_column][tt_section_title font_size="30px" title_alignment="text-center" title_color_option="custom-color" title="Subscribe" title_color="#ffffff"][vc_column_text el_class="white-text"]
<p style="text-align: center;">Subscribe to our free weekly newsletter and never miss a thing. No spam.
Only hand-picked lifestyle trends.</p>
[/vc_column_text][tt_newsletter][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_home_seven' );