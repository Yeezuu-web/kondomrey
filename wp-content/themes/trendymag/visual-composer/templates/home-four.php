<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_home_four( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Home four', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_home_four';

	ob_start();
	?>[vc_row gap="4" css=".vc_custom_1500898121815{padding-top: 45px !important;padding-bottom: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/3"][tt_featured_news post_id="174" post_width="trendymag-two-third" cat_bg_color="color-transparent-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="763" post_width="trendymag-two-third" cat_bg_color="color-transparent-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="760" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" post_height="208px" css=".vc_custom_1500974184658{padding-bottom: 4px !important;}"][tt_featured_news post_id="51" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" post_height="208px" css=".vc_custom_1500975155608{margin-bottom: 4px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1499245008010{padding-top: 60px !important;padding-bottom: 40px !important;background-color: #ffffff !important;}"][vc_column][tt_section_title title="Popular News"][tt_popular_news post_options="all-time-popular" post_style="style-two" total_item="4" grid_column="3" show_comment="hide"][/vc_column][/vc_row][vc_row css=".vc_custom_1500881894204{padding-top: 65px !important;padding-bottom: 65px !important;background-color: #f4f4f4 !important;}"][vc_column el_class="sidebar-sticky" offset="vc_col-md-8"][vc_custom_heading text="Recent News" font_container="tag:h4|font_size:20px|text_align:left|color:%23212121|line_height:28px" use_theme_fonts="yes"][tt_recent_news_loadmore total_item="10" grid_column="6"][/vc_column][vc_column el_class="sidebar-sticky" offset="vc_col-md-4"][vc_widget_sidebar sidebar_id="trendymag-home-sidebar"][/vc_column][/vc_row][vc_row css=".vc_custom_1491124344039{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #252525 !important;}"][vc_column][tt_section_title font_size="30px" title_alignment="text-center" title_color_option="custom-color" title="Subscribe" title_color="#ffffff"][vc_column_text el_class="white-text"]
<p style="text-align: center;">Subscribe to our free weekly newsletter and never miss a thing. No spam.
Only hand-picked lifestyle trends.</p>
[/vc_column_text][tt_newsletter][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_home_four' );