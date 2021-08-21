<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_home_five( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Home five', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_home_five';

	ob_start();
	?>[vc_row css=".vc_custom_1500886645545{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column offset="vc_col-md-8" css=".vc_custom_1500886575092{margin-bottom: 65px !important;}"][tt_featured_news post_id="174" post_width="trendymag-two-third" cat_bg_color="deep-sky-blue-bg"][vc_row_inner css=".vc_custom_1500885280929{margin-top: 65px !important;}"][vc_column_inner][tt_section_title title="Recent News"][tt_recent_news_loadmore total_item="10" grid_column="6"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column sticky_column="true" offset="vc_col-md-4" css=".vc_custom_1500886629980{margin-bottom: 65px !important;}"][vc_widget_sidebar sidebar_id="trendymag-home-sidebar"][/vc_column][/vc_row][vc_row css=".vc_custom_1491124344039{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #252525 !important;}"][vc_column][tt_section_title font_size="30px" title_alignment="text-center" title_color_option="custom-color" title="Subscribe" title_color="#ffffff"][vc_column_text el_class="white-text"]
<p style="text-align: center;">Subscribe to our free weekly newsletter and never miss a thing. No spam.
Only hand-picked lifestyle trends.</p>
[/vc_column_text][tt_newsletter][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_home_five' );