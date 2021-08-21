<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_six( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 6', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_six';

	ob_start();
	?>[vc_row gap="4" css=".vc_custom_1500884277764{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="2/3"][tt_featured_news post_id="51" post_width="trendymag-two-third" cat_bg_color="deep-sky-blue-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="770" post_width="trendymag-one-third" post_height="208px" css=".vc_custom_1500890640487{margin-bottom: 4px !important;}"][tt_featured_news post_id="401" post_width="trendymag-one-third" cat_bg_color="yellow-bg" post_height="208px" css=".vc_custom_1500888502279{margin-bottom: 4px !important;}"][/vc_column][/vc_row][vc_row gap="4" css=".vc_custom_1500890954167{margin-top: -4px !important;padding-bottom: 65px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/3"][tt_featured_news post_id="470" post_width="trendymag-one-third" cat_bg_color="electric-purple-bg" post_height="208px" css=".vc_custom_1500890626822{margin-bottom: 4px !important;}"][tt_featured_news post_id="388" post_width="trendymag-one-third" cat_bg_color="han-purple-bg" post_height="208px" css=".vc_custom_1500890662642{margin-bottom: 4px !important;}"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="763" post_width="trendymag-two-third" cat_bg_color="spring-green-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="393" post_width="trendymag-two-third" cat_bg_color="light-sea-green-bg"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_six' );