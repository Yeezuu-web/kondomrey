<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function tt_vc_template_featured_post_three( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Featured Post Layout 3', 'trendymag');
	$template[ 'custom_class' ] = 'tt_vc_template_featured_post_three';

	ob_start();
	?>[vc_row gap="3" css=".vc_custom_1500898426973{padding-top: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/3"][tt_featured_news post_id="182" post_width="trendymag-one-fourth" cat_bg_color="deep-sky-blue-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="479" post_width="trendymag-one-fourth" cat_bg_color="electric-purple-bg"][/vc_column][vc_column width="1/3"][tt_featured_news post_id="362" post_width="trendymag-one-fourth" cat_bg_color="orange-peel-bg"][/vc_column][/vc_row][vc_row gap="3" css=".vc_custom_1500898449423{padding-bottom: 45px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="701" post_width="trendymag-one-fourth"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="51" post_width="trendymag-one-fourth" cat_bg_color="spring-green-bg"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="752" post_width="trendymag-one-fourth" cat_bg_color="light-sea-green-bg"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tt_featured_news post_id="711" post_width="trendymag-one-fourth" cat_bg_color="han-purple-bg"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'tt_vc_template_featured_post_three' );