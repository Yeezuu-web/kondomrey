<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_home_six( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Home six', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_home_six';

	ob_start();
	?>[vc_row gap="4" css=".vc_custom_1500884277764{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="2/3"][tt_featured_news post_id="51" post_width="trendymag-two-third" cat_bg_color="deep-sky-blue-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="770" post_width="trendymag-one-third" post_height="208px" css=".vc_custom_1500890640487{margin-bottom: 4px !important;}"][tt_featured_news post_id="401" post_width="trendymag-one-third" cat_bg_color="yellow-bg" post_height="208px" css=".vc_custom_1500888502279{margin-bottom: 4px !important;}"][/vc_column][/vc_row][vc_row gap="4" css=".vc_custom_1500890954167{margin-top: -4px !important;padding-bottom: 65px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/3"][tt_featured_news post_id="470" post_width="trendymag-one-third" cat_bg_color="electric-purple-bg" post_height="208px" css=".vc_custom_1500890626822{margin-bottom: 4px !important;}"][tt_featured_news post_id="388" post_width="trendymag-one-third" cat_bg_color="han-purple-bg" post_height="208px" css=".vc_custom_1500890662642{margin-bottom: 4px !important;}"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="763" post_width="trendymag-two-third" cat_bg_color="spring-green-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="393" post_width="trendymag-two-third" cat_bg_color="light-sea-green-bg"][/vc_column][/vc_row][vc_row css=".vc_custom_1500892181654{padding-top: 65px !important;padding-bottom: 45px !important;}"][vc_column][tt_section_title title="Business"][tt_category_layout_one categories="10"][/vc_column][/vc_row][vc_row css=".vc_custom_1500891124895{padding-top: 65px !important;padding-bottom: 65px !important;background-color: #f4f4f4 !important;}"][vc_column el_class="sidebar-sticky" offset="vc_col-md-8"][tt_section_title title="Recent News"][tt_recent_news_loadmore total_item="10" grid_column="6"][/vc_column][vc_column sticky_column="true" el_class="sidebar-sticky" offset="vc_col-md-4"][vc_widget_sidebar sidebar_id="trendymag-home-sidebar"][/vc_column][/vc_row][vc_row css=".vc_custom_1491124344039{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #252525 !important;}"][vc_column][tt_section_title font_size="30px" title_alignment="text-center" title_color_option="custom-color" title="Subscribe" title_color="#ffffff"][vc_column_text el_class="white-text"]
<p style="text-align: center;">Subscribe to our free weekly newsletter and never miss a thing. No spam.
Only hand-picked lifestyle trends.</p>
[/vc_column_text][tt_newsletter][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_home_six' );