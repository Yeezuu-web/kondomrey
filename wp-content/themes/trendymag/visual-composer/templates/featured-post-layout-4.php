<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_four( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 4', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_four';

	ob_start();
	?>[vc_row gap="4" css=".vc_custom_1500898121815{padding-top: 45px !important;padding-bottom: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/3"][tt_featured_news post_id="174" post_width="trendymag-two-third" cat_bg_color="color-transparent-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="763" post_width="trendymag-two-third" cat_bg_color="color-transparent-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="760" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" post_height="208px" css=".vc_custom_1500974184658{padding-bottom: 4px !important;}"][tt_featured_news post_id="51" post_width="trendymag-one-third" cat_bg_color="color-transparent-bg" post_height="208px" css=".vc_custom_1500975155608{margin-bottom: 4px !important;}"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_four' );